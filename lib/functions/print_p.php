<?php

	//List files from a dir in an array.
	if (!function_exists("print_p")){
		function print_p($info=array()){
			
			//We want to show our array, so let's make it look pretty.
			$output = "<div style='opacity: 0.5; border: solid red 1px; font-size: 10px; font-family: tahoma; background-color: #EEEEEE; padding: 5px;'><pre>";
				ob_start();
				print_r($info);
				$output .= ob_get_clean();
			$output .= "</pre></div>";

			//Output the information.
			echo $output;
			
		} //end function print_p();
	} //end if