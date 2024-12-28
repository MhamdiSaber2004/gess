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
               </div>
            </div>
            </div>
            <form  action="controller/controller.php" method="post">

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
                                                   
                                                    $sql = "SELECT numCompteur FROM benefique_aep where idGess='$idGess' and active=1";
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
<div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" name="factureAEP" class="btn btn-primary" value="متابعة">
               </div>
  
          </div>
          
      </div>
  </div>
</div>

</div>
            </form>
         <div class="table-responsive col-12">
          <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">فاتورة عدد</th>
                     <th scope="col">اسم و لقب المنتفع</th>

                     <th scope="col">تاريخ التسجيل</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                <?php



                 $sql = "SELECT * FROM facture_aep where idGess='$idGess' order by facture_aep.date desc";
                 $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            
                                            $idBenefique=$row["idBenefique"];
                                            $sql1 = "SELECT nom FROM benefique_aep where idBenefique='$idBenefique'";
                                           $result1 = $conn->query($sql1);
                                           
                                           if ($result1->num_rows > 0) {
                                               // output data of each row
                                               $row1 = $result1->fetch_assoc();  

                                              
                                               

                                                ?>
                                               <tr>
                                               <th scope="row">
                                               <?php echo $row["idFacture"] ?>
                                               </th>
                                               <td>
                                               <?php echo $row1["nom"] ?>
                    </td>
          
                    <td>
                    <?php echo substr($row['date'], 0,10)?>
                                           </td>
                                           <td>
                                           <a href="./print/recu.php?idFacture=<?php echo $row["idFacture"]  ?>" class="btn btn-sm btn-primary"> فاتورة</a>

                    </td>
                    
                    </tr>




                                               <?php
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


