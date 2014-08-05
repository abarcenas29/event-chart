<?php
class Model_const extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'key',
		'value',
		'created_at'
	);
	
	public static function read_key($key)
	{
		$q = Model_const::query()
				->where('key','=',$key);
		return $q->get();
	}
	
	public static function read_one_key($key)
	{
		$q = Model_const::query()
				->where('key','=',$key)
				->get_one();
		return $q;
	}
	
	public static function make_key($arg)
	{
		$q = new Model_const();
		$q->key		= $arg['key'];
		$q->value	= $arg['value'];
		$q->save();
	}
	
	public static function edit_key($arg)
	{
		$q = Model_const::query()
				->where('key','=',$arg['key']);
		if($q->count() == 1)
		{
			$row			= $q->get_one();
			$row->value		= $arg['value'];
			$row->save();
		}
	}
}

