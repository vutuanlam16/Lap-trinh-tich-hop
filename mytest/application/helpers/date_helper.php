<?php

include_once './system/helpers/date_helper.php';

function get_date($time, $datetime = FALSE){
	$format_date = 'd-m-Y';
	if($datetime) $format_date .= ' H:i:m';
		return date($format_date, $time);
	}

	function get_time_info($datetime){
		$info = array();
		$info['d'] = intval(date('d', $datetime));
		$info['m'] = intval(date('m', $datetime));
		$info['y'] = intval(date('Y', $datetime));
		$info['h'] = intval(date('H', $datetime));
		$info['i'] = intval(date('i', $datetime));
		$info['s'] = intval(date('s', $datetime));
		return $info;
	}

	function string_to_timestamp($format, $datetime){
		$dtime = DateTime::createFromFormat($format, $datetime);
		if($dtime){
			return $dtime->format('U');
		}
		return FALSE;
	}

	function get_time_form_date(){

	}

	function get_time_between(){

	}

	function get_time_between_day(){

	}

	function time_ago($time_ago){  
		$current_time = time();  
		$time_difference = $current_time - $time_ago;  
		$seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
      	return "Vừa xong";  
      }  
      else if($minutes <=60)  
      {  
      	if($minutes==1)  
      	{  
      		return "1 phút trước";  
      	}  
      	else 
      	{  
      		return "$minutes phút trước";  
      	}  
      }  
      else if($hours <=24)  
      {  
      	if($hours==1)  
      	{  
      		return "1 giờ trước";  
      	}  
      	else 
      	{  
      		return "$hours giờ trước";  
      	}  
      }  
      else if($days <= 7)  
      {  
      	if($days==1)  
      	{  
      		return "1 ngày trước";  
      	}  
      	else 
      	{  
      		return "$days ngày trước";  
      	}  
      }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
      	if($weeks==1)  
      	{  
      		return "1 tuần trước";  
      	}  
      	else 
      	{  
      		return "$weeks tuần trước";  
      	}  
      }  
      else if($months <=12)  
      {  
      	if($months==1)  
      	{  
      		return "1 tháng trước";  
      	}  
      	else 
      	{  
      		return "$months tháng trước";  
      	}  
      }  
      else 
      {  
      	if($years==1)  
      	{  
      		return "1 năm trước";  
      	}  
      	else 
      	{  
      		return "$years năm trước";  
      	}  
      }  
  } 
  ?>