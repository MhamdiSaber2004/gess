<?php

include '../db/db.php';




error_reporting(E_ERROR | E_PARSE);





if (!isset($_SESSION["idPompiste"])) {
  header("location: ../login.php");
  exit();
}

$idPompiste=$_SESSION["idPompiste"];
$sql = "SELECT * from gess inner join pompiste on pompiste.idGess=gess.idGess where idPompiste='$idPompiste'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['idGess']=$row['idGess'];
     
    }



$idGess=$_SESSION['idGess'];

$sql = "SELECT * from gess where idGess='$idGess'";

$result = $conn->query($sql);
    

    $row = $result->fetch_assoc();
    $type=$row['type'];
    $nomGess=$row['nom'];

    if ($type=="منطقة ماء صالح للشرب") 
    {
      $typeGess="AEP";
    }
    else if ($type=="منطقة سقوية") 
    {
      $typeGess="PI";
    }



    if($_GET['mois']!=null){
      $_SESSION['mois']=$_GET['mois'];
      
    } 
     $mois=$_SESSION['mois'];

 /*  $moisValue=substr($mois,-2);
    $annee=substr($mois,0,4);*/
    





$annee=substr($mois,0,4) ?? '';
if (!empty($annee) && !is_numeric($annee)) {
  $annee = '';
} elseif ($annee < 2018 || $annee > 2030) {
  $annee = '';
}

$currentDayOfMonth = date('d');
$moisNum = substr($mois,-2) ?? '';
 $moisValue = strtolower(date("F", mktime(0, 0, 0, $monthNum, 10)));
$monthTranslations = [
  'january' => 'جانفي',
  'february' => 'فيفري',
  'march' => 'مارس',
  'april' => 'أفريل',
  'may' => 'ماي',
  'june' => 'جوان',
  'july' => 'جويلية',
  'august' => 'أوت',
  'september' => 'سبتمبر',
  'october' => 'أكتوبر',
  'november' => 'نوفمبر',
  'december' => 'ديسمبر',
];
$mois = $monthTranslations[$moisValue] ?? '';
if($mois=='' || $annee==''){
  echo "<script>window.history.back(); return false;</script>";
}

// SQL query with a prepared statement
$sql = "SELECT nom, etat_tunisie, accreditation FROM gess WHERE idGess = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $idGess);
$stmt->execute();
$result = $stmt->get_result();

    // Fetch the data
    $data = $result->fetch_assoc();

    // Output the data
    $nomGess = $data['nom'];
    $etat_tunise = $data['etat_tunisie'];
    $accordat = $data['accreditation'];
$sql = "SELECT nom_etat FROM etats_tunisie WHERE id = ?";
$stmt = $conn->prepare($sql);


$stmt->bind_param("i", $etat_tunise);

$stmt->execute();

$result = $stmt->get_result();

    $data = $result->fetch_assoc();

    $nomEtat = $data['nom_etat'];
    $monthTranslationsNmr = [
      'جانفي' => 1,
      'فيفري' => 2,
      'مارس' => 3,
      'أفريل' => 4,
      'ماي' => 5,
      'جوان' => 6,
      'جويلية' => 7,
      'أوت' => 8,
      'سبتمبر' => 9,
      'أكتوبر' => 10,
      'نوفمبر' => 11,
      'ديسمبر' => 12,
    ];

    $moisUSP = $monthTranslationsNmr[$mois] ?? 0;
    

    if (isset($_POST['submit1'])) {
      

         
        // Retrieve form data
        $moisUSP1 = $_POST['moisUSP'];
        $anneeUSP = isset($_POST['anneeUSP']) ? $_POST['anneeUSP'] : '';
        $dateDe = isset($_POST['dateDe']) ? $_POST['dateDe'] : '';
        $timeFrom = isset($_POST['dateA']) ? $_POST['dateA'] : '';
        $temp = isset($_POST['temp']) ? $_POST['temp'] : '';
        $jourUSP = isset($_POST['jourUSP']) ? intval($_POST['jourUSP']) : 0;
        $numCompteurPompe = isset($_POST['numCompteurPompe']) ? intval($_POST['numCompteurPompe']) : 0;
        $consommationJour = isset($_POST['consommationJour']) ? $_POST['consommationJour'] : '';
        $consommationNuit = isset($_POST['consommationNuit']) ? $_POST['consommationNuit'] : '';
        $consommationSoir = isset($_POST['consommationSoir']) ? $_POST['consommationSoir'] : '';
        $consommationPics = isset($_POST['consommationPics']) ? $_POST['consommationPics'] : '';
        $achete = isset($_POST['achete']) ? $_POST['achete'] : '';
        $utilisation = isset($_POST['utilisation']) ? $_POST['utilisation'] : '';
        $travaillePompeJavel = isset($_POST['travaillePompeJavel']) ? 1 : 0;
        $coupureEau = isset($_POST['coupureEau']) ? 1 : 0;
        $problemeStationPompe = isset($_POST['problemeStationPompe']) ? 1 : 0;
        $coupureEnergie = isset($_POST['coupureEnergie']) ? 1 : 0;
        $problemeStation = isset($_POST['problemeStation']) ? 1 : 0;
        $problemeStation1 = isset($_POST['problemeStation1']) ? 1 : 0;
        $commentaires = isset($_POST['commentaires']) ? $_POST['commentaires'] : '';
      
    
        // Insert data into the database
        $sql = "INSERT INTO utilisation_station_pompe (moisUSP,jourUSP, anneeUSP, dateDe, dateA,temp, numCompteurPompe, consommationJour, consommationNuit, consommationSoir, consommationPics, achete, utilisation, travaillePompeJavel, coupureEau, problemeStationPompe, coupureEnergie, problemeStation, problemeStation1, commentaires,idGess,idPompiste )
                VALUES ('$moisUSP','$jourUSP', '$anneeUSP', '$dateDe', '$timeFrom',  '$temp', '$numCompteurPompe', '$consommationJour', '$consommationNuit', '$consommationSoir', '$consommationPics', '$achete', '$utilisation', '$travaillePompeJavel', '$coupureEau', '$problemeStationPompe', '$coupureEnergie', '$problemeStation', '$problemeStation1', '$commentaires',$idGess,$idPompiste)";
    
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Close the database connection
        header('Location: statPompe.php?annee='.$anneeUSP.'&moisValue='.$moisValue);
        exit;
    }



    if (isset($_GET['supp'])) {
 
      $jour = $_GET['supp'];
   
      $sql = "DELETE FROM utilisation_station_pompe where idGess = $idGess and idPompiste =$idPompiste and jourUSP=$jour and anneeUSP = $annee and moisUSP=$moisUSP";
      $result = $conn->query($sql);
   header('Location: statPompe.php?annee='.$annee.'&moisValue='.$moisValue);
         
   
     
   }
 

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40"dir="RTL">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="ProgId" content="Excel.Sheet"/>
<meta name="Generator" content="Aspose.Cells 23.12"/>
<link rel="File-List" href="_files_files/filelist.xml"/>
<link rel="Edit-Time-Data" href="_files_files/editdata.mso"/>
<link rel="OLE-Object-Data" href="_files_files/oledata.mso"/>
<link type="text/css" href="../assets/css/statPompeStyle.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<style>
   

</style>

</head>
<body link='blue' vlink='purple' >

<div class="no-print">
<button class="capture-button" onclick="location.href='../index.php'">رجوع</button>
<?php 

$currentDay = date('d');

      $currentMonthName = strtolower(date('F', strtotime('today')));
      if (   $currentMonthName==$moisValue){
         $sql = "SELECT * FROM utilisation_station_pompe where idGess = $idGess and idPompiste =$idPompiste and jourUSP=$currentDayOfMonth and anneeUSP = $annee and moisUSP=$moisUSP ";
         $result = $conn->query($sql);
         if ($result->num_rows < 1) {
         
         echo "<button class='add-button'  data-bs-toggle='modal' data-bs-target='#exampleModal'>إضافة معطيات </button>";
         }
   
      }

     
         
         ?>

<button class="capture-button" onclick=" window.print()">طباعة</button>
</div>

<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: 
 collapse;width:1450'>
 <col width='64' span='4' style='width:48pt'/>
 <col width='79' style='mso-width-source:userset;width:59.25pt'/>
 <col width='109' style='mso-width-source:userset;width:81.75pt'/>
 <col width='76' style='mso-width-source:userset;width:57pt'/>
 <col width='78' style='mso-width-source:userset;width:58.5pt'/>
 <col width='71' style='mso-width-source:userset;width:53.25pt'/>
 <col width='72' style='mso-width-source:userset;width:54pt'/>
 <col width='32' style='mso-width-source:userset;width:24pt'/>
 <col width='31' style='mso-width-source:userset;width:23.25pt'/>
 <col width='32' style='mso-width-source:userset;width:24pt'/>
 <col width='31' style='mso-width-source:userset;width:23.25pt'/>
 <col width='30' style='mso-width-source:userset;width:22.5pt'/>
 <col width='27' style='mso-width-source:userset;width:20.25pt'/>
 <col width='33' style='mso-width-source:userset;width:24.75pt'/>
 <col width='30' style='mso-width-source:userset;width:22.5pt'/>
 <col width='163' style='mso-width-source:userset;width:122.25pt'/>
 <tr height='20' style='mso-height-source:userset;height:15.6pt'>
<td height='20' width='64' style='height:15.6pt;width:48pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x29' width='192'>دائرة المجامع المائية<span style='mso-spacerun:yes;'>&nbsp;&nbsp;</span></td>
<td colspan='15' width='894' style='mso-ignore:colspan;'></td>
 </tr>
 <tr height='34' style='mso-height-source:userset;height:25.8pt'>
<td height='34' style='height:25.8pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x30'><div style='float:right'>ولاية : <?php echo $nomEtat ; ?></div></td>
<td dir='RTL' align='right' colspan='8' class='x26' style='mso-ignore:colspan;overflow:hidden;'>استغلال محطة الضخ الكهربائية المتوسطة الجهد</td>
<td dir='RTL' align='right' colspan='6' class='x41'>المجمع المائي :</td>
<td></td>
 </tr>
 <tr height='24' style='mso-height-source:userset;height:18pt'>
<td height='24' style='height:18pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x31'><div style='float:right'>معتمدية : <span style="font-weight: bold;"><?php echo $accordat ; ?></span></div></td>
<td class='x27'></td>
<td dir='RTL' align='right' colspan='4' class='x43' style='border-bottom:1px solid windowtext;'>خلال شهر : <?php echo $mois ; ?> <br> </td>
<td colspan='3' class='x28' style='mso-ignore:colspan;'></td>
<td colspan='6' class='x42' style='border-bottom:1px solid windowtext;'><?php echo $nomGess ; ?><br></td>
<td></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' rowspan='3' height='104' class='x34' style='border-bottom:1px solid windowtext;border-top:1px solid windowtext;height:78.15pt;'>التاريخ</td>
<td dir='RTL' align='right' colspan='3' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>مدة الضخ</td>
<td dir='RTL' align='right' rowspan='3' height='104' class='x34' style='border-bottom:1px solid windowtext;height:78.15pt;'>رقم العداد المائي</td>
<td dir='RTL' align='right' colspan='4' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>الطاقة الكهربائية</td>
<td colspan='3' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td colspan='5' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td dir='RTL' align='right' rowspan='3' height='104' class='x32' style='border-bottom:1px solid windowtext;height:78.15pt;'><div style='white-space:nowrap;width:57px;height:163px;margin-top:-0px;margin-left:53px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>ملاخظات&nbsp;</div></td>
 </tr>
 <tr height='32' style='mso-height-source:userset;height:24pt'>
<td height='32' style='height:24pt;'></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>من</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>الى</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'><span style='display:none'>ا</span>العداد الساعاتي</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>عداد النهار</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>عداد الليل&nbsp;</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>عداد المساء</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x34' style='border-bottom:1px solid windowtext;height:63.75pt;'>عداد الذروة</td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:32px;margin-top:-0px;margin-left:1px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>شراء</div></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:31px;margin-top:-20px;margin-left:-20px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>مستعمل</div></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:32px;margin-top:-30px;margin-left:-34px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>اشتغال المضخة</div></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:31px;margin-top:-20px;margin-left:-22px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>انقطاع الماء</div></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:30px;margin-top:-50px;margin-left:-39px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>عطب محطة الضخ <br></div></td>
<td dir='RTL' align='right' rowspan='2' height='85' class='x32' style='border-bottom:1px solid windowtext;height:63.75pt;'><div style='white-space:nowrap;width:32px;height:27px;margin-top:-20px;margin-left:-31px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>انقطاع الطاقة</div></td>
<td dir='RTL' align='right' colspan='2' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>عطب في الشبكة</td>
 </tr>
 <tr height='54' style='mso-height-source:userset;height:40.5pt'>
<td height='54' style='height:40.5pt;'></td>
<td dir='RTL' align='right' class='x24'><div style='white-space:nowrap;width:21px;height:33px;margin-top:-0px;margin-left:2px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>كلي</div></td>
<td dir='RTL' align='right' class='x24'><div style='white-space:nowrap;width:25px;height:30px;margin-top:-0px;margin-left:-2px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'>جزئي</div></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>المجموع العام السابق</td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x37' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>الرقم السابق</td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x23'><div style='white-space:nowrap;width:0px;height:30px;margin-top:-0px;margin-left:15px;transform: rotate(-90deg);-o-transform: rotate(-90deg);-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);'></div></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
<td class='x22'></td>
 </tr>
 <?php
  function remplirTab($i,$idGess,$conn,$idPompiste,$anneeUSP,$moisValue,$moisUSP){
   $sql = "SELECT * FROM utilisation_station_pompe where idGess = $idGess and idPompiste =$idPompiste and jourUSP=$i and anneeUSP = $anneeUSP and moisUSP=$moisUSP ";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   
       
      while ($row = $result->fetch_assoc()) {
   
            ?>
             <tr height='19' style='mso-height-source:userset;height:14.4pt'>
            <td height='19' style='height:14.4pt;'></td>
            <td class='x22'><a href="<?php echo 'statPompe.php?annee='.$anneeUSP.'&moisValue='.$moisValue.'&supp='.$row["jourUSP"] ?>"><?php echo $row["jourUSP"] ?></a></td>
            <td class='x22'><?php echo substr($row["dateDe"] , 0, 5) ?></td>
            <td class='x22'><?php echo  substr($row["dateA"] , 0, 5) ?></td>
            <td class='x22'><?php echo $row["temp"]==0 ? '' : $row["temp"] ?></td>
            <td class='x22'><?php echo $row["numCompteurPompe"]==0 ? '' : $row["numCompteurPompe"] ?></td>
            <td class='x22'><?php echo $row["consommationJour"]==0 ? '' : $row["consommationJour"] ?></td>
            <td class='x22'><?php echo $row["consommationNuit"]==0 ? '' :$row["consommationNuit"]  ?></td>
            <td class='x22'><?php echo $row["consommationSoir"]==0 ? '' :$row["consommationSoir"]  ?></td>
            <td class='x22'><?php echo $row["consommationPics"]==0 ? '' :$row["consommationPics"]  ?></td>
            <td class='x22'><?php echo $row["achete"]==0 ? '' : $row["achete"] ?></td>
            <td class='x22'><?php echo $row["utilisation"]==0 ? '' :$row["utilisation"]  ?></td>
            <td class='x22'><?php echo $row["travaillePompeJavel"]==0 ? '' : 'X' ?></td>
            <td class='x22'><?php echo $row["coupureEau"]==1 ? 'X' : '' ?></td>
            <td class='x22'><?php echo $row["problemeStationPompe"]==1 ? 'X' : '' ?></td>
            <td class='x22'><?php echo $row["coupureEnergie"]==1 ? 'X' : '' ?></td>
            <td class='x22'><?php echo $row["problemeStation"]==1 ? $row["problemeStation"]==0 ? 'X' : '' :'' ?></td>
            <td class='x22'><?php echo $row["problemeStation"]==1 ? $row["problemeStation"]==0 ? '' : 'X' :'' ?></td>
            <td class='x22'><?php echo $row["commentaires"] ?></td>
             </tr>
             <?php
            }

         }
         else { ?>
           <tr height='19' style='mso-height-source:userset;height:14.4pt'>
            <td height='19' style='height:14.4pt;'></td>
            <td class='x22'><?php echo $i ?></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
            <td class='x22'></td>
             </tr>


<?php

         }
   
   }
    for ($i = 1; $i < 32; $i++) {
      remplirTab($i,$idGess,$conn,$idPompiste,$annee,$moisValue,$moisUSP);
     
  }

  function getCountOfUtilisation($idGess, $idPompiste, $jour) {
   // Assuming $conn is your database connection object
   global $conn,$anneeUSP,$moisUSP;

   // Prepare the SELECT COUNT query with placeholders
   $sql = "SELECT COUNT(*) AS count FROM utilisation_station_pompe where idGess = ? and idPompiste =?  and anneeUSP = ? and moisUSP=? ";

   // Prepare the statement
   $stmt = $conn->prepare($sql);

   // Bind parameters
   $stmt->bind_param("iiii", $idGess, $idPompiste, $anneeUSP,$moisUSP);

   // Execute the query
   $stmt->execute();

   // Bind the result variable
   $stmt->bind_result($count);

   // Fetch the result
   $stmt->fetch();

   // Close the statement
   $stmt->close();

   // Return the count
   return $count;
}


?>


 
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x46' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>المجموع الشهري</td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x46' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>المجموع العام</td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
<td class='x25'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='5' rowspan='6' height='114' class='x49' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:85.65pt;'><div style='float:right'>الملاحظــــــــــــــــــــــــــــــــــات :</div></td>
<td dir='RTL' align='right' class='x21'>الطاقة المستهلمة</td>
<td class='x25'></td>
<td dir='RTL' align='right' class='x21'>كيلوواط</td>
<td dir='RTL' align='right' colspan='10' class='x46' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>الاسم و الامضاء</td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' class='x21'>الدفق</td>
<td class='x25'></td>
<td dir='RTL' align='right' class='x21'>م3/ساعة</td>
<td dir='RTL' align='right' colspan='5' rowspan='5' height='94' class='x58' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:70.5pt;'>الحارس</td>
<td dir='RTL' align='right' colspan='5' rowspan='5' height='94' class='x58' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:70.5pt;'>الرئيس</td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' class='x21'>الطاقة</td>
<td class='x25'></td>
<td dir='RTL' align='right' class='x21' style='overflow:hidden;'>كيلوواط/ساعة</td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td dir='RTL' align='right' class='x21'>الطاقة</td>
<td class='x25'></td>
<td dir='RTL' align='right' class='x21' style='overflow:hidden;'>كيلوواط/م3</td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td class='x21'></td>
<td class='x21'></td>
<td class='x21'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='19' style='height:14.4pt;'></td>
<td class='x21'></td>
<td class='x21'></td>
<td class='x21'></td>
 </tr>
 <tr height='0' style='display:none'>
  <td width='256' colspan='4' style='width:192pt;mso-ignore:colspan;'></td>
  <td width='79' style='width:59.25pt;'></td>
  <td width='109' style='width:81.75pt;'></td>
  <td width='76' style='width:57pt;'></td>
  <td width='78' style='width:58.5pt;'></td>
  <td width='71' style='width:53.25pt;'></td>
  <td width='72' style='width:54pt;'></td>
  <td width='32' style='width:24pt;'></td>
  <td width='31' style='width:23.25pt;'></td>
  <td width='32' style='width:24pt;'></td>
  <td width='31' style='width:23.25pt;'></td>
  <td width='30' style='width:22.5pt;'></td>
  <td width='27' style='width:20.25pt;'></td>
  <td width='33' style='width:24.75pt;'></td>
  <td width='30' style='width:22.5pt;'></td>
  <td width='163' style='width:122.25pt;'></td>
 </tr>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post" >
  <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
    <div class="modal-content" dir="rtl">
      <div class="modal-header" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة معطيات   </h1>
       
      </div>
      
      <div class="modal-body" style="max-height: 400px; overflow-y: auto;direction: rtl;">
      <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                        <div class="inputs-group col-5">
                                 <label_input class="label_input">الشهر</label_input>
                                 <input class="input--style-1" type="text" disabled value="<?php echo $mois ?>">
                                 <input class="input--style-1" style="display:none" type="text" name="moisUSP"  value="<?php echo $mois ?>">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> السنة</label_input>
                                 <input class="input--style-1" type="number"  disabled value="<?php echo $annee ?>">
                                 <input class="input--style-1" style="display:none" type="number" name="anneeUSP"  value="<?php echo $annee ?>">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">التاريخ</label_input>
                                 <input class="input--style-1" type="number"  min="1" max="31" disabled value="<?php echo $currentDayOfMonth; ?>" required>
                                 <input class="input--style-1" type="number" name="jourUSP" min="1" max="31" style="display:none" value="<?php echo $currentDayOfMonth; ?>" >
                              </div>
                             
                             
                             
                           </div>
                          
                           <h4 style="font-size:18px;margin-right:30px;">مدة الضخ	</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">من</label_input>
                                 <input class="input--style-1" type="time"  step="any"  name="dateDe" placeholder="انخراطات">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">الى</label_input>
                                 <input class="input--style-1" type="time" step="any"  name="dateA" placeholder="اشتراكات">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input">    العداد الساعاتي		</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="temp" placeholder="العداد الساعاتي	">
                              </div>  
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-10">
                                 <label_input class="label_input"> رقم العداد المائي</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="numCompteurPompe" placeholder="رقم العداد المائي">
                              </div>
                           
                             
                           </div>
                           <h4 style="font-size:18px;margin-right:30px;">الطاقة الكهربائية</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">  عداد النهار</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="consommationJour" placeholder=" عداد النهار">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> عداد الليل 	</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="consommationNuit" placeholder=" عداد الليل 	">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">  عداد المساء</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="consommationSoir" placeholder=" عداد المساء">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> عداد الذروة 	</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="consommationPics" placeholder=" عداد الذروة 	">
                              </div>
                             
                           </div>

                          
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">  شراء  </label_input>
                                 <input class="input--style-1" type="number" name="achete" placeholder="  شراء">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> مستعمل</label_input>
                                 <input class="input--style-1" type="number" name="utilisation" placeholder=" مستعمل">
                              </div>
                             
                           </div>
                           <div class="d-flex gap-3 grp col-12" >
                              <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> اشتغال المضخة     </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input5" name="travaillePompeJavel" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp col-12" >
                              <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> انقطاع الماء     </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input5" name="coupureEau" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp col-12" >
                              <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> عطب محطة الضخ     </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input5" name="problemeStationPompe" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp col-12" >
                              <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> انقطاع الطاقة      </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input5" name="coupureEnergie" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp col-12" >
                              <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> عطب في الشبكة      </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input5" name="problemeStation" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="A_file5">
                                          <div class="inputs-group col-11 d-flex align-items-start flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input switch1-input"  name="problemeStation1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="كلي" data-off="جزئي" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                                          </div>
                                       </div>
                                    </td>
                                   
                                 </tr>
                              </tbody>
                           </table>
                          
                          

                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-10">
                                <label_input class="label_input">ملاحظات </label_input>
                                <textarea class="form-control" id="textAreaExample1" name="commentaires" rows="4"></textarea>
                             </div>
                             
                            
                          </div>


                  

                       
                       


      </div>
      <div class="modal-footer" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <button type="button"  style="width : 120px" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button> <!-- Change button text to Arabic -->
        <button type="submit" style="width : 120px" class="btn btn-success" name="submit1"> إضافة </button> <!-- Change button text to Arabic -->
      </div>
    </div>
  </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>

function switchChanged(checkbox) {
    var loading = document.getElementById (Array.from(checkbox.id)[0]+"_file"+Array.from(checkbox.id)[checkbox.id.length-1]) ;
    if (checkbox.checked) {
loading.classList.remove('visually-hidden')
    } else {
loading.classList.add('visually-hidden')
    }
}

function submitData(){

var inputElements = document.querySelectorAll('input');
    inputElements.forEach(function(input) {
    var id = input.id;
    if (id) {
        document.getElementById(id).disabled = false;
    }
    });

}
</script>
</body>

</html>
