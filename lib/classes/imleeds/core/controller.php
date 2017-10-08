<?php

	namespace imleeds\core;

	class controller {

		public $version;

                //Our single instance.
                private static $instance = null;
                public static function getInstance(){ if (is_null(static::$instance)) static::$instance = new static(); return static::$instance; }

		public function __construct(){

			$this->version = 1.0;

			//This class should identify what kind of controller we are attempting to load.
			//$this->router = router::getInstance();
			

		}

	} //end class controller.
