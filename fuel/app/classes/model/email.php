<?php
class Model_Email extends Model_ModelCore 
{
    public static function send_html_email($arg)
    {
        $email = Email::forge();
        $email->from($arg['from']);
        $email->to($arg['to']);
        $email->subject($arg['subject']);
        $email->html_body($arg['view']);
        $email->send();
    }
    
    public static function send_email($arg)
    {
        $email = Email::forge();
        $email->from($arg['from']);
        $email->to($arg['to']);
        $email->subject($arg['subject']);
        $email->body($arg['text']);
        $email->send();
    }
}
