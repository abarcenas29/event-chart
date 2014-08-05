<?php

class Model_Event_list extends Model_ModelCore
{
	protected static $_properties = array(
		'id',
		'photo_id', // delete this later
		'cover_id',
		'name',
		'description',
		'email',
		'region',
		'venue',
		'main_org',
		'lat',
		'long',
		'start_at',
		'end_at',
		'facebook',
		'twitter',
		'website',
		'status',
                'fb_event_id',
                'fb_last_update',
                'fb_photo_count',
                'fb_event_id_official',
		'created_by',
		'created_at'
	);
	
	protected static $_has_one = array(
            'organization' => array(
                    'key_from'	=> 'main_org',
                    'key_to'	=> 'id',
                    'model_to'	=> 'Model_Organization'
            ),
            'photo' => array(
                    'key_from'	=> 'photo_id',
                    'key_to'	=> 'id',
                    'model_to'	=> 'Model_Photo'
            ),
            'cover' => array(
                    'key_from'	=> 'cover_id',
                    'key_to'	=> 'id',
                    'model_to'	=> 'Model_Photo'
            )
	);
	
	protected static $_has_many = array(
            'sub_org'	=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Organization'
            ),
            'ticket'	=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Ticket'
            ),
            'category'	=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Category'
            ),
            'poster'	=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Poster'
            ),
            'guest'		=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Guest'
            ),
            'instagram' => array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Instagram'
            ),
            'hashtags'	=> array(
                    'key_from'	=> 'id',
                    'key_to'	=> 'event_id',
                    'model_to'	=> 'Model_Event_Hashtag'
            )
	);
	
	protected static $_belongs_to = array(
		'organization'	=> array(
			'key_from'	=> 'main_org',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		),
		'sub_org'		=> array(
			'key_from'	=> 'id',
			'key_to'	=> 'event_id',
			'model_to'	=> 'Model_Event_Organization'
		)
	);
	
	public static function admin_index_event($page)
	{
		$limit	= 15;
		$page   = $page - 1;
		
                $q  = Model_Event_list::query()
                        ->related('organization')
                        ->related('photo')
                        ->order_by('start_at','desc');
                
		$total_page = ceil($q->count()/$limit);
		$arg['page']= ($page > $total_page)?$total_page:$page;
		
		if($arg['page'] <= $total_page)
		{
			$q->rows_limit($limit);
			$q->rows_offset(abs($arg['page'])*$limit);
		}
		else
		{
			$q->rows_limit($limit);
			$q->rows_offset($total_page*$limit);
			$arg['page'] = $total_page;
		}
		
		$arg['total_page']	= $total_page;
		$arg['data']		= $q->get();
		return $arg;
	}
	
	public static function write_event($arg)
	{
		$arg = Model_Event_list::_reverse_date($arg);
		$arg = Model_Event_list::_remove_http($arg);
		$nme = Model_Event_list::_check_name($arg);
		
		$rsp['success'] = false;
		$rsp['response']= 'Same Event is Already Exsist in the System';
		
		if($nme->count() == 0)
		{
                    $q          = new Model_Event_list();
                    $q->name	= $arg['name'];
                    $q->email	= $arg['email'];
                    $q->main_org= $arg['main_org'];
                    $q->start_at= $arg['start_at'];
                    $q->end_at	= $arg['end_at'];
                    $q->venue	= $arg['venue'];
                    $q->region	= $arg['city'];
                    $q->lat	= $arg['lat'];
                    $q->long	= $arg['lng'];
                    $q->facebook= $arg['facebook'];
                    $q->twitter	= $arg['twitter'];
                    $q->website	= $arg['website'];
                    $q->description = $arg['desc'];
                    
                    $q->fb_event_id          = $arg['fbid'];
                    $q->fb_last_update       = $arg['fb-update'];
                    $q->fb_event_id_official = $arg['event-official'];

                    $q->status      = 'Pending';
                    $q->created_by  = Session::get('email');
                    $q->save();
                    
                    $rsp['success'] = true;
                    $rsp['response']= 'Data Submitted';
                    $rsp['id']	= $q->id;
		}
		return $rsp;
	}
	
	public static function edit_event($arg)
	{
		$q = Model_Event_list::query()
                        ->where('id','=',$arg['event_id'])
                        ->get_one();
		
		$arg = Model_Event_list::_reverse_date($arg);
		$arg = Model_Event_list::_remove_http($arg);
	
		$q->name	= $arg['name'];
                $q->email	= $arg['email'];
		$q->main_org	= $arg['main_org'];
		$q->start_at	= $arg['start_at'];
		$q->end_at	= $arg['end_at'];
		$q->venue	= $arg['venue'];
		$q->region	= $arg['city'];
		$q->lat		= $arg['lat'];
		$q->long	= $arg['lng'];
		$q->facebook	= $arg['facebook'];
		$q->twitter	= $arg['twitter'];
		$q->website	= $arg['website'];
		$q->description = $arg['desc'];
		
		$q->save();
		$rsp['success'] = true;
		$rsp['response']= 'Data Edited';
		
		return $rsp;
	}
	
	public static function insert_main_picture($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();

            if(!is_null($q['photo_id']))
                    Model_Photo::delete_picture($q['photo_id']);
            $q->photo_id = Model_Photo::insert_picture($arg);
            $q->save();
	}
	
	public static function insert_cover_picture($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();

            if(!is_null($q['cover_id']))
                    Model_Photo::delete_picture($q['cover_id']);
            $q->cover_id = Model_Photo::insert_picture($arg);
            $q->save();
	}
	
	public static function insert_main_picture_url($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();
            if(!is_null($q['photo_id']))
                    Model_Photo::delete_picture($q['photo_id']);
            $q->photo_id = Model_Photo::insert_picture_url($arg);
            $q->save();
	}
	
	public static function insert_cover_picture_url($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();
            if(!is_null($q['cover_id']))
                    Model_Photo::delete_picture($q['cover_id']);
            $q->cover_id = Model_Photo::insert_picture_url($arg);
            $q->save();
	}
	
	public static function delete_main_picture($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();
            if(!is_null($q['photo_id']))
                    Model_Photo::delete_picture ($q['photo_id']);
            $q->photo_id = null;
            $q->save();
	}
	
	public static function delete_cover_picture($arg)
	{
            $q = Model_Event_list::query()
                    ->where('id','=',$arg['event_id'])
                    ->get_one();

            if(!is_null($q['cover_id']))
                    Model_Photo::delete_picture($q['cover_id']);
            $q->cover_id = null;
            $q->save();
	}
	
	public static function toggle_visibility($arg)
	{
		$q = Model_Event_list::query()
				->where('id','=',$arg['event_id'])
				->get_one();
		$q->status = $arg['status'];
		$q->save();
	}
	
	public static function read_list()
	{
		$q = Model_Event_list::query()
				->related('photo')
				->where('id','=',Session::get('event_id'));
		return $q->get_one();
	}
	
	public static function read_public_list($event_id)
	{
		$q = Model_Event_list::query()
                        ->related('photo')
                        ->related('organization')
                        ->where('status','=','live')
                        ->where('id','=',$event_id);
		return $q->get_one();
	}
	
	public static function search_event($arg)
	{
            $q = Model_Event_list::query()
                    ->related('organization')
                    ->where('name','like',$arg['search'].'%')
                    ->get();

            $rsp = array();
            $x	 = 0;
            foreach($q as $row)
            {
                $rsp[$x]['title'] = '[Event] '. $row['name'];
                $rsp[$x]['url']	  = Uri::create('admin/dashboard2/event_manage/'.$row['id']);
                $rsp[$x]['text']  = $row['organization']['name'];
                $x++;
            }
            return $rsp;
	}
        
        public static function public_search_event($arg)
        {
            $q = Model_Event_list::query()
                    ->related('organization')
                    ->where('name','like',$arg['search'].'%')
                    ->where('status','=','live')
                    ->get();

            $rsp = array();
            $x	 = 0;
            foreach($q as $row)
            {
                $rsp[$x]['title'] = '[Event] '. $row['name'];
                $rsp[$x]['url']	  = Uri::create('view/event/'.$row['id']);
                $rsp[$x]['text']  = $row['organization']['name'];
                $x++;
            }
            return $rsp;
        }
	
	public static function delete_event($event_id)
	{
		$q = Model_Event_list::query()
				->where('id','=',$event_id);
		Fuel\Core\DB::start_transaction();
		//Category Events
		Model_Event_Category::remove_cat_by_event($event_id);
		//Guest Events
		Model_Event_Guest::remove_guest_by_event($event_id);
		//Instagram Events
		Model_Event_Instagram::remove_instagram_by_event($event_id);
		//Twitter Events
		Model_Event_Twitter::remove_twitter_by_event($event_id);
		//Sub-Org Events
		Model_Event_Organization::remove_org_by_event($event_id);
		//Poster Events
		Model_Event_Poster::remove_poster_by_event($event_id);
		//Ticket Events
		Model_Event_Ticket::remove_ticket_by_event($event_id);
		//Hashtag Events
		Model_Event_Hashtag::remove_hashtag_by_event($event_id);
		//Remove picture
		$photo = $q->get_one();
		
		if(!is_null($photo['photo_id']))
		{
			Model_Photo::delete_picture($photo['photo_id']);
		}
		
		Fuel\Core\DB::commit_transaction();
		$q->delete();
	}
        
	
	private static function _check_name($arg)
	{
		$q = Model_Event_list::query()
                        ->where('name','=',trim($arg['name']));
		return $q;
	}
	
	private static function _reverse_date($arg)
	{
		$format			= 'Y-m-d';
		$start_date		= DateTime::createFromFormat($format,$arg['start_at']);
		$end_date		= DateTime::createFromFormat($format,$arg['end_at']);
		if($start_date > $end_date)
		{
			$temp               = $arg['start_at'];
			$arg['start_at']    = $arg['end_at'];
			$arg['end_at']      = $temp;
		}
		return $arg;
	}
	
	private static function _remove_http($arg)
	{
		$arg['website'] = str_replace('http://','',$arg['website']);
		$arg['facebook'] = str_replace('http://','',$arg['facebook']);
		$arg['twitter'] = str_replace('http://','',$arg['twitter']);
		return $arg;
	}
}
