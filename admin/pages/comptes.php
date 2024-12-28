
      
      
<?php
if (isset($_GET['idGess'])) {
       $idGess = $_GET['idGess'];
       $type='';
       $nom='';
       
       $sqlType = "SELECT type,nom FROM gess WHERE idGess =  $idGess";
       $resultPom = $conn->query($sqlType);
         while ($row = $resultPom->fetch_assoc()) {
             
            $nom=  $row['nom'];
            $type=$row['type'];
       
    }
       
       






    
   $sqlPom = "SELECT email, mdp FROM pompiste WHERE idGess = '$idGess' and directeur=1 ";
$resultPom = $conn->query($sqlPom);
$sqlPompiste = "SELECT email, mdp FROM pompiste WHERE idGess = '$idGess' and directeur=0";

$resultPompiste = $conn->query($sqlPompiste);

if ($type=='منطقة سقوية'){
    $sqlBenefique = "SELECT email, mdp FROM benefique_pi WHERE idGess = $idGess";

    
}
else {
    $sqlBenefique = "SELECT email, mdp FROM benefique_aep WHERE idGess = $idGess";

    
}



$resultBenefique = $conn->query($sqlBenefique);

if ($resultPom && $resultPompiste && $resultBenefique) {
    $pomData = [];
  $pomData = [];
    while ($row = $resultPom->fetch_assoc()) {
        $pomData[] = $row;
    }

    // Fetch data from the 'pompiste' table
    $pompisteData = [];
    while ($row = $resultPompiste->fetch_assoc()) {
        $pompisteData[] = $row;
    }

    // Fetch data from the 'benefique_pi' table
    $benefiqueData = [];
    while ($row = $resultBenefique->fetch_assoc()) {
        $benefiqueData[] = $row;
    }

}

    
    
    
    ?>

  

<?php 
        $selectTab1Query = "SELECT * FROM gess WHERE etat=1 OR etat=2 ORDER BY dateAjout ASC";
        $resultTab1 = $conn->query($selectTab1Query);
       

        $combinedData = array();

        while ($row = $resultTab1->fetch_assoc()) {
            $combinedData[] = $row;
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
                  <h3 class="mb-0">  قائمة   الحسابات المرتبطة بمجمع <?php echo $nom ; ?></h3>
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
                    <th scope="col" style="font-size : 14px"> نوع الحساب </th>
                    <th scope="col" style="font-size : 14px">البريد الإلكتروني</th>
                    <th scope="col" style="font-size : 14px"> كلمة المرور</th>
              
                  
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  
                  foreach ($pomData as $row) {
                      echo "<tr>
                                <td>مدير فني</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mdp']}</td>
                              </tr>";
                    }
                      foreach ($pompisteData as $row) {
                      echo "<tr>
                                <td> حارس نظام مائي</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mdp']}</td>
                              </tr>";
                    }
                      foreach ($benefiqueData as $row) {
                      echo "<tr>
                                <td> منتفعين</td>
                                <td>{$row['email']}</td>
                                <td>{$row['mdp']}</td>
                              </tr>";
                    }
                    
                    
                                      
                                      
                  
                  ?>
                  
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
      
      



      <?php
} else {
  
}
?>

      
      