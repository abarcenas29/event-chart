<?php
class Controller_Ajax_Admin_Event extends Controller_Ajax_PrivateCore
{
	//new
    public function post_add_organization()
    {
        $arg            = array();
        $arg['org']	= Input::post('org');
        $arg['event_id']= Session::get('event_id');

        $view    = View::forge('admin/dashboard2/ajax/organization');
        $view->q = Model_Event_Organization::insert_org($arg);
        return $view;
    }
	
    //new
    public function post_add_category()
    {
        $arg = array();
        $arg['cat']	= Input::post('category');
        $arg['event_id']= Session::get('event_id');

        $view	 = View::forge('admin/dashboard2/ajax/categories');
        $view->q = Model_Event_Category::insert_cat($arg);
        return $view;
    }
	
    public function post_insert_main_poster()
    {
        $arg		= array();
        $arg['filename']= Input::post('name');
        $arg['value']	= Input::post('value');
        $arg['event_id']= Session::get('event_id');
        $arg['width']	= 1280;

        Model_Event_list::insert_main_picture($arg);

        $view = View::forge('admin/dashboard2/ajax/one.image.gallery');
        $view->key	= 'photo_id';
        $view->relate	= 'photo';
        $view->q	= Model_Event_list::read_list();
        return $view;
    }
	
    //new
    public function post_insert_main_cover()
    {
        $arg                = array();
        $arg['filename']    = Input::post('name');
        $arg['value']       = Input::post('value');
        $arg['event_id']    = Session::get('event_id');
        $arg['width']       = 1280;
        

        Model_Event_list::insert_cover_picture($arg);

        $view		= View::forge('admin/dashboard2/ajax/one.image.gallery');
        $view->key	= 'cover_id';
        $view->relate	= 'cover';
        $view->q	= Model_Event_list::read_list();

        return $view;
    }
	
    //new
    public function post_insert_main_cover_url()
    {
        $arg = array();
        $arg['event_id']    = Session::get('event_id');
        $arg['url']         = Input::post('url');
        $arg['width']       = 1280;
        $arg['upload_dir']  = Config::get('ec.upload');
        
        Model_Event_list::insert_cover_picture_url($arg);

        $view           = View::forge('admin/dashboard2/ajax/one.image.gallery');
        $view->key	= 'cover_id';
        $view->relate	= 'cover';
        $view->q	= Model_Event_list::read_list();

        return $view;
    }
	
    //new
    public function post_insert_poster_url()
    {
        $arg = array();
        $arg['event_id']    = Session::get('event_id');
        $arg['url']         = Input::post('url');
        $arg['width']       = 1280;
        $arg['upload_dir']  = Config::get('ec.upload');

        $view	 = View::forge('admin/dashboard2/ajax/one.image.poster');
        $view->q = Model_Event_Poster::write_poster_url($arg);

        return $view;
    }
	
    //new
    public function post_insert_poster()
    {
        $arg = array();
        $arg['filename'] = Input::post('name');
        $arg['value']	 = Input::post('value');
        $arg['event_id'] = Session::get('event_id');
        $arg['width']	 = 1280;

        $view	 = View::forge('admin/dashboard2/ajax/one.image.poster');
        $view->q = Model_Event_Poster::write_poster($arg);

        return $view;
    }
	
    //new
    public function post_add_ticket()
    {
        $arg = array();
        $arg['price']	= Input::post('price');
        $arg['note']	= Input::post('note');
        $arg['event_id']= Session::get('event_id');

        $view = View::forge('admin/dashboard2/ajax/ticket');
        $view->q = Model_Event_Ticket::insert_price($arg);
        return $view;
    }

    //new
    public function post_add_guest()
    {
        $arg = array();
        $arg['name']	= Input::post('name');
        $arg['type']	= Input::post('type');
        $arg['event_id']= Session::get('event_id');

        $view	 = View::forge('admin/dashboard2/ajax/guest');
        $view->q = Model_Event_Guest::insert_guest($arg);
        return $view;
    }

    //new
    public function post_add_hashtag()
    {
        $arg = array();
        $arg['hashtag']	= str_replace('#','',Input::post('hashtag'));
        $arg['event_id']= Session::get('event_id');

        $view	 = View::forge('admin/dashboard2/ajax/hashtag');
        $view->q = Model_Event_Hashtag::insert_hashtag($arg);
        return $view;
    }
}

