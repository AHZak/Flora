<?php

//ORDER CLASS
use Database\Db;

class Order{
    public static function create(array $params,&$message){
        $message=new Message();
        $result=Db::insert(ORDERS_TABLE_NAME,$params);
        if($result){
            return $result;
        }else{
            //$message->setErrorMessage(ERR_ORDER_CREATE);
            return false;
        }
    }
}