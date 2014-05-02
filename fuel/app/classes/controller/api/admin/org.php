<?php
class Controller_Api_Admin_Org extends Controller_Api_ApiPrivate
{
    public function post_write()
    {
        $arg = $this->_set_arg();

        $response = Model_Organization::insert_organization($arg);
        
        ($response['success'])?
            $this->_insert_facebook_profile($arg,$response):'';
        
        return $this->response($response);
    }

    public function post_edit()
    {
        $arg		= $this->_set_arg();
        $arg['org_id']	= Session::get('org_id');
        $response	= Model_Organization::edit_organization($arg);

        return $this->response($response);
    }
	
    public function post_event_data()
    {
        $event_id = Input::post('fbid');    
        $data = Model_Event_Engine::event_data($event_id);       
        return $this->response($data);
    }
    
    private function _insert_facebook_profile($arg,$rsp)
    {
        $param              = array();
        $param['org_id']    = $rsp['id'];
        $param['url']       = Model_Event_Engine::page_profile_picture($arg['facebook']);
        $param['width']     = 1280;
        Model_Organization::insert_org_logo_url($param);
    }
        
    private function _set_arg()
    {
        $arg			= array();
        $arg['name']		= Input::post('name');
        $arg['email']		= Input::post('email');
        $arg['description']	= Input::post('description');
        $arg['facebook']	= Input::post('facebook');
        $arg['twitter']		= Input::post('twitter');
        $arg['website']		= Input::post('website');

        $arg['width']		= 520;
        $arg['filename']	= Input::post('filename',null);
        $arg['value']		= Input::post('value',null);
        return $arg;
    }
}

