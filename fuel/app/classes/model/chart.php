<?php
//Custom Chart Model
class Model_chart extends Model
{
    private static $_half_year = '+6 months';

    public static function format_chart($city)
    {
        $half_year = strtotime(Model_chart::$_half_year);

        $q = Model_Event_list::query()
                ->related('cover')
                ->where('status','=','live')
                ->where('start_at','>',date('Y-m-d'))
                ->where('end_at','< ',date('Y-m-d',$half_year))
                ->order_by('start_at','asc');
        
        if($city != 'all')$q->where('region','=',$city);
        
        return Model_chart::_prepare_chart($q->get());
    }

    public static function is_event_now($event_id)
    {
        $q = Model_Event_list::query()
                ->where('id','=',$event_id)
                ->where('start_at','<=',date('Y-m-d'))
                ->where('end_at','>=',date('Y-m-d'))
                ->where('status','=','live');
        return $q->get_one();
    }
    
    public static function event_today($city = 'all')
    {
        $q = Model_Event_list::query()
                ->related('cover')
                ->where('start_at','<=',date('Y-m-d'))
                ->where('end_at','>=',date('Y-m-d'))
                ->where('status','=','live')
                ->order_by('start_at','asc');
        
        if($city != 'all')$q->where('region','=',$city);
        
        return Model_chart::_prepare_chart($q->get());
    }

    public static function event_preview($day)
    {
        $preview = strtotime("+$day days");

        $q = Model_Event_list::query()
                ->related('cover')
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
                ->related('cover')
                ->where('status','=','live')
                ->where('end_at','<',date('Y-m-d'))
                ->order_by('start_at','desc')
                ->get();
        return Model_chart::_prepare_chart($q);
    }

    public static function event_category_today($category)
    {
        $q = Model_Event_list::query()
                ->related('cover')
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
                ->related('cover')
                ->where('status','=','live')
                ->where('category.category','=',$category)
                ->where('end_at','<',date('Y-m-d',$half_year))
                ->order_by('start_at','asc')
                ->get();

        return Model_chart::_prepare_chart($q);
    }

    private static function _prepare_chart($q)
    {
        $c	= 0;
        $chart	= array();
        foreach($q as $row)
        {
            $start_date = new DateTime($row['start_at']);
            $end_date	= new DateTime($row['end_at']);
            $diff	= $start_date->diff($end_date);
            $no_days	= (int)$diff->format('%a') + 1;

            $chart[$c]['cover']         = Model_chart::_poster_uri($row,'flow-');
            $chart[$c]['thumb']         = Model_chart::_poster_uri($row,'thumb-');
            $chart[$c]['start_at']	= date('d F y',strtotime($row['start_at']));
            $chart[$c]['end_at']	= date('d F y',strtotime($row['end_at']));
            $chart[$c]['raw_date']	= $row['start_at'];
            $chart[$c]['duration']	= "$no_days days";
            $chart[$c]['title']		= $row['name'];
            $chart[$c]['event_id']	= $row['id'];
            $chart[$c]['venue']		= $row['venue'];
            $chart[$c]['link']          = Uri::create('view/event/'.$row['id']);
            
            $c++;
        }
        return $chart;
    }

    private static function _poster_uri($p,$type = '')
    {
        if(is_null($p['cover_id']))
        {
            return 'http://placehold.it/350x150';
        }
        
        return Uri::create('uploads/'.$p['cover']['date'].'/'.$type.$p['cover']['filename']);
    }
}

