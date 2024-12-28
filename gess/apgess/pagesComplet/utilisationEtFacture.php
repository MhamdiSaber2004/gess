
<!doctype html>
<html lang="en" dir="rtl">
<?php

include_once "../db/db.php";
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
      $_SESSION['moisUF']=$_GET['mois'];
      
    } 
    $moisUF=$_SESSION['moisUF'];









    

    if (isset($_POST['ajoutUC1Submit'])) {

        $_SESSION['idBenefique']= $idBenefique = mysqli_real_escape_string($conn, $_POST['idUC']);
        
      
      
        $sql = "SELECT * FROM benefique_$typeGess WHERE idBenefique='$idBenefique' and idGess='$idGess'";
          
        $result = $conn->query($sql);
        
      
            if ($result->num_rows > 0) {
                $rowBenefique = $result->fetch_assoc();
                $_SESSION['rowBenefique']=$rowBenefique;
      
        header("Location: ../pagesComplet/utilisationEtFacture.php");
              exit();
      
            }
            
        
      
        else
        {
            $_SESSION['erreur']="حصل خطأ ما، الرجاء المحاولة لاحقا";
      
            header("Location: ../pagesComplet/utilisationEtFacture.php");
                  exit();
      
        }
      
            
        
      }


      
      if (isset($_POST['ajoutUC2Submit'])) {


        $sql = "SELECT * from parametre where idGess='$idGess'";

        $result = $conn->query($sql);
            
        
        if ($result->num_rows > 0) {
          
          $_SESSION['rowDette'] = $result->fetch_assoc();
              

          $_SESSION['nom'] = $_POST['nom'];


        $_SESSION['dette'] = $_POST['detteAvantFacture'];
        $_SESSION['dateUF'] =  $_POST['dateUF'];
        $_SESSION['numConsommation'] =  $_POST['numConsommation'];
        $_SESSION['numConsommationPrecedent'] =  $_POST['numConsommationPrecedent'];
        $_SESSION['ajoutUC2SubmitResult']="1";
        
        header("Location: ../pagesComplet/utilisationEtFacture.php");
        exit();


      }
      
  

  else
  {
      $_SESSION['erreur']="حصل خطأ ما، الرجاء المحاولة لاحقا";

      header("Location: ../pagesComplet/utilisationEtFacture.php");
            exit();

  }
        

        
              
          
        }



        if (isset($_POST['ajoutUC3Submit'])) {


          
                
          $_SESSION['quantite'] = $_POST['quantite'];
          $_SESSION['prixM3'] =  $_POST['prixM3'];
          $_SESSION['prixUtilisation'] =  $_POST['prixUtilisation'];
          $_SESSION['prixFixe'] =  $_POST['prixFixe'];
          $_SESSION['prixTotalUtilisation'] =  $_POST['prixTotalUtilisation'];
          $_SESSION['autrePrix'] =  $_POST['autrePrix'];
          $_SESSION['prixDemande'] =  $_POST['prixDemande'];



          $_SESSION['ajoutUC3SubmitResult']="1";
          
          header("Location: ../pagesComplet/utilisationEtFacture.php");
          exit();
  
  
        }





        if (isset($_POST['ajoutUC4Submit'])) {


          
                
          $_SESSION['quantite'] = $_POST['quantite'];
          $_SESSION['prixM3'] =  $_POST['prixM3'];
          $_SESSION['prixUtilisation'] =  $_POST['prixUtilisation'];
          $_SESSION['prixFixe'] =  $_POST['prixFixe'];
          $_SESSION['prixTotalUtilisation'] =  $_POST['prixTotalUtilisation'];
          $_SESSION['autrePrix'] =  $_POST['autrePrix'];
          $_SESSION['dettePaye'] =  $_POST['dettePaye'];
          $_SESSION['detteReste'] =  $_POST['detteReste'];


          
          
      $idBenefique=$_SESSION['idBenefique'];
      $detteAvantFacture=$_SESSION['dette'];
      $dateUF=$_SESSION['dateUF'];
      $numConsomme=$_SESSION["numConsommation"];
      $numConsommePrecedent=$_SESSION["numConsommationPrecedent"];
      $prixDemande=$_POST['detteDemande'];
      $detteReste=$_SESSION["detteReste"];
      $numFacture=$_POST["numFacture"];
      $numPayement=$_POST["numPayement"];
      $prixM3= $_SESSION['rowDette']['prixM3'];
      $autrePrix=  $_SESSION['rowDette']['autrePrix'] ;
      $prixFixe= $_SESSION['rowDette']['prixFixe'];

      $nom=$_SESSION['nom'];


          $sql="INSERT INTO `utilisation_et_facture` (`idUF`, `idGess`, `idPompiste`, `idBenefique`, `nom`, `moisUF`, `detteAvantFacture`, `dateUF`, `numConsommation`, `numConsommationPrecedent`, `detteTotal`, `dettePaye`, `numFacture`, `numPayement`, `date`, `prixM3`, `autrePrix`, `prixFixe`) 
          VALUES (NULL, '$idGess', '$idPompiste', '$idBenefique', '$nom', '$moisUF', '$detteAvantFacture', '$dateUF', '$numConsomme', '$numConsommePrecedent', '$prixDemande', '$detteReste', '$numFacture', '$numPayement', current_timestamp(),'$prixM3','$autrePrix','$prixFixe');";


      
if($conn->query($sql) === TRUE){

  $_SESSION['messageClass']="warning";
          header("Location: ../pagesComplet/utilisationEtFacture.php");
          exit();
  
             
               
          }else
          {
          $_SESSION['messageClass']="danger";
          $_SESSION['erreur']="حصل خطأ ما، الرجاء المحاولة لاحقا";
          header("Location: ../pagesComplet/utilisationEtFacture.php");
          exit();
          }


  
        }
        
    
  

          
  
          
          // 
if (isset($_GET['idDelete']) && $_GET['idDelete']!="" && is_numeric($_GET['idDelete']) ) {

   $idUF=$_GET['idDelete'];
   

   $sql="DELETE FROM utilisation_et_facture WHERE `utilisation_et_facture`.`idUF` = '$idUF'";

   if($conn->query($sql) === TRUE){

      $_SESSION['erreur']="تم الحذف بنجاح";
              header("Location: ../pagesComplet/utilisationEtFacture.php");
              exit();
      
                 
                   
              }else
              {
              $_SESSION['erreur']="حصل خطأ ما، الرجاء المحاولة لاحقا";
              header("Location: ../pagesComplet/utilisationEtFacture.php");
              exit();
              }
   
}
            
          







?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <link type="text/css" href="./assets/css/argon-rtl.css" rel="stylesheet">

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
    المجمع المائي :<br> <?php  echo $nomGess ?>
    </strong>
    <strong class=" text-center col-8 text-danger">
    دفتر متابعة الاستهلاك والفوترة الخاصة بكل المنتفعين <br>لشهر : <?php  echo $_SESSION['moisUF'] ?>
    </strong>
    <div class="col">
      
    </div>
  </div>
</div>
<br><br>

  <table class="table">

    <tr>
      <td rowspan="2">العدد الجملي</td>
      <td rowspan="2" class="text-center">رمز و إسم ولقب المنتفع</td>
      <td rowspan="2" class="rotate-arabic bg-transparent">الديون المتخلدة بذمة <br>المنتفع قبل إصدار<br> الفاتورة الخاصة بهذه<br> الطريقة</td>
      <td colspan="3">رفع العدادات الخاصة</td>
      <td colspan="11">الفوترة</td>
     
    </tr>
    <tr>
      <td class="rotate-arabic bg-transparent">التاريخ</td>
      <td class="rotate-arabic bg-transparent">الرقم الجديد</td>
      <td class="rotate-arabic bg-transparent">الرقم القديم</td>
      <td class="rotate-arabic bg-transparent">الكمية المستهلكة</td>
      <td class="rotate-arabic bg-transparent">السعر m3</td>
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
      <td colspan="17"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ajoutUC1">إضافة</button></td>
      
    </tr>

    <?php  
    $i=1;
      $sql = "SELECT * from `utilisation_et_facture` where moisUF='$moisUF' and idGess='$idGess' order by dateUF";
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
       $resultUF = $conn->query($sql);
       
     
       
   
    while ($rowUF = $resultUF->fetch_assoc()) {


      $totalDetteAvantFacture+=$rowUF['detteAvantFacture'];
      $totalConsommation+=$rowUF['numConsommation']-$rowUF['numConsommationPrecedent'];
      $totalPrixConsommation+=($rowUF['numConsommation']-$rowUF['numConsommationPrecedent'])*$rowUF['prixM3'];
      $totalPrixFixe+=$rowUF['prixFixe'];
      $totalDetteTotal+=$rowUF['detteTotal'];
      $totalDettePaye+=$rowUF['dettePaye'];
      $totalDetteReste+=$rowUF['detteTotal']-$rowUF['dettePaye'] 



    ?>


    <tr>
      <td><?php  echo $i++; ?></td>
      <td><a style="text-decoration:none;color:black" href="utilisationEtFacture.php?idDelete=<?php echo $rowUF['idUF'] ?>" ><?php  echo $rowUF['idBenefique']." - ".$rowUF['nom']  ?></a></td>
      <td><?php  echo $rowUF['detteAvantFacture']  ?></td>
      <td><?php  echo $rowUF['dateUF']  ?></td>
      <td><?php  echo $rowUF['numConsommation']  ?></td>
      <td><?php  echo $rowUF['numConsommationPrecedent']  ?></td>
      <td><?php  echo $rowUF['numConsommation']-$rowUF['numConsommationPrecedent']  ?></td>
      <td><?php  echo $rowUF['prixM3']  ?></td>
      <td><?php  echo ($rowUF['numConsommation']-$rowUF['numConsommationPrecedent'])*$rowUF['prixM3']  ?></td>
      <td><?php  echo $rowUF['prixFixe']  ?></td>
      <td><?php  echo ($rowUF['numConsommation']-$rowUF['numConsommationPrecedent'])*$rowUF['prixM3']+$rowUF['prixFixe']  ?></td>
      <td><?php  echo $rowUF['autrePrix']  ?></td>
      <td><?php  echo $rowUF['detteTotal']  ?></td>
      <td><?php  echo $rowUF['dettePaye']  ?></td>
      <td><?php  echo $rowUF['detteTotal']-$rowUF['dettePaye']  ?></td>
      <td><?php  echo $rowUF['numFacture']  ?></td>
      <td><?php  echo $rowUF['numPayement']  ?></td>
    </tr>

    <?php  }  } ?>
    <tr>
    <td style="background-color:grey"></td>
    <td>المجموع</td>
    <td><?php echo $totalDetteAvantFacture ?></td>
    <td style="background-color:grey"></td>
    <td style="background-color:grey"></td>
    <td style="background-color:grey"></td>
    <td><?php echo $totalConsommation ?></td>
    <td style="background-color:grey"></td>
    <td><?php echo $totalPrixConsommation ?></td>
    <td><?php echo $totalPrixFixe ?></td>
    <td><?php echo $totalPrixConsommation+$totalPrixFixe ?></td>
    <td style="background-color:grey"></td>
    <td><?php echo $totalDetteTotal ?></td>
    <td><?php echo $totalDettePaye ?></td>
    <td><?php echo $totalDetteReste ?></td>
    <td style="background-color:grey"></td>
    <td style="background-color:grey"></td>
    </tr>
   
</table>
</div>

<small>لحذف سطر يمكنك الضغط على إسم المنتفع ( لا يوجد تحذير، سيتم الحذف تلقائياً)</small>
  
    <form action="utilisationEtFacture.php"  method="post">
    <div class="col-md-6">
      <div class="modal fade" id="ajoutUC1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">إضافة  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" value="<?php echo $numLigne1 ; ?>" readonly hidden>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">رمز المنتفع   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="رمز المنتفع " value="350302<?php //echo $_SESSION['rowBenefique']['idBenefique'] ?>" name="idUC" required >
                              </div>
                           </div>
                           
                           <div>
                            <br>
                           </div>
                           
                           <h6 class="heading-small text-muted mb-4 text-red" style="font-size:10px;text-color:red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" onclick="test()" name="annuler" class="btn btn-secondary" value="إلغاء">إلغاء</button>
                     <input type="submit" name="ajoutUC1Submit" class="btn btn-primary"  value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

    </form>









    <form action="utilisationEtFacture.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ajoutUC2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">رفع العدادات الخاصة  </h3>
                        <br>
                        <div class="row">

                        <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">إسم ولقب   </label>
                                 <input type="text" readonly class="form-control form-control-alternative" placeholder="إسم ولقب " value="<?php echo $_SESSION['rowBenefique']['nom'] ; ?>" name="nom"   >
                              </div>
                           </div>
                           
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الديون المتخلدة بذمة المنتفع         </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="الديون المتخلدة بذمة المنتفع  قبل إصدار الفاترة الخاصة بهذه الطريقة " name="detteAvantFacture" value="<?php echo $_SESSION['dette'] ?>" readonly required >
                              </div>
                           </div>
                          
                           <br>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التاريخ   </label>
                                 <input type="date" id="numConsommation"  class="form-control form-control-alternative" placeholder="التاريخ " name="dateUF" required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الرقم الجديد	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="الرقم الجديد	 " name="numConsommation" required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الرقم القديم	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="الرقم القديم	 " name="numConsommationPrecedent" required >
                              </div>
                           </div>
                           <br><br><br>   
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <input type="button" name="annuler" class="btn btn-secondary" value="إلغاء">
                     <input type="submit" name="ajoutUC2Submit" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>




<form action="utilisationEtFacture.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ajoutUC3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">الفوترة    </h3>
                        <br>
                        <div class="row">

                        
                          
                        <h5>هل هذه المعظيات صحيحة, اذا كانت خاظئة, الرجاء التواصل مع رئيس المجمع   </h5>
                        <h5>     </h5>
                           <br>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الكمية المستهلكة	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="الكمية المستهلكة	 " value="<?php echo $_SESSION['numConsommation']-$_SESSION['numConsommationPrecedent']  ?>" name="quantite"  required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">السعر m3	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" readonly placeholder="السعر m3	 " value="<?php echo $_SESSION['rowDette']['prixM3'] ?>" name="prixM3" readonly required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المعلوم النسبي للإستهلك	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative"  placeholder="المعلوم النسبي للإستهلك	 " value="<?php echo ($_SESSION['numConsommation']-$_SESSION['numConsommationPrecedent'])*$_SESSION['rowDette']['prixM3']  ?>" name="prixUtilisation"  required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المعلوم القار	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="المعلوم القار	 " name="prixFixe" value="<?php echo $_SESSION['rowDette']['prixFixe']; ?>"   required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المعلوم الجملي للإستهلاك	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative"  placeholder="المعلوم الجملي للإستهلاك	 " value="<?php echo ($_SESSION['numConsommation']-$_SESSION['numConsommationPrecedent'])*$_SESSION['rowDette']['prixM3']+$_SESSION['rowDette']['prixFixe']  ?>" name="prixTotalUtilisation"  required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">معالم أخرى	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative"  placeholder="معالم أخرى	 " name="autrePrix" value="<?php echo $_SESSION['rowDette']['autrePrix'] ?>"  required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المبلغ المطلوب	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative"  placeholder="المبلغ المطلوب	 " name="prixDemande" value="<?php echo ($_SESSION['numConsommation']-$_SESSION['numConsommationPrecedent'])*$_SESSION['rowDette']['prixM3']+$_SESSION['rowDette']['prixFixe']+$_SESSION['rowDette']['autrePrix']+$_SESSION['dette']  ?>"  required >
                              </div>
                           </div>
                          

                           
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <input type="submit" name="annuler" class="btn btn-secondary" value="إلغاء">
                     <input type="submit" name="ajoutUC3Submit" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>




<form action="utilisationEtFacture.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ajoutUC4" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">الفوترة    </h3>
                        <br>
                        <div class="row">

                        
                          
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المبلغ المطلوب	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" readonly placeholder="المبلغ المطلوب	 " name="detteDemande" value="<?php echo $_SESSION['prixDemande']  ?>" readonly required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المبلغ المدفوع	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="المبلغ المدفوع	 " name="dettePaye" dettePaye required>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">المبلغ المتخلد بالذمة	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="المبلغ المتخلد بالذمة	 " name="detteReste" required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">رقم الفاتورة	   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="رقم الفاتورة	 " name="numFacture" required >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">رقم وصل الخلاص   </label>
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="رقم وصل الخلاص " name="numPayement" required >
                              </div>
                           </div>

                           
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <input type="submit" name="annuler" class="btn btn-secondary" value="إلغاء">
                     <input type="submit" name="ajoutUC4Submit" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>






<div class="col-md-6">
      <div class="modal fade" id="erreurModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3"> النتيجة </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="number" id="numConsommation"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" value="<?php echo $numLigne1 ; ?>" readonly hidden>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country"><?php echo $_SESSION['erreur'] ?>    </label>
                              </div>
                           </div>
                           
                           <div>
                            <br>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-primary" data-dismiss="modal">غلق</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


<!-- erreur -->
 <button id="erreurButton" class=" visually-hidden btn btn-sm btn-primary" data-toggle="modal" data-target="#erreurModal">إضافة</button>

 <?php if ($_SESSION['erreur']!="") { $_SESSION['erreur']="";unset($_SESSION['rowBenefique']); ?>
<script>
                  window.onload = function () {
              document.getElementById("erreurButton").click(); };
              </script>
<?php  } ?>


<!-- ajoutUC2 -->
<button id="ajoutUC2bouton" class="visually-hidden btn btn-sm btn-primary" data-toggle="modal" data-target="#ajoutUC2">إضافة</button>

<?php if ($_SESSION['rowBenefique']!="") { ?>
<script>
                  window.onload = function () {
              document.getElementById("ajoutUC2bouton").click(); };
              </script>
<?php  } ?>


<!-- ajoutUC3 -->
<button id="ajoutUC3bouton" class=" visually-hidden btn btn-sm btn-primary" data-toggle="modal" data-target="#ajoutUC3">إضافة</button>

<?php if ($_SESSION['ajoutUC2SubmitResult']=="1") { $_SESSION['ajoutUC2SubmitResult']="0";
 ?>
<script>
                  window.onload = function () {
              document.getElementById("ajoutUC3bouton").click(); };
              </script>
<?php  } ?>



<!-- ajoutUC3 -->
<button id="ajoutUC4bouton" class="visually-hidden btn btn-sm btn-primary" data-toggle="modal" data-target="#ajoutUC4">إضافة</button>

<?php if ($_SESSION['ajoutUC3SubmitResult']=="1") { $_SESSION['ajoutUC3SubmitResult']="0";
 ?>
<script>
                  window.onload = function () {
              document.getElementById("ajoutUC4bouton").click(); };
              </script>
<?php  } ?>




<?php
function php_func(){
unset($_SESSION['rowBenefique']);
}
?>



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
  var result = '<?php php_func(); ?>'
  location.reload()
}
</script>
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>

<script src="./assets/js/argon.js?v=1.0.0"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>