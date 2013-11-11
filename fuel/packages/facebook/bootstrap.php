<?php

Autoloader::add_core_namespace('stwitter');

Autoloader::add_classes(array(
		//Auth Package
		'facebook\\fb'				=> __DIR__.'/fb.php',			//Main Class
));