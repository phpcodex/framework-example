<?php

use Illuminate\Database\Capsule;
use imleeds\core;

	class console extends imleeds\core\controller {

        protected $displayed = false;

        private function textColorGreen()
        {
            return "\033[32m";
        }

        public function textColorBlue()
        {
            return "\033[94m";
        }


        private function textColorRed()
        {
            return "\033[31m";
        }

        private function textColorNormal()
        {
            return "\033[39m";
        }
		private function displayLine($part1, $part2=""){

            if (!$this->displayed) {
                $this->displayed = true;
                echo $this->textColorRed();
                {
                    echo $this->textColorRed() . "Welcome to the CLI. IMLeeds framework version: " . $this->version . "\n\n";
                }
            }
			if ($part2 == ""){

				//Display our header info.
				echo $this->textColorRed() . $part1 . "\n";

			} else {

				//Display a line.
				$p1Length = 30 - strlen($part1);
				echo str_repeat(" ", 5)
                    . $this->textColorBlue() . $part1 . str_repeat(" ", $p1Length)
                    . $this->textColorGreen() . $part2 . "\n";

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
