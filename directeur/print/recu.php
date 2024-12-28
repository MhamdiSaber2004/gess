<?php  


error_reporting(E_ERROR | E_PARSE);


include_once "../db/db.php";

if(isset($_GET['idFacture']) && ! empty ( $_GET['idFacture'] ))
{
    $idFacture=$_GET['idFacture'];
    $sql = "SELECT * FROM facture_aep where idFacture=$idFacture";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        $facture = $result->fetch_assoc();


        $idBenefique=$facture['idBenefique'];
        $sql = "SELECT * FROM benefique_aep where idBenefique='$idBenefique'";
    $result = $conn->query($sql);
    $benefique = $result->fetch_assoc();



    $sql = "SELECT * FROM dette_aep where idBenefique='$idBenefique'";
    $result = $conn->query($sql);
    $dette = $result->fetch_assoc();

$idConsommation=$facture['idConsommation'];
    $sql = "SELECT * FROM consommation_aep where idConsommation='$idConsommation'";
    $result = $conn->query($sql);
    $consommation = $result->fetch_assoc();

    $idConsommationPrecedente=$facture['idConsommationPrecedente'];
    $sql = "SELECT * FROM consommation_aep where idConsommation='$idConsommationPrecedente'";
    $result = $conn->query($sql);
    $consommationPrecedent = $result->fetch_assoc();

    $idGess=$facture['idGess'];
    $sql = "SELECT * FROM parametre where idGess='$idGess'";
    $result = $conn->query($sql);
    $parametre = $result->fetch_assoc();


    $sql = "SELECT * FROM gess where idGess='$idGess'";
    $result = $conn->query($sql);
    $gess = $result->fetch_assoc();

        
    }
    else
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
   header("Location: ../index.php?page=factureAEP");
        exit();
    }
}





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
<link rel="Edit-Time-Data" href="_files_files/editdata.mso"/>
<link rel="OLE-Object-Data" href="_files_files/oledata.mso"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<link type="text/css" href="./assets/css/argon-rtl.css" rel="stylesheet">

<link href="recu.css" rel="stylesheet" />
<style>


</style>

</head>
<body  class='col-12'>


  <br><br>
  <div class="card-header  border-0">
              <div class="row align-items-center" style="font-size:16px">
                <div class="col-4" style="margin-left:50px">
                  <h3 class="mb-0"> <a href="../index.php?page=factureAEP" class="btn btn-sm btn-primary">رجوع</a></h3>
                </div>
                <div class="col-4 text-right">
                 
                  <button onclick="printPompiste('printDiv')" class="btn col-12 btn-sm btn-primary">طباعة</button> 
                </div>
              </div>
            </div>




<div  class="no-print" id="printDiv">
<table cellpadding='0' cellspacing='0' width='1153' style='border-collapse: collapse;table-layout:fixed;width:864pt'>
 <col class='x21' width='62' span='2' style='mso-width-source:userset;background:none;width:46.5pt'/>
 <col class='x21' width='78' style='mso-width-source:userset;background:none;width:58.5pt'/>
 <col class='x21' width='99' style='mso-width-source:userset;background:none;width:74.25pt'/>
 <col class='x21' width='35' style='mso-width-source:userset;background:none;width:26.25pt'/>
 <col class='x21' width='110' style='mso-width-source:userset;background:none;width:82.5pt'/>
 <col class='x21' width='16' style='mso-width-source:userset;background:none;width:12pt'/>
 <col class='x21' width='17' style='mso-width-source:userset;background:none;width:12.75pt'/>
 <col class='x21' width='48' style='mso-width-source:userset;background:none;width:36pt'/>
 <col class='x21' width='66' style='mso-width-source:userset;background:none;width:49.5pt'/>
 <col class='x21' width='74' style='mso-width-source:userset;background:none;width:55.5pt'/>
 <col class='x21' width='6' style='mso-width-source:userset;background:none;width:4.5pt'/>
 <col class='x21' width='58' style='mso-width-source:userset;background:none;width:43.5pt'/>
 <col class='x21' width='68' style='mso-width-source:userset;background:none;width:51pt'/>
 <col class='x21' width='72' style='mso-width-source:userset;background:none;width:54pt'/>
 <col class='x21' width='58' style='mso-width-source:userset;background:none;width:43.5pt'/>
 <col class='x21' width='60' style='mso-width-source:userset;background:none;width:45pt'/>
 <col class='x21' width='96' style='mso-width-source:userset;background:none;width:72pt'/>
 <col class='x21' width='68' style='mso-width-source:userset;background:none;width:51pt'/>
 <tr height='32' style='mso-height-source:userset;height:24pt;mso-xlrowspan:2'>
<td colspan='19' height='16' class='x21' width='1153' style='mso-ignore:colspan;height:12pt;'></td>
 </tr>
 <tr height='26' style='mso-height-source:userset;height:19.8pt'>
<td colspan='19' height='26' class='x21' style='mso-ignore:colspan;height:19.8pt;'></td>
 </tr>
 <tr height='6' style='mso-height-source:userset;height:4.8pt'>
<td colspan='2' height='6' class='x21' style='mso-ignore:colspan;height:4.8pt;'></td>
<td colspan='3' rowspan='2' height='19' class='x56' style='border-bottom:1px solid windowtext;height:14.25pt;'><div style='display:block;overflow:hidden'>..........................</div></td>
<td dir='RTL' align='right' rowspan='2' height='19' class='x39' style='border-bottom:1px solid windowtext;height:14.25pt;'><div style='display:block;overflow:hidden'>اسم صاحب الفاتورة</div></td>
<td class='x21'></td>
<td class='x38'><div style='display:block;overflow:hidden'></div></td>
<td colspan='3' class='x22' style='mso-ignore:colspan;'><div style='display:block;overflow:hidden'></div></td>
<td rowspan='10' height='175' class='x40' style='border-bottom:1px solid windowtext;height:131.25pt;'><div style='display:block;overflow:hidden'></div></td>
<td colspan='6' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;'><div style='display:block;overflow:hidden'></div></td>
<td class='x21'></td>
 </tr>
 <tr height='13' style='mso-height-source:userset;height:10.2pt'>
<td colspan='2' height='13' class='x21' style='mso-ignore:colspan;height:10.2pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x25'></td>
<td class='x26'></td>
<td dir='RTL' align='right' class='x27'><div style='float:right'>معاليم أخرى</div></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $benefique['numCompteur'] ?></td>
<td dir='RTL' align='right' class='x28' style='overflow:hidden;'>&nbsp;رقم الحنفي<span style=''>ة</span></td>
<td colspan='3' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><?php echo $benefique['nom'] ?></td>
<td dir='RTL' align='right' rowspan='2' height='28' class='x74' style='border-bottom:1px solid windowtext;height:21.6pt;'><div style='margin-left:-10px'>إسم و لقب المنتفع</div></td>
<td class='x21'></td>
 </tr>
 <tr height='15' style='mso-height-source:userset;height:11.4pt'>
<td colspan='2' height='15' class='x21' style='mso-ignore:colspan;height:11.4pt;'></td>
<td rowspan='7' height='152' class='x56' style='height:114.45pt;'></td>
<td dir='RTL' align='right' colspan='3' rowspan='2' height='31' class='x40' style='border-right:1px solid windowtext;height:23.85pt;'>المبلغ المدفوع (بلسان القلم)</td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x25'></td>
<td class='x31'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $parametre['autrePrix'] ?></td>
<td class='x32'><div style='float:right'>(............)</div></td>
<td class='x22'></td>
<td colspan='4' class='x28' style='mso-ignore:colspan;'></td>
<td class='x21'></td>
 </tr>
 <tr height='17' style='mso-height-source:userset;height:13.2pt'>
<td colspan='2' height='17' class='x21' style='mso-ignore:colspan;height:13.2pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td class='x33'></td>
<td dir='RTL' align='right' class='x34'><div style='float:right'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>فترة الاستهلاك</div></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'><span style=''>الك</span>مية المستهلك<span style=''>ة</span></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'><span style=''>ا</span>لرقم القدي<span style=''>م</span></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'>الرقم الجديد</td>
<td dir='RTL' align='right' class='x35'>تاريخ رفع العداد</td>
<td class='x21'></td>
 </tr>
 <tr height='34' style='mso-height-source:userset;height:25.8pt'>
<td colspan='2' height='34' class='x21' style='mso-ignore:colspan;height:25.8pt;'></td>
<td class='x28'></td>
<td rowspan='5' height='120' class='x41' style='height:90.6pt;'></td>
<td dir='RTL' align='right' rowspan='2' height='54' class='x43' style='height:40.8pt;'><div style='margin-left:-10px'>الدين المتبقي بالارقام</div></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dette['dette']-($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3'] ?></td>
<td dir='RTL' align='right' class='x36'><br>المبلغ المتخلّد<span style='mso-spacerun:yes;'>&nbsp; </span>بالذمة</td>
<td dir='RTL' align='right' class='x29' style="font-size:10px">الى <br><?php echo  substr($consommation['date'], 0,10)?></td>
<td dir='RTL' align='right' class='x29' style="font-size:10px">من <br><?php echo  substr($consommationPrecedent['date'], 0,10)?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommation['numConsomme'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  substr($consommation['date'], 0,10)?></td>
<td class='x21'></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15pt'>
<td colspan='2' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
<td class='x29'></td>
<td class='x21'></td>
<td class='x38'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td colspan='6' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
<td class='x21'></td>
 </tr>
 <tr height='36' style='mso-height-source:userset;height:27.6pt'>
<td colspan='2' height='36' class='x21' style='mso-ignore:colspan;height:27.6pt;'></td>
<td rowspan='3' height='65' class='x40' style='border-top:1px solid windowtext;height:49.05pt;'></td>
<td dir='RTL' align='right' rowspan='3' height='66' class='x77' style='height:49.8pt;'>التاريخ :</td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dette['dette'] ?></td>
<td dir='RTL' align='right' class='x36'>المبلغ الجملي<br> المطلوب</td>
<td dir='RTL' align='right' colspan='2' class='x87' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>المعلوم الجملي<br> للاستهلاك</td>
<td dir='RTL' align='right' class='x37'>المعلوم <br>القار</td>
<td dir='RTL' align='right' class='x37'>المبلغ<br></td>
<td dir='RTL' align='right' class='x37'>السعر<br> الفردي</td>
<td dir='RTL' align='right' class='x37'>الكمية<br><span style='mso-spacerun:yes;'>&nbsp; </span>المستهلكة&nbsp;</td>
<td class='x21'></td>
 </tr>
 <tr height='14' style='mso-height-source:userset;height:10.8pt'>
<td colspan='2' height='14' class='x21' style='mso-ignore:colspan;height:10.8pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td colspan='2' rowspan='3' height='31' class='x50' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:23.25pt;'><?php echo ($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3']+$parametre['prixFixe'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $parametre['prixFixe'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo ($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $parametre['prixM3'] ?> </td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x21'></td>
 </tr>
 <tr height='15' style='mso-height-source:userset;height:11.4pt'>
<td colspan='2' height='15' class='x21' style='mso-ignore:colspan;height:11.4pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime( substr($facture['date'], 0,10) . ' +1 month')) ?></td>
<td dir='RTL' align='right' class='x36'>أخر أجل للدفع</td>
<td class='x21'></td>
 </tr>
 <tr height='2' style='mso-height-source:userset;height:1.8pt'>
<td colspan='2' height='2' class='x21' style='mso-ignore:colspan;height:1.8pt;'></td>
<td colspan='5' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'><div style='display:block;overflow:hidden'></div></td>
<td class='x38'><div style='display:block;overflow:hidden'></div></td>
<td colspan='2' class='x25' style='mso-ignore:colspan;'><div style='display:block;overflow:hidden'></div></td>
<td class='x36'><div style='display:block;overflow:hidden'><br></div></td>
<td class='x21'></td>
 </tr>
 <tr height='19' style='mso-height-source:userset;height:14.4pt'>
<td colspan='2' height='19' class='x21' style='mso-ignore:colspan;height:14.4pt;'></td>
<td dir='RTL' align='right' colspan='4' rowspan='5' height='95' class='x67' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:71.25pt;'>إمضاء و ختم أمين المال</td>
<td class='x21'></td>
<td class='x38'></td>
<td dir='RTL' align='right' colspan='4' rowspan='4' height='71' class='x78' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:53.25pt;'><div style='float:right'>التاريخ و إسم و إمضاء متسلم الفاتورة</div></td>
<td dir='RTL' align='right' colspan='2' rowspan='4' height='71' class='x67' style='border-bottom:1px solid windowtext;height:53.25pt;'>إمضاء أمين المال</td>
<td dir='RTL' align='right' colspan='4' rowspan='4' height='71' class='x68' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:53.25pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>إمضاء رئيس المجمع</td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x21'></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15.6pt'>
<td colspan='2' height='20' class='x21' style='mso-ignore:colspan;height:15.6pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td class='x21'></td>
 </tr>
 <tr height='24' style='mso-height-source:userset;height:18pt'>
<td colspan='2' height='24' class='x21' style='mso-ignore:colspan;height:18pt;'></td>
<td class='x21'></td>
<td class='x38'></td>
<td colspan='7' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td dir='RTL' align='right' colspan='3' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>رقم الحساب الجاري للمجمع</td>
<td class='x21'></td>
 </tr>
 <tr height='32' style='mso-height-source:userset;height:24pt;mso-xlrowspan:2'>
<td colspan='19' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td colspan='16' class='x23' style='mso-ignore:colspan;'></td>
<td class='x21'></td>
 </tr>
 <tr height='25' style='mso-height-source:userset;height:19.2pt'>
<td colspan='3' height='25' class='x21' style='mso-ignore:colspan;height:19.2pt;'></td>
<td class='x29'></td>
<td dir='RTL' align='right' colspan='2' class='x42'><div style='margin-left:-10px'><font class="font4" style="text-decoration: none;">&nbsp;</font><font class="font2" style="text-decoration: none;"><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span></font><font class="font3" style="text-decoration: none;">خلاص الفاتورة رقم :</font></div></td>
<td class='x28'></td>
<td class='x61'></td>
<td dir='RTL' align='right' colspan='5' class='x62' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>كشف استهلاك الماء</td>
<td colspan='5' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td class='x21'></td>
 </tr>
 <tr height='20' style='mso-height-source:userset;height:15.6pt'>
<td colspan='7' height='20' class='x21' style='mso-ignore:colspan;height:15.6pt;'></td>
<td class='x61'></td>
<td colspan='2' class='x66' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $idFacture ?></td>
<td dir='RTL' align='right' colspan='2' class='x65' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><div style='margin-left:-10px'>فاتورة رقم</div></td>
<td colspan='2' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><?php echo $gess['nom'] ?></td>
<td dir='RTL' align='right' colspan='3' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><div style='margin-left:-10px'>مجمع التنمية في قطاع الفلاحة<span style='mso-spacerun:yes;'>&nbsp; </span>و الصيد البحري<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;</span></div></td>
<td class='x21'></td>
 </tr>
 <tr height='0' style='mso-height-source:userset;height:0.6pt'>
<td colspan='2' height='0' class='x21' style='mso-ignore:colspan;height:0.6pt;'></td>
<td colspan='3' rowspan='2' height='18' class='x67' style='border-bottom:1px solid windowtext;height:13.65pt;'><div style='display:block;overflow:hidden'>..........................</div></td>
<td dir='RTL' align='right' rowspan='2' height='18' class='x73' style='border-bottom:1px solid windowtext;height:13.65pt;'><div style='display:block;overflow:hidden'>اسم صاحب الفاتورة</div></td>
<td class='x21'></td>
<td class='x61'><div style='display:block;overflow:hidden'></div></td>
<td colspan='3' class='x22' style='mso-ignore:colspan;'><div style='display:block;overflow:hidden'></div></td>
<td rowspan='10' height='167' class='x40' style='border-bottom:1px solid windowtext;height:125.25pt;'><div style='display:block;overflow:hidden'></div></td>
<td colspan='6' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;'><div style='display:block;overflow:hidden'></div></td>
<td class='x21'></td>
 </tr>
 <tr height='18' style='mso-height-source:userset;height:13.8pt'>
<td colspan='2' height='18' class='x21' style='mso-ignore:colspan;height:13.8pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x25'></td>
<td class='x26'></td>
<td dir='RTL' align='right' class='x27'><div style='float:right'>معاليم أخرى</div></td>
<td class='x29'></td>
<td dir='RTL' align='right' class='x28' style='overflow:hidden;'>&nbsp;رقم الحنفي<span style=''>ة</span></td>
<td colspan='3' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td dir='RTL' align='right' rowspan='2' height='32' class='x74' style='border-bottom:1px solid windowtext;height:24pt;'><div style='margin-left:-10px'>إسم و لقب المنتفع</div></td>
<td class='x21'></td>
 </tr>
 <tr height='13' style='mso-height-source:userset;height:10.2pt'>
<td colspan='2' height='13' class='x21' style='mso-ignore:colspan;height:10.2pt;'></td>
<td rowspan='7' height='144' class='x56' style='height:108.45pt;'></td>
<td dir='RTL' align='right' colspan='3' rowspan='2' height='28' class='x40' style='border-right:1px solid windowtext;height:21.45pt;'><div style='margin-left:-10px'>المبلغ المدفوع (بلسان القلم)<span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x25'></td>
<td class='x31'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $parametre['autrePrix'] ?></td>
<td class='x32'><div style='float:right'>(............)</div></td>
<td class='x22'></td>
<td colspan='4' class='x28' style='mso-ignore:colspan;'></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td class='x33'></td>
<td dir='RTL' align='right' class='x34'><div style='float:right'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>فترة الاستهلاك</div></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'><span style=''>الك</span>مية المستهلك<span style=''>ة</span></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'><span style=''>ا</span>لرقم القدي<span style=''>م</span></td>
<td dir='RTL' align='right' class='x35' style='overflow:hidden;'>الرقم الجديد</td>
<td dir='RTL' align='right' class='x35'>تاريخ رفع العداد</td>
<td class='x21'></td>
 </tr>
 <tr height='35' style='mso-height-source:userset;height:26.4pt'>
<td colspan='2' height='35' class='x21' style='mso-ignore:colspan;height:26.4pt;'></td>
<td class='x28'></td>
<td rowspan='5' height='116' class='x41' style='height:87pt;'></td>
<td dir='RTL' align='right' rowspan='2' height='51' class='x43' style='height:38.4pt;'><div style='margin-left:-10px'>الدين المتبقي بالارقام</div></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dette['dette']-($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3'] ?></td>
<td dir='RTL' align='right' class='x36'><br>المبلغ المتخلّد<span style='mso-spacerun:yes;'>&nbsp; </span>بالذمة</td>
<td dir='RTL' align='right' class='x29' style="font-size:10px">الى <br><?php echo  substr($consommation['date'], 0,10)?></td>
<td dir='RTL' align='right' class='x29' style="font-size:10px">من <br><?php echo  substr($consommationPrecedent['date'], 0,10)?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $consommation['numConsomme'] ?></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  substr($consommation['date'], 0,10)?></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x29'></td>
<td class='x21'></td>
<td class='x61'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td colspan='7' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
 </tr>
 <tr height='32' style='mso-height-source:userset;height:24.6pt'>
<td colspan='2' height='32' class='x21' style='mso-ignore:colspan;height:24.6pt;'></td>
<td rowspan='3' height='63' class='x40' style='border-top:1px solid windowtext;height:47.85pt;'></td>
<td dir='RTL' align='right' rowspan='3' height='64' class='x43' style='height:48.6pt;'>التاريخ :</td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dette['dette'] ?></td>
<td dir='RTL' align='right' class='x36'>المبلغ الجملي<br> المطلوب</td>
<td dir='RTL' align='right' colspan='2' class='x87' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>المعلوم الجملي<br> للاستهلاك</td>
<td dir='RTL' align='right' class='x37'>المعلوم <br>القار</td>
<td dir='RTL' align='right' class='x37'>المبلغ</td>
<td dir='RTL' align='right' class='x37'>السعر<br> الفردي</td>
<td dir='RTL' align='right' class='x37'>الكمية<br><span style='mso-spacerun:yes;'>&nbsp; </span>المستهلكة&nbsp;</td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td colspan='3' class='x25' style='mso-ignore:colspan;'></td>
<td colspan='2' rowspan='3' height='31' class='x50' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:23.25pt;'><?php echo ($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3']+$parametre['prixFixe'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $parametre['prixFixe'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo ($consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'])*$parametre['prixM3'] ?></td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $parametre['prixM3'] ?> </td>
<td rowspan='3' height='31' class='x47' style='border-bottom:1px solid windowtext;height:23.25pt;'><?php echo $consommation['numConsomme']-$consommationPrecedent['numConsommePrecedent'] ?></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x25'></td>
<td class='x29'>&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime( substr($facture['date'], 0,10) . ' +1 month')) ?></td>
<td dir='RTL' align='right' class='x36'>أخر أجل للدفع</td>
<td class='x21'></td>
 </tr>
 <tr height='3' style='mso-height-source:userset;height:2.4pt'>
<td colspan='2' height='3' class='x21' style='mso-ignore:colspan;height:2.4pt;'></td>
<td colspan='5' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'><div style='display:block;overflow:hidden'></div></td>
<td class='x61'><div style='display:block;overflow:hidden'></div></td>
<td colspan='2' class='x25' style='mso-ignore:colspan;'><div style='display:block;overflow:hidden'></div></td>
<td class='x36'><div style='display:block;overflow:hidden'><br></div></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td dir='RTL' align='right' colspan='4' rowspan='5' height='79' class='x67' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:59.25pt;'>إمضاء و ختم أمين المال</td>
<td class='x21'></td>
<td class='x61'></td>
<td dir='RTL' align='right' colspan='4' rowspan='4' height='63' class='x76' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:47.25pt;'>التاريخ و إسم و إمضاء متسلم الفاتورة</td>
<td dir='RTL' align='right' colspan='2' rowspan='4' height='63' class='x67' style='border-bottom:1px solid windowtext;height:47.25pt;'>إمضاء أمين المال</td>
<td dir='RTL' align='right' colspan='4' rowspan='4' height='63' class='x68' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:47.25pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>إمضاء رئيس المجمع</td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='2' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td class='x21'></td>
<td class='x61'></td>
<td colspan='7' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'></td>
<td dir='RTL' align='right' colspan='3' class='x44' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>رقم الحساب الجاري للمجمع</td>
<td class='x21'></td>
 </tr>
 <tr height='16' style='mso-height-source:userset;height:12pt'>
<td colspan='7' height='16' class='x21' style='mso-ignore:colspan;height:12pt;'></td>
<td colspan='12' class='x61' style='mso-ignore:colspan;'></td>
 </tr>

 <tr height='0' style=''>
  <td width='124' colspan='2' style='width:93pt;mso-ignore:colspan;'></td>
  <td width='78' style='width:58.5pt;'></td>
  <td width='99' style='width:74.25pt;'></td>
  <td width='35' style='width:26.25pt;'></td>
  <td width='110' style='width:82.5pt;'></td>
  <td width='16' style='width:12pt;'></td>
  <td width='17' style='width:12.75pt;'></td>
  <td width='48' style='width:36pt;'></td>
  <td width='66' style='width:49.5pt;'></td>
  <td width='74' style='width:55.5pt;'></td>
  <td width='6' style='width:4.5pt;'></td>
  <td width='58' style='width:43.5pt;'></td>
  <td width='68' style='width:51pt;'></td>
  <td width='72' style='width:54pt;'></td>
  <td width='58' style='width:43.5pt;'></td>
  <td width='60' style='width:45pt;'></td>
  <td width='96' style='width:72pt;'></td>
  <td width='68' style='width:51pt;'></td>
 </tr>

</table>
</div>

</body>

</html>


<script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>