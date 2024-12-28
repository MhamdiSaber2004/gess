
<?php 

$year = date("Y");

$sql="SELECT * FROM `rapport_financier` where idGess='$idGess' and annee='$year'";
$result = $conn->query($sql);
   
if ($result->num_rows == 0) {

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
                  <h3 class="mb-0">عناصر التقرير المالي   </h3>
                </div>

                <div class="col-4 text-right">
                  <a href="#" class="btn btn-sm btn-primary" onclick="printPompiste('printDiv')">طباعة </a>
                </div>
              </div>
            </div>





            <div class="table-responsive col-12">
            <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="no-print bg-secondary"  id="printDiv">



<div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">مقدمة </label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">مقارنة الوضعية المالية الحالية مع وضعية السنة الفارطة </label>
                      </div>
                    </div>



                    <table style="border: 1px solid; width:70%">
                    <tr>
                      <td class="text-center" style="border: 1px solid;"></td>
                      <td class="text-center" style="border: 1px solid;">السنة السابقة</td>
                      <td class="text-center" style="border: 1px solid;">السنة الحالية</td>
                      <td class="text-center" style="border: 1px solid;">الفارق</td>
                      <td class="text-center" style="border: 1px solid;">%</td>
                    </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد الجملي في أول سنة</td>
<!-- 
                    <td class="text-center" style="border: 1px solid;"><div id="inputArea20"style="width:100%"  onclick="makeEditable(this);" contenteditable="true">إضغط مرتين لإضافة معطيات</div></td>
-->
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                    </table>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	التعليق على البيانات</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	مقارنة بين توقعات الميزانية و تنفيذها   </label>
                      </div>
                    </div>



                    <table style="border: 1px solid; width:70%">
                    <tr>
                      <td class="text-center" style="border: 1px solid;"></td>
                      <td class="text-center" style="border: 1px solid;">السنة السابقة</td>
                      <td class="text-center" style="border: 1px solid;">السنة الحالية</td>
                      <td class="text-center" style="border: 1px solid;">الفارق</td>
                      <td class="text-center" style="border: 1px solid;">%</td>
                    </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد الجملي في أول سنة</td>
<!-- 
                    <td class="text-center" style="border: 1px solid;"><div id="inputArea20"style="width:100%"  onclick="makeEditable(this);" contenteditable="true">إضغط مرتين لإضافة معطيات</div></td>
-->
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>




                      <tr>
                        <td class="text-center" style="border: 1px solid;">انخراطات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">بيع ماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل أنشطة أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مداخيل قروض</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المداخيل</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                      <tr>
                        <td class="text-center" colspan="5">المداخيل</td>
                      </tr>

                      <tr>
                        <td class="text-center" style="border: 1px solid;">اشتراكات</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">شراء الماء</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الطاقة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف استغلال أخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">صيانة و اصلاح</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">أجور</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">ادارة و تصرف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف مختلفة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">مصاريف الأنشطة الأخرى</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">استثمار و تجهيز</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">جملة المصاريف</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>
                      <tr>
                        <td class="text-center" style="border: 1px solid;">الرصيد في آخر سنة</td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                        <td class="text-center" style="border: 1px solid;"></td>
                      </tr>


                    </table>






                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	التعليق على البيانات</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	نسبة استخلاص الديون</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	اقتراحات مجلس الادارة</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">	مسائل مالية مختلفة</label>
                        <div id="inputArea1" >....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
                      </div>
                    </div>
















<!--
  
<div id="inputArea1" contenteditable="true">........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
<div id="inputArea2" contenteditable="true">Double click to edit</div>

<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>

-->




<form id="myForm" method="post">
    <input type="hidden" id="inputArea1" name="inputArea1" value="">
    <input type="hidden" id="inputArea2" name="inputArea2" value="">
    ...
    <input type="hidden" id="inputArea20" name="inputArea20" value="">
    <input type="submit" name="rapportFinancier" value="Submit">
</form>



</div>



             
            </div>
           
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


/*var inputs = document.querySelectorAll('.inputArea');

for (var i = 0; i < inputs.length; i++) {
    inputs[i].ondblclick = function() {
        this.setAttribute('contenteditable', 'false');
        var input = document.createElement('input');
        input.type = 'text';
        input.value = this.textContent;
        this.innerHTML = '';
        this.textContent = 'aaaaa';
        this.appendChild(input);
        input.focus();

        input.onblur = function() {
            var div = this.parentNode;
            div.setAttribute('contenteditable', 'true');
            div.innerHTML = '';
            div.appendChild(document.createTextNode(this.value));
        }
    }
}*/

document.getElementById('myForm').onsubmit = function() {
    for (var i = 0; i < inputs.length; i++) {
        document.getElementById('inputArea' + (i + 1)).value = inputs[i].textContent;
    }
}

function makeEditable(element) {
    element.contentEditable = true;
    if(element.textContent == "إضغط مرتين لإضافة معطيات")
      {
        element.textContent ="";
      }
    //element.textContent ="";
    element.addEventListener('blur', function() {
      if(element.textContent =="")
      {
        element.textContent ="إضغط مرتين لإضافة معطيات";
      }
        element.contentEditable = false;
    });
}
</script>








