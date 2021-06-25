<?php
    $pageUi="userProfile";
    include_once 'config.php';
?>
<!-- user profile common header -->
<?php include 'upcommonheader.php'; ?>
<!-- user profile common header -->

    <!----------------------------- personal info ------------------------------------>
    <main>
        <div class="p-3">
          <nav>
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
              <a href="userprofile.php" class="text-decoration-none"><button class="nav-link active" aria-selected="true"><i class="fas fa-user me-1"></i>اطلاعات شخصی</button></a>
              <a href="userorders.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-box-open me-1"></i>سفارسشات من</button></a>
              <a href="useraddress.php" class="text-decoration-none"><button class="nav-link" aria-selected="false"><i class="fas fa-map-signs me-1"></i>آدرس های من</button></a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
              <div class="container">
                <form method="post">
                <?php 
                  if(isset($_SESSION['successMessage'])){
                      echo
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <small>'.$_SESSION['successMessage'].'
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
                      </div>';

                      unset($_SESSION['successMessage']);

                  }elseif(isset($_SESSION['errorMessage'])){
                    if(is_array($_SESSION['errorMessage'])){
                      foreach($_SESSION['errorMessage'] as $errMsg){
                        if($errMsg){
                          echo
                          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <small>'.$errMsg.'
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
                          </div>';
                        }

                      }

                    }else{
                      echo
                      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <small>'.$_SESSION['errorMessage'].'
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></small>
                      </div>';
                    }
                    unset($_SESSION['errorMessage']);

                  }
              ?>
                  <div class="row">
                    <div class="col-md-5 p-2">
                      <label for="name" class="form-label">نام<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                      <input name="first_name" type="text" id="name" placeholder="نامتان را وارد کنید" class="form-control" aria-describedby="name" value="<?php echo $user->getFirstName(); ?>">
                    </div>
                    <div class="col-md-5 p-2">
                      <label for="name" class="form-label">نام خانوادگی<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                      <input name="last_name" type="text" placeholder="نام خانودگی تان را وارد کنید" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getLastName(); ?>">
                    </div>
                    <div class="col-md-5 p-2">
                      <label for="name" class="form-label">شماره تلفن</label>
                      <input disabled type="text" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getPhone(); ?>">
                    </div>
                    <div class="col-md-5 p-2">
                      <label for="name" class="form-label">ایمیل<a href="#"><i class="fas fa-pencil-alt ms-1"></i></a></label>
                      <input name="email" type="text" id="name" class="form-control" aria-describedby="name" value="<?php echo $user->getEmail(); ?>" placeholder="example@email.com">
                    </div>
                    <div class="col-md-12 p-2">
                      <input name="edit" type="submit" class="btn btn-primary" value="بروزرسانی اطلاعات">
                      <div class="my-2">
                      <p class="text-muted"><i class="fas fa-info-circle me-2"></i>برای ثبت تغییرات کلیک کنید</p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
    </main>
    <!----------------------------- personal info ------------------------------------>


    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    
  </body>
</html>