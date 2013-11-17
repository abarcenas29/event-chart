<?php

class Model_Event_list extends Model_ModelCore
{
	protected static $_properties = array(
		'id',
		'photo_id',
		'name',
		'description',
		'email',
		'venue',
		'main_org',
		'lat',
		'long',
		'start_at',
		'end_at',
		'facebook',
		'twitter',
		'website',
		'hashtag',
		'private',
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
	);
	
	protected static $_belongs_to = array(
		'organiztion' => array(
			'key_from'	=> 'main_org',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		)
	);
	
	public static function admin_index_event($page)
	{
		$limit	= 25;
		$page	= abs($page)-1;
		
		$q			= Model_Event_list::query();
		$total_page = ceil($q->count()/$limit);
		$arg['page']= ($page > $total_page)?$total_page:$page;
		
		if($arg['page'] <= $total_page)
		{
			$q->rows_limit($limit);
			$q->rows_offset(abs($arg['page']));
		}
		else
		{
			$q->rows_limit($limit);
			$q->rows_offset($total_page);
			$arg['page'] = $total_page;
		}
		
		$arg['total_page']	= $total_page;
		$arg['data']		= $q->get();
		return $arg;
	}
	
	// DESCRIPTION: Register the event
	public static function write_event($arg)
	{
		$arg = Model_Event_list::_reverse_date($arg);;
		$nme = Model_Event_list::_check_name($arg);
		
		$rsp['success'] = false;
		$rsp['response']= 'Same Event Already Exsist in the system';
		if($nme->count() == 0)
		{
			$q				= new Model_Event_list();
			$q->photo_id	= (!is_null($arg['file']))?Model_Photo::insert_picture($arg):null;
			$q->name		= $arg['name'];
			$q->description = $arg['desc'];
			$q->email		= $arg['email'];
			$q->main_org	= $arg['main_org'];
			$q->start_at	= $arg['start_at'];
			$q->end_at		= $arg['end_at'];
			$q->facebook	= $arg['facebook'];
			$q->twitter		= $arg['twitter'];
			$q->website		= $arg['website'];
			$q->hashtag		= $arg['hashtag'];
			$q->private		= true;
			$q->created_by	= \Fuel\Core\Session::get('email');
			$q->save();
			$rsp['success'] = true;
			$rsp['response']= 'Data submitted';
		}
		return $rsp;
	}
	
	public static function edit_event($arg)
	{
		$q = Model_Event_list::query()
					->where('id','=',$arg['event_id'])
					->get_one();
		
		$arg = Model_Event_list::_reverse_date($arg);
	
		if(!is_null($arg['file']))
		{
			$q->photo_id = Model_Photo::insert_picture($arg);
		}

		$q->description = $arg['desc'];
		$q->email		= $arg['email'];
		$q->main_org	= $arg['main_org'];
		$q->start_at	= $arg['start_at'];
		$q->end_at		= $arg['end_at'];
		$q->facebook	= $arg['facebook'];
		$q->twitter		= $arg['twitter'];
		$q->website		= $arg['website'];
		$q->hashtag		= $arg['hashtag'];
		$q->private		= true;
		$q->created_by	= \Fuel\Core\Session::get('email');
		$q->save();
		$rsp['success'] = true;
		$rsp['response']= 'Data submitted';
		
		return $rsp;
	}
	
	public static function write_venue($arg)
	{
		$q = Model_Event_list::query()
				->where('id','=',$arg['event_id']);
		
		$response['success'] = false;
		$response['response']= $q->count();
		if($q->count() == 1)
		{
			$s			= $q->get_one();
			$s->lat		= $arg['lat'];
			$s->long	= $arg['long'];
			$s->venue	= $arg['venue'];
			$s->save();
			$response['success'] = true;
			$response['response']= 'Venue set';
		}
		return $response;
	}
	
	public static function toggle_visibility($id)
	{
		$q = Model_Event_list::query()
				->where('id','=',$id)
				->get_one();
		$value = $q['private'];
		$q->private = ($value == 0)?1:0;
		$q->save();
	}
	
	public static function read_list()
	{
		$q = Model_Event_list::query()
				->related('photo')
				->where('id','=',Fuel\Core\Session::get('event_id'));
		return $q->get_one();
	}
	
	public static function read_public_list($event_id)
	{
		$q = Model_Event_list::query()
				->related('photo')
				->related('organization')
				->where('private','=',false)
				->where('id','=',$event_id);
		return $q->get_one();
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
		//Sub-Org Events
		Model_Event_Organization::remove_org_by_event($event_id);
		//Poster Events
		Model_Event_Poster::remove_poster_by_event($event_id);
		//Ticket Events
		Model_Event_Ticket::remove_ticket_by_event($event_id);
		//Remove picture
		$photo = $q->get_one();
		Model_Photo::delete_picture($photo['photo_id']);
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
			$temp				= $arg['start_at'];
			$arg['start_at']	= $arg['end_at'];
			$arg['end_at']		= $temp;
		}
		return $arg;
	}
}
