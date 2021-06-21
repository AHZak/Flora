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
        $messages=$this->getMessageHandler();

        //checkdata
        $result[]=$this->validFirstName($firstName);
        $result[]=$this->validLastName($lastName);


        if(in_array(false,$result)){
            return false;
        }
        

        $data=[
            'is_varified'=>"done",
            'FName'=>$firstName,
            'LName'=>$lastName,
        ];

        //SEQURITY OPTION
        $data=validArrayInputs($data);

        //varify account
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
    public function createInitialaizeAccount($phoneNumber,$registercode,&$messageObject=""){
        //phone number validation & create a init account
        if($this->validPhoneNumber($phoneNumber)){
            //do create tmp account
            $result=Db::insert(USER_TABLE_NAME,['phone'=>$phoneNumber,'register_code'=>$registercode,'is_varified'=>'none']);

            if($result){
                $this->getMessageHandler()->setSuccessMessage(SUCCES_CREATE_INIT_ACCOUNT);
                //set message object
                $messageObject=$this->getMessageHandler();
                return true;
            }

            $this->getMessageHandler()->setErrorMessage(ERR_CREATE_INIT_ACCOUNT);
            //set message object
            $messageObject=$this->getMessageHandler();
            return false;
        }else{
            //set message object
            $messageObject=$this->getMessageHandler();
            return false;
        }

        
    }

    //LOGIN
    public function login($phone,$code,$redirect='editprofile.php'){
        //before login, do logout to prepare for login
        $this->logout();

        //get account
        $account=Db::select(USER_TABLE_NAME,"phone='$phone'","single");

        if($account){
            //check live code
            if($account['register_code']!='expired'){
                //check code 
                if($account['register_code']==$code){
                    //set sessions to login
                    $_SESSION['login']=true;
                    $_SESSION['FName']=$account['FName'];
                    $_SESSION['LName']=$account['LName'];
                    $_SESSION['userId']=$account['id'];
                    $_SESSION['password']=$account['password'];
                    $_SESSION['phone']=$account['phone'];
                    
                    //destroy register code after login
                    Db::update(USER_TABLE_NAME,['register_code'=>"expired"],"phone='$phone'");

                    //redirect to index page
                    redirectTo("index.php");
                }else{
                    $_SESSION['phone']=$phone;
                    $this->getMessageHandler()->setErrorMessage(ERR_REGISTER_CODE_INCORRECT);
                }
            }else{
                $_SESSION['phone']=$phone;
                $_SESSION['errorMessage']=ERR_REGISTER_CODE_INCORRECT;
                
                redirectTo($redirect);
            }
        }else{
            //err message
            $_SESSION['errorMessage']="اکانت شما ساخته نشد";
                
            redirectTo($redirect);
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
                    $this->getMessageHandler()->setErrorMessage(ERR_ADMIN_LOGIN);
                    return false;
                }
            
        }else{
            //err message
            $this->getMessageHandler()->setErrorMessage(ERR_ADMIN_LOGIN);
            return false;
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
    //VALID FIRSTNAME & LASTNAME
    public function validFirstName($name){
        $error=false;
        if(empty($name)){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_EMPTY_FIRST_NAME);
        }elseif(strlen($name)<3 || strlen($name)>20){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_FIRST_NAME_LEN);
        }

        if($error==true){
            return false;
        }else{
            return true;
        }
    }

    public function validLastName($name){
        $error=false;
        if(empty($name)){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_EMPTY_LAST_NAME);
        }
        elseif(strlen($name)<3 || strlen($name)>20){
            $error=true;
            $this->getMessageHandler()->setErrorMessage(ERR_LAST_NAME_LEN);
        }

        if($error==true){
            return false;
        }else{
            return true;
        }
    }

    //VALID PHONE NUMBER
    private function validPhoneNumber($phoneNumber){
        $error=false;

        //check phone number is fill
        if(empty($phoneNumber)){
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_EMPTY);
            $error=true;
        }

        //check phone number is numeric
        $test=preg_match("/(^[0-9]{11}$)/",$phoneNumber);
        if(!$test){
            $this->getMessageHandler()->setErrorMessage(ERR_PHONE_NUMBER_FORMAT);
            $error=true;
        }

        //check phone number length
        if(strlen($phoneNumber)!=PHONE_NUMBER_LEN){
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

}