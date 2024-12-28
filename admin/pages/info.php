<?php session_start();

if (!isset($_SESSION["loginAdmin"])) {
  header("location: ../login.php");
  exit();
}

include '../db/db.php';


if (isset($_GET['id']) && !empty($_GET['id'])){
$idGess=$_GET['id'];
include 'updatePi.php'; 
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
function removeZero($x){
    if ($x != 0 ) {return $x; }
    else {
        return "";
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
              $output .= '&nbsp &nbsp<a href="/gess/pi/documents/' . $file . '" target="_blank">وثيقة ' . ($index + 1) . ' </a>&nbsp &nbsp  ';
              
          }
          return $output;
      } 
      
      else {
          return "لا ";
      }
  }
  else {
    return '<a href="/gess/pi/documents/' . $tab . '" target="_blank">وثيقة   </a>';
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap Select CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" />
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

        /* Style to make the select arrow look like a Bootstrap input-group-append */
        .input-group-append {
            display: flex;
        }

        .input-group-append .input-group-text {
            border-left: 0;
            border-radius: 0 .25rem .25rem 0;
        }

        /* Style to make the select arrow look like a Bootstrap custom-select */
        .custom-select::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .3em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
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

    .modal{
      zoom : 110%;
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
  
  $sql = "SELECT * FROM gess WHERE idGess=$idGess";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($row['type']!="منطقة سقوية"){
        header("Location: notfound.php");
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
    <th colspan="8">المستخدم    </th>
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
    <th colspan="8" >مجلس إدارة المجمع    </th>
  </tr>
  <?php 
     $sql2 = "SELECT * FROM pi_conseil_administration WHERE idGess=$idGess";

     $result2 = $conn->query($sql2);
   
     if ($result2->num_rows > 0) {
         while ($row = $result2->fetch_assoc()) { ?>

  <tr>
     <td colspan="2"  style='font-weight: bold;' >  <?php echo $row["derniere_seance"] ;?> </td>
    <td colspan="2" style="background-color: #eee7e7;">  تاريخ اخر جلسة عامة</td>
    <td colspan="2"  style='font-weight: bold;' > <?php echo $row["conseil_administration"] ;?></td> 
    <td colspan="2" style="background-color: #eee7e7;"> النوع</td> 
  </tr>
  <tr>
     <td colspan="2"  style='font-weight: bold;' >  <?php echo $row["date_prevue"] ;?> </td>
  <td colspan="2" style="background-color: #eee7e7;"> التاريخ المتوقع للجلسة العامة المقبلة</td> 
    <td colspan="2"  style='font-weight: bold;' > <?php echo getFilesUrl($row["seance_generale"]) ;?></td>
    <td colspan="2" style="background-color: #eee7e7;">دورية الجلسة العامة</td>
  </tr>
  <tr>
    <td colspan="2"  style='font-weight: bold;' ><?php echo $row["pourcentage"] ;?></td>
    <td colspan="2" style="background-color: #eee7e7; ">النسبة</td>
    <td colspan="2"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["quorum_derniere_seance"]);?> </td>
    <td colspan="2" style="background-color: #eee7e7;">نصاب اخر جلسة عامة</td>
 
  </tr>
 
 <?php }}?>
    <th colspan="8" >الفلاحين</th>
  </tr>
  <?php 
     $sql3 = "SELECT * FROM pi_paysans WHERE idGess=$idGess";

     $result3 = $conn->query($sql3);
   
     if ($result3->num_rows > 0) {
         while ($row = $result3->fetch_assoc()) { ?>
  <tr>
  <td colspan="2"  style='font-weight: bold;' ><?php echo $row["nombre_membres"] ;?></td>
  <td colspan="2" style="background-color: #eee7e7;"> عدد المنخرطين </td>
  <td colspan="2"  style='font-weight: bold;' ><?php echo $row["nombre_fermiers"] ;?></td>
    <td colspan="2" style="background-color: #eee7e7;">عدد الفلاحين</td>
    
  </tr>
  
  <tr>
  <td colspan="2"  style='font-weight: bold;' ><?php echo $row["montant_adhesion"] ;?></td>
    <td colspan="2" style="background-color: #eee7e7;">مبلغ الانخراط</td>
    <td colspan="2"  style='font-weight: bold;' ><?php echo $row["nombre_contrats"] ;?></td>
    <td colspan="2" style="background-color: #eee7e7;">عدد عقود الانتفاع</td>
    
  </tr>
  <tr>
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["f_contrat"]);?> </td>    
    <td colspan="4"  style="background-color: #eee7e7;">وجود عقود الانتفاع
    </td>
    
  </tr>

  <tr>
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["presence_liste"]);?> </td>    
    <td colspan="4"  style="background-color: #eee7e7;">وجود قائمة الفلاحين
    </td>
    
  </tr>
  <tr>
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["mise_a_jour"]);?> </td>   
    <td colspan="4"  style="background-color: #eee7e7;">  تحيين قائمة الفلاحين</td>
    
  </tr>
  <tr>
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["presence_registre"]);?> </td>   
    <td colspan="4"  style="background-color: #eee7e7;">  وجود سجل الانخراط    </td>
    
  </tr>
  <?php }} ?>
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
                 $y=$y+1;
                 if (strlen($row["nom_prenom"]) > 0){
         ?>
 <tr>
      <td colspan="1"   style='font-weight: bold;'  > <?php echo getFilesUrl($row["cp_cin"]);?></td>
<td colspan="1"   style='font-weight: bold;'  > <?php if ($row["num_tel"] != 0 ) {echo $row["num_tel"];}  ?></td>
    <td colspan="1"   style='font-weight: bold;'  ><?php echo $row["anciennete"] ;?> </td> 
    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["niveau_education"] ;?> </td> 
    <td colspan="1"  style='font-weight: bold;'  > <?php echo $row["age"] ;?></td> 
    <td colspan="1"   style='font-weight: bold;' ><?php echo $row["role"] ;?> </td> 
    <td colspan="2"   style='font-weight: bold;' >  <?php echo $row["nom_prenom"] ;?> </td> 
    </tr>

<?php 
}
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
<td colspan="2"   style='font-weight: bold;'  > <?php if ($row["num_tel"] != 0){ echo $row["num_tel"] ;}?></td>
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
    <th colspan="8">اجتماعات مجلس الادارة    </th>
  </tr>
  <?php 
     $sql5 = "SELECT * FROM pi_reunions_conseil_administration WHERE idGess=$idGess";

     $result5 = $conn->query($sql5);
   
     if ($result5->num_rows > 0) {
         while ($row = $result5->fetch_assoc()) { ?>
  <tr>
    
    <td colspan="4"  style='font-weight: bold;' > <?php  if ($row["nombre_reunions_annee_precedente"] != 0 ) {echo $row["nombre_reunions_annee_precedente"] ;}?>  </td> 
    <td colspan="4" style="background-color: #eee7e7;"> عدد الاجتماعات خلال السنة السابقة</td> 
  </tr>
  <tr>
    
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["presence_proces_verbaux"]);?> </td> 
    <td colspan="4" style="background-color: #eee7e7;">وجود محاضر الجلسات  </td> 
  </tr>
  <tr>
    
    <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["moyenne_presence_reunions"]);?> </td> 
    <td colspan="4" style="background-color: #eee7e7;">معدل الحاضرين خلال الاجتماع    </td> 
  </tr>
  <tr>
    
  <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["absences_membres_justifiees"]);?> </td>  
    <td colspan="4" style="background-color: #eee7e7;">غيابات الأعضاء المبررين    </td> 
  </tr>
  <tr>
    
  <td colspan="4"  style='font-weight: bold;' > <?php  echo getFilesUrl($row["periodicite_reunions"]);?> </td>  
    <td colspan="4" style="background-color: #eee7e7;">دورية الاجتماعات    </td> 
  </tr>
  <tr>
    
    <td colspan="4"  style='font-weight: bold;' > <?php echo $row["presentation_problemes_internes"] ;?>  </td> 
    <td colspan="4" style="background-color: #eee7e7;">طرح المشاكل الداخلية    </td> 
  </tr>

  <?php }} ?>
  <tr>
    <th colspan="8">معلومات حول أعوان المجمع </th>
  </tr>
  <tr>
  <td colspan="1"  style="background-color: #eee7e7;">  رقم الهاتف</td> 
    <td colspan="1"  style="background-color: #eee7e7;"> عقد العمل</td> 
    <td colspan="1"  style="background-color: #eee7e7;"> الضمان الاجتماعي </td> 
    <td colspan="1"  style="background-color: #eee7e7;">الأجر</td> 
    <td colspan="1"  style="background-color: #eee7e7;">المستوى التعليمي</td> 
    <td colspan="1"  style="background-color: #eee7e7;"> العمر</td>
    <td colspan="1"  style="background-color: #eee7e7;">الصفة</td> 
    <td colspan="1"  style="background-color: #eee7e7;">الاسم و اللقب </td> 
  </tr>
  <?php 
     $sql5 = "SELECT * FROM pi_informations_agents WHERE idGess=$idGess";

     $result5 = $conn->query($sql5);
    
     if ($result5->num_rows > 0) {
         $x=0;
         while ($row = $result5->fetch_assoc()) {
             if (strlen($row["nom_prenom2"])> 0){
                 $x=$x+1;
         ?>
 <tr>
    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["numero_telephone2"] ;?></td> 
    <td colspan="1"   style='font-weight: bold;'  > <?php echo getFilesUrl($row["contrat_travail2"]);?></td>
    <td colspan="1"   style='font-weight: bold;'  ><?php echo getFilesUrl($row["securite_sociale2"]);?> </td> 
    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["salaire2"] ;?> </td> 
    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["niveau_education2"] ;?></td> 
    <td colspan="1"   style='font-weight: bold;' > <?php echo $row["age2"] ;?></td> 
    <td colspan="1"   style='font-weight: bold;' ><?php echo $row["agents_executifs2"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold;; background-color: #fcf6f6;'  >  <?php echo $row["nom_prenom2"] ;?> </td> 
    </tr>
    
<?php }}
if ($x==0) {
    echo "<tr>
    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>
  <tr>" ; }
} else {
    echo "<tr>
    <td colspan='8' style='font-weight: bold;text-align:center;'>لا يوجد </td>
  <tr>" ;
  
}


?>
  
   
  <tr>
    <th colspan="8">التكوين و التأطير    </th>
  </tr>

  <?php 
     $sql6 = "SELECT * FROM pi_formation_tutorat WHERE idGess=$idGess";

     $result6 = $conn->query($sql6);
   
     if ($result6->num_rows > 0) {
         while ($row = $result6->fetch_assoc()) { ?>
   <tr>
  
   <td colspan="2"  style="background-color: #eee7e7;"> عدد الدورات التأطيرية</td> 
    <td colspan="2"  style="background-color: #eee7e7;"> عدد الدورات التكوينية</td> 
    <td colspan="2"  style="background-color: #eee7e7;">محاور التكوين </td>
    <td colspan="2"  style="background-color: #eee7e7;"> الصفة  </td> 
  </tr>

  <tr> 
    <td colspan="2"  style='font-weight: bold;'>  <?php echo $row["conseil_administration_president_nombre_encadrements"] ;?></td>  
    <td colspan="2"  style='font-weight: bold;'>  <?php echo $row["conseil_administration_president_nombre_formations"] ;?></td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_president_motifs_formation"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'> رئيس المجمع    </td> 
  </tr> 
  <tr> 
    <td colspan="2"  style='font-weight: bold;'>  <?php echo $row["conseil_administration_tresorier_nombre_encadrements"] ;?></td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_tresorier_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_tresorier_motifs_formation"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'>  أمين المال    </td> 
  </tr> 
  
  <tr>
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_membre_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_membre_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["conseil_administration_membre_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'>  عضو</td> 
  </tr>
  <tr>
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur1_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur1_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur1_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'> مراقب 1</td> 
  </tr>
  <tr>
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur2_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur2_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["controleurs_internes_controleur2_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'> مراقب 2</td> 
  </tr>
  <tr>
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_directeur_technique_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_directeur_technique_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_directeur_technique_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'> مراقب 3</td> 
  </tr>
  
  
  <tr>
    
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_hydro_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_hydro_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_hydro_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'> المدير الفني</td> 
  </tr> 
  <tr>
    
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_eau_nombre_encadrements"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_eau_nombre_formations"] ;?> </td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_garde_systeme_eau_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'>  حارس النظام المائي</td> 
  </tr> 
   <tr>
    
    <td colspan="2"  style='font-weight: bold;'>  <?php echo $row["agents_magasin_distributeur_nombre_encadrements"] ;?></td>  
    <td colspan="2"  style='font-weight: bold;'>  <?php echo $row["agents_magasin_distributeur_nombre_formations"] ;?></td>  
    <td colspan="2"  style='font-weight: bold;'> <?php echo $row["agents_magasin_distributeur_motifs_formation"] ;?> </td> 
    <td colspan="2"  style='font-weight: bold; background-color: #fcf6f6;'>الموزع </td> 
  </tr>

  <?php }} ?>
  <tr>
    <th colspan="8"> معطيات حول نقاط التوزيع    </th>
  </tr>
  <?php 
     $sql7 = "SELECT * FROM pi_donnees_points_distribution WHERE idGess=$idGess";

     $result7 = $conn->query($sql7);
   
     if ($result7->num_rows > 0) {
         while ($row = $result7->fetch_assoc()) { ?>
  <tr>
    <td colspan="2"  style='font-weight: bold;'>  <?php echo removeZero($row["nombre_compteurs_non_autorises"]) ;?> </td> 
    <td colspan="2"  style="background-color: #eee7e7;">  عدد الساكورات الغير مرخص لها   </td> 
    <td colspan="2"  style='font-weight: bold;'> <?php echo removeZero($row["surface_totale"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;"> المساحة الجملية بالهكتار  </td> 
  <tr>
 
  <tr>
    <td colspan="2"   style='font-weight: bold;'> <?php echo removeZero($row["nombre_compteurs_conformes_specifications"]) ;?>  </td> 
    <td colspan="2"  style="background-color: #eee7e7;"> عدد الساكورات المطابقة للمواصفات  </td> 
    <td colspan="2"   style='font-weight: bold;'> <?php echo removeZero($row["surface_hors_zone"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;">  المساحة خارج المنطقة السقوية </td> 
  <tr>
  <tr>
    <td colspan="2"   style='font-weight: bold;'>  <?php echo removeZero($row["nombre_fournisseurs_citernes"]) ;?> </td> 
    <td colspan="2"  style="background-color: #eee7e7;">  عدد مزود الصهاريج </td> 
    <td colspan="2"  style='font-weight: bold;'> <?php echo removeZero($row["nombre_sans_compteur"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;"> عدد الساكورات دون عداد  </td> 
  <tr>
  <tr>
    <td colspan="2"   style='font-weight: bold;'> <?php echo $row["distribution_eau_selon"] ;?>  </td> 
    <td colspan="2"  style="background-color: #eee7e7;">  توزيع الماء حسب </td> 
    <td colspan="2"  style='font-weight: bold;'> <?php echo getFilesUrl($row["engagement_2"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;"> الالتزام  </td> 
  <tr>
  <tr>
    <td colspan="2"   style='font-weight: bold;'>  <?php echo getFilesUrl($row["document_suivi_distribution"]) ;?> </td> 
    <td colspan="2"  style="background-color: #eee7e7;"> وثيقة متابعة التوزيع  </td> 
    <td colspan="2"   style='font-weight: bold;'> <?php echo removeZero( $row["nombre_compteurs"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;"> عدد الساكورات  </td> 
  <tr>
  <tr>
    <td colspan="2"  style='font-weight: bold;'>  <?php echo getFilesUrl( $row["mise_a_jour_documents"]) ;?> </td> 
    <td colspan="2"  style="background-color: #eee7e7;"> تحيين الوثائق  </td> 
    <td colspan="2"   style='font-weight: bold;'> <?php echo removeZero($row["nombre_compteurs_desactives"]) ;?> </td>
    <td colspan="2"  style="background-color: #eee7e7;"> عدد الساكورات المعطلة  </td> 
  <tr>

  <tr>
   
    <td colspan="4"   style='font-weight: bold;'> <?php echo $row["observations"] ;?> </td>
    <td colspan="4"  style="background-color: #eee7e7;">   الملاحضات  </td> 
  <tr>

<?php }} ?>

<?php 
     $sql7 = "SELECT * FROM pi_plantes_presentes WHERE idGess=$idGess";

     $result7 = $conn->query($sql7);
   
     if ($result7->num_rows > 0) {
         while ($row = $result7->fetch_assoc()) { ?>
  
<th colspan="8">الغراسات الموجودة</th>
  </tr>
  <tr>
    <td colspan="3" style="text-align: center;background-color: #eee7e7;">   نظام الري    </td> 
    <td rowspan="2" colspan="2" style="background-color: #eee7e7;">المساحة بالهكتار </td> 
    <td rowspan="2" colspan="3" style="background-color: #eee7e7;"> النوع </td> 
  </tr>
  <tr>
    <td colspan="1" style="background-color: #eee7e7;">الري التقليدي </td> 
    <td colspan="1" style="background-color: #eee7e7;">الري بالرش </td> 
    <td colspan="1" style="background-color: #eee7e7;"> الري قطرة قطرة</td> 

   
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["cultures_grandes_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["cultures_grandes_surface_arrosage"] );?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["cultures_grandes_surface_goutte_goutte"] );?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["cultures_grandes_surface_hectares"]) ;?> </td> 
    <td colspan="3"style="background-color: #eee7e7;">الغراسات الكبرى</td>  
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumes_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumes_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumes_surface_goutte_goutte"] );?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["legumes_surface_hectares"] );?> </td>  
    <td colspan="3"style="background-color: #eee7e7;">الخضراوات</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["fourrages_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["fourrages_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["fourrages_surface_goutte_goutte"]) ;?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["fourrages_surface_hectares"]) ;?> </td> 
    <td colspan="3"style="background-color: #eee7e7;">الأعلاف</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["arbres_fruitiers_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["arbres_fruitiers_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["arbres_fruitiers_surface_goutte_goutte"]) ;?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["arbres_fruitiers_surface_hectares"]) ;?> </td> 
    <td colspan="3"style="background-color: #eee7e7;">الأشجار المثمرة ( <?php echo $row["arbres_fruitiers"] ;?> )</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["oliviers_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["oliviers_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["oliviers_surface_goutte_goutte"] );?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["oliviers_surface_hectares"]) ;?> </td> 
    <td colspan="3"style="background-color: #eee7e7;">أشجار الزيتون</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["autres_arbres_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["autres_arbres_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["autres_arbres_surface_goutte_goutte"]) ;?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero($row["autres_arbres_surface_hectares"]) ;?> </td>  
    <td colspan="3"style="background-color: #eee7e7;">أشجار أخرى ( <?php echo $row["autres_arbres_type"] ;?> )</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumineuses_surface_irrigation_traditionnelle"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumineuses_surface_arrosage"]) ;?> </td> 
    <td colspan="1" style='font-weight: bold;' ><?php echo removeZero($row["legumineuses_surface_goutte_goutte"]) ;?> </td> 
    <td colspan="2" style='font-weight: bold;' ><?php echo removeZero( $row["legumineuses_surface_hectares"]) ;?> </td>  
    <td colspan="3"style="background-color: #eee7e7;"> البقوليات</td> 
  </tr>
  <tr>
    <td colspan="1" style='font-weight: bold;' > 
    <?php 
        echo $row["cultures_grandes_surface_irrigation_traditionnelle"] + 
             $row["legumes_surface_irrigation_traditionnelle"] + 
             $row["fourrages_surface_irrigation_traditionnelle"] + 
             $row["arbres_fruitiers_surface_irrigation_traditionnelle"] + 
             $row["oliviers_surface_irrigation_traditionnelle"] + 
             $row["autres_arbres_surface_irrigation_traditionnelle"] + 
             $row["legumineuses_surface_irrigation_traditionnelle"]; 
    ?>
  </td> 
    <td colspan="1" style='font-weight: bold;' >  
    <?php 
        echo $row["cultures_grandes_surface_arrosage"] + 
             $row["legumes_surface_arrosage"] + 
             $row["fourrages_surface_arrosage"] + 
             $row["arbres_fruitiers_surface_arrosage"] + 
             $row["oliviers_surface_arrosage"] + 
             $row["autres_arbres_surface_arrosage"] + 
             $row["legumineuses_surface_arrosage"]; 
    ?>
  </td> 
    <td colspan="1" style='font-weight: bold;'>
    <?php 
        echo $row["cultures_grandes_surface_goutte_goutte"] + 
             $row["legumes_surface_goutte_goutte"] + 
             $row["fourrages_surface_goutte_goutte"] + 
             $row["arbres_fruitiers_surface_goutte_goutte"] + 
             $row["oliviers_surface_goutte_goutte"] + 
             $row["autres_arbres_surface_goutte_goutte"] + 
             $row["legumineuses_surface_goutte_goutte"]; 
    ?>
</td>
    <td colspan="2" style='font-weight: bold;' > <?php echo $row["legumineuses_surface_hectares"]+$row["autres_arbres_surface_hectares"]+$row["oliviers_surface_hectares"]
     +$row["arbres_fruitiers_surface_hectares"]+$row["fourrages_surface_hectares"]+$row["legumes_surface_hectares"]+$row["cultures_grandes_surface_hectares"]   ?></td> 
    <td colspan="3"style="background-color: #eee7e7;">المجموع </td> 
  </tr>
  <?php }} ?>
  <tr>
    <th colspan="8">الجوانب المالية </th>
  </tr>
  <?php 
     $sql7 = "SELECT * FROM pi_aspects_financiers WHERE idGess=$idGess";

     $result7 = $conn->query($sql7);
   
     if ($result7->num_rows > 0) {
         while ($row = $result7->fetch_assoc()) { ?>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["retard_paiement"])  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">تأخير في الدفع</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["vente_eau_par_heure"] ) ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">بيع الماء بالساعة</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["dettes_agriculteurs"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">ديون الفلاحين</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo $row["tarif_par_heure"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">التسعيرة بالساعة</td> 
  </tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["dettes_fournisseurs"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">ديون المزودين</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["vente_eau_par_metre_cube"])  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">بيع الماء بالمتر المكعب</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["dettes_steg"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">ديون الشركة التونسية للكهرباء و الغاز</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo $row["tarif_par_metre_cube"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">التسعيرة بالمتر المكعب</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["dettes_crda"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">دين المندوبية الجهوية للتنمية الفلاحية</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo $row["paiement"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">الدفع</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["autres_dettes"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">ديون أخرى</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo $row["methode_fixation_tarif_eau"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">كيف تم تحديد تسعير الماء</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["caisse"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">الصندوق</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["vente_a_credit"])  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">بيع بالتقسيط</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo $row["compte_courant"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">الحساب الجاري</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo $row["montant_a_credit"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">المبلغ بالتقسيط</td> 
  </tr>
  <tr>
     <td colspan="6" style='font-weight: bold;'> <?php echo $row["description_dettes"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;"> وصف الديون</td> 
  </tr>
 <?php }} ?>
 <tr>
    <th colspan="8">  متابعة ضخ و توزيع المياه</th>
  </tr>
  <?php 
     $sql9 = "SELECT * FROM pi_suivi_pompage_distribution_eau WHERE idGess=$idGess";

     $result9 = $conn->query($sql9);
   
     if ($result9->num_rows > 0) {
         while ($row = $result9->fetch_assoc()) { ?>
  <tr>
    <td colspan="2" style='font-weight: bold;'><?php echo $row["quantite_eau_distribuee"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">كمية المياه الموزعة</td> 
    <td colspan="2" style='font-weight: bold;'><?php echo $row["quantite_eau_pompee"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">كمية المياه التي تم ضخها</td> 
  </tr>
  <tr>
    <td colspan="2"></td> 
    <td colspan="2"></td> 
    <td colspan="2" style='font-weight: bold;'>% <?php echo $row["taux_perte"]  ?></td> 
    <td colspan="2"  style="background-color: #eee7e7;">نسبة الضياع </td> 
  </tr>
  <?php }}?>
  <tr>
    <th colspan="8">الوضعية اللوجستية للمجمع</th>
  </tr>
  <?php 
     $sql10 = "SELECT * FROM pi_logistique_mojamaa WHERE idGess=$idGess";

     $result10 = $conn->query($sql10);
   
     if ($result10->num_rows > 0) {
         while ($row = $result10->fetch_assoc()) { ?>
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["bureau"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">مكتب</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["local"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">محل</td> 
  </tr>
  
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["armoire"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">خزانة</td> 
  <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["chaises"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;"> كراسي</td> 
  </tr>
  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["panneau_publicitaire"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">لوحة إعلانات</td> 
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["ordinateur"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">حاسوب</td> 
  </tr>

  <tr>
  <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["telephone"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">هاتف</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo yesOrNo($row["fax"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">فاكس</td> 
  </tr>
  
  <tr>
  <td colspan="2" style='font-weight: bold;'><?php echo yesOrNo($row["imprimante"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">طابعة</td> 
    <td colspan="2" style='font-weight: bold;'><?php echo yesOrNo($row["velo"])  ?></td> 
    <td colspan="2" style="background-color: #eee7e7;">دراجة</td> 
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
    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["dossier_revendications_economie_eau"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">ملف مطالب الاقتصاد في الماء</td>
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
  <tr>
    <td colspan="2" style='font-weight: bold;'> </td>
    <td colspan="2" style="background-color: #eee7e7;"> </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["conseil_administration"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">ملف أعضاء مجلس الادارة و مهامهم</td>
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
     $sql12 = "SELECT * FROM pi_dossier_technique WHERE idGess=$idGess";

     $result12 = $conn->query($sql12);
   
     if ($result12->num_rows > 0) {
         while ($row = $result12->fetch_assoc()) { ?>


  
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Cycle_Eau"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">  نموذج للدورة المائية </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Exploitations_Agricoles"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> نسخة من مثال المستغلات الفلاحية    </td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["Registre_Consommation"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">     دفتر استهلاك ماء الري  </td>
    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["Stations_Pompage"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">    محطات الضخ</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Registre_Distribution"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> دفتر توزيع الماء </td>
    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["Reseau_Maien"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">   الشبكة المائية</td>
  </tr>

  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Permis_Distribution"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">  دفتر الأذون بالتوزيع</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Reservoirs"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> الخزانات</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["Documents_Suivi"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> وثائق متابعة الاستغلال</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Caracteristiques_Normes"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> ملف الخصائص و المواصفات الفنية للتجهيزات</td>
  </tr>
 
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Maintenance_Preventive"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">    الصيانة الدورية و الوقائية</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Etudes_Techniques"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">   مختلف الدراسات الفنية المتعلقة بالمشروع</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Registre_Demandes_Distribution"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">دفتر متابعة طلبات التوزيع </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["Registre_Pompage"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> دفتر محطة الضخ</td>
  </tr>
  <?php }} ?>


  
  
  <tr>
    <th colspan="8">   الملف المالي</th>
  </tr>  
  

  <?php 
     $sql12 = "SELECT * FROM pi_dossier_financier WHERE idGess=$idGess";

     $result12 = $conn->query($sql12);
   
     if ($result12->num_rows > 0) {
         while ($row = $result12->fetch_assoc()) { ?>


  
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["fichier_tarification"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">  ملف مخطط التعريفة </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["factures_et_mouidates"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> الفواتير و مؤيدات الفوترة    </td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["rapports_controle_comptable"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">     تقارير مراقب الحسابات </td>
    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["copies_budgets_annuels"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">    نسخ من الميزانيات و الموازنات السنوية </td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["registres_suivi_exploitation_facturation_encaissement"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> الجذاذات الدورية لمتابعة الاستغلال و الفوترة و الاستخلاص </td>
    <td colspan="2" style='font-weight: bold;'>  <?php echo getFilesUrl($row["releve_compteurs_rapports"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">   رفع العدادات الدورية و التقارير الدورية للاستغلال </td>
  </tr>

  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["livre_comptabilite"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">  دفتر المحاسبة</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["etats_compte_courant"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> كشوفات الحساب الجاري</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'><?php echo getFilesUrl($row["rapports_situation_financiere"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> تقارير الوضعية المالية</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["mouidates_depenses"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> مؤيدات المصاريف</td>
  </tr>
 
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["registre_listes_dettes_agriculteurs_beneficiaires"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">    دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين</td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["cartes_adhesion"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;">   كنشات بطاقات الانخراط</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["liste_dettes_association_fournisseurs"])  ?></td>
    <td colspan="2" style="background-color: #eee7e7;">قائمة ديون الجمعية ازاء المزودين </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["recevabilites_livraison"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> كنشات وصل التسليم</td>
  </tr>
  <tr>
    <td colspan="2" style='font-weight: bold;'>   </td>
    <td colspan="2" style="background-color: #eee7e7;"> </td>
    <td colspan="2" style='font-weight: bold;'> <?php echo getFilesUrl($row["fichier_abonnements"])  ?> </td>
    <td colspan="2" style="background-color: #eee7e7;"> ملف الاشتراكات</td>
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
                    <option value="pi_conseil_administration" >مجلس إدارة المجمع</option>
                    <option  value="pi_paysans">الفلاحين</option>
                    <option value="membre_conseil" >معطيات حول اعضاء المجلس</option>
                    <option  value="controle_interne">معطيات حول هيئة المراقبة الداخلية</option>
                    <option  value="pi_reunions_conseil_administration">اجتماعات مجلس الادارة</option>
                    <option  value="pi_informations_agents">معلومات حول أعوان المجمع</option>
                    <option value="pi_formation_tutorat" >التكوين و التأطير</option>
                    <option  value="pi_donnees_points_distribution">معطيات حول نقاط التوزيع </option>
                    <option  value="pi_plantes_presentes">الغراسات الموجودة </option>
                    <option  value="pi_aspects_financiers">الجوانب المالية </option>
                    <option  value="pi_suivi_pompage_distribution_eau">متابعة ضخ و توزيع المياه </option>
                    <option  value="pi_logistique_mojamaa">الوضعية اللوجستية للمجمع </option>
                    <option  value="documents_administratifs">الوثائق الادارية </option>
                    <option  value="dossier_juridique">الملف القانوني </option>
                    <option  value="pi_dossier_technique">الملف الفني </option>
                    <option  value="pi_dossier_financier">الملف المالي </option>
                    
                    
                    <!-- Add more options as needed -->
                </select>
                </div>
                </div>
      <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>إغلاق</button>
    <button class='btn btn-primary' type="submit"  name="submitupdate"> تحيين</button>
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

