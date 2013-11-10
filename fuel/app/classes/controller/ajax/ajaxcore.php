<?php
class Controller_Ajax_AjaxCore extends \Fuel\Core\Controller
{
	public function before() 
	{
		parent::before();
		$are_u_logged = Fuel\Core\Session::get('user_id',null);
		if(is_null($are_u_logged))\Fuel\Core\Response::redirect('admin/login/index');
	}
}

