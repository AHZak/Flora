<?php
    $pageUi='signup'; 
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
    <link rel="stylesheet" href="assets/css/signup.css">
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body class="text-center d-flex flex-column align-items-center p-4">
    <main class="form-signin shadow rounded">
            <?php showErrorMessage(ERR_REGISTER_CODE_INCORRECT,$messageObject); ?>
            <?php showErrorMessage(ERR_EMPTY_FIRST_NAME,$messageObject); ?>
            <?php showErrorMessage(ERR_EMPTY_LAST_NAME,$messageObject); ?>
            <?php showErrorMessage(ERR_LAST_NAME_LEN,$messageObject); ?>
            <?php showErrorMessage(ERR_FIRST_NAME_LEN,$messageObject); ?>
        <form method="post">
            <img class="mb-4" src="assets/images/logo/flora-lo.png" alt="" width="72" height="72">
            <h1 class="h5 mb-3 fw-normal">ثبت نام</h1>

            <div class="form-floating my-2">
                <input name="code" value="<?php if(isset($_POST['code']) && $_POST['code']){ echo $_POST['code']; } ?>" type="text" class="form-control rounded" id="floatingInput" placeholder="phone-number">
                <label for="floatingInput">کد تایید ارسال شده</label>
            </div>

            <div class="form-floating my-2">
                <input name="first_name" value="<?php if(isset($_POST['first_name']) && $_POST['first_name']){ echo $_POST['first_name']; } ?>" type="text" class="form-control rounded" id="floatingInput" placeholder="phone-number">
                <label for="floatingInput">نام</label>
            </div>

            <div class="form-floating my-2">
                <input name="last_name" value="<?php if(isset($_POST['last_name']) && $_POST['last_name']){ echo $_POST['last_name']; } ?>" type="text" class="form-control rounded" id="floatingInput" placeholder="phone-number">
                <label for="floatingInput">نام خانوادگی</label>
            </div>
        
            <button name="signup" class="w-100 btn btn-lg btn-primary my-3" type="submit">ثبت نام</button>
            <p class="mt-5 mb-3 text-muted">فلورا - فروشگاه آنلاین گل و گیاه</p>
        </form>  
    </main>
    <a class="back-link" href="index.php">
        <p>بازگشت به صفحه اصلی</p>
        <i class="fas fa-long-arrow-alt-left"></i>
    </a>
    

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- slick carousel needed files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>