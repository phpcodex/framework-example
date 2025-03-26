<?php

	//IMLeeds Framework autoloader.
	function __autoload($class_name){

		//We're looking for this class, let's remove the information we don’t need.
		$class_name = strtolower($class_name);
		
		//Where do we check?
		$checkFolders = array(
			LIB . DS . CLASSES,
			APPLICATION . DS . CONTROLLERS,
		);

		//What if we're attempting to load a namespace class?
		$nsClass = explode("\\", $class_name);

		//If we are, then let's go ahead and check this folder only.
		if (count($nsClass) > 1){

			//Obtain our class name.
			$class_name = end($nsClass);

			//Remove the result class off the end of our array.
			array_pop($nsClass);

			//Now we have our folder.
			$checkFolders = array(
				LIB . DS . CLASSES . DS . implode("/", $nsClass),
				LIB . DS . INTERFACES . DS . implode("/", $nsClass)
			);

		}


		//Loop our list to check.
		foreach ($checkFolders as $folder){

			if (file_exists($folder . DS . $class_name . '.php')){
				
				//If we've found it, include it.
				include_once($folder . DS . $class_name . '.php');
			
			} //end if
			
		} //end foreach
		
	} //end function __autoload();

