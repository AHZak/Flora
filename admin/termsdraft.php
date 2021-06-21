<?php
$pageUi="termsdraft";
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

      <!----------------------------- left panel --------------------------->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container">
          <div class="row">
            <div class="col-12 p-3 pb-1 border-bottom border-3 border-dark d-flex flex-row align-items-center">
              <i class="fas fa-balance-scale mx-2" aria-hidden="true"></i>
              <p class="h5">قوانین</p>
            </div>

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
            <form method="post">
              <div class="col-12 my-3">
                <div class="form-outline mb-4">
                  <textarea name="lawtxt" class="form-control" id="textAreaTerms" rows="3"><?php $law=file_get_contents("../law.txt"); if($law!=""){ echo $law; } ?></textarea>
                  <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="../terms.php">قوانین</a> مشاهده کنید.</label>
                </div>
                <div>
                  <button name="law" type="submit" class="btn btn-primary">اعمال تغییرات</button>
                </div>
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-12 p-3 pb-1 border-bottom border-3 border-dark d-flex flex-row align-items-center">
              <i class="fas fa-key mx-2" aria-hidden="true"></i>
              <p class="h5">حریم خصوصی</p>
            </div>
            <form method="post">
              <div class="col-12 my-3">
                <div class="form-outline mb-4">
                  <textarea name="termtxt" class="form-control" id="textAreaTerms" rows="3"><?php $term=file_get_contents("../term_service.txt"); if($term){ echo $term; } ?></textarea>
                  <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="../privacy.php">حریم خصوصی</a> مشاهده کنید.</label>
                </div>
                <div>
                  <button name="term" type="submit" class="btn btn-primary">اعمال تغییرات</button>
                </div>
              </div>
            </form>
          </div>
          <div class="row mb-3">
            <div class="col-12 p-3 pb-1 border-bottom border-3 border-dark d-flex flex-row align-items-center">
              <i class="fas fa-file-alt mx-2" aria-hidden="true"></i>
              <p class="h5">درباره ما</p>
            </div>
            <form method="post">
              <div class="col-12 my-3">
                <div class="form-outline mb-4">
                  <textarea name="abouttxt" class="form-control" id="textAreaTerms" rows="3"><?php $about=file_get_contents("../about.txt"); if($about){ echo $about; } ?></textarea>
                  <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="../about.php">درباره ما</a> مشاهده کنید.</label>
                </div>
              </div>
              <div>
                <button name="about" type="submit" class="btn btn-primary">اعمال تغییرات</button>
              </div>
            </form>
          </div>
        </div>
      </main>
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