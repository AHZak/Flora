<?php
    $pageUi='entercode';
    include_once 'config.php';
    show("code: ".$_SESSION['sim-code']);
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
    <link rel="stylesheet" href="assets/css/enterphn.css">
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body class="text-center d-flex flex-column align-items-center p-4">
    <main class="form-signin shadow rounded">
        <?php showErrorMessage(ERR_REGISTER_CODE_INCORRECT,$messageObject); ?>
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
            <img class="mb-4" src="assets/images/logo/flora-lo.png" alt="" width="72" height="72">
            <h1 class="h5 mb-3 fw-normal">کد تایید را وارد کنید</h1>

            <div class="form-floating">
                <input name="code" type="text" value="<?php if(isset($_POST['code']) && $_POST['code']){ echo $_POST['code']; } ?>" class="form-control" id="floatingInput" placeholder="phone-number">
                <label for="floatingInput">کد تایید</label>
            </div>
        
            <button name="login" class="w-100 btn btn-lg btn-primary my-3" type="submit">ورود</button>
            <p class="mt-5 mb-3 text-muted">فلورا - فروشگاه آنلاین گل و گیاه</p>
        </form>  
    </main>
    <a class="back-link" href="enterphn.php">
        <p>تغییر شماره تلفن</p>
        <i class="fas fa-phone"></i>
    </a>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    
  </body>
</html>