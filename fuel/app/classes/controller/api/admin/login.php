<?php
class Controller_Api_Admin_Login extends Controller_Api_ApiCore
{
    public function post_validate()
	{
		$arg = array();
		$arg['email']		= \Fuel\Core\Input::post('email');
		$arg['password']	= \Fuel\Core\Input::post('password');
		
		$response = Model_User::validate_user($arg);
		
		return $this->response($response);
	}
}