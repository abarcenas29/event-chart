<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'type'		  => 'mysqli',
        'connection'  => array(
                'hostname'       => 'localhost',
                'username'       => 'bo_echart3',
                'password'       => 'x5LRGsvB2emfEuyh',
                'port'		 => '3306',
                'database'	 => 'bo_echart',
        ),
        'profiling' => true
    )
);
