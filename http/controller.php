<?php

if(isset($pageUi)){
    if(isset($_POST['addCategory'])){
        $catName=isset($_POST['name']) ? $_POST['name'] : "";
        $catType=isset($_POST['catType']) ? $_POST['catType'] : "";
        
        if($catType!=""){
            if($catType=='parent'){
                //add category
                Category::create(['name'=>$catName,'creator_id'=>1],$message);
                $message->showMessages();
            }else{
                //add sub category
                SubCategory::create(['name'=>$catName,'creator_id'=>1,'category_id'=>$catType]);
            }
        }
    }
    //get categories and sub categories
    $categories=Category::getCategories();

}