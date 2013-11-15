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
		)
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'main_org',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		),
		'event_organization' => array(
			'key_from'	=> 'org_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Organization'
		)
	);
	
	public static function insert_organization($arg)
	{
		$q		= Model_Organization::_add_or_edit($arg);
		$nme	= ($arg['action'] == 'edit')?0:Model_Organization::_check_name($arg)->count();
		
		$rsp['success'] = false;
		$rsp['response']= 'Error in DB write';
		if($nme == 0)
		{
			if(!is_null($arg['file']))
			{
				if($arg['action'] == 'edit')
				{
					
					$q->photo_id = Model_Photo::insert_picture($arg,$q);
				}
				else
				{
					$q->photo_id = Model_Photo::insert_picture($arg);
				}
			}
			
			$q->name		 = $arg['name'];
			$q->description	 = $arg['description'];
			$q->facebook	 = $arg['facebook'];
			$q->twitter		 = $arg['twitter'];
			$q->website		 = $arg['website'];
			$q->email		 = $arg['email'];
			$q->created_by	 = \Fuel\Core\Session::get('email');
			$q->save();
			
			$rsp['success'] = true;
			$rsp['response']= 'Request complete.';
		}
		return $rsp;
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
		$limit	= 25;
		$page	= abs($page)-1;
		
		$q			= Model_Organization::query();
		$total_page	= ceil($q->count()/$limit);
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
	
	private static function _add_or_edit($arg)
	{
		if($arg['action'] == 'add')
		{
			$q = new Model_Organization();
		}
		else
		{
			$q = Model_Organization::find($arg['org_id']);
		}
		return $q;
	}
}

