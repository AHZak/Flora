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
    <!-- Mapp styles -->
    <link rel="stylesheet" href="https://cdn.map.ir/web-sdk/1.4.2/css/mapp.min.css">
    <link rel="stylesheet" href="https://cdn.map.ir/web-sdk/1.4.2/css/fa/style.css">
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
                        <div id="app" class="col-md-6 border border-3 text-center bg-warning" style="height:27rem;"></div>
                        <!-- map box -->

                        <!-- address fields -->
                        <div class="col-md-6 order-md-first">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="row g-3">

                            <div class="col-12">
                                <label for="address" class="form-label">آدرس</label>
                                <input name="address" type="text" class="form-control" id="address" placeholder="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-floor" class="form-label">طبقه</label>
                                <input name="floor" type="text" class="form-control" id="address-floor" placeholder="2" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-unit" class="form-label">واحد</label>
                                <input name="unit" type="text" class="form-control" id="address-unit" placeholder="3" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-postalcode" class="form-label">کد پستی</label>
                                <input name="postal_code" type="text" class="form-control" id="address-postalcode" placeholder="" value="" required="">
                            </div>

                            <div class="col-sm-6">
                                <label for="address-title" class="form-label">عنوان آدرس</label>
                                <input name="title" type="text" class="form-control" id="address-title" placeholder="خانه" value="" required="">
                            </div>

                            <div class="col-12">      
                                <label for="address-note" class="form-label">توضیحات<span class="text-muted">(اختیاری)</span></label>
                                <textarea name="description" class="form-control" id="address-note" rows="3" placeholder=""></textarea> 
                            </div>


                            <div class="d-flex flex-row justify-content-between">
                                <button name="addAddress" class="w-100 btn btn-primary mx-2" type="submit">افزودن آدرس</button>
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
                                          <a href="edituseraddress.php?id=<?php echo $addressObj->getId(); ?>" class="btn btn-outline-primary me-1">ویرایش</a>
                                          <a href="?del=<?php echo $addressObj->getId(); ?>" class="btn btn-outline-danger">حذف</a>
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
    <!-- Mapp scripts -->
    <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/mapp.env.js"></script>
    <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/mapp.min.js"></script>
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


      <!--MAP-->
      <script>
        $(document).ready(function() {
            var app = new Mapp({
                element: '#app',
                presets: {
                    latlng: {
                            lat: 36.463625410164006,
                            lng:  52.85794973373413,
                    },
                    zoom:15,
                },
                apiKey: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2In0.eyJhdWQiOiIxMzYzNiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2IiwiaWF0IjoxNjE4OTgzNTcxLCJuYmYiOjE2MTg5ODM1NzEsImV4cCI6MTYyMTU3NTU3MSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.WEx2apjQCZ56KFgqBiw0n1SOGTv5QIPzNuRSa54wkaAexEqhLXgNvUV7qa-7RDjBlYe44SQtJMM8XJvcIOpsmRK1g-ZsUeiAafuWjGJAax_whkDOutwQxXvUL-Zpp0yhbNfBA8tMdFpcJwIWJPZvvOYvE-Eo_TivRT0qDX0nRizQKfwRPFQjzd7h36U1_b2U6Ole_4wPUERRlJAMaQbZAr3sM6L12vJtZEc_7k_a12WDphx13poN6M2PrFA7UkeAMwWg93YN7DEDyza7n3oFNQDXxQTEQvNYZMper4xWnWCKRncoAv3YZh0MCBu-ehq9jZCKWozFodCWNUKTRakoBA'
            });
            app.addLayers();
            
            app.addFile({
                url: 'map(2).geojson',
                format: 'geojson',
            });

            // Add in a crosshair for the map
            var crosshairIcon = L.icon({
                iconUrl: 'assets/images/maopcon.png',
                iconSize:     [40, 40], // size of the icon
                iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
            });
            crosshairMarker = new L.marker(app.map.getCenter(), {icon: crosshairIcon, clickable:false});
            crosshairMarker.addTo(app.map);
            // Move the crosshair to the center of the map when the user pans
            app.map.on('move', function(e) {
                crosshairMarker.setLatLng(app.map.getCenter());
            });
            var lat;
            var lng;
            app.map.on('mouseup', function(e) {
                crosshairMarker.setLatLng(app.map.getCenter());
                //console.log(e);
                app.markReverseGeocode({
                    state: {
                        latlng: {
                            lat: e.latlng.lat,
                            lng: e.latlng.lng,
                            
                        },
                    },
                });
                getAddress(e.latlng.lat,e.latlng.lng);
                
            });

        });


        function getAddress(lat,lng) {

            $.post("inc/ajaxRequests/map.php",{lat:lat,lng:lng},function(response) {
                $("#address").val(response);
            });
        }
    </script>
  </body>
</html>