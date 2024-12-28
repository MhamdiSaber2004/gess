

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
        <!--ادارة-->
        <h6 class="navbar-heading text-muted">الجانب الاداري</h6>
        <ul class="navbar-nav ">
          <li class="nav-item <?php echo ($current_page === 'listePompiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listePompiste">
              <i class="ni ni-circle-08 text-blue"></i> أعوان التنفيذ 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'prgPompeEauQuotiqien') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeReunionPublique">
              <i class="ni ni-vector text-red"></i>اعداد و تنظيم الجلسات العامة   
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=reunionInterne">
              <i class="ni ni-chart-bar-32 text-red"></i>مسك دفتر محاضر اجتماعات مجلس الدارة
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=listeBenefique<?php echo $typeGess ?>">
              <i class="ni ni-chart-bar-32 text-red"></i>قائمة المنتفعين 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listePxwoxwmpiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeDemandes">
              <i class="ni ni-chart-bar-32 text-red"></i>دفتر الانخراطات  
            </a>
          </li>
          <!--ادارة-->
        </ul>
        <!--المالي-->
        <ul class="navbar-nav ">
          <h6 class="navbar-heading text-muted">الجانب المالي</h6>
          <li class="nav-item <?php echo ($current_page === 'listeProblemes') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#listeDBPI">
              <i class="ni ni-vector text-red"></i>قائمة ديون المنتفعين نحو المجمع 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeFix') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#listeDCPI">
              <i class="ni ni-vector text-red"></i>قائمة ديون المجمع نحو المزودين 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listesxPompiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#registre" >
              <i class="ni ni-chart-bar-32 text-red"></i>دفتر المحاسبة  
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listePompxsiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#istihlekwfawtra">
              <i class="ni ni-chart-bar-32 text-red"></i>دفتر متابعة االستهالك والفوترة  
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'venteEau') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#MDakhilwSarf" >
              <i class="ni ni-chart-bar-32 text-red"></i>مؤيدات الدخل و الصرف    
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeInfoCompteur') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=financeSituation" >
              <i class="ni ni-chart-bar-32 text-red"></i>متابعة الوضعية الما لية للمجمع
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeInfoCompteur') ? 'active' : ''; ?>">
            <a class="nav-link" href="GDA/gestionAep.php" >
              <i class="ni ni-chart-bar-32 text-red"></i>المزانية السنوية
            </a>
          </li>
      </ul>
      <!--المالي-->
      <!--الجانب الفني-->
      <ul class="navbar-nav ">
          <h6 class="navbar-heading text-muted">الجانب الفني</h6>
          <li class="nav-item <?php echo ($current_page === 'listeProblemes') ? 'active' : ''; ?>">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#mProgrammePompage">
              <i class="ni ni-vector text-red"></i>برنامج الضخ اليومي 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listeFix') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeProblemes">
              <i class="ni ni-vector text-red"></i>الاعطاب 
            </a>
          </li>
          <li class="nav-item <?php echo ($current_page === 'listesxPompiste') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php?page=listeInfoCompteur" >
              <i class="ni ni-chart-bar-32 text-red"></i>متابعة وضعية العدادات 
            </a>
          </li>
      </ul>
       <!--الجانب الفني-->
    </div>
</div>
</nav>


  