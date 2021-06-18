<!----------------------------- sidebar --------------------------->

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item border-bottom">
            <a class="nav-link" href="../index.php" target="__blank">
            <i class="fas fa-external-link-alt"></i>
            مشاهده وبسایت
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link border-bottom <?php active("admin.php") ?>" aria-current="page" href="admin.php">
            <i class="fas fa-home feather"></i>
            خانه
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("users.php") ?>" href="users.php">
            <i class="fas fa-users feather"></i>
            کاربران
            </a>
          </li>
          <?php if(isMaster()): ?><li class="nav-item border-bottom">
            <a class="nav-link <?php active("adminman.php") ?>" href="adminman.php">
            <i class="fas fa-users-cog feather"></i>
            ادمین ها
            </a>
          </li><?php endif; ?>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("#") ?>" href="orders.php">
            <i class="fas fa-cart-arrow-down feather"></i>
            سفارشات
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("addproduct.php") ?>" href="addproduct.php">
            <i class="fas fa-plus feather"></i>
            افزودن محصول
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("products.php") ?>" href="products.php">
            <i class="fas fa-shopping-bag feather"></i>
            محصولات
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("categories.php") ?>" href="categories.php">
            <i class="fas fa-archive feather"></i>
            دسته بندی ها
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("shipping.php") ?>" href="shipping.php">
            <i class="fas fa-truck feather"></i>
            تنظیمات ارسال
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("#") ?>" href="sms.php">
            <i class="fas fa-comment-alt feather"></i>
            پنل پیامک
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("#") ?>" href="setsliders.php">
            <i class="fas fa-image feather"></i>
            اسلاید ها
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("#") ?>" href="#">
            <i class="fas fa-map-marked-alt feather"></i>
            تنظیمات نقشه
            </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link <?php active("#") ?>" href="termsdraft.php">
            <i class="fas fa-balance-scale feather"></i>
            متن ها و قوانین
            </a>
          </li>
        </ul>
    </div>
</nav>

    <!----------------------------- sidebar --------------------------->