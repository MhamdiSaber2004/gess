// معطيات حول اعضاء المجلس


// معطيات حول اعضاء المجلس


$(document).ready(function() {
   $('#addMembereConseil').click(function(e) {

       e.preventDefault();
       addNewInputFields();
       
       
       
   });

      
   
});

function addNewInputFields() {
     function getRandomChar() {
      const characters = '3456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      const randomIndex = Math.floor(Math.random() * characters.length);
      return characters.charAt(randomIndex);
    }
   
    var x = getRandomChar();

   var newInputGroup = `
   <hr>
   <br>
   <div class="d-flex  gap-3 col-12 grp" name="membreConseilDiv" style="align-items: end;">
                             <div class="inputs-group col-11">
                                <label_input class="label_input">أعضاء مجلس الإدارة </label_input>
                                <select id="5_select1" onchange="selected(this)" class="input--style-1" type="text" name="role[]" placeholder="أعضاء مجلس الإدارة ">
                                   <option value="رئيس المجمع">رئيس المجمع </option>
                                    <option value="أمين المال">أمين المال</option>
                                    <option value="عضو"> عضو</option>
                                 </select>
                             </div>
                          </div>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   
                           <div class="inputs-group col-11" style="display:none;">
                              <input class="input--style-1" type="text" name="idus[]"  value="0">
                           </div>
                        </div>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                             <div class="inputs-group col-11">
                                <label_input class="label_input">الاسم و اللقب</label_input>
                                <input class="input--style-1" type="text" name="nom_prenom[]" placeholder="الاسم و اللقب">
                             </div>
                          </div>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             <div class="inputs-group col-11">
                                <label_input class="label_input">العمر</label_input>
                                <input class="input--style-1" type="number" name="age[]" placeholder="العمر">
                             </div>
                            
                          </div>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                            
                             <div class="inputs-group col-11">
                                <label_input class="label_input">المستوى التعليمي</label_input>
                                <select id="5_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education[]" placeholder="الولاية">
                                <option value=" تعليم عالي" selected="selected">تعليم عالي</option>
                                                   <option value="ثانوي ">ثانوي</option>
                                                   <option value="أساسي">أساسي</option> 
                                                   <option value="ابتدائي">ابتدائي</option>
                                                   <option value="غير متعلم">غير متعلم</option>
                                </select>
                             </div>
                          </div>
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             <div class="inputs-group col-11">
                                <label_input class="label_input">الأقدمية</label_input>
                                <input class="input--style-1" type="number" name="anciennete[]" placeholder="الأقدمية">
                             </div>
                             
                          </div>
                          <div class="d-flex col-12 grp" style="align-items: end;">
                             <div class="inputs-group col-11">
                                <label_input class="label_input">رقم الهاتف</label_input>
                                <input class="input--style-1" type="number" name="num_tel[]" placeholder="رقم الهاتف">
                             </div>
                             
                             </div>
                             
                             
                             
                              <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                            نسخة من بطاقة التعريف الوطنية
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="Z_switch-input${x}" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="Z_file${x}">
                                             <label for="formFile" class="form-label">
                                                <h4> 
                                                نسخة من بطاقة التعريف الوطنية

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="cp_cin[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       
                                
   `;

   var $newGroup = $(newInputGroup);
       var selectedValue = $newGroup.find('select[name="role[]"]').val();

       // Hide the selected option in the next set of fields
       $newGroup.find('select[name="role[]"] option[value="' + selectedValue + '"]').hide();
       if ($('div[name="membreConseilDiv"]').length<6)
   {$('#DivMembreConseil').append(newInputGroup);}
   else {
     var divID = $('#addMembereConseil').attr('id');
     $('#' + divID).css('display', 'none');
   }

}


// معطيات حول هيئة المراقبة الداخلية


$(document).ready(function() {
   $('#DivMembreConseil').on('change', 'select[name="role[]"]', function() {
      var selectedValue = $(this).val();
      $('select[name="role[]"] option').show(); 
      $('select[name="role[]"] option[value="' + selectedValue + '"]').hide(); 
  });
    $('#addSurveillanceInterne').click(function(e) {

        e.preventDefault();
        addNewInputFields1();
       
    });
});

function addNewInputFields1() {
     
    var newInputGroup = `
    <hr>
    <br>
    <div class="d-flex  gap-3 col-12 grp" style="align-items: end;" name="SurveillanceInterneDiv">
    <div class="inputs-group col-11">
       <label_input class="label_input"> أعضاء هيئة المراقبة الداخلية </label_input>
       <select id="6_select1" onchange="selected(this)" class="input--style-1" type="text" name="role1[]" placeholder="أعضاء هيئة المراقبة الداخلية ">
       <option value="مراقب أول " selected="selected">مراقب أول </option>
                          <option value="مراقب ثاني">مراقب ثاني  </option>
                          <option value="مراقب ثالث ">مراقب ثالث </option>
       </select>
    </div>
 </div>
 <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   
 <div class="inputs-group col-11" style="display:none;">
    <input class="input--style-1" type="text" name="idcon[]"  value="0">
 </div>
 </div>
 <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
    
    <div class="inputs-group col-11">
       <label_input class="label_input">الاسم و اللقب</label_input>
       <input class="input--style-1" type="" name="nom_prenom1[]" placeholder="الاسم و اللقب">
    </div>
 </div>
 <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
    <div class="inputs-group col-11">
       <label_input class="label_input">العمر</label_input>
       <input class="input--style-1" type="number" name="age1[]" placeholder="العمر">
    </div>
    
 </div>
 <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
    
    <div class="inputs-group col-11">
       <label_input class="label_input">المستوى التعليمي</label_input>
       <select id="6_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education1[]" placeholder="الولاية">
       <option value=" تعليم عالي" selected="selected">تعليم عالي</option>
                          <option value="ثانوي ">ثانوي</option>
                          <option value="أساسي">أساسي</option> 
                          <option value="ابتدائي">ابتدائي</option>
                          <option value="غير متعلم">غير متعلم</option>
       </select>
    </div>
 </div>
 <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
    <div class="inputs-group col-11">
       <label_input class="label_input">الأقدمية</label_input>
       <input class="input--style-1" type="number" name="anciennete1[]" placeholder="الأقدمية">
    </div>
    
 </div>
 <div class="d-flex col-12 grp" style="align-items: end;">
    <div class="inputs-group col-11">
       <label_input class="label_input">رقم الهاتف</label_input>
       <input class="input--style-1" type="number" name="num_tel1[]" placeholder="رقم الهاتف">
    </div>
 </div>
    `;

    if ($('div[name="SurveillanceInterneDiv"]').length<3)
    {$('#DivSurveillanceInterne').append(newInputGroup);}
    else {
      var divID = $('#addSurveillanceInterne').attr('id');
      $('#' + divID).css('display', 'none');
    }
   
}





$(document).ready(function() {
   

   $('#addEmployee').click(function(e) {

      e.preventDefault();
      addNewInputFields2();
   });
});

function addNewInputFields2() {
   function getRandomChar() {
      const characters = '3456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      const randomIndex = Math.floor(Math.random() * characters.length);
      return characters.charAt(randomIndex);
    }
    function getRandomChar2() {
      const characters = '456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      const randomIndex = Math.floor(Math.random() * characters.length);
      return characters.charAt(randomIndex);
    }
    var x = getRandomChar();
    var y =getRandomChar2();
   var newInputGroup = `
   <hr>
   <br>
   <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">أعوان التنفيذ للمجامع</label_input>
                                 <select id="8_select1" onchange="selected(this)" class="input--style-1"  type="text" name="agents_executifs2[]" placeholder="الولاية">
                                 <option value="مدير فني" selected="selected"> مدير فني</option>
                                                   <option value="موزع الماء"> موزع الماء</option>
                                                   <option value="حارس  النظام المائي">حارس النظام المائي</option>
                                                   <option value="حارس الشبكة  ">  حارس الشبكة</option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المستوى التعليمي</label_input>
                                 <select id="8_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education2[]" placeholder="الولاية">
                                 <option value=" تعليم عالي" selected="selected">تعليم عالي</option>
                                                   <option value="ثانوي ">ثانوي</option>
                                                   <option value="أساسي">أساسي</option> 
                                                   <option value="ابتدائي">ابتدائي</option>
                                                   <option value="غير متعلم">غير متعلم</option> </select> 
                              </div>
                           
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text" name="nom_prenom2[]" placeholder="الاسم و اللقب">
                              </div>
                           </div>
                           <div class="inputs-group col-11" style="display:none;">
                           <input class="input--style-1" type="text" name="idbom[]"  value="0">
                        </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العمر</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="age2[]" placeholder="العمر">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الأجر</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="salaire2[]" placeholder="الأجر">
                              </div>
                           
                           </div>
                           <div class="d-flex gap-3 grp">
                           
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">عقد العمل</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input${x}" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="8_file${x}">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">عقد العمل</h4>
                                             </label>
                                             <input class="form-control" name="contrat_travail2[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الضمان الاجتماعي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input${y}" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="8_file${y}">
                                             <label for="formFile" class="form-label">
                                                <h4>الضمان الاجتماعي</h4>
                                             </label>
                                             <input class="form-control" type="file" name="securite_sociale2[]" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input class="input--style-1" type="number" step="any"  name="numero_telephone2[]" placeholder="رقم الهاتف">
                              </div>
                           </div>
   `;

   $('#DivEmployee').append(newInputGroup);
}





$(document).ready(function() {
   $('#add_dossier_employee').click(function(e) {

       e.preventDefault();
       addNewInputFields3();
   });
});

function addNewInputFields3() {
   var newInputGroup = `
   <hr>
   <br>
   <div class="d-flex mx-auto gap-3 grp" >
                              
                            
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الصفة</label_input>
                                 <select id="E_select1" onchange="selected(this)" name="role_de[]" class="input--style-1" type="text" name="countryy" placeholder="الولاية">
                                       <option value="مدير فني" selected="selected"> مدير فني</option>
                                                    <option value="موزع الماء"> موزع الماء</option>
                                                    <option value="حارس  النظام المائي">حارس النظام المائي</option>
                                                    <option value="حارس الشبكة  ">  حارس الشبكة</option>
                                 </select>
                              </div>
                           </div>

                           <div class="d-flex mx-auto gap-3 grp">
                              
                            
                           <div class="col-11 ">
                                          <div class="mb-3 col-12" id="4_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>نسخة من ب.ت.و</h4>
                                             </label>
                                             <input class="form-control" name="cin_de[]" type="file"  id="formFile">
                                          </div>
                                       </div>
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12" id="4_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>شهادة</h4>
                                             </label>
                                             <input class="form-control" name="attestation_de[]" type="file"  id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 " id="4_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">مطلب شغل</h4>
                                             </label>
                                             <input class="form-control" name="exigence_de[]" type="file"  id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                                    </div>
   `;

   $('#div_dossier_employee').append(newInputGroup);
}


