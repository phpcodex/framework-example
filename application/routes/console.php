<?php

	//Ensure we are using our route.
	use imleeds\core\router;

        /*
         * Q: Why Does this file exist?
	 * 
	 * If the local script is going to try and run a local resource, you will want to send
	 * this through the local console. While you are just adding /console to your URL, what
	 * you are actually doing is using less logic and parse time. EG: Not loading any
	 * headers or footers.
	 *
         * This simply put is just a way for you to isolate that calls are coming in from a
         * console request. While your URL will start /console, you should not include this on your
         * route methods. Treat the url as through /console is root.
         *
         */

	//Entry point.
	//router::redirect("/", "/welcome");

	//Our helper class.
	router::cli("/", function(){ router::controller("console", "help"); });

	//Our basic hello-world.
	router::cli("/hello-world", function(){ echo "Hello Console World!"; });

	//We should allow our console to run any controller and method.
	router::cli("/{controller}/{method}", function($controller, $method){ router::controller($controller, $method); });
