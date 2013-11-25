<?php
class Controller_Admin_Dashboard extends Controller_Admin_AdminCore 
{
	public $template = 'admin/dashboard/template';
	
	/*
	 * Socail API testing
	 */
	public function action_social()
	{
		
		$settings = Config::get('ec.twitter');
		$url	  = 'https://api.twitter.com/1.1/search/tweets.json';
		$rm		  = 'GET';
		//$field	  = '?q=%23BestofAnime2013&rpp=5&include_entities=true&result_type=mixed';
		$field	  = '?q=%23otakuexporeload&count=100';
		
		$t		= new \stwitter\twitter($settings);
		$rsp	=  $t->setGetfield($field)->buildOauth($url,$rm)->performRequest();

		$decode = json_decode($rsp,true);

		$view		   = $this->_db('social');
		$view->content = $decode;
		$view->url	   = '';
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
		
		$q		= Model_Event_list::read_list();
		$org	= Model_Organization::admin_ll_index();
		
		$view			= $this->_db('event_manage');
		$view->q		= $q;
		
		$cat				= $this->_em('categories');
		$cat->cats			= $categories;
		$cat->q				= $q;
		$view->category_edit= $cat;
		
		$edit				= $this->_em('edit');
		$edit->q			= $q;
		$edit->edit_action	= Uri::create('api/admin/event/edit.json');
		$edit->title		= 'Edit Event Information';
		$edit->orgs			= $org;
		$view->event_edit	= $edit;
		
		$venue				= $this->_em('venue');
		$venue->regions		= Model_region::region_index();
		$venue->venue_action= Uri::create('api/admin/event/venue.json');
		$venue->q			= $q;
		$view->venue_edit	= $venue;
		
		$poster					= $this->_em('posters');
		$poster->poster_action	= Uri::create('ajax/admin/event/add_poster.json');
		$poster->q				= $q;
		$view->poster_edit		= $poster;
		
		$detail					= $this->_em('details');
		$detail->q				= $q;
		$detail->ticket_action	= Uri::create('ajax/admin/event/add_ticket');
		$detail->guest_action	= Uri::create('ajax/admin/event/add_guest');
		$detail->g_type			= $guest_type;
		$view->detail_edit		= $detail;
		
		$hashtag				= $this->_em('hashtags');
		$hashtag->hashtag_action= Uri::create('ajax/admin/event/add_hashtag');
		$hashtag->q				= $q;
		$view->hashtag_edit		= $hashtag;
		
		$org					= $this->_em('organization');
		$org->q					= $q;
		$org->orgs				= Model_Organization::admin_ll_index();
		$view->org_edit			= $org;
		
		$view->ticket_d_action	= Uri::create('api/admin/event/del_ticket');
		$view->poster_d_action	= Uri::create('api/admin/event/del_poster.json');
		$view->guest_d_action	= Uri::create('api/admin/event/del_guest');
		$view->hashtag_d_action = Uri::create('api/admin/event/del_hashtag');
		$view->cat_action		= Uri::create('api/admin/event/toggle_cat.json');
		$view->org_action		= Uri::create('api/admin/event/toggle_org.json');
		
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
	
	private function _em($view)
	{
		return View::forge("admin/dashboard/manage/$view");
	}
}

