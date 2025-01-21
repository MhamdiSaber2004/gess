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
                  <a href="index.php?page=documentsReunions&type=9" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              




<div id="printDiv">
    <br><br>
    <small class="d-flex justify-content-start text-black">مجمع التنمية في قطاع الفلاحة و الصيد البحري &nbsp;</small>
    <small class="d-flex d-xxl-flex justify-content-start justify-content-xxl-start text-black" > ب :
      <?php
        echo  $placeGess;
      ?>
      &nbsp;</small>

    <h1 class="d-flex  justify-content-center "><br> كشف عن الوضعية المالية للمجمع  <br><br></h1>
    <small class="d-flex justify-content-start text-black">من الفترة : <input type="text" placeholder="..........................................." style="border:0" name="inp1">الى <input type="text" placeholder="..........................................." style="border:0" name="inp2">  &nbsp;<br></small>

    <table style="border: 1px solid;width:70%">
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;">العناوين</td>
        <td style="border: 1px solid;">المبلغ</td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الصندوق</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp18"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الحساب الجاري</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp21"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الرصيد الجملي في أول السنة</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24"></td>
      </tr>
    </table>
    <br>
    <table style="border: 1px solid;width:70%">
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;" colspan="2">المداخيل (دينار)</td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الانخراطات</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp18" id="in5irat"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الاشتراكات</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp21" id="ichtirak"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">بيع ماء</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="bay3ma"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مداخيل أخرى</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="mada5ilo5ra"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مداخيل مختلفة</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="mada5ilm5talifa"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مجموع المداخيل</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="totalmada5il"></td>
      </tr>
    </table>
    <br>
    <table style="border: 1px solid;width:70%">
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;" colspan="2">>المصاريف (دينار)</td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">شراء ماء</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp18" id="chra2ma"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مصاريف استغلال أخرى</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp21" id="isti8lelma"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">صيانة وإصلاح</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="siyana"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">أجور (مدير فني، عمال)</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="2oujour"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">إدارة وتصرف</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="idara"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مصاريف مختلفة</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="masarifo5ra"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="masarifanchta"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">استشار وتجهيز</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="istichara"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">مجموع المصاريف</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp24" id="totalmasarif"></td>
      </tr>
    </table>
        <br>
        <table style="border: 1px solid;width:70%">
      <tr style="border: 1px solid;">
        <td style="border: 1px solid;" colspan="2">الرصيد الجديد</td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الصندوق</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp18"></td>
      </tr>
      <tr style="border: 1px solid;">
                <td  style="border: 1px solid;">الحساب الجاري</td>
                <td  style="border: 1px solid;"><input type="text" placeholder="..........................................." style="border:0" name="inp21"></td>
      </tr>
    </table>
 
    
</div>


        </div>
 
           
          </div>

</div>

<script>
function printPompiste(areaID){
    window.print();
}

document.getElementById('mada5ilm5talifa').addEventListener("change", function(){
    var deff=parseFloat(document.getElementById('in5irat').value) + parseFloat(document.getElementById('ichtirak').value)+ parseFloat(document.getElementById('bay3ma').value)+ parseFloat(document.getElementById('mada5ilo5ra').value)+parseFloat( document.getElementById('mada5ilm5talifa').value);
    document.getElementById("totalmada5il").value = deff;
})

document.getElementById('istichara').addEventListener("change", function(){
    var deff=parseFloat(document.getElementById('chra2ma').value) + parseFloat(document.getElementById('isti8lelma').value)+ parseFloat(document.getElementById('siyana').value)+ parseFloat(document.getElementById('2oujour').value)+ parseFloat(document.getElementById('idara').value) + parseFloat(document.getElementById('masarifo5ra').value )+ parseFloat(document.getElementById('idara').value )+ parseFloat(document.getElementById('masarifanchta').value)+ parseFloat(document.getElementById('masarifanchta').value);
    document.getElementById("totalmasarif").value = deff;
})

</script>

   