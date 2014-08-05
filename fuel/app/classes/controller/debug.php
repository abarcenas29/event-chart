<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {     
        print '<pre>';
        print_r(Model_Event_Engine::event_data('595824153858144'));
        print '</pre>';
    }
}
