<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {     
        print '<pre>';
        print_r(Model_Event_Poster::fb_write_poster_url('1379288799026080'));
        print '</pre>';
    }
    
    public function action_email()
    {
        $email = Email::forge();
        $email->from('aldrich.barcenas@deremoe.com','Testing');
        $email->to('aldrich.barcenas@gmail.com','Testing 2');
        $email->subject('This is a Subject');
        $email->body('testing email');
        
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
