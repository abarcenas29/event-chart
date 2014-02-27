<?php
class Model_View extends Model
{
    public static function org_unique_cat($events)
	{
		
		$event_id = Model_View::_prepare_event($events);
		
		$q = array();
		if(count($event_id) > 0)
		{
		$q = Db::select('category')
				->from('event_categories')
				->where('event_id','in',$event_id)
				->distinct(true)
				->execute()
				->as_array();	
		}
		
		$category = array();
		foreach($q as $row)
		{
			$category[] = $row['category'];
		}
		
		return $category;
	}
	
	public static function org_guest_list($events)
	{
		$event_id = Model_View::_prepare_event($events);
		
		$q = array();
		if(count($event_id) > 0)
		{
		$q = Db::select('name')
				->from('event_guests')
				->where('event_id','in',$event_id)
				->distinct(true)
				->execute()
				->as_array();	
		}
		
		$guests = array();
		foreach($q as $row)
		{
			$guests[] = $row['name'];
		}
		
		return $guests;
	}
	
	//Average Price
	public static function org_ticket_stat($events)
	{
		$prices = array();
		foreach($events as $event)
		{
			foreach($event['ticket'] as $ticket)
			{
				$prices[] = $ticket['price'];
			}
		}
		if(count($prices))
		{
			$total		= array_sum($prices);
			$avg_price	= $total / count($prices);
		}
		else
		{
			$avg_price  = 0;
		}
		return $avg_price;
	}
	
	public static function _prepare_event($events)
	{
		$event_id = array();
		foreach($events as $event)
		{
			$event_id[] = $event['id'];
		}
		return $event_id;
	}
}

