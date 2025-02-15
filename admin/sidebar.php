

<!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
    <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0 d-md-block d-none" href="./index.php">
        <img src="./assets/img/brand/logo Ness.png" class="navbar-brand-img" alt="...">
      </a>
      <h3 class=" text-muted text-center mt-2">NESS de L'Economie Sociale et Solidaire</h3>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <!--<li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>-->
        <li class="nav-item dropdown">
          <!--<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>-->
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">صباح الخير اويس</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>الصفحة الشحصية</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>الأعدادات</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>أخر الأخبار</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>مساعده</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>تسجيل خروج</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
                <img src="./assets/img/brand/logo Ness.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="ابحث" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> اللوحة الرئسية
            </a>
          </li>
          </ul>
<hr class="my-3">
        <!-- Heading -->
        <?php $current_page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
        <h6 class="navbar-heading text-muted" style="font-size : 20px">المجامع </h6>
        <ul class="navbar-nav">
        
          <li class="nav-item <?php echo ($current_page === 'request') ? 'active' : ''; ?>">
            <a class="nav-link " href="index.php?page=request"  style="font-size : 15px">
              <i class="ni ni-vector text-red"></i>طلبات الانخراط 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'list') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=list" style="font-size : 15px">
              <i class="ni ni-chart-bar-32 text-red"></i>قائمة المجامع 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'refuse') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=refuse" style="font-size : 15px">
              <i class="ni ni-chart-bar-32 text-red"></i> المجامع المرفوضين
            </a>
          </li>
          
</ul>
        

        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">الحساب</h6>
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=parametre">
              <i class="ni ni-bullet-list-67 text-red"></i>الإعدادات
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="ni ni-button-power text-red"></i> تسجيل الخروج 
            </a>
          </li>

      

          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        
      </div>
    </div>
  </nav>


  