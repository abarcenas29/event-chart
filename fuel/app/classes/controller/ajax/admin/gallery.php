<?php 
class Controller_Ajax_Admin_Gallery extends Controller_Ajax_PrivateCore
{
	public function action_one_gallery()
	{
		$view = View::forge('admin/dashboard2/ajax/one.image.gallery');
		return $view;
	}
	
	public function action_poster_gallery()
	{
		$view = View::forge('admin/dashboard2/ajax/one.image.poster');
		return $view;
	}
	
	public function action_org_logo()
	{
		$view = View::forge('admin/dashboard2/ajax/one.logo.image');
		return $view;
	}
}