<?php

class Controller_AppCore extends \Fuel\Core\Controller_Template 
{
	protected function _check_session()
	{
		$are_u_logged = Fuel\Core\Session::get('user_id',null);
		if(is_null($are_u_logged))\Fuel\Core\Response::redirect('admin/login/index');
	}
}

