<?php
class Controller_View extends Controller_AppCore
{
    public $template = 'template';

    public function action_event($event_id = null)
    {
       $poster_limit    = 4;
       $poster_counter  = 1;
       
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
       
       $today       = Model_chart::is_event_now($event_id);
       
       $ticket      = $this->_eg('module/ticket');
       $ticket->q   = $q;
       
       $partner     = $this->_eg('module/partner');
       $partner->q  = $q;
       
       $poster      = $this->_eg('module/posters');
       $poster->q   = $q;
       
       $cover_img       = Uri::create('uploads/'.$q['cover']['date'].'/'.$q['cover']['filename']);
       $view            = $this->_eg('event');
       $view->q         = $q;
       $view->set_safe('desc',$q['description']);
       $view->cover     = $cover_img;
       $view->calendar  = $this->_google_event($q);
       $view->hashtag   = implode(', ',$hashtags);
       $view->category  = implode(', ',$category);
       $view->share_fb  = $this->_facebook_share($event_id);
       $view->share_tw  = $this->_twitter_share($q);
       $view->today     = $today;
       
       $view->poster_limit  = $poster_limit;
       $view->poster_counter= $poster_counter;
       
       $view->ticket    = $ticket;
       $view->partner   = $partner;
       $view->poster    = $poster;
       
       $this->template->header  = View::forge('header');
       $this->template->footer  = View::forge('footer');
       $this->template->content = $view;
       $this->template->title   = $q['name'];
    }
    
    private function _twitter_share($q)
    {
        $url = 'http://twitter.com/share?url=[url];text=[text];size=l&amp;count=none';
        $keyword = array('[url]','[text]');
        $replaced= array(Uri::create('view/event/'.$q['id']),'Heads up! '.$q['name']);
        
        return str_replace($keyword,$replaced,$url);
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
        $adjust_start_at = new DateTime($q['start_at']);
        
        $adjust_end_at   = new DateTime($q['end_at']);
        $adjust_end_at->add(new DateInterval('P01D'));
        
        $keywords = array(  '[event-name]',
                            '[start-at]',
                            '[end-at]',
                            '[detail]',
                            '[location]'
        );
        
        $replaced = array(  str_replace(' ','+',$q['name']),
                            $adjust_start_at->format('Ymd'),
                            $adjust_end_at->format('Ymd'),
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

