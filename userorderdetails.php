<?php
$pageUi="orderdetail";
include_once 'config.php';

?>
<!-- user profile common header -->
<?php include 'upcommonheader.php'; ?>
<!-- user profile common header -->

    <div class="container-fluid">
    <div class="row">


      <main class="col-md-9 m-auto col-lg-10 px-md-4 my-3">
        <div class="container">
          <div class="row">
            <div class="col-12 p-3 pb-1 border-bottom border-3 border-dark d-flex flex-row align-items-center">
              <div>
                <strong class="me-2">جزئیات سفارش: </strong>
                <strong>#<?php echo $order->getCode(); ?></strong>
              </div>
              <div class="ms-auto">
                <a href="userorders.php" class="text-decoration-none">
                  <strong>بازگشت به سفارشات</strong>
                  <i class="fas fa-long-arrow-alt-left ms-1"></i>
                </a>
              </div>
            </div>
          </div>
          
          <div class="row my-3 border-bottom border-2">
            <div class="col-6 my-2">
              <strong>مبلغ سفارش:</strong>
              <span><?php echo number_format($order->getSumPrice()); ?> تومان</span>
            </div>
            <div class="col-6 my-2">
              <strong>تاریخ سفارش:</strong>
              <span>
                  <?php 
                      $timestampDate=convertTimeStamp($order->getCreatedAt())['date'];
                      echo timestampToJalaliDate($timestampDate);
                  ?>
              </span>
            </div>
            <div class="col-6 my-2">
              <strong>شیوه پرداخت:</strong>
              <span>پرداخت در محل</span>
            </div>
            <div class="col-6 my-2">
              <strong>شیوه ارسال:</strong>
              <span><?php echo $shipping->getType(); ?></span>
            </div>
          </div>
          <div class="row my-3 border-bottom border-2">
            <div class="col-12 my-2">
              <strong>آدرس:</strong>
              <span><?php echo $address->getAddress(); ?></span>
            </div>
            <div class="col-6 my-2">
              <strong>کد پستی:</strong>
              <span><?php echo $address->getPostalCode(); ?></span>
            </div>
            <div class="col-12 my-2">
              <strong>هزینه ارسال:</strong>
              <span><?php if($order->getPostalPrice()>0){ echo number_format($order->getPostalPrice()).' تومان'; }else{ echo 'رایگان'; } ?></span>
            </div>
          </div>

          <div class="container p-0">
          <?php if($ordersDetail): ?>
              <?php foreach($ordersDetail as $orderDetail):

                $orderDetailObj=new OrderDetail($orderDetail['id']);
                
                $product=new Product($orderDetail['product_id']);
              ?>
                  <!-- Item in cart -->
                  <div id="delcart_13" class="col-12 col-md-10 p-2 my-3 shadow rounded" style="background-color: antiquewhite;">
                    <div class="d-flex flex-row align-items-center flex-start">
                      <div class="col-2 me-3">
                        <a href="product.php?pid=<?php echo $product->getId(); ?>&slug=<?php echo $product->getTitle(); ?>"><img src="<?php echo $product->getImage(); ?>" style="width: 150px;" alt="" class="img-fluid rounded"></a>
                      </div>    
                      <div class="d-flex flex-column mt-2 align-self-start justify-content-start" style="height: 9rem">
                        <a href="product.php?pid=<?php echo $product->getId(); ?>&slug=<?php echo $product->getTitle(); ?>" class="text-decoration-none" style="color: currentColor;"><p class="fw-bold border-bottom border-2 border-dark mb-4"><?php echo $product->getTitle(); ?></p></a>
                        <div class="d-flex flex-row align-items-center">
                          <p class="m-0 me-2">تعداد:</p>
                          <strong><?php echo $orderDetailObj->getQuantity(); ?></strong>
                        </div>
                      </div>
                      <div class="ms-auto align-self-end">
                        <strong>قیمت هر واحد</strong>
                        <div class=" rounded p-2 text-nowrap mt-2" style="background-color: coral">
                          <p id="13_sumprice" class="m-0"><?php echo number_format($orderDetailObj->getOrderedPrice()); ?> تومان</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Item in cart -->
              <?php endforeach;?>
          <?php else: ?>
          <p>محصولی یافت نشد</p>
          <?php endif; ?>          
        
        </div>
          
        </div>
      </main>
    </div>
  </div>

  

      
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <!--JQuery cdn -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="../assets/js/extra.js"></script>   
    </body>
  </html>

  <!-- adding this line of code to test rebase -->
