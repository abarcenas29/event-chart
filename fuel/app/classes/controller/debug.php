<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {
        print '<pre>';
        print_r(Model_Event_Engine::get_fb_user_data());
        print '</pre>';
    }
}
