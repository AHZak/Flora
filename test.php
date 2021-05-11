<?php

include 'config.php';

// Product::create(['title'=>'tese','image'=>'image.png','price'=>200,'description'=>'its a des','instock'=>10],$message);
// $message->showMessages();
use Database\Db;
$term=Db::correctTermFormat($_GET['q'],'simple');
show(Db::simpleSearch('products',"title LIKE '%$term%'"));

