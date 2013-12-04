<?php
class Model_region extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'location',
		'lat',
		'long',
		'created_at'
	);
	
	public static function insert_region($arg)
	{
		$q = new Model_region();
		$q->location = $arg['location'];
		$q->lat		 = $arg['lat'];
		$q->long	 = $arg['long'];
		$q->save();
	}
	
	public static function region_index()
	{
		$q = Model_region::query()
				->order_by('location');
		return $q->get();
	}
	
	public static function search_venue($arg)
	{
		$url = 'http://maps.googleapis.com/maps/api/geocode/json';
		$param['address'] = $arg['search'];
		$param['sensor']  = 'true';
		
		$rsp = \unirest\unirest::get($url,null,$param);
		
		$result = array();
		$x		= 0;
		if(isset($rsp->body->results))
		{
			foreach($rsp->body->results as $venue)
			{
				$result[$x]['address'] = $venue->formatted_address;
				$result[$x]['long']	   = $venue->geometry->location->lng;
				$result[$x]['lat']	   = $venue->geometry->location->lat;
				$x++;
			}
		}
		return $result;
	}
}

