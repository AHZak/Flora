<?php
  $pageUi="adminman";
  include_once '../config.php';
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
        

        <!----------------------------- header --------------------------->
        <div class="row">

          <div class="col-12 p-3 pb-1 border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-user-plus feather mx-2"></i>
            <p class="h5">افزودن ادمین</p>
          </div>

        </div>
        <!----------------------------- header --------------------------->

        <!----------------------------- add admin form --------------------------->
        <?php if(isMaster()):?>
            <div class="row">
              <div class="col-md-7 col-lg-8 my-2">
                <form class="needs-validation" method="post" novalidate="">
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <label for="firstName" class="form-label">نام</label>
                      <input name="first_name" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                    </div>

                    <div class="col-sm-6">
                      <label for="lastName" class="form-label">نام خانوادگی</label>
                      <input name="last_name" type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                    </div>


                    <div class="col-12">
                      <label for="email" class="form-label">ایمیل</label>
                      <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">کلمه عبور</label>
                      <input name="password" type="password" class="form-control" id="password" placeholder="" required="">
                    </div>

                    <div class="col-12">
                      <label for="phone" class="form-label">شماره موبایل</label>
                      <input name="phone" type="text" class="form-control" id="phone" placeholder="" required="">
                    </div>


                    <hr class="my-3">

                    <h5 class="mb-2 mt-0">سمت ادمین</h5>

                    <div class="my-3">
                    <div class="form-check">
                      <input id="master" name="adminpermission" type="radio" class="form-check-input" value="master" checked="" required="">
                      <label class="form-check-label" for="master">مدیرکل</label>
                    </div>
                    <div class="form-check">
                      <input id="shop-manager" name="adminpermission" type="radio" class="form-check-input" value="admin" required="">
                      <label class="form-check-label" for="shop-manager">مدیر فروشگاه</label>
                    </div>

                  </div>
                  <hr class="my-4">

                  <button name="addadmin" class="w-100 btn btn-primary btn-lg m-0" type="submit">افزودن ادمین</button>
                </form>
              </div>
            </div>
        <?php endif; ?>
        <!----------------------------- add admin form --------------------------->

        <!----------------------------- admins --------------------------->
        <div class="row g-3">
          <div class="d-flex flex-row align-items-center">
            <i class="fas fa-users-cog me-2"></i>
            <h5>ادمین ها</h5>
          </div>
        
          <div class="table-responsive">
            <table class="table table-striped table-sm text-nowrap">

              <thead>
                <tr>
                  <th>نام</th>
                  <th>سمت</th>
                  <th>ایمیل</th>
                  <th>موبایل</th>
                  <?php if(isMaster()): ?><th>عملیات</th><?php endif; ?>
                </tr>
              </thead>
              
              <tbody>
              <?php if($admins): ?>
                  <?php foreach($admins as $admin): ?>
                    <tr>
                      <td><?php echo $admin['FName']; ?></td>
                      <td>
                        <?php 
                            if($admin['permission']=='master'){
                              echo 'مدیر کل';
                            }elseif($admin['permission']=='admin'){
                              echo 'مدیر فروشگاه';
                            }
                        ?>
                      </td>
                      <td><?php echo $admin['email'] ?></td>
                      <td><?php echo $admin['phone'] ?></td>
                      <?php if(isMaster()): ?><td>
                        <div class="d-flex flex-row">
                          <a href="editadmin.php?aid=<?php echo $admin['id']; ?>" class="btn btn-outline-primary me-1">ویرایش</a>
                          <a href="?del_admin=<?php echo $admin['id'] ?>" class="btn btn-outline-danger">حذف</a>
                        </div>
                      </td><?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
              <?php else: ?>
                  <p>ادمینی وجود ندارد</p>
              <?php endif; ?>
               

              </tbody>
            </table>
          </div>
        </div>

        <!----------------------------- admins --------------------------->

        
          
          

      </div>
    </main>
  </div>
</div>

    <!--JQuery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--Filter js -->  
    <script src="../assets/js/filter.js"></script> 
  </body>
</html>

<!-- adding this line of code to test rebase -->