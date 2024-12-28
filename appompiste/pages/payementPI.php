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
                  <h3 class="mb-0"> الخلاص </h3>
               </div>
               <div class="col-4 text-right">
                  <a href="#!" id="ajout" data-toggle="modal" data-target="#modal-form" class="btn btn-sm btn-primary">إضافة</a>
               </div>
            </div>
            </div>
   
















            <div class="row">
            
            <div class="col-md-6">
             
                <div class="modal fade" id="modal-form" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                   <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                         <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                            <?php if(!isset($_POST['CIN']) && !isset($_POST['idBenefique'])) { ?>
                              <form  action="index.php?page=payementPI" method="post">
                               <div class="card-header bg-transparent pb-1">
                                  <h3 class=" text-center mt-2 mb-3"> عملية الخلاص</h3>
                                  <br>
                                 
                                  <div class="row">
                                  <div class="col-lg-12">
                                      
                                        <div class="form-group">
                                           <label class="form-control-label visually-hidden" for="input-country">الرقم المستهلك</label>
                                           <input type="hidden" id="page" class="form-control form-control-alternative" placeholder="الرقم المستهلك" name="page" value="payement">
                                        </div>
                                     </div>
                                     <div class="col-lg-12">
                                        <div class="form-group">
                                           <label class="form-control-label" for="input-country">رقم ب.ت.و. المنتفع</label>
                                           <input type="number" id="CIN" list="numeroCompteur" class="form-control form-control-alternative" placeholder="رقم ب.ت.و. المنتفع" name="CIN" required>
                                           <datalist id="numeroCompteur">
                                              <?php
                                                 $idPompiste=$_SESSION['idPompiste'];
                                                 
                                                  $sql = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1";
                                                  $result = $conn->query($sql);
                                                  $result1 = $conn->query($sql);
                                                 
                                                                if ($result->num_rows > 0) {
                                                                 while ($row= $result->fetch_assoc()) {

                                                                  echo "<option>".$row['CIN']."</option>";
                                                                
                                                                 
                                                               }
                                                               /*while ($row1= $result1->fetch_assoc()) {

                                                                  $data []=$row1;
                                                                
                                                                 
                                                               }*/
                                                              

                                                                }
                                                  ?>
                                           </datalist>
                                        </div>
                                     </div>
                                    
                                     <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء إدخال رقم ب.ت.و. الخاصة بالمنتفع الذي سيدفع حق إستهلاك الماء</h6>
                                                          
                                     </div>
                                      
                                      </div>
 
                                           </div>
                                  <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" >متابعة</button>
                                  
                                  </div>
                                                                                              </form>
                                           <?php } else if (!isset($_POST['idBenefique'])){?>

                                              <script>
                                                 window.onload = function () {
                                              document.getElementById("ajout").click(); };
                                              </script>
                                              <form  action="index.php?page=payementPI" method="post">
                               <div class="card-header bg-transparent pb-1">
                                                                   <h3 class=" text-center mt-2 mb-3"> التأكد من المنتفع </h3>
                                  <br>
                                 
                                  <div class="row"></div>
                                  <div class="col-lg-12">
                                  </div>
                                        <?php 
                                        $CIN=$_POST['CIN'];
                                        $sql = "SELECT * FROM benefique_pi where CIN='$CIN'";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows == 0) {
                                       ?>
                                    
                                    <h6 class="heading-small text-muted mb-4 text-red" id="erreur">رقم بطاقات التعريف الذي قمت بادخاله خاطئ أو ينتمي إلى مجمع أخر</h6>
                                      
                                                  </div>
             
                                                       </div>
             <div class="modal-footer flex-row-reverse">
             <a href="index.php?page=payementPI" type="button" class="btn btn-primary">رجوع</a>
             <?php } else {   while ($row= $result->fetch_assoc()) {       ?>
              <h6 class="heading-small text-muted mb-4 text-red" id="erreur">هل معلومات المنتفع هذه صحيحة ؟</h6>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">رمز المنتفع (تلقائي)</label>
                      <input id="idBenefique" class="form-control form-control-alternative" placeholder="رمز المنتفع (تلقائي)" type="text" name="idBenefique" readonly value="<?php echo $row['idBenefique'] ?>">
                    </div>
                  </div>
                
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">الإسم و اللقب</label>
                      <input type="text" id="nom" name="nom" class="form-control form-control-alternative" readonly placeholder="الإسم و اللقب" value="<?php echo $row['nom'] ?>">
                  
                </div>
                                      
                                      </div>
                           

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">تاريخ الميلاد</label>
                      <input name="dateN" type="date" id="CIN" class="form-control form-control-alternative" readonly placeholder="رقم بطاقة التعريف" value="<?php echo $row['dateN'] ?>">
                    </div>
                  </div>

 
                                           </div>
             </div>
             
                                                       </div>
                            <div class="modal-footer flex-row-reverse">
                            <a href="index.php?page=payementPI" type="button" class="btn btn-secondary">رجوع</a>
                            <button type="submit" nom="continuer" class="btn btn-primary" >متابعة</button>


              <?php } ?>
             </div>
             </form>
             <?php } }    if(isset($_POST['idBenefique'])) { 
               $idBenefique=$_POST['idBenefique'];
               $sql = "SELECT * FROM benefique_pi where idBenefique='$idBenefique'";
               $result = $conn->query($sql);
               
               if ($result->num_rows > 0) {
                  $row= $result->fetch_assoc();
              ?>   
              <form  action="controller/controller.php" method="post">

              <script>
                  window.onload = function () {
              document.getElementById("ajout").click(); };
              </script>
                   <div class="card-header bg-transparent pb-1">
                                  <h3 class=" text-center mt-2 mb-3"> التأكد من المنتفع </h3>
                                  <br>
                                 
                                  <div class="row">
                                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">رقم العداد </label>
                      <input id="idBenefique" class="form-control form-control-alternative" placeholder="رقم العداد " type="text" name="numCompteur" readonly value="<?php echo $row['numCompteur'] ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">المبلغ المطلوب  </label>
                      <input id="idBenefique" class="form-control form-control-alternative" type="text" name="dette" readonly value="<?php
                      $sql = "SELECT * from dette_pi where idBenefique='$idBenefique'";

                      $result = $conn->query($sql);
                  
                          $row = $result->fetch_assoc();
                          
                      
                      echo $row['dette'] ?>">
                    </div>
                  </div>
                                  <h6 class="heading-small text-muted mb-4 text-red" id="erreur">لا يمكنك تغيير هذه المعطيات لاحقا، الرجاء الحذر في التعمير</h6>
                                  <div class="col-lg-12">
                                  <div class="form-group">
                      <label class="form-control-label" for="input-address">المبلغ المدفوع</label>
                      <input id="argentPaye" class="form-control form-control-alternative" min="1" placeholder="المبلغ المدفوع" required type="text" name="montantPaye" >
                    </div>
                  </div>
                                    
                                    
                                    
                                      
                                                  </div>
             
                                                       </div>
             <div class="modal-footer flex-row-reverse">
             <a href="index.php?page=payementPI" type="button" class="btn btn-primary">إلغاء</a>
             <button type="submit" name="payementArchivePI" class="btn btn-primary">تأكيد</button>
            
             </div>
             </form>
              <?php } } ?>
          </div>
             </div>
             </div>
             </div>
















            </div>
          </div>
         <div class="table-responsive col-12">
          <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
               <thead class="thead-light">
                  <tr>
                  <th scope="col">رقم عملية الخلاص</th>
                  <th scope="col">رقم العداد  </th>
                     <th scope="col">اسم و لقب المنتفع </th>
                     <th scope="col">المبلغ المدفوع</th>
                     <th scope="col">المبلغ المطلوب </th>
                     <th scope="col">المبلغ المتبقي</th>
                     <th scope="col">تاريخ الدفع</th>
                     <th scope="col">وصل</th>
                  </tr>
               </thead>
               <tbody>
                <?php
 
                $idPompiste=$_SESSION['idPompiste'];

                $sql = "SELECT * FROM archive_payement_pi where idGess='$idGess' order by date desc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                  while ($archive_payement_pi = $result->fetch_assoc()) {

                     $idBenefique=$archive_payement_pi['idBenefique'];

                     $sql = "SELECT * FROM benefique_pi inner join dette_pi where benefique_pi.idBenefique=".$archive_payement_pi['idBenefique'];

                $result1 = $conn->query($sql);
                $benefiqueAndDette = $result1->fetch_assoc();





                                              
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $archive_payement_pi["idPayement"] .'
                                               </th>
                                               <th scope="row">'
                                               . $benefiqueAndDette["numCompteur"] .'
                                               </th>
                                               <td>'
                                               .$benefiqueAndDette['nom'].'
                    </td>
                    <td>'
                    . $archive_payement_pi['montantPaye'] .' دت 
                    </td>
                    <td>'
                    .$archive_payement_pi['dette'].' دت 
                    </td>
                    <td>'
                    . $archive_payement_pi['dette'] - $archive_payement_pi['montantPaye'] .' دت 
                    </td>
                    <td>'
                    . substr($archive_payement_pi['date'], 0,10).'
                    </td>
                    
                    <td class="text-center">
                    <a href="?page=recuPayementPI&idPayement='.$archive_payement_pi['idPayement'].'" class="btn btn-sm btn-primary">طباعة</a>
                    </td>
                    </tr>

 


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
