<?php
    $pageUi="userAddress";
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
    <title>فلورا</title>
    <link rel="stylesheet" href="assets/css/userprofile.css">
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body class="">
    <!----------------------------- headers ------------------------------------>
    <header>

        <div class="container-fluid">
          <!----------------------------- fisrt header ------------------------------------>
          <div class="row">

            <div class="d-flex flex-row justify-content-between align-items-end bg-light p-3 pb-2">
              <div class="col-md-4 ms-2">
                <a href="#"><img src="assets/images/logo/flora.png" alt="" width="200px"></a>
              </div>
              <div class="d-flex align-items-center">
              <button class="btn btn-outline-dark rounded-pill me-2">وارد شوید<i class="fas fa-user ms-1"></i></button> 
              </a> <i class="me-2">|</i>
              <a href="cart.php"><i class="fas fa-shopping-cart cart-cart"></i></a>
              
              </div>
            </div>

          </div>
          <!----------------------------- first header ------------------------------------>


        </div>
    
    </header>
    <!----------------------------- headers ------------------------------------>

    <!----------------------------- personal info + ordrs + addresses + receipts ------------------------------------>
    <main>
        <div class="p-3">
          <nav>
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
              <a href="userprofile.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-user me-1"></i>اطلاعات شخصی</button></a>
              <a href="userorders.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-box-open me-1"></i>سفارسشات من</button></a>
              <a href="useraddress.php" class="text-decoration-none"><button class="nav-link active" aria-selected="true"><i class="fas fa-map-signs me-1"></i>آدرس های من</button></a>
            </div>
          </nav>
            <div class="tab-content" id="nav-tabContent">
        
                <div class="tab-pane fade active show" id="nav-addresses" role="tabpanel" aria-labelledby="nav-addresses-tab">
                    <div class="row g-3" style="ltr">
                    
                        <!-- map box -->
                        <div class="col-md-6 border border-3 text-center bg-warning" style="height:27rem;">map here</div>
                        <!-- map box -->

                        <!-- address fields -->
                        <div class="col-md-6 order-md-first">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="row g-3">

                            <div class="col-12">
                                <label for="address" class="form-label">آدرس</label>
                                <input name="address" type="text" class="form-control" id="address" placeholder="" required="" value="مازندران - قائمشهر - خ بابل - نبش امیرکبیر">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-floor" class="form-label">طبقه</label>
                                <input name="floor" type="text" class="form-control" id="address-floor" placeholder="2" value="3" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-unit" class="form-label">واحد</label>
                                <input name="unit" type="text" class="form-control" id="address-unit" placeholder="3" value="4" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-postalcode" class="form-label">کد پستی</label>
                                <input name="postal_code" type="text" class="form-control" id="address-postalcode" placeholder="" value="45644322" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-title" class="form-label">عنوان آدرس</label>
                                <input name="title" type="text" class="form-control" id="address-title" placeholder="خانه" value="خانه" required="">
                            </div>

                            <div class="col-12">      
                                <label for="address-note" class="form-label">توضیحات<span class="text-muted">(اختیاری)</span></label>
                                <textarea name="description" class="form-control" id="address-note" rows="3" placeholder="">توضیحات اضافی</textarea> 
                            </div>


                            <div class="d-flex flex-row justify-content-between">
                                <button name="addAddress" class="w-100 btn btn-primary mx-2" type="submit">ثبت تغییرات</button>
                                <button name="cancelEdit" class="w-100 btn btn-outline-danger mx-2" type="submit">انصراف</button>
                            </div>
                            </div>
                        </form>
                        </div>
                        <!-- address fields -->
                        
                        <hr class="my-4">

                        <div class="container-fluid">

                            <?php if($addresses): ?>
                              <?php foreach($addresses as $address):
                                  //address object
                                  $addressObj=new Address($address['id']);
                              ?>
                                <div class="row m-3">
                                  <div class="col-12 col-md-10 col-lg-8 rounded bg-white p-3">
                                    <div class="dflex flex-column">
                                      <div class="d-flex flex-row align-items-center justify-content-between">
                                        <strong><?php echo $addressObj->getTitle(); ?></strong>
                                        <div class="d-flex flex-row my-2">
                                          <a href="#" class="btn btn-outline-primary me-1">ویرایش</a>
                                          <a href="#" class="btn btn-outline-danger">حذف</a>
                                        </div>
                                      </div>
                                      <p><?php echo $addressObj->getAddress(); ?></p>
                                      <p>کد پستی: <?php echo $addressObj->getPostalCode(); ?></p>
                                      <p>توضیحات: <?php echo $addressObj->getAddressExplain() ? $addressObj->getAddressExplain() : "-"; ?></p>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <p>آدرسی وجود ندارد</p>
                            <?php endif; ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!----------------------------- personal info + ordrs + addresses + receipts ------------------------------------>


    


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