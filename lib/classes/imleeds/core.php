<?php

	//Define our namespace.
	namespace imleeds;

	//Prepare to use additional classes.
	use imleeds\core\router;
	use imleeds\core\controller;
	use imleeds\database\mysql;

	//Declare our class.
	class core implements icore {	

                //Our single instance.
                private static $instance = null;
                public static function getInstance(){ if (is_null(static::$instance)) static::$instance = new static(); return static::$instance; }

		//Declare our variables.
		public $version = 12.0;
		public $status = array();

        //must set these so they're able to change later. //dynamic property violation otherwise.
        public $router = null;
        public $controller = null;
        public $mysql = null;

		//Our entry point in to the system.
		public function __construct(){

			//Run our code.
			$this->run();

		} //end function __construct();

		//Declare our method.
		public function run(){

			//We should initialise our mysql connection.
			$this->router 		= router::getInstance();
			$this->controller 	= controller::getInstance();
			$this->mysql 		= mysql::getInstance();

		} //end function run();

        public function getVersion()
        {
            return $this->version;
        }

	} //end class core.
