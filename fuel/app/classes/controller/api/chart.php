<?php
class Controller_Api_Chart extends Controller_Api_ApiCore
{
    public function post_review()
    {
        $rsp = array();
        $arg = array();
        $arg['content'] = Input::post('content');
        $arg['rating']  = Input::post('rating');
        $arg['fbid']    = Input::post('fbid');
        $arg['is_edit'] = Input::post('edit-id');
        
        $fb_data = Model_Event_Engine::get_fb_user_data();
        $rsp['success'] = false;
        $rsp['data']    = $fb_data['id'];
        if($fb_data['id'] == $arg['fbid'])
        {
            $rsp['success'] = true;
            $rsp['data']    = $arg['fbid'];
            Model_Event_Review::write_review($arg);
        }
        
        return $this->response($rsp);
    }
}

