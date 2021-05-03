<?php

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

       

        <!----------------------------- table of products --------------------------->

        <div class="row">
          <div class="table-responsive">
          
          <table class="table table-striped table-sm align-middle">
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
            <tr>
              <td><img src="../assets/images/sample-image-min.png" alt="" class="productlist-img"></td>
              <td>مامیلاریا</td>
              <td>کاکتوس ها</td>
              <td>25</td>
              <td>15000</td>
              <td>
              <div class="">
                <a href="#" class="btn btn-warning my-2 me-2">ویرایش</a>
                <a href="" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="../assets/images/sample-image-min.png" alt="" class="productlist-img"></td>
              <td>اچینو</td>
              <td>کاکتوس ها</td>
              <td>40</td>
              <td>7000</td>
              <td>
              <div class="">
                <a href="#" class="btn btn-warning my-2 me-2">ویرایش</a>
                <a href="" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="../assets/images/sample-image-min.png" alt="" class="productlist-img"></td>
              <td>نخل شامادورا</td>
              <td>کاکتوس ها</td>
              <td>10</td>
              <td>35000</td>
              <td>
              <div class="">
                <a href="#" class="btn btn-warning my-2 me-2">ویرایش</a>
                <a href="" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="../assets/images/sample-image-min.png" alt="" class="productlist-img"></td>
              <td>گل رز</td>
              <td>گل</td>
              <td>90</td>
              <td>22000</td>
              <td>
              <div class="">
                <a href="#" class="btn btn-warning my-2 me-2">ویرایش</a>
                <a href="" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
            <tr>
              <td><img src="../assets/images/sample-image-min.png" alt="" class="productlist-img"></td>
              <td>درخت موز</td>
              <td>دوست دارم</td>
              <td>1000</td>
              <td>100000</td>
              <td>
              <div class="">
                <a href="#" class="btn btn-warning my-2 me-2">ویرایش</a>
                <a href="" class="btn btn-danger my-2">حذف</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

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