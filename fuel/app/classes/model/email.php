<?php
class Model_Email extends Model_ModelCore 
{
    public static function send_html_email($arg)
    {
        $q       = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();
        $view    = View::forge('email/alert');
        $view->q = $q;

        if(!empty($q['email']))
        {
            $email  = Email::forge();
            $email->from('event@deremoe.com','Deremoe Event Charts');
            $email->to($q['email']);
            $email->subject('Deremoe Event Charts: Added '.$q['name'].' to our list');
            $email->html_body($view);
            
            try
            {
                $email->send();
            }
            catch (\EmailValidationFailedException $e)
            {
                Log::error('EmailValidationFailedException: '.$e);
                return false;
            }
            catch (\EmailSendingFailedException  $e)
            {
                Log::error('EmailSendingFailedException: '.$e);
                return false;
            }
            $q->admin_email = true;
            $q->save();
        }
    }
}
