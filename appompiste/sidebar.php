

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
      <h3 class=" text-muted text-center mt-2 d-none d-lg-block">NESS de L'Economie Sociale et Solidaire</h3>
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
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
            <span class="mb-0 text-sm  font-weight-bold">
                    <?php
                    $idPompiste=$_SESSION['idPompiste'];
                   $sql = "SELECT * FROM pompiste where idPompiste='$idPompiste'";
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
              <i class="ni ni-tv-2 text-primary"></i> اللوحة الرئسية
            </a>
          </li>
          </ul>
<hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">النظام المائي</h6>
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeBenefique<?php echo $typeGess ?>">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة المنتفعين 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'prgPompeEauQuotiqien') ? 'active' : ''; ?>">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#datePrgPompeEau">
              <i class="ni ni-chart-bar-32 text-blue"></i> برنامج الضخ اليومي  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-vector text-red"></i>دفتر استغلال و صيانة محطة الضخ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeProblemes">
              <i class="ni ni-vector text-red"></i>قائمة الأعطاب
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeInfoCompteur') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeInfoCompteur" >
              <i class="ni ni-chart-bar-32 text-red"></i>متابعة وضعية العدادات
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >
              <i class="ni ni-chart-bar-32 text-red"></i> برنامج الصيانة الدورية و الوقائية
            </a>
          </li>
        </ul>
        <!-- Divider -->
      </div>
    </div>
  </nav>


  