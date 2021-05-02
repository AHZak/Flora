<?php
use Database\Db;

if(isset($pageUi)){
    if($pageUi=='addCategory'){
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
    }elseif($pageUi=='addProduct'){

        if(isset($_POST['addProduct'])){
            //add product actions
            $title=isset($_POST['title']) ? $_POST['title'] : null;
            $price=isset($_POST['price']) ? $_POST['price'] : null;
            $description=isset($_POST['description']) ? $_POST['description'] : null;
            $image=isset($_FILES['img']) ? $_FILES['img'] : null;
            $image_alt=isset($_POST['image_alt']) ? $_POST['image_alt'] : null;
            $instock=isset($_POST['instock']) ? $_POST['instock'] : null;
            $subCategoryId=isset($_POST['subCategoryId']) ? $_POST['subCategoryId'] : null;
            //admin Id
            $creator_id=1;
            $product_id=Product::create(['title'=>$title,'price'=>$price,'description'=>$description,'image'=>$image,'image_alt'=>$image_alt,'instock'=>$instock,'creator_id'=>$creator_id],$message);
            
            //add subcategory_product
            if($product_id && $subCategoryId){
                $result=Db::insert(SUB_CATEGORY_PRODUCT_TABLE_NAME,['product_id'=>$product_id,'subcategory_id'=>$subCategoryId]);
            }
        }

        //get categories 
        $categories=Category::getCategories();
    }


}