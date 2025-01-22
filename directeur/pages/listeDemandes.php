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
                  <h3 class="mb-0">قائمة المنخرطين</h3>
                </div>
                <div class="col-4 text-right">
                <!--<a href="index.php?page=listeDemandeEnCours" class="btn btn-sm btn-primary"> قائمة مطالب الإنخرط</a>-->
                <a href="index.php" class="btn btn-sm btn-primary">رجوع</a>
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
                  <th scope="col">رمز مطلب الانخراط  </th>
                  <th scope="col">العدد الرتبي </th>
                  <th scope="col">االسم و اللقب </th>
                  <th scope="col">تاريخ االنخراط </th>
                  <th scope="col">رقم ب.ت.و </th>
                  <th scope="col"> </th>

                  </tr>
                </thead>
                <tbody>
                <?php
                                       $sql = "SELECT * FROM demandes where idGess='$idGess' and resultat='مقبول'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {

                                            $sql1 = "SELECT * FROM benefique_aep where idBenefique=".$row["idBenefique"];
                                       $result1 = $conn->query($sql1);
                                       
                                       if ($result1->num_rows == 0) 
                                       {
                                        $sql1 = "SELECT * FROM benefique_pi where idBenefique=".$row["idBenefique"];
                                        $result1 = $conn->query($sql1);
                                        
                                        if ($result1->num_rows > 0)
                                        $row1 = $result1->fetch_assoc();
                                       
                                       }
                                       else

                                       {
                                        $row1 = $result1->fetch_assoc();
                                       }
                                    

                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idDemande"] .'
                                               </th>
                               
                                               <td>'
                                               . $row1['numBenefique'].'
                                               </td>
                                               <td>'
                                               . $row1['nom'].'
                                               </td>
                                               <td>'
                                               . $row['dateAcceptation'].'
                                               </td>
                                               <td>'
                                               . $row1['CIN'].'
                                               </td>
                    <td>
                    <a class="btn btn-sm btn-primary"   href="index.php?page=printDemande&idDemande='.$row['idDemande'].'" >طباعة المطلب </a>
                    </td>
                   
                    
                   
                    </tr>

                    <div class="row">

                    <div class="col-md-8">
                        <div class="modal fade" id="demande'.$row['idDemande'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            
                              <div class="modal-body p-0">
                                
                    <div class="card bg-secondary border-0 mb-0">
                      <div class="card-header bg-transparent pb-5">
                          <h3 class=" text-center mt-2"><strong>تفاصيل المطلب عدد </strong> : '.$row['idDemande'].'</h3><br>
                          <div class="text-center mb-4">تاريخ كتابة المطلب : '.substr($row['dateCreationDemande'], 0,10).' </div>
                          <div class="text-center mb-4">تاريخ المجلس : '.$row['dateConseil'].' </div>
                          <div class="text-center mb-4">مكان تحرير المطلب  : '.$row['placeCreationDemande'].' </div>
                          <div class="text-center mb-4">صورة بطاقة التعريف الوطنية    :  </div>
                          <div class="text-center mb-4">
                          <img id="viewFrontCIN" src="http://localhost/apbenefique/uploads/'.$row['frontCIN'].'" alt="example placeholder" style="width: 300px;" /> 
                          <img id="viewFrontCIN" src="http://localhost/apbenefique/uploads/'.$row['backCIN'].'" alt="example placeholder" style="width: 300px;" /> <br><br>
                          </div>
                            
                              <div class="btn-wrapper text-center">
                                  <a href="controller/controller.php?accepterDemande='.$row['idDemande'].'" name="accepterDemande" class="btn btn-neutral btn-icon">
                                      <span class="btn-inner--text">موافقة</span>
                                  </a><br><br>
                                  <a href="controller/controller.php?refuserDemande='.$row['idDemande'].'" name="refuserDemande" class="btn btn-neutral btn-icon">
                                      <span class="btn-inner--text" >رفض</span>
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
      