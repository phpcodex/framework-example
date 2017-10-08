<?php

	//Ensure we are using our route.
	use imleeds\core\router;

	/*
	 * Q: Why Does this file exist?
	 *
	 * A: This file exists so that we can have respective API calls listed in this route file.
	 * All requests made to the system will have to be translated through a route file.
	 *
	 * This simply put is just a way for you to isolate that calls are coming in from an
	 * API request. While your URL will start /api, you should not include this on your
	 * route methods. Treat the url as through /api is root.
	 *
	 */

	//Entry point.
	router::redirect("/", "/welcome");

	//Our basic hello-world.
	router::get("/hello-world", function(){ echo "Hello API World!"; });
