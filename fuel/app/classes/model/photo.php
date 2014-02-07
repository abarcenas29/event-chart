<?php
class Model_Photo extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'date',
		'filename',
		'created_at'
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'id',
			'key_to'	=> 'photo_id',
			'model_to'	=> 'Model_Event_List'
		),
		'event_list_cover' => array(
			'key_from'	=> 'id',
			'key_to'	=> 'cover_id',
			'model_to'	=> 'Model_Event_List'
		),
		'organization' => array(
			'key_from'	=> 'id',
			'key_to'	=> 'photo_id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	public static function insert_picture_url($arg)
	{
		$q = new Model_Photo();
		$q->date	= date('Y-m-d');
		$q->filename= Model_Photo::_upload_url($arg);
		$q->save();
		return $q->id;
	}
	
	public static function insert_picture($arg)
	{
		$q = new Model_Photo();
		$q->date		= date('Y-m-d');
		$q->filename	= Model_Photo::_upload($arg);
		$q->save();
		return $q->id;
	}
	
	public static function get_picture_by_id($id)
	{
		$q = Model_Photo::query()
				->where('id','=',$id);
		return $q->get_one();
	}
	
	public static function delete_picture($photo_id)
	{
		$q	= Model_Photo::query()
				->where('id','=',$photo_id)
				->get_one();
		$arg['date']	= $q['date'];
		$arg['filename']= $q['filename'];
		Model_Photo::_delete_file($arg);
		$q->delete(); 
	}
	
	private static function _delete_file($arg)
	{
		$path = \Fuel\Core\Config::get('ec.upload').$arg['date'].'/';
	
		$files[] = $path.$arg['filename'];
		$files[] = $path.'flow-'.$arg['filename'];
		$files[] = $path.'small-'.$arg['filename'];
		$files[] = $path.'thumb-'.$arg['filename'];
		foreach($files as $file)
		{
			if(file_exists($file))\Fuel\Core\File::delete($file);
		}
	}
	
	public static function _upload_url($arg)
	{
		$arg['upload_dir'] = Config::get('ec.upload');
		$get_mime		   = explode('.',$arg['url']);
		$arg['mime']	   = end($get_mime);
		
		if($arg['mime'] == 'jpeg' || 
		   $arg['mime'] == 'jpg'  || 
		   $arg['mime'] == 'png')
		{
			$arg['rand_name']  = substr_replace(sha1(microtime(true)),'',25);
			$arg['org_file']   = $arg['upload_dir'].date('Y-m-d').'/'.$arg['rand_name'].'.'.$arg['mime'];
			if($arg['mime'] == 'jpeg' || $arg['mime'] == 'jpg')
			{
				$img = imagecreatefromjpeg($arg['url']);
				imagejpeg($img,$arg['org_file']);
				
				chmod($arg['org_file'],0775);
			}
			else
			{
				$img = imagecreatefrompng($arg['url']);
				imagepng($img,$arg['org_file']);
				
				chmod($arg['org_file'],0775);
				$arg = Model_Photo::_convert_png_to_jpg($arg);
			}
			
			return Model_Photo::_resize_img($arg);
		}
		return false;
	}
	
	public static function _upload($arg)
	{
		$arg['upload_dir'] = Config::get('ec.upload');
		$get_mime		   = explode('.',$arg['filename']);
		$arg['mime']	   = end($get_mime);
		
		$arg['clean_file'] = explode(',',$arg['value']);
		$encodeData		   = str_replace('','+',$arg['clean_file']);
		$decodeData		   = base64_decode($encodeData[1]);
		
		$arg['rand_name']  = substr_replace(sha1(microtime(true)),'',25);
		$arg['org_file']   = $arg['upload_dir'].date('Y-m-d').'/'.$arg['rand_name'].'.'.$arg['mime'];
		
		try
		{
			\Fuel\Core\File::create_dir($arg['upload_dir'],date('Y-m-d'));
		}catch(Exception $e){}
		
		if(file_put_contents($arg['org_file'],$decodeData))
		{
			chmod($arg['org_file'],0775);
			$arg = Model_Photo::_convert_png_to_jpg($arg);
			
			return Model_Photo::_resize_img($arg);
		}
		return null;
	}
	
	private static function _resize_img($arg)
	{
		//reduce file
		try {
			\Fuel\Core\Image::load($arg['org_file'])
				->config('quality',80)
				->resize($arg['width'])
				->save($arg['org_file'],0775);
		} catch (Exception $exc) {
			if(file_exists($arg['org_file']))
				File::delete($arg['org_file']);
			//echo $exc->getTraceAsString();
		}
			
		if(isset($arg['x1']))
		{
			//crop file
			\Fuel\Core\Image::load($arg['org_file'])
				->crop($arg['x1'],$arg['y1'],$arg['x2'],$arg['y2'])
				->save($arg['org_file']);
		}

		//medium
		\Fuel\Core\Image::load($arg['org_file'])
				->resize(640)
				->save_pa('flow-');

		//small
		\Fuel\Core\Image::load($arg['org_file'])
				->resize(320)
				->save_pa('small-');


		//thumb
		\Fuel\Core\Image::load($arg['org_file'])
				->crop_resize(200,200)
				->save_pa('thumb-');

		$ext = ($arg['mime'] == 'png')?'jpg':$arg['mime'];
		return $arg['rand_name'].'.'.$ext;
	}
	
	private static function _convert_png_to_jpg($arg)
	{
		if($arg['mime'] == 'png')
		{
			
			$imgJpeg	= imagecreatefrompng($arg['org_file']);
			$fillEmpty	= imagecreatetruecolor(imagesx($imgJpeg),imagesy($imgJpeg));
			$newFilepath= $arg['upload_dir'].date('Y-m-d').'/'.$arg['rand_name'].'.jpg';
				
			imagefill($fillEmpty,0,0,imagecolorallocate($fillEmpty, 255, 255, 255));
			imagealphablending($fillEmpty,true);
			imagecopy($fillEmpty,$imgJpeg,0,0,0,0,imagesx($imgJpeg),imagesy($imgJpeg));
			imagedestroy($imgJpeg);
			imagejpeg($fillEmpty,$newFilepath,80);
			\Fuel\Core\File::delete($arg['org_file']);
			
			$arg['org_file'] = $newFilepath;
		}
		return $arg;
	}
}

