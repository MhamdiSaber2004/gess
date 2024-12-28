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
                  <h3 class="mb-0">قائمة الأعطاب</h3>
                </div>










                <div class="col-4 text-right">
                  <a href="index.php?page=ajoutProbleme" class="btn btn-sm btn-primary">إضافة عطب</a>
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
                    <th scope="col">رمز العطب</th>
                    <th scope="col">لساكورة عدد</th>
                    <th scope="col">تفاصيل العطب</th>
                    <th scope="col">نوع المنتفع</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php


                                       $sql = "SELECT * FROM problemes where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {


                                            if($row['fichierPrix']=="") {  
                                              $fichierPrix='<h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur"> لا يوجد مرفقات مصاريف الاصلاح</h6>';
                                              }else{ 
                                                 $fichierPrix=' <a href="../../appompiste/uploads/'.$row['fichierPrix'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                                                 <span class="btn-inner--text">مرفقات مصاريف الاصلاح</span>
                                             </a>';
                                                  } 
                                                     if($row['fichierElementAchete']=="") {  
                                             $fichierElementAchete=' <h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur"> لا يوجد مرفقات المواد المشتراة </h6>';
                                              }else{ 
                                                 $fichierElementAchete=' <a href="../../appompiste/uploads/'.$row['fichierElementAchete'].'" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                                                 <span class="btn-inner--text">مرفقات المواد المشتراة </span>
                                             </a>';
                                                  } 





                                            if($row['dateFin'] == "1000-10-10")
                                            {
                                              $row['dateFin']='ناشط';
                                            }
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idProbleme"] .'
                                               </th>
                                               <td>'
                                               . $row['numCompteur'] .'
                    </td>
                    <td>'
                    . substr($row['detail'], 0,10) .'
                    </td>
                    <td>'
                    . $row['typeBenefique'] .'
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
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#documents'.$row["idProbleme"].'">تفاصيل </a>
                          <a class="dropdown-item" href="index.php?page=modifProbleme&idProbleme='.$row["idProbleme"].'">تحيين</a>
                          <!--<a class="dropdown-item" data-toggle="modal" data-target="#supprimer'.$row['id'].'" href="index.php?page=listePompiste&action=supprimer&id=">حذف</a>-->
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
      