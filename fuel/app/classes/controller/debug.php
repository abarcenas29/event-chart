<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {
        print '<pre>';
        print_r(Model_Event_Engine::event_data('614169431978111'));
        print '</pre>';
    }
}
