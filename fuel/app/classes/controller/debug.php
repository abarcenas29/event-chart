<?php
class Controller_Debug extends Controller
{
    public function action_index()
    {
        $dt  = new DateTime('2014-09-01');
        //$dt->sub(new DateInterval('P01D'));
        //$dt->add(new DateInterval('P01D'));
        print $dt->format('Y-m-d');
        
    }
    
    public function action_mime()
    {
        $url        = 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xfp1/t31.0-8/s720x720/10623348_685339708221622_1376268425538755379_o.jpg';
        $raw_mime   = explode('.',$url);
        $filter_mime= explode('?',end($raw_mime));
        Debug::dump($filter_mime[0]);
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
