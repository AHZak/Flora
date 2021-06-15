<?php
use Database\Db;

//ADMIN CLASS
class Admin{
    private $id;
    private $phone;
    private $email;
    private $firstName;
    private $lastName;
    private $permission;

    public function __construct($adminId)
    {
        $admin=$this->getAdminfullInfo($adminId);
        if($admin){
            $this->setId($admin['id']);
            $this->setFirstName($admin['FName']);
            $this->setlastName($admin['LName']);
            $this->setEmail($admin['email']);
            $this->setPhone($admin['phone']);
            $this->setPermission($admin['permission']);
        }else{
            return false;
        }   
    }

    //SETERS
    public function setId($id){
        $this->id=$id;
    }

    public function setPhone($phone){
        $this->phone=$phone;
    }

    public function setFirstName($name){
        $this->firstName=$name;
    }

    public function setlastName($lastName){
        $this->lastName=$lastName;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setPermission($permission){
        $this->permission=$permission;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getPermission(){
        return $this->permission;
    }


    //GET ADMIN FULL INFO
    private function getAdminfullInfo($id){
        return Db::select(ADMIN_TABLE_NAME,"id='$id'","single");
    }

    public static function create(array $params,&$messages){
        $messages=new Message();
        $email=isset($params['email']) ? $params['email'] : "";

        //check first name & last name
        if(empty($params['FName'])){
            $messages->setErrorMessage(ERR_EMPTY_FIRST_NAME);
            return false;
        }

        if(empty($params['LName'])){
            $messages->setErrorMessage(ERR_EMPTY_LAST_NAME);
            return false;
        }

        //check email
        if(empty($params['email'])){
            $messages->setErrorMessage(ERR_EMAIL_EMPTY);
            return false;
        }elseif(Db::checkExists(ADMIN_TABLE_NAME,"email='$email'")){
            $messages->setErrorMessage(ERR_EMAIL_EXISTS);
            return false;
        }


        //check phone
        $phone=$params['phone'];
        if(Db::checkExists(ADMIN_TABLE_NAME,"phone='$phone'")){
            $messages->setErrorMessage(ERR_PHONE_EXISTS);
            return false;
        }

        if(strlen($phone)!=PHONE_NUMBER_LEN){
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

    //GET ADMINS
    public static function getAdmins($conditions="1"){
        return Db::select(ADMIN_TABLE_NAME,$conditions);
    }

    //UPDATE
    public function update(array $params){
        return Db::update(ADMIN_TABLE_NAME,$params,"id='$this->id'");
    }

    
}