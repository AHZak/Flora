<?php 
//send request to pay

include '../config.php';

function initRequest($amount,$phone){
    $url="https://api.zarinpal.com/pg/v4/payment/request.json";
    $method="post";
    $merchant_id="1344b5d4-0048-11e8-94db-005056a205be";
    $description="test";
    $callback_url="http://localhost/flora/zarin/payland.php";
    $params=['merchant_id'=>$merchant_id,'amount'=>$amount,'description'=>$description,'callback_url'=>$callback_url,'metadata'=>['mobile'=>$phone]];
    return Server::sendRequest($url,$params,'post');
}

function redirectToPayPage($authority){
    if($authority){
        header("Location: https://www.zarinpal.com/pg/StartPay/$authority");
        die();
    }
}

$result=json_decode(initRequest(2000,"09215919027"));
if($result->data->code==100){
    redirectToPayPage($result->data->authority);
}