<?php 
  //page controller
  $pageUi='editProduct';
  include_once '../config.php';
?>
<?php

include 'adminheader.php';

?>

    <div class="container-fluid">
  <div class="row">

<?php
  include 'adminsidebar.php'
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        <div class="row">
          <!----------------------------- edit product --------------------------->

          <!---- header ---->

          <div class="row">

            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-edit feather mx-2"></i>
              <p class="h5">ویرایش محصول</p>
            </div>
          
          </div>

          <!---- header ---->

          <!---- addproduct form + product image ---->

          <div class="row g-3">

            <!---- product image ---->

            <div class="col-md-5 col-lg-4 order-md-last text-center">

              <div class="d-flex flex-column">

                <div class="flex-shrink-0 mb-3">
                <img src="<?php echo $product->getImage() ?>" alt="" class="img-thumbnail" height="250px" width="250px">
                </div>
    
                <!--<div>
                <button type="button" class="btn btn-outline-danger btn-sm">حذف تصویر</button>
                </div>-->
              
              </div>
              
            </div>

            <!---- product image ---->

            <!---- add product form ---->

            <div class="col-md-7 col-lg-8">

              <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">

                <div class="row g-3">

                  <!-- category selection -->

                  <div class="col-md-8">
                    <label for="s_category" class="form-label">دسته بندی</label>
                    <select name="categoryId" class="form-select" id="s_category" required="">
                        <option disabled>یک دسته بندی انتخاب کنید</option>
                        <?php if($categories):?>
                      <?php foreach($categories as $category): 
                        $categoryObj=new Category($category['id']);
                        $subcategories=$categoryObj->getSubCategories();
                      ?>
                            <option disabled>____________</option>
                            <option <?php if($product->getCategory()->getCategoryId()==$categoryObj->getCategoryId()){ echo 'selected'; } ?> value="<?php echo 'catid_'.$categoryObj->getCategoryId(); ?>" style="font-weight: bold" ><?php echo $categoryObj->getName(); ?></option>
                          <?php if($subcategories):?>
                              <?php foreach($subcategories as $subCategory): ?>
                                <option <?php if($product->getSubCategory()->getSubCategoryId()==$subCategory['id']){ echo 'selected'; } ?> class="subcat" value="<?php echo 'subid_'.$subCategory['id']; ?>" <?php if($subCategory['id']==$product->getSubCategory()->getSubCategoryId()){ echo 'selected';} ?>>-- <?php echo $subCategory['name'] ?></option>
                              <?php endforeach; ?>
                          <?php endif;?>

                      <?php endforeach; ?>
                  <?php endif; ?>

                    </select>
                  </div>

                  <!-- category selection -->

                  <!-- product name -->

                  <div class="col-md-6">
                    <label for="firstName" class="form-label">نام محصول</label>
                    <input name="title" type="text" class="form-control" id="product-name" placeholder="نام محصول..." value="<?php echo $product->getTitle() ?>" required="">
                  </div>

                  <!-- product name -->

                  <!-- product description -->

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="addproductFormControlTextarea1">توضیحات محصول</label>
                      <textarea name="description" class="form-control my-2" id="addproductFormControlTextarea1" rows="3" placeholder="توضیحات محصول"><?php echo $product->getDescription() ?>
                      </textarea>
                    </div>
                  </div>

                  <!-- product description -->

                  <!-- product price -->

                  <div class="col-md-4">
                    <label for="firstName" class="form-label">قیمت محصول (تومان)</label>
                    <input name="price" type="text" class="form-control" id="product-price" placeholder="قیمت محصول" value="<?php echo $product->getPrice(); ?>" required="">
                  </div>

                  <!-- product price -->

                  <!-- product inventory -->

                  <div class="col-md-4">
                    <label for="firstName" class="form-label">موجودی</label>
                    <input name="instock" type="text" class="form-control" id="product-inventory" placeholder="مثال : 12" value="<?php echo $product->getInstock(); ?>" required="">
                  </div>

                  <!-- product inventory -->

                  <!-- product new image selection -->

                  <div class="mb-3">
                    <label for="formFile" class="form-label">تصویر جدید</label>
                    <input name="img" class="form-control" type="file" id="formFile">
                  </div>

                  <div class="col-md-4">
                    <label for="firstName" class="form-label">متن جایگزین تصویر</label>
                    <input name="image_alt" type="text" class="form-control" id="product-price" placeholder="متن جایگزین" value="<?php echo $product->getImageAlt(); ?>" required="">
                  </div>
                  
                  <!-- product new image selection -->

                  <hr class="my-4">  

                  <!-- edit product buttons -->

                  <div class="d-flex flex-row">
                    <button name="editProduct" class="btn btn-success btn-lg mb-5 mx-3" type="submit">ثبت تغییرات</button>
                    <button name="cancelEditProduct" class="btn btn-danger btn-lg mb-5" type="submit">لغو</button>
                  </div>

                  <!-- add product button -->

                </div>
                
              </form>
            
            </div>

            <!---- add product form ---->

          </div>

          <!---- addproduct form + product image ---->

          <!----------------------------- add product --------------------------->

        </div>
      </div>
    </main>
    
    <!----------------------------- left panel --------------------------->

  </div>
</div>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>

<!-- adding this line of code to test rebase -->