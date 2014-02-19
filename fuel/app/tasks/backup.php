<?php
namespace Fuel\Tasks;

class backup 
{
	public static function run()
	{
		\Fuel::$env = \Fuel::STAGING;
		\Package::load('s3');
		\Log::info('Backup operation starting');
		
		$path = DS."mysql-backup".DS;
		$sqlDeremoe = $path . 'deremoe_wp_db.sql.gz';
		print \s3\upload::upload_sql_file($sqlDeremoe,'deremoe');
	}
}

