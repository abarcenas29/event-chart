<?php

/*  
 *  Handles the Facebook Event Data Parse
 */

class Model_Event_Engine extends Model_ModelCore
{
    //temporary credentials
    private static $_appId  = '457912137584482';
    private static $_secret = 'edb52e29d79ce5d47298cd73227bc3ab';
    private static $_token  = 'CAAGgdZCpMj2IBAKZCdC02OIh3CcK7ruRtDDkvAurmLSd3ZBRzSuahyqHUD7jNPhebZA1UpYXA5yXtihwy6Us7xQSdKMcxqNDNZBTe10CnkYW27DKqMBElPHqG5XZC5lqsS4CSGNUS3yOnmiPQOHNebY90OWH5ViKE0TDPdtOwuGZAfbZATbmQmq6pfZCQLOOeswwZD';
    private static $_event  = '621129704608422';
    
    //Parse the contents of the event data
    public static function event_data($event_id)
    {
        $f = Model_Event_Engine::_auth_facebook();
        return Model_Event_Engine::_api_call($event_id);
    }
    
    //Parse cover photo
    public static function event_cover()
    {
        $f = Model_Event_Engine::_auth_facebook();
        return Model_Event_Engine::_api_call(Model_Event_Engine::$_event.'?fields=cover');
    }
    
    //Parse the contents of the event photos
    public static function event_photos()
    {
        $f = Model_Event_Engine::_auth_facebook();
        return Model_Event_Engine::_api_call(Model_Event_Engine::$_event.'/photos');
    }
    
    //feeds
    public static function event_feeds()
    {
        $f = Model_Event_Engine::_auth_facebook();
        return Model_Event_Engine::_api_call(Model_Event_Engine::$_event.'/feed');
    }
    
    //prevent 
    private static function _api_call($api_link)
    {
        $f = Model_Event_Engine::_auth_facebook();
        
        try 
        {
            return $f->api('/'.$api_link);
        } 
        catch (Exception $e) 
        {
            return false;
        }
    }
    
    private static function _auth_facebook()
    {
        //temporary
        $cfg['appId']   = Model_Event_Engine::$_appId;
        $cfg['secret']  = Model_Event_Engine::$_secret;
        
        $f = new facebook\fb($cfg);
        $f->setAccessToken(Model_Event_Engine::$_token);
        return $f;
    }
}
