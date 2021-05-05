<?php
  $pageUi="listProducts";
  include_once '../config.php';
  include 'adminheader.php';

?>

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
            <a class="nav-link" href="addproduct.php">
            <i class="fas fa-plus feather"></i>
            افزودن محصول
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link active" href="products.php">
            <i class="fas fa-shopping-bag feather"></i>
            محصولات
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="categories.php">
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

        <!----------------------------- header --------------------------->
        <div class="row">

          <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-list feather mx-2"></i>
            <p class="h5">محصولات</p>
            
            <!----------------------------- search box --------------------------->
            <form class="flex-fill ms-2 ">
        <input type="search" class="form-control rounded-pill" placeholder="جستجو در محصولات ...">
      </form>
          <!----------------------------- search box --------------------------->
          </div>

        </div>
        <!----------------------------- header --------------------------->

        <!----------------------------- filters --------------------------->
        <div class="row">
            
            <div class="d-flex flex-row flex-wrap justify-content-start border-bottom border-2 p-3">
              <!----------------------------- funnel + title --------------------------->
              <div class="col-md-2 d-flex flex-row align-items-center me-auto my-1">
                <i class="fas fa-filter me-2"></i>
                <p class="h6">فیلترها</p>
              </div>
              <!----------------------------- funnel + title --------------------------->

              <!----------------------------- categories --------------------------->
              <div class="col-11 col-md-4 d-flex flex-row align-items-center me-2 my-1">
                <p class="h6 me-2 text-nowrap">نمایش محصولات</p>

                <select id="cat" class="form-select form-select-sm" aria-label=".form-select-sm">

                  <option value="all" selected>دسته بندی ها</option>
                  <?php if($categories):?>
                      <?php foreach($categories as $category): 
                        $categoryObj=new Category($category['id']);
                        $subcategories=$categoryObj->getSubCategories();
                      ?>
                            <option disabled>____________</option>
                            <option value="<?php echo 'cat_'.$categoryObj->getCategoryId(); ?>" style="font-weight: bold" ><?php echo $categoryObj->getName(); ?></option>
                          <?php if($subcategories):?>
                              <?php foreach($subcategories as $subCategory): ?>
                                <option class="subcat" value="<?php echo 'subcat_'.$subCategory['id']; ?>">-- <?php echo $subCategory['name'] ?></option>
                              <?php endforeach; ?>
                          <?php endif;?>

                      <?php endforeach; ?>
                  <?php endif; ?>

                  
                </select>
              </div>
              <!----------------------------- categories --------------------------->

              <!----------------------------- order --------------------------->
              <div class="col-10 col-md-3 d-flex flex-row align-items-center text-nowrap me-2">
                <p class="h6 me-2">به ترتیب :</p>
                <select id="order" class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option value="newest" selected>جدیدترین</option>
                  <option value="oldest">قدیمی ترین</option>  
                  <option value="mostexpensive">گران ترین</option>   
                  <option value="cheapest">ارزان ترین</option>     
                  <option value="mostinstock">بیشترین موجودی</option>  
                  <option value="leastinstock">کمترین موجودی</option>
                  <option value="mostsells">پرفروش ترین</option>
                </select>
              </div>
              <!----------------------------- categories --------------------------->

              <!----------------------------- categories --------------------------->
              <div class="col-10 col-md-2 d-flex flex-row align-items-center text-nowrap">
                <p class="h6 me-2">موجودی :</p>
                <select id="instockstatus" class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option selected value="all">فقط نمایش...</option>
                  <option value="instock">موجود</option>  
                  <option value="unavilable">ناموجود</option>   
                </select>
              </div>
              <!----------------------------- categories --------------------------->

            </div>
        </div>
        <!----------------------------- filters --------------------------->

        <!----------------------------- applied filters --------------------------->
        <div class="container">
          <div class="row p-3">
            <div class="d-flex flex-row justify-content-start flex-wrap">

            <!--<div class="col-auto me-1 my-1 d-none">
              <a href="" class="btn btn-outline-secondary rounded-pill" title="حذف فیلتر">x متن جستجو</a>
            </div>-->
            <div class="col-auto me-1 my-1">
              <a id="selected-cat-btn" href="" class="btn btn-outline-secondary rounded-pill" title="حذف فیلتر">x دسته اول</a>
            </div>
            <div class="col-auto me-1 my-1">
              <a id="selected-order-btn" href="" class="btn btn-outline-secondary rounded-pill " title="حذف فیلتر">x گرانترین</a>
            </div>
            <div class="col-auto me-1 my-1">
              <a id="selected-instock-btn" href="" class="btn btn-outline-secondary rounded-pill" title="حذف فیلتر">x موجود</a>
            </div>
            </div>
          </div>
        </div>
        <!----------------------------- applied filters --------------------------->
       

        <!----------------------------- table of products --------------------------->

        <div id="pro-tb-list-content" class="row">
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
        </div>
          
          

        </div>
      </div>
    </main>
  </div>
</div>

    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--Filter js -->  
    <script src="../assets/js/filter.js"></script> 
  </body>
</html>

<!-- adding this line of code to test rebase -->