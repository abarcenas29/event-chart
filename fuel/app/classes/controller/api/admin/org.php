<?php
class Controller_Api_Admin_Org extends Controller_Api_ApiPrivate
{
    public function post_write()
	{
		$arg				= $this->_set_arg();
		$arg['action']		= 'add';
		
		$response = Model_Organization::insert_organization($arg);
		return $this->response($response);
	}
	
	public function post_edit()
	{
		$arg			= $this->_set_arg();
		$arg['org_id']	= \Fuel\Core\Session::get('org_id');
		$arg['action']	= 'edit';
		$response		= Model_Organization::insert_organization($arg);
		
		return $this->response($response);
	}
	
	private function _set_arg()
	{
		$arg				= array();
		$arg['name']		= \Fuel\Core\Input::post('name');
		$arg['email']		= \Fuel\Core\Input::post('email');
		$arg['description']	= \Fuel\Core\Input::post('description');
		$arg['facebook']	= \Fuel\Core\Input::post('facebook');
		$arg['twitter']		= \Fuel\Core\Input::post('twitter');
		$arg['website']		= \Fuel\Core\Input::post('website');
		
		$arg['width']		= 520;
		$arg['photo_name']	= \Fuel\Core\Input::post('photo_name',null);
		$arg['file']		= \Fuel\Core\Input::post('file',null);
		return $arg;
	}
}

