<?php
class Controller_Api_Search extends Controller_Api_ApiCore
{
    public function post_search()
    {
        $arg		= array();
        $arg['search']	= Input::post('search');

        $result1	= Model_Event_list::public_search_event($arg);
        $result2	= Model_Organization::search_organization($arg);

        $rsp['results'] = array_merge($result1,$result2);
        return $this->response($rsp);
    }
}

