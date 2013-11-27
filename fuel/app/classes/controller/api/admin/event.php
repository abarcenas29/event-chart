<?php
class Controller_Api_Admin_Event extends Controller_Api_ApiPrivate
{
    public function post_add()
	{
		$arg	  = $this->_set_arg();
		$response = Model_Event_list::write_event($arg);
		return $this->response($response);
	}
	
	public function post_edit()
	{
		$arg			= $this->_set_arg();
		$arg['event_id']= \Fuel\Core\Session::get('event_id');
		$arg['action']  = 'edit';
		
		$response		= Model_Event_list::edit_event($arg);
		return $this->response($response);
	}
	
	public function post_venue()
	{
		$arg			= array();
		$arg['lat']		= Input::post('lat');
		$arg['long']	= Input::post('long');
		$arg['venue']	= Input::post('venue');
		$arg['event_id']= Fuel\Core\Session::get('event_id');
		$response		= Model_Event_list::write_venue($arg);
		return $this->response($response);
	}
	
	
	public function post_del_poster()
	{
		$arg = array();
		$arg['photo_id'] = Input::post('photo_id');
		$arg['event_id'] = \Fuel\Core\Session::get('event_id');
		$response		 = Model_Event_Poster::delete_poster($arg);
		return $this->response($response);
	}
	
	public function post_del_ticket()
	{
		$arg = array();
		$arg['event_id'] = Session::get('event_id');
		$arg['ticket_id']= Input::post('id');
		
		$response['success'] = Model_Event_Ticket::delete_price($arg);
		return $this->response($response);
	}
	
	public function post_del_guest()
	{
		$arg = array();
		$arg['guest_id'] = Input::post('id');
		$arg['event_id'] = Session::get('event_id');
		$response['success'] = Model_Event_Guest::delete_guest($arg);
		return $this->response($response);
	}
	
	public function post_del_hashtag()
	{
		$arg			= array();
		$arg['hash_id'] = Input::post('id');
		$arg['event_id']= Session::get('event_id');
		$rsp['success']	= Model_Event_Hashtag::delete_hashtag($arg);
		return $this->response($rsp);
	}
	
	public function post_toggle_cat()
	{
		$arg = array();
		$arg['cat_id']	= Input::post('id');
		$arg['cat']		= Input::post('cat');
		$arg['event_id']= Session::get('event_id');
		if($arg['cat_id'] == 0)
		{
			$response['id'] = Model_Event_Category::insert_org($arg);
		}
		else 
		{
			$response['id'] = Model_Event_Category::remove_org($arg);
		}
		return $this->response($response);
	}
	
	public function post_toggle_org()
	{
		$arg = array();
		$arg['org']			= Input::post('org');
		$arg['eorg']		= Input::post('eorg');
		$arg['event_id']	= Session::get('event_id');
		if($arg['eorg'] == 0)
		{
			$response['id'] = Model_Event_Organization::insert_org($arg);
		}
		else
		{
			$response['id'] = Model_Event_Organization::remove_org($arg);
		}
		return $this->response($response);
	}
	
	public function post_share_event()
	{
		$cfg = Config::get('ec.twitter');
		$uri = Uri::create('view/event/'.Input::post('event_id'));
		
		$arg			= array();
		$arg['status']	= Input::post('content').' '.$uri;
		
		//twitter
		$t_url  = 'https://api.twitter.com/1.1/statuses/update.json';
		$rm		= 'POST';
		$t		= new \stwitter\twitter($cfg);
		
		$t->buildOauth($t_url,$rm)->setPostfields($arg)->performRequest();
		
		
		//facebook
		$cfg	= Config::get('ec.facebook');
		$fb_id	= Config::get('ec.fb_page_id');
		
		$fb_key['key'] = 'fb_access_token';
		$access = Model_const::read_key($fb_key);
		$f		= new facebook\fb($cfg);
		$f->setAccessToken($access['value']);
		
		$p = 'User is not logged in';
		if($f->getUser())
		{
			$u			= $f->api('/me');
			$fb_page	= $f->api('/'.$u['id'].'/accounts');
			
			foreach($fb_page['data'] as $page)
			{
				if($page['id'] == $fb_id)
				{
					break;
				}
			}
			
			$fb					= array();
			$fb['link']			= $uri;
			$fb['message']		= Input::post('content');
			$fb['access_token']	= $page['access_token'];
			
			$p = $f->api("$fb_id/feed",'POST',$fb);
		}
		
		$rsp['success'] = true;
		$rsp['response']= $p;
		return $this->response($rsp);
	}
	
	private function _set_arg()
	{
		$arg			= array();
		$arg['name']	= Input::post('name');
		$arg['desc']	= Input::post('description');
		$arg['email']	= Input::post('email');
		$arg['main_org']= Input::post('main_org');
		$arg['start_at']= Input::post('start_at');
		$arg['end_at']	= Input::post('end_at');
		$arg['facebook']= str_replace('http://facebook.com/','',Input::post('facebook'));
		$arg['twitter'] = str_replace('http://twitter.com/','',Input::post('twitter'));
		$arg['website'] = str_replace('http://','',Input::post('website'));
		
		$arg['width']		= 1280;
		$arg['photo_name']	= Input::post('photo_name',null);
		$arg['file']		= Input::post('file',null);
		$arg['action']		= 'add';
		return $arg;
	}
}