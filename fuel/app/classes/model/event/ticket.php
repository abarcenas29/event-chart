<?php
class Model_Event_Ticket extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'event_id',
		'price',
		'note',
		'created_at'
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	protected static $_conditions = array(
		'order_by'	=> array('price' => 'desc')
	);
	
	public static function insert_price($arg)
	{
		$q			 = new Model_Event_Ticket();
		$q->event_id = $arg['event_id'];
		$q->price	 = $arg['price'];
		$q->note	 = $arg['note'];
		$q->save();
		return $q->id;
	}
	
	public static function delete_price($arg)
	{
		$q = Model_Event_Ticket::query()
				->where('id','=',$arg['ticket_id'])
				->where('event_id','=',$arg['event_id'])
				->get_one();
		$q->delete();
		return true;
	}
	
	public static function remove_ticket_by_event($event_id)
	{
		$q = Model_Event_Ticket::query()
				->where('event_id','=',$event_id);
		$q->delete();
	}
}

