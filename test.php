<?php

include 'config.php';

// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();

$cat=new Category(3);
show($cat->getProducts(1));
