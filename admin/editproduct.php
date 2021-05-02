<?php 
  //page controller
  $pageUi='editProduct';
  include_once '../config.php';
?>
<!doctype html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>فلورا</title>
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shodow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-3 " href="#">پنل ادمین</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="تبديل التنقل">
    <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav px-3 d-flex flex-row align-items-center">
      <li class="nav-item text-nowrap">
          <a class="nav-link mx-2 mb-0" href="#">
          <i class="fas fa-user px-2"></i>
          <span>امیر ذکریا</span>
          </a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#"><button type="button" class="btn btn-danger pb-2 mx-2">خروج</button></a>
        </li>
      </ul>
    </header>

    <div class="container-fluid">
  <div class="row">

  <!----------------------------- sidebar --------------------------->

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link border-bottom" aria-current="page" href="#">
            <i class="fas fa-home"></i>
            خانه
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-users feather"></i>
            کاربران
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-cart-arrow-down feather"></i>
            سفارشات
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-receipt feather"></i>
            فاکتورها
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link active" href="#">
            <i class="fas fa-plus feather"></i>
            افزودن محصول
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-shopping-bag feather"></i>
            محصولات
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-archive feather"></i>
            دسته بندی ها
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-truck feather"></i>
            تنظیمات ارسال
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-comment-alt feather"></i>
            پنل پیامک
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-image feather"></i>
            اسلاید ها
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">
            <i class="fas fa-map-marked-alt feather"></i>
            تنظیمات نقشه
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <!----------------------------- left panel --------------------------->

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
    
                <div>
                <button type="button" class="btn btn-outline-danger btn-sm">حذف تصویر</button>
                </div>
              
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
                    <select name="subCategoryId" class="form-select" id="s_category" required="">
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
                                          <option  value="<?php echo $subCategory['id'] ?>" <?php if($subCategory['id']==$product->getSubCategory()->getSubCategoryId()){ echo 'selected';} ?> > <?php echo $subCategory['name'] ?> </option>
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