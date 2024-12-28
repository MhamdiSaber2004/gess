<?php

error_reporting(E_ERROR | E_PARSE);
include './db/db.php';
include_once "./controller/controller.php";

if (isset($_SESSION["idBenefique"])) {
    header("location: index.php");
    exit();
  }

?>


<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary visually-hidden" data-bs-toggle="modal" id="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">تسجيل حساب</h1>
      </div>
      <div class="modal-body">
      <div class="text-center text-primary">.لقد تم تسجيل طلب فتح الحساب بنجاح </div>
      <div class="text-center text-primary">.سيتم التواصل معك في أقرب وقت ممكن</div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary"href="./login.php">الذهاب إلى تسجيل الدخول</a>
        <a type="button" class="btn btn-primary" href="https://ness.com.tn">العودة إلى الصفحة الرئسية</a>
      </div>
    </div>
  </div>
</div>
  <script>
   window.addEventListener('load', function () {
  document.getElementById("modal").click();
})
   
  </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>