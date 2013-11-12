<?php
class Controller_Ajax_Admin_Event extends Controller_Ajax_PrivateCore
{
    public function post_add_poster()
	{
		$arg = array();
		$arg['photo_name'] = Fuel\Core\Input::post('photo_name',null);
		$arg['file']	   = Fuel\Core\Input::post('file',null);
		$arg['event_id']   = \Fuel\Core\Session::get('event_id');
		$arg['width']	   = 1280;
		
		$data = Model_Event_Poster::write_poster($arg);
		$view = Fuel\Core\View::forge('admin/dashboard/ajax/poster');
		$view->q = $data;
		
		return $view;
	}
	
	public function post_add_ticket()
	{
		$arg = array();
		$arg['price']	= Input::post('price');
		$arg['note']	= Input::post('note');
		$arg['event_id']= Session::get('event_id');
		
		$arg['ticket_id'] = Model_Event_Ticket::insert_price($arg);
		$view = View::forge('admin/dashboard/ajax/ticket');
		$view->args = $arg;
		return $view;
	}
	
	public function post_add_guest()
	{
		$arg = array();
		$arg['name']	= Input::post('name');
		$arg['type']	= Input::post('type');
		$arg['event_id']= Session::get('event_id');
		$arg['guest_id']= Model_Event_Guest::insert_guest($arg);
		
		$view = View::forge('admin/dashboard/ajax/guest');
		$view->args = $arg;
		return $view;
	}
}

