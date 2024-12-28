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
                  <h3 class="mb-0">مراقبة و صيانة التجهيزات</h3>
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
                  <th scope="col">عملية التدخل /التصليح </th>
                  <th scope="col">المتدخل</th>
                  <th scope="col">التكلفة و المرفق </th>
                  <th scope="col">التاريخ</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php


                                       $sql = "SELECT * FROM fix where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {


                                     
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["numFix"] .'
                                               </th>
                                               <td>'
                                               . $row['personne'] .'
                    </td>
                    <td>'
                    . $row['prix'] .'
                    </td>
                    <td>'
                    . $row['dateFix'] .'
                    </td>
                   
                    
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifier'.$row['idF'].'">تحيين</a>
                          <a class="dropdown-item" href="controller/controller.php?idFixSupprimer='.$row['idF'].'">حذف</a>
                        </div>
                      </div>
                    </td>
                    </tr>



                    
      <div class="col-md-6">
      <div class="modal fade" id="modifier'.$row['idF'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          
            <div class="modal-body p-0">
            <form method="post" action="controller/controller.php">
  <div class="card bg-secondary border-0 mb-0">
    <div class="card-header bg-transparent pb-5">
        <h3 class=" text-center mt-2">مراقبة و صيانة التجهيزات</h3><br>
        <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
          
            <div class="btn-wrapper text-center">
            <div class="col-lg-12">
                        <div class="form-group">
                          <input type="number" name="idF"  id="numConsomme" class="form-control form-control-alternative" placeholder=" عملية التدخل /التصليح " value="'.$row['idF'].'" hidden required>
                          
                        </div>
                      </div>
                      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country"> عملية التدخل /التصليح </label>
                        <input type="number" name="numFix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" عملية التدخل /التصليح " value="'.$row['numFix'].'" required>
                        
                      </div>
                    </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> المتدخل </label>
                          <input type="text" name="personne"  id="numConsomme" class="form-control form-control-alternative" placeholder=" المتدخل " value="'.$row['personne'].'" required>
                          
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> التكلفة و المرفق </label>
                          <input type="number" name="prix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" التكلفة و المرفق " value="'.$row['prix'].'" required>
                          
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> التاريخ </label>
                          <input type="date" name="dateFix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" التاريخ " value="'.$row['dateFix'].'" required>
                          
                        </div>
                      </div>
            </div>
          
        
    </div>
   
  </div>
    
            </div>
            <div class="modal-footer flex-row-reverse">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                    <button type="submit"class="btn btn-primary" name="modifierFix" >متابعة</button>
                                    
                                    </div>
  </form>
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
      

      <div class="col-md-6">
    <div class="modal fade" id="ajoutFix" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">

          <div class="modal-body p-0">
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">مراقبة و صيانة التجهيزات</h3><br>
      <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
        
          <div class="btn-wrapper text-center">
          <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country"> عملية التدخل /التصليح </label>
                        <input type="number" name="numFix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" عملية التدخل /التصليح " required>
                        
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country"> المتدخل </label>
                        <input type="text" name="personne"  id="numConsomme" class="form-control form-control-alternative" placeholder=" المتدخل " required>
                        
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country"> التكلفة و المرفق </label>
                        <input type="number" name="prix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" التكلفة و المرفق " required>
                        
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country"> التاريخ </label>
                        <input type="date" name="dateFix"  id="numConsomme" class="form-control form-control-alternative" placeholder=" التاريخ " required>
                        
                      </div>
                    </div>
          </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="ajoutFix" >متابعة</button>
                                  
                                  </div>
</form>
      </div>
  </div>
</div>

</div>