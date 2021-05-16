<?php
//ACCOUNT CLASS
use Database\Db;

class Account{

    private $messages;

    public function __construct()
    {
        $this->setMessageHandler();
    }

    //SET VARIABELS
    private function setMessageHandler(){
        $this->messages=new Message();
    }

    //GET VARIABLES
    public function getMessageHandler(){
        return $this->messages;
    }



    public static function create($userId,$firstName,$lastName,&$messages=""){
        //MESSAGES HANDLER
        $messages=new Message();

        $data=[
            'FName'=>$firstName,
            'LName'=>$lastName,
        ];

        //SEQURITY OPTION
        $data=validArrayInputs($data);

        //do create tmp account
        $account=Db::update(USER_TABLE_NAME,$data,"id='$userId'");
        if($account){
            $messages->setSuccessMessage(SUCCESS_CREATE_ACCOUNT);
            return $account;
        }
        
        $messages->setErrorMessage(ERR_CREATE_ACCOUNT);
        return false;
    }

    //create a init account
    public function createInitialaizeAccount($phoneNumber){
        //phone number validation & create a init account
        if($this->validPhoneNumber($phoneNumber)){
            //do create
            $result=Db::insert(USER_TABLE_NAME,['phone'=>$phoneNumber]);
            if($result){
                $this->getMessageHandler()->setSuccessMessage(SUCCES_CREATE_INIT_ACCOUNT);
                return true;
            }
            $this->getMessageHandler()->setErrorMessage(ERR_CREATE_INIT_ACCOUNT);
            return false;
        }else{
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_LEN);
            return false;
        }
    }


    //VALID FIRSTNAME

    //VALID LASTNAME

    //VALID PHONE NUMBER
    private function validPhoneNumber($phoneNumber){
        $error=false;

        //check phone number is fill
        if(empty($phoneNumber)){
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_EMPTY);
            $error=true;
        }

        //check phone number is numeric
        if(!preg_match("/[0-9]/",$phoneNumber)){
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_FORMAT);
            $error=true;
        }

        //check phone number length
        if(strlen($phoneNumber)>PHONE_NUMBER_LEN){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_LEN);
        }

        //check phone number already exists in system
        if(Db::checkExists(USER_TABLE_NAME,"phone='$phoneNumber'")){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_ALREADY_EXISTS);
        }

        if($error==true){
            return false;
        }
        return true;
    }

    //VALID PASSWORD

    //VALID REGISTER CODE
}