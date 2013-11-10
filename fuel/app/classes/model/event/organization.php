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
		'organization' => array(
			'key_from'	=> 'main_org',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		)
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	public static function insert_org($arg)
	{
		\Fuel\Core\DB::start_transaction();
		foreach($arg['org_ids'] as $org_id)
		{
			$q = new Model_Event_Organization();
			$q->event_id = $arg['event_id'];
			$q->org_id	 = $org_id;
			$q->save();
		}
		\Fuel\Core\DB::commit_transaction();
	}
	
	public static function remove_org($arg)
	{
		\Fuel\Core\DB::start_transaction();
		foreach($arg['sub_ids'] as $sub_id)
		{
			$q = Model_Event_Organization::find($sub_id);
			$q->delete();
		}
		\Fuel\Core\DB::commit_transaction();
	}
}
