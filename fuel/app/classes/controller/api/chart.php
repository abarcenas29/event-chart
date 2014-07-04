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
        $arg['postFb']  = Input::post('postFb','0');
        
        $fb_data = Model_Event_Engine::get_fb_user_data();
        $rsp['success'] = false;
        $rsp['data']    = $fb_data['id'];
        if($fb_data['id'] == $arg['fbid'])
        {
            $rsp['success'] = true;
            $rsp['data']    = $arg['fbid'];
            Model_Event_Review::write_review($arg);
            if($arg['postFb'] == '1')
            {
                $arg['event_id'] = Session::get('event_id');
                $event           = Model_Event_list::read_public_list($arg['event_id']);
                
                $arg['title']       = $event['name'];
                $arg['event_desc']  = $event['description'];
                $arg['content'] = (empty($arg['content']))?
                    'This Event Is rated at:'.$arg['rating'].' by the user':
                    $arg['content'];
                $arg['picture'] = Uri::create('uploads/'.$event['cover']['date'].'/thumb-'.$event['cover']['filename']);
                
                Model_Event_Engine::user_publish_facebook($arg);
            }
        }
        
        return $this->response($rsp);
    }
    
    public function post_delete_review()
    {
        $post_id = Input::post('id');
        $rsp     = array();
        Model_Event_Review::delete_review($post_id);
        
        $rsp['success'] = true;
        return $this->response($rsp);
    }
    
    public function post_rating_avg()
    {
        $rsp = array();
        $rsp['success'] = true;
        $rsp['data']    = Model_Event_Review::get_average();
        return $this->response($rsp);
    }
}