<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {     
        print '<pre>';
        print_r(Model_Event_Poster::fb_write_poster_url(3));
        print '</pre>';
    }
}
