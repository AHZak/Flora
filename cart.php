<?php 
  //page controller
  $pageUi='cart';
  include_once 'config.php';
?>
<!-- common header -->
<?php include 'commonheader.php'; ?>
<!-- common header -->

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
            <div id="delcart_<?php echo $product->getId(); ?>" class="col-12 col-md-10 p-2 my-3 rounded shadow" style="background-color: antiquewhite;">
              <div class="d-flex flex-row align-items-center flex-start">
                <div class="col-2 me-3">
                  <a href="product.php?pid=<?php echo $product->getId()."&slug=".$product->getTitle(); ?>" class="text-decoration-none cart-item"><img src="<?php echo $product->getImage(); ?>" style="width: 150px" alt="" class="img-fluid rounded"></a>
                </div>    
                <div class="d-flex flex-column mt-2 align-self-start justify-content-between" style="height: 9rem">
                <a href="product.php?pid=<?php echo $product->getId()."&slug=".$product->getTitle(); ?>" class="text-decoration-none cart-item"><p class="fw-bold border-bottom border-2 border-dark mb-4"><?php echo $product->getTitle(); ?></p></a>
                  
                  <a href="#" style="text-decoration: none; color: currentColor;">
                  <i onclick="deleteFromCart(<?php echo $product->getId();?>)" class="fas fa-trash-alt me-2"></i>
                  </a>
                </div>
              <div class="ms-auto">

                  <div class="d-flex flex-row align-items-center my-3">
                      <p class="m-0">تعداد:</p>
                      <input id="<?php echo $product->getId();?>_number" type="text" class="form-control mx-1 ms-2" id="exampleInputEmail1" aria-describedby="emailHelp" size="3" value="<?php echo $number; ?>">

                      <button onclick="updateNumberOfCart(<?php echo $product->getId(); ?>,'increase',<?php echo $product->getInstock(); ?>)" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-plus"></i></button>
                      <button onclick="updateNumberOfCart(<?php echo $product->getId(); ?>,'decrease',<?php echo $product->getInstock(); ?>)" class="btn p-1 buy-quantity-btn" type="button"><i class="fas fa-minus"></i></button>

                  </div>
                
                <div class="ms-auto align-self-end rounded p-2 text-nowrap" >
                  <script>
                    $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{productid:<?php echo $product->getId(); ?>,number:<?php echo $_SESSION['cart']['number'][$product->getId()]; ?>},function(response){
                      var response=JSON.parse(response);
                      $("#<?php echo $product->getId(); ?>_orgprice").text(response['orgprice']+" تومان");
                      $("#fullsum").text(response['fullsum']+" تومان");
                      $("#<?php echo $product->getId(); ?>_sumprice").text(response['sumprice']+" تومان");
                    });
                  </script>
                  <?php if($product->getDiscount()>0): ?>
                    <div class="d-flex flex-row justify-content-end">
                    <span id="<?php echo $product->getId(); ?>_orgprice" class="text-muted text-decoration-line-through"><?php echo number_format($_SESSION['cart']['orgprice'][$product->getId()]);?></span><span class="badge bg-primary ms-2"><?php echo $product->getDiscount(); ?>%</span>
                    </div>
                    <div class="d-flex flex-row justify-content-end my-1">
                      <p id="<?php echo $product->getId();?>_sumprice" class="rounded p-2 mb-0 bg-warning"></p>
                    </div>
                  <?php else: ?>
                  <div class="d-flex flex-row justify-content-end">
                    <p class="mb-0 rounded p-2" style="background-color:coral;" id="<?php echo $product->getId();?>_sumprice"><?php echo number_format($_SESSION['cart']['sumprice'][$product->getId()]); ?> تومان</p>
                  </div>
                  <?php endif; ?>
                </div>
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
              <a href="checkout.php" class="btn <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']['products'])>0){ echo 'btn-primary'; }else{ echo 'btn-primary disabled'; } ?> ">ادامه خرید</a>
            </div>
          </div>
        </div>
      </div>
      <!-- summary -->
    </main>
    <!----------------------------- cart items + summary ------------------------------------>
    
    <!-- common footer -->
    <?php include 'commonfooter.php'; ?>
    <!-- common footer -->

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="assets/js/cart.js"></script>
   
  </body>
</html>