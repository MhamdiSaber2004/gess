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
                  <h3 class="mb-0">قائمة الفروع </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" data-toggle="modal" data-target="#ajoutBranche" class="btn btn-sm btn-primary">إضافة فرع</a> 
                </div>
              </div>
            </div>
            


            <div class="row">
            <form  action="controller/controller.php" method="post">
              <div class="col-md-6">
               
                  <div class="modal fade" id="ajoutBranche" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                     <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                           <div class="modal-body p-0">
                              <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-header bg-transparent">
                                    <h3 class=" text-center ">إضافة فرع</h3>
                                    <br>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">الرمز الأحادي للفرع </label>
                                             <input type="number" id="idBranche" class="form-control form-control-alternative" readonly placeholder="الرمز الأحادي للفرع " name="idBranche" value="<?php
                         $random =  mt_rand(100000, 999999) ;
                         $sql = "SELECT idBranche FROM branche";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['idBranche'] == $random)
                                               {
                                                $random = mt_rand(111111, 999999) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>">
                                             
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رقم الفرع</label>
                                             <input type="number" id="numBranche" class="form-control form-control-alternative" placeholder="رقم الفرع" name="numBranche" >
                                          </div>
                                       </div>
                                 
                                
                                      
                                       <h6 class="heading-small text-muted mb-1 text-red" id="erreur"><br></h6>
                                    </div>
              
              </div>
               
            </div>
               <div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" name="ajoutBranche" onclick=" return checkInputAddPrise()" class="btn btn-primary" value="تسجيل">
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
            </form>
          </div>
















            <div class="table-responsive col-12">
           <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">الرمز الاحادي للفرع</th>
                    <th scope="col"> رقم الفرع</th>

                    <th scope="col">تاريخ الاضافة </th>
                    <th scope="col">  </th>
                  </tr>
                </thead>
                <tbody>
                <?php


                                       $sql = "SELECT * FROM branche where idGess='$idGess' ";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                           
                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idBranche"] .'
                                               </th>
                            
                    <td>'
                    . $row['numBranche'].'
                    </td>
                    
                 
                    <td>'
                    . substr($row['date'], 0,10).'
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifier'.$row['idBranche'].'">تحيين</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#supprimer'.$row['idBranche'].'" href="index.php?page=listePompiste&action=supprimer&id=">حذف</a>
                        </div>
                      </div>
                    </td>
                    </tr>


                    <div class="row">

<div class="col-md-6">
    <div class="modal fade" id="supprimer'.$row['idBranche'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">حذف فرع ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد حذف الفرع  عدد '.$row['numBranche'].' ؟</div>
        
          <div class="btn-wrapper text-center">
              <a href="controller/controller.php?idBrancheSupprimer='.$row['idBranche'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">حذف فرع</span>
              </a><br><br>
              <a href="#" class="btn btn-neutral btn-icon" data-dismiss="modal">
                  <span class="btn-inner--text" >إلغاء</span>
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


<div class="row">
<form  action="controller/controller.php" method="post">
              <div class="col-md-6">
               
                  <div class="modal fade" id="modifier'. $row["idBranche"] .'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                     <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                           <div class="modal-body p-0">
                              <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-header bg-transparent pb-1">
                                    <h3 class=" text-center mt-2 mb-3">تحيين الفرع </h3>
                                    <br>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">الرمز الأحادي للفرع </label>
                                             <input type="number" id="idBranche" class="form-control form-control-alternative" readonly placeholder="الرمز الأحادي للفرع " name="idBranche" value="'.$row['idBranche'].'">
                                             
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label class="form-control-label" for="input-country">رقم الفرع</label>
                                             <input type="number" id="numBranche" class="form-control form-control-alternative" placeholder="رقم الفرع" name="numBranche"  value="'.$row['numBranche'].'">
                                          </div>
                                       </div>
                                      
                                       <h6 class="heading-small text-muted mb-1 text-red" id="erreur"><br></h6>
                                    </div>
              
              </div>
               
            </div>
               <div class="modal-footer flex-row-reverse">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
               <input type="submit" onclick=" return checkInputsConsommation()" name="modificationBranche" class="btn btn-primary" value="تسجيل">
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
            </form>
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
      