<?php

	class console extends imleeds\core\controller {

		private function displayLine($part1, $part2=""){

			if ($part2 == ""){

				//Display our header info.
				echo "\e[93m" . $part1 . "\n";

			} else {

				//Display a line.
				$p1Length = 30 - strlen($part1);
				echo str_repeat(" ", 5) . "\e[92m" . $part1 . str_repeat(" ", $p1Length) . "\e[0m" . $part2 . "\n";

			} //end if

		} //end function displayLine();

		public function help(){

			//Begin our help display.	
			$this->displayLine("console");
			$this->displayLine("help", "This will load the help information for the console.");
			$this->displayLine("unknown", "The main console class.");

			$this->displayLine("welcome");
			$this->displayLine("home", "This is the default output for home");
			$this->displayLine("home2", "This is an upgraded version of home");
	       
		} //end function help.

	} //end class help.
