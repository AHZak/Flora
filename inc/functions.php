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