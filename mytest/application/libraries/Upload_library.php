<?php
class Upload_library {
	var $CI = '';
	
	function __construct(){
		$this->CI = & get_instance();
	}
	
	/**
	 * @desc set config upload
	 * @param string $upload_path
	 * @return string[]
	 */
	public function config($upload_path = ''){
		$config = array();
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|gif|png|jpeg';
		// $config['max_height'] = '4112';
		// $config['max_width'] = '4112';
		// $config['max_size'] = '4112';
		
		return $config;
	}
	
	/**
	 * @desc Upload 1 file 
	 * @param string $path_file
	 * @param string $file_name
	 * @return array() or NULL
	 */
	public function upload_file($path_file, $file_name){
		$data = NULL;
		if(!empty($_FILES[$file_name]['name'])){
			$config = $this->config($path_file);
			$this->CI->load->library('upload', $config);
			if($this->CI->upload->do_upload($file_name)){
				$data = $this->CI->upload->data();
			} else {
				$data = $this->CI->upload->display_errors();
			}
		}
		return $data;
	}
	
	/**
	 * @desc Upload multiple file
	 * @param string $path_file
	 * @param string $file_name
	 * @return array() or NULL
	 */
	public function upload_files($path_file, $file_name){
		$data = NULL;	
		$file = $_FILES[$file_name];
		$count_file = count($file['name']);
		if($count_file > 0 && !empty($file['name'][0])){
			$config = $this->config($path_file);
			for($i = 0; $i < $count_file; $i++){
				$_FILES[$file_name]['name'] = $file['name'][$i];
				$_FILES[$file_name]['type'] = $file['type'][$i];
				$_FILES[$file_name]['tmp_name'] = $file['tmp_name'][$i];
				$_FILES[$file_name]['error'] = $file['error'][$i];
				$_FILES[$file_name]['size'] = $file['size'][$i];
			
				$this->CI->load->library('upload', $config);
				if($this->CI->upload->do_upload($file_name)){
					$data[] = $this->CI->upload->data();					
				} else {
					$data[] = $this->CI->upload->display_errors();
				}
			}
		}
		return $data;
	}
}