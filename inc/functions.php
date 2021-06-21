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

//SHOW ERRORS MESSAGE
function showErrorMessage($errorMessage,$messageObject):void{
    if($messageObject){
        $checkError=$messageObject->showError($errorMessage);
        if($checkError){
            echo 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <small>'.$checkError.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
            </div>';
    
        }
    }

}

//SHOW SUCCESS MESSAGE
function showSuccessMessage($successMessage,$messageObject):void{
    if($messageObject){
        $checkSuccess=$messageObject->showSuccess($successMessage);
        if($checkSuccess){
            echo 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <small>'.$checkSuccess.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
            </div>';
    
        }
    }
}


function addToLog($message,$logFileName="web.log"){
    file_put_contents($logFileName,$message,FILE_APPEND);
}

//uploader
function uploadImage(array $image,&$message="",$path=""){
    $imageName=isset($image['name']) ? $image['name'] : null;
    $imageType=isset($image['type']) ? $image['type'] : null;
    $imageTmpName=isset($image['tmp_name']) ? $image['tmp_name'] : null;
  
    if(!in_array($imageType,ACCESS_IMAGES_MIME_TYPE)){
        $message=ERR_UNSUPPORT_IMAGE_FORMAT;
        return false;
    }
    //upload path
    if($path==""){
        $newFileName=public_html().PROJECT_NAME."/".UPLOAD_PATH.rand(100,9999).$imageName;
    }else{
        $newFileName=public_html().PROJECT_NAME."/".$path.rand(100,9999).$imageName;
    }
   
    $result=move_uploaded_file($imageTmpName,$newFileName);
    if($result){
        return $newFileName;
    }else{
        $message=ERR_FAILED_UPLOAD;
        return false;
    }
}

//uploader
function uploadFile(array $file,&$message="",$path="",$newfilename=""){
    $fileName=isset($file['name']) ? $file['name'] : null;
    $fileType=isset($file['type']) ? $file['type'] : null;
    $fileTmpName=isset($file['tmp_name']) ? $file['tmp_name'] : null;

    //upload path
    if($path==""){
        if($newfilename!=""){
            $newFileName=public_html().PROJECT_NAME."/".$path.$newfilename;
        }else{
            $newFileName=public_html().PROJECT_NAME."/".UPLOAD_PATH.rand(100,9999).$fileName;
        }
        
    }else{
        if($newfilename!=""){
            $newFileName=public_html().PROJECT_NAME."/".$path.$newfilename;
        }else{
            $newFileName=public_html().PROJECT_NAME."/".$path.rand(100,9999).$imageName;
        }
       
    }
   
    $result=move_uploaded_file($fileTmpName,$newFileName);
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

//GET SHIPPING STATUS
function getShippingStatus($id){
    if($id==1){
        return "فوری";
    }else{
        return "عادی";
    }
}

//GET ORDER STATUS
function getOrderStatus($status){
    if($status=='doing'){
        return "در حال انجام";
    }elseif($status=='done'){
        return 'انجام شده';
    }elseif($status=='canceled'){
        return 'لغو شده';
    }
}

function setWarningForFastOrder($shippingId){
    if($shippingId==1){
        echo  'bg-warning';
    }
}

function setWarningForOrderBtn($shippingId){
    if($shippingId==2){
        echo  'bg-warning';
    }elseif($shippingId==1){
        echo  'btn-outline-light';
    }
}


//GET MIN PRICE FOR POSTAL
function getFreePostalPrice(){
    if(file_exists(public_html().PROJECT_NAME."/max_postal_price.txt")){
        return file_get_contents(public_html().PROJECT_NAME."/max_postal_price.txt");
    }else{
        return false;
    }
}

function updateFreePostalPrice($price){
    if(file_exists(public_html().PROJECT_NAME."/max_postal_price.txt")){
        return file_put_contents(public_html().PROJECT_NAME."/max_postal_price.txt",$price);
    }else{
        return false;
    }
}

function getPriceAfterOff(int $price,int $off){
    $step1=$price*($off/100);
    $step2=$price-$step1;
    return $step2;
}