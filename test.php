<?php

include 'config.php';
//$_SESSION['ok']=true;
// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();

if(isset($_POST['phone'])){
    //send code
    show(sendMessageTrez("09215919027","تستی"));
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

