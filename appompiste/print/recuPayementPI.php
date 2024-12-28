              
<?php 



if(isset($_GET['idPayement']) && ! empty ( $_GET['idPayement'] ))
{
    $idPayement=$_GET['idPayement'];
    $sql = "SELECT * FROM archive_payement_pi where idPayement=$idPayement";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        while ($archive_payement_pi = $result->fetch_assoc()) {

            $sql = "SELECT * FROM benefique_pi where idBenefique=".$archive_payement_pi['idBenefique'];
            $benefiqueRow = $conn->query($sql)->fetch_assoc();


            $sql = "SELECT * FROM pompiste where idPompiste=".$archive_payement_pi['idPompiste'];
            $pompisteRow = $conn->query($sql)->fetch_assoc();


            $sql = "SELECT * FROM gess where idGess=".$archive_payement_pi['idGess'];
            $gessRow = $conn->query($sql)->fetch_assoc();






            
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
     
            <div class="table-responsive">
            <div class="col-xl-12 order-xl-1">
          <div class="card bg-white shadow">
          <div class="card-header bg-secondary border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=payementPI" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body" class="no-print" id="printDiv">
            <div class="container"><br>
    <div class="row" >
        <div class="col-12 textee" style="text-align: left;">ملحق عدد 5</div>
    </div><br>
    <div class="row">
        <div class="col-12 textee">
            مجمع التنمية في قطاع الفلاحة و الصيد البحري <br><br>
            للري ب : <?php echo $gessRow['accreditation'] ?>
        </div>
    </div>
    <br><br><br><br>
    <h2 class="textee" style="text-align: center;font-size: 35px;">وصل</h2><br>
    <div class="row">

        <div class="col-12 textee" style="text-align: center;">
            عدد : <?php echo $archive_payement_pi['idPayement'] ?>
        </div>
    </div><br><br><br>
    <div class="row">
        <div class="col-12 textee"> إني الممضي أسفله : <?php echo $pompisteRow['nom'] ?> </div>
    </div><br>
    <div class="row">
        <div class="col-12 textee"> توصلت من السيد : <?php echo $benefiqueRow['nom'] ?> ,  بمبلغ : <?php echo $archive_payement_pi['montantPaye'] ?> دت</div>
    </div><br>
    <div class="row">
        <div class="col-12 textee"> مقابل : ........................................................................ ساعات ماء, .................................................................... م3</div>
    </div>
    <br>

    <br><br>
    <div class="row">
    <div class="col1"></div>

        <div class="col-5"><br><br>حارس النظام المائي</div>
        <div class="col-4 textee">.................... في ........................ <br><br>  رئيس مجلس الإدارة </div>

    </div>
    <br><br>

</div>

            </div>
          </div>
        </div>
 
           
          </div>
        </div>

<?php } }  }  ?>


        <script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>