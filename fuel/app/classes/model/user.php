<?php
class Model_User extends Model_ModelCore
{
	protected static $_properties = array(
		'id',
		'email',
		'username',
		'salt',
		'hash',
		'type',
		'su',
		'created_at'
	);
	
	public static function create_user($arg)
	{
		$is_added = Model_User::query()
						->where('email','=',$arg['email']);
		
		$res['success'] = false;
		$res['response']= 'User already added';
		if($is_added->count() == 0)
		{
			$cred = myauth2\auth::hash_password($arg['password']);
			
			$q = new Model_User();
			$q->email		= $arg['email'];
			$q->username	= $arg['username'];
			$q->salt		= $cred['salt'];
			$q->hash		= $cred['hash'];
			$q->type		= $arg['type'];
			$q->su			= false;
			$q->save();
			$res['success'] = true;
			$res['response']= $cred;
		}
		return $res;
	}
	
	public static function change_password($arg)
	{
		$res['success'] = false;
		$res['response']= 'Password does not match';
		
		if(strcmp($arg['password'],$arg['password2']) == 0)
		{
			$q = Model_User::query()
				->where('id','=',\Fuel\Core\Session::get('user_id'))
				->get_one();
			$cred		= myauth2\auth::hash_password($arg['password']);
			$q->salt	= $cred['salt'];
			$q->hash	= $cred['hash'];
		
			$res['success'] = $q->save();
			$res['response']= 'Change password';
		}
		
		return $res;
	}
	
	public static function detail_user()
	{
		return Model_User::find(\Fuel\Core\Session::get('user_id'));
	}
	
	public static function delete_user($user_id)
	{
		//add check system later
		$q = Model_User::find($user_id);
		return $q->delete();
	}
	
	public static function admin_index()
	{
		$q = Model_User::query();
		return $q->get();
	}
	
	public static function validate_user($arg)
	{
		$q = Model_User::query()
				->where('email','=',$arg['email']);
		
		$msg = 'Invalid username password';
		$res['success'] = false;
		$res['response']= $msg;
		if($q->count() == 1)
		{
			$cred = $q->get_one();
			$verified = myauth2\auth::compare_password($cred['salt'],$cred['hash'],$arg['password']);
			$res['response'] = $msg;
			if($verified)
			{
				
				Session::set('email',$cred['email']);
				Session::set('type',$cred['type']);
				Session::set('user_id',$cred['id']);
				Session::set('username',$cred['username']);
				Session::set('su',$cred['su']);
				
				$res['response'] = 'account verfied';
			}
			$res['success'] = $verified;
		}
		return $res;
	}
}

