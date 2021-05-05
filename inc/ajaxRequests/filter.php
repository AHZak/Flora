<?php
//filter 
include '../../config.php';
use Database\Db;

if(isset($_GET)){
   
    if(isset($_GET['order']) && $_GET['order']){
        $orderBy=$_GET['order'];
    }else{
        $orderBy="all";
    }

   
    if($orderBy=='cheapest'){
        $order="price";
        $orderBy="ASC";
    }elseif($orderBy=="mostexpensive"){
        $order="price";
        $orderBy="DESC";
    }elseif($orderBy=='newest'){
        $order="created_at";
        $orderBy="DESC";
    }elseif($orderBy=='oldest'){
        $order="created_at";
        $orderBy="ASC";
    }elseif($orderBy=='mostinstock'){
        $order="instock";
        $orderBy="DESC";
    }elseif($orderBy=='leastinstock'){
        $order="instock";
        $orderBy="ASC";
    }else{
        $order="id";
        $orderBy="ASC";
    }

    //CAT
    if(isset($_GET['cat']) && $_GET['cat']){
        $cat=$_GET['cat'];
    }else{
        $cat=false;
    }
    
    if($cat){
        if(strpos($cat,"subcat_")!==false){
            sscanf($cat,"subcat_%d",$subCategory);
        }elseif(strpos($cat,"cat_")!==false){
            sscanf($cat,"cat_%d",$category);
        }
    }
    //INSTOCK
    if(isset($_GET['instock']) && $_GET['instock']){
        $instock=$_GET['instock'];
    }else{
        $instock=false;
    }
    

    if(isset($category) && $category ){
        $category=new Category($category);
        if($instock){
            if($instock=='unavilable'){
                $products=$category->getProducts("instock=0",$order,$orderBy);
            }else{
                $products=$category->getProducts("instock > 0",$order,$orderBy);
            }
        }else{
            $products=$category->getProducts(1,$order,$orderBy);
        }

    }elseif(isset($subCategory) && $subCategory!=""){
        $subCategory=new SubCategory($subCategory);
        if($instock){
            if($instock=='unavilable'){
                $products=$subCategory->getProducts("instock=0",$order,$orderBy);
            }else{
                $products=$subCategory->getProducts("instock != 0",$order,$orderBy);
            }
        }else{
            $products=$subCategory->getProducts(1,$order,$orderBy);
        }
    }else{
       
        if($instock){
            if($instock=='unavilable'){
                $products=Db::select(PRODUCT_TABLE_NAME,"instock=0",'All',"*",0,$order,$orderBy);
            }elseif($instock=='instock'){
                $products=Db::select(PRODUCT_TABLE_NAME,"instock>0",'All',"*",0,$order,$orderBy);
            }else{
                $products=Db::select(PRODUCT_TABLE_NAME,1,'All',"*",0,$order,$orderBy);
            }
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,1,'All',"*",0,$order,$orderBy);
        }
       
    }
}