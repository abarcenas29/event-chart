<?php
class Controller_Feeds extends Controller
{
    public function action_rss($city = 'all')
    {
        $q = Model_chart::format_chart($city);
        $rss = View::forge('feeds/rss');
        $rss->set_safe('xml',Model_Rss::create_feed_array());
        return $rss;
    }
    
    public function action_iframe($city = 'all')
    {
        $q = Model_chart::format_chart($city);
        
        $view = View::forge('feeds/iframe');
        $view->c    = $q;
        $view->today= Model_chart::event_today($city);
        
        return $view;
    }
}
