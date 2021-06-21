<?php 

include_once '../../config.php';
use Database\Db;
if(isset($_GET['order']) && $_GET['order']!=""){
    $orderBy=$_GET['order'];
    if($orderBy=='cheapest'){
        $order="price";
        $orderBy="ASC";
    }elseif($orderBy=="mostexpensive"){
        $order="price";
        $orderBy="DESC";
    }elseif($orderBy=='mostsels'){
        $order="seles";
        $orderBy="DESC";
    }else{
        $order="id";
        $orderBy="ASC";
    }
}else{
    $order="id";
    $orderBy="ASC";
}

if(isset($_GET['instockstatus']) && $_GET['instockstatus']!=""){
    if($_GET['instockstatus']=='instock'){
        $instock="ok";
    }elseif($_GET['instockstatus']=='all'){
        $instock="all";
    }else{
        $instock="all";
    }
}else{
    $instock="all";
}

if(isset($_GET['catid']) && $_GET['catid']!=""){
    $catId=$_GET['catid'];
    if(isset($_GET['term']) && $_GET['term']!=""){
        $term=str_replace(" ","%",$term);
        $term=str_replace("'","\'",$term);
        if($instock=="ok"){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id='$catId') AND title LIKE '%$term%' AND instock>0",'all','id',0,$order,$orderBy);
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id='$catId') AND title LIKE '%$term%'",'all','id',0,$order,$orderBy);
        }
        
    }else{
        if($instock=="ok"){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id='$catId') AND instock>0",'all','id',0,$order,$orderBy);
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id='$catId')",'all','id',0,$order,$orderBy);
        }    
    }
    
}elseif(isset($_GET['subid']) && $_GET['subid']!=""){
    $subid=$_GET['subid'];
    if(isset($_GET['term']) && $_GET['term']!=""){
        $term=str_replace(" ","%",$term);
        $term=str_replace("'","\'",$term);
        if($instock=="ok"){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id='$subid') AND title LIKE '%$term%' AND instock>0",'all','id',0,$order,$orderBy);
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id='$subid') AND title LIKE '%$term%'",'all','id',0,$order,$orderBy);
        }
        
    }else{
        if($instock=="ok"){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id='$subid') AND instock>0",'all','id',0,$order,$orderBy);
        }else{
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id='$subid')",'all','id',0,$order,$orderBy);
        }    
    }
}elseif(isset($_GET['term'])){
    $term=$_GET['term'];
    $term=str_replace(" ","%",$term);
    $term=str_replace("'","\'",$term);
    if($instock=="ok"){
        $products=Db::select(PRODUCT_TABLE_NAME,"title LIKE '%$term%' AND instock>0",'all','id',0,$order,$orderBy);
        if(!$products){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id IN(SELECT id FROM categories WHERE name LIKE '%$term%')) AND instock>0",'all','id',0,$order,$orderBy);

            if(!$products){
                $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id IN(SELECT id FROM sub_categories WHERE name LIKE '%$term%')) AND instock>0",'all','id',0,$order,$orderBy);
            }
        }
    }else{
        $products=Db::select(PRODUCT_TABLE_NAME," title LIKE '%$term%'",'all','id',0,$order,$orderBy);
        if(!$products){
            $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM category_product WHERE category_id IN(SELECT id FROM categories WHERE name LIKE '%$term%'))",'all','id',0,$order,$orderBy);

            if(!$products){
                $products=Db::select(PRODUCT_TABLE_NAME,"id IN (SELECT product_id FROM subcategory_product WHERE subcategory_id IN(SELECT id FROM sub_categories WHERE name LIKE '%$term%'))",'all','id',0,$order,$orderBy);
            }
        }
    }
}

?>

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-2 g-lg-3 justify-content-end p-3 ">
                      <?php if($products): ?>
                          <?php foreach($products as $product): 
                            $productObj=new Product($product['id']);  
                          ?>
                          <a href="product.php?pid=<?php echo $productObj->getId()."&slug=".$productObj->getTitle();  ?>" class="text-decoration-none">
                            <div class="col">
                              <div class="card shadow">
                                <img src="<?php echo $productObj->getImage(); ?>" class="card-img-top" alt="<?php echo $productObj->getImageAlt(); ?>">
                                <div class="card-body p-1">
                                  <p class="card-title text-center mb-3" style="font-weight:bold;"><?php echo $productObj->getTitle(); ?></p>
                                  <div class="d-flex justify-content-end" style="color: coral;">
                                    <p class="m-0"><?php echo number_format($productObj->getPrice()); ?></p>
                                    <p class="ms-1 m-0">تومان</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                          <?php endforeach; ?>
                      <?php else: ?>
                        <p>محصولی وجود ندارد</p>
                      <?php endif; ?>
                </div>   
