<?php
class Controller_Admin_Dashboard2 extends Controller_Admin_AdminCore 
{
    public $template = 'admin/dashboard2/template';

    public function action_index($page = 1)
    {
        $data = Model_Event_list::admin_index_event($page);
        $view = $this->_db('event.index');
        $view->q = $data['data'];
        $view->total_page = $data['total_page'];

        $this->template->content = $view;
        $this->template->menu	 = $this->_sm('event');
    }

    public function action_event_add()
    {
        $view = $this->_db('event.detail');
        $view->orgs		= Model_Organization::admin_ll_index();
        $view->action	= Uri::create('api/admin/event/add.json');
        $view->cities	= Model_city::read_area();

        $this->template->menu    = $this->_sm('event');
        $this->template->content = $view;
    }

    public function action_event_manage($event_id)
    {
        Session::set('event_id',$event_id);
        $q = Model_Event_list::read_list();

        $view = $this->_db('event.detail');
        $view->q		= $q;
        $view->set_safe('desc',$q['description']);
        $view->orgs		= Model_Organization::admin_ll_index();
        $view->action	= Uri::create('api/admin/event/edit.json');;
        $view->cities	= Model_city::read_area();

        $org = $this->_em('organization');
        $org->action	 = Uri::create('ajax/admin/event/add_organization.json');
        $org->orgs		 = Model_Organization::admin_ll_index();
        $org->delete	 = Uri::create('api/admin/event/delete_org.json');
        $org->q			 = $q;
        $view->modal_org = $org;

        $cat = $this->_em('categories');
        $cat->action = Uri::create('ajax/admin/event/add_category.json');
        $cat->cats	 = Config::get('ec.categories');
        $cat->delete = Uri::create('api/admin/event/delete_cat.json');
        $cat->q		 = $q;
        $view->modal_cat = $cat;

        $ticket = $this->_em('ticket');
        $ticket->action = Uri::create('ajax/admin/event/add_ticket.json');
        $ticket->delete = Uri::create('api/admin/event/del_ticket.json');
        $ticket->q		= $q;
        $view->modal_ticket = $ticket;

        $hashtag = $this->_em('hashtag');
        $hashtag->action = Uri::create('ajax/admin/event/add_hashtag.json');
        $hashtag->delete = Uri::create('api/admin/event/del_hashtag.json');
        $hashtag->q		 = $q;
        $view->modal_hashtag = $hashtag;

        $guest = $this->_em('guest');
        $guest->action = Uri::create('ajax/admin/event/add_guest.json');
        $guest->delete = Uri::create('api/admin/event/del_guest');
        $guest->type   = Config::get('ec.guest_type');
        $guest->q	   = $q;
        $view->modal_guest = $guest;

        $menu	 = $this->_sm('event.edit');
        $menu->q = $q; 

        $this->template->menu	 = $menu;
        $this->template->content = $view;
    }

    public function action_event_gallery($event_id = null)
    {
        if(is_null($event_id))
                Response::redirect('admin/dashboard2/index');
        Session::set('event_id',$event_id);
        $q = Model_Event_list::read_list();

        $view	 = $this->_db('event.gallery');
        $view->q = $q;

        $menu	 = $this->_sm('event.edit');
        $menu->q = $q;

        $this->template->menu	= $menu;
        $this->template->content= $view;
    }

    /*
     * Org Index
     */
    public function action_org_index($page = 1)
    {
        $data = Model_Organization::admin_index($page);
        $view = $this->_db('org.index');
        $view->q = $data['data'];
        $view->total_page = $data['total_page'];

        $this->template->content = $view;
        $this->template->menu	 = $this->_sm('org');
    }

    public function action_org_add()
    {
        $view = $this->_db('org.detail');
        $view->action = Uri::create('api/admin/org/write.json');

        $this->template->content = $view;
        $this->template->menu	 = $this->_sm('org');
    }

    public function action_org_manage($org_id = null)
    {
        if(is_null($org_id))
            Response::redirect('admin/dashboard2/org_index');
        Session::set('org_id',$org_id);
        $q = Model_Organization::read_organization($org_id);

        $view			= $this->_db('org.detail');
        $view->action	= Uri::create('api/admin/org/edit.json');
        $view->q		= $q;
        $view->set_safe('desc',$q['description']);

        $this->template->content = $view;
        $this->template->menu	 = $this->_sm('org'); 
    }

    public function action_admin()
    {
        $su = Session::get('su');
        if(!$su)
            Response::redirect('admin/login/logout');

        $user	 = $this->_am('user');
        $user->q = Model_User::admin_index();
        
        $fb         = $this->_sm('facebook');
        $fb->appid  = Model_const::read_one_key('fb_appid');
        $fb->secret = Model_const::read_one_key('fb_secret');
        $fb->pageid = Model_const::read_one_key('fb_pageid');
        
        $tw = $this->_sm('twitter');
        $tw->ckey    = Model_const::read_one_key('twitter_ckey');
        $tw->csecret = Model_const::read_one_key('twitter_csecret');
        $tw->atoken  = Model_const::read_one_key('twitter_atoken');
        $tw->asecret = Model_const::read_one_key('twitter_asecret');
        
        $view = $this->_db('main');
        $view->modal_user = $user;
        $view->modal_fb   = $fb;
        $view->modal_tw   = $tw;

        $this->template->content = $view;
        $this->template->menu	 = $this->_sm('main');
    }

    /*
     * Social
     */
    public function post_twitter()
    {
        $appConkeyDefault      = Model_const::read_one_key('twitter_ckey');
        $appConSecretDefault   = Model_const::read_one_key('twitter_csecret');
        $appAuthTokenDefault   = Model_const::read_one_key('twitter_atoken');
        $appAuthSecretDefault  = Model_const::read_one_key('twitter_asecret');
        
        $key = array();
        
        $key['key']     = 'twitter_ckey';
        $key['value']   = Input::post('consumer_key',$appConkeyDefault['value']);
        Model_const::edit_key($key);
        
        $key['key']     = 'twitter_csecret';
        $key['value']   = Input::post('consumer_secret',$appConSecretDefault['value']);
        Model_const::edit_key($key);
        
        $key['key']     = 'twitter_atoken';
        $key['value']   = Input::post('auth_token',$appAuthTokenDefault['value']);
        Model_const::edit_key($key);
        
        $key['key']     = 'twitter_asecret';
        $key['value']   = Input::post('auth_secret',$appAuthSecretDefault['value']);
        Model_const::edit_key($key);
        
        Response::redirect('admin/dashboard2/index');
    }
    
    public function action_facebook()
    {
        
        $appIdDefault       = Model_const::read_one_key('fb_appid');
        $appSecretDefault   = Model_const::read_one_key('fb_secret');
        $appPageIdDefault   = Model_const::read_one_key('fb_pageid');
        
        $cfg = array();
        $cfg['appId'] = Input::post('appid',$appIdDefault['value']);
        $cfg['secret']= Input::post('secret',$appSecretDefault['value']);
        
        $f   = new facebook\fb($cfg);

        $key = array();
        if(!$f->getUser())
        {
            $key['key']     = 'fb_appid';
            $key['value']   = $cfg['appId'];
            Model_const::edit_key($key);

            $key['key']     = 'fb_secret';
            $key['value']   = $cfg['secret'];
            Model_const::edit_key($key);
            
            $permission['scope']        = 'publish_stream,manage_pages'; 
            $permission['redirect_uri'] = Uri::create('admin/dashboard2/facebook');
            Response::redirect($f->getLoginUrl($permission));
        }

        $key['key']     = 'fb_pageid';
        $key['value']   = Input::post('pageid',$appPageIdDefault['value']);
        Model_const::edit_key($key);
        
        $arg		= array();
        $arg['key']	= 'fb_access_token';
        $arg['value']   = $f->getAccessToken();

        $q = Model_const::read_key($arg['key']);
        if(count($q) == 0)
        {
            Model_const::make_key($arg);
        }
        else
        {
            Model_const::edit_key($arg);
        }

        Response::redirect('admin/dashboard2/index');
    }

    /*
     * Event Index Actions
     */
    public function action_event_delete($event_id)
    {
        Model_Event_list::delete_event($event_id);
        Response::redirect('admin/dashboard2/index');
    }

    public function action_event_live($id)
    {
        $arg				= array();
        $arg['event_id']	= $id;
        $arg['status']		= 'live';

        Model_Event_list::toggle_visibility($arg);
        Response::redirect('admin/dashboard2/index');
    }

    public function action_event_pending($id)
    {
        $arg				= array();
        $arg['event_id']	= $id;
        $arg['status']		= 'pending';

        Model_Event_list::toggle_visibility($arg);
        Response::redirect('admin/dashboard2/index');
    }

    public function action_event_cancel($id)
    {
        $arg				= array();
        $arg['event_id']	= $id;
        $arg['status']		= 'canceled';

        Model_Event_list::toggle_visibility($arg);
        Response::redirect('admin/dashboard2/index');
    }

    private function _sm($view)
    {
        return View::forge("admin/dashboard2/menu/$view");
    }

    private function _db($view)
    {
        return View::forge("admin/dashboard2/$view");
    }

    private function _am($view)
    {
        return View::forge("admin/dashboard2/maintinance/$view");
    }


    private function _em($view)
    {
        return View::forge("admin/dashboard2/manage/$view");
    }
}