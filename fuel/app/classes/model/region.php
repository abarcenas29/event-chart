<?php
class Model_region extends Model
{
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

