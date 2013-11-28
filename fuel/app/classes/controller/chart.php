<?php
class Controller_chart extends Controller_AppCore
{
    public $template = 'chart/template';
	
	public function action_index()
	{
		$view		= $this->_cg('chart');
		$view->c	= Model_chart::format_chart();
		$view->now  = Model_chart::event_today();
		$this->template->content = $view;
	}
	
	public function action_archive()
	{
		$view		= $this->_cg('chart');
		$view->c	= Model_chart::event_archive();
		$this->template->content = $view;
	}
	
	public function action_preview($days = null)
	{
		if(is_null($days))Response::redirect('chart/index');
		$view	 = $this->_cg('chart');
		$view->c = Model_chart::event_preview($days);
		$this->template->content = $view;
	}
	
	public function action_category($category = null)
	{
		if(is_null($category))Response::redirect('chart/index');
		$view		= $this->_cg('chart');
		$view->c	= Model_chart::event_category($category);
		$view->now	= Model_chart::event_category_today($category);
		$this->template->content = $view;
	}
	
	private function _cg($view)
	{
		return View::forge("chart/$view");
	}
}