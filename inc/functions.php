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