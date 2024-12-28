<?php session_start();


if (!isset($_SESSION["idGess"])) {
  header("location: ../index.php");
  exit();
}

include_once "../db/db.php";
$idGess=$_SESSION['idGess'];
$annee=$_GET['annee'] ?? '';
if (!empty($annee) && !is_numeric($annee)) {
  $annee = '';
} elseif ($annee < 2018 || $annee > 2030) {
  $annee = '';
}

$currentDayOfMonth = date('d');
$moisValue = $_GET['moisValue'] ?? '';
$monthTranslations = [
  'January' => 'جانفي',
  'February' => 'فيفري',
  'March' => 'مارس',
  'April' => 'أفريل',
  'May' => 'ماي',
  'June' => 'جوان',
  'July' => 'جويلية',
  'August' => 'أوت',
  'September' => 'سبتمبر',
  'October' => 'أكتوبر',
  'November' => 'نوفمبر',
  'December' => 'ديسمبر',
];
$mois = $monthTranslations[$moisValue] ?? '';
if($mois=='' || $annee==''){
  echo "<script>location.href='/gess/apgess/'</script>";
}
include 'registreController.php';
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="ProgId" content="Excel.Sheet"/>
<meta name="Generator" content="Aspose.Cells 23.9.2"/>
<link rel="File-List" href="_files_files/filelist.xml"/>
<link href="style/registreStyle.css" rel="stylesheet" />
<link rel="Edit-Time-Data" href="_files_files/editdata.mso"/>
<link rel="OLE-Object-Data" href="_files_files/oledata.mso"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>l&apos;astro production</o:Author>
  <o:Created>2023-10-04T22:06:42Z</o:Created>
  <o:LastSaved>2023-10-04T22:07:29Z</o:LastSaved>
</o:DocumentProperties>
</xml><![endif]-->
<style>

@media print{
  @page {
    margin: 0;
  }
  body {
    margin-left : 40px;
    margin-top: 40px;
  }
    


  }
  body {
    margin-left : 40px;
    width: 100%;

  }
</style>

</head>
<body link='blue' vlink='purple' >
<div class="no-print">
<button class="capture-button" onclick="location.href='../index.php'">رجوع</button>
<?php 


      $currentDay = date('d');

      $currentMonthName = date('F', strtotime('today'));
      if (   $currentMonthName==$moisValue){
         if ($moisValue=="January")
         {
            echo "<button class='add-button'  data-bs-toggle='modal' data-bs-target='#exampleModal1'>".($annee-1)." إضافة  رصيد اخر سنة </button>";
         }
         echo "<button class='add-button'  data-bs-toggle='modal' data-bs-target='#exampleModal'>إضافة عملية مالية</button>";
   
      }

     
?>

<button class="capture-button" onclick=" window.print()">طباعة</button>
</div>
<table border='0' cellpadding='0' cellspacing='0' width='1900' style='border-collapse: 
 collapse;table-layout:fixed;width:1380pt'>
 <col width='80' span='23' style='width:60pt'/>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td colspan='23' height='19' width='1840' style='mso-ignore:colspan;height:14.4pt;'></td>
 </tr>
 <tr height='38' style='mso-height-source:userset;height:28.8pt'>
<td colspan='5' height='38' style='mso-ignore:colspan;height:28.8pt;'></td>
<td colspan='2' class='x21'></td>
<td class='x22'></td>
<td class='x23'></td>
<td class='x23'></td>
<td dir='RTL' align='right' colspan='5' class='x24'>دفتـــــر المحـاسبــــــة</td>
<td colspan='4' style='mso-ignore:colspan;'></td>
<td dir='RTL' align='right' colspan='3' rowspan='2' height='62' class='x25' style='height:46.8pt;'>مجمع التنمية في قطاع الفلاحة<span style='mso-spacerun:yes;'> </span>و الصيد البحري<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>...........................</td>
<td></td>
 </tr>
 <tr height='24' style='mso-height-source:userset;height:18pt'>
<td colspan='8' height='24' style='mso-ignore:colspan;height:18pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x26' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><div style='float:right'>السنة :&nbsp;<span style="color : red"><?php echo $annee ; ?></span></div></td>
<td class='x29'></td>
<td dir='RTL' align='right' colspan='3' class='x30' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><div style='float:right'>الشهر :&nbsp; <span style="color : red"><?php echo $mois ; ?></span></div></td>
<td colspan='4' style='mso-ignore:colspan;'></td>
<td></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='23' height='20' style='mso-ignore:colspan;height:15pt;'></td>
 </tr>
 <tr height='35' style='mso-height-source:userset;height:26.4pt'>
 
<td dir='RTL' align='right' colspan='2' height='31' class='x31' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;height:23.4pt;overflow:hidden;'>الحساب الجاري<span style='display:none'>ي</span></td>
<td dir='RTL' align='right' colspan='2' class='x31' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'>الصندوق</td>
<td dir='RTL' align='right' colspan='9' class='x31' style='border-bottom:2px solid windowtext;'>مصاريف</td>
<td dir='RTL' align='right' colspan='5' class='x31' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'>المداخيل</td>
<td dir='RTL' align='right' rowspan='2' height='61' class='x34' style='border-bottom:2px solid windowtext;height:45.9pt;'>ارقام الوصولات او الصكوك</td>
<td dir='RTL' align='right' rowspan='2' height='61' class='x35' style='border-bottom:2px solid windowtext;height:45.9pt;widht:60pt'>البيان</td>
<td dir='RTL' align='right' rowspan='2' height='61' class='x35' style='border-bottom:2px solid windowtext;height:45.9pt;'>التاريخ</td>
<td dir='RTL' align='right' rowspan='2' height='61' class='x35' style='border-bottom:2px solid windowtext;height:45.9pt;'>العدد الرتبي</td>
<td></td>
 </tr>
 <tr height='28' style='mso-height-source:userset;height:21pt'>
<td dir='RTL' align='right' height='24' class='x36' style='height:18pt;'>صرف</td>
<td dir='RTL' align='right' class='x36'>دخل</td>
<td dir='RTL' align='right' class='x36'>صرف</td>  
<td dir='RTL' align='right' class='x37'>دخل</td>
<td dir='RTL' align='right' class='x38' >استثمار <br>و تجهيز</td>
<td dir='RTL' align='right' class='x39' >مصاريف <br>أنشطة<br> أخرى</td>
<td dir='RTL' align='right' class='x39'>مصاريف <br>مختلفة</td>
<td dir='RTL' align='right' class='x39'>ادارة و<br> تصرف</td>
<td dir='RTL' align='right' class='x39'>أجور</td>
<td dir='RTL' align='right' class='x39'>صيانة و<br> اصلاح</td>
<td dir='RTL' align='right' class='x40'>مصاريف <br>استغلال <br>أخرى</td>
<td dir='RTL' align='right' class='x39'>الطاقة</td>
<td dir='RTL' align='right' class='x39'>شراء <br>الماء</td>
<td dir='RTL' align='right' class='x38'>مداخيل<br> مختلفة</td>
<td dir='RTL' align='right' class='x39'>مداخيل <br>أخرى</td>
<td dir='RTL' align='right' class='x39'>بيع <br>ماء</td>
<td dir='RTL' align='right' class='x41'>اشتراكات</td>
<td dir='RTL' align='right' class='x42'>انخراطات</td>
<td></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt;font-weight: bold;'>
<td height='19' class='x45' style='height:14.25pt;'>22</td>
<td class='x45' style="font-weight: bold;">21</td>
<td class='x45' style="font-weight: bold;">20</td>
<td class='x45' style="font-weight: bold;">19</td>
<td class='x45' style="font-weight: bold;">18</td>
<td class='x45' style="font-weight: bold;">17</td>
<td class='x45' style="font-weight: bold;">16</td>
<td class='x45' style="font-weight: bold;">15</td>
<td class='x45' style="font-weight: bold;">14</td>
<td class='x45' style="font-weight: bold;">13</td>
<td class='x45' style="font-weight: bold;">12</td>
<td class='x45' style="font-weight: bold;">11</td>
<td class='x45' style="font-weight: bold;">10</td>
<td class='x45' style="font-weight: bold;">9</td>
<td class='x45' style="font-weight: bold;">8</td>
<td class='x45' style="font-weight: bold;">7</td>
<td class='x46' style="font-weight: bold;">6</td>
<td class='x46' style="font-weight: bold;">5</td>
<td class='x47' style="font-weight: bold;">4</td>
<td class='x47' style="font-weight: bold;">3</td>
<td class='x47' style="font-weight: bold;">2</td>
<td class='x47' style="font-weight: bold;">1</td>
<td></td>
 </tr>
 <?php 
 $nb=1;
 function getCount($conn,$annee,$mois,$sear,$idGess){
  $sql = "SELECT sum($sear) AS countt FROM registre WHERE annee = $annee and mois='$mois' and idGess=$idGess";

  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // Fetch the result row
      $row = $result->fetch_assoc();
      
      // Access the count value
      return $row['countt'];

  }
  return 0;
  
}

if ($moisValue=="January")
{
   $sql1 = "SELECT * FROM registre WHERE idGess = $idGess and annee=$annee-1 and mois='all' ORDER BY date";

   $result1 = $conn->query($sql1);
   
   if ($result1->num_rows > 0) {
       while ($row = $result1->fetch_assoc()) {
?>
<tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='17' class='x52' style='height:12.9pt;'><?php echo $row['sarf1'] ; ?></td>
<td class='x52'><?php echo $row['dakhil1'] ; ?></td>
<td class='x49'><?php echo $row['sarf'] ; ?></td>
<td class='x49'><?php echo $row['dakhil'] ; ?></td>
<td class='x52'><?php echo $row['investissement_et_equipement'] ; ?></td>
<td class='x52'><?php echo $row['depenses_activites_autres'] ; ?></td>
<td class='x52'><?php echo $row['salaires2'] ; ?></td>
<td class='x52'><?php echo $row['gestion_et_administration'] ; ?></td>
<td class='x52'><?php echo $row['salaires'] ; ?></td>
<td class='x52'><?php echo $row['maintenance_et_reparations'] ; ?></td>
<td class='x52'><?php echo $row['autres_frais_exploitation'] ; ?></td>
<td class='x52'><?php echo $row['enrgie'] ; ?></td>
<td class='x52'><?php echo $row['achat_eau'] ; ?></td>
<td class='x48'><?php echo $row['montant_merchandises'] ; ?></td>
<td class='x48'><?php echo $row['autres_revenus'] ; ?></td>
<td class='x48'><?php echo $row['vente_eau'] ; ?></td>
<td class='x48'><?php echo $row['abonnements'] ; ?></td>
<td class='x48'><?php echo $row['adhesions'] ; ?></td>
<td dir='RTL' align='right' colspan='4' class='x50' style='border-right:2px solid windowtext;border-bottom:1px solid windowtext;'>الرصيد اخر السنة السابقة</td>
<td></td>
<?php }}


else { ?>


<tr height='20' style='mso-height-source:userset;height:15.6pt'>
<td height='18' class='x48' style='height:14.1pt;'></td>
<td class='x48'></td>
<td class='x49'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td dir='RTL' align='right' colspan='4' class='x50' style='border-right:2px solid windowtext;border-bottom:1px solid windowtext;'>الرصيد اخر السنة السابقة</td>
<td></td>
 </tr>


   <?php 

}} else {?>


  <tr height='20' style='mso-height-source:userset;height:15.6pt'>
<td height='18' class='x48' style='height:14.1pt;background:black'></td>
<td class='x48' ></td>
<td class='x49' style="background:black"></td>
<td class='x48 ' ></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td class='x48' style="background:black"></td>
<td dir='RTL' align='right' colspan='4' class='x50' style='border-right:2px solid windowtext;border-bottom:1px solid windowtext;'>الرصيد اخر السنة السابقة</td>
<td></td>
 </tr>





  <?php } ?>
 
 <?php
// Assuming you have established a database connection earlier

// Define the idGess value you want to retrieve

// Query to retrieve data based on idGess
$sql = "SELECT * FROM registre WHERE idGess = $idGess and annee=$annee and mois='$mois' ORDER BY date";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>

<tr height='19' style='mso-height-source:userset;height:14.4pt'>

<td height='17' class='x52' style='height:12.9pt;'><?php echo $row['sarf1'] ; ?></td>
<td class='x52'><?php echo $row['dakhil1'] ; ?></td>
<td class='x49'><?php echo $row['sarf'] ; ?></td>
<td class='x49'><?php echo $row['dakhil'] ; ?></td>
<td class='x52'><?php echo $row['investissement_et_equipement'] ; ?></td>
<td class='x52'><?php echo $row['depenses_activites_autres'] ; ?></td>
<td class='x52'><?php echo $row['salaires2'] ; ?></td>
<td class='x52'><?php echo $row['gestion_et_administration'] ; ?></td>
<td class='x52'><?php echo $row['salaires'] ; ?></td>
<td class='x52'><?php echo $row['maintenance_et_reparations'] ; ?></td>
<td class='x52'><?php echo $row['autres_frais_exploitation'] ; ?></td>
<td class='x52'><?php echo $row['enrgie'] ; ?></td>
<td class='x52'><?php echo $row['achat_eau'] ; ?></td>
<td class='x48'><?php echo $row['montant_merchandises'] ; ?></td>
<td class='x48'><?php echo $row['autres_revenus'] ; ?></td>
<td class='x48'><?php echo $row['vente_eau'] ; ?></td>
<td class='x48'><?php echo $row['abonnements'] ; ?></td>
<td class='x48'><?php echo $row['adhesions'] ; ?></td>
<td class='x53'><?php echo $row['numeros_acces'] ; ?></td>
<td class='x48'><?php echo $row['statement'] ; ?></td>
<td class='x48'><?php echo substr($row['dateAjout'], 11, 5); ; ?>/<?php echo $row['date'] ; ?> </td>
<td class='x49'><?php echo $nb; ?></td>
<td></td>
 </tr>


 <?php  
 $nb++;   
    }
} 
while ($nb < 32) {?>


<tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td height='17' class='x52' style='height:12.9pt;'></td>
<td class='x52'></td>
<td class='x49'></td>
<td class='x49'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x52'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x53'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x49'><?php echo $nb ; ?></td>
<td></td>
 </tr>


 <?php   $nb++;
}
?>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td height='16' class='x64' style='height:12pt;font-weight: bold;'> <?php echo getCount($conn,$annee,$mois,"sarf1",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"dakhil1",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"sarf",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"dakhil",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"investissement_et_equipement",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"depenses_activites_autres",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"salaires2",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"gestion_et_administration",$idGess) ?> </td>
<td class='x65' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"salaires",$idGess) ?> </td>
<td class='x65' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"maintenance_et_reparations",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"autres_frais_exploitation",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"enrgie",$idGess) ?> </td>
<td class='x65' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"achat_eau",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"montant_merchandises",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"autres_revenus",$idGess) ?> </td>
<td class='x65' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"vente_eau",$idGess) ?> </td>
<td class='x65' style="font-weight: bold;"> <?php echo getCount($conn,$annee,$mois,"abonnements",$idGess) ?> </td>
<td class='x64' style="font-weight: bold;"><?php echo getCount($conn,$annee,$mois,"adhesions",$idGess) ?></td>
<td dir='RTL' align='right' colspan='4' class='x66' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'><div style='float:right'>مجموع العمليات&nbsp;</div></td>
<td></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='2' height='16' class='x48' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;height:12pt;'>6</td>
<td colspan='2' class='x48' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'></td>
<td dir='RTL' align='right' colspan='2' class='x73' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'>الرصيد الجديد</td>
<td colspan='4' class='x75'>(5)=(1)-(2)+(6)=(3)-(4)</td>
<td colspan='13' style='mso-ignore:colspan;'></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='4' height='16' class='x77' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;height:12pt;'>7</td>
<td dir='RTL' align='right' colspan='2' class='x73' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'>الرصيد الجملي</td>
<td></td>
<td colspan='2' class='x80'>(7)=(5)+(6)</td>
<td colspan='14' style='mso-ignore:colspan;'></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='6' height='20' style='mso-ignore:colspan;height:15pt;'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td class='x48'></td>
<td dir='RTL' align='right' colspan='4' class='x81' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'><div style='float:right'>مجموع العمليات حتى متوفى الشهر السابق</div></td>
<td></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='6' height='20' style='mso-ignore:colspan;height:15pt;'></td>
<td class='x83'></td>
<td class='x84'></td>
<td class='x85'></td>
<td class='x85'></td>
<td class='x86'></td>
<td class='x86'></td>
<td class='x86'></td>
<td class='x87'></td>
<td class='x87'></td>
<td class='x86'></td>
<td class='x88'></td>
<td class='x89'></td>
<td dir='RTL' align='right' colspan='4' class='x90' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'><div style='float:right'>مجموع العمليات خلال الشهر</div></td>
<td></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='6' height='20' style='mso-ignore:colspan;height:15pt;'></td>
<td colspan='3' class='x91' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'></td>
<td class='x94'></td>
<td colspan='3' class='x95' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td colspan='2' style='mso-ignore:colspan;'></td>
<td class='x48'></td>
<td colspan='2' class='x95' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td colspan='5' style='mso-ignore:colspan;'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td colspan='6' height='19' style='mso-ignore:colspan;height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='3' class='x96'>مصاريف قارة</td>
<td dir='RTL' align='right'>صيانة</td>
<td dir='RTL' align='right' colspan='3' class='x97'>مصاريف متغيرة</td>
<td colspan='2' style='mso-ignore:colspan;'></td>
<td dir='RTL' align='right' style='overflow:hidden;'>مداخيل متغيرة<span style='display:none'>رة</span></td>
<td dir='RTL' align='right' colspan='2' class='x98'>مداخيل قارة</td>
<td colspan='5' style='mso-ignore:colspan;'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td dir='RTL' align='right' style='font-size: 22px ;margin-top: 30px;' colspan='3' height='19' class='x98' style='height:14.4pt;'>امضاء المحاسب: <br>...............</td>
<td colspan='14' style='mso-ignore:colspan;'></td>
<td dir='RTL' align='right' style='font-size: 22px ;' colspan='3' class='x99'><div style='float:right'>امضاء الرئيس: <br>....................</div></td>
<td colspan='3' style='mso-ignore:colspan;'></td>
 </tr>
<![if supportMisalignedColumns]>
 <tr height='0' style='display:none'>
  <td width='1840' colspan='23' style='width:1380pt;mso-ignore:colspan;'></td>
 </tr>
 <![endif]>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post">
  <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
    <div class="modal-content" dir="rtl">
      <div class="modal-header" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة عملية مالية </h1>
       
      </div>
      
      <div class="modal-body" style="max-height: 400px; overflow-y: auto;direction: rtl;">
      <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                        <div class="inputs-group col-5">
                                 <label_input class="label_input">الشهر</label_input>
                                 <input class="input--style-1" type="text" name="mois" disabled value="<?php echo $mois ?>">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> السنة</label_input>
                                 <input class="input--style-1" type="number" name="annee" disabled value="<?php echo $annee ?>">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                                 <label_input class="label_input">اليوم</label_input>
                                 <input class="input--style-1" type="number" name="date" min="1" max="31" disabled value="<?php echo $currentDayOfMonth; ?>" required>
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">البيان</label_input>
                                 <input class="input--style-1" type="text" name="statement" placeholder="البيان">
                              </div>
                             
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input">ارقام الوصولات او الصكوك	</label_input>
                                 <input class="input--style-1" type="text" name="numeros_acces" placeholder="ارقام الوصولات او الصكوك	">
                              </div>  
                           </div>
                           <h4 style="font-size:18px;margin-right:30px;">المداخيل</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">انخراطات</label_input>
                                 <input class="input--style-1" type="number"  step="any"  name="adhesions" placeholder="انخراطات">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">اشتراكات</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="abonnements" placeholder="اشتراكات">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input">   بيع ماء	</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="vente_eau" placeholder="بيع ماء	">
                              </div>  
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">مداخيل أخرى</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="autres_revenus" placeholder="مداخيل أخرى">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">مداخيل مختلفة</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="montant_merchandises" placeholder="مداخيل مختلفة">
                              </div>
                             
                           </div>
                           <h4 style="font-size:18px;margin-right:30px;">مصاريف</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> شراء الماء</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="achat_eau" placeholder=" شراء الماء">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> الطاقة</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="enrgie" placeholder=" الطاقة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input"> مصاريف استغلال أخرى	</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="autres_frais_exploitation" placeholder=" مصاريف استغلال أخرى">
                              </div>
                            
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">  صيانة و اصلاح</label_input>
                                 <input class="input--style-1" type="number" name="maintenance_et_reparations" placeholder="صيانة و اصلاح">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> أجور</label_input>
                                 <input class="input--style-1" type="number" name="salaires" placeholder=" أجور">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">    ادارة و تصرف</label_input>
                                 <input class="input--style-1" type="number" name="gestion_et_administration" placeholder="  ادارة و تصرف">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> مصاريف مختلفة</label_input>
                                 <input class="input--style-1" type="number" name="salaires2" placeholder=" مصاريف مختلفة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">مصاريف أنشطة أخرى</label_input>
                                <input class="input--style-1" type="number" name="depenses_activites_autres" placeholder="مصاريف أنشطة أخرى">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  استثمار و تجهيز</label_input>
                                <input class="input--style-1" type="number" name="investissement_et_equipement" placeholder="  استثمار و تجهيز">
                             </div>
                            
                          </div>
                          <h4 style="font-size:18px;margin-right:30px;">الصندوق</h4>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  دخل</label_input>
                                <input class="input--style-1" type="number" name="dakhil" placeholder="  دخل">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">    صرف</label_input>
                                <input class="input--style-1" type="number" name="sarf" placeholder="صرف">
                             </div>
                            
                          </div>
                          <h4 style="font-size:18px;margin-right:30px;">الحساب الجاري</h4>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  دخل</label_input>
                                <input class="input--style-1" type="number" name="dakhil1" placeholder="  دخل">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">    صرف</label_input>
                                <input class="input--style-1" type="number" name="sarf1" placeholder="صرف">
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



<div class="modal fade" id="exampleModal1" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post">
  <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
    <div class="modal-content" dir="rtl">
      <div class="modal-header" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <h1 class="modal-title fs-5" id="exampleModalLabel">  <?php 
     
         echo " إضافة  رصيد اخر سنة ".($annee-1);
      

?> </h1>
       
      </div>
      
      <div class="modal-body" style="max-height: 400px; overflow-y: auto;direction: rtl;">
      <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                       
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> السنة</label_input>
                                 <input class="input--style-1" type="number" name="annee" disabled value="<?php echo $annee-1 ?>">
                              </div>
                             
                           </div>
                          
                          
                           <h4 style="font-size:18px;margin-right:30px;">المداخيل</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">انخراطات</label_input>
                                 <input class="input--style-1" type="number"  step="any"  name="adhesions" placeholder="انخراطات">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">اشتراكات</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="abonnements" placeholder="اشتراكات">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input">   بيع ماء	</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="vente_eau" placeholder="بيع ماء	">
                              </div>  
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">مداخيل أخرى</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="autres_revenus" placeholder="مداخيل أخرى">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">مداخيل مختلفة</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="montant_merchandises" placeholder="مداخيل مختلفة">
                              </div>
                             
                           </div>
                           <h4 style="font-size:18px;margin-right:30px;">مصاريف</h4>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> شراء الماء</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="achat_eau" placeholder=" شراء الماء">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> الطاقة</label_input>
                                 <input class="input--style-1" type="number"  step="any" name="enrgie" placeholder=" الطاقة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-10">
                                 <label_input class="label_input"> مصاريف استغلال أخرى	</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="autres_frais_exploitation" placeholder=" مصاريف استغلال أخرى">
                              </div>
                            
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">  صيانة و اصلاح</label_input>
                                 <input class="input--style-1" type="number" name="maintenance_et_reparations" placeholder="صيانة و اصلاح">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> أجور</label_input>
                                 <input class="input--style-1" type="number" name="salaires" placeholder=" أجور">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">    ادارة و تصرف</label_input>
                                 <input class="input--style-1" type="number" name="gestion_et_administration" placeholder="  ادارة و تصرف">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> مصاريف مختلفة</label_input>
                                 <input class="input--style-1" type="number" name="salaires2" placeholder=" مصاريف مختلفة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">مصاريف أنشطة أخرى</label_input>
                                <input class="input--style-1" type="number" name="depenses_activites_autres" placeholder="مصاريف أنشطة أخرى">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  استثمار و تجهيز</label_input>
                                <input class="input--style-1" type="number" name="investissement_et_equipement" placeholder="  استثمار و تجهيز">
                             </div>
                            
                          </div>
                          <h4 style="font-size:18px;margin-right:30px;">الصندوق</h4>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  دخل</label_input>
                                <input class="input--style-1" type="number" name="dakhil" placeholder="  دخل">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">    صرف</label_input>
                                <input class="input--style-1" type="number" name="sarf" placeholder="صرف">
                             </div>
                            
                          </div>
                          <h4 style="font-size:18px;margin-right:30px;">الحساب الجاري</h4>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-5">
                                <label_input class="label_input">  دخل</label_input>
                                <input class="input--style-1" type="number" name="dakhil1" placeholder="  دخل">
                             </div>
                             <div class="inputs-group col-5">
                                <label_input class="label_input">    صرف</label_input>
                                <input class="input--style-1" type="number" name="sarf1" placeholder="صرف">
                             </div>
                            
                          </div>


      </div>
      <div class="modal-footer" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <button type="button"  style="width : 120px" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button> <!-- Change button text to Arabic -->
        <button type="submit" style="width : 120px" class="btn btn-success" name="submit2"> إضافة </button> <!-- Change button text to Arabic -->
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
