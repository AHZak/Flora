<?php
    $pageUi='checkout';
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

    <!----------------------------- address + shipping + sum + payment ------------------------------------>
    <main>
      <div class="container bg-light shadow g-3 my-3 rounded">
        <!-- address selection -->
          <form method='post'>
            <div class=" p-3">
              <p class="h5">یک آدرس انتخاب کنید</p>
            </div>
            <div class="d-flex flex-column justify-content-start">
            <?php if($addresses): ?>
                <?php foreach($addresses as $address):?>
                      <!-- address item -->
                      <div class="">
                        <div class="row m-3">
                          <div class="form-check">
                            <input class="form-check-input" value="<?php echo $address['id']; ?>" type="radio" name="address-item" id="address-<?php echo $address['id'] ?>">
                            <label class="form-check-label" for="address-<?php echo $address['id'] ?>">
                              <strong><?php echo $address['title']; ?></strong>
                            </label>
                          </div>
                          <hr class="my-2">
                        </div>
                      </div>
                      <!-- address item -->
                <?php endforeach; ?>
            <?php else: ?>
                <p>آدرسی پیدا نشد.لطفا یک آدرس اضافه کنید</p>
            <?php endif; ?>

              <hr class="my-2">
              <!-- add address -->
              <a href="useraddress.php" class="text-decoration-none">
              <div>
              <i class="fas fa-plus me-1 ms-2"></i> افزودن آدرس جدید
              </div>
              </a>
              <!-- add address -->

            </div>
            <!-- address selection -->

            <hr class="my-3">

            <!-- shipping -->
            <div class="row">
              <div class="p-3 border-bottom border-3 mb-2">
                <p class="h5">شیوه ارسال</p>
              </div>
              <div class="p-3">
                <?php if($shippings):?>
                  <?php foreach($shippings as $shipping): ?>
                    <div class="form-check my-1">
                      <input onclick="postalPrice(<?php echo $_SESSION['cart']['fullsum']; ?>,<?php echo MAX_PRICE; ?>,'<?php echo number_format(FAST_POSTAL_PRICE); ?>','<?php echo number_format(POSTAL_PRICE); ?>','<?php echo $shipping['id'] ?>','<?php echo number_format($_SESSION['cart']['fullsum']+FAST_POSTAL_PRICE); ?>','<?php echo number_format($_SESSION['cart']['fullsum']+POSTAL_PRICE); ?>')" class="form-check-input" type="radio" <?php if($shipping['status']=='disable'){ echo "disabled";} ?> name="shipping" value="<?php echo $shipping['id'] ?>" id="ship-<?php echo $shipping['id'] ?>">
                      <label class="form-check-label" for="ship-<?php echo $shipping['id'] ?>">
                      <p><?php echo $shipping['shipping_type'] ?></p>
                      </label>
                    </div>
                  <?php endforeach; ?>
                <?php else:?>
                  <p>روش پرداختی وجود ندارد</p>
                <?php endif;?>

              </div>
            </div>
            <!-- shipping -->

            <hr class="my-3">

            <!-- payment --> 
            <div class="row">
              <div class="p-3 border-bottom border-3 mb-2">
                <p class="h5">شیوه پرداخت</p>
              </div>
              <div class="p-3">
              <?php if($payment_methods):?>
                <?php foreach($payment_methods as $payment_method): ?>
                  <div class="form-check my-1">
                    <input class="form-check-input" <?php if($payment_method['status']=='disable'){ echo "disabled";} ?> type="radio" value="<?php echo $payment_method['id'] ?>" name="payment" id="pay-<?php echo $payment_method['id'] ?>">
                    <label class="form-check-label" for="pay-<?php echo $payment_method['id'] ?>">
                      <p><?php echo $payment_method['name'] ?></p>
                    </label>
                  </div>
                <?php endforeach; ?>
              <?php else:?>
                <p>روش پرداختی وجود ندارد</p>
              <?php endif;?>

              </div>
            </div>
            <!-- payment -->
            <hr class="my-3">

            <!-- payment -->
            <div class="row">
              <div class="p-3 border-bottom border-3 mb-2">
                <p class="h5">پرداخت نهایی</p>
              </div>
              <div class="dflex flex-column p-3 pb-0">
                <p>مبلغ کل سفارش: <span><?php echo number_format($_SESSION['cart']['fullsum']); ?> تومان</span></p>
                <p>هزینه ارسال: <span id="postal_price"><?php if($postal_price==0){ echo 'رایگان'; }else{ echo number_format($postal_price).' تومان'; } ?></span></p>
                <p>مبلغ قابل پرداحت: <span id="full_sum_price"><?php echo number_format($sum_all_price); ?> تومان</span></p>
              </div>
            </div>
            <!-- payment -->

            <hr class="my-3">

            <!-- order button -->
            <div class="text-center pb-3">
              <button name="pay" class="btn btn-primary">ثبت سفارش</button>
            </div>
            <!-- order button -->

        </form>
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


        function postalPrice(fullsum,max_price,fast_price,normal_price,shipping_id,full_fast_price,full_normal_price){
          
          if(fullsum>max_price){
            $("#postal_price").text("رایگان");
          }else if(shipping_id=='1'){
            $("#postal_price").text(fast_price);
            $("#full_sum_price").text(full_fast_price)
          }else{
            $("#postal_price").text(normal_price);
            $("#full_sum_price").text(full_normal_price)
          }
        }
      </script>
  </body>
</html>