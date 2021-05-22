<?php
    $pageUi="userProfile";
    include_once 'config.php';
?>
<!doctype html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    <title>فلورا</title>
    <link rel="stylesheet" href="assets/css/userprofile.css">
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body class="">
    <!----------------------------- headers ------------------------------------>
    <header>

        <div class="container-fluid">
          <!----------------------------- fisrt header ------------------------------------>
          <div class="row">

            <div class="d-flex flex-row justify-content-between align-items-end bg-light p-3 pb-2">
              <div class="col-md-4 ms-2">
                <a href="#"><img src="assets/images/logo/flora.png" alt="" width="200px"></a>
              </div>
              <div class="d-flex align-items-center">
              <button class="btn btn-outline-dark rounded-pill me-2">وارد شوید<i class="fas fa-user ms-1"></i></button> 
              </a> <i class="me-2">|</i>
              <a href="cart.php"><i class="fas fa-shopping-cart cart-cart"></i></a>
              
              </div>
            </div>

          </div>
          <!----------------------------- first header ------------------------------------>


        </div>
    
    </header>
    <!----------------------------- headers ------------------------------------>

    <!----------------------------- personal info + ordrs + addresses + receipts ------------------------------------>
    <main>
    <div class="p-3">
        <nav>
          <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-personal-tab" data-bs-toggle="tab" data-bs-target="#nav-personal" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-user me-1"></i>اطلاعات شخصی</button>
            <button class="nav-link" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-orders" aria-selected="false"><i class="fas fa-box-open me-1"></i>سفارسشات من</button>
            <button class="nav-link" id="nav-addresses-tab" data-bs-toggle="tab" data-bs-target="#nav-addresses" type="button" role="tab" aria-controls="nav-addresses" aria-selected="false"><i class="fas fa-map-signs me-1"></i>آدرس های من</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade active show" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
            <div class="container">
              <form method="post">
              <div class="row">
                <div class="col-md-5 p-2">
                  <label for="name" class="form-label">نام<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                  <input name="first_name" type="text" id="name" placeholder="نامتان را وارد کنید" class="form-control" aria-describedby="name" value="<?php echo $user->getFirstName(); ?>">
                </div>
                <div class="col-md-5 p-2">
                  <label for="name" class="form-label">نام خانوادگی<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                  <input name="last_name" type="text" placeholder="نام خانودگی تان را وارد کنید" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getLastName(); ?>">
                </div>
                <div class="col-md-5 p-2">
                  <label for="name" class="form-label">شماره تلفن</label>
                  <input disabled type="text" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getPhone(); ?>">
                </div>
                <div class="col-md-5 p-2">
                  <label for="name" class="form-label">ایمیل<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                  <input name="email" type="text" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getEmail(); ?>" placeholder="example@email.com">
                </div>
                <div class="col-md-12 p-2">
                  <input name="edit" type="submit" class="btn btn-primary" value="بروزرسانی اطلاعات">
                  <div class="my-2">
                  <p class="text-muted"><i class="fas fa-info-circle me-2"></i>برای ثبت تغییرات کلیک کنید</p>
                  
                  </div>
                  
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
            
          <div class="table-responsive">
        <table class="table table-striped table-sm text-nowrap">
          <thead>
            <tr>
              <th>#شماره سفارش</th>
              <th>مبلغ</th>
              <th>تاریخ سفارش</th>
              <th>وضعیت</th>
              <th>جزئیات/فاکتور</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>10001</td>
              <td>300,000 تومان</td>
              <td>1400/03/12</td>
              <td><i class="far fa-question-circle me-1"></i>در انتظار پرداخت</td>
              <td>
                <div class="d-flex flex-row">
                  <a href="#" class="btn btn-outline-primary me-1">جزئیات</a>
                  <a href="#" class="btn btn-outline-danger">فاکتور</a>
                </div>
              </td>
            </tr>
            <tr>
              <td>10002</td>
              <td>110,000 تومان</td>
              <td>1400/02/01</td>
              <td><i class="far fa-question-circle me-1"></i>در حال انجام</td>
              <td>
                <div class="d-flex flex-row">
                  <a href="#" class="btn btn-outline-primary me-1">جزئیات</a>
                  <a href="#" class="btn btn-outline-danger">فاکتور</a>
                </div>
              </td>
            </tr>
            <tr>
              <td>10003</td>
              <td>74,000 تومان</td>
              <td>1400/01/13</td>
              <td><i class="far fa-question-circle me-1"></i>تحویل شده</td>
              <td>
                <div class="d-flex flex-row">
                  <a href="#" class="btn btn-outline-primary me-1">جزئیات</a>
                  <a href="#" class="btn btn-outline-danger">فاکتور</a>
                </div>
              </td>
            </tr>
            <tr>
              <td>10003</td>
              <td>25,000 تومان</td>
              <td>1400/01/01</td>
              <td><i class="far fa-question-circle me-1"></i>تحویل شده</td>
              <td>
                <div class="d-flex flex-row">
                  <a href="#" class="btn btn-outline-primary me-1">جزئیات</a>
                  <a href="#" class="btn btn-outline-danger">فاکتور</a>
                </div>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
          </div>

          <div class="tab-pane fade " id="nav-addresses" role="tabpanel" aria-labelledby="nav-addresses-tab">
            <div class="row g-3" style="ltr">
              
              <!-- map box -->
              <div class="col-md-6 border border-3 text-center bg-warning" style="height:27rem;">map here</div>
              <!-- map box -->

              <!-- address fields -->
              <div class="col-md-6 order-md-first">
                <form method="post" class="needs-validation" novalidate="">
                  <div class="row g-3">

                    <div class="col-12">
                      <label for="address" class="form-label">آدرس</label>
                      <input name="address" type="text" class="form-control" id="address" placeholder="" required="">
                    </div>

                    <div class="col-sm-6">
                      <label for="address-floor" class="form-label">طبقه</label>
                      <input name="floor" type="text" class="form-control" id="address-floor" placeholder="2" value="" required="">
                    </div>

                    <div class="col-sm-6">
                      <label for="address-unit" class="form-label">واحد</label>
                      <input name="unit" type="text" class="form-control" id="address-unit" placeholder="3" value="" required="">
                    </div>

                    <div class="col-sm-6">
                      <label for="address-postalcode" class="form-label">کد پستی</label>
                      <input name="postal_code" type="text" class="form-control" id="address-postalcode" placeholder="" value="" required="">
                    </div>

                    <div class="col-sm-6">
                      <label for="address-title" class="form-label">عنوان آدرس</label>
                      <input name="title" type="text" class="form-control" id="address-title" placeholder="خانه" value="" required="">
                    </div>

                    <div class="col-12">      
                      <label for="address-note" class="form-label">توضیحات<span class="text-muted">(اختیاری)</span></label>
                      <textarea name="description" class="form-control" id="address-note" rows="3" placeholder=""></textarea> 
                    </div>


                    <div class="d-flex flex-row justify-content-between">
                      <button name="addAddress" class="w-100 btn btn-primary mx-2" type="submit">ثبت آدرس</button>
                      <button name="cancelAddress" class="w-100 btn btn-outline-danger mx-2" type="submit">انصراف</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- address fields -->
              
              <hr class="my-4">

              <div class="container-fluid">

                <div class="row m-3">
                  <div class="col-12 col-md-10 col-lg-8 rounded bg-white p-3">
                    <div class="dflex flex-column">
                      <div class="d-flex flex-row align-items-center justify-content-between">
                        <strong>محل کار</strong>
                        <div class="d-flex flex-row my-2">
                          <a href="#" class="btn btn-outline-primary me-1">ویرایش</a>
                          <a href="#" class="btn btn-outline-danger">حذف</a>
                        </div>
                      </div>
                      <p>قائمشهر - خ تهران - جنب باشگاه تختی- مجتمع نیلو - طبقه 2 واحد 3</p>
                      <p>کد پستی: 4765444129</p>
                      <p>توضیحات: -</p>
                    </div>
                  </div>
                </div>
                <div class="row m-3">
                  <div class="col-12 col-md-10 col-lg-8 rounded bg-white p-3">
                    <div class="dflex flex-column">
                      <div class="d-flex flex-row align-items-center justify-content-between">
                        <strong>مادربزرگ</strong>
                        <div class="d-flex flex-row my-2">
                          <a href="#" class="btn btn-outline-primary me-1">ویرایش</a>
                          <a href="#" class="btn btn-outline-danger">حذف</a>
                        </div>
                      </div>
                      <p>قائمشهر - خ تهران - جنب باشگاه تختی- مجتمع نیلو - طبقه 2 واحد 3</p>
                      <p>کد پستی: 4765444129</p>
                      <p>توضیحات: -</p>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>


        </div>
        </div>
    

    
    </main>
    <!----------------------------- personal info + ordrs + addresses + receipts ------------------------------------>


    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- slick carousel needed files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
    <!-- slick carousel script TEMPORARY -->
    <script type="text/javascript">
        $(document).ready(function(){
          $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });
                  });
      </script>
  </body>
</html>