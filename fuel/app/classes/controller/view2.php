<?php
class Controller_View2 extends Controller_AppCore
{
    public $template = 'view2/template';
	
    public function action_event($event_id)
    {
        $this->_check_vaild_event($event_id);
        $q          = Model_Event_list::read_public_list($event_id);
        
        $start_date     = date('D M d Y',strtotime($q['start_at']));
        
        $view            = $this->_vg('event');
        $view->q         = $q;
        $view->org_img   = $this->_img($q);
        $view->cover     = $this->_cover($q);
        $view->start_date= $start_date;
        $view->instagram_limit = 0;
        
        $view->set_safe('sq',$q);
        
        $this->template->content = $view;
    }
    
    public function action_org()
    {
        $this->template->content = $this->_vg('organization');
    }
    
    
    private function _cover($q,$size = '')
    {
        if(!is_null($q['photo']['cover_id']))
        {
            return Uri::create('uploads/'.$q['cover']['date']."/$size".$q['cover']['filename']);
        }
        else
        {
            return Uri::create('http://placehold.it/1280x612'); 
        }
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

    private function _vg($view)
    {
        $this->template->head = View::forge('header');
        return View::forge("view2/$view");
    }
}

