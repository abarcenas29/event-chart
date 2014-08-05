<?php
class Controller_Api_Admin_Search extends Controller_Api_ApiPrivate
{
	public function post_event()
	{
            $arg            = array();
            $arg['search']  = Input::post('search');

            $result1    = Model_Event_list::search_event($arg);
            $result2	= Model_Organization::search_organization($arg);

            $rsp['results'] = array_merge($result1,$result2);
            return $this->response($rsp);
	}
}