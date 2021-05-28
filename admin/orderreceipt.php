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
                <strong class="me-2">فاکتور شماره</strong>
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
                <strong>سفارش دهنده:</strong>
                <span>علی گرایلی</span>
              </div>
              <div class="col-6 my-2">
                <strong>تاریخ سفارش:</strong>
                <span>1400/4/4</span>
              </div>
          </div>
          <div class="row my-3 border-bottom border-2">
            <div class="col-12 my-2">
              <strong>آدرس:</strong>
              <span>مازندران - قائمشهر - خ بابل</span>
            </div>
            <div class="col-6 my-2">
              <strong>کد پستی:</strong>
              <span>476555542</span>
            </div>
          </div>

          <div class="table-responsive">
                
            <table class="table table-striped table-sm text-nowrap align-middle">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>کالا</th>
                    <th>تعداد</th>
                    <th>قیمت واحد(تومان)</th>
                    <th>جمع مبلغ</th>
                    </tr>
                </thead>

                <tbody class="">
                <tr>
                    <td>1</td>
                    <td>اپونتیا</td>
                    <td>3</td>
                    <td>12000</td>
                    <td>26,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>برگ انجیری</td>
                    <td>2</td>
                    <td>33,000</td>
                    <td>66,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>اچینو</td>
                    <td>1</td>
                    <td>20,000</td>
                    <td>20,000</td>
                </tr>
                

                </tbody>

            </table>
          </div>

          <div class="d-flex flex-row justify-content-between">
          <div>
            <div class="col-12 my-2">
                <strong>هزینه ارسال</strong>
                <span>10,000 تومان</span>
              </div>
              <div class="col-12 my-2">
                <strong>مبلغ پرداخت شده:</strong>
                <span>150,000 تومان</span>
              </div>
            </div>
            <div>
              <strong>محل مهر و امضا</strong>
            </div>
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