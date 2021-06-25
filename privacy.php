<?php 
  //page controller
  $pageUi='index';
  include_once 'config.php';
?>
<!-- common header -->
<?php include 'commonheader.php'; ?>
<!-- common header -->
    <!----------------------------- privacy content ------------------------------------>
    <main>
      <div class="container" style="min-height:35vh;">
        <div class="row">
          <div class="col bg-light p-3 m-3 rounded">
            <div class="col-2 border-bottom border-3 my-3">
                <p class="h5">حریم خصوصی</p>
            </div>
            <p class="term-text"><?php echo file_get_contents("term_service.txt") ?></p>
          </div>
        </div>
      </div>
    
    </main>
    <!----------------------------- privacy content ------------------------------------>

    <!-- common footer -->
    <?php include 'commonfooter.php'; ?>
    <!-- common footer -->

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    
  </body>
</html>