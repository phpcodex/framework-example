<?php

	

	error_reporting(E_ALL);

	/*
		Directory Separator used so we can port our resrouce
		from one Operating System to another and can rest
		assured at least this base is covered.
	*/
	
	define('DS', 			DIRECTORY_SEPARATOR);
	
	/*
	
		We can determine where the ROOT of our resource is
		and can access anything from the root.
	
	*/
	
	define('ROOT', 			dirname(dirname(__FILE__)));
	
	/*
	
		Ideal for those systems who want to make something
		workable on all systems, so rather than just using
		\r or \n or inserting \r\n, CRLF is now your reference.
	
	*/

	define('CRLF', 			chr(13).chr(10));
	
	/*
	
		Because we might want our physical storage data
		somewhere else or set up a development area later,
		here is where you can set this up.
	
	*/

	define('APPLICATION', 	ROOT . DS . 'application');
	
	/*
	
		Our datastore will be where we would 'create' files through our
		application or even upload information.
		
		This is out of the view of the public, so the files would be
		safe and free from execution through XSS providing modules
		are secured.
		
	*/
	
	define('DATASTORE',		ROOT . DS . 'datastore');
	
	/*
	
		The library is useful, containing pre-build resources
		readily accessible by any Controller and Model. Got a
		new class of your own? Add it in here, it will be 
		accessible.
	
	*/
	
	define('LIB', 			ROOT . DS . 'lib');

	/*
	
		Some of our MVC config files should be in here where
	 	where we should be able to change things.
	
	*/
		
	define('CONFIG', 		ROOT . DS . 'config');
	
	/*
		Folder designated variables.
	*/

	define('CLASSES',	'classes');
	define('INTERFACES',	'interfaces');
	define('CONTROLLERS',	'controllers');
	define('ROUTES',	'routes');
	define('VIEWS',		'views');

