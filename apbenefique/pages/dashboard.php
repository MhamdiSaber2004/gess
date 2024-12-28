



   
  <!-- Main content -->
  <div class="main-content">
      <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">مقدار الماء المستهلك لهذا الشهر</h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                                                   
                                                   $sql = "SELECT * FROM consommation$type where numCompteur='$numCompteur' order by date desc limit 1 ";
                                                                 $result = $conn->query($sql);
                                                  
                                                                 if ($result->num_rows > 0) {
                                                                 $row = $result->fetch_assoc();
                                                                  echo $row['numConsomme']-$row['numConsommePrecedent'];
                                                                 
                                                                  
                                                                }
                                                                 
                                                   ?> م3</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">الديون</h5>
                      <span class="h2 font-weight-bold mb-0">
                      <?php
                                                   
                                                   $sql = "SELECT * FROM dette$type where idBenefique='$idBenefique' ";
                                                                 $result = $conn->query($sql);
                                                  
                                                                 if ($result->num_rows > 0) {
                                                                 $row = $result->fetch_assoc();
                                                                  echo $row['dette'];
                                                                 
                                                                  
                                                                }
                                                                 
                                                   ?> دينار 
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">مقدار الماء المستخدم في هذه السنة</h5>
                      <span class="h2 font-weight-bold mb-0"><?php

                                                    $currentYear = date('Y');
                                                   
                                                   $sql = "SELECT * FROM consommation$type where numCompteur='$numCompteur' AND YEAR(date) = '$currentYear' order by date asc  limit 1";
                                                                 $result = $conn->query($sql);
                                                  
                                                                 if ($result->num_rows > 0) {
                                                                 $row = $result->fetch_assoc();
                                                                  $numConsommeDebutAnne= $row['numConsommePrecedent'];
                                                                 
                                                                  
                                                                }

                                                                $sql = "SELECT * FROM consommation$type where numCompteur='$numCompteur' AND YEAR(date) = '$currentYear'  order by date desc limit 1";
                                                                $result = $conn->query($sql);
                                                 
                                                                if ($result->num_rows > 0) {
                                                                $row = $result->fetch_assoc();
                                                                 echo $row['numConsomme']-$numConsommeDebutAnne;
                                                                
                                                                 
                                                               }
                                                                 
                                                   ?> م3</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
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
    <!-- Page content -->
<div class="container-fluid mt--7">
<!-- table -->
<div class="row">
   <div class="col">
      <div class="card shadow">
         <div class="card-header bg-secondary border-0">
            <div class="row align-items-center">
               <div class="col-8">
                  <h3 class="mb-0">استهلاك العدادات </h3>
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
                     <th scope="col">تاريخ التسجيل</th>
                     <th scope="col">العدد الجديد</th>
                     <th scope="col">الرقم القديم</th>
                  </tr>
               </thead>
               <tbody>
                <?php


                                       $sql = "SELECT * FROM consommation$type INNER JOIN benefique$type on consommation$type.numCompteur=benefique$type.numCompteur where idBenefique='$idBenefique' order by consommation$type.date desc";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            
                                    

                                              
                                               echo '
                                               <tr>
                                               <td>'
                    . substr($row['date'], 0,10).'
                    </td>
                         
                    <td>'
                    . $row['numConsomme'] .'
                    </td>
                    <td>'
                    .$row['numConsommePrecedent'] .'
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