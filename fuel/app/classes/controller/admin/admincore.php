<?php
class Controller_Admin_AdminCore extends Controller_AppCore 
{
	public function before() 
	{
		parent::before();
		$this->_check_session();
	}
}
