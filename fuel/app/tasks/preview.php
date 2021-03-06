<?php
namespace Fuel\Tasks;

class preview 
{
	public static function run($day)
	{
		\Fuel::$env = \Fuel::STAGING;
		$q = \Model_chart::event_preview($day);
		
		\Log::info('Preview Operation Starting');
		
		$qty = count($q);
		if($qty > 0)
		{
			$arg = array();
			if($day == 0)
			{
				$arg['content'] = '['.date('Y-m-d')."] Heads UP! $qty Event(s) are happening right NOW. Link for more info: ";
			}
			else if ($day == 1)
			{
				$arg['content'] = '['.date('Y-m-d')."] Heads UP! There are $qty Event(s) lined up for tomorrow ";
			}
			else
			{
				$arg['content'] = '['.date('Y-m-d')."] Heads UP! There are $qty Event(s) lined up for the next $day days. ";
			}
			$arg['url'] = "http://event.deremoe.com/chart/preview/$day";
			\Model_broadcast::post_twitter($arg);
			\Model_broadcast::post_facebook($arg);
		}
		\Log::info("Preview Operation Resulted in $qty Events posted. for entry $day");
	}
}

