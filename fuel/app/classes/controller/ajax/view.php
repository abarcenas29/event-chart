<?php
class Controller_Ajax_View extends Controller_Ajax_AjaxCore
{
    public function post_instagram()
	{
		$arg['event_id'] = Input::post('event_id');
		$arg['page']	 = Input::post('page',0);
		
		Model_Event_Instagram::insert_photos($arg);
		$rsp = Model_Event_Instagram::read_photos($arg);
		
		$view = View::forge('view/ajax/instagram');
		$view->rsp = $rsp;
		
		return $view;
	}
	
	public function post_page_instagram()
	{
		$arg['event_id']	= Input::post('event_id');
		$arg['page']		= Input::post('page');
		$rsp = Model_Event_Instagram::read_photos($arg);
		
		$view = View::forge('view/ajax/instagram_page');
		$view->rsp = $rsp;
		return $view;
	}
}
