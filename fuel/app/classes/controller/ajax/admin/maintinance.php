<?php
class Controller_Ajax_Admin_Maintinance extends Controller_Ajax_PrivateCore
{
	public function before() 
	{
		$are_u_su = Session::get('su');
		if(!$are_u_su)
		{
			print 'Unauthorized user';
			print die();
		}
		
		parent::before();
	}
	
	public function action_add_user()
	{
		$arg = array();
		$arg['email']		= Input::post('email');
		$arg['username']	= Input::post('username');
		$arg['password']	= Input::post('password');
		$arg['type']		= 'admin';
		
		Model_User::create_user($arg);
		
		$view = View::forge('admin/dashboard2/ajax/maintinance.user');
		$view->q = Model_User::admin_index();
		
		return $view;
	}
}

