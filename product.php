<?php 
  //page controller
  $pageUi='product';
  include_once 'config.php';
?>
<!-- common header -->
<?php include 'commonheader.php'; ?>
<!-- common header -->

    <!----------------------------- product details + similar products ------------------------------------>
    <main id="productpage">
    <!-- this id is not being used yet -->

    <!-- category mapping 
    <div class="container-fluid">
      <div class="row bg-warning p-2" >
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">دسته اصلی</a></li>
    <li class="breadcrumb-item"><a href="#">زیر دسته</a></li>
    <li class="breadcrumb-item active" aria-current="page">اسم محصول</li>
  </ol>
</nav>
      </div>
      </div>
    category mapping -->


    <!-- product -->
      <div class="container bg-light mt-3">
        <?php if(isset($product) && $product): ?>
            <div class="row justify-content-center rounded" id="product-container">

              <!-- image -->
              <div class="col-md p-3">
                <img src="<?php echo $product->getImage(); ?>" height="200" width="200" class="rounded mx-auto d-block" alt="">
              </div>
              <!-- image -->

              <!-- name + description -->
              <div class="col-md p-3">
                <div class="d-flex flex-column align-items-start border-bottom border-3 border-dark">
                  <p class="h5 mb-5 border-bottom border-3 border-dark"><?php echo $product->getTitle(); ?></p>
                  <p>توضیحات:</p>
                  <p class="product-text"><?php echo $product->getDescription(); ?></p>
                </div>
              </div>
              <!-- name + description -->

              <!-- price card -->
              <div class="col-auto p-3">
                <div class="p-5 price-card d-flex flex-column shadow">
                <?php if($product->getInstock()==0): ?>
                  <p>ناموجود</p>
                <?php elseif($product->getDiscount()>0): $price=getPriceAfterOff($product->getPrice(),$product->getDiscount()); ?>
                  <p class="text-decoration-line-through"><?php echo number_format($product->getPrice()); ?><span class="badge bg-primary ms-2"><?php echo $product->getDiscount(); ?>%</span></p>
                  <div class="d-flex flex-row">
                    <p class="me-3">قیمت:</p>
                    <p><?php echo number_format($price); ?> تومان</p>
                  </div>

                <?php else: ?>
                  <div class="d-flex flex-row">
                    <p class="me-3">قیمت:</p>
                    <p><?php echo number_format($product->getPrice()); ?> تومان</p>
                  </div>
                <?php endif; ?>

                  <div class="d-flex flex-row mb-3 align-items-center">
                    <p class="me-3 mb-0">تعداد:</p>
                    <div class="input-group spinner">
                      <input  id="<?php echo $product->getId(); ?>_number" type="text" class="form-control" size="2" value="<?php if($product->getInstock()==0){ echo 0; }else{ echo 1; } ?>">  
                      <button onclick="controllStockRange(<?php echo $product->getId(); ?>,<?php echo $product->getInstock(); ?>,'increase')" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-plus"></i></button>
                      <button onclick="controllStockRange(<?php echo $product->getId(); ?>,<?php echo $product->getInstock(); ?>,'decrease')" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-minus"></i></button>
                      
                    </div>
                  </div>
                  <div class="align-self-center mt-3">
                    <button <?php if($product->getInstock()==0){ echo 'disabled'; } ?> onclick="addToCart(<?php echo $product->getId(); ?>)" class="btn btn-primary">افزودن به سبد خرید<i class="fas fa-cart-plus ms-2"></i></button>
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

            <div class="row p-3 border-bottom border-coral border-3">
              <div class="col-md-10">
                <p class="h5">محصولات مشابه</p>
              </div>

            </div>
            <!-- header -->

            <!-- slider -->
            <div class="row justify-content-center my-2" style="direction: ltr">
            <div class="col-10 col-md-12 slider">
                    <?php foreach($product->getCategory()->getProducts("instock>0") as $product): ?>
                
                    <a href="<?php echo "?pid=".$product['id']."&slug=".$product['title']; ?>" class="text-decoration-none" style="color:currentcolor;">
                      <div class="col-12 p-2">
                        <div class="card shadow">
                          <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="<?php echo $product['image_alt'] ?>">
                          <div class="card-body p-1">
                            <p class="card-title text-center mb-3" style=""><?php echo $product['title'] ?></p>
                            <?php if($product['discount']>0): $price=getPriceAfterOff($product['price'],$product['discount']);?>
                                  <p class="m-0 text-decoration-line-through"><?php echo number_format($product['price']); ?><span class="badge bg-primary"> <?php echo $product['discount']; ?>%</span></p>

                                  <div class="d-flex" style="color: coral;">
                                    <p class="ms-1 m-0">تومان</p>
                                    <p class="m-0"><?php echo number_format($price); ?></p>
                                  </div>

                              <?php else: $price=$product['price']; ?>
                                <div class="d-flex" style="color: coral;">
                                  <p class="ms-1 m-0">تومان</p>
                                  <p class="m-0"><?php echo number_format($price); ?></p>
                                </div>
                              <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </a>
                    <!-- slider -->

                <?php endforeach; ?>
            </div>
              </div>
        <?php endif; ?>

      </div>
      <!-- similar products -->
    
    </main>
    <!----------------------------- product details + similar products ------------------------------------>

    <!-- common footer -->
    <?php include 'commonfooter.php'; ?>
    <!-- common footer -->

    


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
                  slidesToShow: 2,
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