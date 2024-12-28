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


                                            if($row['dateFin'] == "1000-10-10")
                                            {
                                              $row['dateFin']='ناشط';
                                            }
                                            ?>
                                               
                                               <tr>
                                               <th scope="row">
                                            <?php echo $row["idProbleme"] ?>
                                              </th>
                                               <td>
                                               <?php echo $row["numCompteur"] ?>
                    </td>
                    <td>
                    <?php echo $row['detail']?>
                    </td>
                    <td>
                    <?php echo $row["typeBenefique"] ?>
                    </td>
                    <td>
                    <?php echo substr($row['date'], 0,10) ?>
                    </td>
                    <td>
                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#documents<?php echo $row["idProbleme"] ?>">وثائق </a>

                    </td>
                    
                 
                    </tr>

                    
<div class="row">

<div class="col-md-6">
    <div class="modal fade" id="documents<?php echo $row["idProbleme"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">وثائق العطب عدد <?php echo $row["idProbleme"] ?></h3><br>
        
          <div class="btn-wrapper text-center">
            <?php    if($row['fichierPrix']=="") {  ?>
          <h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur"> لا يوجد مرفقات مصاريف الاصلاح</h6>
          <?php }else{ ?>
              <a href="../../appompiste/uploads/<?php echo $row['fichierPrix'] ?>" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">مرفقات مصاريف الاصلاح</span>
              </a>
              <?php } ?><br><br>
              <?php    if($row['fichierElementAchete']=="") {  ?>
          <h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur"> لا يوجد مرفقات المواد المشتراة </h6>
          <?php }else{ ?>
              <a href="../../appompiste/uploads/<?php echo $row['fichierElementAchete'] ?>" name="supprimerPompiste" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--text">مرفقات المواد المشتراة </span>
              </a>
              <?php } ?>
          </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>
</div>
<?php

                                               ;
                                           }
                                       }
                                       
                                       ?>
                
                  
                  
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </div>
      