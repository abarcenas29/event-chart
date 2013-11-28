<?php
class Controller_Api_Share extends Controller_Api_ApiCore
{
    public function post_twitter()
	{
		$arg				= array();
		$arg['status']		= Input::post('content');
		$r = Twitter\Twitter::post('1.1/statuses/update',$arg);
		$rsp['success'] = true;
		$rsp['response']= $r;
		return $rsp;
	}
	
	public function post_facebook()
	{
		$cfg	= Config::get('ec.facebook');
		$f		= new facebook\fb($cfg);
		$user	= $f->getUser();
		$rsp['success']	= true;
		$rsp['response']= 'user not logged in or invalid token';
		if($user)
		{
			$arg['link']		= Input::post('fb-url');
			$arg['message']		= Input::post('fb-message');

			$post			= $f->api('me/feed','POST',$arg);
			$rsp['success']	= true;
			$rsp['response']= $post;
		}
		
		return $rsp;
	}
}

