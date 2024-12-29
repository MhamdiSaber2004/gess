<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 session_start();

 include "db/db.php";

 if (isset($_SESSION["loginAdmin"])) {
  header("location: index.php");
  exit();
}
 if (isset($_POST["login"])) {

  $email = $_POST['email'];
   $password = $_POST['password'];

   // Use prepared statements to prevent SQL injection
   $sql = "SELECT idAdmin,email, nom FROM admin WHERE email= '$email' AND mdp='$password'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['loginAdmin'] =$row["idAdmin"] ;
      header("Location: index.php");
      exit();
   } 
   else {
      $error["erreur"] = "الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
   }

  

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  تسجيل الدخول
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
 
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
      #password-input {
    position: relative;
}

#toggle-password {
    position: absolute;
    left: 32px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}
  </style>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
تسجيل دخول المشرف            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                
               <!--<li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>-->
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="https://ness.com.tn">
                    الرجوع إلى الصفحة الرئسية
                  </a>
                </li>
              </ul>
              <!--<ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://ness.com.tn" class="btn btn-sm mb-0 me-1 btn-primary"> الرجوع إلى الصفحة الرئسية</a>
                </li>
              </ul>-->
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder text-end">تسجيل الدخول</h4>
                  
                </div>
                <div class="card-body">
                  <form id="loginForm"  action="login.php" method="post">
                    <div class="mb-3">
                      <input type="text" name="email" class="form-control form-control-lg text-end" placeholder="البريد الالكتروني" aria-label="Email" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" id="password-input" class="form-control form-control-lg text-end" placeholder="كلمة السر" aria-label="Password" required>
                      <i class="fas fa-eye" id="toggle-password"></i>
                    </div>
                    <!--<div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>-->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" name="login">دخول</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p id="erreur" class="mb-4 text-sm mx-auto" style="color:red">
                    <?php 
                    if(isset($error["erreur"])) echo "الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
                    else if(isset($error["deactivated"])) echo "لقد تم تعطيل حسابك، الرجاء الاتصال برئيس المجلس في حال كان هذا خطأ";
                    ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative" style="font-size:40px;">تسجيل دخول المشرف على التطبيقة </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/loginJS/core/bootstrap.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    
    // eyes
    const passwordInput = document.getElementById('password-input');
const togglePassword = document.getElementById('toggle-password');

togglePassword.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('fa-eye-slash');
    }
});

   
  </script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
</body>

</html>