  <?php 
        $selectTab1Query = "SELECT * FROM gess WHERE etat=0 ORDER BY dateAjout ASC";
        $resultTab1 = $conn->query($selectTab1Query);
       

        $combinedData = array();

        while ($row = $resultTab1->fetch_assoc()) {
            $combinedData[] = $row;
        }

        

        function getNomEtat($id, $conn){
          $id = $conn->real_escape_string($id);

          // SQL query to retrieve nom_etat
          $sql = "SELECT nom_etat FROM etats_tunisie WHERE id = $id";
          
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              return $row['nom_etat'];
          } else {
              return "No matching record found.";
          }
        
        }
        function getUrl($type){
          
          if($type == "منطقة سقوية"){
            return "pages/info.php?id=";

          }
          else {
            return "pages/infoaep.php?id=";

          }
        }


?>
  
  
  
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
                  <h3 class="mb-0"> قائمة الطلبات</h3>
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
                    <th scope="col" style="font-size : 14px"> اسم المجمع</th>
                    <th scope="col" style="font-size : 14px">تاريخ الطلب</th>
                    <th scope="col" style="font-size : 14px">النوع</th>
                    <th scope="col" style="font-size : 14px">الولاية</th>
                    <th scope="col" style="font-size : 14px"> العمادة</th>
                    <th scope="col" style="font-size : 14px">المعلومات</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($combinedData as $row): ?>
        <tr>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['dateAjout']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo getNomEtat($row['etat_tunisie'], $conn); ?></td>
            <td><?php echo $row['decanat']; ?></td>
            <td> <a href="<?php echo getUrl($row['type']).$row['idGess']?>"  class='btn btn-sm btn-primary'>التفاصيل </a></td> 
        </tr>
        <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </div>
      