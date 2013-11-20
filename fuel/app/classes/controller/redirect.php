<?php
class Controller_Redirect extends \Fuel\Core\Controller 
{
	public function action_twitter()
	{
		if ( ! Twitter::logged_in() )
		{
			Twitter::login();
		}
		$user = Twitter::user();
		$profile_img = $user->profile_image_url;
		$profile_img = explode('_',$profile_img);
		$mime		 = explode('.',$profile_img[count($profile_img)-1]);
		$profile_img[count($profile_img)-1] = 'bigger';
		$profile_img = implode('_',$profile_img);
		
		Session::set('twitter_avatar',$profile_img.'.'.end($mime));
		Response::redirect(Session::get('callback_url'));
	}
	
	public function action_clean_twitter_session()
	{
		Session::delete('twitter_oauth');
	}
}

