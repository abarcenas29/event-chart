<?php
class Model_Event_Category extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'event_id',
		'category',
		'created_at'
	);

	protected static $_has_one = array(
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_list'
		)
	);
	
	public static function insert_org($arg)
	{
			$q = new Model_Event_Category();
			$q->event_id	= $arg['event_id'];
			$q->category	= $arg['cat'];
			$q->save();
			return $q->id;
	}
	
	public static function remove_org($arg)
	{
		$q = Model_Event_Category::query()
				->where('id','=',$arg['cat_id'])
				->where('event_id','=',$arg['event_id'])
				->get_one();
		$q->delete();
		return 0;
	}
	
	public static function remove_cat_by_event($event_id)
	{
		$q = Model_Event_Category::query()
				->where('event_id','=',$event_id);
		$q->delete();
	}
}

