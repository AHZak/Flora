<?php

include 'config.php';

// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();

$po=new Product(1);
show($po->getSubCategory()->getName());
