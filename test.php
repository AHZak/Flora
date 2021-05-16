<?php

include 'config.php';
//$_SESSION['ok']=true;
// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();

if(isset($_POST['phone'])){
    //send code
    $url="https://raygansms.com/FastSend.asmx";
    $params=['UserName'=>'arash0078','Password'=>"252@arash*—*42:)","Mobile"=>'09215919027','Footer'=>'تست'];
    show(Server::sendRequest($url,$params,'post'));
}

if(isset($_POST['code'])){
    //auth code
   
}
?>



<form method="post">
<input type="text" name="phone">
<input type="submit">
</form>
<br>
<form method="post">
<input type="text" name="code">
<input type="submit">
</form>

