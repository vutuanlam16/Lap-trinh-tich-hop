<?php 

function import_data($path_file, $type = 'csv'){
	if($path_file != NULL){
		if (file_exists($path_file)) {
			$file = file_get_contents($path_file);
			$data = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $file));
			return $data;
		}
	}	
	return NULL;
}