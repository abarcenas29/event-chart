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
		$q->save();
		
		return $q;
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

