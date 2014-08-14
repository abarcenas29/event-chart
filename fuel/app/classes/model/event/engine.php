<?php

/*  
 *  Handles the Facebook Event Data Parse
 */

class Model_Event_Engine extends Model_ModelCore
{
    //temporary credentials
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
                $arg[$x]['url']             = $photos['source'];
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
    
    /*
     * Functions with no Access tokens
     */
    public static function is_fb_logged()
    {
        $f = Model_Event_Engine::user_auth_facebook();
        $getUserData = $f->getUser();
        if($getUserData)
        {
            try 
            {
                $user_profile = $f->api('/me','GET');
                return true; 
            } 
            catch (Exception $ex) 
            {}
        }
        return false;
    }
    
    public static function get_fb_user_data()
    {
        $f = Model_Event_Engine::user_auth_facebook();
        try
        {
            return $f->api('/me');
        }
        catch (\facebook\FacebookApiException $e)
        {}
        return null;
    }
    
    public static function get_fb_login_link()
    {
        $f      = Model_Event_Engine::user_auth_facebook();
        $scope  = array(
            'scope'=>'email,publish_actions',
            'redirect_uri'=>  Uri::base()); 
        return $f->getLoginUrl($scope);
    }
    
    public static function user_auth_facebook()
    {
        $cfg['appId']   = Model_Event_Engine::$_appId;
        $cfg['secret']  = Model_Event_Engine::$_secret;
        $token = Session::get('fb_token',null); 
        
        $f = new facebook\fb($cfg);
        
        if(!is_null($token))
        {
            $f->setAccessToken($token);
        }
        
        return $f;
    }
    
    public static function user_publish_facebook($arg)
    {
        $f = Model_Event_Engine::user_auth_facebook();
        try
        {
            $obj = array();
            $obj['link']        = Uri::create('chart2/'.$arg['event_id']);
            $obj['name']        = $arg['title'];
            $obj['message']     = $arg['content'];
            $obj['picture']     = $arg['picture'];
            $obj['description'] = $arg['event_desc'];
            $f->api('/me/feed','POST',$obj);
            return true;
        }
        catch(facebook\FacebookApiException $e)
        {
            return $e->getMessage();
        }
        return null;
    }


    private static function _auth_facebook()
    {
        //temporary
        $cfg['appId']   = Model_const::read_one_key('fb_appid')['value'];
        $cfg['secret']  = Model_const::read_one_key('fb_secret')['value'];
        $token = Model_const::read_one_key('fb_access_token')['value'];
        
        $f = new facebook\fb($cfg);
        $f->setAccessToken($token);
        return $f;
    }
}
