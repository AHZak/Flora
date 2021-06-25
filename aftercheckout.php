<?php
    $pageUi="aftercheckout";
    include_once 'config.php';
?>
<!-- common header -->
<?php include 'commonheader.php'; ?>
<!-- common header -->

    <!----------------------------- order submitted message ------------------------------------>
    <main>
        <div class="p-3">
          <div class="container">
            <div class="row justify-content-center p-3">
              <div class="col-md-9 bg-white rounded text-center p-3" style="border-style:dashed;">
                <p class="h4 my-3" style="color:coral;">سفارش شما با موفقیت ثبت شد</p>
                <div class="d-flex flex-row justify-content-center align-content-center my-3">
                  <p class="h5 me-2">شماره سفارش:</p><p class="h5">#<?php echo $code; ?></p>
                </div>
                <p class="my-3">از خرید شما متشکریم</p>
                <a class="btn btn-primary" href="index.php" role="button">بازگشت به صفحه اصلی</a>
              </div>
            </div>
          </div>
        </div>
    </main>
    <!----------------------------- order submitted message ------------------------------------>
    
    <!-- common footer -->
    <?php include 'commonfooter.php'; ?>
    <!-- common footer -->

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->

  </body>
</html>