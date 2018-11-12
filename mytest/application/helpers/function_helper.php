<?php
function google_shorten($long_url) {

    $ch = curl_init('https://www.googleapis.com/urlshortener/v1/url' . '?key=' . 'AIzaSyC5LnjfTCdthJMcBLBzebSffnSlH0OXo_c');

    curl_setopt_array(
        $ch,
        array(
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_CONNECTTIMEOUT => 0,
            CURLOPT_POST => 1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => '{"longUrl": "' . $long_url . '"}'
        )
    );

    $json_response = json_decode(curl_exec($ch), true);
    return $json_response['id'] ? $json_response['id'] : '404';
}
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
function coverMobile($mobile) {
    return substr($mobile,0,-2) . 'xx';
}
function coverEmail($email) {
    return 'xx' . substr($email,2);
}
function getSubdomainFromUrl($url)
{
    $parse = parse_url($url);
    $url_explode = explode('.',$parse['host']);
    return $url_explode[0];
}
function get_domain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    return $domain;
}
function remove_http($url) {
    $disallowed = array('http://', 'https://');
    $parse = parse_url($url);
    if(isset($parse['host']))
        $url = preg_replace('#^www\.(.+\.)#i', '$1', $parse['host']);

    foreach($disallowed as $d) {
        if(strpos($url, $d) === 0) {
            return str_replace($d, '', $url);
        }
    }

    return $url;
}
function get_link_sign_inet($act, $token, $url_return)
{
    $url = '#';
    switch ($act) {
        case 'login':
            $url = ID_URL . 'login?url=' . $url_return . '&token=' . $token;
            break;

        case 'logout':
            $url = ID_URL . 'logout?url=' . $url_return . '&token=' . $token;
            break;
    }
    return $url;
}
function aliasUrl($fragment)
{
    trim($fragment);
    $translite_simbols = array ('#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',  '#(ì|í|ị|ỉ|ĩ)#', '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',  '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', '#(ỳ|ý|ỵ|ỷ|ỹ)#', '#(đ)#',  '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',  '#(Ì|Í|Ị|Ỉ|Ĩ)#', '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',  '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', '#(Đ)#',  "/[^a-zA-Z0-9\-\_]/", '#quot#', ) ;
    $replace = array ( 'a', 'e', 'i', 'o', 'u',  'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-', '', ) ;
    $fragment =  preg_replace($translite_simbols, $replace, trim($fragment));
    $fragment = preg_replace('/(-)+/', '-', $fragment);
    return strtolower($fragment);
}
function removeUnicode($fragment)
{
    trim($fragment);
    $translite_simbols = array ('#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',  '#(ì|í|ị|ỉ|ĩ)#', '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',  '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', '#(ỳ|ý|ỵ|ỷ|ỹ)#', '#(đ)#',  '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',  '#(Ì|Í|Ị|Ỉ|Ĩ)#', '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',  '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', '#(Đ)#',  "/[^a-zA-Z0-9\-\_]/", '#quot#', ) ;
    $replace = array ( 'a', 'e', 'i', 'o', 'u',  'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-', '', ) ;
    $fragment =  preg_replace($translite_simbols, $replace, trim($fragment));
    $fragment = preg_replace('/(-)+/', ' ', $fragment);
    return strtolower($fragment);
}
function stripUnicode($str){
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
function callAPIGET($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    return $data;
}
function callAPI($url, $data = '')
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    return $response;
}
function affAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "post":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "put":
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "delete":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$result);
}
function callApiBusship($url, $json_data = '', $type = "POST"){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type,
        CURLOPT_POSTFIELDS => $json_data,
        CURLOPT_HTTPHEADER => array(
            "Access-Token: ". BUSSHIP_TRANSPORT_KEY,
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}
function callApiGHTK($url, $json_data = '', $type = "POST"){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type,
        CURLOPT_POSTFIELDS => $json_data,
        CURLOPT_HTTPHEADER => array(
            "Token: ". GHTK_TRANSPORT_KEY,
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}
function callApiGHTKTinhPhi($json_data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($json_data),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Token: ". GHTK_TRANSPORT_KEY,
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}
function objToArray($obj = array(), &$arr = array()){

    if(!is_object($obj) && !is_array($obj)){
        $arr = $obj;
        return $arr;
    }

    foreach ($obj as $key => $value)
    {
        if (!empty($value))
        {
            $arr[$key] = array();
            objToArray($value, $arr[$key]);
        }
        else
        {
            $arr[$key] = $value;
        }
    }
    return $arr;
}
function debugSQL()
{
    $CI =& get_instance();
    $sql = $CI->db->last_query();
    echo $sql;die;
}
function convertNumber($so)
{
    if($so!=0) $re = number_format($so,0,".",".");
    else $re = 0;
    return $re;
}
function convertPercent($a, $b, $sufix = true)
{
    if($b){
        $c = $a/$b;
//        $c = $c . ($sufix) ? '%' : '';
    }
    else{
        $c = ($sufix) ? '-' : 0;
    }
    return $c;
}
function removeNumber($so)
{
    $so = str_replace(' ','',$so);
    $so = str_replace('đ','',$so);
    $so = str_replace(',','',$so);
    return str_replace('.','',$so);
}
function getOrderStatus($type, $value = 'list', $status = 0)
{
    $data = array();
    if($type == 'pay_status')
    {
        $data = array(
            PAY_STATUS_PENDING => 'Chưa thanh toán',
            PAY_STATUS_PAID => 'Đã thanh toán',
            PAY_STATUS_SPLITED => 'Đã chia',
            PAY_STATUS_FREE => 'Miễn phí',
            PAY_STATUS_CANCEL => 'Huỷ',
        );
    }
    elseif($type == 'pay_type')
    {
        $data = array(
            PAY_TYPE_NONE => 'Khác',
            PAY_TYPE_ONLINE => 'Online',
            PAY_TYPE_BANK => 'Banking',
            PAY_TYPE_COD => 'COD',
            PAY_TYPE_SALE => 'Sale',
        );
    }
    elseif($type == 'order_status')
    {
        $data = array(
            STATUS_PENDING=> 'Chưa xử lý',
            STATUS_PROCESSING=> 'Đang xử lý',
            STATUS_DELIVERING=> 'Đang giao hàng',
            STATUS_SUCCESS=> 'Thành công',
            STATUS_CANCELLED=> 'Hủy',
            STATUS_RETURNED=> 'Trả lại',
            STATUS_REFUNDED=> 'Hoàn đơn',
            STATUS_DELETE=> 'Xoá',
        );
    }
    elseif($type == 'sub_status')
    {
        if($status == STATUS_PROCESSING){
            $data = array(
                SUB_STATUS_START=> 'Bắt đầu xử lý',
                SUB_STATUS_ERROR_PHONE=> 'Thuê bao',
                SUB_STATUS_NO_LISTEN=> 'Không nghe máy',
                SUB_STATUS_THINK_MORE=> 'Suy nghĩ thêm',
                SUB_STATUS_LAST_CALL=> 'Gọi lại sau',
                SUB_STATUS_WAIT_IMPORT=> 'Chờ nhập hàng',
                SUB_STATUS_CREATED_TRANSPORT=> 'Đã tạo vận đơn',
                SUB_STATUS_CANCEL_TRANSPORT=> 'Hủy vận đơn',
                SUB_STATUS_WAIT_GUEST_TRANSFER=> 'Khách đang chuyển khoản',
            );
        }
        elseif($status == STATUS_DELIVERING){
            $data = array(
                SUB_STATUS_NO_PRINT=> 'Chưa in đơn',
                SUB_STATUS_PRINTED=> 'Đã in đơn',
                SUB_STATUS_DELIVERY_SHIP=> 'Đã giao ship',
                SUB_STATUS_SHIP_RECEIVE=> 'Ship đã nhận',
                SUB_STATUS_DELIVERING=> 'Đang đi giao',
                SUB_STATUS_DELIVERED=> 'Đã giao cho khách',
                SUB_STATUS_SHOP_DELIVERING=> 'Shop tự giao',
            );
        }
        elseif($status == STATUS_SUCCESS){
            $data = array(
                SUB_STATUS_GUEST_RECEIVED=> 'Khách đã nhận hàng',
                SUB_STATUS_GUEST_RECEIVED_NOTE=> 'Đã lấy ý kiến khách hàng',
            );
        }
        elseif($status == STATUS_CANCELLED){
            $data = array(
                SUB_STATUS_GEST_CANCEL=> 'Khách yêu cầu hủy',
                SUB_STATUS_GEST_NO_REGIS=> 'Tôi không đăng ký',
                SUB_STATUS_GEST_BUY_OTHER=> 'Đã mua chỗ khác',
                SUB_STATUS_GEST_NO_LIKE=> 'Không có nhu cầu',
                SUB_STATUS_GEST_NO_CALL=> 'Không nghe máy',
                SUB_STATUS_NO_PRODUCT=> 'Hết hàng',
            );
        }
        elseif($status == STATUS_DELETE){
            $data = array(
                SUB_STATUS_ORDER_DUPLIATE=> 'Trùng đơn',
                SUB_STATUS_ORDER_TEST=> 'Test',
                SUB_STATUS_ERROR_MOBILE=> 'Thuê bao',
                SUB_STATUS_SPAM=> 'Spam',
            );
        }
        elseif($status == STATUS_REFUNDED){
            $data = array(
                SUB_STATUS_GUEST_NO_RECEIVE=> 'Khách không nhận',
                SUB_STATUS_ERROR_PRODUCT=> 'Hàng lỗi, hỏng',
                SUB_STATUS_NOT_LIKE_PRODUCT=> 'Hàng không phù hợp',
                SUB_STATUS_PRODUCT_NOT_ADS=> 'Hàng không như quảng cáo',
                SUB_STATUS_NO_LISTEN_RETURN=> 'Không nghe máy',
                SUB_STATUS_NO_LISTEN_RETURN_IMPORT=> 'Đã nhập kho',
            );
        }
        elseif($status == STATUS_RETURNED){
            $data = array(
                SUB_STATUS_GUEST_NO_RECEIVE_RETURN=> 'Khách không nhận',
                SUB_STATUS_ERROR_PRODUCT_RETURN=> 'Hàng lỗi, hỏng',
                SUB_STATUS_NOT_LIKE_PRODUCT_RETURN=> 'Hàng không phù hợp',
                SUB_STATUS_PRODUCT_NOT_ADS_RETURN=> 'Hàng không như quảng cáo',
                SUB_STATUS_PRODUCT_NOT_ADS_RETURN_IMPORT=> 'Đã nhập Kho',
            );
        }
        else{
            $data = array(
                SUB_STATUS_NEW=> 'Mới',
            );
        }
    }
    elseif($type == 'ship_status')
    {
        $data = array(
            SHIP_STATUS_PENDING=> 'Chờ duyệt',
            SHIP_STATUS_APPROVED=> 'Đã duyệt',
            SHIP_STATUS_PICKING=> 'Đang lấy hàng',
            SHIP_STATUS_PICK_FAILED=> 'Lấy hàng không thành công',
            SHIP_STATUS_PICKED=> 'Đã lấy',
            SHIP_STATUS_PACKAGED=> 'Đã đóng gói',
            SHIP_STATUS_DELIVERING=> 'Đang chuyển hàng',
            SHIP_STATUS_DELIVER_FAILED=> 'Chuyển hàng ko thành công',
            SHIP_STATUS_DELIVERED=> 'Đã chuyển hàng thành công',
            SHIP_STATUS_RETURN_WAITING=> 'Chờ xác nhận chuyển hoàn',
            SHIP_STATUS_RETURNED=> 'Đã chuyển hoàn',
            SHIP_STATUS_CANCELLED=> 'Hủy đơn hàng',
        );
    }
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function getPaymentAccount($value = 'list')
{
    $data = array(
        PAYMENT_ACCOUNT_HN=> 'Quỹ Hà Nội',
        PAYMENT_ACCOUNT_HCM=> 'Quỹ Hồ Chí Minh',
        PAYMENT_ACCOUNT_NL=> 'Ngân lượng',
        PAYMENT_ACCOUNT_BANK=> 'Ngân hàng',
        PAYMENT_INET_PAY=> 'iNET PAY',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
        else{
            return "MerchantCron";
        }
    }
}
function getOrderType($value = 'list')
{
    $data = array(
        ORDER_TYPE_NORMAL=> 'Đơn thường',
        ORDER_TYPE_PRE=> 'Sản phẩm sắp ra mắt',
        ORDER_TYPE_ADVISORY=> 'Đơn tư vấn',
        ORDER_TYPE_CARE=> 'Đơn quan tâm',
        ORDER_TYPE_INTERNAL=> 'Đơn nội bộ',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function getShopStatus($value = 'list')
{
    $data = array(
        SHOP_STATUS_NEW=> 'Mới',
        SHOP_STATUS_PROCESSING=> 'Đang xử lý',
        SHOP_STATUS_ACCEPT=> 'Đồng ý',
        SHOP_STATUS_PUBLISH=> 'Xuất bản',
        SHOP_STATUS_REJECT=> 'Từ chối',
        SHOP_STATUS_CANCEL=> 'Đã hủy',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function getOrderSource($value = false)
{
    $data = array(
        1=> 'Form đăng ký',
        2=> 'Nút đặt mua',
        3=> 'Qua API',
    );
    if((int)$value > 0 )
        return $data[$value];
}
function getPaymentType($value = false)
{
    $data = array(
        TYPE_CASH_IN=> 'Phiếu thu',
        TYPE_SHOP_IN=> 'Nạp tiền',
        TYPE_SHOP_OUT=> 'Ghi nợ',
        TYPE_CASH_OUT=> 'Phiếu chi',
        TYPE_TRANSFER=> 'Chuyển tiền',
        PAYMENT_TYPE_PREPAID=> 'Nạp tiền',
    );
    if((int)$value > 0 )
        return $data[$value];
    return $data;
}
function getOrderStore()
{
    $data = array(
        'store_name'=> 'SaleMall Hà Nội',
        'store_user_name'=> 'Phạm Kim Ngọc',
        'store_mobile'=> '0981828186',
        'store_city'=> 18,
        'store_district'=> 178,
        'store_address'=> 'Tầng 7, Số 247 Cầu Giấy',
    );
    return $data;
}
function getEmailProcess($value = false)
{
    $data = array(
        1=> 'Process 1',
        2=> 'Process 2',
    );
    if((int)$value > 0 )
        return $data[$value];
    return $data;
}
function getPayAccount($value = false)
{
    $data = array(
        "bank"=> "Banking",
        "home"=> "COD",
        "visa"=> "VISA",
        "atm"=> "Thẻ ATM",
        "nl"=> "Ngân lượng",
        "card"=> "Thẻ cào",
        "ipay"=> "IPAY",
        "pp"=> "PayPal"
    );
    if($value)
        return $data[$value];
    return $data;
}
function getCustomerGroup($type, $value = false)
{
    if($type == 'customer_group')
    {
        $data = array(
            1=> 'Tổng tiền tích luỹ',
            2=> 'Tổng tiền mỗi tháng',
            3=> 'Mức trung bình theo tháng',
            4=> 'Tổng tích lũy theo kỳ 2 tháng',
            5=> 'Tổng tích lũy theo kỳ 3 tháng',
            6=> 'Tổng tích lũy theo kỳ 4 tháng',
            7=> 'Tổng tích lũy theo kỳ 6 tháng',
            8=> 'Tổng tích lũy theo kỳ 12 tháng',
        );
    }
    if((int)$value > 0 )
        return $data[$value];
    return $data;
}
function setDateTime($mString,$iTime=AFFILIATE_TIME)
{
    return date($mString, $iTime);
}
function getCurrentUrl()
{
    $CI =& get_instance();

    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}
function convertDate($date)
{
    $data = explode('-', $date);
    if($data[0]){
        return array(strtotime(str_replace('/', '-', $data[0])), strtotime(str_replace('/', '-', $data[1])));
    }
}
function checkData($value)
{
    $return_value = ($value) ? $value : -1;
    return $return_value;
}
function checkMoney($value, $zero = false)
{
    if(isset($value) && $value > 0){
        return convertNumber($value) . 'đ';
    }
    else{
        if($zero){
            if($value == 0)
                return '0đ';
            else
                return convertNumber($value).'đ';
        }
        return '-';
    }
}
function getIdFromArray($array = array(), $field)
{
    if($array){
        $array_convert = array();
        foreach($array as $value){
            if($value[$field])
                $array_convert[] = $value[$field];
        }
        return $array_convert;
    }
}
function getPriceVendorPack($price, $num_month, $type=false)
{
    $total = $num_month * $price;
    if($num_month == 6){
        $sale_off = $total/10; // 10%
    }
    elseif($num_month == 12){
        $sale_off = $total/5; // 20%
    }
    else{
        $sale_off = 0;
    }
    if($type == 'sale_off'){
        return $sale_off;
    }
    if($type == 'total'){
        return $total;
    }
    $total_sale = $total - $sale_off;
    return $total_sale;
}
function getLinkPaymentINET($str, $str_token)
{
    $url_token = urlencode(base64_encode($str_token));
    return 'http://pay.inet.vn/api/payment.jsp?inet_id=' . INET_ID . '&amp;params=' . $url_token . "&checksum=" . md5($str);
}
function getTagGuides()
{
    $data = array(
        '{{NAME}}',
        '{{CUSTOMER_EMAIL}}',
    );
    return $data;
}
function getObjectUsers()
{
    $data = array(
        CONTACT_TYPE_ALL => 'Tất cả',
        CONTACT_TYPE_USER => 'User',
        CONTACT_TYPE_AFF => 'Affiliate',
        CONTACT_TYPE_SHOP_OWNER => 'Chủ Shop',
        CONTACT_TYPE_SHOP_CONTACT => 'Contact',
        CONTACT_TYPE_CUSTOMER => 'Khách hàng',
    );
    return $data;
}
function getCustomerBuys()
{
    $data = array(
        CONTACT_TYPE_ALL => 'Tất cả',
        CUSTOMER_TYPE_NEW => 'Quan tâm',
        CUSTOMER_TYPE_ORDERED => 'Ordered',
        CUSTOMER_TYPE_BOUGHT_ONE => 'Buy One',
        CUSTOMER_TYPE_BOUGHT_MULTI => 'Buy Multi',
    );
    return $data;
}
function getPaymentStatus($value = 'list')
{
    $data = array(
        PAYMENT_STATUS_NEW => 'Chờ duyệt',
        PAYMENT_STATUS_ACCEPTED => 'Đã duyệt',
        PAYMENT_STATUS_REVIEW => 'Chia lỗi',
//        PAYMENT_STATUS_UPDATED => 'Cập nhật',
        PAYMENT_STATUS_CANCELED => 'Đã hủy',
        PAYMENT_STATUS_SUCCESS => 'Đã chia',
        PAYMENT_STATUS_TRANSFER => 'Đã chuyển',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function getStoreType($value = 'list')
{
    $data = array(
        STORE_EXPORT => 'Xuất Kho',
        STORE_IMPORT => 'Nhập Kho',
        STORE_TRANSFER => 'Chuyển Kho',
        STORE_CANCEL => 'Hủy hàng',
        STORE_SALE => 'Bán hàng',
        STORE_CHECK => 'Kiểm Kho',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function getStoreHistoryStatus($value = 'list')
{
    $data = array(
        STORE_HISTORY_IN => 'Đã nhập',
        STORE_HISTORY_OUT => 'Đã xuất',
        STORE_HISTORY_CANCEL => 'Đã hủy',
    );
    if($value == 'list'){
        return $data;
    }
    else{
        $value = (int)$value;
        if(isset($data[$value])){
            return $data[$value];
        }
    }
}
function checkEmailAdmin($value)
{
    $aEmailConfig = explode(',',INET_EMAIL_ADMIN);
    $aEmail = explode('@', $value);
    if (in_array($aEmail[1], $aEmailConfig)) {
        return true;
    }else{
        return false;
    }
}
function getImageServer($url)
{
    $image_result = file_get_contents($url);
    return preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$image_result);
}
function convertTemplateEmail($map_template, $template = '')
{
    if(!$map_template)
        return $template;
    $pattern = '{{%s}}';
    foreach($map_template as $var => $value)
    {
        $map[sprintf($pattern, $var)] = $value;
    }
    $output = strtr($template, $map);
    return $output;
}
function getEmailList($data){
    $email_data = array();
    $CI = get_instance();
    $CI->load->model('users_model');
    $map_template = array('current_time'=> setDateTime('h:i:s A', AFFILIATE_TIME), 'current_date'=> setDateTime('d/m/Y', AFFILIATE_TIME));
    // phần chung lấy thông tin đối tượng
    if(isset($data['shop_id'])){
        $CI->load->model('shops_model');
        $select = 's.id as shop_id, s.name as shop_name, s.logo_name as shop_logo_name, s.email as shop_email, s.sub_domain as shop_sub_domain, s.website as shop_website, s.phone as shop_phone, s.status as shop_status, s.creator_id';
        $shop = $CI->shops_model->getShopInfo(array('select' => $select, 'id'=> $data['shop_id']));
        $shop_user = $CI->users_model->getUserInfo(array('select' => "u.id, u.inet_id, u.full_name, u.email, u.mobile", 'id' => $shop['creator_id']));
        if($shop['shop_status'] == 1){
            $shop_status = 'Đã hoạt động';
        }
        else{
            $shop_status = 'Đã dừng';
        }
        if($shop['shop_sub_domain']){
            $shop_url = 'https://'. $shop['shop_sub_domain'] .'.salemall.vn';
            $shop_url = '<a href="'. $shop_url .'">'. $shop_url .'</a>';
        }
        else{
            $shop_url = '';
        }
        $map_template = array_merge($map_template, array(
            'shop_logo' => $shop['shop_logo'], //shop


            'shop_name' => $shop['shop_name'], //shop
            'shop_email' => $shop['shop_email'], //shop
            'shop_phone' => $shop['shop_phone'], //shop
            'shop_website' => $shop['shop_website'], //shop
            'shop_status' => $shop_status, //shop
            'shop_message' => $data['shop_message'],
            'shop_url' => $shop_url,
            'id' => $shop_user['id'], // tên người dùng
            'name' => $shop_user['full_name'], // tên người dùng
            'email' => $shop_user['email'], // người dùng
            'phone' => $shop_user['mobile'], // người dùng
        ));
    }

    if(isset($data['user_id'])){
        $select = "u.id, u.inet_id, u.full_name, u.email, u.mobile";
        $user = $CI->users_model->getUserInfo(array('select' => $select, 'id' => $data['user_id']));
        $map_template = array_merge($map_template, array(
            'id' => $user['id'], // tên người dùng
            'name' => $user['full_name'], // tên người dùng
            'email' => $user['email'], // người dùng
            'phone' => $user['mobile'], // người dùng
        ));
    }

    if(isset($data['partner_id'])){
        $CI->load->model('vendors_model');
        $select = "v.id as partner_id, v.name as partner_name, v.logo_name as partner_logo_name, v.email as partner_email, v.mobile as partner_phone, v.website as partner_website, v.address as partner_address";
        $partner = $CI->vendors_model->getVendorInfo(array('select' => $select, 'id' => $data['partner_id']));
        $map_template = array_merge($map_template, array(
            'company_name' => $partner['partner_name'], // vendor
            'company_logo' => $partner['partner_logo'], // vendor
            'company_email' => $partner['partner_email'], // vendor
            'company_phone' => $partner['partner_phone'], // vendor
            'company_website' => $partner['partner_website'], // vendor
            'company_address' => $partner['partner_address'], // vendor
        ));
    }

    if(isset($data['order_id'])){
        $CI->load->model('orders_model');
        $aOrder = $CI->orders_model->getOrder(array('id'=> $data['order_id'], 'product_list'=> true));
        // lấy thông tin items
        $html_items = '<table border="1" cellpadding="3" cellspacing="0" style="
    border-color: #ccc;
"><tr><th>Ảnh</th><th> Sản phẩm - Dịch vụ </th><th> Đơn giá </th><th> Số lượng </th></tr><tbody>';
        foreach($aOrder['product'] as $product){
            $html_items .= '<tr><td><img width="100" alt="' . $product['name']. '" src="'. $product['logo_image_show'] .'"></td><td>' . $product['name'] .'</td><td> ' . $product['price_show'] .' đ</td><td align="center"> ' . $product['quantity'] .' </td></tr>';
        }
        if($aOrder['ship_fee']){
            $html_items .= '<tr><td colspan="4">Phí Ship: <span>'. convertNumber($aOrder['ship_fee']). ' đ</span></td></tr></tbody></table>';
        }
        $html_items .= '<tr> <td colspan="4">Tổng tiền: <span>'. convertNumber($aOrder['total_price']). ' đ</span></td></tr></tbody></table>';
        $map_template = array_merge($map_template, array(
            'order_id' => $aOrder['id'], // mã đơn hàng
            'order_id_merchant' => $aOrder['source_id'], // mã đơn hàng của merchant
            'order_revenue' => convertNumber($aOrder['revenue']) . ' đ',
            'order_ship_fee' => convertNumber($aOrder['ship_fee']) . ' đ',
            'order_total' => convertNumber($aOrder['total_price']) .' đ',
            'order_total_pay' => convertNumber($aOrder['total_pay']) .' đ',
            'order_payment_status' => getOrderStatus('pay_status', $aOrder['pay_status']),
            'order_status' => getOrderStatus('order_status', $aOrder['status']), // trạng thái đơn hàng
            'order_name' => $aOrder['contact_name'],
            'order_email' => $aOrder['contact_email'],
            'order_mobile' => $aOrder['contact_mobile'],
            'order_address' => $aOrder['address'],
            'order_aff_id' => $aOrder['aff_id'],
            'order_items' => $html_items,
        ));
    }

    // data thanh toán
    if(isset($data['payment_data'])){
        $map_template = array_merge($map_template, array(
            'payment_month'=> isset($data['payment_data']['payment_month']) ? $data['payment_data']['payment_month'] : 0, // tháng thanh toán
            'payment_year'=> isset($data['payment_data']['payment_year']) ? $data['payment_data']['payment_year'] : 0, // năm thanh toán
            'payment_money'=> isset($data['payment_data']['payment_money']) ? $data['payment_data']['payment_money'] : 0, // số tiền thanh toán
            'payment_recevive'=> isset($data['payment_data']['payment_recevive']) ? $data['payment_data']['payment_recevive'] : 0, // thực nhận
            'payment_shop_html'=> isset($data['payment_data']['payment_shop_html']) ? $data['payment_data']['payment_shop_html'] : 0, // danh sách chi tiết thanh toán cho từng shop
            'payment_user_html'=> isset($data['payment_data']['payment_user_html']) ? $data['payment_data']['payment_user_html'] : 0, // danh sách chi tiết thanh toán cho Aff và MGR
        ));
    }
    // data phiêu nạp
    if(isset($data['payment_charge'])){
        $map_template = array_merge($map_template, array(
            'payment_money'=> isset($data['payment_charge']['payment_money']) ? $data['payment_charge']['payment_money'] : 0, // số tiền thanh toán
            'payment_wallet_type'=> isset($data['payment_charge']['payment_wallet_type']) ? $data['payment_charge']['payment_wallet_type'] : 0, // ví
        ));
    }
    $email_template = $CI->emails_model->getEmailTemplate(array('code'=> $data['code']));
    $email_list = array();

    if($data['email']){
        // lấy tiêu đề, nội dung mail
        $subject_template = convertTemplateEmail($map_template, $email_template['subject']);
        $content_template = convertTemplateEmail($map_template, $email_template['content']);
        $email_list = array(
            'to'=> $data['email'],
            'subject'=> $subject_template,
            'content'=> $content_template,
        );
        return $email_list;
    }
}
function sendEmail($data){
    $CI = get_instance();
    // lấy dữ liệu email template
    $CI->load->model('emails_model');
    $mail_send = getEmailList($data);
    if($mail_send){
        // chèn vào email queue
        $CI->emails_model->insertEmailQueue(array('to'=> $mail_send['to'], 'cc'=> $data['cc'], 'subject'=> $mail_send['subject'], 'content'=> $mail_send['content'], 'source'=> $data['code'], 'reply_to'=> $data['reply_to']));
    }
}
function log_system($data = array()){
    $CI = get_instance();
    // lấy dữ liệu email template
    $CI->load->model('logs_model');
    $CI->logs_model->insertLog($data);
}
function response_ajax($array = array()){
    $CI = get_instance();
    $data_return = json_encode($array);
    $CI->output->set_content_type('application/json')->set_output($data_return)->_display();
    die;
}
function response_json($data_return = ''){
    $CI = get_instance();
//    $CI->output->set_content_type('application/json')
//        ->set_status_header($respon_data['response'])
//        ->set_output('{"msg":"'.$respon_data['msg'].'"}')->_display();
    if($data_return['response']){
        $response_code = $data_return['response'];
        $response_msg = '{';
        $response_msg .= '"msg":"'. $data_return['msg'] .'"';
        if(isset($data_return['order_code_merchant'])){
            $response_msg .= ',"order_code_merchant":"'. $data_return['order_code_merchant'] .'"';
        }
        if(isset($data_return['order_code_salemall'])){
            $response_msg .= ',"order_code_salemall":"'. $data_return['order_code_salemall'] .'"';
        }
        $response_msg .= '}';
    }
    else{
        $response_code = 404;
        $response_msg = '{"error":True"}';
    }
    $CI->output->set_status_header($response_code)->set_content_type('application/json')->set_output($response_msg)->_display();
    die;
}
function response_msg($array = array()){
    $CI = get_instance();
    $CI->session->set_flashdata('error_return',$array);
}
function mydebug($data = false, $user_id = 27){
    $CI = get_instance();
    if($CI->session->userdata('id') == $user_id){
        var_dump($data);
        die;
    }
}
function download_file($download = "")
{
    if ($download != "")
    {
        header('Content-Type: application/csv');
        header('Content-Disposition: attachement; filename="' . $download . '"');
    }
}
function array_to_csv($array)
{
    ob_start();
    $f = fopen('php://output', 'w') or show_error("Can't open php://output");
    $n = 0;
    foreach ($array as $line)
    {
        $n++;
        if ( ! fputcsv($f, $line,';'))
        {
            show_error("Can't write line $n: $line");
        }
    }
    fclose($f) or show_error("Can't close php://output");
    $str = ob_get_contents();
    ob_end_clean();

    return $str;
}
function checkBusship($district_id) {
    $busship_hn = explode(',', BUSSHIP_TRANSPORT_DISTRICT_HN);
    $busship_hcm = explode(',', BUSSHIP_TRANSPORT_DISTRICT_HCM);
    if (in_array($district_id, $busship_hn)) {
        return 'hn';
    }
    elseif (in_array($district_id, $busship_hcm)) {
        return 'hcm';
    }
    else{
        return 'none';
    }
}
function checkShopFeeShip($shop_id){
    $CI = get_instance();
    // lấy dữ liệu email template
    $CI->load->model('shops_model');
    $aShop = $CI->shops_model->getShopInfo(array('select'=> 's.free_ship', 'id'=> $shop_id));
    if($aShop['free_ship']){
        // miễn phí ship
        $shop_ship_icon = '';
    }
    else{
        // khách chịu ship
        $shop_ship_icon = '+';
    }
    return $shop_ship_icon;
}
function getPrepaidId($prepaid_id){
    if($prepaid_id > 0){
        return $prepaid_id;
    }
    else{
        return SYSTEM_WALLET;
    }
}
function getBalanceIcon($payment_deviation, $payment_required_pay, $order_total_pay){
    // kiểm tra cân
    $balance = '<i class="fa fa-close red" aria-hidden="true"></i>';
    if(($payment_deviation == 0) || ($payment_deviation == $payment_required_pay - $order_total_pay)){
        $balance = '<i class="fa fa-check green" aria-hidden="true"></i>';
    }
    return $balance;
}
function calPrepaid($actual_receve, $required_pay, $payment_fee, $payment_actual_fee, $pay_fee, $order_pay_type){
    $prepaid1 = $actual_receve - $required_pay;
    if($prepaid1 > 0){
        $return1 = $prepaid1;
    }
    else{
        $return1 = 0;
    }
    $prepaid2 = $payment_actual_fee - $payment_fee;
    if($payment_fee > 0 && $prepaid2 > 0){
        $return2 = $prepaid2;
    }
    else{
        $return2 = 0;
    }
    // nếu thực nhận qua inetpay nhiều hơn số phải thu
    $return3 = 0;
    if($order_pay_type == PAY_TYPE_ONLINE){
        $online_receive = $actual_receve + $pay_fee;
        if($online_receive > $required_pay){
            $return3 = $online_receive - $required_pay;
        }
    }

    return $return1 + $return2 + $return3;
}
function calDeviationPayment($payment_revenue, $order_revenue, $payment_required_pay, $order_total_pay, $actual_receve, $order_status){
    // tính lệch
    if(($payment_revenue - $order_revenue == 0) || ($payment_revenue - $order_revenue == $payment_required_pay - $order_total_pay) || ($actual_receve == 0 && $order_status == STATUS_REFUNDED)){
        $deviation_value = 0;
    }
    else{
        $deviation_value = $payment_revenue - $order_revenue;
    }
    return $deviation_value;
}
function calOrderRevenue($total_pay, $ship_fee, $pay_fee){
    $revenue = $total_pay - $ship_fee - $pay_fee;
    return $revenue;
}
function calPaymentRevenue($actual_receive, $payment_fee, $prepaid){
    $payment_revenue = $actual_receive - $payment_fee - $prepaid;
    return $payment_revenue;
}
function calPaymentActualFee($ship_fee, $pay_fee, $order_pay_type){
    if($order_pay_type == PAY_TYPE_ONLINE || $order_pay_type == PAY_TYPE_BANK)
    {
        $pchi = 0;
    }
    else{
        $pchi = $pay_fee;
    }
    $payment_actual_fee = $ship_fee + $pchi;
    return $payment_actual_fee;
}
function base64ToImage($image_old, $base64_string, $folder, $output_file, $crop_type = IMAGE_UPLOAD_TYPE, $width = IMAGE_UPLOAD_WIDTH, $height = IMAGE_UPLOAD_HEIGHT, $convert_thumb = true) {
    $file = fopen($folder . $output_file, "wb");
    fwrite($file, $base64_string);
    fclose($file);
	if($image_old){
		unlink($folder . $image_old);
	}
}
function create_thumb($file_name, $width, $height, $folder, $zoom_crop = 1, $output_file)
{
    $new_width = $width;
    $new_height = $height;

    if ($new_width && !$new_height) {
        $new_height = floor($height * ($new_width / $width));
    } else
        if ($new_height && !$new_width) {
            $new_width = floor($width * ($new_height / $height));
        }
    $image_url = URL_SERVER . $folder . $output_file;
    $origin_x = 0;
    $origin_y = 0;
    $array = getimagesize($image_url);
    if ($array) {
        list($image_w, $image_h) = $array;
    }
//    else {
//        die("NO IMAGE $image_url");
//    }
    $width = $image_w;
    $height = $image_h;

    // ACQUIRE THE ORIGINAL IMAGE
    $file_name_ext = explode('.', $file_name);
    $image_ext = trim(strtolower(end($file_name_ext)));
    switch (strtoupper($image_ext)) {
        case 'JPG':
        case 'JPEG':
            $image = imagecreatefromjpeg($image_url);
            $func = 'imagejpeg';
            break;
        case 'PNG':
            $image = imagecreatefrompng($image_url);
            $func = 'imagepng';
            break;
        case 'GIF':
            $image = imagecreatefromgif($image_url);
            $func = 'imagegif';
            break;

        default:
            $image = imagecreatefromgif($image_url);
            $func = 'imagegif';
    }

    // scale down and add borders
    if ($zoom_crop == 3) {
        $final_height = $height * ($new_width / $width);
        if ($final_height > $new_height) {
            $new_width = $width * ($new_height / $height);
        } else {
            $new_height = $final_height;
        }
    }

    // create a new true color image
    $canvas = imagecreatetruecolor($new_width, $new_height);
    imagealphablending($canvas, false);

    // Create a new transparent color for image
    $color = imagecolorallocatealpha($canvas, 255, 255, 255, 127);

    // Completely fill the background of the new image with allocated color.
    imagefill($canvas, 0, 0, $color);

    // scale down and add borders
    if ($zoom_crop == 2) {

        $final_height = $height * ($new_width / $width);

        if ($final_height > $new_height) {

            $origin_x = $new_width / 2;
            $new_width = $width * ($new_height / $height);
            $origin_x = round($origin_x - ($new_width / 2));

        } else {

            $origin_y = $new_height / 2;
            $new_height = $final_height;
            $origin_y = round($origin_y - ($new_height / 2));

        }
    }
    imagesavealpha($canvas, true);

    if ($zoom_crop > 0) {

        $src_x = $src_y = 0;
        $src_w = $width;
        $src_h = $height;

        $cmp_x = $width / $new_width;
        $cmp_y = $height / $new_height;

        // calculate x or y coordinate and width or height of source
        if ($cmp_x > $cmp_y) {

            $src_w = round($width / $cmp_x * $cmp_y);
            $src_x = round(($width - ($width / $cmp_x * $cmp_y)) / 2);

        } else
            if ($cmp_y > $cmp_x) {

                $src_h = round($height / $cmp_y * $cmp_x);
                $src_y = round(($height - ($height / $cmp_y * $cmp_x)) / 2);

            }

        imagecopyresampled($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width,
            $new_height, $src_w, $src_h);

    } else {
        imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width,
            $height);

    }
    // $new_file = $file_name . '_' . $new_width . 'x' . $new_height . '.' . $image_ext;
    $new_file = $output_file . '_thumb';
    // SHOW THE NEW THUMB IMAGE
    if ($func == 'imagejpeg')
        $func($canvas, $folder . $new_file, 100);
    else
        $func($canvas, $folder . $new_file, floor(0.09));
    return $new_file;
}
function removeImageCache($path, $time = 86400){
    $CI = get_instance();
    $CI->load->helper('file');
    $CI->load->helper('directory');
    $path = './'.$path;
    if ($handle = directory_map($path)) {
        foreach($handle as $file) {
            if ((time()-filectime($path.$file)) >= $time) {
                unlink($path.$file);
            }
        }
    }
}
function encrypAES($data, $key = API_KEY){
    $CI = get_instance();
    $CI->load->library('aes_encryption', array(
        'key'=> $key
    ));
    return $CI->aes_encryption->encrypt($data);
}
function decrypAES($data, $key = API_KEY){
    $CI = get_instance();
    $CI->load->library('aes_encryption', array(
        'key'=> $key
    ));
    return $CI->aes_encryption->decrypt($data);
}
function paramToArray($get_string){
    parse_str($get_string, $get_array);
    return $get_array;
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function writeLog($file_name, $data, $file_patch_dir = ''){
    $CI = get_instance();
    $CI->load->helper('file');
    if($file_patch_dir !=''){
        $file_patch = rtrim($CI->config->item('log_path') . date('d-m-Y') .'/'. $file_patch_dir, '/\\') .DIRECTORY_SEPARATOR;
    }
    else{
        $file_patch = rtrim($CI->config->item('log_path') . date('d-m-Y'), '/\\') .DIRECTORY_SEPARATOR;
    }
    file_exists($file_patch) OR mkdir($file_patch, 0755, TRUE);
    $filepath = $file_patch . $file_name .'-'.date('d-m-Y h:i:s u A').'.php';
    write_file($filepath, $data);
}
if (!function_exists('getallheaders'))
{
    function getallheaders()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value)
        {
            if (substr($name, 0, 5) == 'HTTP_')
            {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}
function mapShipChungStatus($ship_chung_status)
{
    if($ship_chung_status == 12){
        $ship_status = SHIP_STATUS_PENDING;
    }
    elseif($ship_chung_status == 13){
        $ship_status = SHIP_STATUS_APPROVED;
    }
    elseif($ship_chung_status == 14){
        $ship_status = SHIP_STATUS_PICKING;
    }
    elseif($ship_chung_status == 15){
        $ship_status = SHIP_STATUS_PICK_FAILED;
    }
    elseif($ship_chung_status == 16){
        $ship_status = SHIP_STATUS_PICKED;
    }
    elseif($ship_chung_status == 17){
        $ship_status = SHIP_STATUS_DELIVERING;
    }
    elseif($ship_chung_status == 18){
        $ship_status = SHIP_STATUS_DELIVER_FAILED;
    }
    elseif($ship_chung_status == 19){
        $ship_status = SHIP_STATUS_DELIVERED;
    }
    elseif($ship_chung_status == 20){
        $ship_status = SHIP_STATUS_RETURN_WAITING;
    }
    elseif($ship_chung_status == 21){
        $ship_status = SHIP_STATUS_RETURNED;
    }
    elseif($ship_chung_status == 22){
        $ship_status = SHIP_STATUS_CANCELLED;
    }
    return $ship_status;
}
function getRound($value, $total, $limit_comma = 2)
{
    if($total != 0){
        $data_value = $value/$total;
        return round(($data_value)*100,$limit_comma);
    }
    else{
        return 0;
    }
}
function exportCSV($name, $csv)
{
    $csv = chr(255) . chr(254) . mb_convert_encoding($csv, "UTF-16LE", "UTF-8");
    header("Content-type: application/x-msdownload");
    header("Content-disposition: csv; filename=" . $name .".xls; size=" . strlen($csv));
    echo $csv;
    exit;
}

function changeTitle($str)
{
    $str = stripUnicodes($str);
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
    $str = trim($str);
    $str=preg_replace('/[^a-zA-Z0-9@.\ ]/','',$str);
    $str = str_replace("  "," ",$str);
    $str = str_replace(" ","-",$str);
    return $str;
}
function stripUnicodes($str){
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
function current_full_url()
{
    $CI =& get_instance();
    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}
function getShopId()
{
	$CI =& get_instance();
    if($CI->session->userdata('shop_id')){
		$shop_id = $CI->session->userdata('shop_id');
	}
	else{
		$shop_id = SHOP_SYSTEM;
	}
	return $shop_id;
}