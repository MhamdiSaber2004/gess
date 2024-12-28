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
                  <h3 class="mb-0">بيع الماء</h3>
               </div>
               <div class="col-4 text-right">
                  <a href="#!" data-toggle="modal" data-target="#ajout" class="btn btn-sm btn-primary">إضافة </a>
               </div>
            </div>
            </div>
            <form  action="controller/controller.php" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
    <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
          <div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2"> بيع الماء </h3><br>
      <h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur">لا يمكنك تغير هذه المعطيات لاحقا، الرجاء التعمير بدقة<br></h6>

        
      <div class="btn-wrapper text-center">
      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">أخر إستهلاك مسجل للعداد</label>
                        <input type="number" name="numConsommePrecedent" readonly id="numConsommePrecedent" class="form-control form-control-alternative" placeholder="أخر إستهلاك مسجل للعداد" value="<?php 
                        
                        $sql = "SELECT * FROM vente_eau where idGess='$idGess' order by date desc";
                 $result = $conn->query($sql);
                 $row = $result->fetch_assoc();
                 echo $row['numConsomme'];

                        ?>"
                        >
                        
                      </div>
                    </div>
      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">إستهلاك العداد بعد عملية البيع</label>
                        <input type="number" name="numConsomme" id="numConsomme" class="form-control form-control-alternative" placeholder="إستهلاك العداد بعد عملية البيع" required >
                        
                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">السعر</label>
                        <input type="number" name="prix" id="prix" class="form-control form-control-alternative" placeholder="السعر" required>
                        
                      </div>
                    </div>
                    <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1"> صورة الفاتورة  </label>
                     <input type="file" id="file1" class="form-control "  name="file1" accept="image/*" required>
                     </div>
                   </div>
                
            </div>
        
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" name="ajoutVenteEau" class="btn btn-primary" value="متابعة">
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
                     <th scope="col">اسم و لقب الحارس</th>
                     <th scope="col">إستهلاك العداد الجديد </th>

                     <th scope="col">إستهلاك العداد القديم </th>

                     <th scope="col">تاريخ التسجيل</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                <?php



                 $sql = "SELECT * FROM vente_eau where idGess='$idGess' and numConsommePrecedent!=0 order by date desc";
                 $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            
                                            $idPompisteVente=$row["idPompiste"];
                                            $sql1 = "SELECT nom FROM pompiste where idPompiste='$idPompisteVente'";
                                           $result1 = $conn->query($sql1);
                                           
                                           if ($result1->num_rows > 0) {
                                               // output data of each row
                                               $row1 = $result1->fetch_assoc();  

                                              
                                               

                                                ?>
                                               <tr>
                                               <th scope="row">
                                               <?php echo $row1["nom"] ?>
                                               </th>
                                               <td>
                                               <?php echo $row["numConsomme"] ?>
                    </td>
                    <td>
                                               <?php echo $row["numConsommePrecedent"] ?>
                    </td>
          
                    <td>
                    <?php echo substr($row['date'], 0,10)?>
                                           </td>
                                           <td>
                                           <a href="#!" data-toggle="modal" data-target="#facture<?php echo $row['idVenteEau'] ?>" class="btn btn-sm btn-primary"> فاتورة</a>

                    </td>
                    
                    </tr>

                    <div class="col-md-6">
    <div class="modal fade" id="facture<?php echo $row['idVenteEau'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
          <div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">فاتورة بيع الماء </h3><br>

        
      <div class="btn-wrapper text-center">
      
                     <div class="form-group text-center">
                     <label class="form-control-label text-red text-center" for="file1"> صورة الفاتورة </label><br>
                     <img id="id" src="./uploads/<?php echo $row['facture'] ?>" alt="example placeholder" style="width: 300px;" /> 
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


