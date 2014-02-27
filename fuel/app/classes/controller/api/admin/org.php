<?php
class Controller_Api_Admin_Org extends Controller_Api_ApiPrivate
{
    public function post_write()
	{
		$arg				= $this->_set_arg();
		
		$response = Model_Organization::insert_organization($arg);
		return $this->response($response);
	}
	
	public function post_edit()
	{
		$arg			= $this->_set_arg();
		$arg['org_id']	= Session::get('org_id');
		$response		= Model_Organization::edit_organization($arg);
		
		return $this->response($response);
	}
	
	private function _set_arg()
	{
		$arg				= array();
		$arg['name']		= Input::post('name');
		$arg['email']		= Input::post('email');
		$arg['description']	= Input::post('description');
		$arg['facebook']	= Input::post('facebook');
		$arg['twitter']		= Input::post('twitter');
		$arg['website']		= Input::post('website');
		
		$arg['width']		= 520;
		$arg['filename']	= Input::post('filename',null);
		$arg['value']		= Input::post('value',null);
		return $arg;
	}
}

