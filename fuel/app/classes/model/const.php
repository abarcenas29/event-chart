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
		return $q;
	}
}

