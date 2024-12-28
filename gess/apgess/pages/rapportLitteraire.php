
<?php 

$year = date("Y");

$idRL=$idGess."".$year;

$sql="SELECT * FROM `rapport_litteraire` where idRL='$idRL'";
$result = $conn->query($sql);
   
if ($result->num_rows == 0) {

  $new=true;

  $sql="INSERT INTO `rapport_litteraire` (`idRL`, `idGess`, `annee`) values ('$idRL', '$idGess','$year');";

if($conn->query($sql) === TRUE){


  $_SESSION['messageClass']="success";
  $_SESSION['message']="تم إضافة تقرير مالي جديد لهذا العام   ".$jour;
header("Location: ../index.php?page=rapportLitteraire");
 

         
           
      }else
      {
      
       $_SESSION['messageClass']="danger";
       $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
       header("Location: ../index.php?page=rapportLitteraire");
       exit();
      }
}

else{


  $sql="SELECT * FROM `rapport_litteraire` where idRL='$idRL'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $RL = $result->fetch_assoc();
  }
  

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
            
           
            <div class="card-header bg-white border-0">
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
            <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert" >
            إضغط مرتين على المعطيات لتحينها
</div>

<div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="no-print bg-white"  id="printDiv">

<div class="bg-white">
  


<div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-10 text-center">
                  <h2 class="mb-0 text-center">التقرير المالي </h2>
                </div>
              </div>
            </div>


<div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >1.	لمحة عن المجمع </label>
                        <div id="inputArea1" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['descriptionGess'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['descriptionGess'];   ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" ><h4>2.	الأنشطة التي قام بها المجمع خلال الفترة المنصرمة</h4> </label>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	0.	تطور عدد المنخرطين</label>
                        <div id="inputArea2" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['evolutionParticipants'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['evolutionParticipants']; ?></div>
                      </div>
                    </div>






             


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	1.	كمية الماء التي تم ضخها</label>
                        <div id="inputArea3" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['quantiteEauPompe'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['quantiteEauPompe']; ?></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	2.	عدد أيام العطب المسجلة</label>
                        <div id="inputArea4" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['joursProbleme'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['joursProbleme']; ?></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	3.	صيانة التجهيزات التي قام بها المجمع أو تحملت مصاريفها</label>
                        <div id="inputArea5" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['reparation'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['reparation']; ?></div>
                      </div>
                    </div>




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	4.	تجديد أو تمديد الشبكة</label>
                        <div id="inputArea6" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['renouvellement'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['renouvellement']; ?></div>
                      </div>
                    </div>


                    
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	5.	الأنشطة الاقتصادية و الاجتماعية التي قام بها المجمع</label>
                        <div id="inputArea7" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['activite'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['activite']; ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	6.	العلاقات بين مجلس ادارة المجمع و الجهات الادارية و السلط الجهوية و المحلية</label>
                        <div id="inputArea8" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['relation'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['relation']; ?></div>
                      </div>
                    </div>



                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	<h4>3.	الأنشطة المبرمجة التي لم يتمكن مجلس الادارة من تنفيذها</h4>.   </label>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <div id="inputArea9" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['activitesProgrammees'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['activitesProgrammees']; ?></div>
                      </div>
                    </div>


             
                        <label class="form-control-label" for="input-username" ><h4>4.	طرح القضايا التي يجب على الجلسة العامة تنفيذها</h4>   </label>
                 




                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	0.	الموافقة على قبول منخرطين جدد</label>
                        <div id="inputArea10" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['acceptationDemandes4'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['acceptationDemandes4']; ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	1.	رفت بعض المنخرطين</label>
                        <div id="inputArea11" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['refuseDemandes'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['refuseDemandes']; ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	2.	المطالبة بسلطات أوسع لمجلس الادارة</label>
                        <div id="inputArea12" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['demandePouvoir'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['demandePouvoir']; ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >5.	اقتراحات مجلس الادارةأو الاقتراحات الواردة من المنخرطين   </label>
                      </div>
                    </div>



                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	0.	الموافقة على قبول منخرطين جدد</label>
                        <div id="inputArea13" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['acceptationDemandes5'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['acceptationDemandes5']; ?></div>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username" >	1.	مسائل ادارية مختلفة</label>
                        <div id="inputArea14" contenteditable="true" class="editableArea" onclick="makeEditable(this)" ><?php echo ($RL['autresProblemes'] == '') ? "إضغط مرتين لإضافة معطيات" : $RL['autresProblemes']; ?></div>
                      </div>
                    </div>




</div>












<!--
  
<div id="inputArea1" contenteditable="true" contenteditable="true">........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</div>
<div id="inputArea2" contenteditable="true">Double click to edit</div>

<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>
<div id="inputArea20" contenteditable="true" onclick="makeEditable(this);">Double click to edit</div>

-->




<form id="myForm" action="controller/controller.php" method="post">
    <input  id="inputAreaForm1" type="hidden" name="inputArea1" value="">
    <input  id="inputAreaForm2" type="hidden" name="inputArea2" value="">
    <input  id="inputAreaForm3" type="hidden" name="inputArea3" value="">
    <input  id="inputAreaForm4" type="hidden" name="inputArea4" value="">
    <input  id="inputAreaForm5" type="hidden" name="inputArea5" value="">
    <input  id="inputAreaForm6" type="hidden" name="inputArea6" value="">
    <input  id="inputAreaForm7" type="hidden" name="inputArea7" value="">
    <input  id="inputAreaForm8" type="hidden" name="inputArea8" value="">
    <input  id="inputAreaForm9" type="hidden" name="inputArea9" value="">
    <input  id="inputAreaForm10" type="hidden" name="inputArea10" value="">
    <input  id="inputAreaForm11" type="hidden" name="inputArea11" value="">
    <input  id="inputAreaForm12" type="hidden" name="inputArea12" value="">
    <input  id="inputAreaForm13" type="hidden" name="inputArea13" value="">
    <input  id="inputAreaForm14" type="hidden" name="inputArea14" value="">

    <button type="submit" id="submitButton" name="rapportFinancier" class=" no-print btn btn-primary my-4 col-12">تسجيل</button>

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
/*

document.getElementById('submitButton').addEventListener('click', function() {
        document.getElementById('inputAreaForm1').value = document.getElementById('inputArea1').innerHTML;
        document.getElementById('myForm').submit();
    });
*/

document.getElementById('submitButton').addEventListener('click', function() {
        var inputs = ['inputAreaForm1', 'inputAreaForm2', 'inputAreaForm3', 'inputAreaForm4', 'inputAreaForm5', 'inputAreaForm6', 'inputAreaForm7', 'inputAreaForm8', 'inputAreaForm9', 'inputAreaForm10', 'inputAreaForm11', 'inputAreaForm12', 'inputAreaForm13', 'inputAreaForm14']; // Add more input names if needed
        var divs = ['inputArea1', 'inputArea2', 'inputArea3', 'inputArea4', 'inputArea5', 'inputArea6', 'inputArea7', 'inputArea8', 'inputArea9', 'inputArea10', 'inputArea11', 'inputArea12', 'inputArea13', 'inputArea14']; // Add more div ids if needed

        for (var i = 0; i < inputs.length; i++) {
            document.getElementById(inputs[i]).value = document.getElementById(divs[i]).innerHTML;
        }

        document.getElementById('myForm').submit();
    });

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








