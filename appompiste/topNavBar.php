    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">اللوحه الرئسية</a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex mt-3">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <!--<span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="https://cdn2.tokendaily.co/user-images/4a2359b48887048317100f5e5d28d0d6.jpeg">
                </span>-->
                <div class="media-body ml-2 d-none d-lg-block">
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