  <!-- Main content -->
  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8 no-print">
      <div class="container-fluid">
        <div class="header-body">
         
        </div>
      </div>
    </div>
    <!-- Page content -->

    <div class="container-fluid mt--7">
      <!-- table -->
     
      <div class="col-xl-12 order-xl-1">
          <div class="card bg-white shadow ">
            <div class="card-header bg-secondary border-0v  ">
              <div class="row align-items-center no-print">
                <div class="col-8">
                  <h3 class="mb-0"><button onclick="printPompiste('printDiv')" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=documentsReunions&type=1" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="index.php?page=printReuinionPublique">
                <div id="printDiv">
                  <br><br>
                  <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري &nbsp;</small>
                  <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :
                    <?php
                      echo  $placeGess;
                    ?>
                  &nbsp;</small>

                  <h1 class="d-flex  justify-content-center "><br>إعلان عن الجلسة العامة<br><br></h1>
                  <small class="d-flex justify-content-start text-black">يعلن مجلس إدارة مجمع التنمية في قطاع الفلاحة و الصيد البحري بــــ: <input type="text" placeholder="..........................................." style="border:0" name="inp1">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">أن الجلسة العامة :<input type="text" placeholder="..........................................." style="border:0" name="inp2"> للمجمع ، ستنعقد يوم :<input type="text" placeholder=".........................................................." style="border:0" name="inp3">، على الساعة :<input type="text" placeholder="......................" style="border:0" name="inp4">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">بــ: <input type="text" placeholder="..........................................." style="border:0" name="inp5">  &nbsp;<br></small><br>
                  <small class="d-flex justify-content-start text-black"> <bold>وذلك للنظر في المواضيع التالية :</bold>  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp6">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp7">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp8">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp9">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp10">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp11">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp12">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp13">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp14">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp15">  &nbsp;<br></small>
                  <small class="d-flex justify-content-start text-black">- <input type="text" placeholder="............................................................................................................................................................................................................................." style="border:0; width:96%;" name="inp16">  &nbsp;<br></small>
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
              </form>
            </div>
          </div>
          
<script>
function printPompiste(areaID){

    window.print();
}
</script>

   