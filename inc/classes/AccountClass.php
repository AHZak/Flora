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

    //AUTH
    public function checkAuth(){
        if($this->checkUserLogedIn()==false){
            //do logout & redirect to login page
            $this->logout();
            redirectTo("enterphn.php");
        }
    }


    public function create($phone,$firstName,$lastName,$code,&$messages=""){
        //MESSAGES HANDLER
        $messages=new Message();

        $data=[
            'is_varified'=>"done",
            'FName'=>$firstName,
            'LName'=>$lastName,
        ];

        //SEQURITY OPTION
        $data=validArrayInputs($data);

        //do create tmp account
        $account=Db::update(USER_TABLE_NAME,$data,"phone='$phone'");
        if($account){
            $messages->setSuccessMessage(SUCCESS_CREATE_ACCOUNT);

            //do login
            $this->login($phone,$code);
        }
        
        $messages->setErrorMessage(ERR_CREATE_ACCOUNT);
        return false;
    }

    //create a init account
    public function createInitialaizeAccount($phoneNumber,$registercode){
        //phone number validation & create a init account
        if($this->validPhoneNumber($phoneNumber)){
            //do create
            $result=Db::insert(USER_TABLE_NAME,['phone'=>$phoneNumber,'register_code'=>$registercode,'is_varified'=>'none']);
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

    //LOGIN
    public function login($phone,$code,$redirect='editprofile.php'){
        //valid phone
        $this->logout();
        //get account
        $account=Db::select(USER_TABLE_NAME,"phone='$phone'","single");
        if($account){
            if($account['register_code']!='expired'){
                
                if($account['register_code']==$code){
                    $_SESSION['login']=true;
                    $_SESSION['FName']=$account['FName'];
                    $_SESSION['LName']=$account['LName'];
                    $_SESSION['userId']=$account['id'];
                    $_SESSION['password']=$account['password'];
                    $_SESSION['phone']=$account['phone'];
                    
                    //destroy register code
                    Db::update(USER_TABLE_NAME,['register_code'=>"expired"],"phone='$phone'");
                    //redirect to dashboard
                    redirectTo("userprofile.php");
                }else{
                    echo 'کد وارد شده اشتباه است';
                }
            }else{
                redirectTo($redirect);
            }
        }else{
            //err message
        }
    }

    //ADMIN LOGIN
    public function adminLogin($phone,$password,$redirect="admin.php"){
        //valid phone

        $this->logout();
    
        //get account
        $account=Db::select(ADMIN_TABLE_NAME,"phone='$phone'","single");
        if($account){
                if($account['password']==$password){
                    $_SESSION['admin_login']=true;
                    $_SESSION['login']=true;
                    $_SESSION['FName']=$account['FName'];
                    $_SESSION['password']=$account['password'];
                    $_SESSION['LName']=$account['LName'];
                    $_SESSION['userId']=$account['id'];
                    $_SESSION['phone']=$account['phone'];
                    $_SESSION['permission']=$account['permission'];
                    
                    //redirect to dashboard
                    redirectTo($redirect);
                }else{
                    echo 'نام کاربری یا رمز عبور اشتباه است';
                }
            
        }else{
            //err message
        }
    }
    //check user loged in
    public function checkUserLogedIn(){
        if(isset($_SESSION['login']) && $_SESSION['login']==true){
            return true;
        }else{
            return false;
        }
    }

    //LOGOUT
    public function logout(){
        $_SESSION['login']=false;
        unset($_SESSION['userId'],$_SESSION['FName'],$_SESSION['LName'],$_SESSION['phone'],$_SESSION['password']);
        if(isset($_SESSION['permission'])){
            unset($_SESSION['permission']);
        }
        if(isset($_SESSION['admin_login'])){
            unset($_SESSION['admin_login']);
        }
    }

    //UPDATE LOGIN DATA
    public function updateAdminLoginData($redirect='admin.php'){
        $this->adminLogin($_SESSION['phone'],$_SESSION['password'],$redirect);
    }

    public function updateUserLoginData($redirect='editprofile.php'){
        $this->login($_SESSION['phone'],$_SESSION['password'],$redirect);
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
    private function validRegistercode($registercode){
        //code
    }
}