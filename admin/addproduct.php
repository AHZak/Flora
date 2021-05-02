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
          <!----------------------------- add product --------------------------->

          <div class="row">
            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-plus feather mx-2"></i>
              <p class="h5">افزودن محصول</p>
            </div>

              <!---- cat + name + product image ---->

              <div class="row g-3">

              <!---- product image ---->

              <div class="col-md-5 col-lg-4 order-md-last text-center">
                <img src="../assets/images/sample-image.png" alt="" class="img-thumbnail">
              </div>

              <!---- cat + name ---->

              <div class="col-md-7 col-lg-8">
              <form class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-md-8">
              <label for="country" class="form-label">دسته بندی</label>
              <select class="form-select" id="s_category" required="">
                <option selected disabled>یک دسته بندی انتخاب کنید</option>
                <optgroup label="دسته بندی اول">
                  <option value="">زیردسته اول</option>
                  <option value="">زیردسته دوم</option>
                </optgroup>
                <optgroup label="دسته بندی دوم">
                  <option value="">زیردسته اول</option>
                </optgroup>
                <optgroup label="دسته بندی سوم">
                  <option value="">زیردسته اول</option>
                  <option value="">زیردسته دوم</option>
                  <option value="">زیردسته سوم</option>
                </optgroup>
              </select>
            </div>

            <div class="col-md-6">
              <label for="firstName" class="form-label">نام محصول</label>
              <input type="text" class="form-control" id="product-name" placeholder="نام محصول..." value="" required="">
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="addproductFormControlTextarea1">توضیحات محصول</label>
                <textarea class="form-control my-2" id="addproductFormControlTextarea1" rows="3" placeholder="توضیحات محصول"></textarea>
              </div>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">قیمت محصول (تومان)</label>
              <input type="text" class="form-control" id="product-price" placeholder="قیمت محصول" value="" required="">
            </div>
            <div class="col-md-4">
              <label for="firstName" class="form-label">موجودی</label>
              <input type="text" class="form-control" id="product-inventory" placeholder="مثال : 12" value="" required="">
            </div>

            <div class="mb-3">
            <label for="formFile" class="form-label">تصویر محصول</label>
            <input class="form-control" type="file" id="formFile">
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">متن جایگزین تصویر</label>
              <input type="text" class="form-control" id="product-price" placeholder="متن جایگزین" value="" required="">
            </div>
            



          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg mb-5" type="submit">افزودن محصول</button>
        </form>
              
              </div>
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