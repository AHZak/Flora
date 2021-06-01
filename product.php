<?php 
  //page controller
  $pageUi='product';
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
    
    
    

    

    <title>فلورا - نام محصول</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/product.css">
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
                <a href="index.php"><img src="assets/images/logo/flora.png" alt="" width="200px"></a>
              </div>
              <div class="d-flex align-items-center">
              <button class="btn btn-outline-dark rounded-pill me-2">وارد شوید<i class="fas fa-user ms-1"></i></button> 
              </a> <i class="me-2">|</i>
              <a href="cart.php"><i class="fas fa-shopping-cart cart-cart"></i></a>
              
              </div>
            </div>

          </div>
          <!----------------------------- first header ------------------------------------>

          <!----------------------------- second header ------------------------------------>
          <div class="row" style="background-color: coral;">
            <div class="p-3">categories</div>
          </div>
          <!----------------------------- second header ------------------------------------>

        </div>
    
    </header>
    <!----------------------------- headers ------------------------------------>
    <!----------------------------- product details + similar products ------------------------------------>
    <main>

    <!-- category mapping -->
    <div class="container-fluid">
      <div class="row bg-warning" >
        <div class="p-3">category mapping</div>
      </div>
      </div>
    <!-- category mapping -->

    <!-- product -->
      <div class="container bg-light mt-3">
        <?php if(isset($product) && $product): ?>
            <div class="row justify-content-center">

              <!-- image -->
              <div class="col-md p-3">
                <img src="<?php echo $product->getImage(); ?>" height="200" width="200" class="rounded mx-auto d-block" alt="">
              </div>
              <!-- image -->

              <!-- name + description -->
              <div class="col-md p-3">
                <div class="d-flex flex-column align-items-start">
                  <p class="h5 mb-5"><?php echo $product->getTitle(); ?></p>
                  <p>توضیحات:</p>
                  <p><?php echo $product->getDescription(); ?></p>
                </div>
              </div>
              <!-- name + description -->

              <!-- price card -->
              <div class="col-auto p-3">
                <div class="p-5 price-card d-flex flex-column shadow">
                  <div class="d-flex flex-row">
                    <p class="me-3">قیمت:</p>
                    <p><?php echo number_format($product->getPrice()); ?> تومان</p>
                  </div>
                  <div class="d-flex flex-row mb-3 align-items-center">
                    <p class="me-3 mb-0">تعداد:</p>
                    <div class="input-group spinner">
                      <button class="btn btn-primary btn-2" type="button"><i class="fas fa-plus"></i></button>
                      <button class="btn btn-danger btn-1" type="button"><i class="fas fa-minus"></i></button>
                      <input id="a" type="text" class="form-control" value="1" min="1" max="10" step="1" size="2">  
                    </div>
                  </div>
                  <div class="align-self-center mt-3">
                    <button onclick="addToCart(<?php echo $product->getId(); ?>)" class="btn btn-primary">افزودن به سبد خرید<i class="fas fa-cart-plus ms-2"></i></button>
                  </div>
                </div>
              </div>
              <!-- price card -->

            </div>
        <?php else: ?>
            <p>محصول پیدا نشد</p>
        <?php endif; ?>
      </div>
    <!-- product -->
    
    
      <!-- similar products -->
      <div class="container p-3" >

        <!-- header -->
        <?php if(isset($product) && $product && $product->getCategory()->getProducts("instock>0") ): ?>

            <div class="row p-3 border-bottom border-secondary border-3">
              <div class="col-md-10">
                <p class="h5">محصولات مشابه</p>
              </div>

            </div>
            <!-- header -->

            <!-- slider -->
            <div class="row slider" style="direction: ltr">
                <?php foreach($product->getCategory()->getProducts("instock>0") as $product): ?>
                
                    <a href="<?php echo "?pid=".$product['id']."&slug=".$product['title']; ?>" class="text-decoration-none" style="color:currentcolor;">
                      <div class="col-md-12 p-3">
                        <div class="card product-sliding-item">
                          <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="<?php echo $product['image_alt'] ?>">
                          <div class="card-body p-1">
                            <p class="card-title text-center mb-3" style="font-weight:bold;"><?php echo $product['title'] ?></p>
                            <div class="d-flex" style="color: coral;">
                              <p class="ms-1 m-0">تومان</p>
                              <p class="m-0"><?php echo number_format($product['price']); ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <!-- slider -->

                <?php endforeach; ?>
            </div>

        <?php endif; ?>

      </div>
      <!-- similar products -->
    
    </main>
    <!----------------------------- product details + similar products ------------------------------------>

    <!-- footer -->
    <footer>
      <div class="container-fluid">
      <div class="row" style="background-color: grey;">
        <div class="col-md-12">footer</div>
      </div>
      </div>
      
    </footer>
    <!-- footer -->

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- slick carousel needed files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
    <script src="assets/js/cart.js"></script>
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
      <script>
        (function ($) {
  $('.spinner .btn-1').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });
  $('.spinner .btn-2').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
})(jQuery);

(function ($) {
  $('.spinner2 .btn-3').on('click', function() {
    $('.spinner2 input').val( parseInt($('.spinner2 input').val(), 10) - 1);
  });
  $('.spinner2 .btn-4').on('click', function() {
    $('.spinner2 input').val( parseInt($('.spinner2 input').val(), 10) + 1);
  });
})(jQuery);

(function ($) {
       $("#submit").on("click", function(){
        var a = parseInt($('.spinner input').val());
        var b = parseInt($('.spinner2 input').val());
        var sum = a + b;
        $('#sum').val(sum);
         
    })
})(jQuery);
      </script>
  </body>
</html>