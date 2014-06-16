<?php
class Controller_Ajax_View extends Controller_Ajax_AjaxCore
{
    public function post_event_detail()
    {
        $event_id = Input::post('id');
        
        Session::set('event_id',$event_id);
        $q              = Model_Event_list::read_public_list($event_id); 
        $start_date     = date('D, M d Y',strtotime($q['start_at']));
        $end_date       = date('D, M d Y',strtotime($q['end_at']));
        
        $view           = View::forge('chart2/ajax/event');
        $view->q        = $q;
        $view->org_img  = $this->_img($q,'thumb-');
        $view->cover    = $this->_cover($q);
        $view->start_date= $start_date;
        $view->end_date  = $end_date;
        $view->set_safe('sq',$q['description']);
        
        return $view;
    }
    
    public function post_instagram()
    {
        $arg['event_id'] = Input::post('event_id');
        $arg['page']	 = Input::post('page',0);

        Model_Event_Instagram::insert_photos($arg);
        $rsp = Model_Event_Instagram::read_photos($arg);

        $view = View::forge('view/ajax/instagram');
        $view->rsp = $rsp;

        return $view;
    }

    public function post_page_instagram()
    {
        $arg['event_id']	= Input::post('event_id');
        $arg['page']		= Input::post('page');
        $rsp = Model_Event_Instagram::read_photos($arg);

        $view = View::forge('view/ajax/instagram_page');
        $view->rsp = $rsp;

        return $view;
    }

    public function post_twitter()
    {
        $arg['event_id']	= Input::post('event_id');
        $arg['page']		= Input::post('page',0);

        Model_Event_Twitter::insert_twitter($arg);
        $rsp = Model_Event_Twitter::read_feed($arg);

        $view		= View::forge('view/ajax/twitter');
        $view->rsp	= $rsp;
        return $view;
    }

    public function post_page_twitter()
    {
        $arg['event_id']	= Input::post('event_id');
        $arg['page']		= Input::post('page',0);

        $rsp = Model_Event_Twitter::read_feed($arg);
        $view= View::forge('view/ajax/twitter_page');
        $view->rsp = $rsp;
        return $view;
    }
    
    private function _img($q,$size = '')
    {
        if(!is_null($q['organization']['photo_id']))
        {
            return Uri::create('uploads/'.$q['organization']['photo']['date']."/$size".$q['organization']['photo']['filename']);
        }
        else
        {
            return Uri::create('http://placehold.it/400x400');
        }
    }
    
    private function _cover($q,$size = '')
    {
        if(!is_null($q['cover']))
        {
            return Uri::create('uploads/'.$q['cover']['date']."/$size".$q['cover']['filename']);
        }
        else
        {
            return Uri::create('http://placehold.it/1280x612'); 
        }
    }
}

