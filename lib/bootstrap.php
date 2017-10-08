<?php

	//Our config file.
	include_once("config.php");

	//Load up the function to list files in folders.
	include_once(LIB . DS . "functions" . DS . "listFiles.php");
	
	//Get a list of functions to load.
	$list = listFiles(LIB . DS . "functions", array("listFiles.php"));

	//Load up each function.
	foreach ($list["file"] as $key => $val) {
		
		//Load all the function files which was found in our list.
		include_once(LIB . DS . "functions" . DS . $val);
		
	} //end
