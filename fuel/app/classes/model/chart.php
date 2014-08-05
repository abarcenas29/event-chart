<?php
//Custom Chart Model
class Model_chart extends Model
{
    
	
    public static function format_chart($arg)
    {
        $arg = Model_chart::_set_region($arg);
        
        $q = Model_Event_list::query()
                ->related('organization')
                ->related('ticket')
                ->related('photo')
                ->where('status','=','live')
                ->where('start_at','>=',$arg['start_at'])
                ->where('end_at','<=',$arg['end_at'])
                ->where('region','in',$arg['region'])
                ->order_by('start_at','asc')
                ->get();
        return Model_chart::_prepare_chart($q);
    }

    public static function event_today()
    {
        $q = Model_Event_list::query()
                ->related('photo')
                ->where('start_at','<=',date('Y-m-d'))
                ->where('end_at','>=',date('Y-m-d'))
                ->where('status','=','live')
                ->order_by('start_at','asc')
                ->get();
        return Model_chart::_prepare_chart($q);
    }

    public static function event_preview($day)
    {
        $preview = strtotime("+$day days");

        $q = Model_Event_list::query()
                ->related('photo')
                ->where('start_at','<=',date('Y-m-d',$preview))
                ->where('end_at','>=',date('Y-m-d',$preview))
                ->where('status','=','live')
                ->order_by('start_at','asc')
                ->get();
        return Model_chart::_prepare_chart($q);
    }

    public static function event_archive($arg)
    {
        $arg = Model_chart::_set_region($arg);
        
        $q = Model_Event_list::query()
                ->related('photo')
                ->where('status','=','live')
                ->where('end_at','<',date('Y-m-d'))
                ->where('region','in',$arg['region'])
                ->order_by('start_at','desc')
                ->get();
        return Model_chart::_prepare_chart($q);
    }

    public static function event_category_today($category)
    {
        $q = Model_Event_list::query()
                ->related('photo')
                ->related('category')
                ->where('start_at','<=',date('Y-m-d'))
                ->where('end_at','>=',date('Y-m-d'))
                ->where('status','=','live')
                ->where('category.category','=',$category)
                ->order_by('start_at','asc')
                ->get();

        return Model_chart::_prepare_chart($q);
    }

    public static function event_category($category)
    {
        $half_year = strtotime(Model_chart::$_half_year);

        $q = Model_Event_list::query()
                ->related('category')
                ->related('photo')
                ->where('status','=','live')
                ->where('category.category','=',$category)
                ->where('end_at','<',date('Y-m-d',$half_year))
                ->order_by('start_at','asc')
                ->get();

        return Model_chart::_prepare_chart($q);
    }

    private static function _prepare_chart($q)
    {
        $c      = 0;
        $chart	= array();
        foreach($q as $row)
        {
            $start_date = new DateTime($row['start_at']);
            $end_date	= new DateTime($row['end_at']);
            $diff	= $start_date->diff($end_date);

            $chart[$c]['poster_thumb']	= Model_chart::_poster_uri($row,'thumb-');
            $chart[$c]['poster_flow']	= Model_chart::_poster_uri($row,'flow-');
            $chart[$c]['cover_flow']    = Model_chart::_cover_uri($row,'flow-');
            $chart[$c]['start_at']	= date('d M Y',strtotime($row['start_at']));
            $chart[$c]['end_at']	= date('d M y',strtotime($row['end_at']));
            $chart[$c]['raw_date']	= $row['start_at'];
            $chart[$c]['title']         = $row['name'];
            $chart[$c]['event_id']	= $row['id'];
            $chart[$c]['venue']		= $row['venue'];
            $chart[$c]['main_org']      = $row['organization']['name'];
            $chart[$c]['facebook']      = $row['facebook'];
            $chart[$c]['twitter']       = $row['twitter'];
            $chart[$c]['website']       = $row['website'];
            $chart[$c]['coordinate']    = $row['lat'].','.$row['long'];

            $ticket = array();
            $d      = 0;
            foreach($row['ticket'] as $row2)
            {
                $ticket[$d]['price'] = $row2['price'];
                $ticket[$d]['note']  = $row2['note'];
                $d++;
            }
            $chart[$c]['tickets'] = json_encode($ticket);

            $category = array();
            $d        = 0;
            foreach($row['category'] as $row3)
            {
                $category[$d]['category'] = $row3['category'];
                $d++;
            }
            $chart[$c]['category'] = json_encode($category);

            $c++;
        }
        return $chart;
    }

    private static function _set_region($arg)
    {
        $region = array();
        if($arg['region'] == 'ncr')
        {
            $region = array(
			'Caloocan City',
			'Las Piñas City',
			'Makati City',
			'Malabon City',
			'Mandaluyong City',
			'Manila',
			'Marikina City',
			'Muntinlupa City',
			'Navotas City',
			'Parañaque City',
			'Pasay City',
			'Pasig City',
			'Quezon City',
			'San Juan City',
			'Taguig City',
			'Valenzuela City'
		);
        }
        else 
        {
            $region[] = $arg['region'];
        }
        $arg['region'] = $region;
        return $arg;
    }
    
    private static function _cover_uri($p,$type = '')
    {
        if(!is_null($p['cover_id']))
        {
            return Uri::create('uploads/'.$p['cover']['date'].'/'.$type.$p['cover']['filename']);
        }
        else 
        {
            return 'http://placehold.it/546x307';
        }
    }
    
    private static function _poster_uri($p,$type = '')
    {
       return Uri::create('uploads/'.$p['cover']['date'].'/'.$type.$p['cover']['filename']);
    }
}

