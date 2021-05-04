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
                <select class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option selected disabled>دسته بندی ها</option>
                  <option disabled>____________</option>
                  <option value="1" style="font-weight: bold" >دسته اصلی 1</option>
                  <option value="2">-- زیردسته یک</option>
                  <option value="2">-- زیردسته دو</option>
                  <option disabled>________</option>
                  <option value="1" style="font-weight: bold" >دسته اصلی 2</option>
                  <option value="2">-- زیردسته یک</option>
                  <option value="2">-- زیردسته دو</option>
                  <option value="2">-- زیردسته سه</option>
                  <option disabled>________</option>
                  <option value="1" style="font-weight: bold" >دسته اصلی 3</option>
                  <option value="2">-- زیردسته یک</option>
                  <option value="2">-- زیردسته دو</option>
                </select>
              </div>
              <!----------------------------- categories --------------------------->

              <!----------------------------- order --------------------------->
              <div class="col-10 col-md-3 d-flex flex-row align-items-center text-nowrap me-2">
                <p class="h6 me-2">به ترتیب :</p>
                <select class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option selected>جدیدترین</option>
                  <option>قدیمی ترین</option>  
                  <option>گران ترین</option>   
                  <option>ارزان ترین</option>     
                  <option>بیشترین موجودی</option>  
                  <option>کمترین موجودی</option>
                  <option>پرفروش ترین</option>
                </select>
              </div>
              <!----------------------------- categories --------------------------->

              <!----------------------------- categories --------------------------->
              <div class="col-10 col-md-2 d-flex flex-row align-items-center text-nowrap">
                <p class="h6 me-2">موجودی :</p>
                <select class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option selected disabled>فقط نمایش...</option>
                  <option>موجود</option>  
                  <option>ناموجود</option>   
                </select>
              </div>
              <!----------------------------- categories --------------------------->

            </div>
        </div>
        <!----------------------------- filters --------------------------->
       

        <!----------------------------- table of products --------------------------->

        <div class="row">
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

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>

<!-- adding this line of code to test rebase -->