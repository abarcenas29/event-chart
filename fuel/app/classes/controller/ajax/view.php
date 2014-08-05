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
        
        $cover_photo            = View::forge('chart2/ajax/subevent/coverphoto');
        $cover_photo->q         = $q;
        $cover_photo->cover     = $this->_cover($q);
        $cover_photo->org_img   = $this->_img($q,'thumb-');
        
        $nav = View::forge('chart2/ajax/subevent/navigation');
        $nav->start_date = $start_date;
        $nav->end_date   = $end_date;
        
        $detail     = View::forge('chart2/ajax/subevent/detail');
        $detail->q  = $q;
        $detail->set_safe('sq',$q['description']);
        
        $view               = View::forge('chart2/ajax/event');
        $view->cover_photo  = $cover_photo;
        $view->navigation   = $nav;
        $view->detail       = $detail;
        $view->q            = $q;
        
        return $view;
    }
    
    public function post_event_posters()
    {
        $event_id = Session::get('event_id');
        $q = Model_Event_Poster::query()
                ->where('event_id','=',$event_id)
                ->get();
        
        $view    = View::forge('view2/subcat/poster');
        $view->q = $q;
        
        return $view;
    }
    
    public function post_event_instagram()
    {
        $arg['event_id'] = Session::get('event_id');
        $arg['page']     = 1;

        Model_Event_Instagram::insert_photos($arg);
        $q = Model_Event_Instagram::read_photos($arg);

        $view = View::forge('view2/subcat/instagram');
        $view->q = $q;

        return $view;
    }
    
    public function post_event_instagram_pagination()
    {
        $arg['event_id'] = Session::get('event_id');
        $arg['page']     = Input::post('page',1);
        
        $q = Model_Event_Instagram::read_photos($arg);
        
        if($q === false){
            return 'false';
        }
        
        $view    = View::forge('view2/subcat/instagram_pagination');
        $view->q = $q;
        $view->page = $arg['page'] + 1;
        
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

