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
<!--                  <a href="#!" data-toggle="modal" data-target="#modal-form" class="btn btn-sm btn-primary">منتفعين اخرين </a> 
 -->
 <a href="index.php?page=ajoutBenefiquePI"  class="btn btn-sm btn-primary">إضافة منتفع  </a> 

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
                <a href="index.php?page=listeAttentePI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفعين قيد الانتظار </span>
                </a><br><br>
                <a href="index.php?page=listeDesactivePI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفعين بحسابات معطلة   </span>
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
           <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <table id="listeBenefique" class=" table  align-items-center table-striped table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">الرمز الاحادي</th>
                    <th scope="col">العدد الرتبي </th>

                    <th scope="col">الاسم و اللقب</th>
                    <th scope="col">المساحة</th>
                    <th scope="col">رقم القطعة</th>
                    <th scope="col">رقم المأخذ</th>
                    <th scope="col">رقم المقسم </th>

                    <th scope="col">رقم العداد</th>

                    <th scope="col">الديون </th>

                    <th scope="col"></th>

                  </tr>
                </thead>
                <tbody>
                <?php
                                       $sql = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1 ";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                            $idBenefique=$row['idBenefique'];


                                            $sql1 = "SELECT * from dette_pi where idBenefique='$idBenefique' ";
                                       $result1 = $conn->query($sql1);
                                       
                                      $row1 = $result1->fetch_assoc();

                                      if ($row['active']==1)
                                      {
                                        $color="green";
                                        $active="مقبول";
                                      }
                                      if ($row['active']==0)
                                      {
                                        $color="yellow";

                                        $active="قيد الانتظار";
                                      }
                                      if ($row['active']==-1)
                                      {
                                        $color="red";

                                        $active="مرفوض";
                                      }

                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idBenefique"] .'
                                               </th>
                                               <td>'
                                               . $row['numBenefique'] .'
                    </td>
                    <td>'
                    . $row['nom'].'
                    </td>
                    <td>'
                    . $row['aire'] .'
                    </td>
                    <td>'
                    . $row['numPlace'] .'
                    </td>
                    <td>'
                    . $row['numPrise'] .'
                    </td>
                    <td>'
                    . $row['numDiviseur'] .'
                    </td>
                    <td>'
                    . $row['numCompteur'] .'
                    </td>
                    <td>'
                    . $row1['dette'] .'
                    </td>
                  
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-black-50"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                   
                        <a class="dropdown-item" href="index.php?page=modifBenefiquePI&idBenefique='.$row["idBenefique"].'">تحيين</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#delete'.$row['idBenefique'].'" href="#">تعطيل الحساب</a>
                        </div>
                      </div>
                    </td>
                    </tr>


                    <div class="row">

<div class="col-md-6">
    <div class="modal fade" id="delete'.$row['idBenefique'].'" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 ">
  <div class="card-header bg-transparent pb-2">
      <h3 class=" text-center mt-2">تعطيل حساب منتفع ؟</h3><br>
      <div class="text-center mb-4">هل أنت متأكد أنك تريد تعطيل حساب المنتفع ؟ <br><br>  صاحب ب.ت.و. : '.$row['CIN'].' <br> صاحب العداد :  '.$row['numCompteur'].'</div>
        
    
          
        
      
  </div>
 
</div>
<div class="modal-footer flex-row-reverse">
<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
<a href="controller/controller.php?idBenefiquePI='.$row['idBenefique'].'" name="deleteBenefiquePI" type="submit" onclick=" return checkInputsConsommation()"  class="btn btn-primary" >تعطيل </a>
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
      