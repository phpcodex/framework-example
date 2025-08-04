<?php

	//Ensure we are using our route.
	use imleeds\core\router;

    $auth = ['admin' => 'admin', 'richard' => 'bob'];

	//Load our route.
	router::get("/demo/{name}/{age}", function($name = 'Guest', $age = '0'){

		if (is_numeric($age)){

			echo "You are: " . $name . " and are ". $age;
			echo router::view("/demo/{name}/{age}", "welcome");

		} //end if

	}, $auth);

	router::get("/welcome/{location}", function($location = 'Unknown'){
		 router::controller("welcome", $location);
	});

	//Old route, shiney new code replaces this.
	router::redirect("/demo/lol", "/demo/here/ok", "302");

	//Our basic hello-world.
	router::get("/hello-world", function(){ echo "Hello Web World!"; });
