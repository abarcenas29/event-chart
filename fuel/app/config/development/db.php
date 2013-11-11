<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'type'		  => 'mysqli',
		'connection'  => array(
			'hostname'   => 'localhost',
			'username'   => 'root',
			'password'   => '1tp@ssw0rd',
			'port'		 => '3307',
			'database'	 => 'bo_echart'
		),
		'profiling' => true
	)
);
