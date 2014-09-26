<?php
/*
 * These are API to be used for 3rd party integration
 */
class Controller_Api_Vendor extends Controller_Api_ApiCore 
{
    //events that will happen this past 6 months
    //city = filter the events by city/region
    public function post_events()
    {   
        $city = Input::post('city','all');
        $c = Model_chart::format_chart($city);
        return $this->response($c);
    }
    
    public function get_events2()
    {
        header('content-type: application/json; charset=utf-8');
        
        $city = Input::get('city','all');
        $c = Model_chart::format_chart($city);
        
        print $_GET['callback'] .'(' . json_encode($c).')';
    }
    
    public function get_detail_event()
    {
        header('content-type: application/json; charset=utf-8');
        
        $event_id = Input::get('event_id');
        $q        = Model_Event_list::read_public_list($event_id);
        
        $static_map  = 'http://staticmap.openstreetmap.de/';
        $static_map .= 'staticmap.php?center=[coords]&zoom=18&';
        $static_map .= 'marker=[coords]&maptype=mapnik';
        
        $array_key      = array('[coords]');
        $array_replace  = array($q['lat'].','.$q['long']);
        $map_url = str_replace($array_key,$array_replace, $static_map);
        
        $rsp = array();
        $rsp['cover']   = uri::create('uploads/'.$q['cover']['date'].'/flow-'.$q['cover']['filename']);
        $rsp['title']   = $q['name'];
        $rsp['desc']    = $q['description'];
        $rsp['map_url'] = $map_url;
        
        print $_GET['callback'].'('.json_encode($rsp).')';
    }


    //events that is happening today
    public function post_events_today($city = 'all')
    {
        $city = Input::post('city','all');
        $c = Model_chart::event_today($city);
        return $this->response($c);
    }
}
