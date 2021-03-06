<?php
class Controller_Api_Admin_Event extends Controller_Api_ApiPrivate
{
	//new	
    public function post_add()
	{
		$arg	  = $this->_set_arg();
		$response = Model_Event_list::write_event($arg);
		return $this->response($response);
	}
	
	//new
	public function post_edit()
	{
		$arg			= $this->_set_arg();
		$arg['event_id']= Session::get('event_id');
		
		$response		= Model_Event_list::edit_event($arg);
		return $this->response($response);
	}
	
	//new
	public function post_search_venue()
	{
		$arg = array();
		$arg['search'] = Input::post('search');
		
		return $this->response(Model_region::search_venue($arg));
	}
	
	//new
	public function post_del_main_img()
	{
		$arg = array();
		$arg['event_id'] = Session::get('event_id');
		
		Model_Event_list::delete_main_picture($arg);
		$rsp['success'] = true;
		
		return $this->response($rsp);
	}
	
	//new
	public function post_del_cover_img()
	{
		$arg = array();
		$arg['event_id'] = Session::get('event_id');
		
		Model_Event_list::delete_cover_picture($arg);
		$rsp['success'] = true;
		
		return $this->response($rsp);
	}
	
	//new
	public function post_del_poster()
	{
		$arg = array();
		$arg['poster_id'] = Input::post('poster_id');
		$arg['event_id'] = Session::get('event_id');
		$response		 = Model_Event_Poster::delete_poster($arg);
		return $this->response($response);
	}
	
	//new
	public function post_del_ticket()
	{
		$arg = array();
		$arg['event_id'] = Session::get('event_id');
		$arg['ticket_id']= Input::post('ticketid');
		
		$response['success'] = Model_Event_Ticket::delete_price($arg);
		return $this->response($response);
	}
	
	//new
	public function post_del_guest()
	{
		$arg = array();
		$arg['guest_id'] = Input::post('guestid');
		$arg['event_id'] = Session::get('event_id');
		$response['success'] = Model_Event_Guest::delete_guest($arg);
		return $this->response($response);
	}
	
	//new
	public function post_del_hashtag()
	{
		$arg			= array();
		$arg['hash_id'] = Input::post('hashtagid');
		$arg['event_id']= Session::get('event_id');
		$rsp['success']	= Model_Event_Hashtag::delete_hashtag($arg);
		return $this->response($rsp);
	}
	
	//new
	public function post_delete_cat()
	{
		$arg = array();
		$arg['id']		 = Input::post('catid');
		$arg['event_id'] = Session::get('event_id');
		
		Model_Event_Category::remove_cat($arg);
		$response['success'] = true;
		
		return $this->response($response);
	}
	
	//new
	public function post_delete_org()
	{
		$arg = array();
		$arg['org']			= Input::post('orgid');
		$arg['event_id']	= Session::get('event_id');

		Model_Event_Organization::remove_org($arg);
		$response['success'] = true;
		
		return $this->response($response);
	}
	
	public function post_share_event()
	{
		$arg			= array();
		$arg['content'] = Input::post('content');
		$arg['url']		= Uri::create('view/event/'.Input::post('event_id'));
		
		$rsp['twitter'] = Model_broadcast::post_twitter($arg);
		$rsp['facebook']= Model_broadcast::post_facebook($arg);
		
		$rsp['success'] = true;
		return $this->response($rsp);
	}
	
	private function _set_arg()
	{
		$arg			= array();
		$arg['name']	= Input::post('name');
		$arg['email']	= Input::post('email');
		$arg['main_org']= Input::post('main_org');
		$arg['start_at']= Input::post('start_at');
		$arg['end_at']	= Input::post('end_at');
		$arg['venue']	= Input::post('address');
		$arg['city']	= Input::post('city');
		$arg['lng']		= Input::post('lng');
		$arg['lat']		= Input::post('lat');
		$arg['facebook']= Input::post('facebook');
		$arg['twitter']	= Input::post('twitter');
		$arg['website']	= Input::post('website');
		$arg['desc']	= trim(Input::post('desc'));
		return $arg;
	}
}