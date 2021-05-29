<?php
  $pageUi="orders";
  include_once '../config.php';
  
  include 'adminheader.php';
?>

  <div class="container-fluid">
  <div class="row">

<?php
  include 'adminsidebar.php';
?>

    <!----------------------------- left panel --------------------------->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        

        <!----------------------------- header --------------------------->
        <div class="row">

          <div class="col-12 p-3  border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-users feather mx-2"></i>
            <p class="h5">سفارشات</p>
            <!----------------------------- search box --------------------------->
            <form class="flex-fill ms-2 ">
              <input name="term" id="termboxorders" type="search" class="form-control rounded-pill" placeholder="جستجو با کد سفارش...">
            </form>
            <!----------------------------- search box --------------------------->
          </div>

        </div>
        <!----------------------------- header --------------------------->
        <!----------------------------- filters --------------------------->
        <div class="row">
            
            <div class="d-flex flex-row flex-wrap justify-content-start border-bottom border-2 p-3">
              <!----------------------------- funnel + title --------------------------->
              <div class="col-md-2 d-flex flex-row align-items-center me-auto my-1">
                <i class="fas fa-filter me-2"></i>
                <p class="h6">فیلترها</p>
              </div>
              <!----------------------------- funnel + title --------------------------->


              <!----------------------------- to show --------------------------->
              <div class="col-10 col-md-3 d-flex flex-row align-items-center text-nowrap me-2">
                <p class="h6 me-2">نمایش</p>
                <select id="filter" class="form-select form-select-sm" aria-label=".form-select-sm">
                  <option value="all" selected>همه</option>
                  <option value="shipped">تحویل داده شده</option>  
                  <option value="in-process">در حال انجام</option>   
                  <option value="canceled">لغو شده</option>     
                  <option value="express">سفارشات فوری</option>  
                  <option value="ordinary">سفارشات عادی</option>
                </select>
              </div>
              <!----------------------------- to show --------------------------->

            </div>
        </div>
        <!----------------------------- filters --------------------------->

        <!----------------------------- applied filters --------------------------->
        <div class="container">
          <div class="row p-3">
            <div class="d-flex flex-row justify-content-start flex-wrap">

            <div class="col-auto me-1 my-1">
              <a id="selected-termbox-btn" href="" class="btn btn-outline-secondary rounded-pill" style="display:none;" title="حذف فیلتر">x متن جستجو</a>
            </div>
            <div class="col-auto me-1 my-1">
              <a id="selected-cat-btn" href="" class="btn btn-outline-secondary rounded-pill" title="حذف فیلتر" style="display:none;">x تحویل شده</a>
            </div>
            </div>
          </div>
        </div>
        <!----------------------------- applied filters --------------------------->

        <!----------------------------- products --------------------------->
        <div id="tb-orders" class="row g-3 my-3">
          
                <div class="table-responsive">
                
                      <table class="table table-striped table-sm text-nowrap align-middle">
                          <thead>
                              <tr>
                              <th>کد سفارش</th>
                              <th>تاریخ سفارش</th>
                              <th>کاربر</th>
                              <th>مبلغ سفارش</th>
                              <th>شیوه ارسال</th>
                              <th>وضعیت سفارش</th>
                              <th>جزئیات سفارش</th>
                              </tr>
                          </thead>

                          <tbody class="">
                                <?php if($orders): ?>
                                    <?php foreach($orders as $order):
                                        //order Object
                                        $orderObj=new Order($order['id']); 
                                        if($orderObj->getCustomerRole()=='admin'){
                                          $user=new Admin($orderObj->getCustomerId());
                                        }else{
                                          $user=new User($orderObj->getCustomerId());
                                        } 
                                        
                                    ?>
                                        <tr id="scroll<?php echo $orderObj->getId(); ?>" class="<?php setWarningForFastOrder($orderObj->getShippingId()); ?>">
                                            <td><?php echo $orderObj->getCode(); ;?></td>
                                            <td><?php $timestampDate=convertTimeStamp($orderObj->getCreatedAt())['date'];
                                                echo timestampToJalaliDate($timestampDate);
                                            ?>
                                            </td>
                                            <td><?php echo $user->getFirstName()." ".$user->getLastName(); ?></td>
                                            <td><?php echo number_format($orderObj->getSumPrice()); ?> تومان</td>
                                            <td><?php echo getShippingStatus($orderObj->getShippingId()); ?></td>
                                            <td><?php echo getOrderStatus($orderObj->getStatus()); ?></td>
                                            <td>
                                                <div class="d-flex flex-row">
                                                <a href="orderdetails.php?id=<?php echo $orderObj->getId(); ?>" class="btn btn-outline-primary">جزئیات</a>
                                                <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal<?php echo $orderObj->getId(); ?>">تغییر وضعیت</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="orderstatusmodal<?php echo $orderObj->getId(); ?>" tabindex="-1" aria-labelledby="orderstatusmodalTitle<?php echo $orderObj->getId(); ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="orderstatusmodal<?php echo $orderObj->getId(); ?>Title">وضعیت سفارش</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                  </div>
                                                  <form method="post">
                                                  <input type="hidden" name="orderId" value="<?php echo $orderObj->getId(); ?>">
                                                  <div class="modal-body">
                                                      <fieldset class="mb-3">
                                                          <div class="my-1 form-check">
                                                              <input type="radio" name="status" value="done" class="form-check-input" id="exampleRadio1<?php echo $orderObj->getId(); ?>">
                                                              <label class="form-check-label" for="exampleRadio1<?php echo $orderObj->getId(); ?>">ارسال شده</label>
                                                          </div>
                                                          <div class="my-1 form-check">
                                                              <input type="radio" name="status" value="doing" class="form-check-input" id="exampleRadio2<?php echo $orderObj->getId(); ?>">
                                                              <label class="form-check-label" for="exampleRadio2<?php echo $orderObj->getId(); ?>">درحال انجام</label>
                                                          </div>
                                                          <div class="my-1 form-check">
                                                              <input type="radio" name="status" value="canceled" class="form-check-input" id="exampleRadio3<?php echo $orderObj->getId(); ?>">
                                                              <label class="form-check-label" for="exampleRadio3<?php echo $orderObj->getId(); ?>">لغو شده</label>
                                                          </div>
                                                      </fieldset>
                                                    </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" name="update" class="btn btn-primary">بروزرسانی وضعیت</button>
                                                  </div>
                                                  </form>
                                              </div>
                                            </div>
                                          </div>
                                    <?php endforeach; ?>
                                    
                                <?php endif; ?>

                          </tbody>

                          
                      </table>
     
          </div>
  </div>

        <!----------------------------- products --------------------------->

      </div>
    </main>
  </div>
</div>

    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--Filter js -->  
    <script src="../assets/js/filter.js"></script> 
  </body>
</html>

<!-- adding this line of code to test rebase -->