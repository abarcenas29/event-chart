<?php
class Controller_Admin_Dashboard extends Controller_Admin_AdminCore 
{
	public $template = 'admin/dashboard/template';
	
	/*
	 * Socail API testing
	 */
	public function action_social()
	{
		/*
		$settings = Config::get('ec.twitter');
		$url	  = 'https://api.twitter.com/1.1/search/tweets.json';
		$rm		  = 'GET';
		//$field	  = '?q=%23BestofAnime2013&rpp=5&include_entities=true&result_type=mixed';
		$field	  = '?q=#bestofanime2013';
		
		https://graph.facebook.com/UPAME
		
		$t = new \stwitter\twitter($settings);
		*/
		$cfg	= Config::get('ec.facebook');
		$f		= new facebook\fb($cfg);
		$user	= $f->getUser();
		
		if(!$user)
		{
			Response::redirect($f->getLoginUrl());
		}
		
		$view = $this->_db('social');
		$q = urlencode('upame');
		$view->content = $f->api('/me');
		$view->url	   = ($user)?$f->getLogoutUrl():'';
		$this->template->content = $view;
	}
	
	/*
	 * Event Function set
	 */
	public function action_index($page = 1)
	{
		$data = Model_Event_list::admin_index_event($page);
		$view			= $this->_db('event_index');
		$view->q		= $data['data'];
		$view->pages	= $data['total_page'];
		
		$this->template->content = $view;
	}
	
	public function action_event_add()
	{
		$view			= $this->_db('event_add');
		$view->action	= \Fuel\Core\Uri::create('api/admin/event/add.json');
		$view->title	= 'Add New Event';
		$view->orgs		= Model_Organization::admin_ll_index();
		$this->template->content = $view;
	}
	
	public function action_event_manage($event_id)
	{
		Fuel\Core\Session::set('event_id',$event_id);
		$categories		= Fuel\Core\Config::get('ec.categories');
		$guest_type		= Config::get('ec.guest_type');
		asort($categories);
		asort($guest_type);
		
		$view			= $this->_db('event_manage');
		$view->q		= Model_Event_list::read_list();
		$view->orgs		= Model_Organization::admin_ll_index();
		$view->title	= 'Edit Event Information';
		$view->regions	= Model_region::region_index();
		$view->cats		= $categories;
		$view->g_type	= $guest_type;
		
		$view->edit_action		= Uri::create('api/admin/event/edit.json');
		$view->venue_action		= Uri::create('api/admin/event/venue.json');
		$view->poster_action	= Uri::create('ajax/admin/event/add_poster.json');
		$view->poster_d_action	= Uri::create('api/admin/event/del_poster.json');
		$view->ticket_action	= Uri::create('ajax/admin/event/add_ticket');
		$view->ticket_d_action	= Uri::create('api/admin/event/del_ticket');
		$view->guest_action		= Uri::create('ajax/admin/event/add_guest');
		$view->guest_d_action	= Uri::create('api/admin/event/del_guest');
		$view->cat_action		= Uri::create('api/admin/event/toggle_cat.json');
		
		$this->template->content = $view;
	}

	public function action_event_delete($event_id)
	{
		Model_Event_list::delete_event($event_id);
		Response::redirect('admin/dashboard/index');
	}
	
	public function action_event_visibility($id)
	{
		Model_Event_list::toggle_visibility($id);
		Response::redirect('admin/dashboard/index');
	}
	
	/*
	 * Organizer Function set
	 */
	public function action_org_index($page = 1)
	{
		$data			= Model_Organization::admin_index($page);
		$view			= $this->_db('org_index');
		$view->q		= $data['data'];
		$view->pages	= $data['total_page'];
		
		$this->template->content = $view;
	}
	
	public function action_org_add()
	{
		$view		 = $this->_db('org_form');
		$view->action= Fuel\Core\Uri::create('api/admin/org/write.json');
		$view->title = ' Add Organization';
		$this->template->content = $view;
	}
	
	public function action_org_edit($id)
	{
		\Fuel\Core\Session::set('org_id',$id);
		$view		 = $this->_db('org_form');
		$view->title = ' Edit Organization';
		$view->action= Fuel\Core\Uri::create('api/admin/org/edit.json');
		$view->q	 = Model_Organization::read_organization($id);
		$this->template->content = $view;
	}
	
	/*
	 *  User Function set
	 */
	public function action_user_index()
	{
		$view		= $this->_db('user_index');
		$view->q	= Model_User::admin_index();
		$this->template->content = $view;
	}
	
	public function action_user_add()
	{
		$view = $this->_db('user_form');
		$view->title = 'Add User';
		$view->action= \Fuel\Core\Uri::create('api/admin/user/write_user.json');
		$this->template->content = $view;
	}
	
	public function action_change_password()
	{
		$view = $this->_db('user_pass');
		$view->title = 'Change Password';
		$view->action= \Fuel\Core\Uri::create('api/admin/user/change_password.json');
		$this->template->content = $view;
	}
	
	public function action_user_delete($user_id)
	{
		Model_User::delete_user($user_id);
		Fuel\Core\Response::redirect('admin/dashboard/user_index');
	}
	
	private function _db($view)
	{
		return \Fuel\Core\View::forge("admin/dashboard/$view");
	}
}

