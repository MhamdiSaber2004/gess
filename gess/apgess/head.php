<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "db/db.php";

session_start();

if (!isset($_SESSION["idGess"])) {
  header("location: login/index.php");
  exit();
}



$idGess=$_SESSION['idGess'];

$sql = "SELECT * from gess where idGess='$idGess'";

$result = $conn->query($sql);
    

    $row = $result->fetch_assoc();
    $type=$row['type'];

    if ($type=="منطقة ماء صالح للشرب") 
    {
      $typeGess="AEP";
    }
    else if ($type=="منطقة سقوية") 
    {
      $typeGess="PI";
    }

    

$sql = "SELECT * from pompe where idGess='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
      header("Location: pompe.php");
      exit();
    }
//fgkass@gmail.com
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>المدير الفني </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <!--<link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">-->

  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Droid Arabic Kufi Font -->
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

  <!--Argon rtl CSS-->
  <link type="text/css" href="./assets/css/argon-rtl.css" rel="stylesheet">
  

  <!-- google fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


  <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
   /* margin-bottom: 0;  /* this affects the margin in the printer settings */
    /*margin-top:0px;*/
    margin:30px;
    background-color: white;
}
</style>

</head>

<body>

