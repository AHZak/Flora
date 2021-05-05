<?php

include 'config.php';

// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();

$sub=new Category(3);
show(Product::getProducts(1,"id","ASC"));
