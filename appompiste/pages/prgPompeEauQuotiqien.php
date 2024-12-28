<?php   
   if($_GET['jour']!=null)
   $_SESSION['jour']=$_GET['jour'];
   $jour=$_SESSION['jour'];
   $sql = "SELECT * from `programme_pompe_eau_quotidien_jour` where jour='$jour'";
   
   $result = $conn->query($sql);
   
   if ($result->num_rows == 0) {
   
     $sql="INSERT INTO `programme_pompe_eau_quotidien_jour` (`idJ`, `idGess`, `idPompiste`, `jour`, `date`) 
     VALUES (NULL, '$idGess', '$idPompiste', '$jour', current_timestamp());";
   if($conn->query($sql) === TRUE){
   
   
     $_SESSION['messageClass']="success";
     $_SESSION['message']="تم إضافة برنامج جديد ليوم  ".$jour;
   header("Location: ../index.php?page=prgPompeEauQuotiqien");
    
   
            
              
         }else
         {
         
          $_SESSION['messageClass']="danger";
          $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
          header("Location: ../index.php?page=prgPompeEauQuotiqien");
          exit();
         }
   
   }
   
   
   $sql = "SELECT * from `programme_pompe_eau_quotidien_jour` where idGess='$idGess' and jour='$jour' ";
   
       $result = $conn->query($sql);
   
       if ($result->num_rows > 0) {
         $jourRow = $result->fetch_assoc();
         $idJ=$jourRow['idJ'];
         $sql = "SELECT * from `programme_pompe_eau_quotidien_lignes_num` where idJ='$idJ' ";
   
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       $row1Taken=false;
       $row2Taken=false;
       $row3Taken=false;
       while ($numLigneRow = $result->fetch_assoc()) {
         if($numLigneRow['rowLigne']==1)
         {
           $row1Taken=true;
           $numLigne1=$numLigneRow['numLigne'];
         }
         if($numLigneRow['rowLigne']==2)
         {
           $row2Taken=true;
           $numLigne2=$numLigneRow['numLigne'];
   
         }
         if($numLigneRow['rowLigne']==3)
         {
           $row3Taken=true;
           $numLigne3=$numLigneRow['numLigne'];
   
         }
       }
     }
   
       $sql = "SELECT * from `programme_pompe_eau_quotidien_lignes_num` where idJ='$idJ' ";
   
       $result = $conn->query($sql);
       $numLigneRow = $result->fetch_assoc();
     }
   
     $sql1 = "SELECT * from `programme_pompe_eau_quotidien_data` where idGess='$idGess' and numLigne='$numLigne1'";
            

     $sql2 = "SELECT * from `programme_pompe_eau_quotidien_data` where idGess='$idGess' and numLigne='$numLigne2' ";
   
   
     $sql3 = "SELECT * from `programme_pompe_eau_quotidien_data` where idGess='$idGess' and numLigne='$numLigne3'";
   
                 $result1 = $conn->query($sql1);
                 $result2 = $conn->query($sql2);
                 $result3 = $conn->query($sql3);
                 
                 if ($result1 && $result2 && $result3) {
                  $ligne1 = $result1->fetch_all(MYSQLI_ASSOC);
$ligne2 = $result2->fetch_all(MYSQLI_ASSOC);
$ligne3 = $result3->fetch_all(MYSQLI_ASSOC);
                     $maxRows = max($result1->num_rows, $result2->num_rows, $result3->num_rows);
   ?>
<!-- Main content -->
<div class="main-content">
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
   <div class="container-fluid">
      <div class="header-body">
      </div>
   </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
<!-- table -->
<div class="col-xl-12 order-xl-1">
<div class="card bg-white shadow">
   <div class="card-header bg-secondary border-0">
      <div class="row align-items-center">
         <div class="col-8">
            <h3 class="mb-0"><?php 
            if ($maxRows>0){
            ?><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> <?php } ?></h3>
         </div>
         <div class="col-4 text-right">
            <a href="index.php?page=dashboard" class="btn btn-sm btn-primary">رجوع</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
         <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="no-print" id="printDiv">
         <br><br>
         <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري  للري&nbsp;</small>
         <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >............................. ب :.................................&nbsp;</small>
         <div class="container text-center text-black">
            <div class="row">
               <div class="col-2">
               </div>
               <div class="col-6">
                  <h1 class="d-flex  justify-content-center "><br> جدول متابعة التوزيع لـيوم : <?php echo $jourRow['jour'] ?><br><br></h1>
               </div>
               <strong class="col-3"><br><br>
               </strong>
            </div>
         </div>
         <table style="border-collapse: collapse; width: 70%;">
         <tr style="height:30px;">
               <td colspan="5" style="border: 1px solid;" class="text-center">
                  <small class=" text-black">خط عدد : 
                  <?php if (!$row1Taken) {  ?>  
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ligneNum1"><small>تسجيل عدد الخط </small></button>
                  <?php } else echo $numLigne1 ?>
                  &nbsp;<br></small>
               </td>
               <td colspan="5" style="border: 1px solid;" class="text-center">
                  <small class=" text-black">خط عدد :  
                  <?php if (!$row2Taken) {  ?>  
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ligneNum2"><small>تسجيل عدد الخط </small></button>
                  <?php } else echo $numLigne2 ?>
                  &nbsp;<br></small>
               </td>
               <td colspan="5" style="border: 1px solid;" class="text-center">
                  <small class=" text-black">خط عدد :
                  <?php if (!$row3Taken) {  ?>  
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ligneNum3"><small>تسجيل عدد الخط </small></button>
                  <?php } else echo $numLigne3 ?>
                  &nbsp;<br></small>
               </td>
            </tr>
         <tr  style="height:30px;">
         <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الساعة   &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الاسم و اللقب  &nbsp;<br></small>
                     </td>
                     <td colspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">التوقيت  &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الكمية (م3)  &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الساعة   &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الاسم و اللقب  &nbsp;<br></small>
                     </td>
                     <td colspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">التوقيت  &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الكمية (م3)  &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الساعة   &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الاسم و اللقب  &nbsp;<br></small>
                     </td>
                     <td colspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">التوقيت  &nbsp;<br></small>
                     </td>
                     <td rowspan="2" style="border: 1px solid; text-align: center;">
                        <small class="text-black">الكمية (م3)  &nbsp;<br></small>
                     </td>
                  </tr>
                  <tr>
               <td style="border: 1px solid;">    <small class="text-black">من   &nbsp;<br></small> </td>
               <td style="border: 1px solid;">    <small class="text-black">الى  &nbsp;<br></small></td>
               <td style="border: 1px solid;">    <small class="text-black">من   &nbsp;<br></small> </td>
               <td style="border: 1px solid;">    <small class="text-black">الى  &nbsp;<br></small></td>
               <td style="border: 1px solid;">    <small class="text-black">من   &nbsp;<br></small> </td>
               <td style="border: 1px solid;">    <small class="text-black">الى  &nbsp;<br></small></td>
            </tr>
         <?php 
    
                     
                     
                         for ($i = 0; $i < $maxRows; $i++) {
                           echo "<tr>";
                     
                           if (isset($ligne1[$i])) {
                            $total1+=$ligne1[$i]['quantite'];
                            echo "<td  style='border: 1px solid;' class='text-black'>{$ligne1[$i]['heure']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne1[$i]['nom']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne1[$i]['dateDe']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne1[$i]['dateA']}</td></td><td  style='border: 1px solid;' class='text-black'>{$ligne1[$i]['quantite']}</td>";
                          } else {
                             echo "<td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td>";
                           }
                     
                           if (isset($ligne2[$i])) {
                            $total2+=$ligne2[$i]['quantite'];

                             echo "<td  style='border: 1px solid;' class='text-black'>{$ligne2[$i]['heure']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne2[$i]['nom']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne2[$i]['dateDe']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne2[$i]['dateA']}</td></td><td  style='border: 1px solid;' class='text-black'>{$ligne2[$i]['quantite']}</td>";
                           } else {
                               echo "<td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td>";
                           }
                     
                           if (isset($ligne3[$i])) {
                            $total3+=$ligne3[$i]['quantite'];

                            echo "<td  style='border: 1px solid;' class='text-black'>{$ligne3[$i]['heure']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne3[$i]['nom']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne3[$i]['dateDe']}</td><td  style='border: 1px solid;' class='text-black'>{$ligne3[$i]['dateA']}</td></td><td  style='border: 1px solid;' class='text-black'>{$ligne3[$i]['quantite']}</td>";
                          } else {
                             echo "<td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td><td  style='border: 1px solid;' class='text-black'></td>";
                           }
                     
                           echo "</tr>";
                         }

                        ?>
                          <tr>
               <td style="border: 1px solid;">.</td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
               <td style="border: 1px solid;"></td>
            </tr>
            <tr class="no-print">
               <td style="border: 1px solid; text-align: center;" colspan="5"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php if ($row1Taken) echo "modal-form1"; else echo "error"  ?>">إضافة</button></td>
               <td style="border: 1px solid; text-align: center;" colspan="5"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php if ($row2Taken) echo "modal-form2"; else echo "error"  ?>">إضافة</button></td>
               <td style="border: 1px solid; text-align: center;" colspan="5"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php if ($row3Taken) echo "modal-form3"; else echo "error"  ?>">إضافة</button></td>
            </tr>
            <tr>
               <td style="border: 1px solid;" colspan="4"> <small class="text-black"> المجموع : &nbsp;<br></small></td>
               <td style="border: 1px solid;"><?php echo $total1 ?></td>
               <td style="border: 1px solid;" colspan="4"> <small class="text-black"> المجموع :&nbsp;<br></small></td>
               <td style="border: 1px solid;"><?php echo $total2 ?></td>
               <td style="border: 1px solid;" colspan="4"> <small class="text-black"> المجموع :&nbsp;<br></small></td>
               <td style="border: 1px solid;"><?php echo $total3 ?></td>
            </tr>
            <?php
                     
                         echo "</table>";
                     }?>
         <br>
      </div>
   </div>
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
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="modal-form1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">إضافة  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" value="<?php echo $numLigne1 ; ?>" readonly hidden>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الساعة   </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="الساعة " name="heure" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الاسم و اللقب </label>
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" placeholder="الاسم و اللقب" name="nom" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت من      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  من   " name="dateDe" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت الى      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  الى   " name="dateA" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الكمية (م3)   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="الكمية (م3) " name="quantite" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajout1" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">إضافة  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" value="<?php echo $numLigne2 ; ?>" readonly hidden>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الساعة   </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="الساعة " name="heure" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الاسم و اللقب </label>
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" placeholder="الاسم و اللقب" name="nom" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت من      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  من   " name="dateDe" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت الى      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  الى   " name="dateA" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الكمية (م3)   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="الكمية (م3) " name="quantite" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajout2" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">إضافة  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" value="<?php echo $numLigne3 ; ?>" readonly hidden>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الساعة   </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="الساعة " name="heure" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الاسم و اللقب </label>
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" placeholder="الاسم و اللقب" name="nom" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت من      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  من   " name="dateDe" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">التوقيت الى      </label>
                                 <input type="time" id="numCompteur"  class="form-control form-control-alternative" placeholder="التوقيت  الى   " name="dateA" >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">الكمية (م3)   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="الكمية (م3) " name="quantite" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajout3" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ligneNum1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">تسجيل عدد الخط  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" name="idJ" value="<?php echo $jourRow['idJ']; ?>" hidden readonly >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">عدد الخط   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajoutLigne1" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ligneNum2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">تسجيل عدد الخط  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" name="idJ" value="<?php echo $jourRow['idJ']; ?>" hidden readonly >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">عدد الخط   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajoutLigne2" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<form  action="controller/controller.php" method="post">
   <div class="col-md-6">
      <div class="modal fade" id="ligneNum3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">تسجيل عدد الخط  </h3>
                        <br>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input type="text" id="numCompteur"  class="form-control form-control-alternative" name="idJ" value="<?php echo $jourRow['idJ']; ?>" hidden readonly >
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">عدد الخط   </label>
                                 <input type="number" id="numCompteur"  class="form-control form-control-alternative" placeholder="عدد الخط " name="numLigne" >
                              </div>
                           </div>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير كافة المعطيات بحرص، لا يمكنك تغيرها لاحقا</h6>
                           <h6 class="heading-small text-muted mb-4 text-red" id="erreur">كافة المعطيات ضرورية</h6>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                     <input type="submit" name="ajoutLigne3" class="btn btn-primary" value="تسجيل">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<div class="col-md-6">
      <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-secondary border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3  text-red">الرجاء تسجيل عدد الخط قبل تسجيل المعطيات    </h3>
                        <br>
                      
                     </div>
                  </div>
                  <div class="modal-footer flex-row-reverse">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>