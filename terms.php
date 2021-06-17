<?php 
  //page controller
  $pageUi='index';
  include_once 'config.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/index.css">
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
 <a class="navbar-brand" href="#"><img src="assets/images/logo/flora-white.png" alt="" width="200px"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="main_nav">
	
  <form class="d-flex my-2">
          <input class="form-control me-2" type="search" placeholder="جستجو در محصولات..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">جستجو</button>
        </form>
    <ul class="navbar-nav mx-2">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-th-list"></i>  دسته بندی ها  </a>
          <ul class="dropdown-menu">
            <?php if($allCategories): ?>
              <?php foreach($allCategories as $category): 
                  $categoryObj=new Category($category['id']);  
                  $subCategories=$categoryObj->getSubCategories();
              ?>
              <?php if($subCategories): ?>
                <li><a class="dropdown-item" href="#"><?php echo $categoryObj->getName(); ?><i class="fas fa-angle-left"></i> </a>
                    <ul class="submenu dropdown-menu">
                      <?php foreach($subCategories as $subCategory): ?>
                            <li><a class="dropdown-item" href="#"><?php echo $subCategory['name']; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                </li>
              <?php else: ?>
                <li><a class="dropdown-item" href="#"><?php echo $categoryObj->getName(); ?></a></li>
              <?php endif; ?>
                
              <?php endforeach; ?>

      
            <?php endif; ?>

          </ul>
      </li>
    </ul>
    

    <div class="d-flex align-items-center ms-auto my-2">
              <a href="enterphn.php" class="btn btn-outline-dark rounded me-2">وارد شوید<i class="fas fa-user ms-1"></i></a> 
       
              <a href="enterphn.php" class="btn btn-outline-dark rounded me-2">سبد خرید<i class="fas fa-shopping-cart cart-carte mx-1"></i><span class="badge badge-light" style="    color: #212529;
    background-color: #f8f9fa;">4</span></a>
              
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
    <!----------------------------- carousel + category cards + products ------------------------------------>
    <main>
      <div class="container" style="min-height:35vh;">
        <div class="row">
          <div class="col bg-light p-3 m-3 rounded">
            <div class="col-2 border-bottom border-3 my-3">
                <p class="h5">قوانین</p>
            </div>
            <p><?php echo file_get_contents("law.txt") ?></p>
          </div>
        </div>
      </div>
    
    </main>
    <!----------------------------- carousel + category cards + products ------------------------------------>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-start p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>ما را در شبکه های اجتماعی دنبال کنید :</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset text-decoration-none">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset text-decoration-none">
            <i class="fab fa-telegram"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <img src="assets/images/logo/flora-lo.png" alt="" height="32px">       فلورا
              </h6>
              <p>
                این توضیحات کوتاه مربوط به شرکت فلورا میباشد.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                بیشتر بدانید
              </h6>
              <p>
                <a href="#!" class="text-reset text-decoration-none">درباره ما</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-decoration-none">قوانین</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-decoration-none">حریم خصوصی</a>
              </p>
              
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                مجوزها
              </h6>
              <img src="assets/images/logo/samandehi.png" alt="" height="100px">
              <!-- <p>
                <a href="#!" class="text-reset">متن لینک دار</a>
              </p> -->
              
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                تماس با ما
              </h6>
              <p><i class="fas fa-home me-3"></i> مازندران، قائمشهر</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@flora.ir
              </p>
              <p><i class="fas fa-phone me-3"></i> 09362472111</p>
              <p><i class="fas fa-phone me-3"></i> 011-42235610</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 طراحی و اجرا:
        <a class="text-reset fw-bold text-decoration-none" href="">Arash & Amir</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- slick carousel needed files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
    <!-- slick carousel script TEMPORARY -->
    <script type="text/javascript">
        $(document).ready(function(){
          $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });
                  });
      </script>
  </body>
</html>