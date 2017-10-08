<?php

	//List files from a dir in an array.
	if (!function_exists("listFiles")){
		function listFiles($dir, $ignore=array()){
			
			$output["file"] = array();
			$output["dir"] = array();
			
			if ($handle = opendir($dir)){
				while (false !== ($file = readdir($handle))){
					$file = trim($file);
					if ($file != "." && $file != ".." && $file != 	"index.html" && $file != "info.txt" && $file != "desktop.ini" && !	in_array($file, $ignore)){	
						if (is_dir($dir."/".$file)){
							$output["dir"][] = $file;
						} else {
							$output["file"][] = $file;
						} //end if
					}//end if
				} //end while
			} //end if
			return $output;
		} //end function listFiles();
	} //end if