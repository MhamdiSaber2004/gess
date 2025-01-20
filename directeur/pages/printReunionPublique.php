  <?php
if(isset($post['inp1'])){
  $inp1=$post['inp1'];
  $inp2=$post['inp2'];
  $inp3=$post['inp3'];
  $inp4=$post['inp4'];
  $inp5=$post['inp5'];
  $inp6=$post['inp6'];
  $inp7=$post['inp7'];
  $inp8=$post['inp8'];
  $inp9=$post['inp9'];
  $inp10=$post['inp10'];
  $inp11=$post['inp11'];
  $inp12=$post['inp12'];
  $inp13=$post['inp13'];
  $inp14=$post['inp14'];
  $inp15=$post['inp15'];
  $inp16=$post['inp16'];

  




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
              <form action="">
                <div class="no-print" id="printDiv">
                  <br><br>
                  <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري &nbsp;</small>
                  <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :
                    <?php

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
                <button type="submit" id="submitButton" class=" no-print btn btn-primary my-4 col-12">حفظ</button>
              </form>
            </div>
          </div>


          <script>
function printPompiste(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>

   