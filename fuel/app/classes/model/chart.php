<?php
//Custom Chart Model
class Model_chart extends Model
{
    private static $_half_year = '+6 months';
	
    public static function format_chart()
    {
        $half_year = strtotime(Model_chart::$_half_year);

        $q = Model_Event_list::query()
                ->related('organization')
                ->related('ticket')
                ->related('photo')
                ->where('status','=','live')
                ->where('start_at','>',date('Y-m-d'))
                ->where('end_at','<',date('Y-m-d',$half_year))
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

    public static function event_archive()
    {
        $q = Model_Event_list::query()
                        ->related('photo')
                        ->where('status','=','live')
                        ->where('end_at','<',date('Y-m-d'))
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
                $diff		= $start_date->diff($end_date);
                $no_days	= (int)$diff->format('%a') + 1;

                $chart[$c]['poster_thumb']	= Model_chart::_poster_uri($row,'thumb-');
                $chart[$c]['poster_flow']	= Model_chart::_poster_uri($row,'flow-');
                $chart[$c]['start_at']		= date('d M Y',strtotime($row['start_at']));
                $chart[$c]['end_at']		= date('d M y',strtotime($row['end_at']));
                $chart[$c]['raw_date']		= $row['start_at'];
                $chart[$c]['title']             = $row['name'];
                $chart[$c]['event_id']		= $row['id'];
                $chart[$c]['venue']		= $row['venue'];
                $chart[$c]['main_org']          = $row['organization']['name'];
                $chart[$c]['facebook']          = $row['facebook'];
                $chart[$c]['twitter']           = $row['twitter'];
                $chart[$c]['website']           = $row['website'];
                $chart[$c]['coordinate']        = $row['lat'].','.$row['long'];
                
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

    private static function _poster_uri($p,$type = '')
    {
       return Uri::create('uploads/'.$p['photo']['date'].'/'.$type.$p['photo']['filename']);
    }
}

