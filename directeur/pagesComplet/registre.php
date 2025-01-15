<?php 

include_once "../db/db.php";
session_start();
if (!isset($_SESSION["idPompiste"])) {
   header("location: ../login.php");
   exit();
 }

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
$monthDeriner = [
   'February' => 'January',
   'March' => 'February',
   'April' => 'March',
   'May' => 'April',
   'June' => 'May',
   'July' => 'June',
   'August' => 'July',
   'September' => 'August',
   'October' => 'September',
   'November' => 'October',
   'December' => 'November',
 ];
$mois = $monthTranslations[$moisValue] ?? '';
if($mois=='' || $annee==''){
  echo "<script>location.href='/a/directeur/'</script>";
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <link rel="File-List" href="_files_files/filelist.xml"/>
   <link href="https://a.ness.com.tn/gess/apgess/GDA/style/registreStyle.css" rel="stylesheet" />
   <link rel="Edit-Time-Data" href="_files_files/editdata.mso"/>
   <link rel="OLE-Object-Data" href="_files_files/oledata.mso"/>
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
   <script src="jqury.js"></script>
</head>
<body link='blue' vlink='purple' >
<div class="no-print">
<button class="capture-button" onclick="location.href='../index.php'">رجوع</button>
<button class='add-button'  data-bs-toggle='modal' data-bs-target='#exampleModal'>إضافة عملية مالية</button>

<button class="capture-button" onclick=" window.print()">طباعة</button>
</div>


<?php
$s_sarf1=0;
$s_dakhil1=0;
$s_sarf=0;
$s_dakhil=0;
$s_investissement_et_equipement=0;
$s_depenses_activites_autres=0;
$s_salaires2=0;
$s_gestion_et_administration=0;
$s_salaires=0;
$s_maintenance_et_reparations=0;
$s_autres_frais_exploitation=0;
$s_enrgie=0;
$s_achat_eau=0;
$s_montant_merchandises=0;
$s_autres_revenus=0;
$s_vente_eau=0;
$s_abonnements=0;
$s_adhesions=0;
$s_numeros_acces=0;
$s_statement=0;
?>

<table border='0' cellpadding='0' cellspacing='0' width='1900' style='border-collapse: collapse;table-layout:fixed;width:1380pt'>
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
      <?php
         if($moisValue!='January'){
            $valueMonthDeriner=$monthTranslations[$monthDeriner[$moisValue]];
            $sql1 = "SELECT sarf1,dakhil1,sarf,dakhil FROM registre WHERE idGess = $idGess and annee=$annee and mois='$valueMonthDeriner'  ORDER BY date ";

            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
               while ($row1 = $result1->fetch_assoc()) { 
                  $s_dakhil1=$s_dakhil1+$row1['dakhil1']-$row1['sarf1'];
                  $s_dakhil=$s_dakhil+$row1['dakhil']-$row1['sarf'];
               }
            }
         }else{
            $annee1=$annee-1;
            $sql1 = "SELECT sarf1,dakhil1,sarf,dakhil FROM registre WHERE idGess = $idGess and annee=$annee1  ORDER BY date ";

            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
               while ($row1 = $result1->fetch_assoc()) { 
                  $s_dakhil1=$s_dakhil1+$row1['dakhil1']-$row1['sarf1'];
                  $s_dakhil=$s_dakhil+$row1['dakhil']-$row1['sarf'];
               }
            }
         }
      ?>

      <tr height="20" style="mso-height-source:userset;height:15.6pt">
         <td height="18" class="x48" style="height:14.1pt;background:black"></td>
         <td class="x48"><?php echo $s_dakhil1 ; ?></td>
         <td class="x49" style="background:black"></td>
         <td class="x48 "><?php echo $s_dakhil ; ?></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td class="x48" style="background:black"></td>
         <td dir="RTL" align="right" colspan="4" class="x50" style="border-right:2px solid windowtext;border-bottom:1px solid windowtext;">
         <?php 
            if($moisValue='January'){
               echo 'الرصيد اخر السنة السابقة';
            }else{
               echo 'الرصيد اخر الشهر السابقة';
            }
         ?>
         </td>
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
         $sql = "SELECT * FROM registre WHERE idGess = $idGess and annee=$annee and mois='$mois'  ORDER BY date ";

         $result = $conn->query($sql);
         $nb=0;

         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
               $nb = $nb+1;

               $s_sarf1=$s_sarf1+$row['sarf1'];
               $s_dakhil1=$s_dakhil1+$row['dakhil1'];
               $s_sarf=$s_sarf+$row['sarf'];
               $s_dakhil=$s_dakhil+$row['dakhil'];
               $s_investissement_et_equipement=$s_investissement_et_equipement+$row['investissement_et_equipement'];
               $s_depenses_activites_autres=$s_depenses_activites_autres+$row['depenses_activites_autres'];
               $s_salaires2 = $s_salaires2 + $row['salaires2'];
               $s_gestion_et_administration=$s_gestion_et_administration+$row['gestion_et_administration'];
               $s_salaires=$s_salaires+$row['salaires'];
               $s_maintenance_et_reparations=$s_maintenance_et_reparations+$row['maintenance_et_reparations'];
               $s_autres_frais_exploitation=$s_autres_frais_exploitation+$row['autres_frais_exploitation'];
               $s_enrgie=$s_enrgie+$row['enrgie'];
               $s_achat_eau=$s_achat_eau+$row['achat_eau'];
               $s_montant_merchandises=$s_montant_merchandises+$row['montant_merchandises'];
               $s_autres_revenus= $s_autres_revenus+$row['autres_revenus'];
               $s_vente_eau=$s_vente_eau+$row['vente_eau'];
               $s_abonnements= $s_abonnements+$row['abonnements'];
               $s_adhesions=$s_adhesions+$row['adhesions'];
               
      ?>
         <tr height='19' style='mso-height-source:userset;height:14.4pt'>
            <td height='17' class='x52 td_<?php echo $row['idRegistre']?>' style='height:12.9pt;'><?php echo $row['sarf1'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['dakhil1'] ; ?></td>
            <td class='x49 td_<?php echo $row['idRegistre']?>'><?php echo $row['sarf'] ; ?></td>
            <td class='x49 td_<?php echo $row['idRegistre']?>'><?php echo $row['dakhil'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['investissement_et_equipement'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['depenses_activites_autres'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['salaires2'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['gestion_et_administration'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['salaires'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['maintenance_et_reparations'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['autres_frais_exploitation'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['enrgie'] ; ?></td>
            <td class='x52 td_<?php echo $row['idRegistre']?>'><?php echo $row['achat_eau'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['montant_merchandises'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['autres_revenus'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['vente_eau'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['abonnements'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['adhesions'] ; ?></td>
            <td class='x53 td_<?php echo $row['idRegistre']?>'><?php echo $row['numeros_acces'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo $row['statement'] ; ?></td>
            <td class='x48 td_<?php echo $row['idRegistre']?>'><?php echo substr($row['dateAjout'], 5, 6); ; ?> </td>
            <td class='x49 td_<?php echo $row['idRegistre']?>'><?php echo $nb; ?></td>
            <td class="td_<?php echo $row['idRegistre']?>"></td>
         </tr>
         <div class="modal fade" id="exampleModal<?php echo $row['idRegistre']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post">
               <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
                  <div class="modal-content" style="width: 150%;" dir="rtl">
                     <div class="modal-header" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
                        <h1 class="modal-title fs-5" id="exampleModalLabel">تعديل على عملية مالية </h1>
                     </div>
                     <div class="modal-body" style="max-height: 400px; overflow-y: auto;direction: rtl;">
                        <input type="text" class="d-none" name="idRegistre1" value="<?php echo $row['idRegistre'] ?>">
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
                              <label_input class="label_input">العملة</label_input>
                              <input class="input--style-1" type="number" name="date" min="1" max="31" value="<?php echo $currentDayOfMonth; ?>" required>
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">البيان</label_input>
                              <input class="input--style-1" type="text" name="statement" value="<?php echo $row['statement'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-10">
                              <label_input class="label_input">ارقام الوصولات او الصكوك	</label_input>
                              <input class="input--style-1" type="text" name="numeros_acces" value="<?php echo $row['numeros_acces'] ; ?>">
                           </div>  
                        </div>
                        <h4 style="font-size:18px;margin-right:30px;">المداخيل</h4>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input">انخراطات</label_input>
                              <input class="input--style-1" type="number"  step="any"  name="adhesions" value="<?php echo $row['adhesions'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">اشتراكات</label_input>
                              <input class="input--style-1" type="number" step="any"  name="abonnements" value="<?php echo $row['abonnements'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-10">
                              <label_input class="label_input">   بيع ماء	</label_input>
                              <input class="input--style-1" type="number"  step="any" name="vente_eau" value="<?php echo $row['vente_eau'] ; ?>">
                           </div>  
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input">مداخيل أخرى</label_input>
                              <input class="input--style-1" type="number" step="any"  name="autres_revenus" value="<?php echo $row['autres_revenus'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">مداخيل مختلفة</label_input>
                              <input class="input--style-1" type="number"  step="any" name="montant_merchandises" value="<?php echo $row['montant_merchandises'] ; ?>">
                           </div>
                        </div>
                        <h4 style="font-size:18px;margin-right:30px;">مصاريف</h4>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input"> شراء الماء</label_input>
                              <input class="input--style-1" type="number" step="any"  name="achat_eau" value="<?php echo $row['achat_eau'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input"> الطاقة</label_input>
                              <input class="input--style-1" type="number"  step="any" name="enrgie" value="<?php echo $row['enrgie'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-10">
                              <label_input class="label_input"> مصاريف استغلال أخرى	</label_input>
                              <input class="input--style-1" type="number" step="any"  name="autres_frais_exploitation" value="<?php echo $row['autres_frais_exploitation'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input">  صيانة و اصلاح</label_input>
                              <input class="input--style-1" type="number" name="maintenance_et_reparations" value="<?php echo $row['maintenance_et_reparations'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input"> أجور</label_input>
                              <input class="input--style-1" type="number" name="salaires" value="<?php echo $row['salaires'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input">    ادارة و تصرف</label_input>
                              <input class="input--style-1" type="number" name="gestion_et_administration" value="<?php echo $row['gestion_et_administration'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input"> مصاريف مختلفة</label_input>
                              <input class="input--style-1" type="number" name="salaires2" value="<?php echo $row['salaires2'] ; ?>">
                           </div>
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           
                           <div class="inputs-group col-5">
                              <label_input class="label_input">مصاريف أنشطة أخرى</label_input>
                              <input class="input--style-1" type="number" name="depenses_activites_autres" value="<?php echo $row['depenses_activites_autres'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">  استثمار و تجهيز</label_input>
                              <input class="input--style-1" type="number" name="investissement_et_equipement" value="<?php echo $row['investissement_et_equipement'] ; ?>">
                           </div>
                        </div>
                        <h4 style="font-size:18px;margin-right:30px;">الصندوق</h4>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                              <label_input class="label_input">  دخل</label_input>
                              <input class="input--style-1" type="number" name="dakhil" value="<?php echo $row['dakhil'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">    صرف</label_input>
                              <input class="input--style-1" type="number" name="sarf" value="<?php echo $row['sarf'] ; ?>">
                           </div>
                        </div>
                        <h4 style="font-size:18px;margin-right:30px;">الحساب الجاري</h4>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           
                           <div class="inputs-group col-5">
                              <label_input class="label_input">  دخل</label_input>
                              <input class="input--style-1" type="number" name="dakhil1" value="<?php echo $row['dakhil1'] ; ?>">
                           </div>
                           <div class="inputs-group col-5">
                              <label_input class="label_input">    صرف</label_input>
                              <input class="input--style-1" type="number" name="sarf1" value="<?php echo $row['sarf1'] ; ?>">
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
                        <button type="button"  style="width : 120px" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button> <!-- Change button text to Arabic -->
                        <button type="submit" style="width : 120px" class="btn btn-success" name="submit"> تعديل </button> <!-- Change button text to Arabic -->
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <script>
            $('.td_<?php echo $row['idRegistre']?>').click(function(){
               $('#exampleModal<?php echo $row['idRegistre']?>').modal('show');
            })
         </script>
         <?php
         
            }
         }
         if($nb<31){
            for($nb ; $nb<31 ; $nb++){
            ?>
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
                  <td class='x48'> </td>
                  <td class='x49'><?php echo $nb; ?></td>
                  <td></td>
               </tr>
            <?php
            }
         }
      ?>







      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td height="16" class="x64" style="height:12pt;font-weight: bold;"><?php echo $s_sarf1 ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_dakhil1 ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_sarf ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_dakhil ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_investissement_et_equipement ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_depenses_activites_autres ;?></td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_salaires2 ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_gestion_et_administration ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_salaires ;?>  </td>
         <td class="x65" style="font-weight: bold;"><?php echo $s_maintenance_et_reparations ;?>  </td>
         <td class="x65" style="font-weight: bold;"><?php echo $s_autres_frais_exploitation ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_enrgie ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_achat_eau ;?>  </td>
         <td class="x65" style="font-weight: bold;"><?php echo $s_montant_merchandises ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_autres_revenus ;?>  </td>
         <td class="x64" style="font-weight: bold;"><?php echo $s_vente_eau ;?>  </td>
         <td class="x65" style="font-weight: bold;"><?php echo $s_abonnements ;?>  </td>
         <td class="x65" style="font-weight: bold;"><?php echo $s_adhesions ;?>  </td>

         <td dir="RTL" align="right" colspan="4" class="x66" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;"><div style="float:right">مجموع العمليات&nbsp;</div></td>
         <td></td>
      </tr>
      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td colspan="2" height="16" class="x48" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;height:12pt;"><?php echo $s_dakhil1-$s_sarf1 ?></td>
         <td colspan="2" class="x48" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;"><?php echo $s_dakhil-$s_sarf ?></td>
         <td dir="RTL" align="right" colspan="2" class="x73" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;">الرصيد الجديد</td>
         <td colspan="4" class="x75">(5)=(1)-(2)+(6)=(3)-(4)</td>
         <td colspan="13" style="mso-ignore:colspan;"></td>
      </tr>
      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td colspan="4" height="16" class="x77" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;height:12pt;"><?php echo $s_dakhil1-$s_sarf1+$s_dakhil-$s_sarf ?></td>
         <td dir="RTL" align="right" colspan="2" class="x73" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;">الرصيد الجملي</td>
         <td></td>
         <td colspan="2" class="x80">(7)=(5)+(6)</td>
         <td colspan="14" style="mso-ignore:colspan;"></td>
      </tr>
      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td colspan="6" height="20" style="mso-ignore:colspan;height:15pt;"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td class="x48"></td>
         <td dir="RTL" align="right" colspan="4" class="x81" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;"><div style="float:right">مجموع العمليات حتى متوفى الشهر السابق</div></td>
         <td></td>
      </tr>
      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td colspan="6" height="20" style="mso-ignore:colspan;height:15pt;"></td>
         <td class="x83"></td>
         <td class="x84"></td>
         <td class="x85"></td>
         <td class="x85"></td>
         <td class="x86"></td>
         <td class="x86"></td>
         <td class="x86"></td>
         <td class="x87"></td>
         <td class="x87"></td>
         <td class="x86"></td>
         <td class="x88"></td>
         <td class="x89"></td>
         <td dir="RTL" align="right" colspan="4" class="x90" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;"><div style="float:right">مجموع العمليات خلال الشهر</div></td>
         <td></td>
      </tr>
      <tr height="20" style="mso-height-source:userset;height:15pt">
         <td colspan="6" height="20" style="mso-ignore:colspan;height:15pt;"></td>
         <td colspan="3" class="x91" style="border-right:2px solid windowtext;border-bottom:2px solid windowtext;"><?php echo $s_salaires+$s_gestion_et_administration+$s_salaires2  ;   ?></td>
         <td class="x94"><?php echo $s_maintenance_et_reparations; ?></td>
         <td colspan="3" class="x95" style="border-right:1px solid windowtext;border-bottom:1px solid windowtext;"><?php echo $s_achat_eau+$s_enrgie+$s_autres_frais_exploitation  ;   ?></td>
         <td colspan="2" style="mso-ignore:colspan;"></td>
         <td class="x48"><?php echo $s_vente_eau+$s_autres_revenus+$s_montant_merchandises  ;   ?></td>
         <td colspan="2" class="x95" style="border-right:1px solid windowtext;border-bottom:1px solid windowtext;"><?php echo $s_adhesions+$s_abonnements ?></td>
         <td colspan="5" style="mso-ignore:colspan;"></td>
      </tr>
      <tr height="19" style="mso-height-source:userset;height:14.4pt">
         <td colspan="6" height="19" style="mso-ignore:colspan;height:14.4pt;"></td>
         <td dir="RTL" align="right" colspan="3" class="x96">مصاريف قارة</td>
         <td dir="RTL" align="right">صيانة</td>
         <td dir="RTL" align="right" colspan="3" class="x97">مصاريف متغيرة</td>
         <td colspan="2" style="mso-ignore:colspan;"></td>
         <td dir="RTL" align="right" style="overflow:hidden;">مداخيل متغيرة<span style="display:none">رة</span></td>
         <td dir="RTL" align="right" colspan="2" class="x98">مداخيل قارة</td>
         <td colspan="5" style="mso-ignore:colspan;"></td>
      </tr>
      <tr height="19" style="mso-height-source:userset;height:14.4pt">
         <td dir="RTL" align="right" style="font-size: 22px ;margin-top: 30px;" colspan="3" height="19" class="x98">امضاء المحاسب: <br>...............</td>
         <td colspan="14" style="mso-ignore:colspan;"></td>
         <td dir="RTL" align="right" style="font-size: 22px ;" colspan="3" class="x99"><div style="float:right">امضاء الرئيس: <br>....................</div></td>
         <td colspan="3" style="mso-ignore:colspan;"></td>
      </tr>
   </col>
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
                     <label_input class="label_input">العملة</label_input>
                     <input class="input--style-1" type="number" name="date" min="1" max="31" value="<?php echo $currentDayOfMonth; ?>" required>
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

</body>

</html>
