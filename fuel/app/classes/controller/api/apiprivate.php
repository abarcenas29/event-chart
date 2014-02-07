<?php
class Controller_Api_ApiPrivate extends Controller_Api_ApiCore
{
    public function before() 
	{
		parent::before();
		$are_u_logged = Session::get('user_id',null);
		if(is_null($are_u_logged))
		{
			print 'Unauthorized user';
			print die();
		}
	}
}

