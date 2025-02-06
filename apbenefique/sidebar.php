

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
      <h3 class=" text-muted text-center d-none d-lg-block mt-2">NESS de L'Economie Sociale et Solidaire</h3>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
            <span class="mb-0 text-sm  font-weight-bold"> مرحبا ,
                  <?php
                   $sql = "SELECT * FROM benefique$type where idBenefique='$idBenefique'";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       // output data of each row
                       while ($row = $result->fetch_assoc()) {
                       
                           echo $row["nom"]; }
                      }
                    ?>
                  </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">مرحبا!</h6>

            </div>
            <a href="index.php?page=parametreCompte" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>الأعدادات</span>
              </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
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

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i>متابعة الإستهلاك
            </a>
          </li>
          </ul>
<hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted"> مطالب</h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeDemandes">
              <i class="ni ni-circle-08 text-blue"></i>مطالب الترشح
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading text-muted"> الديون </h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-circle-08 text-blue"></i>متابعة الاستهلاك
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading text-muted">الاعطاب </h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-circle-08 text-blue"></i>تبليغ عن اعطاب
            </a>
          </li>
        </ul>

          

      

      
          <!--<li class="nav-item">
            <a class="nav-link" href="index.php?page=ajoutPompiste">
              <i class="ni ni-circle-08 text-blue"></i> اضافة رافع عداد
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=problemesSakoura">
              <i class="ni ni-vector text-red"></i>الأعطاب
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=donneesSakoura">
              <i class="ni ni-chart-bar-32 text-red"></i>رفع الأعداد
            </a>
          </li>
</ul>
<hr class="my-3">-->
        <!-- Heading -->
        <!--<h6 class="navbar-heading text-muted">المنتفعين</h6>
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeBenefique">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة المنتفعين
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeDemandes">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة المنخرطين
            </a>
          </li>

-->
        </ul>
        <!-- Divider -->
        
        
      </div>
    </div>
  </nav>


  