<?php
class Model_ModelCore extends Orm\Model 
{
	protected static function _get_timestamp($event_id)
	{
		$event = Model_Event_list::read_public_list($event_id);
		$time  = strtotime($event['start_at'].' 23:59:59');
		return $time;
	}
}

