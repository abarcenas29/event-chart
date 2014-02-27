<?php
class Controller_Ajax_Chart extends Controller_Ajax_AjaxCore
{
    public function post_load_chart_detail()
	{
		$event_id	= \Fuel\Core\Input::post('event_id');
		
		$view		= $this->_cg('chart');
		$view->q	= Model_Event_list::read_public_list($event_id);
		return $view;
	}
	
	private function _cg($view)
	{
		return View::forge("chart/ajax/$view");
	}
}

