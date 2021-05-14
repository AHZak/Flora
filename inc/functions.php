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