<?php

$pageUi="sliders";
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

    <!----------------------------- choose sliders --------------------------->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        
            <div class="container">
                <!-- side item -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row text-center p-3 border-bottom border-3">
                        <div class="col-md my-2">
                            <p><strong class="mb-4">اسلایدر 1</strong></p>
                            <hr class="my-1">
                            <div class="my-2">
                                <label for="formFile" class="form-label">سایز فایل انتخابی: 600 * 1520</label>
                                <input name="slider1" class="form-control" type="file" id="formFile">
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <button type="submit" name="edit" class="btn btn-success">ذخیره تغییرات</button>
                            </div>
                        </div>
                        <div class="col-md my-2">
                            <div>
                                <img src="<?php echo $slider1->getImgUrl(); ?>" alt="" height="150px">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- side item -->
                <!-- side item -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row text-center p-3 border-bottom border-3">
                        <div class="col-md my-2">
                            <p><strong class="mb-4">اسلایدر 2</strong></p>
                            <hr class="my-1">
                            <div class="my-2">
                                <label for="formFile" class="form-label">سایز فایل انتخابی: 600 * 1520</label>
                                <input name="slider2" class="form-control" type="file" id="formFile">
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <button type="submit" name="edit" class="btn btn-success">ذخیره تغییرات</button>
                            </div>
                        </div>
                        <div class="col-md my-2">
                            <div>
                                <img src="<?php echo $slider2->getImgUrl(); ?>" alt="" height="150px">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- side item -->
                <!-- side item -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row text-center p-3 border-bottom border-3">
                        <div class="col-md my-2">
                            <p><strong class="mb-4">اسلایدر 3</strong></p>
                            <hr class="my-1">
                            <div class="my-2">
                                <label for="formFile" class="form-label">سایز فایل انتخابی: 600 * 1520</label>
                                <input name="slider3" class="form-control" type="file" id="formFile">
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <button type="submit" name="edit" class="btn btn-success">ذخیره تغییرات</button>
                            </div>
                        </div>
                        <div class="col-md my-2">
                            <div>
                                <img src="<?php echo $slider3->getImgUrl(); ?>" alt="" height="150px">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- side item -->
            </div>
       
    </main>

    <!----------------------------- choose sliders --------------------------->

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