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
    public static function event_cover($event_id)
    {
        $f   = Model_Event_Engine::_auth_facebook();
        $rsp = Model_Event_Engine::_api_call($event_id.'?fields=cover');
        
        if(isset($rsp['cover']['source']))
        {
            $arg                = array();
            $arg['url']         = $rsp['cover']['source'];
            $arg['offset-x']    = $rsp['cover']['offset_x'];
            $arg['offset-y']    = $rsp['cover']['offset_y'];
            return $arg;
        }
        return false;
    }
    
    //Parse the contents of the event photos
    public static function fetch_event_photos($event_id)
    {
        $f   = Model_Event_Engine::_auth_facebook();
        $rsp =  Model_Event_Engine::_api_call($event_id.'/photos');
        
        $arg = array();
        $x   = 0;
        foreach($rsp['data'] as $photos)
        {
            $arg[$x]['url']             = $photos['source'];
            $arg[$x]['created_time']    = $photos['created_time'];
            $x++;
        }
        
        if(isset($rsp['paging']['next']))
        {
            $page = json_decode(file_get_contents($rsp['paging']['next']),true);
            
            foreach($page['data'] as $photos)
            {
                $arg[$x]['url'] = $photos['source'];
                $arg[$x]['created_time']    = $photos['created_time'];
                $x++;
            }
        }
        
        return $arg;
    }
    
    //feeds
    public static function event_feeds($event_id)
    {
        $f = Model_Event_Engine::_auth_facebook();
        $q = Model_Event_Engine::_api_call($event_id.'/feed');
        $arg = array();
        foreach($q['data'] as $row)
        {
            $date = new DateTime($row['created_time'],new DateTimeZone('Asia/Manila'));
            $row['created_time'] = $date->format('Y-m-d H:i:sP');
            
            $arg[] = $row;
        }
        return $q;
    }
    
    //get profile picture of the page (this is public so no api call needed)
    public static function page_profile_picture($pageName)
    {
        $url = 'https://graph.facebook.com/'.$pageName.'/picture/';
        $param = array();
        $param['redirect'] = 'false';
        $param['type']     = 'large';
        $rsp = \unirest\unirest::get($url,null,$param);
        
        return (isset($rsp->body->data->url))?$rsp->body->data->url:false;
    }
    
    //prevent no connection of timeout from facebook
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
