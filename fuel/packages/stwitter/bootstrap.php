<?php

Autoloader::add_core_namespace('stwitter');

Autoloader::add_classes(array(
		//Auth Package
		'stwitter\\twitter'				=> __DIR__.'/twitter.php',			//Main Class
));