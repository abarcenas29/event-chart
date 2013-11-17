<?php
class Model_Event_Poster extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'event_id',
		'photo_id',
		'created_at'
	);
	
	protected static $_has_one = array(
		'photo' => array(
			'key_from'	=> 'photo_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Photo'
		)
	);
	
	protected static $_belongs_to = array(
		'event_list'	=> array(
			'key_from'	=> 'photo_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	//edit later for jquery file drop
	public static function write_poster($arg)
	{
		$arg['action'] = 'add';
		
		$photo_id = Model_Photo::insert_picture($arg);
		
		$q = new Model_Event_Poster();
		$q->event_id = $arg['event_id'];
		$q->photo_id = $photo_id;
		$q->save();
		
		$photo = Model_Photo::get_picture_by_id($photo_id);
		$photo_thumb = $photo['date'].'/thumb-'.$photo['filename'];
		$photo_full	 = $photo['date'].'/'.$photo['filename'];
		
		$res['thumb'] = \Fuel\Core\Uri::create('uploads/'.$photo_thumb);
		$res['full']  = \Fuel\Core\Uri::create('uploads/'.$photo_full);	
		$res['p_id']  = $photo_id;
		return $res;
	}
	
	public static function delete_poster($arg)
	{
		$q = Model_Event_Poster::query()
				->where('photo_id','=',$arg['photo_id'])
				->where('event_id','=',$arg['event_id']);
		Model_Photo::delete_picture($arg['photo_id']);
		return $q->delete();
	}
	
	public static function remove_poster_by_event($event_id)
	{
		$q = Model_Event_Poster::query()
				->where('event_id','=',$event_id);
		foreach($q->get() as $row)
		{
			Model_Photo::delete_picture($row['photo_id']);
		}
		$q->delete();
	}
}

