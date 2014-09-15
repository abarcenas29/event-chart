<?php
namespace Fuel\Tasks;

class facebook
{
    public static function run()
    {
        \Fuel::$env = \Fuel::PRODUCTION;
        \Log::info('Facebook Scrape Initilazing');
        
        $event_ids = self::_fetch_fb_ids();
        
        self::_fetch_data($event_ids);
        self::_fetch_photos($event_ids);
    }
    
    //Run this once a week
    public static function run_cover()
    {
        \Fuel::$env = \Fuel::PRODUCTION;
        \Log::info('Facebook Scrape Initilazing');
        
        $event_ids = self::_fetch_fb_ids();
        self::_delete_cover_photos($event_ids);
        self::_fetch_cover_photos($event_ids);
    }
    
    private static function _delete_cover_photos($event_ids)
    {
        foreach($event_ids as $id)
        {
            \Model_Event_list::fb_cover_photos_delete_task($id);
        }
    }

    private static function _fetch_cover_photos($event_ids)
    {
        foreach($event_ids as $id)
        {
            \Model_Event_list::fb_cover_photo_task($id);
        }
    }

    private static function _fetch_photos($event_ids)
    {
        foreach($event_ids as $row){
            \Model_Event_Poster::fb_write_poster_url($row);
        }
    }
    
    private static function _fetch_data($event_ids)
    {
        foreach($event_ids as $row)
        {
            $data = \Model_Event_Engine::event_data($row);
            \Model_Event_list::facebook_write_data($data,$row);
        }
    }
    
    private static function _fetch_fb_ids()
    {
        $events_pending = \Model_chart::format_chart('all');
        $events_now     = \Model_chart::event_today();
        $events_all     = array_merge($events_pending,$events_now);
        
        //get event_ids
        $event_ids = array();
        foreach($events_all as $row){
            $event_ids[] = $row['event_id'];
        }
        
        //submit to get facebook id
        $fb_event_ids = array();
        if(count($event_ids) > 0)
        {
            $fb_event_ids = \Model_Event_list::get_facebook_ids($event_ids);
            
            $event_ids = array();
            foreach($fb_event_ids as $row)
            {
                $event_ids[] = $row['fb_event_id'];
            }
        }
        return $event_ids;
    }
}
