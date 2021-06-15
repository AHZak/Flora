<?php
include '../config.php';
if(isset($_GET['Status'])){
    if(strtolower($_GET['Status'])=='ok'){
        $url="https://api.zarinpal.com/pg/v4/payment/verify.json";
        $merchant_id="1344b5d4-0048-11e8-94db-005056a205be";
        $method="post";
        $amount=2000;
        $authority=$_GET['Authority'];
        $prams=['merchant_id'=>$merchant_id,'amount'=>$amount,'authority'=>$authority];
        $result=Server::sendRequest($url,$prams,$method);
        $result=json_decode($result);
        $code=$result->data->code;
        $ref_id=$result->data->ref_id;
        $card_pan=$result->data->card_pan;
        $fee=$result->data->fee;
    }
}