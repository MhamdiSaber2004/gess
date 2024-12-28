    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.php">اللوحه الرئسية</a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
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
      </div>
    </nav>