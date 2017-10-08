<?php

	class welcome extends imleeds\core\controller {

		public function home(){ echo "You are home."; }

		public function home2(){
			echo "Welcome to home2 now";

		} //end function home();

		public function stdin(){

			echo fread(fopen(STDIN, r), 1024);

		} //end function stdin;

	} //end class welcome.
