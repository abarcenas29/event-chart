<?php
class Controller_View extends Controller_AppCore
{
    public $template = 'template';

    public function action_event($event_id = null)
    {
       $q = Model_Event_list::read_public_list($event_id);
       if(is_null($event_id) || count($q) !== 1)
       {
            Response::redirect(Uri::base());
       }
       
       $hashtags = array();
       foreach($q['hashtags'] as $row)
       {
           $hashtags[] = '#'.$row['hashtag'];
       }
       
       $category = array();
       foreach($q['category'] as $row)
       {
           $category[] = $row['category'];
       }
       
       $cover_img       = Uri::create('uploads/'.$q['cover']['date'].'/'.$q['cover']['filename']);
       $view            = $this->_eg('event');
       $view->q         = $q;
       $view->set_safe('desc',$q['description']);
       $view->cover     = $cover_img;
       $view->calendar  = $this->_google_event($q);
       $view->hashtag   = implode(', ',$hashtags);
       $view->category  = implode(', ',$category);
       $view->share_fb  = $this->_facebook_share($event_id);
       
       $this->template->header  = View::forge('header');
       $this->template->content = $view;
    }
    
    private function _facebook_share($event_id)
    {
        $url = 'https://www.facebook.com/sharer.php?app_id=[app-id]&sdk=joey&u=[url]&display=popup&ref=plugin';
        
        $keyword = array(
            '[app-id]',
            '[url]'
        );
        $replaced = array(
            Config::get('ec.facebook.appId'),
            urldecode(Uri::create('view/event/').$event_id)
        );
        return str_replace($keyword,$replaced,$url);
    }
    
    private function _google_event($q)
    {
        $url = 'https://www.google.com/calendar/render?action=TEMPLATE&text=[event-name]&dates=[start-at]/[end-at]&details=[detail]&location=[location]&sf=true&output=xml';
        
        $keywords = array(  '[event-name]',
                            '[start-at]',
                            '[end-at]',
                            '[detail]',
                            '[location]'
        );
        $replaced = array(  str_replace(' ','+',$q['name']),
                            date('Ymd',strtotime($q['start_at'])),
                            date('Ymd',strtotime($q['end_at'])),
                            str_replace(' ','+',$q['description']),
                            str_replace(' ','+',$q['venue'])
        );
        return str_replace($keywords,$replaced,$url);
    }


    private function _eg($view)
    {
        return View::forge("view/$view");
    }
}

