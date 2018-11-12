<?php

function admin_url($url = ''){
	return base_url('admin/'.$url);
}

function show_text($string, $exit = ''){
	echo '<pre>';
	var_dump($string);
	echo '</pre>';
	if(!empty($exit)){
		exit('');
	}
}