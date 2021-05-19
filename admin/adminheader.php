<!doctype html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>فلورا</title>
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shodow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-3 " href="#">پنل ادمین</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="تبديل التنقل">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <ul class="navbar-nav px-3 d-flex flex-row align-items-center justify-content-end w-100">
      <li class="nav-item text-nowrap text-light me-auto">
          <p class="m-0">
          <?php echo jdate("l Y/m/d"); ?>
          </p>
      </li>
      <li class="nav-item text-nowrap">
          <a class="nav-link mx-2 mb-0" href="#">
          <i class="fas fa-user px-2"></i> 
          <span><?php echo $_SESSION['FName']." ".$_SESSION['LName'] ?></span>
          </a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="?logout=true"><button type="button" class="btn btn-danger pb-2 mx-2">خروج</button></a>
        </li>
      </ul>
    </header>

    <!----------------------------- the rest goes here --------------------------->