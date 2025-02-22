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
                  <h3 class="mb-0">فاتورة المنتفعين بالماء الصالح للشرب  </h3>
               </div>
               <div class="col-4 text-right">
                  <a href="#!" data-toggle="modal" data-target="#facture" class="btn btn-sm btn-primary">إستخراج فاتورة</a>
               </div>
            </div>
            </div>
            <div class="col-md-6">
    <div class="modal fade" id="facture" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
          <div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">إستخراج فاتورة </h3><br>
      <div class="text-center mb-4">الرجاء كتابة رقم العداد   </div>
        
      <div class="btn-wrapper text-center">
      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم العداد</label>
                        <input type="number" name="numCompteur" list="numeroCompteur" id="numCompteur" class="form-control form-control-alternative" placeholder="رقم العداد" >
                        <datalist id="numeroCompteur">
                                                <?php
                                                   
                                                    $sql = "SELECT numCompteur FROM benefique_aep where idGess='$idGess' and active=1 ";
                                                                  $result = $conn->query($sql);
                                                   
                                                                  if ($result->num_rows > 0) {
                                                                   while ($row = $result->fetch_assoc()) {
                                                                   echo "<option>".$row['numCompteur']."</option>";
                                                                  
                                                                   
                                                                 }
                                                                  }
                                                    ?>
                                             </datalist>
                      </div>
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
          <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">العداد عدد</th>
                     <th scope="col">اسم و لقب صاحب العداد</th>
                     <th scope="col">الرقم الجديد</th>
                     <th scope="col">الرقم القديم</th>
                     <th scope="col">تاريخ التسجيل</th>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                <?php
                 $sql = "SELECT idConsommation FROM consommation_aep ORDER BY date DESC LIMIT 1";
                 $result = $conn->query($sql);
                 $row = $result->fetch_assoc();
                 $idLatest=$row["idConsommation"];


                 $sql = "SELECT * FROM consommation_aep where idGess='$idGess' order by consommation_aep.date desc";
                 $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            
                                            $numCompteur=$row["numCompteur"];
                                            $sql1 = "SELECT nom FROM benefique_aep where numCompteur='$numCompteur'";
                                           $result1 = $conn->query($sql1);
                                           
                                           if ($result1->num_rows > 0) {
                                               // output data of each row
                                               $row1 = $result1->fetch_assoc();  

                                              
                                               {

                                                ?>
                                               <tr>
                                               <th scope="row">
                                               <?php echo $row["numCompteur"] ?>
                                               </th>
                                               <td>
                                               <?php echo $row1["nom"] ?>
                    </td>
                    <td>
                    <?php echo $row["numConsomme"] ?>
                    </td>
                    <td>
                    <?php echo $row["numConsommePrecedent"] ?>
                    </td>
                    <td>
                    <?php echo substr($row['date'], 0,10)?>
                    </td>
                    
                    <td class="text-center"><?php if ($row["idConsommation"]==$idLatest) { ?> 
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modifier<?php echo $row["idConsommation"] ?>" href="index.php?page=modifDonneesCompteur&idConsommation=<?php echo $row["idConsommation"] ?>">تحيين</a> 
                          <a class="dropdown-item" data-toggle="modal" data-target="#supprimer<?php echo $row["idConsommation"] ?>" href="index.php?page=listePompiste&action=supprimer&id=<?php echo $row["idConsommation"] ?>">حذف</a>
                        </div>
                      </div><?php } ?>
                    </td>
                    
                    </tr>

                    
<div class="row">

<div class="col-md-6">
    <div class="modal fade" id="supprimer<?php echo $row["idConsommation"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 ">
  <div class="card-header bg-transparent pb-2">
      <h3 class=" text-center mt-2">حذف إستهلاك العداد ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد حذف إستهلاك العداد ؟ <br><br>  رقم : <?php echo $row['numCompteur'] ?> <br> صاحب العداد :  <?php echo $row1['nom'] ?></div>
        
          <!--<div class="btn-wrapper text-center">
              <a href="controller/controller.php?idPompisteSupprimer='.$row['numCompteur'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">حذف</span>
              </a><br><br>
              <a href="#" class="btn btn-neutral btn-icon" data-dismiss="modal">
                  <span class="btn-inner--text" >إلغاء</span>
              </a>
          </div>-->
          
        
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
<a href="controller/controller.php?idConsommation=<?php echo ($row["idConsommation"]) ?>" type="submit" name="idConsommation" class="btn btn-primary" >حذف</a>
</div>
          </div>
          
      </div>
  </div>
</div>

</div>
</div>


                   
<div class="row">
<form  action="controller/controller.php" method="post">
              <div class="col-md-6">
               
                  <div class="modal fade" id="modifier<?php echo $row["idConsommation"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                     <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                           <div class="modal-body p-0">
                              <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-header bg-transparent pb-1">
                                    <h3 class=" text-center mt-2 mb-3">رفع العداد</h3>
                                    <br>
                                    <div class="row">
                                    <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رمز العملية </label>
                                             <input type="number" id="idConsommation" class="form-control form-control-alternative" placeholder="رمز العداد" name="idConsommation" readonly value="<?php echo $row['idConsommation'] ?>">
                                             
                                          </div>
                                       </div>
                                    <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رمز العداد</label>
                                             <input type="number" id="numCompteur" class="form-control form-control-alternative" placeholder="رمز العداد" name="numCompteur" readonly value="<?php echo $row['numCompteur'] ?>">
                                          
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">الرقم المستهلك</label>
                                             <input type="number" id="numConsomme" class="form-control form-control-alternative" placeholder="الرقم المستهلك" name="numConsomme" value="<?php echo $row['numConsomme'] ?>">
                                          </div>
                                       </div>
                                      
                                       <h6 class="heading-small text-muted mb-4 text-red" id="erreur"><br></h6>
                                    </div>
              
              </div>
               
            </div>
               <div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" name="modifierConsommationAEP" class="btn btn-primary" value="تسجيل">
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
            </form>
</div>


                                               <?php
                                               }
                                           }
                                          }
                                       }
                                       
                                       ?>
                
                  
                  
                </tbody>
            </table>
         </div>
      </div>
   </div>
</div>


