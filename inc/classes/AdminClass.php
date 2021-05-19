<?php
use Database\Db;

//ADMIN CLASS
class Admin{

    public static function create(array $params,&$messages){
        $messages=new Message();
        $email=isset($params['email']) ? $params['email'] : "";

        //check email
        if(Db::checkExists(ADMIN_TABLE_NAME,"email='$email'")){
            $messages->setErrorMessage(ERR_EMAIL_EXISTS);
            return false;
        }

        //check phone
        $phone=$params['phone'];
        if(Db::checkExists(ADMIN_TABLE_NAME,"phone='$phone'")){
            $messages->setErrorMessage(ERR_PHONE_EXISTS);
            return false;
        }

        if(strlen($phone)>PHONE_NUMBER_LEN){
            $messages->setErrorMessage(ERR_PHONE_NUMBER_LEN);
            return false;
        }

        //do create admin
        $result=Db::insert(ADMIN_TABLE_NAME,$params);
        if($result){
            $messages->setSuccessMessage(SUCCESS_CREATE_ADMIN);
            return $result;
        }
        $messages->setErrorMessage(ERR_CREATE_ADMIN);
        return false;
    }

    
}