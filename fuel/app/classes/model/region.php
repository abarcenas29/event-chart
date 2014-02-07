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
				$result[$x]['title']	= $venue->formatted_address;
				$result[$x]['url']		= '#';
				$result[$x]['text']		= $venue->geometry->location->lat 
										  .'|'.
										  $venue->geometry->location->lng;
				$x++;
			}
		}
		$response = array();
		$response['results'] = $result;
		return $response;
	}
}

