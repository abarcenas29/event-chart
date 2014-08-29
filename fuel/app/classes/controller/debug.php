<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {     
        print '<pre>';
        print_r(Model_Event_Poster::fb_write_poster_url('1379288799026080'));
        print '</pre>';
    }
    
    public function action_template()
    {
        $q    = Model_Event_list::read_public_list(3); 
        $view = View::forge('email/alert');
        $view->q = $q;
        return $view;
    }
    
    public function action_email()
    {
        $q    = Model_Event_list::read_public_list(3);
        $view = View::forge('email/alert');
        $view->q = $q;
        
        $email = Email::forge();
        $email->from('aldrich.barcenas@deremoe.com','Testing');
        $email->to('tcmanila@gmail.com','Testing 2');
        $email->subject('This is a Subject');
        $email->html_body($view);
        
        try
        {
            $email->send();
        }
        catch (\EmailValidationFailedException $e)
        {
            print $e;
        }
        catch (\EmailSendingFailedException  $e)
        {
            print $e;
        }
    }
}
