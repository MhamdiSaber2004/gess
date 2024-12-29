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
                  <h3 class="mb-0">قائمة المنتفعين</h3>
                </div>
                <div class="col-4 text-right">
                 <a href="index.php?page=ajoutBenefiqueAEP"  class="btn btn-sm btn-primary">إضافة منتفع  </a> 

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
















            <div class="table-responsive col-12">
           <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">الرمز الاحادي</th>
                    <th scope="col">العدد الرتبي </th>

                    <th scope="col">الاسم و اللقب</th>

                    <th scope="col">التجمع السكني </th>
                    <th scope="col">عدد افراد العائلة </th>

                    <th scope="col">رقم ب.ت.و</th>
                    <th scope="col">الديون </th>

                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody>
                <?php
                                       $sql = "SELECT * FROM benefique_aep where idGess='$idGess' and active=1";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {

                                            $sql1 = "SELECT * from dette_aep where idBenefique=".$row['idBenefique'];
                                       $result1 = $conn->query($sql1);
                                       
                                      $row1 = $result1->fetch_assoc();

                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idBenefique"] .'
                                               </th>
                                               <td>'
                                               . $row['numBenefique'] .'
                    </td>

                    <td>'
                    . $row['nom'].'
                    </td>
                    <td>'
                    . $row['unionFamiliale'] .'
                    </td>
                    <td>'
                    . $row['numFamille'] .'
                    </td>
                    <td>'
                    . $row['CIN'] .'
                    </td>
                    <td>'
                    . $row1['dette'] .'
                    </td>
                  
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                   
                        <a class="dropdown-item" href="index.php?page=modifBenefiqueAEP&idBenefique='.$row["idBenefique"].'">تحيين</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#delete'.$row['idBenefique'].'" href="#">تعطيل الحساب</a>
                        </div>
                      </div>
                    </td>
                    </tr>


                    <div class="row">

<div class="col-md-6">
    <div class="modal fade" id="delete'.$row['idBenefique'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 ">
  <div class="card-header bg-transparent pb-2">
      <h3 class=" text-center mt-2">تعطيل حساب منتفع ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد تعطيل حساب المنتفع ؟ <br><br>  صاحب ب.ت.و. : '.$row['CIN'].'</div>
        
    
          
        
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
<a href="controller/controller.php?idBenefiqueAEP='.$row['idBenefique'].'" name="deleteBenefiqueAEP" type="submit" onclick=" return checkInputsConsommation()"  class="btn btn-primary" >تعطيل </a>
</div>
          </div>
          
      </div>
  </div>
</div>

</div>
</div>











                                               ';
                                           }
                                       }
                                       
                                       ?>
                
                  
                  
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

          <input type="text" name="numCompteur" id="" value="<?php  echo $oxa ?>" hidden>

          <input type="text" name="nom" id="" value="<?php  echo $_SESSION['nom'] ?>" hidden>


          <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود عقد </label>

                      <select class="form-control form-control-alternative" type="text" name="contrat" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="نعم" > نعم </option>
                      <option value="لا" > لا </option>
                     
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> وجود العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="avoirCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="نعم" > نعم </option>
                      <option value="لا" > لا </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> نوعية العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="typeCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="KENT" > KENT </option>
                      <option value="لا(صيني)" > لا(صيني) </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> العداد </label>

                      <select class="form-control form-control-alternative" type="text" name="travailleCompteur" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="يشتغل" > يشتغل </option>
                      <option value="لا يشتغل" > لا يشتغل </option>
                  
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> المسافة </label>

                      <select class="form-control form-control-alternative" type="text" name="distance" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="اقل من 10 متر" > اقل من 10 متر </option>
                      <option value="اكثر من 10 متر" > اكثر من 10 متر </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الربط </label>

                      <select class="form-control form-control-alternative" type="text" name="liaison" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="قبل العداد" > قبل العداد </option>
                      <option value="بعد العداد" > بعد العداد </option>
                      
                      
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name"> الاستعمال </label>

                      <select class="form-control form-control-alternative" type="text" name="utilisation" placeholder="" required >
                      <option value="" > الرجاء الاختيار    </option>
                      <option value="للشراب" > للشراب </option>
                      <option value="للري" > للري </option>
                      
                      
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