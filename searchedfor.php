<?php 
  //page controller
  $pageUi='categoryitems';
  include_once 'config.php';
?>
<?php include 'commonheader.php'; ?>
    <!-----------------------------  filters + products + categories ------------------------------------>
    <main>
      <div class="container  border-bottom border-3 p-3 pb-0">
        <div class="row ">
              <div class="col-10 col-md-auto d-flex flex-row align-items-center text-nowrap me-2 my-3">
              <?php if(isset($catId)): 
                $catObj=new Category($catId);  
              ?>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="?catid=<?php echo $catId; ?>"><?php echo $catObj->getName(); ?></a></li>
                  </ol>
                </nav>
              <?php endif; ?>

              <?php if(isset($subId)): 
                $subObj=new SubCategory($subId);  
              ?>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="?catid=<?php echo $subObj->getCategory()->getCategoryId(); ?>"><?php echo $subObj->getCategory()->getName(); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $subObj->getName(); ?></li>
                  </ol>
                </nav>
              <?php endif; ?>



              </div>
              <div class="col-10 col-md-3 d-flex flex-row align-items-center text-nowrap me-2 my-3">
                <p class="h6 me-2 mb-0">به ترتیب :</p>
                <select id="ordercatitem" name="order" id="order" class="form-select form-select">
                  <option value="all">پیشفرض</option>
                  <option value="mostexpensive">گران ترین</option>   
                  <option value="cheapest">ارزان ترین</option>     
                  <option value="mostsells">پرفروش ترین</option>
                </select>
              </div>
            <div class="col-10 col-md-3 d-flex flex-row align-items-center text-nowrap my-3">
              <div class="form-check form-switch">
                <input name="instockcheck" class="form-check-input instockcheck" type="checkbox" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked">فقط نمایش کالاهای موجود</label>
              </div>
            </div>
        </div>
      </div>
      <div class="container-fluid" style="min-height:35vh;">
        <div class="row my-1 g-3">
          
        <div class="col">
          <div class="container" id="wrapper">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-2 g-lg-3 justify-content-end p-3 ">
                      <?php if($products): ?>
                          <?php foreach($products as $product): 
                            $productObj=new Product($product['id']);  
                          ?>
                          <a href="product.php?pid=<?php echo $productObj->getId()."&slug=".$productObj->getTitle();  ?>" class="text-decoration-none">
                            <div class="col">
                              <div class="card shadow">
                                <img src="<?php echo $productObj->getImage(); ?>" class="card-img-top" alt="<?php echo $productObj->getImageAlt(); ?>">
                                <div class="card-body p-1">
                                  <p class="card-title text-center mb-3" style="font-weight:bold;"><?php echo $productObj->getTitle(); ?></p>

                                  <?php if($productObj->getDiscount()>0): $price=getPriceAfterOff($productObj->getPrice(),$productObj->getDiscount());?>

                                      <?php if($productObj->getInstock()==0): ?>
      ‍‍                                   <p class="m-0 text-decoration-line-through">ناموجود</p>
                                      <?php else: ?>
                                        <p class="m-0 text-decoration-line-through"><?php echo number_format($productObj->getPrice()); ?><span class="badge bg-primary me-1"> <?php echo $productObj->getDiscount(); ?>%</span></p>
                                        <div class="d-flex" style="color: coral;">
                                          <p class="ms-1 m-0">تومان</p>
                                          <p class="m-0"><?php echo number_format($price); ?></p>
                                        </div>
                                      <?php endif; ?>
                                  <?php else: $price=$productObj->getPrice(); ?>

                                      <?php if($productObj->getInstock()==0): ?>
      ‍‍                                   <p class="m-0 text-decoration-line-through">ناموجود</p>
                                      <?php else: ?>
                                        <div class="d-flex" style="color: coral;">
                                          <p class="ms-1 m-0">تومان</p>
                                          <p class="m-0"><?php echo number_format($price); ?></p>
                                        </div>
                                      <?php endif; ?>

                              <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </a>
                          <?php endforeach; ?>
                      <?php else: ?>
                        <p>محصولی وجود ندارد</p>
                      <?php endif; ?>
                </div>     
          </div>
        </div>
      
    
    </main>
    <!-----------------------------  filters + products + categories ------------------------------------>
    <?php include 'commonfooter.php'; ?>

    


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

    <!--Filter js -->  
    <script src="assets/js/filter.js"></script> 
  </body>
</html>