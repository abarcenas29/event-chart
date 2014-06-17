<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {
        $arg = array();
        $arg['content']     = 'this a test post event';
        $arg['rating']      = '5';
        $arg['is_edit']     = '0';
        $arg['postFb']      = '1';
        $arg['event_id']    = 14;
        $arg['picture']     = 'http://placehold.it/100x100';
        $arg['title']       = 'this an event title';
        $arg['description'] = 'asdasdasd';
        
        print '<pre>';
        print_r(Model_Event_Engine::user_publish_facebook($arg));
        print '</pre>';
    }
}
