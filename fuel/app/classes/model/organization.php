<?php
class Model_Organization extends Model_ModelCore 
{
	protected static $_properties = array(
		'id',
		'photo_id',
		'name',
		'description',
		'facebook',
		'twitter',
		'website',
		'email',
		'created_at',
		'created_by'
	);
	
	protected static $_has_one = array(
		'photo' => array(
			'key_from'	=> 'photo_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Photo'
		),
	);
	
	protected static $_has_many = array(
		'event_lists' => array(
			'key_from' => 'id',
			'key_to'   => 'main_org',
			'model_to' => 'Model_Event_List'
		),
		'sub_orgs'	  => array(
			'key_from'	=> 'id',
			'key_to'	=> 'org_id',
			'model_to'	=> 'Model_Event_Organization'
		)
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'main_org',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	public static function insert_organization($arg)
	{
		$c = Model_Organization::_check_name($arg);
		
		if($c->count() == 0 && !empty($arg['name']))
		{
			$q = new Model_Organization();
		
			$q->name			= $arg['name'];
			$q->email			= $arg['email'];
			$q->description		= $arg['description'];
			$q->facebook		= $arg['facebook'];
			$q->twitter			= $arg['twitter'];
			$q->website			= $arg['website'];
			$q->created_by		= Session::get('email');

			if(!is_null($arg['filename']) && !is_null($arg['value']))
			{
				$q->photo_id = Model_Photo::insert_picture($arg);
			}
			$q->save();

			$rsp['success'] = true;
			return $rsp;
		}
		$rsp['success'] = false;
		return $rsp;
	}
	
	public static function edit_organization($arg)
	{
		$q = Model_Organization::query()
				->where('id','=',$arg['org_id'])
				->get_one();
		
		$q->name			= $arg['name'];
		$q->email			= $arg['email'];
		$q->description		= $arg['description'];
		$q->facebook		= $arg['facebook'];
		$q->twitter			= $arg['twitter'];
		$q->website			= $arg['website'];
		$q->created_by		= Session::get('email');
		
		if(!is_null($arg['filename']) && !is_null($arg['value']))
		{
			if(!is_null($q['photo_id']))
				Model_Photo::delete_picture($q['photo_id']);
			$q->photo_id = Model_Photo::insert_picture($arg);
		}
		
		$q->save();
		
		$rsp['success'] = true;
		return $rsp;
	}
	
	public static function insert_org_logo_url($arg)
	{
		$q = Model_Organization::query()
				->where('id','=',$arg['org_id'])
				->get_one();
		
		if(!is_null($q['photo_id']))
			Model_Photo::delete_picture($q['photo_id']);
		
		$q->photo_id = Model_Photo::insert_picture_url($arg);
		$q->save();
		return $q;
	}
	
	public static function read_organization($id)
	{
		$q = Model_Organization::query()
				->related('photo')
				->where('id','=',$id);
		return $q->get_one();
	}
	
	public static function admin_index($page)
	{
		$limit	= 10;
		$page	= abs($page)-1;
		
		$q			= Model_Organization::query();
		$total_page	= ceil($q->count()/$limit);
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
		$q->order_by('name');
		
		$arg['total_page']	= $total_page;
		$arg['data']		= $q->get();
		return $arg;
	}
	
	public static function admin_ll_index()
	{
		$q = Model_Organization::query()
				->order_by('name');
		return $q->get();
	}
	
	private static function _check_name($arg)
	{
		$q = Model_Organization::query()
				->where('name','=',$arg['name']);
		return $q;
	}
}

