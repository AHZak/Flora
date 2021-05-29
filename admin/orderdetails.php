<?php

include_once '../config.php';

//AUTH
if(isAdmin() || isMaster()){

  include 'adminheader.php';

?>

    <div class="container-fluid">
    <div class="row">

    <?php
    include 'adminsidebar.php'

    ?>

      <!----------------------------- left panel --------------------------->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container">
          <div class="row">
            <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
              <div>
                <strong class="me-2">جزئیات سفارش: </strong>
                <strong>#11367</strong>
              </div>
              <div class="ms-auto">
                <a href="orders.php" class="text-decoration-none">
                  <strong>بازگشت به سفارشات</strong>
                  <i class="fas fa-long-arrow-alt-left ms-1"></i>
                </a>
              </div>
            </div>
          </div>
          
          <div class="row my-3 border-bottom border-2">
            <div class="col-6 my-2">
              <strong>مبلغ سفارش:</strong>
              <span>335,000 تومان</span>
            </div>
            <div class="col-6 my-2">
              <strong>تاریخ سفارش:</strong>
              <span>1400/4/4</span>
            </div>
            <div class="col-6 my-2">
              <strong>شیوه پرداخت:</strong>
              <span>آنلاین</span>
            </div>
            <div class="col-6 my-2">
              <strong>شیوه ارسال:</strong>
              <span>ارسال فوری</span>
            </div>
          </div>
          <div class="row my-3 border-bottom border-2">
            <div class="col-6 my-2">
              <strong>سفارش دهنده:</strong>
              <span>علی گرایلی</span>
            </div>
            <div class="col-12 my-2">
              <strong>آدرس:</strong>
              <span>مازندران - قائمشهر - خ بابل</span>
            </div>
            <div class="col-6 my-2">
              <strong>کد پستی:</strong>
              <span>476555542</span>
            </div>
            <div class="col-12 my-2">
              <strong>هزینه ارسال:</strong>
              <span>23,000 تومان</span>
            </div>
          </div>

          <div class="container">
            <!-- Item in cart -->
            <div id="delcart_13" class="col-12 col-md-10 p-2 my-3 rounded" style="background-color:#ffcdda;">
              <div class="d-flex flex-row align-items-center flex-start">
                <div class="p-2 me-3">
                  <img src="../../flora/upload/images/product-sample-purple.jpg" style="height: 9rem;" alt="" class="img-thumbnail">
                </div>    
                <div class="d-flex flex-column mt-2 align-self-start justify-content-start" style="height: 9rem">
                  <p class="h5 mb-4">کالاتیا</p>
                  <div class="d-flex flex-row align-items-center">
                    <p class="m-0 me-2">تعداد:</p>
                    <strong>4</strong>
                  </div>
                </div>
                <div class="ms-auto align-self-end">
                  <strong>قیمت هر واحد</strong>
                  <div class=" rounded bg-info p-2 text-nowrap mt-2">
                    <p id="13_sumprice" class="m-0">55,000 تومان</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Item in cart -->
            <!-- Item in cart -->
            <div id="delcart_13" class="col-12 col-md-10 p-2 my-3 rounded" style="background-color:#ffcdda;">
              <div class="d-flex flex-row align-items-center flex-start">
                <div class="p-2 me-3">
                  <img src="../../flora/upload/images/product-sample-purple.jpg" style="height: 9rem;" alt="" class="img-thumbnail">
                </div>    
                <div class="d-flex flex-column mt-2 align-self-start justify-content-start" style="height: 9rem">
                  <p class="h5 mb-4">کالاتیا</p>
                  <div class="d-flex flex-row align-items-center">
                    <p class="m-0 me-2">تعداد:</p>
                    <strong>4</strong>
                  </div>
                </div>
                <div class="ms-auto align-self-end">
                  <strong>قیمت هر واحد</strong>
                  <div class=" rounded bg-info p-2 text-nowrap mt-2">
                    <p id="13_sumprice" class="m-0">55,000 تومان</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Item in cart -->
            <!-- Item in cart -->
            <div id="delcart_13" class="col-12 col-md-10 p-2 my-3 rounded" style="background-color:#ffcdda;">
              <div class="d-flex flex-row align-items-center flex-start">
                <div class="p-2 me-3">
                  <img src="../../flora/upload/images/product-sample-purple.jpg" style="height: 9rem;" alt="" class="img-thumbnail">
                </div>    
                <div class="d-flex flex-column mt-2 align-self-start justify-content-start" style="height: 9rem">
                  <p class="h5 mb-4">کالاتیا</p>
                  <div class="d-flex flex-row align-items-center">
                    <p class="m-0 me-2">تعداد:</p>
                    <strong>4</strong>
                  </div>
                </div>
                <div class="ms-auto align-self-end">
                  <strong>قیمت هر واحد</strong>
                  <div class=" rounded bg-info p-2 text-nowrap mt-2">
                    <p id="13_sumprice" class="m-0">55,000 تومان</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Item in cart -->
                
        
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