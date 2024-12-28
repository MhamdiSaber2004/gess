<?php 
        $selectTab1Query = "SELECT * FROM gess WHERE etat=1 OR etat=2 ORDER BY dateAjout ASC";
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
        function getEtat($x){
            if ($x==1){
                return "<span style='color:green'>نشط</span>" ;
            }
            else if ($x==2){
                return "<span style='color:red'>معطَّل</span>" ;
                
            }
            return "";
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
                  <h3 class="mb-0"> قائمة المجامع</h3>
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
                      <th scope="col" style="font-size : 14px">النوع</th>
                    <th scope="col" style="font-size : 14px">البريد الإلكتروني</th>
                    <th scope="col" style="font-size : 14px"> كلمة المرور</th>
                          <th scope="col" style="font-size : 14px">   حالة الحساب</th>
                    <th scope="col" style="font-size : 14px">الولاية</th>
                    <th scope="col" style="font-size : 14px"> العمادة</th>
                    <th scope="col" style="font-size : 14px">المعلومات</th>
              
                     <th>الحسابات المرتبطة</th>
                           <th>الحالة</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($combinedData as $row): ?>
                
        <tr>
            <td><?php echo $row['nom']; ?></td>
               <td><?php echo $row['type']; ?></td>
               <?php 
               $vId=$row['idGess'];
                $selectQuery1 = "SELECT * FROM utilisateurs WHERE idGess=$vId";
        $resultt = $conn->query($selectQuery1);
       


        while ($row4 = $resultt->fetch_assoc()) {
            echo " <td>".$row4['email_utilisateur']."</td>
            <td>".$row4['mdp']."</td> ";
           
        }
               
               ?>
           
           <td><?php echo getEtat( $row['etat']) ?></td>
            <td><?php echo getNomEtat($row['etat_tunisie'], $conn); ?></td>
            <td><?php echo $row['decanat']; ?></td>
            <td> <a href="<?php echo getUrl($row['type']).$row['idGess']?>"  class='btn btn-sm btn-primary'>التفاصيل </a></td>
<td> <a  class="btn btn-sm btn-primary" href="index.php?page=comptes&idGess=<?php echo $row['idGess'] ?>">الحسابات  </a></td>
          <?php  echo ($row['etat'] == 1) ? " <td> <a href='index.php?page=list&changeEtat=".$row['idGess']."&etat=".$row['etat']."' style='background-color:red' class='btn btn-sm btn-primary'>تعطيل الحساب </a></td>"
          :"<td> <a href='index.php?page=list&changeEtat=".$row['idGess']."&etat=".$row['etat']."' style='background-color:green' class='btn btn-sm btn-primary'>تنشيط الحساب </a></td>"; ?>
        </tr>
        <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </div>
      
      
      <?php 
      
      if (isset($_GET['changeEtat']) && !empty($_GET['changeEtat']) ){
          $idGessEtat=$_GET['changeEtat'];
           $etat=$_GET['etat'];
          if ($etat == 1) {
            $newEtat = 2;
        } elseif ($etat == 2) {
            $newEtat = 1;
        } else {
            $newEtat = $etat;
        }
        
        $sql = "UPDATE gess SET etat = $newEtat WHERE idGess= $idGessEtat";
        $stmt = $conn->prepare($sql);
     

        $stmt->execute();
        
       echo "<script>window.location.href = 'index.php?page=list'</script>";
      
                  
          
          
      }
      
      
      ?>
      
      