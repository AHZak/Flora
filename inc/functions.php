<?php

//good print
function show($input){
    echo '<pre>';
    var_dump($input);
    echo '</pre>';
}

//SECURITY ARRAY INPUT OPTION
function validArrayInputs(array $inputs){
    foreach($inputs as $key=>$value){
        $inputs[$key]=htmlspecialchars($value);
    }

    if($inputs){
        return $inputs;
    }else{
        return false;
    }
}

function addToLog($message,$logFileName="web.log"){
    file_put_contents($logFileName,$message,FILE_APPEND);
}

//uploader
function uploadImage(array $image,&$message=""){
    $imageName=isset($image['name']) ? $image['name'] : null;
    $imageType=isset($image['type']) ? $image['type'] : null;
    $imageTmpName=isset($image['tmp_name']) ? $image['tmp_name'] : null;
  
    if(!in_array($imageType,ACCESS_IMAGES_MIME_TYPE)){
        $message=ERR_UNSUPPORT_IMAGE_FORMAT;
        return false;
    }
    //upload path
    $newFileName=public_html().PROJECT_NAME."/".UPLOAD_PATH.$imageName;
    $result=move_uploaded_file($imageTmpName,$newFileName);
    if($result){
        return $newFileName;
    }else{
        $message=ERR_FAILED_UPLOAD;
        return false;
    }
}

//SORT ARRAY
function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

//ACTIVE CLASS
function active($fileName){
    if(basename($_SERVER['PHP_SELF'])==$fileName){
        echo "active";
    }
}

//REDIRECT
function redirectTo($fileName){
    header("Location:$fileName");
    die();
}

//TREZ.IR API
function sendMessageTrez($Phone,$message){
    $url="https://SmsPanel.Trez.ir/SendMessageWithPost.ashx";
    $params=['UserName'=>USERNAME_TREZ,'Password'=>PASSWORD_TREZ,'PhoneNumber'=>FROM_PHONE_TREZ,'MessageBody'=>$message,'Recnumber'=>$Phone,'Smsclass'=>1];
    return json_decode(Server::sendRequest($url,$params,'post'),true);
}

//example sms
function send_example_sms(){
    
}

//check user logged in
function checkUserLogedIn(){
    if($_SESSION['login']==true){
        return true;
    }else{
        return false;
    }
}

//check admin logged in
function checkAdminLoggedIn(){
    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']==true){
        return true;
    }else{
        return false;
    }
}

//IS MASTER
function isMaster(){
    if(!checkAdminLoggedIn()){
        //redirect to admin login page
        $account=new Account();
        $account->logout();
        redirectTo(public_html().PROJECT_NAME."/admin/adminlogin.php");
    }
    if(isset($_SESSION['permission']) && $_SESSION['permission']=='master'){
        return true;
    }
    return false;
}

//IS ADMIN
function isAdmin(){
    if(!checkAdminLoggedIn()){
        //redirect to admin login page
        $account=new Account();
        $account->logout();
        redirectTo(public_html().PROJECT_NAME."/admin/adminlogin.php");
    }
    if(isset($_SESSION['permission']) && $_SESSION['permission']=='admin'){
        return true;
    }
    return false;
}

//CONVERT TIME STAMP
function convertTimeStamp($timestamp){
    $timestamp = strtotime($timestamp);
    $date = date('d-m-Y', $timestamp);
    $time = date('Gi.s', $timestamp);
    return ['date'=>$date,'time'=>$time];
}

//convert timestamp to jalali
function timestampToJalaliDate($timestamp){
    $current_gdate = $timestamp;
    $arr_parts = explode('-', $current_gdate);
    $gYear  = $arr_parts[2];
    $gMonth = $arr_parts[1];
    $gDay   = $arr_parts[0];
 
    return gregorian_to_jalali($gYear, $gMonth, $gDay, '/');
}


//get products id from cart
function getProductsIdFromCart(){
    if(isset($_SESSION['cart']['products']) && $_SESSION['cart']['products']){
        foreach($_SESSION['cart']['products'] as $key=>$value){
            $productsId[]['id']=$value;
        }
        return $productsId;
    }else{
        return false;
    }
}
