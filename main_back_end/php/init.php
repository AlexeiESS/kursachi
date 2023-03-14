<?php
$engine = __DIR__;
$engine_cfg = __DIR__;
$upload_dir = 	substr(__DIR__, 0, -3);
define('CFG',$engine_cfg.'/configs');
define('UPL',$upload_dir.'upload'); 
if ($handle = opendir(CFG)) {
   	 while (false !== ($configs = readdir($handle))) {  
   	 			if(!is_dir($configs)){
    		        require_once(''.CFG.'/'.$configs.'');
  		 }
  	}
  	  closedir($handle); 
	}



define('CLASSES',$engine.'/classes');
if ($handle = opendir(CLASSES)) {
   	 while (false !== ($classes = readdir($handle))) {  
   	 			if(!is_dir($classes)){
   	 				require_once(''.CLASSES.'/'.$classes.'');
  		 }
  	}
  	  closedir($handle); 
	}

?>