<?php

    error_reporting(0);

    //autoloader
    require_once ('../vendor/autoload.php');

	# We must begin to load our application from the beginning.
	require_once("../lib/bootstrap.php");

	//Now run our app.
	$app = imleeds\core::getInstance();

	//print_p($app);
