<?php
class Model_city extends Model_ModelCore
{
    protected static $_properties = array(
        'id',
        'country',
        'major_area',
        'zip_code',
        'city'
    );
	
	public static function read_area()
	{
            $q = DB::select('major_area')
                    ->from('cities')
                    ->distinct(true)
                    ->execute()
                    ->as_array();
            return $q;
	}
}

