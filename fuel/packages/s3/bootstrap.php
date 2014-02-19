<?php

Autoloader::add_core_namespace('s3');

Autoloader::add_classes(array(
    's3\\s3'    => __DIR__.'/s3.php',
    's3\\upload'=> __DIR__.'/upload.php'
));
