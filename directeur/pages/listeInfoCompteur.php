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
      <div class="row">
        <div class="col">
          <div class="card shadow">
            
           
            <div class="card-header bg-secondary border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">متابعة وضعية العدادات</h3>
                </div>
                <div class="col-4 text-right">
                <a href="#" onclick="printPompiste('printDiv')"  class="btn btn-sm btn-primary">imprimer   </a> 

                  </div>
              </div>
            </div>
            


            <div class="row">


  <div class="col-md-6">
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        	
            <div class="modal-body p-0">
            	
<div class="card bg-secondary border-0 mb-0">
    <div class="card-header bg-transparent pb-5">
        <h3 class=" text-center mt-2 mb-3">إضافة منتفع</h3><br>
        
          
            <div class="btn-wrapper text-center">
                <a href="index.php?page=listeAttenteAEP" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفعين قيد الانتظار </span>
                </a><br><br>
                <a href="index.php?page=listeDesactiveAEP" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفعين بحسابات معطلة   </span>
                </a>
            </div>
          
        
    </div>
   
</div>
    
            </div>
            
        </div>
    </div>
</div>

  </div>
</div>











     <div class="no-print" id="printDiv" class="table-responsive col-12">
      <br><br>
<div class="text-left" style="color:black">

مجمع التنمية في قطاع الفلاحة و الصيد البحري  للري بــ: ...............................................، المعتمدية ..........................، الولاية..................
<br>
المجموعة السكنية (الدوار) : ...................................، التاريخ : .......................  
</div>

       <br>
           <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="a" style="width:100%" class="   align-items-center table-striped table-flush">
                <thead class="thead-light">
                  <tr>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" rowspan="2">رقم العداد </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" rowspan="2">الاسم و اللقب </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">وجود عقد </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">وجود العداد </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">نوعية العداد </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">العداد </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">المسافة </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">الربط </th>
                  <th style="border: 1px solid; text-align: center; font-size:12px; color:black" scope="col" colspan="2">الاستعمال </th>

                  </tr>
                  <tr>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">نعم</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">لا</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">نعم</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">لا</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">KENT</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">لا(صيني)</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">يشتغل</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">لا يشتغل</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">اقل من 10 متر</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">اكثر من 10 متر</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">قبل العداد</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">بعد العداد</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">للشراب</td>
                    <td style="border: 1px solid; text-align: center; font-size:12px; color:black">للري</td>
                  </tr>
                </thead>
                <tbody>
                <?php




$contratOui=0;
$contratNon=0;
$avoirCompteurOui=0;
$avoirCompteurNon=0;
$typeCompteurOui=0;
$typeCompteurNon=0;
$travailleCompteurOui=0;
$travailleCompteurNon=0;
$distanceOui=0;
$distanceNon=0;
$liaisonOui=0;
$liaisonNon=0;
$utilisationOui=0;
$utilisationNon=0;





                                       $sql = "SELECT * FROM info_compteur where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {

                                            ?>

                                          
                                              
                                               <tr>
               
                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <a href="#" data-toggle="modal" data-target="#modifierInfoCompteur<?php echo $row['idIC'] ?>"><?php  echo  $row['numCompteur'] ?></a>
                    </td>
                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php  echo  $row['nom'] ?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['contrat']=="نعم") {echo "x"; $contratOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['contrat']=="لا") {echo "x"; $contratNon+=1;}?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['avoirCompteur']=="نعم") {echo "x"; $avoirCompteurOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['avoirCompteur']=="لا") {echo "x"; $avoirCompteurNon+=1;}?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['typeCompteur']=="KENT") {echo "x"; $typeCompteurOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['typeCompteur']=="لا(صيني)") {echo "x"; $typeCompteurNon+=1;}?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['travailleCompteur']=="يشتغل") {echo "x"; $travailleCompteurOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['travailleCompteur']=="لا يشتغل") {echo "x"; $travailleCompteurNon+=1;}?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['distance']=="اقل من 10 متر") {echo "x"; $distanceOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['distance']=="اكثر من 10 متر") {echo "x"; $distanceNon+=1;}?>
                    </td>


                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['liaison']=="قبل العداد") {echo "x"; $liaisonOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['liaison']=="بعد العداد") {echo "x"; $liaisonNon+=1;}?>
                    </td>

                    
                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['utilisation']=="للشراب") {echo "x"; $utilisationOui+=1;}?>
                    </td>

                    <td style="border: 1px solid; text-align: center;  color:black"> 
                    <?php   if($row['utilisation']=="للري") {echo "x"; $utilisationNon+=1;}?>
                    </td>

                    


                  
                    </tr>



                    
      <div class="col-md-6">
    <div class="modal fade" id="modifierInfoCompteur<?php echo $row['idIC'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">

          <div class="modal-body p-0">
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2"> تحيين معلومات العداد رقم :    <?php echo $row['numCompteur'] ?></h3><br>
      <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
        
          <div class="btn-wrapper text-center">

          <input type="text" name="idIC" id="" value="<?php  echo $row['idIC'] ?>" hidden>



          <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود عقد </label>

                      <select class="form-control form-control-alternative" type="text" name="contrat" placeholder="" required >
                      <option value="" > الرجاء الاختيار</option>
                      <option value="نعم" <?php if($row['contrat']=="نعم") echo "selected" ?> > نعم </option>
                      <option value="لا"  <?php if($row['contrat']=="لا") echo "selected" ?>> لا </option>
                     
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="avoirCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="نعم"<?php if($row['avoirCompteur']=="نعم") echo "selected" ?> > نعم </option>
                      <option value="لا" <?php if($row['avoirCompteur']=="لا") echo "selected" ?>> لا </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> نوعية العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="typeCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="KENT" <?php if($row['typeCompteur']=="KENT") echo "selected" ?>> KENT </option>
                      <option value="لا(صيني)" <?php if($row['typeCompteur']=="لا(صيني)") echo "selected" ?>> لا(صيني) </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="travailleCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="يشتغل"<?php if($row['travailleCompteur']=="يشتغل") echo "selected" ?>> يشتغل </option>
                      <option value="لا يشتغل" <?php if($row['travailleCompteur']=="لا يشتغل") echo "selected" ?>> لا يشتغل </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> المسافة </label>

                      <select class="form-control form-control-alternative" type="text" name="distance" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="اقل من 10 متر" <?php if($row['distance']=="اقل من 10 متر") echo "selected" ?>> اقل من 10 متر </option>
                      <option value="اكثر من 10 متر" <?php if($row['distance']=="اكثر من 10 متر") echo "selected" ?>> اكثر من 10 متر </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الربط </label>

                      <select class="form-control form-control-alternative" type="text" name="liaison" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="قبل العداد"<?php if($row['liaison']=="قبل العداد") echo "selected" ?> > قبل العداد </option>
                      <option value="بعد العداد" <?php if($row['liaison']=="بعد العداد") echo "selected" ?>> بعد العداد </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الاستعمال </label>

                      <select class="form-control form-control-alternative" type="text" name="utilisation" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="للشراب" <?php if($row['utilisation']=="للشراب") echo "selected" ?>> للشراب </option>
                      <option value="للري" <?php if($row['utilisation']=="للري") echo "selected" ?>> للري </option>
                      
                      
                      </select>


                      </div>
                    </div>






                    
          </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="updateInfoCompteur" >متابعة</button>
                                  
                                  </div>
</form>
      </div>
  </div>
</div>

</div>

                                               

                                               <?php 
                                           }
                                       }
                                       
                                       ?>
                                       <tr>
                                        <td style="border: 1px solid; text-align: center;  color:black"></td>
                                        <td style="border: 1px solid; text-align: center;  color:black">الجملة :</td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $contratOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $contratNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $avoirCompteurOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $avoirCompteurNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $typeCompteurOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $typeCompteurNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $travailleCompteurOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $travailleCompteurNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $distanceOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $distanceNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $distanceOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $distanceNon ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $utilisationOui ?></td>
                                        <td style="border: 1px solid; text-align: center;  color:black"><?php echo $utilisationNon ?></td>
                                       </tr>
                
                  
                  
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </div>
      







<!-- info compteur -->
<button id="infoCompteurButton" class="visually-hidden btn btn-sm btn-primary" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#infoCompteur"></button>

<?php if ($_SESSION['numCompteur']!="") { $numCompteur=$_SESSION['numCompteur']; unset($_SESSION['numCompteur']); ?>
<script>
                  window.onload = function () {
              document.getElementById("infoCompteurButton").click(); };
              </script>
<?php  } ?>



      <div class="col-md-6">
    <div class="modal fade" id="infoCompteur" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">

          <div class="modal-body p-0">
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2"> إضافة معلومات العداد رقم :    <?php echo $numCompteur ?></h3><br>
      <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
        
          <div class="btn-wrapper text-center">

          <input type="text" name="numCompteur" id="" value="<?php  echo $numCompteur ?>" hidden>

          <input type="text" name="nom" id="" value="<?php  echo $_SESSION['nom'] ?>" hidden>


          <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود عقد </label>

                      <select class="form-control form-control-alternative" type="text" name="contrat" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="نعم" > نعم </option>
                      <option value="لا " > لا </option>
                     
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="avoirCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="نعم" > نعم </option>
                      <option value="لا " > لا </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> نوعية العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="typeCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="KENT" > KENT </option>
                      <option value="لا(صيني) " > لا(صيني) </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="travailleCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="يشتغل" > يشتغل </option>
                      <option value="لا يشتغل " > لا يشتغل </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> المسافة </label>

                      <select class="form-control form-control-alternative" type="text" name="distance" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="اقل من 10 متر" > اقل من 10 متر </option>
                      <option value="اكثر من 10 متر " > اكثر من 10 متر </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الربط </label>

                      <select class="form-control form-control-alternative" type="text" name="liaison" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="قبل العداد" > قبل العداد </option>
                      <option value="بعد العداد " > بعد العداد </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الاستعمال </label>

                      <select class="form-control form-control-alternative" type="text" name="utilisation" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="للشراب" > للشراب </option>
                      <option value="للري " > للري </option>
                      
                      
                      </select>


                      </div>
                    </div>






                    
          </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                 <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>-->
                                  <button type="submit"class="btn btn-primary" name="ajoutInfoCompteur" >متابعة</button>
                                  
                                  </div>
</form>
      </div>
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





