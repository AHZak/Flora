<?php
  $pageUi="";
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
              <input name="term" id="termboxusers" type="search" class="form-control rounded-pill" placeholder="جستجو در سفارشات ...">
            </form>
            <!----------------------------- search box --------------------------->
          </div>

        </div>
        <!----------------------------- header --------------------------->

        <!----------------------------- users --------------------------->
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
                                  <tr>
                                  <td>#00395</td>
                                  <td>1400/04/04</td>
                                  <td>محمود کریمی</td>
                                  <td>222,000 تومان</td>
                                  <td>باربری</td>
                                  <td>درحال انجام</td>
                                  <td>
                                      <div class="d-flex flex-row">
                                      <a href="#" class="btn btn-outline-primary">جزئیات</a>
                                      <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal">تغییر وضعیت</button>
                                      </div>
                                  </td>
                                  </tr>
                                  <div class="modal fade" id="orderstatusmodal" tabindex="-1" aria-labelledby="orderstatusmodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderstatusmodalTitle">وضعیت سفارش</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="mb-3">
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1" checked="">
                                                    <label class="form-check-label" for="exampleRadio1">ارسال شده</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">درحال انجام</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">در انتظار پرداخت</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">لغو شده</label>
                                                </div>
                                            </fieldset>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">بروزرسانی وضعیت</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                  <tr class="bg-warning">
                                  <td>#00394</td>
                                  <td>1400/04/04</td>
                                  <td>محمود کریمی</td>
                                  <td>445,000 تومان</td>
                                  <td>فوری</td>
                                  <td>درحال انجام</td>
                                  <td>
                                      <div class="d-flex flex-row">
                                      <a href="#" class="btn btn-outline-primary">جزئیات</a>
                                      <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal">تغییر وضعیت</button>
                                      </div>
                                  </td>
                                  </tr>
                                  <div class="modal fade" id="orderstatusmodal" tabindex="-1" aria-labelledby="orderstatusmodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderstatusmodalTitle">وضعیت سفارش</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="mb-3">
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1" checked="">
                                                    <label class="form-check-label" for="exampleRadio1">ارسال شده</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">درحال انجام</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">در انتظار پرداخت</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">لغو شده</label>
                                                </div>
                                            </fieldset>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">بروزرسانی وضعیت</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                  <tr>
                                  <td>#00393</td>
                                  <td>1400/04/04</td>
                                  <td>محمود کریمی</td>
                                  <td>100,000 تومان</td>
                                  <td>باربری</td>
                                  <td>درحال انجام</td>
                                  <td>
                                      <div class="d-flex flex-row">
                                        <a href="#" class="btn btn-outline-primary">جزئیات</a>
                                        <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal">تغییر وضعیت</button>
                                      </div>
                                  </td>
                                  </tr>
                                  <div class="modal fade" id="orderstatusmodal" tabindex="-1" aria-labelledby="orderstatusmodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderstatusmodalTitle">وضعیت سفارش</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="mb-3">
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1" checked="">
                                                    <label class="form-check-label" for="exampleRadio1">ارسال شده</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">درحال انجام</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">در انتظار پرداخت</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">لغو شده</label>
                                                </div>
                                            </fieldset>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">بروزرسانی وضعیت</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                  <tr>
                                  <td>#00392</td>
                                  <td>1400/04/04</td>
                                  <td>محمود کریمی</td>
                                  <td>13,000 تومان</td>
                                  <td>باربری</td>
                                  <td>درحال انجام</td>
                                  <td>
                                      <div class="d-flex flex-row">
                                      <a href="#" class="btn btn-outline-primary">جزئیات</a>
                                      <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal">تغییر وضعیت</button>
                                      </div>
                                  </td>
                                  </tr>
                                  <div class="modal fade" id="orderstatusmodal" tabindex="-1" aria-labelledby="orderstatusmodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderstatusmodalTitle">وضعیت سفارش</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="mb-3">
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1" checked="">
                                                    <label class="form-check-label" for="exampleRadio1">ارسال شده</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">درحال انجام</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">در انتظار پرداخت</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">لغو شده</label>
                                                </div>
                                            </fieldset>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">بروزرسانی وضعیت</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                  <tr>
                                  <td>#00391</td>
                                  <td>1400/04/04</td>
                                  <td>محمود کریمی</td>
                                  <td>1,300,000 تومان</td>
                                  <td>باربری</td>
                                  <td>درحال انجام</td>
                                  <td>
                                      <div class="d-flex flex-row">
                                      <a href="#" class="btn btn-outline-primary">جزئیات</a>
                                      <button type="button" class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#orderstatusmodal">تغییر وضعیت</button>
                                      </div>
                                  </td>
                                  </tr>
                                  <div class="modal fade" id="orderstatusmodal" tabindex="-1" aria-labelledby="orderstatusmodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderstatusmodalTitle">وضعیت سفارش</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="mb-3">
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1" checked="">
                                                    <label class="form-check-label" for="exampleRadio1">ارسال شده</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">درحال انجام</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">در انتظار پرداخت</label>
                                                </div>
                                                <div class="my-1 form-check">
                                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                                    <label class="form-check-label" for="exampleRadio2">لغو شده</label>
                                                </div>
                                            </fieldset>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">بروزرسانی وضعیت</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                          </tbody>

                          
                      </table>
     
          </div>
  </div>

        <!----------------------------- users --------------------------->

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