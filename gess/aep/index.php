<?php
   include "./database/db.php";
   include "process.php";
       ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="AuThemes Templates">
      <meta name="author" content="AuCreative">
      <meta name="keywords" content="AuThemes Templates">
      <!-- Title Page-->
      <title>منصة التسجيل</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <!-- Icons font CSS-->
      <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
      <!-- Font special for pages-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
         rel="stylesheet">
      <link
         href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Vendor CSS-->
      <!-- Main CSS-->
      <link href="css/main.css" rel="stylesheet" media="all">
    <style>
      @media (min-width: 768px) {
         #textAreaExample2 {
         width: 600px; /* Set the desired width */
         padding: 10px;
         margin: 0 auto;
         }
      }
         @media (min-width: 768px) {
         #textAreaExample2 {
         
         }
         }
      
    </style>
    
   </head>
   <body>
      <div class="page-wrapper p-t-200 " id="divBody">
      <!-- style="filter: blur(2px); opacity: 0.5;" -->
         <div class="wrapper wrapper--w690">
            <div class="card card-1">
               <div class="card-heading">
                  <h2 class="title ttr"  >مجمع للماء الصالح للشرب</h2>
               </div>
               <div class="card-body" style="background-color :white">
                  <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()" enctype="multipart/form-data">
                     <div class="progress" id="js-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                           aria-valuemax="100" style="width:5.55%;">
                           <span style="opacity: 0;" class="progress-val">1</span>
                        </div>
                     </div>
                     <ul class="nav nav-tab">
                        <li class="active">
                           <a href="#tab1" data-toggle="tab">1</a>
                        </li>
                        <li>
                           <a href="#tab2" data-toggle="tab">1</a>
                        </li>
                        <li>
                           <a href="#tab3" data-toggle="tab">1</a>
                        </li>
                        <li>
                           <a href="#tab4" data-toggle="tab">1</a>
                        </li>
                        <li>
                           <a href="#tab5" data-toggle="tab">1</a>
                        </li>
                        <li>
                           <a href="#tab6" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab7" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab8" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab9" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab10" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab11" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab12" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab13" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab14" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab15" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab16" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab17" data-toggle="tab"></a>
                        </li>
                        <li>
                           <a href="#tab18" data-toggle="tab"></a>
                        </li>
                        
                     </ul>
                     <div class="tab-content col-12">
                        <div class="tab-pane active col-12" id="tab1">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">تقديم
                              المجمع
                           </h2>
                           <div class="grp col-12 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">اسم المجمع</label_input>
                                 <input class="input--style-1" type="text" name="nom" onchange="onChangInput()"
                                    placeholder="اسم المجمع" required>
                              </div>
                           </div>
                           <div class="d-flex mx-auto gap-2 grp">
                              
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">المعتمدية</label_input>
                                 <select class="input--style-1" type="text" id="accreditation" name="accreditation" onchange="onChangInput()" required></select>
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">الولاية</label_input>
                                 <select id="etat" onchange="chargerAccreditations()" class="input--style-1" onchange="onChangInput()" type="text" name="etat_tunisie" placeholder="الولاية" required>
                                    <option value="">أختر ولاية</option>
                                    <?php
                                       $sql = "SELECT * FROM etats_tunisie";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->rowCount() > 0) {
                                          // Fetch data using PDO::FETCH_ASSOC to get an associative array
                                          $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                          
                                          foreach ($rows as $row) {
                                              echo '<option value="' . $row['id'] . '">' . $row['nom_etat'] . '</option>';
                                          }
                                       }
                                       
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="grp col-12 grp">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">العمادة</label_input>
                                 <input class="input--style-1" type="text" name="decanat" placeholder="العمادة" onchange="onChangInput()" required>
                              </div>
                           </div>
                            <div class="d-flex mx-auto gap-4 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">تاريخ التأسيس</label_input>
                                 <input class="input--style-1" type="date" onchange="onChangInput()" name="date_creation" placeholder="" required>
                              </div>
                             
                           </div>

                           <div class="d-flex mx-auto gap-4 grp">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">تاريخ بداية نشاط المجمع</label_input>
                                 <input class="input--style-1" type="date" onchange="onChangInput()" name="date_debut" placeholder="" required>
                              </div>
                           </div>
                          
                           <div class="btn-next-con">

                              <button class="btn-next" id="button1"  disabled >متابعة</button>
                             

                           </div>
                        </div>
                        

                           <!-- tab2 -->

                           
                        <div class="tab-pane  col-12" id="tab2">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              المستخدم
                           </h2>
                           <div class="d-flex mx-auto gap-3 grp">
                              <div class="inputs-group col-11">
                               <label_input class="label_input">الصفة</label_input>
                                 <select id="2_select" onchange="selected(this)" class="input--style-1" type="text" name="roleU" placeholder="الولاية">
                                    <option value="رئيس المجمع">رئيس المجمع </option>
                                    <option value="أمين المال">أمين المال</option>
                                    <option value="المدير الفني">المدير الفني</option>
                                    <option value="عضو"> عضو</option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text"  onchange="onChangeInput2()" name="nom_utilisateur"
                                    placeholder="الاسم و اللقب">
                           </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">   البريد الإلكتروني</label_input>
                                 <input class="input--style-1" type="email" onchange="onChangeInput2()" name="email_utilisateur"
                                    placeholder="  البريد الإلكتروني ">
                           </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                              <label_input class="label_input">رقم الهاتف</label_input>
                              <input class="input--style-1"  type="number" step="any" onchange="onChangeInput2()" name="tel_utilisateur" placeholder="رقم الهاتف">
                           </div>
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" id="button2" disabled href="#">متابعة</button>
                           </div>
                        </div> 


                        
                           <!-- tab3 -->

                        <div class="tab-pane  col-12" id="tab3">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معطيات حول اعضاء المجلس
                           </h2>
                           <div id="DivMembreConseil">
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
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text" name="nom_prenom[]" placeholder="الاسم و اللقب">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العمر</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="age[]" placeholder="العمر">
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
                                 <input class="input--style-1"  type="number" step="any" name="anciennete[]" placeholder="الأقدمية">
                              </div>
                              
                           </div>
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input class="input--style-1"  type="number" step="any" min="10000000" name="num_tel[]" placeholder="رقم الهاتف">
                              </div>
                           </div>
                           
                           
                           
                                    <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                            نسخة من بطاقة التعريف الوطنية
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="Z_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="Z_file1">
                                             <label for="formFile" class="form-label">
                                                <h4> 
                                                نسخة من بطاقة التعريف الوطنية

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="cp_cin[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       
                                    </div>
                           
                           <div class="d-flex  gap-3 col-12 ">
                              <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" id="addMembereConseil" href="#">إضافة </button>
                              </div>
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>

                           <!-- tab4 -->

                           <div class="tab-pane  col-12" id="tab4">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معطيات حول هيئة المراقبة الداخلية
                           </h2>
                           <div id="DivSurveillanceInterne">
                           <div class="d-flex  gap-3 col-12 grp" name="SurveillanceInterneDiv" style="align-items: end;">
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
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text" name="nom_prenom1[]" placeholder="الاسم و اللقب">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العمر</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="age1[]" placeholder="العمر">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المستوى التعليمي</label_input>
                                 <select id="6_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education1[]	" placeholder="الولاية">
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
                                 <input class="input--style-1"  type="number" step="any" name="anciennete1[]" placeholder="الأقدمية">
                              </div>
                              
                           </div>
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="num_tel1[]" placeholder="رقم الهاتف">
                              </div>
                           </div>
                                    </div>
                           <div class="d-flex  gap-3 col-12 ">
                              <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" id="addSurveillanceInterne" href="#">إضافة </button>
                              </div>
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>









                          <!-- tab5   -->


                          <div class="tab-pane  col-12" id="tab5">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px;">
                              معطيات حول توزيع الماء
                           </h2>
                          
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ربط خاص </label_input>
                                 <input class="input--style-1"  type="number" step="any" name="liaison_prive" placeholder=" ربط خاص">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                              
                                 <label_input class="label_input">عدد مزودين الصهاريج</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="fournisseurs_reservoirs" placeholder="  عدد مزودين الصهاريج">
                              </div>
                              
                           </div>
                           <h2 class="title"
                              style="margin-bottom: 22px;font-size:22px;text-align: right;color:green;margin-right:20px">
                              الصهاريج</h2>
                           <div class="d-flex gap-3 grp">
                           
                           <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3" style="align-items: end;">
                              <label_input class="label_input"> استعمال عمومي</label_input>
                              <label class="switch">
                                    <input class="switch-input" id="4_switch-inputY" value="1" name="reservoir_public" onchange="switchChanged(this)" type="checkbox" />
                                    <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                    <span class="switch-handle"></span>
                              </label>
                           </div>
                        </div>

                        <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="4_fileY">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">استعمال عمومي </h4>
                                             </label>
                                             <input class="form-control" name="file_reservoir_public[]" type="file" multiple id="formFile" >
                                          </div>
                                       </div>

                        <div class="d-flex gap-3 grp">
                           <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3" style="align-items: end;">
                              <label_input class="label_input"> استعمال خاص</label_input>
                              <label class="switch">
                                    <input class="switch-input" id="4_switch-inputX" name="reservoir_prive" onchange="switchChanged(this)" type="checkbox" />
                                    <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                    <span class="switch-handle"></span>
                              </label>
                           </div>
                          
                        </div>

                        <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="4_fileX">
                                             <label for="formFile" class="form-label">
                                                <h4>استعمال خاص</h4>
                                             </label>
                                             <input class="form-control" name="files_reservoir_prive[]"  type="file" multiple id="formFile">
                                          </div>
                                       </div>
                      


                           
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> حنفية عمومية</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="robinet_public" placeholder="حنفية عمومية">
                              </div>
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> ربط عمومي</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="liaison_public" placeholder="ربط عمومي">
                              </div>
                              
                              
                           </div>

                           <h2 class="title"
                              style="margin-bottom: 22px;font-size:22px;text-align: right;color:green;margin-right:20px">
                              حنفية                           </h2>
                           <div class="d-flex gap-3 grp">
                          
                           <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3" style="align-items: end;">
                              <label_input class="label_input"> استعمال عمومي</label_input>
                              <label class="switch">
                                    <input class="switch-input" id="4_switch-input3" name="robinet_util_public" onchange="switchChanged(this)" type="checkbox" />
                                    <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                    <span class="switch-handle"></span>
                              </label>
                           </div>
                        </div>

                        <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="4_file3">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">استعمال عمومي </h4>
                                             </label>
                                             <input class="form-control" name="file_robinet_util_public[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                        <div class="d-flex gap-3 grp">
                           <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3" style="align-items: end;">
                              <label_input class="label_input"> استعمال خاص</label_input>
                              <label class="switch">
                                    <input class="switch-input" id="4_switch-input4" name="robinet_util_prive" onchange="switchChanged(this)" type="checkbox" />
                                    <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                    <span class="switch-handle"></span>
                              </label>
                           </div>
                           
                        </div>

                        <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="4_file4">
                                             <label for="formFile" class="form-label">
                                                <h4>استعمال خاص</h4>
                                             </label>
                                             <input class="form-control" name="file_robinet_util_prive[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                        
                           <div class="btn-next-con">
                         

                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>



                               <!-- tab6   -->


                        <div class="tab-pane  col-12" id="tab6">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الحراس                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العدد</label_input>
                                 <input  type="number" step="any" class="input--style-1"  name="nombre" placeholder="العدد">
                                    
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">المتطوعين</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="bailleurs" placeholder="المتطوعين">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> المؤجرين</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="benevoles" placeholder="المؤجرين">
                              </div>
                           </div>
                           
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">(%) طريقة الخلاص</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="paiement" placeholder=" طريقة الخلاص">
                              </div>
                           </div>
                           
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>


                        <!-- tab7 -->

                        <div class="tab-pane  col-12" id="tab7">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الجوانب المالية
                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">  مبلغ الاشتراك</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="montant_abonnement"  placeholder="مبلغ الاشتراك">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">تسعيرة بيع الماء م3  </label_input>
                                 <input class="input--style-1"  type="number" step="any" name="prix_eau_m3"  placeholder=" تسعيرة بيع الماء م3">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">  تسعيرة عمومية</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="tarification"  placeholder="  تسعيرة عمومية">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> الفوترة</label_input>
                                 <select id="A_select1" onchange="selected(this)" class="input--style-1" type="text" name="facturation" placeholder="الولاية">
                                                <option value="شهرية"> شهرية</option>
                                                <option value="نصف شهرية">   نصف شهرية</option>
                                                <option value="  أخرى ">  أخرى </option>
                                 </select>
                              </div>
                             
                           </div>
                          
                         
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">  عدد المنتفعين الذين يسددون في الوقت</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="beneficiaires_a_temps" placeholder=" عدد المنتفعين الذين يسددون في الوقت">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد المنتفعين الذين يسددون خارج الأجل المحدد </label_input>
                                 <input class="input--style-1"  type="number" step="any" name="beneficiaires_delai" placeholder=" عدد المنتفعين الذين يسددون خارج الأجل المحدد">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد المنتفعين الذين لم يسددوا أبدا </label_input>
                                 <input class="input--style-1"  type="number" step="any" name="beneficiaires_jamais" placeholder="عدد المنتفعين الذين لم يسددوا أبدا  ">
                              </div>
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون المنتفعين </label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="beneficiaires_dettes" placeholder="ديون المنتفعين ">
                              </div>
                             
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> ديون الشركة الوطنية لاستغلال و توزيع المياه</label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="steg" placeholder=" ديون الشركة الوطنية لاستغلال و توزيع المياه ">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> ديون الشركة التونسية للكهرباء و الغاز</label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="soned" placeholder="ديون الشركة التونسية للكهرباء و الغاز">
                              </div>
                           
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون المندوبية الجهوية للتنمية الفلاحية </label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="crda" placeholder=" ديون المندوبية الجهوية للتنمية الفلاحية">
                              </div>
                           </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون أخرى </label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="autre_dettes" placeholder="ديون أخرى ">
                              </div>
                             
                           </div>
                           

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> </label_input>
                                 <input class="input--style-1"  type="number" step="any" name="compte_courant" placeholder="الحساب الجاري  ">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> الرصيد الحالي </label_input>
                                 <input class="input--style-1"  type="number" step="any"  name="fonds" placeholder=" الصندوق ">
                              </div>
                             
                           </div>
                           

                        
                           <div class="btn-next-con">

                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>




                      
                           <!-- tab8 -->

                           <div class="tab-pane  col-12" id="tab8">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق الإدارية والقانونية
                           </h2>
                          
                           <div class="d-flex gap-3 grp">
                             
                            
                                                            <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  الاشهار بالرائد الرسمي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="mb-3 col-12 visually-hidden " id="7_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الاشهار بالرائد الرسمي</h4>
                                             </label>
                                             <input class="form-control" name="pub_off[]" type="file" multiple id="formFile">
                                          </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">    القانون الأساسي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                            
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="7_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>القانون الأساسي</h4>
                                             </label>
                                             <input class="form-control" name="loi_fonda[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف الجلسة العامة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="7_file3">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف الجلسة العامة</h4>
                                             </label>
                                             <input class="form-control" name="dossier_seance[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">النظام الداخلي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="7_file4">
                                             <label for="formFile" class="form-label">
                                                <h4>النظام الداخلي</h4>
                                             </label>
                                             <input class="form-control" name="loi_interieur[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">   دفتر محاضر جلسات الاجتماعات الخاصة بمجلس الادارة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="7_file5">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر محاضر جلسات الاجتماعات الخاصة بمجلس الادارة</h4>
                                             </label>
                                             <input class="form-control" name="registre[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> عقد التصرف</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input6" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="7_file6">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> عقد التصرف</h4>
                                             </label>
                                             <input class="form-control" name="contrat_gestion[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر الانخراط </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input7" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="7_file7">
                                             <label for="formFile" class="form-label">
                                                <h4>دفتر الانخراط</h4>
                                             </label>
                                             <input class="form-control" name="registre_inscri[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>




                         
                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">

                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>


                        <!-- tab9 -->

                        <div class="tab-pane  col-12" id="tab9">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق المالية
                           </h2>
                          
                           <div class="d-flex gap-3 grp">
                             
                            
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">    دفتر المداخيل و المصاريف</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="8_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">دفتر المداخيل و المصاريف</h4>
                                             </label>
                                             <input class="form-control" name="revenus_depenses[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">     الميزانية و الموازنة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                            
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="8_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>الميزانية و الموازنة </h4>
                                             </label>
                                             <input class="form-control" name="budget_balancement[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                         

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الفواتير </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>

                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="8_file4">
                                             <label for="formFile" class="form-label">
                                                <h4> الفواتير</h4>
                                             </label>
                                             <input class="form-control" name="factures_compta[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر المحاسبة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>


                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="8_file3">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">دفتر المحاسبة</h4>
                                             </label>
                                             <input class="form-control" name="compta_generale[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">حساب جاري</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="8_file5">
                                             <label for="formFile" class="form-label">
                                                <h4> حساب جاري</h4>
                                             </label>
                                             <input class="form-control" name="compte_courant[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                             <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  الميزانية</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input6" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="8_file6">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">  الميزانية</h4>
                                             </label>
                                             <input class="form-control" name="budget[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> وجود الوثائق المدعمة </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input7" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="8_file7">
                                             <label for="formFile" class="form-label">
                                                <h4> وجود الوثائق المدعمة</h4>
                                             </label>
                                             <input class="form-control" name="docs_support[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                         

                         
                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>



                        

                        <div class="tab-pane  col-12" id="tab10">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق الفنية
                           </h2>
                          
                           <div class="d-flex gap-3 grp">
                                     <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  سجل قراءة العداد</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="9_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">سجل قراءة العداد</h4>
                                             </label>
                                             <input class="form-control" name="lecture_compteur[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">   دراسة المشروع   </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                            
                                                        
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="9_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>دراسة المشروع</h4>
                                             </label>
                                             <input class="form-control" name="etude_projet[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> مخطط الشبكة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="9_file3">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> مخطط الشبكة</h4>
                                             </label>
                                             <input class="form-control" name="plan_reseau[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                          
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر متابعة الاستهلاك و الفوترة الخاص </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="9_file4">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر متابعة الاستهلاك و الفوترة الخاص,</h4>
                                             </label>
                                             <input class="form-control" name="suivi_conso_facturation[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           

                           

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> دفتر محطة الضخ الكهربائية المتوسطة الجهد </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="9_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="9_file5">
                                             <label for="formFile" class="form-label">
                                                <h4>   دفتر محطة الضخ الكهربائية المتوسطة الجهد</h4>
                                             </label>
                                             <input class="form-control" name="station_pompage[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                   
                                 </tr>
                              </tbody>
                           </table>

                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الميزانية</label_input>
                                 <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample1" name="budget" rows="4"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                           </div>


                         
                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>

                          <!-- tab11 -->

                          <div class="tab-pane  col-12" id="tab11">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              تأمين تعقيم الماء
                           </h2>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">مضخة تحديد الجرعات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-inputZ" name="pompe_dosage" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="A_fileZ">
                                             <label for="formFile" class="form-label">
                                                <h4>مضخة تحديد الجرعات</h4>
                                             </label>
                                             <input class="form-control" name="file_pompe_dosage[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                          
                          

                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11  d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  وضعية تأمين مطبقة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input2" name="situation_assurance_appliquee" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="A_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>وضعية تأمين مطبقة
                                                </h4>
                                             </label>
                                             <input class="form-control" name="file_situation_appliquee[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">وضعية تأمين منظمة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input3" name="situation_assurance_organisee" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="A_file3">
                                             <label for="formFile" class="form-label">
                                                <h4>وضعية تأمين منظمة
                                                </h4>
                                             </label>
                                             <input class="form-control" name="file_situation_organisee[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                         
                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>




                           <!-- tab12 -->




                        <div class="tab-pane  col-12" id="tab12">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              في حالة عطب . بأي شركة أو تقني تتصل ؟

                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                           <div id="DivproblemTech" >
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-5">
                                 <label_input class="label_input">المجال</label_input>
                                 <input class="input--style-1" type="text" name="domaine[] name="phone" placeholder="  المجال">
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input"> اسم الشركة أو التقني</label_input>
                                 <input class="input--style-1"  type="text" name="nom_societe_technicien[]"  name="phone" placeholder=" اسم الشركة أو التقني">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input id="C_select1"  class="input--style-1" name="numero_telephone[]"  type="number" step="any" name="countryy" placeholder="رقم الهاتف">
                                 
                              </div>
                           </div>
                     </div>
                     <div class="d-flex  gap-3 col-12 ">
                              <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" href="#" id="addProblemTech">إضافة </button>
                              </div>
                           </div>
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>





                        <div class="tab-pane   col-12" id="tab13">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px;">
                              جودة التدخل

                           </h2>

                           <div class="inputs-group col-12">
                                 <div class="form-outline" style="position:relative">
                                    <textarea class="form-control" id="textAreaExample" name="qualite_interventions" rows="8" cols="55"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                         
                           
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>








                        <div class="tab-pane  col-12" id="tab14">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق الموجودة                               
                           </h2>
                          
                               <div style="display : none">       

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              الوثائق الادارية و القانونية
                           </h2>
                           

                           <div class="d-flex gap-3 grp">
                            
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> القانون الأساسي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file3">
                                             <label for="formFile" class="form-label">
                                                <h4>القانون الأساسي</h4>
                                             </label>
                                             <input class="form-control" name="lois_fondamentales[]" type="file" name="" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الاشهار بالرائد الرسمي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file2">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الاشهار بالرائد الرسمي</h4>
                                             </label>
                                             <input class="form-control" name="annonce_journal_officiel[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                          
                           <div class="d-flex gap-3 grp">
                            
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف الجلسة العامة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف الجلسة العامة</h4>
                                             </label>
                                             <input class="form-control" name="dossier_seance_generale[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> النظام الداخلي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا"  style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>


                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file5">
                                             <label for="formFile" class="form-label">
                                                <h4> النظام الداخلي</h4>
                                             </label>
                                             <input class="form-control" name="reglement_interieur[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </div>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              ملف اجتماعات مجلس الادارة
                           </h2>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر المداخيل و المصاريف لسنة 2020</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file8">
                                             <label for="formFile" class="form-label">
                                                <h4>دفتر المداخيل و المصاريف لسنة 2020</h4>
                                             </label>
                                             <input class="form-control" name="registre_revenus_depenses_annee[]"  type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الميزانية و الموازنة لسنة 2022</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-input9" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_file9">
                                             <label for="formFile" class="form-label">
                                                <h4>الميزانية و الموازنة لسنة 2022</h4>
                                             </label>
                                             <input class="form-control" name="budget_annee[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       
                                    
                           
                          
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر الايصالات لسنة 2021  </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-inputE" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_fileE">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">دفتر الايصالات لسنة 2021  </h4>
                                             </label>
                                             <input class="form-control" name="registre_recettes_annee[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">فاتورات 2021</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="D_switch-inputF" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>


                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="D_fileF">
                                             <label for="formFile" class="form-label">
                                                <h4>فاتورات 2021</h4>
                                             </label>
                                             <input class="form-control" type="file" name="factures[]" multiple id="formFile">
                                          </div>
                                       </div>
                          
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>

                        <!-- tab15 -->
                        
                                             
                            <div class="tab-pane  col-12" id="tab15">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق الادارية                               
                           </h2>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف أعوان المجمع
                           </h2>
                           <div class="d-flex gap-3 ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>


                           <div class="visually-hidden" id="E_file1">
                            <div id="div_dossier_employee" >  
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
                           <button class="btn-add" id="add_dossier_employee" href="#">إضافة </button>
                           </div>


                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green">
                              ملف المراسلات
                           </h2>
                           

                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الصادرات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file2">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الصادرات</h4>
                                             </label>
                                             <input class="form-control" name="exportations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الواردات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file3">
                                             <label for="formFile" class="form-label">
                                                <h4>الواردات</h4>
                                             </label>
                                             <input class="form-control" name="importations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف محاضر الجلسات العامة
                           </h2>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">التقارير</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">التقارير</h4>
                                             </label>
                                             <input class="form-control" name="rapports[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">قائمات الحضور</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                    <div class="mb-3 col-12 visually-hidden" id="E_file5">
                                       <label for="formFile" class="form-label">
                                          <h4>قائمات الحضور</h4>
                                       </label>
                                       <input class="form-control" name="listes_presence[]" type="file" multiple id="formFile">
                                    </div>
                            </div>

                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">المحاضر</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input6" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                            <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file6">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">المحاضر</h4>
                                             </label>
                                             <input class="form-control" name="comptes_rendus[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">القوائم</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input7" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file7">
                                             <label for="formFile" class="form-label">
                                                <h4>القوائم</h4>
                                             </label>
                                             <input class="form-control" name="listes[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف اجتماعات مجلس الادارة
                           </h2>
                           <div class="d-flex gap-3 grp">
                            
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دفتر محاضر الجلسات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                            <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">دفتر محاضر الجلسات</h4>
                                             </label>
                                             <input class="form-control" name="registre_comptes_rendus_seances[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الاستدعاءات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-input9" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                            
                           </div>



                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_file9">
                                             <label for="formFile" class="form-label">
                                                <h4>الاستدعاءات</h4>
                                             </label>
                                             <input class="form-control" name="convocations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">برنامج العمل التشاركي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputA" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileA">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">برنامج العمل التشاركي</h4>
                                             </label>
                                             <input class="form-control" name="programme_collaboratif[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              دفتر الانخراطات
                           </h2>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputB" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileB">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">دفتر الانخراطات</h4>
                                             </label>
                                             <input class="form-control" name="registre_adhesions[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green">
                              ملف المنتفعين
                           </h2>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">القوائم المحينة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputC" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileC">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">القوائم المحينة</h4>
                                             </label>
                                             <input class="form-control" name="listes_mises_a_jour[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">طلبات الربط بالشبكة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputD" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class=" col-12 visually-hidden" id="E_fileD">
                                             <label for="formFile" class="form-label">
                                                <h4>طلبات الربط بالشبكة</h4>
                                             </label>
                                             <input class="form-control" name="demandes_raccordement_reseau[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الالتزامات  </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputE" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileE">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الالتزامات  </h4>
                                             </label>
                                             <input class="form-control" name="engagements[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">التوكيلات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputF" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileF">
                                             <label for="formFile" class="form-label">
                                                <h4>التوكيلات</h4>
                                             </label>
                                             <input class="form-control" name="delegations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف أعضاء مجلس الادارة و مهامهم  </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputJ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileJ">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف أعضاء مجلس الادارة و مهامهم  </h4>
                                             </label>
                                             <input class="form-control" name="conseil_administration[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">جرد لممتلكات المجمع</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputH" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>


                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileH">
                                             <label for="formFile" class="form-label">
                                                <h4>جرد لممتلكات المجمع</h4>
                                             </label>
                                             <input class="form-control" name="inventaire_biens_collectifs[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                          
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف البيانات و الاحصاءات حول نشاط المجمع</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputG" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileG">
                                             <label for="formFile" class="form-label">
                                                <h4>ملف البيانات و الاحصاءات حول نشاط المجمع</h4>
                                             </label>
                                             <input class="form-control" name="donnees_statistiques_activite_collectif[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">كراس الزيارات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputK" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="mb-3 col-12 visually-hidden" id="E_fileK">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">كراس الزيارات      </h4>
                                             </label>
                                             <input class="form-control" name="cahiers_visites[]" type="file" multiple id="formFile">
                                          </div>
                          
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>
                        

                        <!-- tab16 -->

                        <div class="tab-pane  col-12" id="tab16">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الملف القانوني                              
                           </h2>
                          


                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف احداث المجمع
                           </h2>
                           

                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الإعلان بالرائد الرسمي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                            <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file2">
                                             <label for="formFile" class="form-label">
                                              <h4 style="text-align:center">الإعلان بالرائد الرسمي</h4>
                                             </label>
                                             <input class="form-control" name="publication_journal_officiel[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> التصريح </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file3">
                                             <label for="formFile" class="form-label">
                                                <h4> التصريح </h4>
                                             </label>
                                             <input class="form-control" name="rapports1[]"  type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green">
                              القوانين و النصوص الخاصة بالمجامع                           </h2>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  القانون الأساسي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">  القانون الأساسي
</h4>
                                             </label>
                                             <input class="form-control" name="statuts_fondamentaux[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">النظام الداخلي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file5">
                                             <label for="formFile" class="form-label">
                                                <h4> النظام الداخلي</h4>
                                             </label>
                                             <input class="form-control" name="reglement_interieur[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                                عقود الانتفاع بالماء المبرمة مع المنتفعين او الفلاحين 
                           </h2>
                           <div class="d-flex gap-3 grp">
                             <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                style="align-items: end;">
                             
                                <label class="switch">
                                <input class="switch-input" id="F_switch-inputZ" onchange="switchChanged(this)" type="checkbox" />
                                <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                <span class="switch-handle"></span>
                                </label>
                             </div>
                             </div>
                             <div class="col-12 ">
                                         <div class="mb-3 col-12 visually-hidden" id="F_fileZ">
                                            <label for="formFile" class="form-label">
                                               <h4> عقود الانتفاع بالماء المبرمة مع المنتفعين او الفلاحين     </h4>
                                            </label>
                                            <input class="form-control" name="contrats_utilisation_eau[]" type="file" multiple id="formFile">
                                         </div>
                                      </div>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              ملف العقود المبرمة مع مختلف الأطراف
                           </h2>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الكهرباء</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الكهرباء </h4>
                                             </label>
                                             <input class="form-control" type="file" name="electricite[]" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> الماء </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-input9" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_file9">
                                             <label for="formFile" class="form-label">
                                                <h4> الماء </h4>
                                             </label>
                                             <input class="form-control" name="eau[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           
                          
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> عقود المناولة
                              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputF" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              </div>
                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileF">
                                             <label for="formFile" class="form-label">
                                                <h4> عقود المناولة</h4>
                                             </label>
                                             <input class="form-control" name="contrats_manutention[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              عقد التصرف في النظام المائي                           </h2>
                              <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputG" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>
                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileG">
                                             <label for="formFile" class="form-label">
                                                <h4>  عقد التصرف في النظام المائي
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="contrat_gestion_systeme_hydrique[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>


                           
                         
                        

                              
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;">
                              ملف أعوان المجمع
                           </h2>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">العقود</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputI" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileI">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">العقود </h4>
                                             </label>
                                             <input class="form-control"  name="contrats[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> ملف الانتداب </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputH" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileH">
                                             <label for="formFile" class="form-label">
                                                <h4> ملف الانتداب </h4>
                                             </label>
                                             <input class="form-control" type="file" name="dossier_mandat[]" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  بطاقات خلاص الأجور
                              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputK" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              </div>

                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileK">
                                             <label for="formFile" class="form-label">
                                                <h4>  بطاقات خلاص الأجور</h4>
                                             </label>
                                             <input class="form-control" name="cartes_versement_salaires[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                              <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  محاضر المصادقة على الانتداب و تحديد الأجرة

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputL" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileL">
                                             <label for="formFile" class="form-label">
                                                <h4>   محاضر المصادقة على الانتداب و تحديد الأجرة
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="proces_verbaux_mandatement_determination_salaires[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                                       <div class="d-flex gap-3 grp">
                           <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف الحالة المدنية للأعوان

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputM" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                     </div>

                        


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileM">
                                             <label for="formFile" class="form-label">
                                                <h4>ملف الحالة المدنية للأعوان
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="dossier_etat_civil_agents[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                  
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف الضمان الاجتماعي
                           </h2>
                             <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> شهادة التسجيل

                              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputN" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              </div>

                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileN">
                                             <label for="formFile" class="form-label">
                                                <h4>   شهادة التسجيل
</h4>
                                             </label>
                                             <input class="form-control" name="certificat_inscription[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                              <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> التصاريح الدورية
                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputO" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>

                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileO">
                                             <label for="formFile" class="form-label">
                                                <h4>  التصاريح الدورية
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="autorisations_periodiques[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> وصولات الدفع 

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputP" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileP">
                                             <label for="formFile" class="form-label">
                                                <h4>وصولات الدفع
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="recus_paiement[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                  
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green">
                              الملف الجبائي  
                           </h2>
                             <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> بطاقة التعريف الجبائية


                              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputQ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              </div>

                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileQ">
                                             <label for="formFile" class="form-label">
                                                <h4>   بطاقة التعريف الجبائية
</h4>
                                             </label>
                                             <input class="form-control" name="carte_identite_fiscale[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                              <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> التصاريح الدورية


                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputR" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                              <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="F_fileR">
                                             <label for="formFile" class="form-label">
                                                <h4>  التصاريح الدورية


  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="1_autorisations_periodiques[]" type="file" multiple id="formFile">
                                          </div>

                                          </div>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> وصولات الدفع 

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="F_switch-inputS" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                              <div class="mb-3 col-12 visually-hidden" id="F_fileS">
                                             <label for="formFile" class="form-label">
                                                <h4>وصولات الدفع
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="1_recus_paiement[]" type="file" multiple id="formFile">
                                          </div>

                          
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>


                              <!-- tab17 -->

                              <div class="tab-pane  col-12" id="tab17">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الملف الفني
                           </h2>
                          


                         
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              نسخة من مثال المنظومة المائية و أمثلة لمختلف المنشآت المائية
                          </h2>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">   محطات الضخ</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                            <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">محطات الضخ</h4>
                                             </label>
                                             <input class="form-control" name="stations_pompage[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> الشبكة المائية</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_file5">
                                             <label for="formFile" class="form-label">
                                                <h4>  الشبكة المائية</h4>
                                             </label>
                                             <input class="form-control" name="reseau_eau[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> الخزانات

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-inputA" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_fileA">
                                             <label for="formFile" class="form-label">
                                                <h4> الخزانات
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="reservoirs[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                 
                          
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              ملف الخصائص و المواصفات الفنية  للتجهيزات 
                           </h2>
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                   
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف الخصائص و المواصفات الفنية  للتجهيزات </h4>
                                             </label>
                                             <input class="form-control" name="caracteristiques_techniques[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           
                          
                         
                              
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              مختلف الدراسات الفنية المتعلقة بالمشروع
                           </h2>
                          

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-inputM" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_fileM">
                                             <label for="formFile" class="form-label">
                                                <h4>مختلف الدراسات الفنية المتعلقة بالمشروع
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="etudes_techniques[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              دفتر محطة الضخ
                           </h2>
                            

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-inputP" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_fileP">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر محطة الضخ
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="registre_pompage[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                                       <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              وثائق متابعة الاستغلال
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-inputV" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_fileV">
                                             <label for="formFile" class="form-label">
                                                <h4> وثائق متابعة الاستغلال

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="documents_suivi[]" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                           الصيانة الدورية و الوقائية  ( برنامج الصيانة ، وثائق متابعة)                            </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="G_switch-inputW" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="G_fileW">
                                             <label for="formFile" class="form-label">
                                                <h4>  الصيانة الدورية و الوقائية

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="maintenance_preventive[]" multiple id="formFile">
                                          </div>
                                       </div>
                         
                          
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next" href="#">متابعة</button>
                           </div>
                        </div>

                        
                        
                              <!-- tab18 -->

                              <div class="tab-pane  col-12" id="tab18">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الملف المالي
                           </h2>
                          


                           <h2 class="title"
                              style="margin-bottom: 20px;margin-right:10px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              الفواتير و مؤيدات الفوترة
                           </h2>
                           

                           
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الفواتير و مؤيدات الفوترة
</h4>
                                             </label>
                                             <input class="form-control" name="factures_approbations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              نسخ من الميزانيات و الموازنات السنوية
                          </h2>
                           
                          <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> نسخ من الميزانيات و الموازنات السنوية</h4>
                                             </label>
                                             <input class="form-control" name="budgets_anuels[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              رفع العدادات الدوري و التقارير الدورية للاستغلال
                          </h2>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputA" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileA">
                                             <label for="formFile" class="form-label">
                                                <h4> رفع العدادات الدوري و التقارير الدورية للاستغلال

  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="releves_compteurs[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>
                          
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              كشوفات الحساب الجاري
                           </h2>
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                   
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> كشوفات الحساب الجاري  </h4>
                                             </label>
                                             <input class="form-control" name="etat_compte_courant[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           
                          
                         
                              
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              مؤيدات المصاريف</h2>
                          

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputM" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileM">
                                             <label for="formFile" class="form-label">
                                                <h4>   مؤيدات المصاريف
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="justificatifs_depenses[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                       <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              كنشات بطاقات الانخراط
                           </h2>
                            

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputJ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileJ">
                                             <label for="formFile" class="form-label">
                                                <h4> كنشات بطاقات الانخراط

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="cartes_adhesion[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              كنشات وصل التسليم
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputL" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileL">
                                             <label for="formFile" class="form-label">
                                                <h4> كنشات وصل التسليم

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="recevabilites_livraison[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                         ملف الاشتراكات ( المال المتداول)</h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputT" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileT">
                                             <label for="formFile" class="form-label">
                                                <h4>ملف الاشتراكات

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="fichier_abonnements[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   


                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              تقارير مراقب الحسابات
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputE" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileE">
                                             <label for="formFile" class="form-label">
                                                <h4>  تقارير مراقب الحسابات

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="rapports_controle_comptable[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              الجذاذات الدورية لمتابعة الاستغلال والفوترة والاستخلاص 
                           </h2>
                            

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputP" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileP">
                                             <label for="formFile" class="form-label">
                                                <h4> 
                                                الجذاذات الدورية لمتابعة الاستغلال والفوترة والاستخلاص 

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="rapports_periodiques[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              دفتر المحاسبة
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputS" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileS">
                                             <label for="formFile" class="form-label">
                                                <h4>  دفتر المحاسبة

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="comptabilite[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              تقارير الوضعية المالية
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputO" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileO">
                                             <label for="formFile" class="form-label">
                                                <h4> تقارير الوضعية المالية

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="rapports_financiers[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputQ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileQ">
                                             <label for="formFile" class="form-label">
                                                <h4>  دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="dettes_fournisseurs[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-top:-10px">
                              قائمة ديون الجمعية ازاء المزودين

                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputU" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           <table class="table col-12 table-borderless">
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileU">
                                             <label for="formFile" class="form-label">
                                                <h4>  قائمة ديون الجمعية ازاء المزودين

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="dettes_association[]" type="file" id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                     

                          
                           <div class="btn-next-con">
                              <button class="btn-back" href="#">رجوع</button>
                              <button class="btn-next1" type="submit" name="submit">تسجيل</button>
                           </div>
                        </div>
                     


                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
    <div class="spinner" style="display:none" id="spinner">
    <span style="color : green">...جاري التحميل ، الرجاء الانتظار</span>
        <div class="spinner-border text-success" role="status">
        </div>
    </div>
    <script>

            const submitButton = document.getElementById('button1');
            const submitButton2 = document.getElementById('button2');
            const fieldNames = ['nom', 'etat_tunisie', 'accreditation', 'decanat', 'date_debut', 'date_creation'];
            const fieldNames2 = ['nom_utilisateur', 'email_utilisateur', 'tel_utilisateur'];

            for (const name of fieldNames) {
                  const element = document.querySelector(`[name="${name}"]`);
                  element.addEventListener('input', onChangeInput);
            }
            for (const name of fieldNames2) {
                  const element2 = document.querySelector(`[name="${name}"]`);
                  element2.addEventListener('input', onChangeInput);
            }

            function onChangeInput() {
                  let isEmpty = false;

                  for (const name of fieldNames) {
                     const element = document.querySelector(`[name="${name}"]`);
                     if (element.value === '') {
                        isEmpty = true;
                     }
                  }

                  if (!isEmpty) {
                     submitButton.disabled = false;
                  } else {
                     submitButton.disabled = true;
                  }
            }
            function onChangeInput2() {
                  let isEmpty = false;

                  for (const name of fieldNames2) {
                     const element = document.querySelector(`[name="${name}"]`);
                     if (element.value === '') {
                        isEmpty = true;
                     }
                  }

                  if (!isEmpty) {
                     submitButton2.disabled = false;
                  } else {
                     submitButton2.disabled = true;
                  }
            }

            function loading (){
               var divbody = document.getElementById("divBody");
               var divLoading = document.getElementById("spinner");
               divbody.style.display = "none";
               divLoading.style.display = "block";
            }
    </script>
       

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
      <!-- Jquery JS-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <!-- Vendor JS-->
      <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
      <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
      <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
      <!-- Main JS-->
      <script src="js/global.js"></script>
      <script src="js/functions.js"></script>
      <script src="js/complement.js"></script>
    
   </body>
</html>
<!-- end document-->