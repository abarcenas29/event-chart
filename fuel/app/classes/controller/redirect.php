<?php
class Controller_Redirect extends \Fuel\Core\Controller 
{
        
    
	public function action_twitter()
	{
            if ( ! Twitter::logged_in() )
            {
                Twitter::login();
            }

            try 
            {
                $user = Twitter::user();
                $profile_img = $user->profile_image_url;
                $profile_img = explode('_',$profile_img);
                $mime		 = explode('.',$profile_img[count($profile_img)-1]);
                $profile_img[count($profile_img)-1] = 'bigger';
                $profile_img = implode('_',$profile_img);

                Session::set('twitter_avatar',$profile_img.'.'.end($mime));
                Response::redirect(Session::get('callback_url'));
            } catch (Exception $e) 
            {
                Session::delete('twitter_oauth');
                Response::redirect('redirect/twitter');
            }
		
	}
	
	public function action_facebook()
	{
            $cfg	= Config::get('ec.facebook');
            $f      = new facebook\fb($cfg);
            $user	= $f->getUser();
            if(!$user)
            {
                    $permission['scope'] = 'publish_stream'; 
                    Response::redirect($f->getLoginUrl($permission));
            }
            $me		= $f->api('/me');
            Session::set('fb_id',$me['id']);
            Session::set('fb_name',$me['name']);
            Response::redirect(session::get('callback_url'));
	}
        
        public function action_auth_review()
        {
            $fb     = Model_Event_Engine::user_auth_facebook();
            $user   = $fb->getUser();
            if(!$user)
            {
                $scope = array('scope'=>'email,publish_actions');
                Response::redirect($fb->getLoginUrl($scope));
            }
            
            try 
            {
                Session::set('fb_token',$fb->getAccessToken());
                Response::redirect(Uri::base().'chart2');
            } 
            catch (Exception $ex) 
            {
                $scope = array('scope'=>'email,publish_actions');
                Response::redirect($fb->getLoginUrl($scope));
            }
        }
	
	public function action_clean_twitter_session()
	{
		
	}
}

