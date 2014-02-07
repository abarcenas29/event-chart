<?php

class Controller_Admin_Login extends Controller_AppCore 
{
	public $template = 'admin/login/template';
	
	public function action_index()
	{
		$path = DOCROOT.'assets'.DS.'img'.DS.'login';
		$images = scandir($path);
		$image	= rand(2,count($images)-1);
		
		$view = $this->_lg('login');
		$view->image = $images[$image];
		$this->template->content = $view;
	}
	
	public function action_email()
	{
		
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

