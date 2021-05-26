<?php

    //webpage config
    $pageUi="";
    include '../config.php';
?>

<?php

include 'adminheader.php';

?>

    <div class="container-fluid">
  <div class="row">

<?php
  include 'adminsidebar.php'

?>

    <!-- ++++++++++++++++++++++++++ shipping +++++++++++++++++++++++ -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        <div class="row">
          <div class="col-md g-3">
            <!-- shipping methods -->
            <div class="row">
              <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
                <i class="fas fa-truck mx-2"></i>
                <p class="h5">شیوه های ارسال</p>
              </div>
            </div>
            <!-- item -->
            <div class="row my-2">
              <div class="col-md-11 rounded " style="background-color: #dddd;">
                <div class="d-flex flex-column justify-content-start p-3">
                  <div class="col-sm-6 my-1">
                    <label for="title" class="form-label"><strong>عنوان</strong></label>
                    <input type="text" class="form-control" id="title" placeholder="" value="ارسال فوری (پیش فرض)" required="" disabled>
                  </div>
                  <div class="col-12 my-1">
                    <label for="info" class="form-label"><strong>توضیحات</strong></label>
                    <input type="text" class="form-control" id="info" placeholder="زمان ارسال و ..." value="بین 4 تا 24 ساعت کاری" required="">
                  </div>
                  <div class="d-flex flex-row align-items-end my-1">
                    <div class="col-md-3">
                      <label for="price" class="form-label">قیمت (تومان)</label>
                      <input type="text" class="form-control" id="price" placeholder="12000" value="12000" required="">
                    </div>
                    <div>
                      <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" value="" id="priceinput">
                        <label class="form-check-label" for="priceinput" id="bycustomer">پس کرایه</label>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-primary">بروزرسانی</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- item -->

            <!-- item -->
            <div class="row my-2">
              <div class="col-md-11 rounded " style="background-color: #dddd;">
                <div class="d-flex flex-column justify-content-start p-3">
                  <div class="col-sm-6 my-1">
                    <label for="title" class="form-label"><strong>عنوان</strong></label>
                    <input type="text" class="form-control" id="title" placeholder="" value="باربری" required="">
                  </div>
                  <div class="col-12 my-1">
                    <label for="info" class="form-label"><strong>توضیحات</strong></label>
                    <input type="text" class="form-control" id="info" placeholder="زمان ارسال و ..." value="پس کرایه" required="">
                  </div>
                  <div class="d-flex flex-row align-items-end my-1">
                    <div class="col-md-3">
                      <label for="price" class="form-label">قیمت (تومان)</label>
                      <input type="text" class="form-control" id="price" placeholder="12000" value="-" required="" disabled>
                    </div>
                    <div>
                      <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" value="" id="priceinput" checked>
                        <label class="form-check-label" for="priceinput" id="bycustomer">پس کرایه</label>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <button class="btn btn-primary">بروزرسانی</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- item -->
          </div>
          <!-- shipping methods -->

          <div class="col-md g-3">

            <!-- free shipping -->
            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center mb-3">
              <i class="fas fa-list mx-2"></i>
              <p class="h5">ارسال رایگان</p>
            </div>
            <strong class="">حداقل مبلغ سفارش برای ارسال رایگان (تومان)</strong>
            <div class="col-sm-6 my-3">
              <input type="text" class="form-control" id="minprice" placeholder="" value="" required="">
            </div>
            <div>
              <button class="btn btn-primary">بروزرسانی</button>
            </div>

            <hr class="my-4">

            <!-- add shipping methods -->
            <div class="col-12 p-3 border-bottom border-3 d-flex flex-row align-items-center">
              <i class="fas fa-plus feather mx-2"></i>
              <p class="h5">افزودن شیوه ارسال</p>
            </div>
            <form class="needs-validation my-2" novalidate="">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="title" class="form-label"><strong>عنوان</strong></label>
                  <input type="text" class="form-control" id="title" placeholder="" value="" required="">
                </div>

                <div class="col-12">
                  <label for="info" class="form-label"><strong>توضیحات</strong></label>
                  <input type="text" class="form-control" id="info" placeholder="زمان ارسال و ..." required="">
                </div>

                <div class="d-flex align-items-end">
                  <div class="col-md-3">
                    <label for="price" class="form-label"><strong>قیمت (تومان)</strong></label>
                    <input type="text" class="form-control" id="price" placeholder="12000" required="">
                  </div>
                  <div>
                    <div class="form-check ms-2">
                      <input class="form-check-input" type="checkbox" value="" id="priceinput">
                      <label class="form-check-label" for="priceinput" id="bycustomer">پس کرایه</label>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">افزودن</button>
            </form>
            <!-- shipping methods -->

        </div>
      </div>
    </main>
    <!-- ++++++++++++++++++++++++++ shipping +++++++++++++++++++++++ -->
  </div>
</div>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/extra.js"></script>   
   
  </body>
</html>