<?php $allCategories=Category::getCategories(); ?>
<!doctype html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    

    

    <title>فلورا</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/index.css">


    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fontawesome kit -->
    <script src="https://kit.fontawesome.com/2370aca281.js" crossorigin="anonymous"></script>

    <!-- temp -->

    <style type="text/css">

/* ============ desktop view ============ */
@media all and (min-width: 992px) {

	.dropdown-menu li{
		position: relative;
	}
	.dropdown-menu .submenu{ 
		display: none;
		position: absolute;
		right:100%; top:-7px;
	}
	.dropdown-menu .submenu-left{ 
		left:100%; right:auto;
	}

	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu > li:hover > .submenu{
		display: block;
	}
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {

.dropdown-menu .dropdown-menu{
		margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
}

}	
/* ============ small devices .end// ============ */

</style>


<script type="text/javascript">
//	window.addEventListener("resize", function() {
//		"use strict"; window.location.reload(); 
//	});


	document.addEventListener("DOMContentLoaded", function(){
        

    	/////// Prevent closing from click inside dropdown
		document.querySelectorAll('.dropdown-menu').forEach(function(element){
			element.addEventListener('click', function (e) {
			  e.stopPropagation();
			});
		})



		// make it as accordion for smaller screens
		if (window.innerWidth < 992) {

			// close all inner dropdowns when parent is closed
			document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
				everydropdown.addEventListener('hidden.bs.dropdown', function () {
					// after dropdown is hidden, then find all submenus
					  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
					  	// hide every submenu as well
					  	everysubmenu.style.display = 'none';
					  });
				})
			});
			
			document.querySelectorAll('.dropdown-menu a').forEach(function(element){
				element.addEventListener('click', function (e) {
		
				  	let nextEl = this.nextElementSibling;
				  	if(nextEl && nextEl.classList.contains('submenu')) {	
				  		// prevent opening link if link needs to open dropdown
				  		e.preventDefault();
				  		console.log(nextEl);
				  		if(nextEl.style.display == 'block'){
				  			nextEl.style.display = 'none';
				  		} else {
				  			nextEl.style.display = 'block';
				  		}

				  	}
				});
			})
		}
		// end if innerWidth

	}); 
	// DOMContentLoaded  end
</script>





    <!-- temp -->
  </head>
  <body class="">
    <!----------------------------- headers ------------------------------------>
    <header>

        <div class="container-fluid">

          <!----------------------------- second header ------------------------------------>
          <div class="row">
          <!-- ============= COMPONENT ============== -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#F55E61;">
 <div class="container-fluid">
 <a class="navbar-brand logologo" href="index.php"><img src="assets/images/logo/flora-white.png" alt="" width="200px"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="main_nav">
	
    <form class="d-flex my-2" method="get" action="searchedfor.php">
          <input name="term" class="form-control me-2" type="search" placeholder="جستجو در محصولات..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">جستجو</button>
    </form>
    <ul class="navbar-nav mx-2">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-th-list"></i>  دسته بندی ها  </a>
          <ul class="dropdown-menu catu">
            <?php if($allCategories): ?>
              <?php foreach($allCategories as $category): 
                  $categoryObj=new Category($category['id']);  
                  $subCategories=$categoryObj->getSubCategories();
              ?>
              <?php if($subCategories): ?>
                <li><a class="dropdown-item" href="categoryitems.php?catid=<?php echo $categoryObj->getCategoryId(); ?>"><?php echo $categoryObj->getName(); ?><i class="fas fa-angle-left"></i> </a>
                    <ul class="submenu dropdown-menu catu">
                      <?php foreach($subCategories as $subCategory): ?>
                            <li><a class="dropdown-item" href="categoryitems.php?subid=<?php echo $subCategory['id']; ?>"><?php echo $subCategory['name']; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                </li>
              <?php else: ?>
                <li><a class="dropdown-item" href="categoryitems.php?catid=<?php echo $categoryObj->getCategoryId(); ?>"><?php echo $categoryObj->getName(); ?></a></li>
              <?php endif; ?>
                
              <?php endforeach; ?>
      
            <?php endif; ?>

          </ul>
      </li>
    </ul>
    

    <div class="d-flex align-items-center ms-auto my-2">
             
              
              <?php $logedin=new Account(); if($logedin->checkUserLogedIn()):?> 
                  <?php if(isset($_SESSION['permission'])): ?>
                    <a href="admin/admin.php" class="btn btn-outline-dark rounded me-2">پنل ادمین<i class="fas fa-user ms-1"></i></a>
                  <?php else: ?>
                    <a href="userprofile.php" class="btn btn-outline-dark rounded me-2"><?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?><i class="fas fa-user ms-1"></i></a>
                  <?php endif; ?>
              <?php else: ?>
                  <a href="enterphn.php" class="btn btn-outline-dark rounded me-2">وارد شوید<i class="fas fa-user ms-1"></i></a>
              <?php endif; ?>
       
              <a href="cart.php" class="btn btn-outline-dark rounded me-2">سبد خرید<i class="fas fa-shopping-cart cart-carte mx-1"></i><span id="badgetxt" class="badge badge-light" style="    color: #212529;
    background-color: #f8f9fa;"><?php if(isset($_SESSION['cart']['products']) && count($_SESSION['cart']['products'])>0){ echo count($_SESSION['cart']['products']);} ?></span></a>
              
              </div>

  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>

<!-- ============= COMPONENT END// ============== -->
</div>
          <!----------------------------- second header ------------------------------------>

        </div>
    
    </header>
    <!----------------------------- headers ------------------------------------>