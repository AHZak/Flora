<?php
    $pageUi="aftercheckout";
    include_once 'config.php';
?>
<?php include 'commonheader.php' ?>

    <!----------------------------- order submitted message ------------------------------------>
    <main>
        <div class="p-3">
          <div class="container">
            <div class="row justify-content-center p-3">
              <div class="col-md-9 bg-white rounded text-center p-3" style="border-style:dashed;">
                <p class="h4 my-3" style="color:coral;">سفارش شما با موفقیت ثبت شد</p>
                <div class="d-flex flex-row justify-content-center align-content-center my-3"><p class="h5 me-2">شماره سفارش:</p><p class="h5">#<?php echo $code; ?></p></div>
                <p class="my-3">از خرید شما متشکریم</p>
                <a class="btn btn-primary" href="index.php" role="button">بازگشت به صفحه اصلی</a>
                
              </div>
            </div>
          </div>
        </div>
    </main>
    <!----------------------------- order submitted message ------------------------------------>
    <?php include 'commonfooter.php' ?>

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- slick carousel needed files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
    <!-- slick carousel script TEMPORARY -->
    <script type="text/javascript">
        $(document).ready(function(){
          $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });
                  });
      </script>
  </body>
</html>