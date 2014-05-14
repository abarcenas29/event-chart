<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {
        print '<pre>';
        print_r(Model_Event_Engine::event_feeds('241864232666212'));
        print '</pre>';
    }
}
