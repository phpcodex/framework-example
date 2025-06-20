<?php

	namespace imleeds\core;

	class router implements irouter {

		public $version = 1.0;
		public $name = null;
		public $token = "url";
		public $defaultValue = true;
		public $data = array();

		private $arguments = array();

        public $protocol = null;
        public $request_method = null;
        public $route_type = null;
        public $query = null;
        public $request = null;

		//Our single instance.
		private static $instance = null;
		public static function getInstance(){ if (is_null(static::$instance)) static::$instance = new static(); return static::$instance; }

		public function __construct(){

			if (isset($_SERVER["SHELL"])){

				$this->protocol 	= "SHELL";
				$this->request_method 	= "CLI";
				$this->route_type 	= "console";

				array_shift($_SERVER["argv"]);
				$this->query		= "url=" . implode("/", $_SERVER["argv"]);

			} else {

	                        //We need to identify if we're using SSL or not.
	                        $this->protocol         = (isset($_SERVER["HTTPS"])) 	? "HTTPS" : "HTTP";
	                        $this->document         = $_SERVER["DOCUMENT_ROOT"];
	                        $this->domain           = $_SERVER["SERVER_NAME"];
	                        $this->query            = $_SERVER["argv"][0];
				$this->request_method   = $_SERVER["REQUEST_METHOD"];
				$this->route_type	= "web";

			} //end if

                        //Process our url request.
			parse_str($this->query, $this->data);

                        //Begin to validate our query.
                        if (isset($this->data[$this->token])) $this->validateQuery();

		} //end function __construct();

		private function validateQuery(){

			//We should now split our expected url token.
			$data = explode("/", $this->data[$this->token]);

			//What request are we? web, api or console?
			//$this->route_type = (!empty($data) AND in_array($data[0], ["console", "api"])) ? $data[0] : "web";
			if ($data[0] == "api"){
				array_shift($data);
				$this->route_type = "api";
			} //end if

			//Final application which will allow the resource to continue loading for web, console and api requests.
			$this->data[$this->token] = implode("/", $data);

			//Remove our expected token.
			$this->request = $this->data[$this->token];

			//Remove the current token and also set further kvp data.
			unset($this->data[$this->token]);
			foreach ($data as $key => $val) $this->data[] = $val;

			//Now load our route start point.
			include(APPLICATION . DS . ROUTES . DS . $this->route_type . ".php");

		} //end function validateQuery();

		private function validateURI(&$uri){

                        //Obtain our uri.
			$info = explode("/", $uri);

                        //Remove the first part, which will always be blank. Starting from root!
                        array_shift($info);

                        //Loop each element now.
			$iteration = $iKey = 0;
			foreach ($info as $key => $val){

				//If we don't match our argument count, we should skip this result.
				if (count($info) != count($this->data)) continue;

                                //Check this value for...
                                if (substr($val, 0, 1) == "{" AND substr($val, -1, 1) == "}"){

					//if (isset($this->data[$iteration])){

                                        //Replace our string.
                                	$info[$key] = $this->data[$iteration];
					$this->arguments[$iKey] = $this->data[$iteration];

					//} //end if

					$iKey++;

				} //end if

				//Increase our iteration.
				$iteration++;

                        } //end foreach

                        $uri = "/" . implode("/", $info);

			return $uri;

		}

		public function get($uri, $callback){

			//Ensure we process our uri.
			$this->validateURI($uri);

			//Validate our request and process the callback.
			if ($this->request_method == "GET" && "/".$this->request == $uri)
				return $this->processCallback(eval("\$callback(\"". implode("\", \"", $this->arguments) ."\");"));

		} //end function get();

                public function cli($uri, $callback){

                        //Ensure we process our uri.
			$this->validateURI($uri);

                        //Validate our request and process the callback.
                        if ($this->request_method == "CLI" && "/".$this->request == $uri)
                                return $this->processCallback(eval("\$callback(\"". implode("\", \"", $this->arguments) ."\");"));

                } //end function cli();

		public function post($uri, $callback){

                        //Ensure we process our uri.
                        $this->validateURI($uri);

			//Validate our request and process the callback.
			if ($this->request_method == "POST" && "/".$this->request == $uri)
				return $this->processCallback(eval("\$callback(\"". implode("\", \"", $this->arguments) ."\");"));

                } //end function post();

		public function redirect($uri, $to, $type="302"){

			//Are we redirecting?
			if ("/".$this->request == $uri){

				header("Location: ".$to, true, $type);

			} //end if

		} //end function redirect();

		public function view($uri, $view){

                        //Ensure we process our uri.
                        $this->validateURI($uri);

			//Process our view.
			if ("/".$this->request == $uri) return $view;

		} //end function view();

		public function controller($controller, $method){

			//We really want to load in our controller.
			$holder = new $controller;

			//We also want to run it...If we can.
			if (method_exists($holder, $method)) $holder->$method();

		} //end function controller;

		private function processCallback($callback){ 

			return $callback;
	       
		}

	} //end class router
