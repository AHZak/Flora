<!doctype html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/admin.css">

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
            <a class="nav-link" href="addproduct.php">
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
            <a class="nav-link active" href="#">
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

    <!-- ++++++++++++++++++++++++++ add category +++++++++++++++++++++++ -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        <div class="row">
          <div class="col-md g-3">
            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-plus feather mx-2"></i>
              <p class="h5">افزودن دسته</p>
            </div>
            <form action="">
              <div class="col-12 my-2">
                <label for="firstName" class="form-label">نام دسته بندی :</label>
                <input type="text" class="form-control" id="cat-name" placeholder="گیاهان آپارتمانی ..." value="" required="">
              </div>
              <div class="col-12 my-2">
                <label for="state" class="form-label">دسته مادر :</label>
                <select class="form-select" id="state" required="">
                  <option value="">دسته اصلی</option>
                  <option>دسته اول</option>
                  <option>دسته دوم</option>
                  <option>دسته سوم</option>
                </select>
              </div>
              <button class="btn btn-primary btn-lg my-3" type="submit">افزودن دسته</button>
            </form>
          </div>

           <!-- ++++++++++++++++++++++++++ categories +++++++++++++++++++++++ -->

          <div class="col-md g-3">

          <!-- ++++++ header START ++++++ -->

            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-list mx-2"></i>
              <p class="h5">دسته بندی ها</p>
            </div>

          <!-- ++++++ header END ++++++ -->

          <!-- ++++++ Listing categories START ++++++ -->

            <ul class="list-group">

              <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                <div>
                  <h6 class="my-0">دسته اول</h6>
                </div>
                <div>
                  <button type="button" class="btn btn-outline-warning mx-2">ویرایش</button>
                  <button type="button" class="btn btn-outline-danger">حذف</button>
                </div>
              </li>
              
              <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                <div>
                  <h6 class="my-0">دسته دوم</h6>
                </div>
                <div>
                  <button type="button" class="btn btn-outline-warning mx-2">ویرایش</button>
                  <button type="button" class="btn btn-outline-danger">حذف</button>
                </div>
              </li>

              <!-- +++++++ collapse example for sub-categories START ++++++++ -->

              <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                <div>
                  <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="d-flex flex-row align-items-center">
                      <h6 class="my-0">دسته سوم</h6>
                      <i class="fas fa-chevron-down mx-2"></i>
                    </div>
                  </a>
                </div>
                <div>
                  <button type="button" class="btn btn-outline-warning mx-2">ویرایش</button>
                  <button type="button" class="btn btn-outline-danger">حذف</button>
                </div>
              </li>

              <!-- ++++++ Collapsing Section START ++++++ -->
              
              <div class="collapse" id="collapseExample">

                <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-minus mx-3"></i>
                    <h6 class="my-0">زیردسته اول</h6>
                  </div>
                  <div>
                    <button type="button" class="btn btn-outline-warning btn-sm mx-2">ویرایش</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">حذف</button>
                  </div>
                </li>

                <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-minus mx-3"></i>
                    <h6 class="my-0">زیردسته دوم</h6>
                  </div>
                  <div>
                    <button type="button" class="btn btn-outline-warning btn-sm mx-2">ویرایش</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">حذف</button>
                  </div>
                </li>

              </div>

              <!-- ++++++ Collapsing Section End ++++++ -->

              <!-- collapse example for sub-categories End -->

              <li class="list-group-item d-flex text-nowrap justify-content-between lh-sm align-items-center">
                <div>
                  <h6 class="my-0">دسته چهارم</h6>
                </div>
                <div>
                  <button type="button" class="btn btn-outline-warning mx-2">ویرایش</button>
                  <button type="button" class="btn btn-outline-danger">حذف</button>
                </div>
              </li>
            
            </ul>

            <!-- ++++++ Listing categories End ++++++ -->

          </div>
      </div>
    </main>
  </div>
</div>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>