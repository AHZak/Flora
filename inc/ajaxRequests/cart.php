<?php
include "../../config.php";

if(isset($_POST)){
    //DELETE FROM CART
    if(isset($_POST['delcart'])){
        $productId=$_POST['delcart'];
        unset($_SESSION['cart']['products'][$productId]);
        unset($_SESSION['cart']['number'][$productId]);
        //product object
        $sumprice=0;
    }else{
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
            $_SESSION['cart']['sumprice'][$productId]=$product->getPrice()*$number;
        }
    }


    //SUM OF ALL PRODUCTS
    $sum=0;
    if($_SESSION['cart']['products']){
        foreach($_SESSION['cart']['products'] as $productId){
            //product object
            $product=new Product($productId);
            $sum=$sum+$product->getPrice()*$_SESSION['cart']['number'][$productId];
        }
        $_SESSION['cart']['fullsum']=$sum;
    }else{
        $_SESSION['cart']['fullsum']=0;
    }
    echo json_encode(['ok'=>true,'sumprice'=>number_format($sumprice),'fullsum'=>number_format($sum)]);



    
}