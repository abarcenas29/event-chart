<?php
class Controller_View extends Controller_AppCore
{
    public $template = 'view/template';
	
	public function action_event($event_id)
	{
		$this->_check_vaild_event($event_id);
		
		$url = Uri::create("view/event/$event_id");
		$rest_cfg = Config::get('ec.qr_generator');
	
		$headers['X-Mashape-Authorization'] = $rest_cfg['key'];
		$parameter['content'] = $url;
		$parameter['size']	  = 10;
		$parameter['type']	  = 'url';
		$rsp = \unirest\unirest::get($rest_cfg['url'], $headers, $parameter);
		
		Session::set('callback_url',$url);
		
		$view		= $this->_vg('event');
		$view->q	= Model_Event_list::read_public_list($event_id);
		$view->qr	= $rsp->body;
		$view->url	= $url;
		$this->template->content = $view;
		
		$menu		= $this->_vmg('event');
		$menu->id	= $event_id;
		$this->template->menu	= $menu;
	}
	
	public function action_org($org_id)
	{
		$this->_check_valid_org($org_id);
		$q		 = Model_Organization::read_organization($org_id);
		
		$url	  = Uri::create("view/org/$org_id");
		$rest_cfg = Config::get('ec.qr_generator');
	
		$headers['X-Mashape-Authorization'] = $rest_cfg['key'];
		$parameter['content'] = $url;
		$parameter['size']	  = 10;
		$parameter['type']	  = 'url';
		$rsp = \unirest\unirest::get($rest_cfg['url'], $headers, $parameter);
		
		Session::set('callback_url',$url);
		
		$view			= $this->_vg('organization');
		$view->q		= $q;
		$view->qr		= $rsp->body;
		$view->url		= $url;
		$view->cat		= Model_View::org_unique_cat($q['event_lists']);
		$view->guests	= Model_View::org_guest_list($q['event_lists']);
		$view->price	= Model_View::org_ticket_stat($q['event_lists']);
		$this->template->content = $view;
		
		$menu = $this->_vmg('organization');
		$this->template->menu	= $menu;
	}
	
	public function action_social($event_id)
	{
		$this->_check_vaild_event($event_id);
		
		$q = Model_Event_list::read_public_list($event_id);
		$view = $this->_vg('social');
		$view->event_id	= $event_id;
		$view->title	= $q['name'];
		$this->template->content = $view;
		
		
		$menu = $this->_vmg('social');
		$menu->id = $event_id;
		$this->template->menu	= $menu;
	}
	
	private function _vg($view)
	{
		return View::forge("view/$view");
	}
	
	private function _vmg($view)
	{
		return View::forge("view/menu/$view");
	}
}

