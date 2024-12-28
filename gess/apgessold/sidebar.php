

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
    
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
            <span class="mb-0 text-sm  font-weight-bold"> مرحبا ,
                  <?php
                   $sql = "SELECT * FROM utilisateurs where idGess='$idGess'";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       // output data of each row
                       while ($row = $result->fetch_assoc()) {
                       
                           echo $row["nom_utilisateur"]; }
                      }
                    ?>
                  </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">مرحبا!</h6>

            </div>
            <a href="index.php?page=parametre" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>أسعار المياه </span>
            </a>
           <!-- <a href="./examples/profile.html" class="dropdown-item">
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
            </a>-->
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
         <?php $current_page = isset($_GET['page']) ? $_GET['page'] : ''; ?>
        <h6 class="navbar-heading text-muted">النظام المائي</h6>
        <ul class="navbar-nav ">
        <li class="nav-item <?php echo ($current_page === 'listePompiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listePompiste">
              <i class="ni ni-circle-08 text-blue"></i> الموظفين  
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'prgPompeEauQuotiqien') ? 'active' : ''; ?>">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#datePrgPompeEau">
              <i class="ni ni-chart-bar-32 text-blue"></i> برنامج الضخ اليومي  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#archive">
              <i class="ni ni-chart-bar-32 text-red"></i>متابعة الاستهلاك والفوترة
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listePxwoxwmpiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#consommation">
              <i class="ni ni-chart-bar-32 text-red"></i>قائمة الإستهلاك  
            </a>
          </li>
          
          <li class="nav-item <?php echo ($current_page === 'listeProblemes') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeProblemes">
              <i class="ni ni-vector text-red"></i>الأعطاب
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listesxPompiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#factures">
              <i class="ni ni-chart-bar-32 text-red"></i> فاتورة  
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listePompxsiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#payement">
              <i class="ni ni-chart-bar-32 text-red"></i>إستخلاص  
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'venteEau') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=venteEau" >
              <i class="ni ni-chart-bar-32 text-red"></i>بيع الماء   
            </a>
          </li>

</ul>
<hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">المنتفعين</h6>
        <ul class="navbar-nav">

        <li class="nav-item <?php echo ($current_page === 'listeBenefiquePI') ? 'active' : ''; ?><?php echo ($current_page === 'listeBenefiqueAEP') ? 'active' : ''; ?><?php echo ($current_page === 'listePrisePI') ? 'active' : ''; ?><?php echo ($current_page === 'listeBranche') ? 'active' : ''; ?>">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#ajout">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة المنتفعين 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'demandeBenefique') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=demandeBenefique">
              <i class="ni ni-bullet-list-67 text-red"></i>قائمة مطالب الانتفاع 
            </a>
          </li>

          <li class="nav-item <?php echo ($current_page === 'listeDemandes') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeDemandes">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة المنخرطين
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeDemandeEnCours') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeDemandeEnCours">
              <i class="ni ni-bullet-list-67 text-red"></i> قائمة مطالب الإنخرط
            </a>
          </li>
          
        

          
        </ul>
        
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">الادارة</h6>
      
        <ul class="navbar-nav">

       
         
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#reunions">
              <i class="ni ni-bullet-list-67 text-red"></i>   إستخراج وثائق
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=documents">
              <i class="ni ni-bullet-list-67 text-red"></i> مراجع هامة
            </a>
          </li>
          
        

          
        </ul>

        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">الادارة</h6>


        <ul class="navbar-nav">

       
          </li>
            <li class="nav-item">
            <a class="nav-link" href="GDA/gestionPi.php">
              <i class="ni ni-bullet-list-67 text-red"></i>   الميزانية السنوية
            </a>
          </li>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#registre">
              <i class="ni ni-bullet-list-67 text-red"></i>    دفتر المحاسبة
            </a>
          </li>
          
        

          
        </ul>
        <!-- Divider -->
        <!--<hr class="my-3">
        <h6 class="navbar-heading text-muted">الإعدادات</h6>
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=parametre">
              <i class="ni ni-bullet-list-67 text-red"></i>الإعدادات
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="ni ni-button-power text-red"></i> تسجيل الخروج 
            </a>
          </li>

</ul>-->
<hr class="my-3">
      </div>
    </div>
  </nav>


  