<?php

include_once '../config.php';
// Category::create(['name'=>'انار','creator_id'=>1]);
// var_dump(Category::getCategories($mes));
// var_dump($mes);
$sub=new SubCategory(3);
show($sub->getName());