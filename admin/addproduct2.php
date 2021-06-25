<?php 
  //page controller
  $pageUi='addProduct';
  include_once '../config.php';
?>
<?php

include 'adminheader.php';

?>

    <div class="container-fluid">
  <div class="row">

<?php
  include 'adminsidebar.php';

?>

    <!----------------------------- left panel --------------------------->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        <div class="row">
          <!----------------------------- add product --------------------------->

          <!---- header ---->

          <div class="row">

            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-plus feather mx-2"></i>
              <p class="h5">افزودن محصول</p>
            </div>
          
          </div>

          <!---- header ---->

          <!---- addproduct form + product image ---->

          <div class="row g-3">

            <!---- product image ---->

            <div class="col-md-5 col-lg-4 order-md-last text-center">

              <img src="../assets/images/sample-image-min.png" alt="" class="img-thumbnail">

            </div>

            <!---- product image ---->

            <!---- add product form ---->

            <div class="col-md-7 col-lg-8">

              <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">

                <div class="row g-3">

                  <!-- category selection -->

                  <div class="col-md-8">

                    <label for="s_category" class="form-label">دسته بندی</label>
                    <select name="subCategoryId" class="form-select" id="s_category" required="">
                        <option selected disabled>یک دسته بندی انتخاب کنید</option>
                        <?php if($categories): ?>

                            <?php foreach($categories as $category): ?>

                                <?php
                                    //get sub categories
                                    $categoryObj=new Category($category['id']);
                                    $subCategories=$categoryObj->getSubCategories();
                                ?>

                                <optgroup label="<?php echo $categoryObj->getName(); ?>">
                                      
                                    <?php if($subCategories): ?>
                                        <?php foreach($subCategories as $subCategory): ?>
                                          <option value="<?php echo $subCategory['id'] ?>"><?php echo $subCategory['name'] ?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>

                                </optgroup>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </select>

                  </div>

                  <!-- category selection -->

                  <!-- product name -->

                  <div class="col-md-6">

                    <label for="product-name" class="form-label">نام محصول</label>
                    <input name="title" type="text" class="form-control" id="product-name" placeholder="نام محصول..." value="" required="">

                  </div>

                  <!-- product name -->

                  <!-- product description -->

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="addproductFormControlTextarea1">توضیحات محصول</label>
                      <textarea name="description" class="form-control my-2" id="addproductFormControlTextarea1" rows="3" placeholder="توضیحات محصول"></textarea>
                    </div>
                  </div>

                  <!-- product description -->

                  <!-- product price -->

                  <div class="col-md-4">

                    <label for="product-price" class="form-label">قیمت محصول (تومان)</label>
                    <input name="price" type="text" class="form-control" id="product-price" placeholder="قیمت محصول" value="" required="">

                  </div>

                  <!-- product price -->

                  <!-- product inventory -->

                  <div class="col-md-4">

                    <label for="product-inventory" class="form-label">موجودی</label>
                    <input name="instock" type="text" class="form-control" id="product-inventory" placeholder="مثال : 12" value="" required="">

                  </div>

                  <!-- product inventory -->

                  <!-- product image selection -->

                  <div class="mb-3">

                    <label for="formFile" class="form-label">تصویر محصول</label>
                    <input class="form-control" name="img" type="file" id="formFile">
                  </div>

                  <div class="col-md-4">
                    <label for="image-alt" class="form-label">متن جایگزین تصویر</label>
                    <input name="image_alt" type="text" class="form-control" id="image-alt" placeholder="متن جایگزین" value="" required="">

                  </div>
                  
                  <!-- product image selection -->

                  <hr class="my-4">  

                  <!-- add product button -->

                  <button name="addProduct" class="w-100 btn btn-primary btn-lg mb-5" type="submit">افزودن محصول</button>

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
    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/extra.js"></script>                           
  </body>
</html>

<!-- adding this line of code to test rebase -->