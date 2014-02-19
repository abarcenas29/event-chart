<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * NOTE: Designed for uploading sql backup
 * 
 * Author: Aldrich Allen Barcenas
 */
namespace s3;

Class upload extends s3
{
    private static $_sql_folder = 'sql/';
	
	public static function upload_sql_file($path,$name)
	{
		$filePath = self::$_sql_folder . $name . '-' . date('Y-m-d').'sql.gz'; 
		$s3 = new \s3\s3();
		return $s3->upload_object($filePath, $path);
	}
}
