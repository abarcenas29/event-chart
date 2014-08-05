<?php
namespace Fuel\Tasks;

class instagram 
{
	public static function run()
	{
		\Fuel::$env = \Fuel::STAGING;
		\Package::load('orm');
		\Log::info('Instagram Operation Starting');
		
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
			\Model_Event_Instagram::insert_photos($arg);
		}
		\Log::info('Instagram Operation Ended');
	}
}

