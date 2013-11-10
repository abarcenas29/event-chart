<?php
class Model_Event_Guest extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'event_id',
		'name',
		'type',
		'created_at'
	);

	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_list'
		)
	);
	
	public static function insert_guest($arg)
	{
		$q = new Model_Event_Guest();
		$q->event_id= $arg['event_id'];
		$q->name	= $arg['name'];
		$q->type	= $arg['type'];
		$q->save();
		return $q->id;
	}
	
	public static function delete_guest($arg)
	{
		$q = Model_Event_Guest::query()
				->where('id','=',$arg['guest_id'])
				->where('event_id','=',$arg['event_id'])
				->get_one();
		return $q->delete();
	}
}

