
<?php

error_reporting(E_ERROR | E_PARSE);
include './db/db.php';
include_once "./controller/controller.php";

if (isset($_SESSION["idBenefique"])) {
    header("location: index.php");
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
  منتفع
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
  <nav class="navbar navbar-expand-lg  border-radius-lg top-0 z-index-3 navbar-transparent position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
           
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
  <!-- End Navbar -->.

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://halketwassl.com/wp-content/uploads/2022/02/%D9%81%D9%84%D8%A7%D8%AD%D8%A9.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">تسجيل حساب جديد!</h1>
            <p class="text-lead text-white">الرجاء تعمير كل الخانات</p>
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
                
                <h6 class="heading-small text-muted mb-4">معلومات عامة </h6>
                <hr class="" />
                <select class="form-control form-control-alternative" id="type" type="text" placeholder="" name="type" >
                <option value="">نوع المنتفع</option>
                <option value="صالح للشرب">صالح للشرب</option>
                <option value="سقوي">سقوي</option>
                      </select>
                </div>
                <div class="mb-3">
                  <input type="text" id="nom" name="nom" class="form-control" placeholder="الإسم و اللقب">
                </div>
                
                <div class="mb-3">
                  <input type="number" id="CIN" name="CIN" class="form-control" placeholder="رقم بطاقة التعريف">
                </div>
             
                <!-- Address -->
                <div class="mb-3">
                  <input type="text" id="address" name="address" class="form-control" placeholder="مكان السكنى">
                </div>
           
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">الإتصال  </h6>
                <div class="mb-3">
                  <input type="number" id="tel" name="tel" class="form-control" placeholder="رقم الهاتف">
                </div>
                <hr class="my-4" />
                
                <h6 class="heading-small  mb-4 text-danger" id="erreur"></h6>
                <div class="text-center">
                  <button type="button" id="continue" onclick ="return checkInputsBenefique()" name="continue" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Reset">متابعة</button>
                </div>
                <p class="text-sm mt-3 mb-0">لديك حساب ؟ <a href="login.php" class="text-dark font-weight-bolder">إضغط هنا لتسجيل الدخول</a></p>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary visually-hidden" data-bs-toggle="modal" id="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->

<div class="row">


<div class="col-md-6">
    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered " role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">تسجيل حساب جديد !</h3><br>
      <div class="text-center mb-4">الرجاء إختيار المجمع الموجود بمنطقتك !!</div>
        
          <div class="btn-wrapper text-center">
          <label class="form-control-label" for="etat">الولاية : &nbsp;&nbsp;</label>
                                 <select id="etat" onchange="chargerAccreditations()" class="form-control-alternative col-6" type="text" name="countryy" placeholder="الولاية">
                                    <option value="">أختر ولاية</option>
                                    <?php
                                       $sql = "SELECT * FROM etats_tunisie";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               echo '<option value="' . $row['id'] . '">' . $row['nom_etat'] . '</option>';
                                           }
                                       }
                                       
                                       ?>
                                 </select>
                                 <br>
<label class="form-control-label">المعتمدية : </label>
<select id="accreditation" class="form-control-alternative col-6" onchange="chargerGess()"    name="accreditation">                                 
<option value="">--------------------------------------</option>
</select>

                                 <br>
<label class="form-control-label">المجمع : &nbsp;&nbsp;</label>
                                 <select class="form-control-alternative col-6"  id="idGess" name="idGess">
                                 <option value="">--------------------------------------</option>
                                 </select>
                                 <br>
                                 <h6 class="heading-small  mb-4 text-danger" id="erreurGess"></h6>
            
          </div>
          
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button type="submit" name="signUp" onclick="return checkInputsGess()" class="btn btn-primary">تسجيل </button>
      </div>
          </div>
          
      </div>
  </div>
</div>

</div>
</div>
</form>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Creative Tim.
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



  var nom = document.getElementById("nom").value;
  var CIN = document.getElementById("CIN").value;
  var address = document.getElementById("address").value;
  var tel = document.getElementById("tel").value;
  var type = document.getElementById("type").value;
 
  var erreur = document.getElementById("erreur");

  if(nom==""|| CIN=="" || address=="" || tel=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }



  
/*
  if(mdp1!=mdp2)
  {
    erreur.innerHTML="كلمات السر غير مطابقة"
    return false;

  }



  if(mdp1.length < 8)
  {
    erreur.innerHTML="كلمة السر يجب أن تكون أكثر من 8 أحرف وأرقام"
    return false;

  }*/

  if(CIN < 1000000 || CIN > 19999999  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if((tel < 20000000 || tel > 29999999) && (tel < 40000000 || tel > 59999999) && (tel < 70000000 || tel > 79999999 ) && (tel < 90000000 || tel > 99999999)   )
  {
    erreur.innerHTML="رقم الهاتف خاطئ"
    return false;

  }
/*
  if(Number(dateN.substring(0,4)) < 1940 && Number(dateN.substring(0,4)) > 2000)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ الولادة";
    return false;

  }

  if(Number(dateCIN.substring(0,4)) < 1960 && Number(dateCIN.substring(0,4)) > 2010)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ بطاقات التعريف";
    return false;

  }*/
  if(type=="")
  {
    erreur.innerHTML="الرجاء إختيار نوع الانتفاع";
    return false;
  }

  erreur.innerHTML="";
  document.getElementById("modal").click();

 

}



function checkInputsGess(){
  var idGess = document.getElementById("idGess").value;


  if(idGess=="")
  {
    var erreurGess = document.getElementById("erreurGess");
    erreurGess.innerHTML="الرجاء إختيار المجمع";
    return false;
  }
 return true;

}



function chargerAccreditations() {
    var etatId = document.getElementById('etat').value;
    var selectAccreditation = document.getElementById('accreditation');

    // Efface toutes les options existantes dans la liste déroulante des accréditations
    selectAccreditation.innerHTML = '';

    if (etatId !== '') {

        // Effectuer une requête AJAX ou PDO pour obtenir les accréditations correspondant à l'ID de l'état sélectionné
        // en utilisant PHP pour interagir avec la base de données
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var accreditations = JSON.parse(xhr.responseText);

                var option = document.createElement('option');
                    option.value = "";
                    option.text = "--------------------------------------";
                    selectAccreditation.appendChild(option);
                // Créer les options pour les accréditations
                for (var i = 0; i < accreditations.length; i++) {
                    var option = document.createElement('option');
                    option.value = accreditations[i].nom_accreditation;
                    option.text = accreditations[i].nom_accreditation;
                    selectAccreditation.appendChild(option);
                }
            }
        };
        xhr.open('GET', 'controller/get_accreditations.php?etat_id=' + etatId, true);
        xhr.send();
    }
}


function chargerGess() {

    var etatId = document.getElementById('accreditation').value;
    var selectAccreditation = document.getElementById('idGess');
    // Efface toutes les options existantes dans la liste déroulante des accréditations
    selectAccreditation.innerHTML = '';
    if (etatId !== '') {
        // Effectuer une requête AJAX ou PDO pour obtenir les accréditations correspondant à l'ID de l'état sélectionné
        // en utilisant PHP pour interagir avec la base de données
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var accreditations = JSON.parse(xhr.responseText);
                var option = document.createElement('option');
                    option.value = "";
                    option.text = "--------------------------------------";
                    selectAccreditation.appendChild(option);
                // Créer les options pour les accréditations
                for (var i = 0; i < accreditations.length; i++) {
                    var option = document.createElement('option');
                    option.value = accreditations[i].idGess;
                    option.text = accreditations[i].nom_accreditation;
                    selectAccreditation.appendChild(option);
                }
            }
        };
        xhr.open('GET', 'controller/get_gess.php?etat_id=' + etatId, true);
        xhr.send();
    }
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