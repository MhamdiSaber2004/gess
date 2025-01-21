
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
            <div class="card-header bg-secondary border-0 no-print">
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
                <div id="printDiv">
                    <br><br>
                    <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري &nbsp;</small>
                    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :&nbsp;</small>

                    <h1 class="d-flex   "><br>إستدعاء للجلسة العامة<br><br></h1>
                    <small class="d-flex justify-content-start text-black">      الى السيد : <input type="text" placeholder="..........................................." style="border:0"> رقم بطاقة الانخراط  <input type="text" placeholder="..........................................." style="border:0">&nbsp;<br></small>
                    <h4 class="d-flex">الموضوع : استدعاء للجلسة العامة</h4>
                    <h4 class="d-flex">المصاحيب: جدول أعمال الجلسة العام</h4>
                    <h4 class="d-flex">و بعد،</h4>
                    <small class="d-flex justify-content-start text-black">يتشرف مجلس إدارة المجمع التنمية في قطاع الفلاحة و الصيد البحري بـ: <input type="text" placeholder="..............................................." style="border:0"> باستدعاكم لحضور الجلسة &nbsp;<br></small><br>
                    <small class="d-flex justify-content-start text"> العامة<input type="text" placeholder="............................................" style="border:0"> التي ستنعقد يوم <input type="text" placeholder=".........................................." style="border:0">على الساعة <input type="text" placeholder="......................................." style="border:0"> &nbsp;<br><br></small>
                    <small class="d-flex justify-content-start text"> بـ<input type="text" placeholder="............................................" style="border:0"> ونظرا للأهمية البالغة التي تكتسيها هذه الجلسة فان حضوركم متأكد جدا. &nbsp; <br><br> </small>
                    
                    
                    <p class="d-xxl-flex justify-content-xxl-start text-black" ></p>

                    <div class="container text-center text-black">
                        <div class="row">
                            <div class="col-4">
                            
                            </div>
                            <div class="col-8">
                                <input type="text" placeholder="............................................" style="border:0">  في  <input type="text" placeholder="............................................" style="border:0"><br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" >
                            
                            </div>
                            <div class="col">
                                رئيس مجلس الإدارة <br>_____________
                            </div>
                            <div class="col">
                            
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="border: 2px solid black; border-radius: 22px; margin-bottom: 15px;">
                        <small class="d-flex">يمكنكم تقديم ترشحكم لعضوية مجلس إدارة المجمع أو لجنة المراقبة الداخلية عن طريق<br></small>
                        <small class="d-flex"> رسالة مضمونة الوصول مع الاعلام قبل يوم <input type="text" placeholder="................................." style="border:0"> كما يمكنكم الاطلاع على<br></small>
                        <small class="d-flex   ">  تقارير مجلس اإلدارة والموازنة المالية لسنة <input type="text" placeholder="................................." style="border:0"> ابتداء من يوم <br></small>
                        <small class="d-flex   "><input type="text" placeholder="................................." style="border:0"> وذلك بمقر المجمع الكائن ب   <input type="text" placeholder="................................." style="border:0"><br></small>
                    </div>

                    <div style="border: 2px solid black; border-radius: 22px; margin-bottom: 15px;">
                        <small class="d-flex   ">اني الممضي اسفله <input type="text" placeholder="................................." style="border:0"> أشهد بأني اتصلت يوم <input type="text" placeholder="................................." style="border:0">بالاستدعاء وبجدول<br></small>
                        <small class="d-flex   "> أعمال الجلسة العامة التي ستنعقد يوم <input type="text" placeholder="................................." style="border:0"> كما يمكنكم الاطلاع على<br></small>
                        <small class="d-flex   ">  تقارير مجلس اإلدارة والموازنة المالية لسنة <input type="text" placeholder="................................." style="border:0"> على الساعة <input type="text" placeholder="................................." style="border:0"> بـ<input type="text" placeholder="................................." style="border:0"><br></small><br>
                        <small class="d-flex   "><h4>الامضاء</h4><span style="margin-left: 30%;"></span><input type="text" placeholder="................................." style="border:0"> في  <input type="text" placeholder="................................." style="border:0"><br></small>
                    </div>
                </div>
            </div>           
        </div>
<script>
function printPompiste(areaID){
    window.print();
}
</script>
