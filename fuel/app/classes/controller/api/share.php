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
}

