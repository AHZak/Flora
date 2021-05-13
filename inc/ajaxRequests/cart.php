<?php
include "../../config.php";

if(isset($_POST)){
    //PRODUCT ID
    if(isset($_POST['productid'])){
        $productId=$_POST['productid'];
    }else{
        $productId=false;
    }

    //COUNT FOR ORDER
    if(isset($_POST['number'])){
        $number=$_POST['number'];
    }else{
        $number=false;
    }

    if($productId && $number){
        //add to cart 
        $_SESSION['cart']['status']='open';
        $_SESSION['cart']['products'][$productId]=$productId;
        $_SESSION['cart']['number'][$productId]=$number;

        //product object
        $product=new Product($productId);
        $sumprice=$product->getPrice()*$number;
    }



    echo json_encode(['ok'=>true,'sumprice'=>number_format($sumprice)]);
}