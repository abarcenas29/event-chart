<?php
class Controller_Api_Admin_Event extends Controller_Api_ApiPrivate
{
    public function post_event_data()
    {
        $event_id = Input::post('fbid');
        
        $data = Model_Event_Engine::event_data($event_id);
        $data['start_time'] = $this->_convert_date($data['start_time']);
        $data['end_time']   = $this->_convert_date($data['end_time']);
        
        return $this->response($data);
    }
    
    public function post_org_contact_info()
    {
        $org_id = Input::post('org_id');
        
        $q      = Model_Organization::read_organization($org_id);
        
        $response = array();
        $response['email']      = $q['email'];
        $response['facebook']   = $q['facebook'];
        $response['twitter']    = $q['twitter'];
        $response['website']    = $q['website'];
        
        return $this->response($response);
    }

    //Get Pictures
    
    //new	
    public function post_add()
    {
        $arg	  = $this->_set_arg();
        $response = Model_Event_list::write_event($arg);
        (isset($response['success']))?$this->_insert_cover_img($response['id'],$arg):'';
        return $this->response($response);
    }

    //new
    public function post_edit()
    {
        $arg = $this->_set_arg();
        $arg['event_id']= Session::get('event_id');

        $response = Model_Event_list::edit_event($arg);
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
        $arg		= array();
        $arg['hash_id'] = Input::post('hashtagid');
        $arg['event_id']= Session::get('event_id');
        $rsp['success']	= Model_Event_Hashtag::delete_hashtag($arg);
        return $this->response($rsp);
    }

    //new
    public function post_delete_cat()
    {
        $arg = array();
        $arg['id']       = Input::post('catid');
        $arg['event_id'] = Session::get('event_id');

        Model_Event_Category::remove_cat($arg);
        $response['success'] = true;

        return $this->response($response);
    }

    //new
    public function post_delete_org()
    {
        $arg = array();
        $arg['org']		= Input::post('orgid');
        $arg['event_id']	= Session::get('event_id');

        Model_Event_Organization::remove_org($arg);
        $response['success'] = true;

        return $this->response($response);
    }

    public function post_share_event()
    {
        $arg		= array();
        $arg['content'] = Input::post('content');
        $arg['url']	= Uri::create('view/event/'.Input::post('event_id'));

        $rsp['twitter'] = Model_broadcast::post_twitter($arg);
        $rsp['facebook']= Model_broadcast::post_facebook($arg);

        $rsp['success'] = true;
        return $this->response($rsp);
    }

    private function _insert_cover_img($event_id,$arg)
    {
        $cover = Model_Event_Engine::event_cover($arg['fbid']);
        
        $offset = array();
        $offset['x'] = $cover['offset-x'];
        $offset['y'] = $cover['offset-y'];
        
        $param = array();
        $param['event_id'] = $event_id;
        $param['url']      = $cover['url'];
        $param['param']    = json_encode($offset);
        $param['width']    = 1280;
        
        Model_Event_list::insert_cover_picture_url($param);
    }


    private function _convert_date($date)
    {
        $sraw_date  = explode('T',$date);
        $raw_date   = strtotime($sraw_date[0]);
        return date('Y-m-d',$raw_date);
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
        $arg['lng']	= Input::post('lng');
        $arg['lat']	= Input::post('lat');
        $arg['facebook']= Input::post('facebook');
        $arg['twitter']	= Input::post('twitter');
        $arg['website']	= Input::post('website');
        $arg['desc']	= trim(Input::post('desc'));
        
        $arg['fbid']            = Input::post('fbid',null);
        $arg['fb-update']       = Input::post('fb-update',null);
        $arg['event-official']  = Input::post('fb-offical-id',null);
        
        return $arg;
    }
}