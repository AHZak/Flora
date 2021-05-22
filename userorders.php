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

    <!----------------------------- ordrs ------------------------------------>
    <main>
        <div class="p-3">
          <nav>
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
              <a href="userprofile.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-user me-1"></i>اطلاعات شخصی</button></a>
              <a href="userorders.php" class="text-decoration-none"><button class="nav-link active" aria-selected="true"><i class="fas fa-box-open me-1"></i>سفارسشات من</button></a>
              <a href="useraddress.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-map-signs me-1"></i>آدرس های من</button></a>
            </div>
          </nav>
            <div class="tab-content" id="nav-tabContent">
        
                <div class="tab-pane fade active show" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
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
            </div>
        </div>
    </main>
    <!----------------------------- ordrs ------------------------------------>


    


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