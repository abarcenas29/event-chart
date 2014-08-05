<?php

Autoloader::add_core_namespace('myauth2');

Autoloader::add_classes(array(
		//Auth Package
		'myauth2\\auth'				=> __DIR__.'/auth.php',			//Main Class
		'myautn2\\hasher'			=> __DIR__.'/core/hasher.php'	//Standard Hasing Algorithim
));