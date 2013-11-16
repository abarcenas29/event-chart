<?php

class Controller_AppCore extends \Fuel\Core\Controller_Template 
{
	protected function _check_session()
	{
		$are_u_logged = Session::get('user_id',null);
		if(is_null($are_u_logged))Response::redirect('admin/login/index');
	}
	
	protected function _check_vaild_event($id)
	{
		$q = Model_Event_list::read_public_list($id);
		if(!isset($q['id']))Response::redirect(Uri::base());
	}
	
	protected function _check_valid_org($id)
	{
		$q = Model_Organization::read_organization($id);
		if(!isset($q['id']))Response::redirect(Uri::base());
	}
}

