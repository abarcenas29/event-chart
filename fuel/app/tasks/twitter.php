<?php
namespace Fuel\Tasks;

class twitter 
{
	public static function run()
	{
		\Package::load('orm');
		\Log::info('Twitter Operation Starting');
		
		$time = strtotime('-5 day');
		//Get current events
		$q = \Model_Event_list::query()
				->where('start_at','<=',date('Y-m-d',$time))
				->where('end_at','>=',date('Y-m-d',$time))
				->where('private','=',false)
				->order_by('start_at','desc');
		
		$arg = array();
		foreach($q->get() as $event)
		{
			$arg['event_id'] = $event['id'];
			\Model_Event_Twitter::insert_twitter($arg);
		}
		\Log::info('Twitter Operation Ended');
	}
}

