<?php
class Model_Event_Poster extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'event_id',
		'photo_id',
                'fb_create_time',
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
	
	
	public static function write_poster($arg)
	{
		$q = new Model_Event_Poster();
		$q->event_id = $arg['event_id'];
		$q->photo_id = Model_Photo::insert_picture($arg);
		$q->save();
		
		return $q;
	}
	
	public static function write_poster_url($arg)
	{
		$q = new Model_Event_Poster();
		$q->event_id = $arg['event_id'];
		$q->photo_id = Model_Photo::insert_picture_url($arg);
                $q->fb_create_time = (isset($arg['fb-update']))?$arg['fb-update']:null;
		$q->save();
		
		return $q;
	}
        
        public static function fb_write_poster_url($event_id)
        {
            $q = Model_Event_Poster::query()
                    ->where('event_id','=',$event_id)
                    ->where('fb_create_time','!=',null)
                    ->order_by('fb_create_time','desc');
            $update_time = ($q->count() == 0)?0:$q->get_one()['fb_create_time'];
            $list = Model_Event_list::read_list($event_id);
            
            if(!is_null($list['fb_event_id']))
            {
                $photos = Model_Event_Engine::fetch_event_photos($list['fb_event_id']);
                foreach ($photos as $photo)
                {
                   $create_time = strtotime($photo['created_time']);
                   if((int) $create_time > $update_time)
                   {
                        $arg = array();
                        $arg['url']         = $photo['url'];
                        $arg['width']       = 1280;
                        $arg['event_id']    = $event_id;
                        $arg['fb-update']   = $create_time;
                        Model_Event_Poster::write_poster_url($arg);
                   } 
                }
            }
        }
	
	public static function delete_poster($arg)
	{
		$q = Model_Event_Poster::query()
				->where('id','=',$arg['poster_id'])
				->get_one();
		Model_Photo::delete_picture($q['photo_id']);
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

