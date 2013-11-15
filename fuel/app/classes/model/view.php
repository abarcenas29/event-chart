<?php
class Model_View extends Model
{
    public static function org_unique_cat($events)
	{
		$categories = array();
		foreach($events as $event)
		{
			foreach($event['category'] as $cat)
			{
				$categories[] = $cat['category'];
			}
		}
		array_unique($categories);
		return $categories;
	}
	
	public static function org_guest_list($events)
	{
		$guests = array();
		foreach($events as $event)
		{
			foreach($event['guest'] as $guest)
			{
				$guests[] = $guest['name'];
			}
		}
		array_unique($guests);
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
}

