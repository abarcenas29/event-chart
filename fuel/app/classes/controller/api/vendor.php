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
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
        
        $city = Input::post('city','all');
        $c = Model_chart::format_chart($city);
        return $this->response($c);
    }
    
    //events that is happening today
    public function post_events_today($city = 'all')
    {
        $city = Input::post('city','all');
        $c = Model_chart::event_today($city);
        return $this->response($c);
    }
}
