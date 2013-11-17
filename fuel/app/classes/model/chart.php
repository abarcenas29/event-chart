<?php
//Custom Chart Model
class Model_chart extends Model
{
    public static function format_chart()
	{
		$half_year = strtotime('+6 months');
	
		$q = Model_Event_list::query()
				->related('photo')
				->where('private','=',false)
				->where('start_at','>=',date('Y-m-d'))
				->where('end_at','<=',date('Y-m-d',$half_year))
				->order_by('start_at','desc')
				->get();
		return Model_chart::_prepare_chart($q);
	}
	
	public static function event_today()
	{
		$q = Model_Event_list::query()
				->related('photo')
				->where('start_at','<=',date('Y-m-d'))
				->where('end_at','>=',date('Y-m-d'))
				->where('private','=',false)
				->order_by('start_at','desc')
				->get();
		return Model_chart::_prepare_chart($q);
	}
	
	private static function _prepare_chart($q)
	{
		$c		= 0;
		$chart	= array();
		foreach($q as $row)
		{
			$start_date = new DateTime($row['start_at']);
			$end_date	= new DateTime($row['end_at']);
			$diff		= $start_date->diff($end_date);
			$no_days	= (int)$diff->format('%a') + 1;
			
			$chart[$c]['poster_thumb']	= Model_chart::_poster_uri($row,'thumb-');
			$chart[$c]['poster_flow']	= Model_chart::_poster_uri($row,'flow-');
			$chart[$c]['start_at']		= date('d M y',  strtotime($row['start_at']));
			$chart[$c]['end_at']		= date('d M y',  strtotime($row['end_at']));
			$chart[$c]['duration']		= "$no_days days";
			$chart[$c]['title']			= $row['name'];
			$chart[$c]['event_id']		= $row['id'];
			$chart[$c]['venue']			= $row['venue'];
			
			$fb_data   = Model_chart::_facebook_info($row['facebook']);
			if(!is_null($fb_data))
			{
				$chart[$c]['cover_image'] = $fb_data['cover']['source'];
			}
			
			$c++;
		}
		return $chart;
	}
	
	private static function _facebook_info($fb)
	{
		if(!empty($fb))
		{
			try {
				$raw_data	= file_get_contents("https://graph.facebook.com/$fb");
				$json_data	= json_decode($raw_data,true);
				return $json_data;
			} catch (Exception $exc) {}
			return null;
		}
	}

	private static function _poster_uri($p,$type = '')
	{
		return Uri::create('uploads/'.$p['photo']['date'].'/'.$type.$p['photo']['filename']);
	}
}

