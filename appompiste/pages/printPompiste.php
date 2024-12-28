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
              
<?php 


if(isset($_GET['id']) && ! empty ( $_GET['id'] ))
{
    $id=$_GET['id'];
    $sql = "SELECT * FROM pompiste where id=$id";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
?>



<div class="no-print" id="printDiv">
    <br><br>
    <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري للماء الصالح للشراب&nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :&nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp; المعتمدية : &nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp; الولاية : &nbsp;</small>

    <h1 class="d-flex d-xxl-flex justify-content-center justify-content-xxl-center"><br>إتفاقية حراسة و تصرف في حنفية / مزود صهاريج<br><br></h1>
    <small class="d-flex justify-content-start text-black">إني الممضي أسفله&nbsp;<br></small>
    <p class="d-xxl-flex justify-content-xxl-start text-black" ></p>

    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" ><strong></strong>&nbsp; الإسم و اللقب : &nbsp;<strong><?php echo $row['nom'];  ?></strong>&nbsp;<br></small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp; تاريخ الولادة : &nbsp;<strong><?php echo $row['dateN'];  ?></strong>&nbsp;<br></small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">صاحب بطاقات التعريف الوطنية عدد : &nbsp;<strong><?php echo $row['CIN'];  ?></strong>&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">مسلمة في : &nbsp;<strong><?php echo $row['dateCIN'];  ?></strong></span><br></small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">الحالة العائلية : &nbsp;<strong><?php echo $row['famille'];  ?></strong></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">المهنة : &nbsp;<strong><?php echo $row['travail'];  ?></strong></span></small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > العنوان : &nbsp;<strong><?php echo $row['address'];  ?></strong>&nbsp;<br></small>
    <br>
    <strong class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black">&nbsp;: الفصل الأول : يلتزم الحارس المتصرف ب</strong><br>
    
    <small class="d-flex justify-content-start text-black"><span>  1) </span> حراسة : - الحنفية عدد : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الكائنة ب:</small>
    <small class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- الحنفية عدد : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الكائنة ب:<br></small>
    <small class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- الحنفية عدد : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الكائنة ب:<br></small>
    <small class="d-flex justify-content-start text-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- مزود الصهاريج عدد   : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الكائن ب:<br></small>
    <small class="d-flex justify-content-sm-start text-black">و تسييرها و تعهدها و حماية تجهيزاتها من التلف و التلوث و العمل على الإقتصاد في الماء و عدم تبذيره.</small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);"><span>2) </span>تزويد المنتفعين التابعين لنقطة أو لنقاط التوزيع المذكورة أعلاه بالماء حسب الأوقات التي يضبطها المجمع.</small>
    <small class="d-flex justify-content-start text-black"><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);"><span>3) </span> تطبيق تسعيرة بيع الماء التي يضبطها المجمع.<br></small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);"><span>4) </span> محاسبة أمين مال المجمع حسب التراتيب التي يضبطها المجمع ومده بمحاصيل بيع الماء في المواعيد المحددة&nbsp;</span><br></small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);"><span>5) </span>  أن أقوم بهذا العمل&nbsp;</span><br></small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="return false;" <?php if  ($row['payement']=="مقابل منحة شهرية") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   مقابل منحة شهرية يضبطها المجمع</span><br></small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="return false;" <?php if  ($row['payement']=="مقابل نسبة من المداخيل") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   مقابل نسبة مئوية عن مداخيل نقاط التزويد بالماء المذكورة أعلاه قدرها</span><br></small>
    <small class="d-flex justify-content-start text-black"><br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="return false;" <?php if  ($row['payement']=="من دون مقابل") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   بصفة تطوعية وبدون أي مقابل</span><br></small>
    <br>
    <strong class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;: ألفصل الثاني </strong><br>

    <small class="d-flex d-xxl-flex justify-content-xxl-start text-black" >.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">يلتزم المجمع بإعلام المنتفعين بأوقات وطريقة توزيع الماء على مستوى نقاط التوزيع ( الحنفيات والصهاريج ) وثمن بيع الماء</span><br></small>
    <br>
    <strong class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;: ألفصل الثالث </strong><br>
    
    <small class="text-end d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">في صورة حدوث عطب على تجهيزات نقطة التزود بالماء، يجب على الحارس المتصرف التوقف عن توزيع الماء واعلموا مجلس إدارة المجمع في الحال</span><br></small>
    <br>
    <strong class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;: ألفصل الرابع </strong><br>
    
    <small class="text-end d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" >&nbsp;.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">هذه الاتفاقية صالحة لمدة سنة قابلة للتجديد ويكن الغائها في حالة عدم إلتزام الطرفين بما جاء فيها، ولا يعفي الغاؤها أي طرف من الالتزامات السابقة له</span><br></small>
    
<br>

    <div class="container text-center text-black">
        <div class="row">
          <div class="col">
            <br><br>
            <strong>الحارس المتصرف</strong><br>
            <strong>( الامضاء معرف به )</strong>
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
}

?>


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

   