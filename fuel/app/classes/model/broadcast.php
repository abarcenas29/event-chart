<?php
//Non-Orm Model. Used for Broadcasting Cron Job
class Model_broadcast extends Model
{
    private static $_twitter_url = 'https://api.twitter.com/1.1/statuses/update.json';
	
	public static function post_twitter($arg)
	{
		$cfg = Config::get('ec.twitter');
		$uri = Uri::create('view/event/'.$arg['event_id']);
		
		$update				= array();
		$update['status']	= $arg['content'].' '.$uri;
		
		$t = new stwitter\twitter($cfg);
		$p = $t->buildOauth(Model_broadcast::$_twitter_url,'POST')
				->setPostfields($arg)
				->performRequest();
		return $p;
	}
	
	public static function post_facebook($arg)
	{
		$uri = Uri::create('view/event/'.$arg['event_id']);
		
		$cfg		= Config::get('ec.facebook');
		$fb_page_id = Config::get('ec.fb_page_id');
		
		$key['key'] = 'fb_access_token';
		$fbToken	= Model_const::read_key($key);
		
		$f = new facebook\fb($cfg);
		$f->setAccessToken($fbToken['value']);
		
		$user_info	= $f->api('/me');
		$fb_page	= $f->api('/'.$user_info['id'].'/accounts');
		
		foreach($fb_page['data'] as $page)
		{
			if($page['id'] == $fb_page_id)break;
		}
		$post			= array();
		$post['link']	= $uri;
		$post['message']= $arg['content'];
		
		$p = $f->api("$fb_page_id/feed",'POST',$post);
		return $p;
	}
}

