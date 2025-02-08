<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   include_once "../db/db.php";
   //session_start();
   if (!isset($_SESSION["idPompiste"])) {
      $idPompiste=$_SESSION['idPompiste'];
      header("location: ../login.php");
      exit();
   }

   $idGess=$_SESSION['idGess'];
?>
<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <style>
      .rotate-arabic {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        
        }
        th, td {
            text-align: center;
            font-size: 10px;
            vertical-align: middle;
            border: 1px solid #000000;
            
            }
            .row div{
            
            }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
   <script src="jqury.js"></script>


  </head>
  <body>

  <div class="card-header  border-0">
      <div class="row align-items-center">
         <div class="col-6 text-center">
         <h3 class="mb-0"><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> </h3>
         </div>

      </div>
   </div>

<div  class="no-print" id="printDiv">
   
<div class="container">
  <div class="row">
    <strong class="col-3 text-primary">
        المجمع المائي :<br> 
        <?php 
            $sql1 = "SELECT nom FROM gess WHERE idGess = $idGess";

            $result1 = $conn->query($sql1);
        
            while ($row1 = $result1->fetch_assoc()) { 
            echo $row1['nom'];
            }
        ?>    
    </strong>
    <strong class=" text-center col-8 text-danger">
        دفتر متابعة الاستهلاك والفوترة   
    </strong>
    <div class="col"> 
    </div>
  </div>
</div>
<br><br>

<table class="table">

    <tr>
      <td rowspan="2">العدد الجملي</td>
      <td rowspan="2" class="text-center">إسم ولقب </td>
      <td rowspan="2" class="rotate-arabic bg-transparent">الديون المتخلدة بذمة <br>المنتفع قبل إصدار<br> الفاتورة الخاصة بهذه<br> الطريقة</td>
      <td colspan="3">رفع العدادات الخاصة</td>
      <td colspan="11">الفوترة</td>
     
    </tr>
    <tr>
      <td class="rotate-arabic bg-transparent">التاريخ</td>
      <td class="rotate-arabic bg-transparent">الرقم الجديد</td>
      <td class="rotate-arabic bg-transparent">الرقم القديم</td>
      <td class="rotate-arabic bg-transparent">الكمية المستهلكة</td>
      <td class="rotate-arabic bg-transparent">السعر m3 او h</td>
      <td class="rotate-arabic bg-transparent">المعلوم النسبي للإستهلك</td>
      <td class="rotate-arabic bg-transparent">المعلوم القار</td>
      <td class="rotate-arabic bg-transparent">المعلوم الجملي للإستهلاك</td>
      <td class="rotate-arabic bg-transparent">معالم أخرى</td>
      <td class="rotate-arabic bg-transparent">المبلغ المطلوب</td>
      <td class="rotate-arabic bg-transparent">المبلغ المدفوع</td>
      <td class="rotate-arabic bg-transparent">المبلغ المتخلد بالذمة</td>
      <td class="rotate-arabic bg-transparent">رقم الفاتورة</td>
      <td class="rotate-arabic bg-transparent">رقم وصل الخلاص</td>

    </tr>
    <?php 
   
        $detteAvantFacture=0;
        $consomation=0;
        $connaissanceRelative=0;
        $prixFixe=0;
        $prixTotal=0;
        $MontantRequis=0;
        $MontantPaye=0;
        $montantDu=0;


        $sql2 = "SELECT idBenefique,nom FROM `benefique_pi` WHERE idGess = $idGess";
        $result2 = $conn->query($sql2);
        $benefique=array();
        $nb_benefique=0;
        while ($row2 = $result2->fetch_assoc()) { 
            $benefique[$nb_benefique]=$row2;
            $nb_benefique=$nb_benefique+1;
        }

        $sql = "SELECT * FROM `utilisation_et_facture` WHERE idBenefique=$idBenifique  and activ=1";
        $result = $conn->query($sql);
        $nb=0;
        while ($row = $result->fetch_assoc()) { 
            $nb=$nb+1;
            $detteAvantFacture=$detteAvantFacture+$row['detteAvantFacture'];
            $consomation=$consomation+($row['numConsommation']-$row['numConsommationPrecedent']);
            $connaissanceRelative=$connaissanceRelative+(($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3']);
            $prixFixe=$prixFixe+$row['prixFixe'];
            $prixTotal=$prixTotal+(($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe'];
            $MontantRequis=$MontantRequis+(($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe']+$row['autrePrix'];
            $MontantPaye=$MontantPaye+$row['MontantPaye'];
            $montantDu=$montantDu+((($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe']+$row['autrePrix']-$row['MontantPaye']);
    ?>
      <tr>
        <td><?php echo $nb ; ?></td>
        <td id="tr_idBenefique_<?php echo $row['idUF'] ;?>"><?php 
        
           for($ib=0 ; $ib < $nb_benefique ; $ib++){
                if($benefique[$ib]['idBenefique']==$row['idBenefique']){
                    echo $benefique[$ib]['nom'];
                    break;
                }
           }
        ?></td>
        <td><?php echo $row['detteAvantFacture'] ; ?></td>
        <td><?php echo $row['dateUF'] ; ?></td>
        <td><?php echo $row['numConsommation'] ; ?></td>
        <td><?php echo $row['numConsommationPrecedent'] ; ?></td>
        <td><?php echo $row['numConsommation']-$row['numConsommationPrecedent'] ; ?></td>
        <td><?php echo $row['prixM3'] ?></td>
        <td><?php echo ($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'];  ?></td>
        <td><?php echo $row['prixFixe'] ; ?></td>
        <td><?php echo (($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe']; ?></td>
        <td><?php echo $row['autrePrix'] ; ?></td>
        <td><?php echo (($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe']+$row['autrePrix'] ; ?></td>
        <td><?php echo $row['MontantPaye'] ; ?></td>
        <td><?php echo ((($row['numConsommation']-$row['numConsommationPrecedent'])* $row['prixM3'])+$row['prixFixe']+$row['autrePrix']-$row['MontantPaye'])  ; ?></td>
        <td><?php echo $row['numFacture'] ; ?></td>
        <td><?php echo $row['numPayement'] ; ?></td>
      </tr>
    <?php
        }
    ?>        
</table>
</div>

<script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>


<script>
function test() {
  var result = ''
  location.reload()
}
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>