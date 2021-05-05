<?php
//filter 
include '../../config.php';
use Database\Db;

if(isset($_POST)){

    $orderBy=isset($_POST['order']) && $_POST['order'] ? $_POST['order'] : null;

    if($orderBy=='cheapest'){
        $order="price";
        $orderBy="ASC";
    }elseif($orderBy=="mostexpensive"){
        $order="price";
        $orderBy="DESC";
    }elseif($orderBy=='newest'){
        $order="created_at";
        $orderBy="DESC";
    }elseif($orderBy=='mostInstock'){
        $order="instock";
        $orderBy="DESC";
    }elseif($orderBy=='leastInstock'){
        $ordert="instock";
        $orderBy="ASC";
    }else{
        $order="id";
        $orderBy="ASC";
    }

    //CAT
    $category=isset($_POST['category']) && $_POST['category'] ? $_POST['category'] : false;
    $subCategory=isset($_POST['subCategory']) && $_POST['subCategory'] ? $_POST['subCategory'] : false;
    $instock=isset($_POST['instock']) && $_POST['instock'] ? $_POST['instock'] : false;
    

    if($category){

        $category=new Category($category);
        if($instock){
            if($instock=='unavilable'){
                $products=$category->getProducts("instock=0",$order,$orderBy);
            }
        }else{
            $products=$category->getProducts(1,$order,$orderBy);
        }

    }elseif($subCategory){

        $subCategory=new SubCategory($subCategory);
        if($instock){
            if($instock=='unavilable'){
                $products=$subCategory->getProducts("instock=0",$order,$orderBy);
            }
        }else{
            $products=$subCategory->getProducts(1,$order,$orderBy);
        }
    }else{
       
        if($instock){
            if($instock=='unavilable'){
                $products=Db::select(PRODUCT_TABLE_NAME,"instock=0",'All',"*",0,$order,$orderBy);
            }
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,1,'All',"*",0,$order,$orderBy);
        }
       
    }

    if($products){
        echo json_encode(['ok'=>'true','result'=>$products]);
    }else{
        json_encode(['ok'=>'false','result'=>'Not Found Records']);
    }

}