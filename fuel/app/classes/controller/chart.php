<?php
class Controller_chart extends Controller_AppCore
{
    public $template = 'chart/template';
	
	public function action_index()
	{
		$view		= $this->_cg('chart');
		$view->c	= Model_chart::format_chart();
		$this->template->content = $view;
	}
	
	private function _cg($view)
	{
		return View::forge("chart/$view");
	}
}

