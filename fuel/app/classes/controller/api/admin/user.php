<?php
class Controller_Api_Admin_User extends Controller_Api_ApiPrivate
{
    public function post_write_user()
	{
		$arg = array();
		$arg['email']		= \Fuel\Core\Input::post('email');
		$arg['username']	= \Fuel\Core\Input::post('username');
		$arg['password']	= \Fuel\Core\Input::post('password');
		$arg['password2']	= \Fuel\Core\Input::post('password2');
		$arg['type']	= 'admin';
		
		$response['success'] = false;
		$response['response']= 'Passwords do not match';
		if(strcmp($arg['password'],$arg['password2']) == 0)
		{
			$response = Model_User::create_user($arg);
			$response['response'] = $arg;
		}
		
		return $this->response($response);
	}
	
	public function post_change_password()
	{
		$arg = array();
		$arg['password']	= Fuel\Core\Input::post('password');
		$arg['password2']	= Fuel\Core\Input::post('password2');
		$response			= Model_User::change_password($arg);
		
		return $this->response($response);
	}
}

