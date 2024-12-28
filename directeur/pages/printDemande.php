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
     
            <div class="col-xl-12 order-xl-1">
          <div class="card bg-white shadow">
    
            <div class="card-header bg-secondary border-0">
              <div class="row align-items-center">
                <div class="col-8">
                <button  onclick="print('printDiv')" class="btn btn-sm btn-primary">طباعة </button> 
                </div>
                <div class="col-4 text-right">
                               <a href="index.php?page=listeDemandes" class="btn btn-sm btn-primary">رجوع </a> 
                  </div>
              </div>
            </div>
            <div class="card-body">
              
<?php 

$sql1 = "SELECT * FROM etats_tunisie inner join gess on gess.etat_tunisie=etats_tunisie.id and idGess='$idGess'";
$result1 = $conn->query($sql1);
$etat = $result1->fetch_assoc() ;




if(isset($_GET['idDemande']) && ! empty ( $_GET['idDemande'] ))
{
    $idDemande=$_GET['idDemande'];
    $sql = "SELECT * FROM demandes where idDemande=$idDemande";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each demande
        $demande = $result->fetch_assoc() ;
        print_r($demande);

        $idBenefique=$demande['idBenefique'];


        $sql1 = "SELECT * FROM benefique_aep where idBenefique=".$demande["idBenefique"];
        $result1 = $conn->query($sql1);
        
        if ($result1->num_rows == 0) 
        {
         $sql1 = "SELECT * FROM benefique_pi where idBenefique=".$demande["idBenefique"];
         $result1 = $conn->query($sql1);
         
         if ($result1->num_rows > 0)
         $row1 = $result1->fetch_assoc();
        
        }
        else

        {
         $row1 = $result1->fetch_assoc();
        }
    
            
?>



<div class="no-print" id="printDiv">
    <br><br>
    <p class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري   &nbsp;</p>
    <p class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :  <?php  echo $etat['nom_etat'] ?>&nbsp;</p>

    <h1 class="d-flex d-xxl-flex justify-content-center justify-content-xxl-center"><br>قرار قبول الانخراط<br><br></h1>
    <p class="d-flex justify-content-start text-black"> إن مجلس الإدارة مجمع التنمية في قطاع الفلاحة و الصيد البحري  ب :   <?php  echo $etat['nom_etat'] ?> &nbsp;<br></p>

    <p class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" ><strong></strong>&nbsp; المجتمع بتاريخ   : &nbsp;<strong><?php echo $demande['dateConseil'];  ?></strong>&nbsp;<br></p>
    <p class="d-xxl-flex justify-content-xxl-start text-black" ></p>

    <p class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp; بعد الاطلاع على  : &nbsp;<strong><?php echo $demande['dateN'];  ?></strong>&nbsp;<br></p>

    <p class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- القانون الأساسي للمجمع و خاصة فصوله المتعلقة بقبول منخرطين جدد  : <br></p>
    <p class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- النظام الداخلي للمجمع : <br></p>
    <p class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- طلب الانخراط المقدم بتاريخ    : <span><strong class="bold"><?php echo substr($demande['dateCreationDemande'], 0,10) ?></strong></span> <br></p>
    <p class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-صاحب بطاقات التعريف الوطنية عدد  : <span><strong class="bold"><?php if(strlen($row1['CIN'])<8) echo '0'.$row1['CIN']; else echo $row1['CIN'];  ?></strong></span><br></p>
    <p class="d-xxl-flex justify-content-xxl-start text-black" ></p>
    <p class="d-xxl-flex justify-content-xxl-start text-black" >قرر ما يلي : </p>
    <p class="d-xxl-flex justify-content-xxl-start text-black" >أولاً : قبول طلب إنخرط وترسيم السيد : <span><strong class="bold"><?php  echo $row1['nom'];  ?></strong></span>&nbsp; في سجل المنخرطين إبتداءً من تاريخ : &nbsp; <span><strong class="bold"><?php  echo $demande['dateAcceptation'];  ?></strong></span>&nbsp; تحت عدد    : &nbsp; <span><strong class="bold"><?php  echo $demande['idDemande'];  ?></strong></span></p>



<br>

    <div class="container text-center text-black">
        <div class="demande">
          <div class="col">
            <br><br>
            
          </div>
          <div class="col">
            
          </div>
          <strong class="col">
            ...................... في ...................... 
            <br><br>
            <strong class="bold">رئيس مجلس إدارة المجمع</strong>
          </strong>
        </div>
      </div>

    
</div>



<?php  

        }
    
}

?>


        </div>
 
           
          </div>


          <script>
function print(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

   