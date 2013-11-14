<?php
class Controller_View extends Controller_AppCore
{
    public $template = 'event/template';
	
	public function action_event($event_id)
	{
		$url = Uri::create("view/event/$event_id");
		
		$rest_cfg = Config::get('ec.qr_generator');
	
		$headers['X-Mashape-Authorization'] = $rest_cfg['key'];
		$parameter['content'] = $url;
		$parameter['size']	  = 10;
		$parameter['type']	  = 'url';
		$rsp = \unirest\unirest::get($rest_cfg['url'], $headers, $parameter);
		
		$view		= $this->_vg('event');
		$view->q	= Model_Event_list::read_public_list($event_id);
		$view->qr	= $rsp->body;
		$this->template->content = $view;
	}
	
	private function _vg($view)
	{
		return View::forge("event/$view");
	}
}

