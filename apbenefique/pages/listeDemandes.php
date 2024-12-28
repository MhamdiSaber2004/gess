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
                  <h3 class="mb-0">قائمة مطالب الترشح</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=demande" class="btn btn-sm btn-primary">مطلب ترشح جديد</a>
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
                    <th scope="col">نوع المطلب</th>
                    <th scope="col">تاريخ المجلس</th>
                    <th scope="col">تاريخ كتابة المطلب</th>
                    <th scope="col">النتيجة</th>
                    <!--<th scope="col">طباعة المطلب</th>-->
                  </tr>
                </thead>
                <tbody>
                <?php
                $idBenefique=$_SESSION['idBenefique'];
                                       $sql = "SELECT * FROM demandes where idBenefique='$idBenefique'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {


                                          
                                               echo '
                                               <tr>
                                               <th scope="row">'
                                               . $row["idDemande"] .'
                                               </th>
                               
                    <td>'
                    . $row['typeDemande'].'
                    </td>
                    <td>'
                    . $row['dateConseil'] .'
                    </td>
                    <td>'
                    . substr($row['dateCreationDemande'], 0,10) .'
                    </td>
                    <td>'
                    . $row['resultat'] .'
                    </td>
                    <!-- <td>
                    <a class="dropdown-item" href="print/demande">طباعة</a>
                    </td>-->
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
      