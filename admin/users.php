<?php
  $pageUi="users";
  include_once '../config.php';
  
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
        

        <!----------------------------- header --------------------------->
        <div class="row">

          <div class="col-12 p-3  border-bottom border-3 d-flex flex-row align-items-center">
            <i class="fas fa-users feather mx-2"></i>
            <p class="h5">کاربران</p>
            <!----------------------------- search box --------------------------->
            <form class="flex-fill ms-2 ">
              <input name="term" id="termboxusers" type="search" class="form-control rounded-pill" placeholder="جستجو در کاربران ...">
            </form>
            <!----------------------------- search box --------------------------->
          </div>

        </div>
        <!----------------------------- header --------------------------->

        <!----------------------------- users --------------------------->
        <div id="tb-users" class="row g-3 my-3">
          
                <div class="table-responsive">
                  <?php if($users): ?>
                      <table class="table table-striped table-sm text-nowrap align-middle">
                          <thead>
                              <tr>
                              <th>نام و نام خانوادگی</th>
                              <th>موبایل</th>
                              <th>ایمیل</th>
                              <th>تاریخ عضویت</th>
                              <th>عملیات</th>
                              </tr>
                          </thead>

                          <tbody>
                              <?php foreach($users as $user):
                                  //CREATE USER OBJECT
                                  $userObj=new User($user['id']);
                              ?>
                                  <tr>
                                  <td><?php echo $userObj->getFirstName()." ".$userObj->getLastName(); ?></td>
                                  <td><?php echo $userObj->getPhone(); ?></td>
                                  <td><?php echo $userObj->getEmail(); ?></td>
                                  <td><?php $timestampDate=convertTimeStamp($userObj->getCreatedAt())['date'];
                                          echo timestampToJalaliDate($timestampDate);
                                  ?></td>
                                  <td>
                                      <div class="d-flex flex-row">
                                      <a href="?rm_user=<?php echo $userObj->getId(); ?>" class="btn btn-outline-danger">حذف</a>
                                      </div>
                                  </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  <?php else:?>
                      <p>کاربری وجود ندارد</p>
                  <?php endif; ?>      
          </div>
  </div>

        <!----------------------------- users --------------------------->

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