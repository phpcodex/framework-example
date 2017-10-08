<?php

	namespace imleeds\core;

	interface irouter {

		public function get($uri, $callback);
		public function post($uri, $callback);
		public function redirect($uri, $to, $type);
		public function controller($controller, $method);

	} //end interface router.
