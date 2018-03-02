<?php

session_start();



if (function_exists('memprof_enable')) {
    memprof_enable();
}



ini_set('display_errors', 1);



//echo md5("2-Prakruti-Mumbai");
//echo "<br/>";
// echo md5("8-Maple Traders-Mumbai");

//die;
// syslog(LOG_INFO, 'This is test error message');

// $orders = '[{"orderId":"200007525","sku":"DE1223596-S-PM20706","qty":1,"dispatchDate":"2017-11-17 12:39:49","awbNumber":"1913493","invoiceNumber":"200007525_1626799","invoiceDate":"2017-11-17 19:09:35","email":0,"courier":"Pepperfry","manifest_id":132937,"product_id":1223596}]';

// echo md5("avadhesh.m".$orders."trendsutrabridgeoft");

// echo '<br/>';


// $parm = [
// 		"userName" => "avadhesh.m",
//     	"orders" => $orders,
//     	"apiKey" => "769f96a5f83a9d556b7b257cedd8c5de"
//     ];

// echo urlencode(json_encode($parm));





 //$coupon_code = 'WEDDING';
 //$salt = 'trendsutrajavacouponcacherefresh';
 //$apiKey = md5($coupon_code.$salt);
 //$data = array('coupon_code'=>$coupon_code,'apiKey'=>$apiKey); 

 //$dataTosend = urlencode(json_encode($data));
 //pr($dataTosend);


if (function_exists('memprof_enable')) {
    memprof_dump_callgrind(fopen("/var/www/memory/callgrind.out", "w"));
}

function pr($data) 
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}


function prx($data) 
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die;
}

//_getProductsDetailsByLMS('vip');

function _getProductsDetailsByLMS($type = 'vip') 
{
    if ($type == 'vip') {
        $arrayToSentRequest = array(
        "requestType" => "getVipData",
        "data" => array(
        "product_id" => 1205001
        ),
        "fields" => array("combo_ids","commission_data"),
        //"fields" => null,
        "fetch_from_db" => "",
        "requestPlatform" => "web"

        );
    } else {
        $arrayToSentRequest = array(
        "requestType" => "getClipData",
        "data" => array(
        "product_ids" => array(
         1205001,
         1205002
        )
        ),
        "fields" => null,
        "fetch_from_db" => "",
        "requestPlatform" => "web"

        );
    }
    $string = json_encode($arrayToSentRequest);
    prx(strlen($string).$string);
    
}


function _sendRequest()
{
    $ch = curl_init();
    $order = 'TAB10000126';
    // $hash = strtolower(hash('sha512', 'ZjimjG|verify_payment|303269225|Dr6i4HgR')); // live
    // $_gateway_url_resjsn = 'https://info.payu.in/merchant/postservice.php?form=2'; // live

    // $hash = strtolower(hash('sha512', 'nArmW9|verify_payment|200002844|Birq6OUk')); // warp
    $hash = strtolower(hash('sha512', 'gtKFFx|verify_payment|'.$order.'|eCwWELxi')); // warp gift card
        
    $_gateway_url_resjsn = 'https://test.payu.in/merchant/postservice.php?form=2'; // warp

    curl_setopt($ch, CURLOPT_URL, $_gateway_url_resjsn);
    curl_setopt($ch, CURLOPT_POST, 1);

    // curl_setopt($ch, CURLOPT_POSTFIELDS, "key=ZjimjG&command=verify_payment&var1=303269225&hash=" . $hash); // live
        
    // curl_setopt($ch, CURLOPT_POSTFIELDS, "key=nArmW9&command=verify_payment&var1=200002844&hash=" . $hash); // warp

    curl_setopt($ch, CURLOPT_POSTFIELDS, "key=gtKFFx&command=verify_payment&var1=".$order."&hash=" . $hash); // warp gift 

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);
        
    return $server_output;        
}

//prx(_sendRequest());


?>
<html>
<head>
    
</head>



<form action="" method="post">
GMT : <input name="inputtime" value="<?php echo !empty($_POST['inputtime']) ? $_POST['inputtime'] : ""?>">
<?php
if (!empty($_POST['inputtime'])) {
    echo date("Y-m-d H:i:s D", strtotime($_POST['inputtime']) + 19800);
}
?>
<br/><br/>
IST : <input name="inputtimeist"  value="<?php echo !empty($_POST['inputtimeist']) ? $_POST['inputtimeist'] : ""?>">
<?php
if (!empty($_POST['inputtimeist'])) {
    echo date("Y-m-d H:i:s D", strtotime($_POST['inputtimeist']) - 19800);
}
?>
<input type="submit" name="submit" value="Submit">
</form>

</html>