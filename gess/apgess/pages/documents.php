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
                  <h3 class="mb-0">مراجع هامة  </h3>
                </div>










                <div class="col-4 text-right">
                </div>
              </div>
            </div>




            <form action="controller/controller.php" method="post" enctype="multipart/form-data">
   <div class="col-md-6">
      <div class="modal fade" id="ajoutDocument" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="card bg-white border-0 mb-0">
                     <div class="card-header bg-transparent pb-1">
                        <h3 class=" text-center mt-2 mb-3">إضافة    </h3>
                        <br>
                        <div class="row">

                        <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label" for="input-country">اسم الوثيقة</label>
                                 <input type="text"  class="form-control form-control-alternative" placeholder="اسم الوثيقة"  name="nom"  required >
                              </div>
                           </div>
                           
                        
                           <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">نوعية الوثيقة </label>

                      <select class="form-control form-control-alternative" type="text" name="type" placeholder="" required >
                      <option value="" > الرجاء إختيار نوع الوثيقة </option>
                      <option value="إدارية" > إدارية </option>
                      <option value="فنية " > فنية </option>
                      <option value="مالية " > مالية </option>
                      <option value="قانونية" > قانونية</option>
                      </select>


                      </div>
                    </div>
                           
                           <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1">  الوثيقة </label>
                     <input type="file" id="file1" class="form-control "  name="file2">
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
                     <input type="submit" name="ajoutDocument" class="btn btn-primary" value="تسجيل">
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
                    <th scope="col">اسم الوثيقة </th>
                    <th scope="col">نوعية الوثيقة </th>
                    <th scope="col">الاطلاع</th>
                  </tr>
                </thead>
                <tbody>
                <?php


                                       $sql = "SELECT * FROM `documents` where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {


                                   





                                         
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["nom"] .'
                                               </th>
                                               <td>'
                                               . $row['type'] .'
                    </td>
                    
                    
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="./uploads/'.$row['chemain'].'">تحميل </a>
                          <a class="dropdown-item" href="controller/controller.php?idDocumentSupprimer='.$row['idD'].'">حذف</a>
                        </div>
                      </div>
                    </td>
                    </tr>



                    <div class="row">

<div class="col-md-6">
    <div class="modal fade" id="documents'.$row["idProbleme"].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">وثائق العطب عدد '.$row["idProbleme"].'</h3><br>
        
          <div class="btn-wrapper text-center">
          '.$fichierPrix.'  
          <br><br>
             '.$fichierElementAchete.'
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

<div class="col-md-6">
    <div class="modal fade" id="supprimer'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">حذف حارس نظام مائي ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد حذف الحارس  عدد '.$row['id'].' ؟</div>
        
          <div class="btn-wrapper text-center">
              <a href="controller/controller.php?idPompisteSupprimer='.$row['id'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">حذف حارس النظام المائي</span>
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
      