<?php

include_once '../config.php';

//AUTH
if(isAdmin() || isMaster()){
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
          <div class="row">
            <!----------------------------- cards --------------------------->
            <div class="d-flex flex-wrap justify-content-center m-3">
              <div class="bg-dark rounded tmp-card"></div>
              <div class="bg-warning rounded tmp-card"></div>
              <div class="bg-info rounded tmp-card"></div>
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