<?php
include_once "../db/db.php";
session_start();
if (!isset($_SESSION["idPompiste"])) {
   header("location: ../login.php");
   exit();
 }

 $idGess=$_SESSION['idGess'];
 $jourpp=$_GET['date'];

?>

<!DOCTYPE html>
<html lang="ar">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>برنامج التوزيع اليومي</title>
   <link href="./برنامج التوزيع اليومي_files/registreStyle.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   <style>
      body {
         font-family: Arial, sans-serif;
         direction: rtl;
         text-align: right;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }
      table, th, td {
         border: 1px solid black;
      }
      th, td {
         padding: 8px;
         text-align: center;
      }
      th {
         background-color: #f2f2f2;
      }
      caption {
         margin-bottom: 10px;
         font-size: 1.2em;
         font-weight: bold;
      }
   </style>
</head>
<body>
<br><br>
<div class="col-12">
<div class="card-header  border-0">
              <div class="row align-items-center">
                <div class="col-4 text-center">
                  <h3 class="mb-0"><button onclick="printPompiste(&#39;printDiv&#39;)" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-center">
                  <button href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ajoutDistributionEau">إضافة</button>
                </div>
                <div class="col-4 text-center">
                  <a href="../index.php" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <br>

<div class="row no-print" id="printDiv">
   
<div class="container col-10">
  <div class="row">
    <strong class="col-3 text-primary">
    <h6
    >مجمع التنمية في قطاع الفالحة والصيد البحري
  <br>
    للري ب:
    <?php 
        $sql1 = "SELECT nom FROM gess WHERE idGess = $idGess";

        $result1 = $conn->query($sql1);

        while ($row1 = $result1->fetch_assoc()) { 
            echo $row1['nom'];
        }
    ?>
</h6>
    </strong>
    <strong class=" text-center col-8 text-danger">
    برنامج التوزيع اليومي
    <br>
    تاريخ :<?php echo $jourpp; ?>   </strong>
    <div class="col">
      
    </div>
  </div>
</div>





<div class="col-11 mx-auto">
<table class="table">

<thead>
        <tr>
            <th rowspan="3">ع. ر</th>
            <th rowspan="3">فرع</th>
            <th rowspan="3">مأخذ</th>
            <th rowspan="3">اسم ولقب الفلاح</th>
            <th rowspan="3">اذن توزيع عدد</th>
            <th rowspan="3">كمية / ساعات</th>
            <th colspan="2" rowspan="2">توقيت </th>
            <th colspan="6" rowspan="1">التوزيع الفعلي</th>
        </tr>
        <tr>
          <th colspan="3">التوقيت</th>
          <th colspan="3">كمية / عداد</th>

        </tr>
        <tr>
          <th>من</th>
          <th>إلى</th>  
          <th>من</th>
          <th>إلى</th> 
          <th>عدد ساعات </th>
          <th>من</th>
          <th>إلى</th> 
          <th>كمية</th>
        </tr>

    </thead>
    <tbody>
               <tr class="text-center">
            <td colspan="14">لا يوجد أي تسجيل</td>
         </tr>
                 <!-- Repeat rows as needed -->
    </tbody>
</table>
</div>
</div>
</div>


<div class="modal fade" id="ajoutDistributionEau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post">
  <div class="modal-dialog modal-dialog-end"> <!-- Change modal-dialog class to "modal-dialog-end" for right-aligned modal -->
    <div class="modal-content" dir="rtl">
      <div class="modal-header" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة</h1>
       
      </div>
      
      <div class="modal-body" style="max-height: 500px; overflow-y: auto;direction: rtl;">
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">

                           <div class="inputs-group col-10">
                                 <label_input class="label_input">التاريخ</label_input>
                                 <input class="input--style-1" type="text" name="date" disabled="" value="2024-11-30">
                              </div>
                             
                             
                        </div>
                        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-10">
                                 <label_input class="label_input">اسم ولقب الفلاح </label_input>
                                 <select class="input--style-1" type="text" id="prise" name="idBenefiquePI" required="">
                                    <option value="">اسم ولقب الفلاح </option>
                                 
                                    <option value="215709">ahmed hajji</option>

                                    
                                    <option value="355419">walid rahmouni</option>

                                                                     </select>
                              </div> 
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                         

                              <div class="inputs-group col-10">
                                 <label_input class="label_input">فرع | مأخذ</label_input>
                                 <select class="input--style-1" type="text" id="prise" name="idPrise" required="">
                                    <option value="">فرع | مأخذ </option>
                                 

                                  
                                 

                                  
                                 <option value="1236"> فرع :2 |  مأخذ :3 </option>

                                  

                                                                   </select>
                              </div>
                             
                             
                           </div>

                             
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">اذن توزيع عدد</label_input>
                                 <input class="input--style-1" type="number" step="any" name="permissionDistributionNum" required="" placeholder="اذن توزيع عدد">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">كمية / ساعات</label_input>
                                 <input class="input--style-1" type="number" step="any" name="HeuresQuantites" required="" placeholder="كمية / ساعات">
                              </div>
                             
                           </div>
                           <h5 style="font-size:18px;margin-right:30px;"><b>توقيت</b></h5>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">من</label_input>
                                 <input class="input--style-1" type="time" step="any" name="dateDe" required="" placeholder="من">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">إلى</label_input>
                                 <input class="input--style-1" type="time" step="any" name="dateA" required="" placeholder="إلى">
                              </div>
                             
                           </div>

                           <h4 style="font-size:18px;margin-right:30px;"><b>التوزيع الفعلي</b></h4>
                           <h5 style="font-size:18px;margin-right:30px;"><b>توقيت</b></h5>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">من</label_input>
                                 <input class="input--style-1" type="time" step="any" name="distrutbitionDateDe" required="" placeholder="من">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">إلى</label_input>
                                 <input class="input--style-1" type="time" step="any" name="distrutbitionDateA" required="" placeholder="إلى">
                              </div>
                              
                             
                           </div>
                           
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
        
  
</div>



        <h5 style="font-size:18px;margin-right:30px;"><b>كمية / عداد</b></h5>
        <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
            
            <div class="inputs-group col-5">
                <label_input class="label_input">من</label_input>
                <input class="input--style-1" type="number" step="any" name="distrutbitionConsommationDe" required="" placeholder="من">
            </div>
            <div class="inputs-group col-5">
                <label_input class="label_input">إلى</label_input>
                <input class="input--style-1" type="number" step="any" name="distributionConsommationA" required="" placeholder="إلى">
            </div>
            
            
        </div>
                           

      </div>
      <div class="modal-footer" dir="rtl"> <!-- Add "dir="rtl" to set right-to-left text direction -->
        <button type="button" style="width : 120px" class="btn btn-secondary" data-dismiss="modal">إغلاق</button> <!-- Change button text to Arabic -->
        <button type="submit" style="width : 120px" class="btn btn-success" name="ajoutDistribution"> إضافة </button> <!-- Change button text to Arabic -->
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

function chargerAccreditations() {
    var etatId = document.getElementById('branche').value;
    var selectAccreditation = document.getElementById('prise');
alert("TTTTTTTTTTT "+etatId);
    // Efface toutes les options existantes dans la liste déroulante des accréditations
    selectAccreditation.innerHTML = '';

    if (etatId !== '') {
        // Effectuer une requête AJAX ou PDO pour obtenir les accréditations correspondant à l'ID de l'état sélectionné
        // en utilisant PHP pour interagir avec la base de données
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var accreditations = JSON.parse(xhr.responseText);

                // Créer les options pour les accréditations
                for (var i = 0; i < accreditations.length; i++) {
                    var option = document.createElement('option');
                    option.value = accreditations[i].nom_accreditation;
                    option.text = accreditations[i].nom_accreditation;
                    selectAccreditation.appendChild(option);
                    console.log("accreditations")
                }
            }
        };
        xhr.open('GET', 'getPrisePi.php?etat_id=' + etatId, true);
        xhr.send();
    }
}



function onChangeInput() {
                  let isEmpty = false;

                  for (const name of fieldNames) {
                     const element = document.querySelector(`[name="${name}"]`);
                     if (element.value === '') {
                        isEmpty = true;
                     }
                  }

                  if (!isEmpty) {
                     submitButton.disabled = false;
                  } else {
                     submitButton.disabled = true;
                  }
            }

</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  




</body></html>