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
                  <h3 class="mb-0"><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listePompiste" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              




<div class="no-print" id="printDiv">
    <br><br>
    <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري &nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :&nbsp;</small>

    <h1 class="d-flex  justify-content-center "><br>إعلان عن الجلسة العامة<br><br></h1>
    <small class="d-flex justify-content-start text-black">يعلن مجلس إدارة مجمع التنمية في قطاع الفلاحة و الصيد البحري بــــ: ...........................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">أن الجلسة العامة :.................. للمجمع ، ستنعقد يوم :<input type="text" placeholder="...................">، على الساعة :......................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">بــ: ............................  &nbsp;<br></small><br>
    <small class="d-flex justify-content-start text-black"> <bold>وذلك للنظر في المواضيع التالية :</bold>  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">- .............................................................................................................................................................................................................................  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black"><br>  &nbsp;<br></small>
    <small class="d-flex justify-content-start text-black">يعتبر هذا الإعلان استدعاء شخصيا لجميع المنخرطين المرسمين بصورة قانونية بدفتر الانخراطات بتاريخ هذا اليوم  &nbsp;<br></small>

    <p class="d-xxl-flex justify-content-xxl-start text-black" ></p>

    <div class="container text-center text-black">
        <div class="row">
          <div class="col">
     
          </div>
          <div class="col">
          رئيس مجلس الإدارة <br>_____________
          </div>
          <strong class="col">
       
          </strong>
        </div>
      </div>
      <br>
      <small class="d-flex justify-content-start text-black"> <img src="assets/img/reunion/reunionPublique.png" alt="" style="width:70%;">  &nbsp;<br></small>

   
    
</div>






        </div>
 
           
          </div>


          <script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

   