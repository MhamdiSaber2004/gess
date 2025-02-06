<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   include_once "../db/db.php";
   session_start();
   if (!isset($_SESSION["idPompiste"])) {
      $idPompiste=$_SESSION['idPompiste'];
      header("location: ../login.php");
      exit();
   }

   $idGess=$_SESSION['idGess'];

   if(isset($_GET['mois'])){
      $moisUF=$_GET['mois'];
   }else{
      header("location: ../login.php");
   }

   if(isset($_GET['delet'])){
      $idUF=$_GET['delet'];
      $sqld = "UPDATE `utilisation_et_facture` SET `activ`='1' WHERE idUF=$idUF";
      if($resultd = $conn->query($sqld)){
         header("Location: utilisationEtFacture.php?mois=$moisUF");
      }
   }

   if(!empty($_POST['idBenefique'])){
      $idBenefique=$_POST['idBenefique'];
      $detteAvantFacture=$_POST['detteAvantFacture'];
      $numConsommation=$_POST['numConsommation'];
      $numConsommationPrecedent=$_POST['numConsommationPrecedent'];
      $prixM3=$_POST['prixM3'];
      $prixFixe=$_POST['prixFixe'];
      $dateUF=$_POST['dateUF'];
      $autrePrix=$_POST['autrePrix'];
      $numConsommation=$_POST['numConsommation'];
      $detteReste=$_POST['detteReste'];
      $numFacture=$_POST['numFacture'];
      $numPayement=$_POST['numPayement'];
      $dettePaye=$_POST['dettePaye'];
      $parM3OuNon = $_POST['parM3OuNon'];

      $sqlA = "INSERT INTO `utilisation_et_facture`(`idGess`,`idBenefique`, `moisUF`, `detteAvantFacture`, `dateUF`, `numConsommation`, `numConsommationPrecedent`, `numFacture`, `numPayement`, `prixM3`, `prixFixe`, `autrePrix`, `parM3OuNon`, `MontantPaye`,`dettePaye`)VALUES ('$idGess','$idBenefique','$moisUF','$detteAvantFacture','$dateUF','$numConsommation','$numConsommationPrecedent','$numFacture','$numPayement','$prixM3','$prixFixe','$autrePrix','$parM3OuNon','$dettePaye')";
      
      if ($conn->query($sqlA) === TRUE) {
         header("Location: utilisationEtFacture.php?mois=$moisUF");
      }
   }

?>
<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <div class="col-6 text-center">
                  <a href="../index.php" class="btn btn-sm btn-primary">رجوع</a>
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
        دفتر متابعة الاستهلاك والفوترة الخاصة بكل المنتفعين <br>لشهر :  <?php echo $_GET['mois'] ?>   
    </strong>
    <div class="col"> 
    </div>
  </div>
</div>
<br><br>

<table class="table">

    <tr>
      <td rowspan="2">العدد الجملي</td>
      <td rowspan="2" class="text-center">إسم ولقب المنتفع</td>
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

    <tr class="no-print">
      <td colspan="17"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addInfoModal">إضافة</button></td>
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

        $sql = "SELECT * FROM `utilisation_et_facture` WHERE idGess = $idGess and moisUF='$moisUF' and activ=0";
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
      <script>
         $('#tr_idBenefique_<?php echo $row['idUF'] ;?>').click(function(){
            window.location.href ="utilisationEtFacture.php?mois=<?php echo $moisUF; ?>&delet=<?php echo $row['idUF'] ;?>"
         })
      </script>
    <?php
        }
    ?>        
  

    <tr>
        <td style="background-color:grey"></td>
        <td>المجموع</td>
        <td><?php echo $detteAvantFacture ; ?></td>
        <td style="background-color:grey"></td>
        <td style="background-color:grey"></td>
        <td style="background-color:grey"></td>
        <td><?php echo $consomation ; ?></td>
        <td style="background-color:grey"></td>
        <td><?php echo $connaissanceRelative ; ?></td>
        <td><?php echo $prixFixe ; ?></td>
        <td><?php echo $prixTotal ; ?></td>
        <td style="background-color:grey"></td>
        <td><?php echo $MontantRequis ; ?></td>
        <td><?php echo $MontantPaye ; ?></td>
        <td><?php echo $montantDu ; ?></td>
        <td style="background-color:grey"></td>
        <td style="background-color:grey"></td>
    </tr>
</table>
</div>

<small>لحذف سطر يمكنك الضغط على إسم المنتفع ( لا يوجد تحذير، سيتم الحذف تلقائياً)</small>
  
   

<div class="modal fade" id="addInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <form method="post">
      <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
         <div class="modal-content">
            <div class="modal-body p-0" style="max-height: 500px; overflow-y: auto;direction: rtl;">
               <div class="card bg-white border-0 mb-0">
                  <div class="card-header bg-transparent pb-1">
                     <h3 class=" text-center mt-2 mb-3">الفوترة    </h3>
                     <br>
                     <div class="row">
                        <h5>هل هذه المعظيات صحيحة, اذا كانت خاطئة, الرجاء التواصل مع رئيس المجمع   </h5>
                        <br>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">إسم ولقب   </label>
                              <select class="form-select" name="idBenefique" aria-label="Default select example">
                                 <?php
                                    $sql3 = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1 ";
                                    $result3 = $conn->query($sql3);
                                    if ($result3->num_rows > 0) {
                                       // output data of each row
                                       while ($row = $result3->fetch_assoc()) {
                                             echo '<option value="'.$row['idBenefique'].'">'.$row['nom'].'</option>';
                                       }
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">الديون المتخلدة بذمة المنتفع         </label>
                              <input type="number" id="detteAvantFacture"  class="form-control form-control-alternative" placeholder="الديون المتخلدة بذمة المنتفع  قبل إصدار الفاترة الخاصة بهذه الطريقة " name="detteAvantFacture" value=""  required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">الرقم الجديد	   </label>
                              <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="الرقم الجديد	 " name="numConsommation" required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">الرقم القديم	   </label>
                              <input type="number" id="numConsommationPrecedent"  class="form-control form-control-alternative" placeholder="الرقم القديم	 " name="numConsommationPrecedent" required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">السعر بالساعة او m3         </label><br>
                              <input class="form-check-input" type="radio" name="parM3OuNon" value="0">
                              <label class="form-check-label" for="flexRadioDefault1">
                                 لسعر بال h
                              </label>
                              <br>
                              <input class="form-check-input" type="radio" name="parM3OuNon" value="1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                 لسعر بال m3
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">السعر m3 او	h   </label>
                              <input type="number" id="prixM3"  class="form-control form-control-alternative"  placeholder="السعر m3	 " value="" name="prixM3"  required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">المعلوم القار	   </label>
                              <input type="number" id="prixFixe"  class="form-control form-control-alternative" placeholder="المعلوم القار	 " name="prixFixe" value=""   required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">التاريخ   </label>
                              <input type="date" id="dateUF"  class="form-control form-control-alternative" placeholder="التاريخ " name="dateUF" required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">معالم أخرى	   </label>
                              <input type="number" id="autrePrix"  class="form-control form-control-alternative"  placeholder="معالم أخرى	 " name="autrePrix" value=""  required >
                           </div>
                        </div> 
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">المبلغ المدفوع	   </label>
                              <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="المبلغ المدفوع	 " name="dettePaye" dettePaye required>
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">المبلغ المتخلد بالذمة	   </label>
                              <input type="number" id="detteReste"  class="form-control form-control-alternative" placeholder="المبلغ المتخلد بالذمة	 " name="detteReste" required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">رقم الفاتورة	   </label>
                              <input type="number" id="numFacture"  class="form-control form-control-alternative" placeholder="رقم الفاتورة	 " name="numFacture" required >
                           </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                           <div class="form-group">
                              <label class="form-control-label" for="input-country">رقم وصل الخلاص   </label>
                              <input type="number" id="numPayement"  class="form-control form-control-alternative" placeholder="رقم وصل الخلاص " name="numPayement" required >
                           </div>
                        </div>
                        <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                        <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="modal-footer flex-row-reverse">
               <input type="submit" name="annuler" class="btn btn-secondary" value="إلغاء" data-dismiss="modal">
               <input type="submit" name="ajoutUC3Submit" class="btn btn-primary" value="اضافة">
            </div>
         </div>
      </div>
   </form>
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