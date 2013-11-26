<?php
class Model_Event_Organization extends Model_ModelCore
{
	protected static $_properties = array(
		'id',
		'event_id',
		'org_id',
		'created_at'
	);
	
	protected static $_has_one = array(
		'org' => array(
			'key_from'	=> 'org_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		),
		'event' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	protected static $_belongs_to = array(
		'event_list'	=> array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		),
		'organization'	=> array(
			'key_from'	=> 'org_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		)
	);
	
	public static function insert_org($arg)
	{
		$q = new Model_Event_Organization();
		$q->event_id = $arg['event_id'];
		$q->org_id	 = $arg['org'];
		$q->save();
		return $q->id;
	}
	
	public static function remove_org($arg)
	{
		try {
			$q = Model_Event_Organization::query()
				->where('event_id','=',$arg['event_id'])
				->where('id','=',$arg['eorg'])
				->get_one();
			$q->delete();
		} catch (Exception $exc) {
			
		}		
		return 0;
	}
	
	public static function remove_org_by_event($event_id)
	{
		$q = Model_Event_Organization::query()
				->where('event_id','=',$event_id);
		$q->delete();
	}
}
