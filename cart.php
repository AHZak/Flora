<?php 
  //page controller
  $pageUi='cart';
  include_once 'config.php';
?>
<?php include 'commonheader.php'; ?>
    <!----------------------------- cart items + summary ------------------------------------>
    <main>
      <!-- heading -->
      <div class="container ms-0">
        <div class="row p-3">
          <div class="col-md-12 border-bottom border-3">
            <div class="d-flex flex-row align-items-center mb-1">
              <i class="fas fa-shopping-cart cart-cart me-2"></i><p class="h4">سبد خرید</p>
            </div>
          </div>
        </div>
      </div>
      <!-- heading -->

      <!-- cart items -->
      <div class="container" style="min-height:50vh">
      <?php if(isset($productsId) && $productsId): ?>
          <?php foreach($productsId as $productId):
              //product object
              $product=new Product($productId);
              $number=$_SESSION['cart']['number'][$product->getId()];

          ?>
            <!-- Item in cart -->
            <div id="delcart_<?php echo $product->getId(); ?>" class="col-12 col-md-10 p-2 my-3 rounded" style="background-color: antiquewhite;">
              <div class="d-flex flex-row align-items-center flex-start">
                <div class="p-2 me-3">
                  <img src="<?php echo $product->getImage(); ?>" style="height: 9rem;" alt="" class="img-thumbnail">
                </div>    
                <div class="d-flex flex-column mt-2 align-self-start justify-content-between" style="height: 9rem">
                  <p class="h5 mb-4"><?php echo $product->getTitle(); ?></p>
                  <div class="d-flex flex-row align-items-center">
                    <p class="m-0">تعداد:</p>
                    <input id="<?php echo $product->getId();?>_number" type="text" class="form-control mx-1 ms-2" id="exampleInputEmail1" aria-describedby="emailHelp" size="3" value="<?php echo $number; ?>">
                    <button onclick="updateNumberOfCart(<?php echo $product->getId(); ?>,'increase',<?php echo $product->getInstock(); ?>)" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-plus"></i></button>
                    <button onclick="updateNumberOfCart(<?php echo $product->getId(); ?>,'decrease',<?php echo $product->getInstock(); ?>)" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-minus"></i></button>
                  </div>
                  <a href="#" style="text-decoration: none; color: currentColor;">
                  <div class="d-flex flex-row align-items-center">
                  <i class="fas fa-trash-alt me-2"></i>
                  <p onclick="deleteFromCart(<?php echo $product->getId();?>)" class="m-0">حذف از سبد خرید</p>
                  </div>
                  </a>
                </div>
                <div class="ms-auto align-self-end rounded p-2 text-nowrap" style="background-color: coral;">
                <script>
                  $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{productid:<?php echo $product->getId(); ?>,number:<?php echo $_SESSION['cart']['number'][$product->getId()]; ?>},function(response){
                    var response=JSON.parse(response);
                    $("#<?php echo $product->getId(); ?>_orgprice").text(response['orgprice']+" تومان");
                    $("#fullsum").text(response['fullsum']+" تومان");
                    $("#<?php echo $product->getId(); ?>_sumprice").text(response['sumprice']+" تومان");
                  });
                </script>
                <?php if($product->getDiscount()>0): ?>
                  <span id="<?php echo $product->getId(); ?>_orgprice" class="text-muted text-decoration-line-through"><?php echo number_format($_SESSION['cart']['orgprice'][$product->getId()]);?></span><span class="badge bg-primary ms-2"><?php echo $product->getDiscount(); ?>%</span>
                  <div class="d-flex flex-row">
                    <p  class="me-3">قیمت:</p>
                    <p id="<?php echo $product->getId();?>_sumprice" ></p>
                  </div>
                <?php else: ?>
                  <div class="d-flex flex-row">
                    <p class="me-3 mb-0">قیمت:</p>
                    <p class="mb-0" id="<?php echo $product->getId();?>_sumprice"><?php echo number_format($_SESSION['cart']['sumprice'][$product->getId()]); ?> تومان</p>
                  </div>
                <?php endif; ?>
                </div>
              </div>
            </div>
            <!-- Item in cart -->
          <?php endforeach; ?>
      <?php else: ?>
          <p>سبد خالی است</p>
      <?php endif; ?>

        
      </div>
      <!-- cart items -->

      <!-- summary -->
      <div class="container-fluid" style="background-color:antiquewhite;">
        <div class="col-md-12">
          <div class="d-flex flex-row justify-content-between p-3">
            <div>
              <p class="border-bottom border-3 border-dark">جمع قیمت کالاها</p>
              <p id="fullsum"><?php echo isset($_SESSION['cart']['fullsum']) ? number_format($_SESSION['cart']['fullsum']) : 0;?> تومان</p>
            </div>
            <div class="align-self-end">
              <a href="checkout.php" class="btn btn-primary">ادامه خرید</a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
  
    </main>
    <!----------------------------- cart items + summary ------------------------------------>
    <?php include 'commonfooter.php'; ?>

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="assets/js/cart.js"></script>
   
  </body>
</html>