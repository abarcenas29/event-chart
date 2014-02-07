<?php
class Model_Event_Hashtag extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'event_id',
		'hashtag',
		'created_at'
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_list'
		)
	);
	
	public static function insert_hashtag($arg)
	{
		$q				= new Model_Event_hashtag();
		$q->event_id	= $arg['event_id'];
		$q->hashtag		= $arg['hashtag'];
		$q->save();
		return $q;
	}
	
	public static function delete_hashtag($arg)
	{
		$q = Model_Event_Hashtag::query()
				->where('id','=',$arg['hash_id'])
				->where('event_id','=',$arg['event_id'])
				->get_one();
		//delete instagram instance of the hashtag
		Model_Event_Instagram::delete_instagram_by_hashtag($q);
		
		$q->delete();
		return true;
	}
	
	public static function remove_hashtag_by_event($event_id)
	{
		$q = Model_Event_Hashtag::query()
				->where('event_id','=',$event_id)
				->delete();
	}
}

