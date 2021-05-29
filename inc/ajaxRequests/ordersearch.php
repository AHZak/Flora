<?php
include '../../config.php';
use Database\Db;

if(isAdmin() || isMaster()){



    //STATUS
    if(isset($_GET['filter']) && $_GET['filter']){
        $filter=$_GET['filter'];
        if($filter=='shipped'){
            $status="done";
            $shipping_type="%";
        }elseif($filter=="in-process"){
            $status="doing";
            $shipping_type="%";
        }elseif($filter=='canceled'){
           $status="canceled";
           $shipping_type="%";
        }elseif($filter=='express'){
            $shipping_type=1;
            $status="%";
        }elseif($filter=='ordinary'){
            $shipping_type=2;
            $status="%";
        }else{
            $status="%";
            $shipping_type="%";
        }
    }else{
        $status="%";
        $shipping_type="%";
    }

    $term=isset($_GET['term']) && $_GET['term']!='' ? Db::correctTermFormat($_GET['term'],'simple') : "%";
   

    $orders=Db::select(ORDERS_TABLE_NAME,"shipping_id LIKE '$shipping_type' AND code LIKE '%$term%' AND status LIKE '$status'",'all','id',0,'created_at','desc');


    
?>

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
                                  <tr class="<?php setWarningForFastOrder($orderObj->getShippingId()); ?>">
                                      <td><?php echo $orderObj->getCode();?></td>
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

                                          <!--------------------------------->
                                          <div class="modal fade" id="orderstatusmodal<?php echo $orderObj->getId(); ?>" tabindex="-1" aria-labelledby="orderstatusmodalTitle<?php echo $orderObj->getId(); ?>" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="orderstatusmodal<?php echo $orderObj->getId(); ?>Title">وضعیت سفارش</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                            </div>
                                            <form method="post" action="?#scroll<?php echo $orderObj->getId(); ?>">
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
                                      </td>

                                  </tr>

                              <?php endforeach; ?>
                              
                          <?php endif; ?>

                    </tbody>

                    
                </table>

    </div>
<?php }?>