<?php
class Controller_View extends Controller_AppCore
{
    public $template = 'event/template';
	
	public function action_event($event_id)
	{
		$view		= $this->_vg('event');
		$view->q	= Model_Event_list::read_public_list($event_id);
		$this->template->content = $view;
	}
	
	private function _vg($view)
	{
		return View::forge("event/$view");
	}
}

