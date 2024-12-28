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
                                  <!--   <a href="#!" data-toggle="modal" data-target="#modal-form" class="btn btn-sm btn-primary">إضافة منتفع< -->
                  <a href="index.php?page=ajoutPi" class="btn btn-sm btn-primary">إضافة منتفع</a>
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
                <a href="index.php?page=ajoutPi" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">المنطقة السقوية</span>
                </a><br><br>
                <a href="index.php?page=ajoutPea" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منطقة الماء الصالح للشرب</span>
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
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">الرمز الاحادي</th>
                    <th scope="col">الاسم و اللقب</th>
                    <th scope="col">رقم العداد</th>
                    <th scope="col">رقم القطعة</th>
                    <th scope="col">تاريخ إنتهاء الخدمة</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                       $sql = "SELECT * FROM benefique where idGess=1";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["id"] .'
                                               </th>
                                               <td>'
                                               . $row['nom'] .'
                    </td>
                    <td>'
                    . $row['numCompteur'].'
                    </td>
                    <td>'
                    . $row['numPlace'] .'
                    </td>
                    <td>'
                    . $row['type'] .'
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="index.php?page=detailsBenefique">تفاصيل و طباعة</a>
                          <a class="dropdown-item" href="index.php?page=modifBenefique&id='.$row["id"].'">تحيين</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#supprimer" href="#">حذف</a>
                        </div>
                      </div>
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
      