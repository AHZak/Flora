<?php

include_once '../config.php';

//AUTH
if(isAdmin() || isMaster()){
  include 'adminheader.php';

?>

    <div class="container-fluid">
    <div class="row">

    <?php
    include 'adminsidebar.php';

    ?>

      <!----------------------------- left panel --------------------------->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container p-3">
        <div class="row align-items-center">
              <div class="col-10 col-md-7 col-lg-4 col-xl-3 my-2 bg-info rounded p-4 ms-3">
                <div class="d-flex flex-column align-items-start border-bottom border-3">
                  <P class="fw-bolder"><i class="fas fa-users me-2"></i>تعداد کاربران : <span><?php echo User::getCount(); ?></span></P>
                  <P class="fw-bolder"><i class="fas fa-cart-arrow-down me-2"></i>تعداد کل سفارشات : <span><?php echo Order::getCount(); ?></span></P>
                  <P class="fw-bolder"><i class="fas fa-shopping-bag me-2"></i>تعداد محصولات : <span><?php echo Product::getCount(); ?></span></P>
                  <P class="fw-bolder"><i class="fas fa-archive me-2"></i>تعداد کل دسته بندی ها : <span><?php echo Category::getCount(); ?></span></P>
                </div>
              </div>
        </div>

        <hr class="my-3 border-bottom border-3 border-dark">
          <div class="row row-cols-1 row-cols-md-3 text-center align-items-center">
            <!----------------------------- cards --------------------------->
              
              <a href="http://localhost/flora/admin/addproduct.php"><div class="col my-2"><img src="../assets/images/add-product.jpg" alt="" class="w-100 img-fluid rounded"></div></a>
              <a href="http://localhost/flora/admin/orders.php"><div class="col my-2"><img src="../assets/images/orders.jpg" alt="" class="w-100 img-fluid rounded"></div></a>

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
<?php }else {
  echo "Access Denied!";
} ?>