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

    <!----------------------------- address + shipping + sum + payment ------------------------------------>
    <main>
      <div class="container bg-light shadow g-3 my-3 rounded">
        <!-- address selection -->
        <div class=" p-3">
          <p class="h5">یک آدرس انتخاب کنید</p>
        </div>
        <div class="d-flex flex-column justify-content-start">

          <!-- address item -->
          <div class="">
            <div class="row m-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  <strong>خانه</strong>
                </label>
              </div>
              <hr class="my-2">
              
              <div class="col-12 col-md-10 col-lg-8 rounded  p-3 pb-0">
                <div class="dflex flex-column">
                  <p>قائمشهر - خ تهران - جنب باشگاه تختی- مجتمع نیلو - طبقه 2 واحد 3</p>
                  <p>کد پستی: 4765444129</p>
                  <p class="mb-0">توضیحات: -</p>
                </div>
              </div>
          
            </div>
          </div>
          <!-- address item -->

          <!-- address item -->
          <div class="">
            <div class="row m-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  <strong>مادربزرگ</strong>
                </label>
              </div>
              <hr class="my-2">
              
              <div class="col-12 col-md-10 col-lg-8 rounded  p-3 pb-0">
                <div class="dflex flex-column">
                  <p>قائمشهر - خیابان ساری</p>
                  <p>کد پستی: 4765444129</p>
                  <p class="mb-0">توضیحات: -</p>
                </div>
              </div>
          
            </div>
          </div>
          <!-- address item -->
          <hr class="my-2">
          <!-- add address -->
          <a href="#" class="text-decoration-none">
          <div>
           <i class="fas fa-plus me-1 ms-2"></i> افزودن آدرس جدید
          </div>
          </a>
          <!-- add address -->

        </div>
        <!-- address selection -->

        <div>c</div>
      </div>
    </main>
    <!----------------------------- address + shipping + sum + payment ------------------------------------>


    


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