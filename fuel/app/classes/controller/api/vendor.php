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
    
    //events that is happening today
    public function post_events_today($city = 'all')
    {
        $city = Input::post('city','all');
        $c = Model_chart::event_today($city);
        return $this->response($c);
    }
}
