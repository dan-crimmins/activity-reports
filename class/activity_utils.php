<?php
namespace Communities\Activity_Reports;

class Activity_Utils {
	
	//class autoloader
	public static function autoload($class) {
	
		$class_dir = SHC_ACTIVITY_CLASS;
		
		$class_parts = explode('\\', $class);
		$index = count($class_parts) - 1;
		$file = strtolower(trim($class_parts[$index])) . '.php';
		
		
		//Check class root dir first
		if(file_exists($class_dir . $file)) {
				
			require_once $class_dir . $file;
				
		} else {
				
			//Get all sub-dirs in class root dir
			$dirs = scandir($class_dir);
	
			if($dirs) {
					
				$exclude = array('...', '..', '.');
					
				foreach($dirs as $dir) {
	
				if(is_dir($class_dir . $dir) && ! in_array($dir, $exclude)) {
						
					if(is_file($class_dir . $dir . '/' . $file)) {

					require_once $class_dir . $dir . '/' . $file;
					return;
					
					}
				}		
				
				}
				
			}
	
		}
	
	}
	
	public static function view($view, array $args = null, $return = false) {
	
		$file = SHC_ACTIVITY_VIEWS . $view . '.php';
	
	
		if($args !== null)
			extract($args, EXTR_SKIP);
			
		ob_start();
	
		if(is_file($file)) {
				
			include $file;
		}
	
		if(! $return) {
				
			echo ob_get_clean();
				
		} else {
				
			return ob_get_clean();
		}
	
	}
	
	
}