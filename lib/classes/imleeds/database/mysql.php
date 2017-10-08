<?php

	//Declaire our namespace.
	namespace imleeds\database;

	//Create our class.
	class mysql {

		public $version = 1.0;

                //Our single instance.
                private static $instance = null;
                public static function getInstance(){ if (is_null(static::$instance)) static::$instance = new static(); return static::$instance; }

		//Initialise our constructor.
		public function __construct(){

			//Confirm we have loaded.
			

		}

		//Show the version.
		public function version(){ echo "1.0"; }

	}
