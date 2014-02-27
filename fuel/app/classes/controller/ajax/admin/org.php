<?php
class Controller_Ajax_Admin_Org extends Controller_Ajax_PrivateCore 
{
	public function post_logo_url()
	{
		$arg = array();
		$arg['org_id'] = Session::get('org_id');
		$arg['url']	   = Input::post('url');
		$arg['width']  = 520;
		
		$view = View::forge('admin/dashboard2/ajax/one.logo.image');
		$view->q = Model_Organization::insert_org_logo_url($arg);
		
		return $view;
	}		
}
