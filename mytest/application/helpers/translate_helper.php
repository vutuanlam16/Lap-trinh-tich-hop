<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('trans'))
{
	function trans($id, $parameters_array = array(), $language = NULL){
		$array_index = explode('.', $id);
		
		$lang_file = $array_index[0];
		$line = $array_index[1];
		
		$CI = &get_instance();
		
		$CI->lang->load($lang_file, $language);
		
		$array_text = $CI->lang->line($lang_file);

		
		if(!is_array($array_text)) return $array_text;
		
		array_splice($array_index, 0, 2);
		
		$result_text = '';
		
		foreach ($array_index as $index){
			$result_text = isset($array_text[$index]) ? $array_text[$index] : $result_text;
			$array_text = $result_text;
		}
		
		return $result_text?$result_text:$id;
	}
	
	function show_lang(){
		$CI = &get_instance();
		
		$CI->lang->load('message', 'english');
		
		echo $CI->lang->line('message_not_login');
	}
	
}