<?php session_start();



if (!isset($_SESSION["loginAdmin"])) {

  header("location: ../login.php");

  exit();

}



include '../db/db.php';
$idGess=$_GET['id'];
if (isset($_GET['id']) && !empty($_GET['id'])){
  if(isset($_POST['submitupdate'])){
    $type=$_POST['selectup'];
    header("Location: update/aep.php?idGess=$idGess&type=$type"); 
    exit();
  
    
  }



function getNomEtat($id, $conn){

  $id = $conn->real_escape_string($id);



  // SQL query to retrieve nom_etat

  $sql = "SELECT nom_etat FROM etats_tunisie WHERE id = $id";

  

  $result = $conn->query($sql);



  if ($result->num_rows > 0) {

      $row = $result->fetch_assoc();

      return $row['nom_etat'];

  } else {

      return "No matching record found.";

  }



}

function getFilesUrl($tab) {

  if ($tab === null) {

      return "لا";

  } 

  else if (substr($tab, 0, 1)=="[") {

    $tab = str_replace("'", "\"", $tab);

      $files = json_decode($tab, true); // Convert the JSON string to an array

      if (is_array($files)) {

          $output = "نعم ";

          foreach ($files as $index => $file) {

              $output .= '&nbsp &nbsp<a href="/gess/aep/documents/' . $file . '" target="_blank">وثيقة ' . ($index + 1) . ' </a>&nbsp &nbsp  ';

              

          }

          return $output;

      } 

      

      else {

          return "لا ";

      }

  }

  else {

    return '<a href=/gess/aep/documents/' . $tab . ' target="_blank">وثيقة   </a>';

  }



}

function yesOrNo($etat){

  if ($etat==1){

    return "نعم";

  }

  else {

    return "لا";

  }

}

if(isset($_POST['submitForm'])) {



    $nom_utilisateur = $_POST["nom_utilisateur"];

    $email_utilisateur = $_POST["email_utilisateur"];

    $mdp = $_POST["mdp"];



    $sql = "UPDATE utilisateurs SET 

    nom_utilisateur = '$nom_utilisateur',

    email_utilisateur = '$email_utilisateur',

    mdp = '$mdp'

    WHERE idGess = $idGess";

      $sql2 = "UPDATE gess SET etat=1  WHERE idGess = $idGess";

      $conn->query($sql2);  

      $conn->query($sql) ;







}

if(isset($_POST['submitForm1'])) {



    $sql2 = "UPDATE gess SET etat=-1  WHERE idGess = $idGess";

    $conn->query($sql2);  







}



?>



<!-- Display the details of the element -->





<!DOCTYPE html>

<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

  <meta charset="UTF-8">

  <title>معلومات</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <style>
.custom-select {
            display: inline-block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem 1.75rem .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 8 8'%3e%3cpath fill='%231a2b34' d='M4 4l-4 4H0l4-4-4-4h.75L4 3.25l3.25-3.25H8L4 4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    table {

      border-collapse: collapse;

      width: 100%;

    }



    th, td {

      border: 1px solid #000000;

      padding: 8px;

      text-align: right;

      direction: ltr;

    }



    th {

      background-color: #6e6e6e;

      color: aliceblue;

      text-align : center;

    }



    tr:nth-child(even) {

      background-color: #f9f9f9;

    }

    .capture-button {

      display: block;

      margin: 20px auto;

      padding: 10px 20px;

      background-color: #007bff;

      color: #ffffff;

      border: none;

      border-radius: 4px;

      font-size: 16px;

      cursor: pointer;

    }

    .accept-button {

      display: block;

      margin: 20px auto;

      padding: 10px 20px;

      background-color: green;

      color: #ffffff;

      border: none;

      border-radius: 4px;

      font-size: 16px;

      cursor: pointer;

    }

   

   

    .refuse-button {

      display: block;

      margin: 20px auto;

      padding: 10px 20px;

      background-color: red;

      color: #ffffff;

      border: none;

      border-radius: 4px;

      font-size: 16px;

      cursor: pointer;

    }



    /* CSS for print media */

     @media print {

      .capture-button,.accept-button,.refuse-button {

        display: none;

      }

      th {

          color : black;

      }

      body {

        zoom : 76%



      }

    }

    @media  (max-width: 768px) {

      body {

        padding: 2px !imprtant;

      }

      button{

    }

}

@media  (min-width: 769px) {

  table{

      font-size: 16px;

    }

     body{

      padding: 250px;

      padding-top: 20px;

      zoom: 80%;

    }

   

      

}

  </style>

</head>

<body>

<div style="display:flex;">
<button class="capture-button" onclick="location.href='../index.php?page=request'">رجوع</button>
<button class="capture-button"  data-bs-toggle="modal" data-bs-target="#exampleModal4">تحيين</button>




<?php 

  

  $sqla = "SELECT * FROM gess WHERE idGess=$idGess";



  $resulta = $conn->query($sqla);

  if (!($resulta->num_rows > 0)){

    header("Location: notfound.php");

  }

  if ($resulta->num_rows > 0) {

    while ($row = $resulta->fetch_assoc()) {

      if ($row['type']!="منطقة ماء صالح للشرب"){

        

      }

      if($row["etat"] != 1){

      

      ?>

<button class="accept-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">قبول</button>





   <?php }

    if($row["etat"] != -1){ ?>

    <button class="refuse-button"  data-bs-toggle="modal" data-bs-target="#exampleModal2" >رفض</button>



  <?php  }

  

  

  }} ?>



<button class="capture-button" onclick="capturePage()">طباعة</button>

</div>

<table>

  <tr>

    <th colspan="8" > تقديم المجمع    </th>

    

  </tr>

 

   

  <?php 

  

  $sql = "SELECT * FROM gess WHERE idGess=$idGess";



  $result = $conn->query($sql);



  if ($result->num_rows > 0) {

      // Output data of each row

      while ($row = $result->fetch_assoc()) {

         



          echo "

          <tr>

          

            <td colspan='2'  style='font-weight: bold;'   >".$row["decanat"]."</td>

            <td colspan='2' style='background-color: #eee7e7;'>  العمادة</td> 

            <td colspan='2' style='font-weight: bold;'  >".$row["nom"] ."</td>

            <td colspan='2' style='background-color: #eee7e7;'> اسم المجمع</td>

          </tr>

          <tr>

            <td colspan='2'   style='font-weight: bold;'  >".$row["date_creation"]." </td>

            <td colspan='2' style='background-color: #eee7e7;'>تاريخ التأسيس</td> 

            <td colspan='2'  style='font-weight: bold;'  >".getNomEtat($row['etat_tunisie'], $conn)."</td>

            <td colspan='2' style='background-color: #eee7e7;'>الولاية</td>

          </tr>

          <tr >

            <td colspan='2'  style='font-weight: bold;'   > ".$row["date_debut"]." </td>

            <td colspan='2' style='background-color: #eee7e7;'>تاريخ بداية نشاط المجمع</td>

            <td colspan='2'  style='font-weight: bold;'  style='font-weight: bold;' >".$row['accreditation']."</td>

            <td colspan='2' style='background-color: #eee7e7;'>المعتمدية </td>

          </tr>

      

        

          ";

      }

  }

  

  

  

  

  ?>

  

  

 

  <tr>

    <th colspan="8" >المستخدم    </th>

    </tr>

    <?php 

     $sql1 = "SELECT * FROM utilisateurs WHERE idGess=$idGess";



     $result1 = $conn->query($sql1);

   

     if ($result1->num_rows > 0) {

         while ($row = $result1->fetch_assoc()) {



         echo "

         

              <tr>

              

              <td colspan='2'  style='font-weight: bold;'  >".$row["tel_utilisateur"]."</td>

              <td colspan='2' style='background-color: #eee7e7;'>رقم الهاتف</td>

              <td colspan='2'   style='font-weight: bold;'  >".$row["nom_utilisateur"]." </td>

              <td colspan='2' style='background-color: #eee7e7;'> الاسم و اللقب</td>

            </tr>

            <tr>  

            <td colspan='2'  style='font-weight: bold;'  >".$row["email_utilisateur"]." </td>

            <td colspan='2' style='background-color: #eee7e7;'>البريد الإلكتروني</td>

              <td colspan='2'  style='font-weight: bold;'  > ".$row["role_utilisateur"]."</td>

              <td colspan='2' style='background-color: #eee7e7;'>الصفة</td>

            </tr>

             

          

         ";





         }}



  ?>

<tr>



    <th colspan="8">معطيات حول اعضاء المجلس    </th>

  </tr>

  <tr>

         <td colspan="1"  style="background-color: #eee7e7;"> بطاقة التعريف</td>

    <td colspan="1"  style="background-color: #eee7e7;">رقم الهاتف</td>

    <td colspan="1"  style="background-color: #eee7e7;">الأقدمية </td> 

    <td colspan="1"  style="background-color: #eee7e7;">المستوى التعليمي </td> 

    <td colspan="1"  style="background-color: #eee7e7;"> العمر</td> 

    <td colspan="1"  style="background-color: #eee7e7;">الدور </td> 

    <td colspan="2"  style="background-color: #eee7e7;">الاسم و اللقب </td> 

  </tr>

  <?php 

     $sql4 = "SELECT * FROM membre_conseil WHERE idGess=$idGess";



     $result4 = $conn->query($sql4);

   

     if ($result4->num_rows > 0) {

         $y=0;

         while ($row = $result4->fetch_assoc()) { 
             if (strlen($row["nom_prenom"])>0) {

                 $y=$y+1;

         ?>

 <tr>

        <td colspan="1"   style='font-weight: bold;'  > <?php echo getFilesUrl($row["cp_cin"]); ?></td>

<td colspan="1"   style='font-weight: bold;'  > <?php if ($row["num_tel"] != 0 ) {echo $row["num_tel"];}  ?></td>

    <td colspan="1"   style='font-weight: bold;'  ><?php echo $row["anciennete"] ;?> </td> 

    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["niveau_education"] ;?> </td> 

    <td colspan="1"  style='font-weight: bold;'  > <?php echo $row["age"] ;?></td> 

    <td colspan="1"   style='font-weight: bold;' ><?php echo $row["role"] ;?> </td> 

    <td colspan="2"   style='font-weight: bold;' >  <?php echo $row["nom_prenom"] ;?> </td> 

    </tr>



<?php }



}

   if ($y==0) {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; }      

         

         

     }



else {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; }



?>

  

  <tr>

    <th colspan="8">معطيات حول هيئة المراقبة الداخلية    </th>

  </tr>

  <tr>

    <td colspan="2"  style="background-color: #eee7e7;">رقم الهاتف</td>

    <td colspan="1"  style="background-color: #eee7e7;">الأقدمية </td> 

    <td colspan="1"  style="background-color: #eee7e7;">المستوى التعليمي </td> 

    <td colspan="1"  style="background-color: #eee7e7;"> العمر</td> 

    <td colspan="1"  style="background-color: #eee7e7;">	الصفة  </td> 

    <td colspan="2"  style="background-color: #eee7e7;">الاسم و اللقب </td> 

  </tr>

  <?php 

     $sql5 = "SELECT * FROM controle_interne WHERE idGess=$idGess";



     $result5 = $conn->query($sql5);

   

     if ($result5->num_rows > 0) {

         $k=0;

         while ($row = $result5->fetch_assoc()) { 

             if(strlen($row["nom_prenom"])>0){

                 $k=$k+1;

         ?>

 <tr>

<td colspan="2"   style='font-weight: bold;'  > <?php if ($row["num_tel"] != 0 ) {echo $row["num_tel"] ;} ;?></td>

    <td colspan="1"   style='font-weight: bold;'  ><?php echo $row["anciennete"] ;?> </td> 

    <td colspan="1"  style='font-weight: bold;'  > <?php echo $row["niveau_education"] ;?> </td> 

    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["age"] ;?></td> 

    <td colspan="1"  style='font-weight: bold;'  ><?php echo $row["role"] ;?> </td> 

    <td colspan="2"   style='font-weight: bold;; background-color: #fcf6f6;' >  <?php echo $row["nom_prenom"] ;?> </td> 

    </tr>



<?php }}

         

     if ($k==0) {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; }

     }

else {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; }





?>

  <tr>

    <th colspan="8">  معطيات حول توزيع الماء    </th>

  </tr>

  <?php 

     $sql5 = "SELECT * FROM distribution_eau WHERE idGess=$idGess";



     $result5 = $conn->query($sql5);

   

     if ($result5->num_rows > 0) {

         while ($row = $result5->fetch_assoc()) { ?>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php  echo ($row["robinet_public"]);?> </td>  

    <td colspan="2" style="background-color: #eee7e7;">حنفية عمومية     </td> 

    <td colspan="2"  style='font-weight: bold;' > <?php echo $row["liaison_prive"] ;?>  </td> 

    <td colspan="2" style="background-color: #eee7e7;">     ربط خاص</td> 

  </tr>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php echo $row["liaison_public"] ;?>  </td> 

    <td colspan="2" style="background-color: #eee7e7;">ربط عمومي      </td> 

    <td colspan="2"  style='font-weight: bold;' > <?php  echo ($row["fournisseurs_reservoirs"]);?> </td> 

    <td colspan="2" style="background-color: #eee7e7;">   عدد مزودين الصهاريج  </td> 

  </tr>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["file_robinet_util_public"]);?> </td> 

    <td colspan="2" style="background-color: #eee7e7;">  حنفية استعمال عمومي       </td> 

    <td colspan="2"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["file_reservoir_public"]);?> </td> 

    <td colspan="2" style="background-color: #eee7e7;">صهاريج استعمال عمومي       </td> 

  </tr>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["file_robinet_util_prive"]);?> </td> 

    <td colspan="2" style="background-color: #eee7e7;">حنفية استعمال خاص      </td> 

  <td colspan="2"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["files_reservoir_prive"]);?> </td>  

    <td colspan="2" style="background-color: #eee7e7;">صهاريج استعمال خاص      </td> 

  </tr>

  <tr>

    

  

  </tr>

  



  <?php }} ?>

  <tr>

    <th colspan="8">الحراس</th>

  </tr>

  <?php 

     $sql5 = "SELECT * FROM gardes WHERE idGess=$idGess";



     $result5 = $conn->query($sql5);

   

     if ($result5->num_rows > 0) {

         while ($row = $result5->fetch_assoc()) { ?>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php  echo ($row["bailleurs"]);?> </td>  

    <td colspan="2" style="background-color: #eee7e7;">المتطوعين      </td> 

    <td colspan="2"  style='font-weight: bold;' > <?php echo $row["nombre"] ;?>  </td> 

    <td colspan="2" style="background-color: #eee7e7;">     العدد </td> 

  </tr>

  <tr>

  <td colspan="2"  style='font-weight: bold;' > <?php echo $row["paiement"] ;?>  </td> 

    <td colspan="2" style="background-color: #eee7e7;">طريقة الخلاص       </td> 

    <td colspan="2"  style='font-weight: bold;' > <?php  echo ($row["benevoles"]);?> </td> 

    <td colspan="2" style="background-color: #eee7e7;">   المؤجرين   </td> 

  </tr>

 

  

  </tr>

  



  <?php }} ?>



  <tr>

    <th colspan="8">الجوانب المالية </th>

  </tr>

  <?php 

     $sql8 = "SELECT * FROM aspects_financiers WHERE idGess=$idGess";



     $result8 = $conn->query($sql8);

   

     if ($result8->num_rows > 0) {

         while ($row = $result8->fetch_assoc()) { ?>

 

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["beneficiaires_dettes"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;"> ديون المنتفعين</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["montant_abonnement"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;"> مبلغ الاشتراك</td> 

  </tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["steg"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;"> ديون الشركة الوطنية لاستغلال و توزيع المياه</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo ($row["prix_eau_m3"])  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">   تسعيرة بيع الماء م3</td> 

  </tr>

  <tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["soned"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">     ديون الشركة التونسية للكهرباء و الغاز</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["tarification"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">  تسعيرة عمومية</td> 

  </tr>

  <tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["crda"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">ديون المندوبية الجهوية للتنمية الفلاحية    </td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["facturation"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">الفوترة</td> 

  </tr>

  <tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["autre_dettes"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;"> ديون أخرى</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["beneficiaires_a_temps"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">عدد المنتفعين الذين يسددون في الوقت    </td> 

  </tr>

  <tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["compte_courant"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">الحساب الجاري</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["beneficiaires_delai"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">عدد المنتفعين الذين يسددون خارج الأجل المحدد </td> 

  </tr>

  <tr>

  <td colspan="2" style='font-weight: bold;'> <?php echo $row["fonds"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">الصندوق </td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo $row["beneficiaires_jamais"]  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">عدد المنتفعين الذين لم يسددوا أبدا </td> 

  </tr>

  

 <?php }} ?>





 <tr>

    <th colspan="8">الوثائق الإدارية والقانونية
</th>

  </tr>  

  



  <?php 

     $sql12 = "SELECT * FROM d_admin_juridiques WHERE idGess=$idGess";



     $result12 = $conn->query($sql12);

   

     if ($result12->num_rows > 0) {

         while ($row = $result12->fetch_assoc()) { ?>





  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["registre"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">دفتر محاضر جلسات الاجتماعات الخاصة بمجلس الادارة</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["pub_off"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الاشهار  بالرائد الرسمي</td>

  </tr>

  

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["contrat_gestion"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> عقد التصرف</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["loi_fonda"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">القانون الأساسي</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["registre_inscri"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">دفتر الانخراط</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["dossier_seance"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">ملف الجلسة العامة </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  </td>

    <td colspan="2" style="background-color: #eee7e7;"></td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["loi_interieur"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">النظام الداخلي</td>

  </tr>

  

  <?php }} ?>



  

 <tr>

    <th colspan="8">    الوثائق المالية</th>

  </tr>  

  



  <?php 

     $sql122 = "SELECT * FROM documents_financiers WHERE idGess=$idGess";



     $result122 = $conn->query($sql122);

   

     if ($result122->num_rows > 0) {

         while ($row = $result122->fetch_assoc()) { ?>





  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["compte_courant"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">      حساب جاري</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["revenus_depenses"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">   دفتر المداخيل و المصاريف</td>

  </tr>

  

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["budget"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">    الميزانية</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["budget_balancement"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">  الميزانية و الموازنة </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["docs_support"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> وجود الوثائق المدعمة</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["factures_compta"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> الفواتير   </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  </td>

    <td colspan="2" style="background-color: #eee7e7;"></td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["compta_generale"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">  دفتر المحاسبة</td>

  </tr>

  

  <?php }} ?>



  <tr>

    <th colspan="8">    الوثائق الفنية</th>

  </tr>  

  



  <?php 

     $sql122 = "SELECT * FROM documents_technique WHERE idGess=$idGess";



     $result122 = $conn->query($sql122);

   

     if ($result122->num_rows > 0) {

         while ($row = $result122->fetch_assoc()) { ?>





  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["suivi_conso_facturation"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">       دفتر متابعة الاستهلاك و الفوترة الخاص</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["lecture_compteur"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">  سجل قراءة العداد    </td>

  </tr>

  

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["station_pompage"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">    دفتر محطة الضخ الكهربائية المتوسطة الجهد</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["etude_projet"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">    دراسة المشروع </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo ($row["budget"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> الميزانية  </td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["plan_reseau"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> مخطط الشبكة   </td>

  </tr>

 

  

  <?php }} ?>

  





 <tr>

    <th colspan="8">تأمين تعقيم الماء</th>

  </tr>

  <?php 

     $sql9 = "SELECT * FROM assurer_sterilisation_eau WHERE idGess=$idGess";



     $result9 = $conn->query($sql9);

   

     if ($result9->num_rows > 0) {

         while ($row = $result9->fetch_assoc()) { ?>

  <tr>

    <td colspan="2" style='font-weight: bold;'><?php echo yesOrNo($row["situation_assurance_organisee"])." ".str_replace( array("نعم", "لا"), "", getFilesUrl($row["file_situation_organisee"]));  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">وضعية تأمين منظمة  </td> 

    <td colspan="2" style='font-weight: bold;'><?php echo yesOrNo($row["pompe_dosage"])." ".str_replace( array("نعم", "لا"), "", getFilesUrl($row["file_pompe_dosage"]));  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">مضخة تحديد الجرعات    </td> 

 </tr>

  <tr>

    <td colspan="2"></td> 

    <td colspan="2"></td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["situation_assurance_appliquee"] )." ".str_replace( array("نعم", "لا"), "", getFilesUrl($row["file_situation_appliquee"])); ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">وضعية تأمين مطبقة  </td> 

  </tr>

  <?php }}?>

  <tr>

    <th colspan="8">  في حالة عطب . بأي شركة أو تقني تتصل ؟</th>

  </tr>

  

  <?php 

     $sql10 = "SELECT * FROM en_cas_de_panne WHERE idGess=$idGess";



     $result10 = $conn->query($sql10);

   

     if ($result10->num_rows > 0) {

         while ($row = $result10->fetch_assoc()) {

          if (strlen($row["nom_societe_technicien"])>1 ){

          

          ?>

          <tr>

    <td colspan="2" style="background-color: #eee7e7;">رقم الهاتف</td> 

    <td colspan="2" style='background-color: #eee7e7;'> المجال</td> 

    <td colspan="4" style="background-color: #eee7e7;">اسم الشركة أو التقني</td> 

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'><?php  if ($row["numero_telephone"] != 0 ) {echo $row["numero_telephone"] ;} ;  ?></td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo ($row["domaine"])  ?></td> 

    <td colspan="4" style='font-weight: bold;'><?php echo ($row["nom_societe_technicien"])  ?></td> 

  </tr>

   <?php }

  else {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; } ?>



  <?php }}

  else {

    echo "<tr>

    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>" ; } ?>



  <tr>

    <th colspan="8">   جودة التدخل</th>

  </tr>  

  <?php

   $sql101 = "SELECT * FROM gess WHERE idGess=$idGess";



   $result101 = $conn->query($sql101);

 

   if ($result101->num_rows > 0) {

  while ($row = $result101->fetch_assoc()) { ?>

  <tr>

    <td colspan="8" style="background-color: #eee7e7; font-weight: bold;"><?php  echo ($row["qualite_interventions"])  ?></td>

  </tr>

<?php }} ?>



<tr>

    <th colspan="8">الوثائق الموجودة</th>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف اجتماعات مجلس الادارة</td>

  </tr>

  <?php 

     $sql9 = "SELECT * FROM documents_existants WHERE idGess=$idGess";



     $result9 = $conn->query($sql9);

   

     if ($result9->num_rows > 0) {

         while ($row = $result9->fetch_assoc()) { ?>

  <tr>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["registre_recettes_annee"]);   ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">دفتر الايصالات لسنة 2021</td> 

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["registre_revenus_depenses_annee"])  ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">دفتر المداخيل و المصاريف لسنة 2020

</td> 

 </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["factures"] ) ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;">فاتورات 2021</td> 

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["budget_annee"] ) ?></td> 

    <td colspan="2"  style="background-color: #eee7e7;"> الميزانية و الموازنة لسنة 2022   </td> 

  </tr>

  <?php }}?>



  <tr>

    <th colspan="8">  الوثائق الادارية</th>

  </tr>  

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف أعوان المجمع</td>

  </tr>

  <tr>

    <td colspan="2" style="background-color: #eee7e7;">شهادة </td>

    <td colspan="2" style="background-color: #eee7e7;">مطلب شغل</td>

    <td colspan="2" style="background-color: #eee7e7;">نسخة من ب.ت.و</td>

    <td colspan="2" style="background-color: #eee7e7;">الصفة</td>

  </tr>

  <?php 

     $sql11 = "SELECT * FROM documents_employee WHERE idGess=$idGess";



     $result11 = $conn->query($sql11);

   

     if ($result11->num_rows > 0) {

         while ($row = $result11->fetch_assoc()) { ?>

 

  <tr>

  <td colspan="2"style='font-weight: bold;'><?php echo getFilesUrl($row["attestation_de"])  ?></td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["exigence_de"])  ?> </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["cin_de"])  ?></td>

    <td colspan="2" style='font-weight: bold;background-color: #fcf6f6;'><?php echo $row["role_de"]  ?>  </td>

  </tr>

  <?php }} else{?>

    <tr>

    <td colspan="8" style='font-weight: bold;text-align:center;'>لا يوجد </td>

  <tr>

  <?php } ?>



  <?php 

     $sql12 = "SELECT * FROM documents_administratifs WHERE idGess=$idGess";



     $result12 = $conn->query($sql12);

   

     if ($result12->num_rows > 0) {

         while ($row = $result12->fetch_assoc()) { ?>



    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف  المراسلات</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["importations"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">الواردات</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["exportations"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الصادرات</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">  ملف محاضر الجلسات العامة</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["comptes_rendus"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">المحاضر</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["rapports"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">التقارير</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["listes"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">القوائم</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["listes_presence"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">قائمات الحضور</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">  ملف اجتماعات مجلس الادارة</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["programme_collaboratif"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">برنامج العمل التشاركي</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["registre_comptes_rendus_seances"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">دفتر محاضر الجلسات</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  </td>

    <td colspan="2" style="background-color: #eee7e7;"></td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["convocations"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الاستدعاءات</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">  دفتر الانخراطات </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> </td>

    <td colspan="2" style="background-color: #eee7e7;"></td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["registre_adhesions"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">دفتر الانخراطات</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">   ملف المنتفعين </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["inventaire_biens_collectifs"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">جرد لممتلكات المجمع</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["listes_mises_a_jour"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">القوائم المحينة</td>

  </tr>

  <tr>

   <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["conseil_administration"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">ملف أعضاء مجلس الادارة و مهامهم</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["demandes_raccordement_reseau"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">طلبات الربط بالشبكة</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["donnees_statistiques_activite_collectif"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">ملف البيانات و الاحصاءات حول نشاط المجمع</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["engagements"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الالتزامات</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["cahiers_visites"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">كراس الزيارات</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["delegations"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">التوكيلات</td>

  </tr>



  </tr>

  <?php }} ?>





  <tr>

    <th colspan="8">   الملف القانوني</th>

  </tr>  

  



  <?php 

     $sql12 = "SELECT * FROM dossier_juridique WHERE idGess=$idGess";



     $result12 = $conn->query($sql12);

   

     if ($result12->num_rows > 0) {

         while ($row = $result12->fetch_assoc()) { ?>



    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف  احداث المجمع</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["rapports1"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">التصريح</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["publication_journal_officiel"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الإعلان بالرائد الرسمي </td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">  القوانين و النصوص الخاصة بالمجامع  </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["reglement_interieur"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">النظام الداخلي</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["statuts_fondamentaux"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">القانون الأساسي</td>

  </tr>



  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">عقود الانتفاع بالماء المبرمة مع المنتفعين او الفلاحين</td>

  </tr>

 

  <tr>

    <td colspan="2" style='font-weight: bold;'>  </td>

    <td colspan="2" style="background-color: #eee7e7;"></td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["contrats_utilisation_eau"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">عقود الانتفاع بالماء المبرمة مع المنتفعين او الفلاحين</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">   ملف العقود المبرمة مع مختلف الأطراف </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["eau"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الماء</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["electricite"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">الكهرباء </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["contrat_gestion_systeme_hydrique"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">عقد التصرف في النظام المائي</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["contrats_manutention"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">عقود المناولة </td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف أعوان المجمع</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["dossier_mandat"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> ملف الانتداب </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["contrats"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> العقود    </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["proces_verbaux_mandatement_determination_salaires"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;"> محاضر المصادقة على الانتداب و تحديد الأجرة</td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["cartes_versement_salaires"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">  بطاقات خلاص الأجور</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  </td>

    <td colspan="2" style="background-color: #eee7e7;">  </td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["dossier_etat_civil_agents"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">ملف الحالة المدنية للأعوان</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">ملف الضمان الاجتماعي  </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["autorisations_periodiques"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> التصاريح الدورية</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["certificat_inscription"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">شهادة التسجيل</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> </td>

    <td colspan="2" style="background-color: #eee7e7;"> </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["recus_paiement"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">وصولات الدفع</td>

  </tr>

  <tr>

    <td colspan="8" style="text-align: center;background-color: #eee7e7; font-weight: bold;">     الملف الجبائي </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["1_autorisations_periodiques"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">   التصاريح الدورية</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["carte_identite_fiscale"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> بطاقة التعريف الجبائية</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> </td>

    <td colspan="2" style="background-color: #eee7e7;"> </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["1_recus_paiement"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">وصولات الدفع</td>

  </tr>

  <?php }} ?>



  

  <tr>

    <th colspan="8">   الملف الفني</th>

  </tr>  

  



  <?php 

     $sql12 = "SELECT * FROM dossier_technique WHERE idGess=$idGess";



     $result12 = $conn->query($sql12);

   

     if ($result12->num_rows > 0) {

         while ($row = $result12->fetch_assoc()) { ?>





  

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["etudes_techniques"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">    مختلف الدراسات الفنية المتعلقة بالمشروع </td>

     <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["stations_pompage"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">    محطات الضخ</td>

  </tr>

  <tr>

        <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["caracteristiques_techniques"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> ملف الخصائص و المواصفات الفنية للتجهيزات</td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["registre_pompage"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">دفتر محطة الضخ</td>

  

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["documents_suivi"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">   وثائق متابعة الاستغلال </td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["reseau_eau"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">   الشبكة المائية</td>

  </tr>



  <tr>

       <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["maintenance_preventive"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">   الصيانة الدورية و الوقائية</td>



    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["reservoirs"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> الخزانات</td>

  </tr>

 

 



  <?php }} ?>





  

  

  <tr>

    <th colspan="8">   الملف المالي</th>

  </tr>  

  



  <?php 

     $sql12 = "SELECT * FROM dossier_financier WHERE idGess=$idGess";



     $result12 = $conn->query($sql12);

   

     if ($result12->num_rows > 0) {

         while ($row = $result12->fetch_assoc()) { ?>





  

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["fichier_abonnements"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">  ملف الاشتراكات  </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["factures_approbations"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> الفواتير و مؤيدات الفوترة    </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["rapports_controle_comptable"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">     تقارير مراقب الحسابات </td>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["budgets_anuels"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">    نسخ من الميزانيات و الموازنات السنوية </td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["rapports_periodiques"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> الجذاذات الدورية لمتابعة الاستغلال و الفوترة و الاستخلاص </td>

    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["releves_compteurs"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">   رفع العدادات الدورية و التقارير الدورية للاستغلال </td>

  </tr>



  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["comptabilite"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">  دفتر المحاسبة</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["etat_compte_courant"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> كشوفات الحساب الجاري</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["rapports_financiers"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> تقارير الوضعية المالية</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["justificatifs_depenses"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> مؤيدات المصاريف</td>

  </tr>

 

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["dettes_fournisseurs"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">    دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين</td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["cartes_adhesion"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;">   كنشات بطاقات الانخراط</td>

  </tr>

  <tr>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["dettes_association"])  ?></td>

    <td colspan="2" style="background-color: #eee7e7;">قائمة ديون الجمعية ازاء المزودين </td>

    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["recevabilites_livraison"])  ?> </td>

    <td colspan="2" style="background-color: #eee7e7;"> كنشات وصل التسليم</td>

  </tr>

 

  <?php }} ?>

</table>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-5 text-end" id="exampleModalLabel">تأكيد القبول</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <form method="POST">

          <?php 



$sql1 = "SELECT * FROM utilisateurs WHERE idGess=$idGess";



$result1 = $conn->query($sql1);



if ($result1->num_rows > 0) {

    while ($row = $result1->fetch_assoc()) {



      echo "

      <div class='mb-3'>

      <label for='exampleInputEmail1' class='form-label text-end'>   صفة المستخدم</label>

      <input type='text' class='form-control' value='".$row["role_utilisateur"]."' id='exampleInputEmail1' aria-describedby='emailHelp' disabled>

    </div>

      <div class='mb-3'>

            <label for='exampleInputEmail1' class='form-label text-end'>  الاسم و اللقب</label>

            <input type='text' class='form-control' name='nom_utilisateur'  value='".$row["nom_utilisateur"]."' id='exampleInputEmail1' aria-describedby='emailHelp'>

          </div>

          <div class='mb-3'>

            <label for='exampleInputEmail1' class='form-label text-end' > البريد الإلكتروني</label>

            <input type='email' class='form-control' name='email_utilisateur' required value='".$row["email_utilisateur"]."' id='exampleInputEmail1' aria-describedby='emailHelp'>

          </div>

          <div class='mb-3'>

            <label for='exampleInputPassword1' class='form-label text-end'>كلمة المرور</label>

            <input type='text' class='form-control' name='mdp' id='exampleInputPassword1' required>

            <span  style='color : green;'>الرجاء إنشاء كلمة مرور  </span>

          </div>

         

        

      

      ";







    }}



?>

      <div class='modal-footer'>

    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>إغلاق</button>

    <button class='btn btn-primary' type="submit" name="submitForm">حفظ التغييرات</button>

  </div>   

        </form>

      </div>

      

    </div>

  </div>

</div>



<!-- Modal 2 -->
<div class="modal fade" id="exampleModal4" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-end" id="exampleModalLabel2">تحيين المعطيات</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
        <div class="modal-body">
       
   
      <div class='mb-3'>
      <label for='exampleInputEmail1' class='form-label text-end' style="font-size:22px; margin-bottom:24px;">   الرجاء اختيار القسم المراد تحيينه</label>
          
      <select class="custom-select" data-live-search="true" name="selectup" id="upddated">
                    <option value="gess">تقديم المجمع</option>
                    <option value="utilisateurs" >المستخدم</option>
                    <option value="membre_conseil" >معطيات حول اعضاء المجلس</option>
                    <option  value="controle_interne">معطيات حول هيئة المراقبة الداخلية</option>
                    <option  value="distribution_eau">  معطيات حول توزيع الماء</option> 
                    <option  value="gardes">  الحراس </option>
                    <option  value="aspects_financiers">  الجوانب المالية </option>
                    <option value="d_admin_juridiques" >الوثائق الإدارية والقانونية</option>
                    <option  value="documents_financiers">   الوثائق المالية </option>
                    <option  value="documents_technique"> الوثائق الفنية </option>
                    <option  value="assurer_sterilisation_eau">  تأمين تعقيم الماء </option>
                    <option  value="qualite_interventions">  جودة التدخل  </option>
                    <option  value="documents_existants">الوثائق الموجودة</option>
                    <option  value="documents_administratifs">الوثائق الادارية </option>
                    <option  value="dossier_juridique">الملف القانوني </option>
                    <option  value="dossier_technique">الملف الفني </option>
                    <option  value="dossier_financier">الملف المالي </option>
                    
                    
                    <!-- Add more options as needed -->
                </select>
                </div>
                </div>
      <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>إغلاق</button>
    <button class='btn btn-primary' type="submit"  onclick="updateData()" name="submitupdate"> تحيين</button>
  </div>   
        </form>
      </div>
      
    </div>
  </div>
</div>


<!-- Modal 2 -->

<div class="modal fade" id="exampleModal2" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h1 class="modal-title fs-5 text-end" id="exampleModalLabel2">تأكيد الرفض</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <form method="POST">

        <div class="modal-body">

        <p style ="font-size : 18px;">

هل أنت متأكد من رفض هذا المجمع ؟</p>

      </div>

      <div class='modal-footer'>

    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>إغلاق</button>

    <button class='btn btn-danger' type="submit" name="submitForm1"> رفض</button>

  </div>   

        </form>

      </div>

      

    </div>

  </div>

</div>

<script>

  function capturePage() {

    // Use window.print() to open the print dialog

    window.print();

  }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>



<!-- Mirrored from gcs.org.tn/GDA/admin/infogda.php?id=39 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Sep 2023 05:11:44 GMT -->

</html>





<?php



}

else {

  header("Location: ../index.php");

}



?>



