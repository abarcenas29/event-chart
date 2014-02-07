<?php
class Controller_Api_Admin_Maintinance extends Controller_Api_ApiPrivate
{
    public function post_del_user()
	{
		$user_id = Input::post('user_id');	
		Model_User::delete_user($user_id);
		
		$rsp['success'] = true;
		return $this->response($rsp);
	}
	
	public function post_change_password()
	{
		$arg = array();
		$arg['password'] = Input::post('password');
		$arg['password2']= Input::post('password2');
		
		$res = Model_User::change_password($arg);
		return $this->response($res);
	}
}

