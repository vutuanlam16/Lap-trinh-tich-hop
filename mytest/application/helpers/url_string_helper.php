<?php
function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function checkurl($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        return true;
    }else{
        return false;
    }
}
/*function convertNumber($so)
{
    if ($so != 0) $re = number_format($so, 0, ".", ".");
    else $re = 0;
    return $re;
}*/
function getCurrentPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
  $pageURL = explode("&page=", $pageURL);
    return $pageURL[0];
}
if (!function_exists('converdomain')) {
    function converdomain($domain){
        $website = parse_url($domain); 
        $result = preg_replace('#^www\.(.+\.)#i', '$1', $website['host']);
        return $result;
    }
}
function setDateTime($mString, $iTime = AFFILIATE_TIME)
{
    return gmdate($mString, $iTime + 3600 * 7);
}

function changeTitle($str)
{
  $str = stripUnicode($str);
  $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
  $str = trim($str);
  $str=preg_replace('/[^a-zA-Z0-9@.\ ]/','',$str); 
  $str = str_replace("  "," ",$str);
  $str = str_replace(" ","-",$str);
  return $str;
}
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
      'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
      'i'=>'í|ì|ỉ|ĩ|ị',   
      'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
      'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
      'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
      $arr=explode("|",$codau);
      $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function check_url($status)
{
    if ($status == 0) {
        echo '<script type="text/javascript">alert("Tài khoản của bạn đang chờ duyệt");</script>';
        echo '<script type="text/javascript">window.location.replace("' . base_url('register/unregister') . '");</script>';
        // redirect(base_url('register/register'));
    }
}

function current_full_url()
{
    $CI =& get_instance();

    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
}

function checkUrlMerchant($merchant, $shop_id)
{

    if (strpos($_SERVER['HTTP_HOST'], DOMAIN_MERCHANT) !== false && $merchant == ROLE_ID && $shop_id > 0) {

    } else {
        redirect(base_url('Home/error'));
    }
}

function checkSaleMall($sale_mall)
{
    if (strpos($_SERVER['HTTP_HOST'], DOMAIN_AFF) !== false && $sale_mall == SALE_MALL) {

    } else {
        redirect(base_url('Home/error'));
    }
}
function getImageServer($url)
{
    $image_result = file_get_contents($url);
    return preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$image_result);
}