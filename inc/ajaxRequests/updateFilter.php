<?php
include 'filter.php';
?>
<div class="table-responsive">
          
          <table class="table table-striped table-sm align-middle">
          <?php if($products): ?>
            <thead>
              <tr>
                <th>تصویر </th>
                <th>نام</th>
                <th>دسته بندی</th>
                <th>موجودی</th>
                <th>قیمت</th>
                <th>اعمال تغییر</th>
              </tr>
            </thead>
          
          <tbody>

            <?php foreach($products as $product): 
                $productObj=new Product($product['id']);
            ?>

            <tr>
              <td><img width="150px" height="150px" src="<?php echo $product['image']; ?>" alt="<?php echo $product['image_alt'] ?>" class="productlist-img"></td>
              <td><?php echo $product['title']; ?></td>
              <td><?php echo '<b>'.$productObj->getCategory()->getName().'</b><br>'.$productObj->getSubCategory()->getName(); ?></td>
              <td><?php echo $product['instock']; ?></td>
              <td><?php echo $product['price']; ?></td>
              <td>
                <div class="">
                  <a href="<?php echo DOMAIN.'admin/editproduct.php?id='.$product['id']; ?>" class="btn btn-warning my-2 me-2">ویرایش</a>
                  <a href="?del_pro=<?php echo $product['id']; ?>" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
            
            <?php endforeach; ?>
 
          </tbody>
        </table>
        <?php else: echo 'محصولی وجود ندارد';?>
        <?php endif;?>
        </div>