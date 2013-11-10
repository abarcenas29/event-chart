<?php

class Controller_Admin_Login extends Controller_AppCore 
{
	public $template = 'admin/login/template';
	
	public function action_index()
	{
		$view = $this->_lg('login');
		$this->template->content = $view;
	}
	
	public function action_logout()
	{
		Fuel\Core\Session::destroy();
		\Fuel\Core\Response::redirect('admin/login');
	}
	
	private function _lg($view)
	{
		return $view = \Fuel\Core\View::forge("admin/login/$view");
	}
}

