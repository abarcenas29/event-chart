<?php
class Model_region extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'location',
		'lat',
		'long',
		'created_at'
	);
	
	public static function region_index()
	{
		$q = Model_region::query()
				->order_by('location');
		return $q->get();
	}
}

