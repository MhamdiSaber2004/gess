
<?php 

include_once "../db/db.php";

if(isset($_GET['id']) && ! empty ( $_GET['id'] ))
{
    $id=$_GET['id'];
    $sql = "SELECT * FROM pompiste where idPompiste=$id";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>&nbsp;</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin-bottom: 0;  /* this affects the margin in the printer settings */
    margin-top:0px;
}
</style>

</head>

<body>
    <br><br>
    <small class="d-flex justify-content-end">مجمع التنمية في قطاع الفلاحة و الصيد البحري للماء الصالح للشراب&nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">: ب&nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: المعتمدية&nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: الولاية&nbsp;</small>

    <h3 class="d-flex d-xxl-flex justify-content-center justify-content-xxl-center"><br>إتفاقية حراسة و تصرف في حنفية / مزود صهاريج<br><br></h3>
    <small class="d-flex justify-content-end">إني الممضي أسفله&nbsp;<br></small>
    <p class="d-xxl-flex justify-content-xxl-end"></p>
    <small class="d-xxl-flex justify-content-xxl-end"></small>
    <small class="d-xxl-flex justify-content-xxl-end"></small>
    <small class="d-xxl-flex justify-content-xxl-end"></small>
    <small class="d-xxl-flex justify-content-xxl-end"></small>
    <small class="d-xxl-flex justify-content-xxl-end"></small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end"><strong><?php echo $row['nom'];  ?></strong>&nbsp;: الإسم و اللقب&nbsp;<br></small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end"><strong><?php echo $row['dateN'];  ?></strong>&nbsp;: تاريخ الولادة&nbsp;<br></small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end"><strong><?php echo $row['dateCIN'];  ?></strong>&nbsp; :&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">مسلمة في</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong><?php echo $row['CIN'];  ?></strong>&nbsp;&nbsp;:&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">صاحب بطاقات التعريف الوطنية عدد&nbsp;</span><br></small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end"><strong><?php echo $row['travail'];  ?></strong>&nbsp;:&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">المهنة</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong><?php echo $row['famille'];  ?></strong> &nbsp; &nbsp; &nbsp; :&nbsp;<span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">الحالة العائلية</span></small>
    <small class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end"><strong><?php echo $row['address'];  ?></strong>&nbsp;: العنوان&nbsp;<br></small>
    
    <strong class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: الفصل الأول : يلتزم الحارس المتصرف ب</strong>
    
    <small class="d-flex justify-content-end">&nbsp;: حراسة : - الحنفية عدد :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;الكائنة ب&nbsp;<span>(1</span></small>
    <small class="d-flex justify-content-end">&nbsp;: الحنفية عدد :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;الكائنة ب -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br></small>
    <small class="d-flex justify-content-end">&nbsp;: الحنفية عدد :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;الكائنة ب -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br></small>
    <small class="d-flex justify-content-end">&nbsp;: مزود الصهاريج عدد :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;الكائن ب -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br></small>
    <small class="d-sm-flex justify-content-sm-end">.و تسييرها و تعهدها و حماية تجهيزاتها من التلف و التلوث و العمل على الإقتصاد في الماء و عدم تبذيره</small>
    <small class="d-flex justify-content-end">.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">لنقطة أو لنقاط التوزيع المذكورة أعلاه بالماء حسب الأوقات التي يضبطها المجمع&nbsp;</span>تزويد المنتفعين التابعين&nbsp;<span> (2 </span></small>
    <small class="d-flex justify-content-end"><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">. تطبيق تسعيرة بيع الماء التي يضبطها المجمع</span><span> (3 </span><br></small>
    <small class="d-flex justify-content-end">&nbsp;.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">محاسبة أمين مال المجمع حسب التراتيب التي يضبطها المجمع ومده بمحاصيل بيع الماء في المواعيد المحددة&nbsp;</span><span> (4 </span><br></small>
    <small class="d-flex justify-content-end">&nbsp;:&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">أن أقوم بهذا العمل&nbsp;</span><span> (5 </span><br></small>
    <small class="d-flex justify-content-end">&nbsp;.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">مقابل منحة شهرية يضبطها المجمع&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" <?php if  ($row['payement']=="مقابل منحة شهرية") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br></small>
    <small class="d-flex justify-content-end">&nbsp;%&nbsp; &nbsp; &nbsp; :&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">مقابل نسبة مئوية عن مداخيل نقاط التزويد بالماء المذكورة أعلاه قدرها&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" <?php if  ($row['payement']=="مقابل نسبة من المداخيل") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br></small>
    <small class="d-flex justify-content-end">.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">بصفة تطوعية وبدون أي مقابل&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" <?php if  ($row['payement']=="من دون مقابل") echo "checked";  ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br></small>
    
    <strong class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: ألفصل الثاني </strong>

    <small class="text-center d-xxl-flex justify-content-xxl-end">.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">يلتزم المجمع بإعلام المنتفعين بأوقات وطريقة توزيع الماء على مستوى نقاط التوزيع ( الحنفيات والصهاريج ) وثمن بيع الماء</span><br></small>
    
    <strong class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: ألفصل الثالث </strong>
    
    <small class="text-end d-flex d-xxl-flex justify-content-end justify-content-xxl-end">.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">في صورة حدوث عطب على تجهيزات نقطة التزود بالماء، يجب على الحارس المتصرف التوقف عن توزيع الماء واعلموا مجلس إدارة المجمع في الحال</span><br></small>
    
    <strong class="d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;: ألفصل الرابع </strong>
    
    <small class="text-end d-flex d-xxl-flex justify-content-end justify-content-xxl-end">&nbsp;.&nbsp;<br><span style="color: rgb(0, 0, 0); background-color: rgb(253, 253, 253);">هذه الاتفاقية صالحة لمدة سنة قابلة للتجديد ويكن الغائها في حالة عدم إلتزام الطرفين بما جاء فيها، ولا يعفي الغاؤها أي طرف من الالتزامات السابقة له</span><br></small>
    
<br>

    <div class="container text-center">
        <div class="row">
          <strong class="col">
            ...................... في ...................... 
            <br><br>
            <strong class="bold">رئيس مجلس إدارة المجمع</strong>
          </strong>
          <div class="col">
            
          </div>
          <div class="col">
            <br>
            <strong>الحارس المتصرف</strong><br>
            <strong>( الامضاء معرف به )</strong>
          </div>
        </div>
      </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>


<?php  

        }
    }
}

?>

