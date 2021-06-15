<?php

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

          <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-balance-scale mx-2" aria-hidden="true"></i>
            <p class="h5">قوانین</p>
          </div>
          <div class="col-12 my-3">
          
            <div class="form-outline mb-4">
              <textarea class="form-control" id="textAreaTerms" rows="3">متن قوانین...</textarea>
              <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="">قوانین</a> مشاهده کنید.</label>
            </div>
          </div>

        </div>
          <div class="row">
          <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-key mx-2" aria-hidden="true"></i>
            <p class="h5">حریم خصوصی</p>
          </div>
          <div class="col-12 my-3">
          
            <div class="form-outline mb-4">
              <textarea class="form-control" id="textAreaTerms" rows="3">متن حریم خصوصی...</textarea>
              <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="">حریم خصوصی</a> مشاهده کنید.</label>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
          <i class="fas fa-file-alt mx-2" aria-hidden="true"></i>
            <p class="h5">درباره ما</p>
          </div>
          <div class="col-12 my-3">
          
            <div class="form-outline mb-4">
              <textarea class="form-control" id="textAreaTerms" rows="3">متن درباره ما...</textarea>
              <label class="form-label mt-2" for="textAreaTerms">متن خود را میتوانید در صفحه <a href="">درباره ما</a> مشاهده کنید.</label>
            </div>
          </div>
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