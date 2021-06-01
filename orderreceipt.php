<?php
$pageUi="orderreceipt";
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

    <link rel="stylesheet" href="assets/css/admin.css">

    <title>فلورا</title>
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
    <div class="row">


      <!----------------------------- left panel --------------------------->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container">
          <div class="row">
            <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
              <div>
                <strong class="me-2">فاکتور شماره</strong>
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
                <strong>سفارش دهنده:</strong>
                <span><?php echo $user->getFirstName()." ".$user->getLastName(); ?></span>
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
                <?php $counter=0; foreach($ordersDetail as $orderDetail): $counter++;
                    $orderDetailObj=new OrderDetail($orderDetail['id']);
    
                    $product=new Product($orderDetail['product_id']);
                ?>
                  <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $product->getTitle(); ?></td>
                    <td><?php echo $orderDetailObj->getQuantity(); ?></td>
                    <td><?php echo number_format($orderDetailObj->getOrderedPrice()); ?></td>
                    <td><?php echo number_format($orderDetailObj->getSumPrice()); ?> </td>
                  </tr>
                <?php endforeach; ?>

                </tbody>

            </table>
          </div>

          <div class="d-flex flex-row justify-content-between">
          <div>
            <div class="col-12 my-2">
                <strong>هزینه ارسال</strong>
                <span><?php if($order->getPostalPrice()>0){ echo number_format($order->getPostalPrice()).' تومان'; }else{ echo 'رایگان'; } ?></span>
              </div>
              <div class="col-12 my-2">
                <strong>مبلغ پرداخت شده:</strong>
                <span><?php echo number_format($order->getSumPrice()); ?> تومان</span>
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
