<?php

/* Strip only neccessary functions
 * @author Aldrich Allen Barcenas
 * v.2.5
 */
namespace myauth2;
include 'core/hasher.php';

class auth extends hasher
{
	/*
	 * Retrive hash data for manually putting it in the database.
	 */
	
	public static function hash_password($password)
	{
		$good_hash		= hasher::create_hash($password);
		$explode_hash	= explode(':', $good_hash); 
		return array('salt'=>$explode_hash[2], 'hash'=>$explode_hash[3]);
	}
	
	/*
	 * Optional Functions
	 * ============================
	 */
	public static function compare_password($dbsalt,$dbhash,$password)
	{
		$good_hash = hasher::form_good_hash($dbsalt, $dbhash);
		return hasher::validate_password($password, $good_hash);
	}
}

