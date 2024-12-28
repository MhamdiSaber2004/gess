
<?php

error_reporting(E_ERROR | E_PARSE);
include './db/db.php';
include_once "./controller/controller.php";

$sql = "SELECT * from pompe where idGess='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      header("Location: index.php");
      exit();
    }

?>


<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  المضخة 
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
<form onsubmit ="return checkInputsBenefique()" method="post" action="controller/controller.php">
  <!-- Navbar -->

  <!-- End Navbar -->.

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" >
      <span class=" bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class=" mb-2 mt-5">تسجيل معطيات المضخة !</h1>
            <p class="text-lead ">الرجاء تعمير كل الخانات</p>
            <p class="text-lead text-red">لا يمكنك تغير هذه المعطيات لاحقا </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            
            <div class="card-body">
            
                <div class="mb-3">
                
                <h6 class="heading-small text-muted mb-4">معلومات المضخة  </h6>
                <hr class="" />
                
                <div class="mb-3">
                  <input type="text" id="numConsommationPompe" name="numConsommationPompe" class="form-control" placeholder="رقم الإستهلاك المسجل في المضخة   ">
                </div>
                <h6 class="heading-small  mb-4 text-danger" id="erreur"><?php echo $_SESSION['message'] ?></h6>
                <div class="text-center">
                  <button type="submit" id="donneesPompe" name="donneesPompe" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Reset">تسجيل</button>
                </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
 

</form>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script>, By Ayoub.
          </p>
        </div>
      </div>
    </div>
  </footer>
  </form>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="./assets/loginJS/core/bootstrap.min.js"></script>

  <script>

function checkInputsBenefique(){



  var numConsommationPompe = document.getElementById("numConsommationPompe").value;
  var erreur = document.getElementById("erreur");



  if(numConsommationPompe < 0  )
  {
    erreur.innerHTML="الرجاء التثبت من صحة الرقم"
    return false;

  }

  return true;

  erreur.innerHTML="";

 

}



  </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

   
  </script>
</body>

</html>