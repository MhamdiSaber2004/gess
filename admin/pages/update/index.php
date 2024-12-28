<?php session_start();

if (!isset($_SESSION["loginAdmin"])) {
  header("location: ../../../admin");
  exit();
}  

   include "./database/db.php";

   // error_reporting(0);

   if (isset($_GET['idGess'])) {
      $idGess = $_GET['idGess'];
      $type = $_GET['type'];
      include "process.php";

      $sql = "SELECT nom FROM gess WHERE idGess = :idGess";
     $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();
  
      // Fetch the result
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
      if ($row) {
          // Retrieve the 'nom' value
          $nom = $row['nom'];
  
          // Output the retrieved 'nom' value
       
      } 
      else {
         header("Location: ../../pages/notfound.php");
      }



      function getFilesUrl($tab) {
         if ($tab === null) {
             return "لا";
         } 
         else if (substr($tab, 0, 1)=="[") {
           $tab = str_replace("'", "\"", $tab);
             $files = json_decode($tab, true); // Convert the JSON string to an array
             if (is_array($files)) {
                 $output = " ";
                 foreach ($files as $index => $file) {
                     $output .= '&nbsp &nbsp<a href="/gess/pi/documents/' . $file . '" target="_blank">وثيقة ' . ($index + 1) . ' </a>&nbsp &nbsp  ';
                     
                 }
                 return $output;
             } 
             
             else {
                 return "لا ";
             }
         }
         else {
           return '<a href="/gess/update/documents/' . $tab . '" target="_blank">وثيقة   </a>';
         }
       
       }
      
  
  
   
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
      <title> تحيين</title>
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
   </head>
   <body>
      <div class="page-wrapper p-t-200 " id="divBody">
         <div class="wrapper wrapper--w690">
            <div class="card card-1">
               <div class="card-heading">
                  <h2 class="title ttr">تحيين مجمع التنمية الفلاحية <?php echo $nom ; ?></h2>
               </div>
               <div class="card-body">
                 
                    
                     <?php if ($type=="gess") {

                  $sql = "SELECT * FROM gess WHERE idGess = :idGess";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
                  $stmt->execute();

                  // Fetch the result
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);

                  // Output the result
                  if ($result) {
                  
                        
                        
                        ?>
                      <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">
                        <div class="tab-content col-12">
                        <div class="tab-pane active col-12" >
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">تقديم
                              المجمع
                           </h2>
                           <div class="grp col-12 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">مجمع التنمية الفلاحية </label_input>
                                 <input  required class="input--style-1" type="text" name="nom"  value="<?php echo $result['nom']; ?>" placeholder=" " required>
                              </div>
                           </div>
                           <div class="d-flex mx-auto gap-2 grp">
                             
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">المعتمدية</label_input>
                                 <select class="input--style-1" type="email" id="accreditation" onchange="onChangInput()" name="accreditation" required >
                                 <option value="<?php echo $result['accreditation']; ?>"><?php echo $result['accreditation']; ?></option>
                              </select>
                              </div>
                              <div class="inputs-group col-5">
                                 <label_input class="label_input">الولاية</label_input>
                                 <select required  id="etat" onchange="chargerAccreditations()" class="input--style-1" onchange="onChangInput()" type="text" name="etat_tunisie" placeholder="الولاية" required>
                                    <option value="
                                    <?php echo $result['etat_tunisie']; ?>"> <?php  
                                    $x=$result['etat_tunisie'];
                                    $sql1 = "SELECT nom_etat FROM etats_tunisie WHERE id = :id";
      $stmt = $conn->prepare($sql1);

      // Bind the parameter
      $stmt->bindParam(':id', $x, PDO::PARAM_INT);
  
      // Execute the query
      $stmt->execute();
  
      // Fetch the result
      $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
  
      if ($row1) {
          // Retrieve the 'nom' value
          echo $row1['nom_etat'];
  
          // Output the retrieved 'nom' value
       
      } ?></option>
                                    <?php
                                       $sql = "SELECT * FROM etats_tunisie";
                                       $result4 = $conn->query($sql);
                                       
                                       if ($result4->rowCount() > 0) {
                                          // Fetch data using PDO::FETCH_ASSOC to get an associative array
                                          $rows = $result4->fetchAll(PDO::FETCH_ASSOC);
                                          
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
                                 <input class="input--style-1" type="text" name="decanat" value="<?php echo $result['decanat']; ?>" placeholder="العمادة">
                              </div>
                           </div>
                            <div class="d-flex mx-auto gap-4 grp">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">تاريخ التأسيس</label_input>
                                 <input class="input--style-1" type="date" name="date_creation"value="<?php echo $result['date_creation']; ?>" placeholder="">
                              </div>
                             
                              
                           </div>
                           <div class="d-flex mx-auto col-12 gap-4 grp">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">تاريخ بداية نشاط المجمع</label_input>
                                 <input class="input--style-1" type="date" name="date_debut" value="<?php echo $result['date_debut']; ?>" placeholder="">
                              </div>
                              
                           </div>
                          
                           <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" id="button1" type="submit" name="submit01">تحيين</button>
                           </div>
                        </div>
                                    </form>

                     <?php }} ?>







                     <?php if ($type=="utilisateurs") {

                     $sql = "SELECT * FROM utilisateurs  WHERE idGess = :idGess";
                     $stmt = $conn->prepare($sql);
                     $stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
                     $stmt->execute();

                     // Fetch the result
                     $result = $stmt->fetch(PDO::FETCH_ASSOC);

                     // Output the result
                     if ($result) {

                        ?>




                         <!-- tab2 -->

                         <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">
                         <div class="tab-pane  col-12" >
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              المستخدم
                           </h2>
                           <div class="d-flex mx-auto gap-3 grp">
                              <div class="inputs-group col-11">
                              <label_input class="label_input">الصفة</label_input>
                                 <select id="2_select" onchange="selected(this)" class="input--style-1" type="text" name="roleU" placeholder="الولاية">
                                 <option value="<?php echo $result['role_utilisateur']; ?>"> <?php echo $result['role_utilisateur']; ?> </option>
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
                                 <input class="input--style-1" type="text"  value="<?php echo $result['nom_utilisateur']; ?>" name="nom_utilisateur"
                                    placeholder="الاسم و اللقب">
                           </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">   البريد الإلكتروني</label_input>
                                 <input class="input--style-1" type="email" value="<?php echo $result['email_utilisateur']; ?>" name="email_utilisateur"
                                    placeholder="  البريد الإلكتروني ">
                           </div>
                           </div>
                           
                           <div id="email-exists-feedback"></div>

                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                              <label_input class="label_input">رقم الهاتف</label_input>
                              <input class="input--style-1"  type="number"  step="any"  value="<?php echo $result['tel_utilisateur']; ?>" name="tel_utilisateur" placeholder="رقم الهاتف">
                           </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                           <div class="inputs-group col-11">
                              <label_input class="label_input"> كلمة السر</label_input>
                              <input class="input--style-1"  type="text"    value="<?php echo $result['mdp']; ?>" name="mdp">
                           </div>
                           </div>
                           <div class="btn-next-con">
                              <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next"   name="submit02">تحيين</button>
                           </div>
                        </div> 
                         </form>

                        <?php
                     } }

?>



<?php if ($type=="pi_conseil_administration") {

$sql = "SELECT * FROM pi_conseil_administration  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>


<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">
                        <div class="tab-pane  col-12" id="tab3">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">مجلس
                              ادارة المجمع
                           </h2>
                           
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">مجلس</label_input>
                                 <select id="3_select" onchange="selected(this)" class="input--style-1" type="text" name="conseil_administration1" placeholder="الولاية">
                                    <option value="<?php echo $result['conseil_administration']; ?>"><?php echo $result['conseil_administration']; ?></option>
                                 <option value="مجلس منتخب">مجلس منتخب</option>
                                    <option value="هيئة تسييرية">هيئة تسييرية</option>
                                    <option value="هيئة وقتية">هيئة وقتية</option>
                                    <option value="مجلس منحل">مجلس منحل</option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دورية الجلسة العامة</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['seance_generale']) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين دورية الجلسة العامة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="3_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="grp col-12">
                              <div class="mb-3 col-11 visually-hidden" id="3_file1">
                                 <label for="formFile" class="form-label">
                                    <h4 style="text-align:center">دورية الجلسة العامة</h4>
                                 </label>
                                 <input class="form-control" name="seance_generale[]" type="file" multiple id="formFile">
                              </div>
                           </div>
                             <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">تاريخ اخر جلسة عامة</label_input>
                                 <input class="input--style-1" type="date" value="<?php echo $result['derniere_seance']; ?>"  name="derniere_seance" placeholder="">
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">التاريخ المتوقع للجلسة العامة المقبلة</label_input>
                                 <input class="input--style-1" type="date" value="<?php echo $result['date_prevue']; ?>" name="date_prevue" placeholder="" >
                              </div>
                             
                           </div>
                         
                          
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">نصاب اخر جلسة عامة</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['quorum_derniere_seance']) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين   نصاب اخر جلسة عامة</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="3_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="grp col-12">
                              <div class="mb-3 col-11 visually-hidden" id="3_file2">
                                 <label for="formFile" class="form-label">
                                    <h4 style="text-align:center">الوثائق</h4>
                                 </label>
                                 <input class="form-control" type="file" multiple name="quorum_derniere_seance[]" id="formFile">
                              </div>
                           </div>
                            <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">النسبة</label_input>
                                 <input class="input--style-1" type="number"  step="any" value="<?php echo $result['pourcentage']; ?>"  name="pourcentage" placeholder="النسبة">
                              </div>
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit03">تحيين</button>
                           </div>
                        </div>
</form>
                        <?php
                     } }

?>



<?php if ($type=="pi_paysans") {

$sql = "SELECT * FROM pi_paysans  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>


<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">

                        <div class="tab-pane  col-12" id="tab4">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الفلاحين
                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الفلاحين</label_input>
                                 <input class="input--style-1" type="number"  step="any" value="<?php echo $result['nombre_fermiers']; ?>" name="nombre_fermiers" placeholder="عدد الفلاحين">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد عقود الانتفاع</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo $result['nombre_contrats']; ?>" name="nombre_contrats" placeholder="عدد عقود الانتفاع">
                              </div>
                             
                           </div>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">وجود عقود الانتفاع  </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['f_contrat']) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين عقود الانتفاع  </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="4_switch-input9" onchange="switchChanged(this)"  type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                            <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="4_file9">
                                             <label for="formFile" class="form-label">
                                                <h4>عقود الانتفاع</h4>
                                             </label>
                                             <input class="form-control" name="f_contrat[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">تحيين قائمة الفلاحين</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['mise_a_jour']) ?>  </label_input><br>
                                 <label class="switch">
                                 <input class="switch-input" id="4_switch-input2" onchange="switchChanged(this)"  type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="4_file2">
                                             <label for="formFile" class="form-label">
                                                <h4>تحيين قائمة الفلاحين</h4>
                                             </label>
                                             <input class="form-control" name="mise_a_jour[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد المنخرطين</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo $result['nombre_membres']; ?>"  name="nombre_membres" placeholder="عدد المنخرطين">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">مبلغ الانخراط</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo $result['montant_adhesion']; ?>"  name="montant_adhesion" placeholder="مبلغ الانخراط">
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">وجود سجل الانخراط</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['presence_registre']) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين سجل الانخراط</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="3_switch-input3" onchange="switchChanged(this)"  type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="grp col-12">
                              <div class="mb-3 col-11 visually-hidden" id="3_file3">
                                 <label for="formFile" class="form-label">
                                    <h4 style="text-align:center">تحيين  سجل الانخراط</h4>
                                 </label>
                                 <input class="form-control" type="file" name="presence_registre[]" multiple id="formFile">
                              </div>
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit04">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>






                           <?php if ($type=="membre_conseil") { ?>
                              
                              <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">



                        <div class="tab-pane  col-12" id="tab5">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معطيات حول اعضاء المجلس
                           </h2>
                           
                           <div id="DivMembreConseil">
                           <?php
$sql = "SELECT * FROM membre_conseil  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
// Output the result
if($stmt->rowCount() > 0)
{
foreach($results as $result)
if (strlen($result->nom_prenom)>0)
{ {	

   ?><div class="d-flex  gap-3 col-12 grp" name="membreConseilDiv" style="align-items: end;display : none">
   <div class="inputs-group col-11" >
      <label_input class="label_input">أعضاء مجلس الإدارة </label_input>
      <select id="5_select1" onchange="selected(this)" class="input--style-1" type="text" name="role[]" placeholder="أعضاء مجلس الإدارة ">
         <option value="<?php echo htmlentities($result->role);?>"><?php echo htmlentities($result->	role);?></option>
          <option value="رئيس المجمع">رئيس المجمع </option>
         <option value="أمين المال">أمين المال</option>
         <option value="عضو"> عضو</option>
      </select>
   </div>
</div>
<div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   
   <div class="inputs-group col-11" style="display:none;">
      <input class="input--style-1" type="text" name="idus[]"  value="<?php echo htmlentities($result->id_controle_interne);?>">
   </div>
</div>

<div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   
   <div class="inputs-group col-11">
      <label_input class="label_input">الاسم و اللقب</label_input>
      <input class="input--style-1" type="text" name="nom_prenom[]" placeholder="الاسم و اللقب" value="<?php echo htmlentities($result->nom_prenom);?>">
   </div>
</div>
<div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   <div class="inputs-group col-11">
      <label_input class="label_input">العمر</label_input>
      <input class="input--style-1"  type="number" step="any" name="age[]"  value="<?php echo htmlentities($result->age);?>" placeholder="العمر">
   </div>
  
</div>
<div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
  
   <div class="inputs-group col-11">
      <label_input class="label_input">المستوى التعليمي</label_input>
      <select id="5_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education[]" placeholder="الولاية">
      
                        <option  selected="selected" value="<?php echo htmlentities($result->niveau_education);?>" ><?php echo htmlentities($result->niveau_education);?></option>
                        <option value=" تعليم عالي">تعليم عالي</option>
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
      <input class="input--style-1"  type="number" step="any" name="anciennete[]" value="<?php echo htmlentities($result->anciennete);?>" placeholder="الأقدمية">
   </div>
   
</div>
<div class="d-flex col-12 grp" style="align-items: end;">
   <div class="inputs-group col-11">
      <label_input class="label_input">رقم الهاتف</label_input>
      <input class="input--style-1"  type="number" step="any"  name="num_tel[]" value="<?php echo htmlentities($result->num_tel);?>" placeholder="رقم الهاتف">
   </div>
</div>


   <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
 نسخة من بطاقة التعريف الوطنية
</h2>
  

<div class="d-flex gap-3 grp ">
   <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
      style="align-items: end;">
      <label_input class="label_input"><?php echo getFilesUrl($result->cp_cin) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين بطاقة التعريف الوطنية</label_input>
      <label class="switch">
      <input class="switch-input"  onchange="switchChanged(this)" type="checkbox" />
      <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
      <span class="switch-handle"></span>
      </label>
   </div>
  
   </div>



            <div class="col-12 ">
               <div class="mb-3 col-12 " id="Z_file1">
                  <label for="formFile" class="form-label">
                     <h4> 
                     نسخة من بطاقة التعريف الوطنية

                        </h4>
                  </label>
                  
                  <input class="form-control" name="cp_cin[]" type="file" multiple id="formFile">
               </div>
            </div>
            
            <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <a class="btn-add" style="background-color: red !important;"  href="../update/?idGess=<?php echo $idGess ?>&type=membre_conseil&delmembre=<?php echo $result->id_controle_interne ?>">حذف </a>
                              </div>
                           
         <hr><br>

         <?php }}?>



                           
                                    
                                    
                                  
                                       
                                       
         </div>
                         
                        <?php
                     } 

?>  

                             
                        
                          
                           <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" id="addMembereConseil" href="#">إضافة </button>
                              </div>
                              </div>
                   

                        
                        <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit05">تحيين</button>
                        </div>
                        </form>
                        </div>
                    

                        <?php
                     } 

?>






      <?php if ($type=="controle_interne") { ?>
                              
                              <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">

                        <div class="tab-pane  col-12" id="tab6">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معطيات حول هيئة المراقبة الداخلية
                           </h2>
                           <div id="DivSurveillanceInterne">

                           <?php
$sql = "SELECT * FROM controle_interne  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
// Output the result
if($stmt->rowCount() > 0)
{
foreach($results as $result)
if (strlen($result->nom_prenom)>0)
{ {	?>
                           <div class="d-flex  gap-3 col-12 grp" name="SurveillanceInterneDiv" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input"> أعضاء هيئة المراقبة الداخلية </label_input>
                                 <select id="6_select1" onchange="selected(this)" class="input--style-1" type="text" name="role1[]" placeholder="الولاية">
                                 <option value="<?php echo htmlentities($result->role);?>"><?php echo htmlentities($result->role);?></option>
                                 <option value="مراقب أول" >مراقب أول </option>
                                                    <option value="مراقب ثاني">مراقب ثاني  </option>
                                                    <option value="مراقب ثالث ">مراقب ثالث </option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
   
   <div class="inputs-group col-11" style="display:none;">
      <input class="input--style-1" type="text" name="idcon[]"  value="<?php echo htmlentities($result->id_membre_conseil);?>">
   </div>
</div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text" name="nom_prenom1[]" value="<?php echo htmlentities($result->nom_prenom);?>" placeholder="الاسم و اللقب">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العمر</label_input>
                                 <input class="input--style-1"  type="number" step="any" name="age1[]" value="<?php echo htmlentities($result->age);?>"  placeholder="العمر">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المستوى التعليمي</label_input>
                                 <select id="6_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education1[]	" placeholder="الولاية">
                                 <option value="<?php echo htmlentities($result->niveau_education);?>" selected="selected"><?php echo htmlentities($result->niveau_education);?> </option>
                                 <option value=" تعليم عالي">تعليم عالي</option>
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
                                 <input class="input--style-1"  type="number" step="any" value="<?php echo htmlentities($result->anciennete);?>" name="anciennete1[]" placeholder="الأقدمية">
                              </div>
                              
                           </div>
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input class="input--style-1"  type="number" step="any" value="<?php echo htmlentities($result->num_tel);?>"  name="num_tel1[]" placeholder="رقم الهاتف">
                              </div>
                           </div>
                                  
                                    <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <a class="btn-add" style="background-color: red !important;"  href="../update/?idGess=<?php echo $idGess ?>&type=membre_conseil&delcont=<?php echo $result->	id_membre_conseil ?>">حذف </a>
                              </div>
                          
         <hr><br>

         <?php }}?>




                   

                        </div>
                        <div class="d-flex  gap-3 col-12 ">
                              <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" id="addSurveillanceInterne" href="#">إضافة </button>
                              </div>
                           </div>
                        <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit06">تحيين</button>
                        </div>
                        </form>


                        </div>
                          </div>
                         <?php
                      }   }
 
 ?>


<?php if ($type=="pi_reunions_conseil_administration") {

$sql = "SELECT * FROM pi_reunions_conseil_administration WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

      
      
      ?>
    <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">


                        <div class="tab-pane  col-12" id="tab7">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              اجتماعات مجلس الادارة
                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الاجتماعات خلال السنة السابقة</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['nombre_reunions_annee_precedente']; ?>" name="nombre_reunions_annee_precedente" step="any"  name="phone" placeholder="عدد الاجتماعات خلال السنة السابقة">
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">وجود محاضر الجلسات</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['presence_proces_verbaux']) ?>  </label_input><br>
                                 <label_input class="label_input">تحيين محاضر الجلسات</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="7_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="7_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">تحيين محاضر الجلسات</h4>
                                             </label>
                                             <input class="form-control" name="presence_proces_verbaux[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">معدل الحاضرين خلال الاجتماع</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['moyenne_presence_reunions']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين معدل الحاضرين خلال الاجتماع </label_input>
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
                                                <h4>تحيين معدل الحاضرين خلال الاجتماع </h4>
                                             </label>
                                             <input class="form-control" name="moyenne_presence_reunions[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">غيابات الأعضاء المبررين</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['absences_membres_justifiees']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين  غيابات الأعضاء المبررين</label_input>
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
                                                <h4 style="text-align:center">غيابات الأعضاء المبررين</h4>
                                             </label>
                                             <input class="form-control" name="absences_membres_justifiees[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دورية الاجتماعات</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['periodicite_reunions']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين دورية  الاجتماعات</label_input> 
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
                                                <h4>دورية الاجتماعات</h4>
                                             </label>
                                             <input class="form-control" name="periodicite_reunions[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">طرح المشاكل الداخلية</label_input>
                                 <div class="form-outline">
                                    <textarea class="form-control" name="presentation_problemes_internes" rows="4"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                           </div>
                           <script>
    // Assuming you have a function to set the value dynamically
    function setDynamicValue() {
        var dynamicValue = "<?php echo $result['presentation_problemes_internes']; ?>";
        document.querySelector('textarea[name="presentation_problemes_internes"]').value = dynamicValue;
    }

    // Call the function after the page has loaded
    window.onload = function() {
        setDynamicValue();
    };
</script>

                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit07">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>





                      
         <?php if ($type=="pi_informations_agents") { ?>
                              
                              <form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">

                        <div class="tab-pane  col-12" id="tab8">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معلومات حول أعوان المجمع
                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                              <div id="DivEmployee">
                              <?php
$sql = "SELECT * FROM pi_informations_agents  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
// Output the result
if($stmt->rowCount() > 0)
{
foreach($results as $result)
if (strlen($result->nom_prenom2)>0)
{{  	?>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">أعوان التنفيذ للمجامع</label_input>
                                 <select id="8_select1" onchange="selected(this)" class="input--style-1"  type="text" name="agents_executifs2[]" placeholder="الولاية">
                                <option value="<?php echo htmlentities($result->agents_executifs2);?>" ><?php echo htmlentities($result->agents_executifs2);?></option>
                                 <option value="مدير فني" > مدير فني</option>
                                                    <option value="موزع الماء"> موزع الماء</option>
                                                    <option value="حارس  النظام المائي">حارس النظام المائي</option>
                                                    <option value="حارس الشبكة  ">  حارس الشبكة</option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">الاسم و اللقب</label_input>
                                 <input class="input--style-1" type="text" name="nom_prenom2[]" value="<?php echo htmlentities($result->nom_prenom2);?>" placeholder="الاسم و اللقب">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المستوى التعليمي</label_input>
                                 <select id="8_select2" onchange="selected(this)" class="input--style-1" type="text" name="niveau_education2[]" placeholder="الولاية">
                                 <option value="<?php echo htmlentities($result->niveau_education2);?>" ><?php echo htmlentities($result->niveau_education2);?></option>
                                 <option value=" تعليم عالي" >تعليم عالي</option>
                                                    <option value="ثانوي ">ثانوي</option>
                                                    <option value="أساسي">أساسي</option> 
                                                    <option value="ابتدائي">ابتدائي</option>
                                                    <option value="غير متعلم">غير متعلم</option> </select> 
                              </div>
                             
                           </div>
                           <div class="inputs-group col-11" style="display:none;">
                              <input class="input--style-1" type="text" name="idbom[]"  value="<?php echo htmlentities($result->id);?>">
                           </div>
                          
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">العمر</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo htmlentities($result->age2);?>" name="age2[]" placeholder="العمر">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الأجر</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo htmlentities($result->salaire2);?>"  name="salaire2[]" placeholder="الأجر">
                              </div>
                             
                           </div>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">عقد العمل</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result->contrat_travail2) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين  عقد العمل </label_input>
                                 <label class="switch">
                                 <input class="switch-input"  type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 ">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">عقد العمل</h4>
                                             </label>
                                             <input class="form-control" name="contrat_travail2[]" type="file"  id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الضمان الاجتماعي</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result->securite_sociale2) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين الضمان الاجتماعي</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="8_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 " >
                                             <label for="formFile" class="form-label">
                                                <h4>الضمان الاجتماعي</h4>
                                             </label>
                                             <input class="form-control" type="file" name="securite_sociale2[]"  id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">رقم الهاتف</label_input>
                                 <input class="input--style-1" type="number" step="any" value="<?php echo $result->numero_telephone2 ?>"  name="numero_telephone2[]" placeholder="رقم الهاتف">
                              </div>
                           </div>
                           <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <a class="btn-add" style="background-color: red !important;"  href="../update/?idGess=<?php echo $idGess ?>&type=membre_conseil&delmoun=<?php echo $result->	id ?>">حذف </a>
                              </div>
                          
         <hr><br>

         <?php }}?>




                   

                        </div>
                        <div class="d-flex  gap-3 col-12 ">
                              <div class="inputs-group col-12 d-flex align-items-center flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <button class="btn-add" id="addEmployee" href="#">إضافة </button>
                              </div>
                           </div>
                        <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit08">تحيين</button>
                        </div>
                        </form>


                        </div>
                          </div>
                         <?php
                      }   }
 
 ?>


<?php if ($type=="pi_formation_tutorat") {

$sql = "SELECT * FROM pi_formation_tutorat  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>


<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">


                        <div class="tab-pane  col-12" id="tab9">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              التكوين و التأطير
                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="accordion col-12" id="accordionExample">
                                 <div class="accordion-item">
                                    <h2 class="accordion-header">
                                       <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                       أعضاء مجلس الادارة
                                       </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <div class="accordion-body">
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;margin-top:-10px">
                                                رئيس المجمع
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" value="<?php echo $result['conseil_administration_president_motifs_formation']; ?>" type="text" name="conseil_administration_president_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['conseil_administration_president_nombre_formations']; ?>" type="number" step="any"  name="conseil_administration_president_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" type="number" value="<?php echo $result['conseil_administration_president_nombre_encadrements']; ?>" step="any"  name="conseil_administration_president_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                                
                                             </div>
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                                أمين المال
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" type="text" value="<?php echo $result['conseil_administration_tresorier_motifs_formation']; ?>" name="conseil_administration_tresorier_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" type="number" step="any"  value="<?php echo $result['conseil_administration_tresorier_nombre_formations']; ?>" name="conseil_administration_tresorier_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" type="number" step="any" value="<?php echo $result['conseil_administration_tresorier_nombre_encadrements']; ?>"  name="conseil_administration_tresorier_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                               
                                             </div>
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                                عضو
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" type="text" value="<?php echo $result['conseil_administration_membre_motifs_formation']; ?>" name="conseil_administration_membre_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" type="number" step="any"  value="<?php echo $result['conseil_administration_membre_nombre_formations']; ?>" name="conseil_administration_membre_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" type="number" step="any"  value="<?php echo $result['conseil_administration_membre_nombre_encadrements']; ?>" name="conseil_administration_membre_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="accordion-item">
                                    <h2 class="accordion-header">
                                       <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       أعوان هيئة المراقبة الداخلية 
                                       </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <div class="accordion-body">
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                                مراقب 1
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" type="text" value="<?php echo $result['controleurs_internes_controleur1_motifs_formation']; ?>" name="controleurs_internes_controleur1_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" type="number" step="any"  value="<?php echo $result['controleurs_internes_controleur1_nombre_formations']; ?>" name="controleurs_internes_controleur1_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" type="number" step="any"  value="<?php echo $result['controleurs_internes_controleur1_nombre_encadrements']; ?>" name="controleurs_internes_controleur1_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                                
                                             </div>
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                                مراقب 2
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" type="text" value="<?php echo $result['controleurs_internes_controleur2_motifs_formation']; ?>" name="controleurs_internes_controleur2_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['controleurs_internes_controleur2_nombre_formations']; ?>" type="number" step="any"  name="controleurs_internes_controleur2_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['controleurs_internes_controleur2_nombre_encadrements']; ?>" type="number" step="any"  name="controleurs_internes_controleur2_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                               
                                             </div>
                                             <h2 class="title"
                                                style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                                مراقب 3
                                             </h2>
                                             <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" value="<?php echo $result['agents_magasin_directeur_technique_motifs_formation']; ?>" type="text" name="agents_magasin_directeur_technique_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_directeur_technique_nombre_formations']; ?>" type="number" step="any"  name="agents_magasin_directeur_technique_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1"  value="<?php echo $result['agents_magasin_directeur_technique_nombre_encadrements']; ?>"type="number" step="any"  name="agents_magasin_directeur_technique_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                               
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="accordion-item">
                                    <h2 class="accordion-header">
                                       <button class="accordion-button collapsed"  type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       أعوان المجمع 
                                       </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <h2 class="title"
                                             style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                             المدير الفني
                                          </h2>
                                          <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_hydro_motifs_formation']; ?>" type="text" name="agents_magasin_garde_systeme_hydro_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_hydro_nombre_formations']; ?>" type="number" step="any"  name="agents_magasin_garde_systeme_hydro_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_hydro_nombre_encadrements']; ?>" type="number" step="any"  name="agents_magasin_garde_systeme_hydro_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                                
                                             </div>
                                          <h2 class="title"
                                             style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                             حارس النظام المائي
                                          </h2>
                                          <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_eau_motifs_formation']; ?>" type="text" name="agents_magasin_garde_systeme_eau_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_eau_nombre_formations']; ?>" type="number" step="any"  name="agents_magasin_garde_systeme_eau_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_garde_systeme_eau_nombre_encadrements']; ?>" type="number" step="any"  name="agents_magasin_garde_systeme_eau_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                                
                                             </div>
                                          <h2 class="title"
                                             style="margin-bottom: 20px;font-size:28px;text-align: right;">
                                             الموزع
                                          </h2>
                                          <div class="inputs-group col-12">
                                                <label_input class="label_input">محاور التكوين</label_input>
                                                <input class="input--style-1" value="<?php echo $result['agents_magasin_distributeur_motifs_formation']; ?>" type="text" name="agents_magasin_distributeur_motifs_formation" placeholder="محاور التكوين">
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                               
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التكوينية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_distributeur_nombre_formations']; ?>" type="number" step="any"  name="agents_magasin_distributeur_nombre_formations" placeholder="عدد الدورات التكوينية">
                                                </div>
                                             </div>
                                             <div class="d-flex  gap-5 col-12 grp" style="align-items: end;">
                                                <div class="inputs-group col-12">
                                                   <label_input class="label_input">عدد الدورات التأطيرية</label_input>
                                                   <input class="input--style-1" value="<?php echo $result['agents_magasin_distributeur_nombre_encadrements']; ?>" type="number" step="any"  name="agents_magasin_distributeur_nombre_encadrements" placeholder="عدد الدورات التأطيرية">
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next"   name="submit09">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>




<?php if ($type=="pi_donnees_points_distribution") {

$sql = "SELECT * FROM pi_donnees_points_distribution  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">

                        <div class="tab-pane  col-12" id="tab10">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              معطيات حول نقاط التوزيع
                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة الجملية بالهكتار</label_input>
                                 <input class="input--style-1" value="<?php echo $result['surface_totale']; ?>" type="number" step="any"  name="surface_totale" placeholder="المساحة الجملية بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة خارج المنطقة السقوية</label_input>
                                 <input class="input--style-1" value="<?php echo $result['surface_hors_zone']; ?>" type="number" step="any"  name="surface_hors_zone" placeholder="المساحة خارج المنطقة السقوية">
                              </div>
                             
                           </div>
                            <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الساكورات</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_compteurs']; ?>" type="number"  step="any" name="nombre_compteurs" placeholder="عدد الساكورات">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الساكورات دون عداد</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_sans_compteur']; ?>" type="number" step="any"  name="nombre_sans_compteur" placeholder="عدد الساكورات دون عداد">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الالتزام</label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="A_file1">
                                             <label for="formFile" class="form-label">
                                                <h4>الالتزام</h4>
                                             </label>
                                             <input class="form-control" type="file" name="engagement_2[]" multiple id="formFile">
                                          </div>
                                       </div>
                          
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الساكورات المعطلة</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_compteurs_desactives']; ?>" type="number" step="any"  name="nombre_compteurs_desactives" placeholder="عدد الساكورات المعطلة">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الساكورات الغير مرخص لها</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_compteurs_non_autorises']; ?>" type="number" step="any"  name="nombre_compteurs_non_autorises" placeholder="عدد الساكورات الغير مرخص لها">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد الساكورات المطابقة للمواصفات</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_compteurs_conformes_specifications']; ?>" type="number" step="any"  name="nombre_compteurs_conformes_specifications" placeholder="عدد الساكورات المطابقة للمواصفات">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">عدد مزود الصهاريج</label_input>
                                 <input class="input--style-1" value="<?php echo $result['nombre_fournisseurs_citernes']; ?>" type="number" step="any"  name="nombre_fournisseurs_citernes" placeholder="عدد مزود الصهاريج">
                              </div>
                           </div>
                            <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">توزيع الماء حسب</label_input>
                                 <select id="A_select1" onchange="selected(this)" class="input--style-1" type="text" name="distribution_eau_selon" placeholder="الولاية">
                                 <option value="<?php echo $result['distribution_eau_selon']; ?>"><?php echo $result['distribution_eau_selon']; ?></option>
                                                <option value="الطلب">الطلب</option>
                                                <option value="الدورة المائية">الدورة المائية</option>
                                                <option value="توفرالماء">توفرالماء</option>
                                 </select>
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp">
                             
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">  وثيقة متابعة التوزيع</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['document_suivi_distribution']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين وثيقة متابعة التوزيع </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input2" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden " id="A_file2">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> تحيين وثيقة متابعة التوزيع</h4>
                                                
                                             </label>
                                             <input class="form-control" type="file" name="document_suivi_distribution[]" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">تحيين الوثائق</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['mise_a_jour_documents']) ?>  </label_input><br>
                                 
                                 <label class="switch">
                                 <input class="switch-input" id="A_switch-input3" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="A_file3">
                                             <label for="formFile" class="form-label">
                                                <h4>تحيين الوثائق</h4>
                                             </label>
                                             <input class="form-control" name="mise_a_jour_documents[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الملاحظات </label_input>
                                 <div class="form-outline">
                                    <textarea class="form-control" name="observations" id="textAreaExample1" rows="4"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                           </div>
                           <script>function setDynamicValue() {
        var dynamicValue = "<?php echo $result['observations']; ?>";
        document.querySelector('textarea[name="observations"]').value = dynamicValue;
    }

    // Call the function after the page has loaded
    window.onload = function() {
        setDynamicValue();
    };</script>
                           <div class="btn-next-con">
                           <a class="btn-back" href="<?php echo "../../pages/info.php?id=$idGess" ?>">رجوع</a>
                              <button class="btn-next" type="submit"  name="submit10">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>
                        


                        

<?php if ($type=="pi_plantes_presentes") {

$sql = "SELECT * FROM pi_plantes_presentes  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">





                        <div class="tab-pane  col-12" id="tab11">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الغراسات الموجودة
</h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الغراسات الكبرى                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['cultures_grandes_surface_hectares']; ?>"  class="input--style-1" type="number" step="any"  name="cultures_grandes_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input value="<?php echo $result['cultures_grandes_surface_goutte_goutte']; ?>"  class="input--style-1" type="number" step="any"  name="cultures_grandes_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input value="<?php echo $result['cultures_grandes_surface_arrosage']; ?>"  class="input--style-1" type="number" step="any"  name="cultures_grandes_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input value="<?php echo $result['cultures_grandes_surface_irrigation_traditionnelle']; ?>"  class="input--style-1" type="number" step="any"  name="cultures_grandes_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                              
                           </div>


                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الأعلاف                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['fourrages_surface_hectares']; ?>"  class="input--style-1" type="number" step="any"  name="fourrages_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input value="<?php echo $result['fourrages_surface_goutte_goutte']; ?>"  class="input--style-1" type="number" step="any"  name="fourrages_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input value="<?php echo $result['fourrages_surface_arrosage']; ?>"  class="input--style-1" type="number" step="any"  name="fourrages_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input value="<?php echo $result['fourrages_surface_irrigation_traditionnelle']; ?>"  class="input--style-1" type="number" step="any"  name="fourrages_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                             
                           </div>
                       <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الخضراوات                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['legumes_surface_hectares']; ?>"  class="input--style-1" type="number" step="any"  name="legumes_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input  value="<?php echo $result['legumes_surface_goutte_goutte']; ?>" class="input--style-1" type="number" step="any"  name="legumes_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input value="<?php echo $result['legumes_surface_arrosage']; ?>"  class="input--style-1" type="number" step="any"  name="legumes_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input value="<?php echo $result['legumes_surface_irrigation_traditionnelle']; ?>"  class="input--style-1" type="number" step="any"  name="legumes_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                              
                           </div>
                     <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الأشجار المثمرة
                           </h2>
                          
                           
                         
                                                                                         
                          <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['arbres_fruitiers_surface_hectares']; ?>"  class="input--style-1" type="number" step="any"  name="arbres_fruitiers_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input value="<?php echo $result['arbres_fruitiers_surface_goutte_goutte']; ?>"  class="input--style-1" type="number" step="any"  name="arbres_fruitiers_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input value="<?php echo $result['arbres_fruitiers_surface_arrosage']; ?>"  class="input--style-1" type="number"   step="any"  name="arbres_fruitiers_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input value="<?php echo $result['arbres_fruitiers_surface_irrigation_traditionnelle']; ?>"  class="input--style-1" type="number"  step="any" name="arbres_fruitiers_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                             
                           </div>
                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              أشجار الزيتون
                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['oliviers_surface_hectares']; ?>"  class="input--style-1" type="number"  step="any" name="oliviers_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input value="<?php echo $result['oliviers_surface_goutte_goutte']; ?>"  class="input--style-1" type="number"  step="any" name="oliviers_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                            
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input value="<?php echo $result['oliviers_surface_arrosage']; ?>"  class="input--style-1" type="number"  step="any" name="oliviers_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input value="<?php echo $result['oliviers_surface_irrigation_traditionnelle']; ?>"  class="input--style-1" type="number"  step="any" name="oliviers_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                              
                           </div>
                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              أشجار أخرى
                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">النوع</label_input>
                                 <input  value="<?php echo $result['autres_arbres_type']; ?>" class="input--style-1" type="text" name="autres_arbres_type" placeholder=" النوع ">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['autres_arbres_surface_hectares']; ?>"  class="input--style-1" type="number"  step="any" name="autres_arbres_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input  value="<?php echo $result['autres_arbres_surface_goutte_goutte']; ?>" class="input--style-1" type="number"  step="any" name="autres_arbres_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input  value="<?php echo $result['autres_arbres_surface_arrosage']; ?>" class="input--style-1" type="number"  step="any" name="autres_arbres_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input  value="<?php echo $result['autres_arbres_surface_irrigation_traditionnelle']; ?>" class="input--style-1" type="number"  step="any" name="autres_arbres_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                             
                           </div>
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              البقوليات
                           </h2>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المساحة بالهكتار</label_input>
                                 <input value="<?php echo $result['legumineuses_surface_hectares']; ?>"  class="input--style-1" type="number"  step="any" name="legumineuses_surface_hectares" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري قطرة قطرة</label_input>
                                 <input value="<?php echo $result['legumineuses_surface_goutte_goutte']; ?>"  class="input--style-1" type="number"  step="any" name="legumineuses_surface_goutte_goutte" placeholder="الري قطرة قطرة">
                              </div>
                             
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري بالرش</label_input>
                                 <input  value="<?php echo $result['legumineuses_surface_arrosage']; ?>" class="input--style-1" type="number"  step="any" name="legumineuses_surface_arrosage" placeholder="الري بالرش">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الري التقليدي</label_input>
                                 <input  value="<?php echo $result['legumineuses_surface_irrigation_traditionnelle']; ?>" class="input--style-1" type="number"  step="any" name="legumineuses_surface_irrigation_traditionnelle" placeholder="الري التقليدي">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المجموع</label_input>
                                 <input  value="<?php echo $result['total']; ?>" class="input--style-1" type="number"  step="any" name="total" placeholder="المساحة بالهكتار">
                              </div>
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit11">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>



                        

<?php if ($type=="pi_aspects_financiers") {

$sql = "SELECT * FROM pi_aspects_financiers  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">


                        <div class="tab-pane  col-12" id="tab12">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الجوانب المالية
                           </h2>
                           <!--<label class="custom-toggle">
                              <input type="checkbox" >
                              <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                              </label>-->
                             
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">بيع الماء بالساعة</label_input>
                                 <label class="switch">
                                 <input class="switch-input"  <?php echo $result['vente_eau_par_heure']==1 ?  "checked " : '' ?> type="checkbox" name="vente_eau_par_heure" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                          
                         
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                          
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">التسعيرة بالساعة</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['tarif_par_heure'] ?>"  step="any" name="tarif_par_heure" placeholder="التسعيرة بالساعة">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">بيع الماء بالمتر المكعب</label_input>
                                 <label class="switch">
                                 <input class="switch-input" <?php echo $result['vente_eau_par_metre_cube']==1 ?  "checked " : '' ?> type="checkbox" name="vente_eau_par_metre_cube" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                           </div>

                           
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                           <div class="inputs-group col-11">
                                 <label_input class="label_input">التسعيرة بالمتر المكعب</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['tarif_par_metre_cube'] ?>"  step="any" name="tarif_par_metre_cube" placeholder="التسعيرة بالمتر المكعب">
                              </div>
                             
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الدفع</label_input>
                                 <select id="C_select1" onchange="selected(this)" class="input--style-1" type="text" name="paiement" placeholder="الولاية">
                                 <option value="<?php echo $result['paiement'] ?>"><?php echo $result['paiement'] ?></option>
                                  <option value="مسبق">مسبق</option>
                                                <option value=" بالتقسيط"> بالتقسيط</option>
                                                <option value="بعد التحصيل">بعد التحصيل   </option>
                                 </select>
                              </div>
                           </div>
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">كيف تم تحديد تسعير الماء</label_input>
                                 <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample1" name="methode_fixation_tarif_eau" rows="4"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                           </div>
                           <script>
                               function setDynamicValue() {
                                 var dynamicValue = "<?php echo $result['methode_fixation_tarif_eau']; ?>";
                                 document.querySelector('textarea[name="methode_fixation_tarif_eau"]').value = dynamicValue;
                              }

                              // Call the function after the page has loaded
                              window.onload = function() {
                                 setDynamicValue();
                              };

                           </script>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">بيع بالتقسيط</label_input>
                                 <label class="switch">
                                 <input class="switch-input" <?php echo $result['vente_a_credit']==1 ?  "checked " : '' ?> type="checkbox" name="vente_a_credit" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">المبلغ بالتقسيط</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['montant_a_credit']; ?>"  step="any" name="montant_a_credit" placeholder="المبلغ بالتقسيط">
                              </div>
                              
                           </div>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">تأخير في الدفع</label_input>
                                 <label class="switch">
                                 <input class="switch-input" type="checkbox" <?php echo $result['retard_paiement']; ?> name="retard_paiement"/>
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون الفلاحين</label_input>
                                 <input class="input--style-1" type="number"  value="<?php echo $result['dettes_agriculteurs']; ?>" step="any" name="dettes_agriculteurs" placeholder=" المبلغ بالدينار التونسي">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون المزودين</label_input>
                                 <input class="input--style-1" type="number"  value="<?php echo $result['dettes_fournisseurs']; ?>" step="any" name="dettes_fournisseurs" placeholder=" المبلغ بالدينار التونسي">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون الشركة التونسية للكهرباء و الغاز</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['dettes_steg']; ?>"  step="any" name="dettes_steg" placeholder=" المبلغ بالدينار التونسي">
                              </div>
                              
                           </div>
                           
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">دين المندوبية الجهوية للتنمية الفلاحية</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['dettes_crda']; ?>"  step="any" name="dettes_crda" placeholder=" المبلغ بالدينار التونسي">
                              </div>
                              
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">ديون أخرى</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['autres_dettes']; ?>"  step="any" name="autres_dettes" placeholder=" المبلغ بالدينار التونسي">
                              </div>
                           </div>
                           <div class="d-flex col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">وصف الديون</label_input>
                                 <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample1" name="description_dettes" rows="4"></textarea>
                                    <label class="form-label" for="textAreaExample"></label>
                                 </div>
                              </div>
                           </div>
                           <script>
                               function setDynamicValue() {
                                 var dynamicValue = "<?php echo $result['description_dettes']; ?>";
                                 document.querySelector('textarea[name="description_dettes"]').value = dynamicValue;
                              }

                              // Call the function after the page has loaded
                              window.onload = function() {
                                 setDynamicValue();
                              };

                           </script>
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">الرصيد الحالي</h2>
                              <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الصندوق</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['caisse']; ?>"  step="any" name="caisse" placeholder="الصندوق">
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 grp" style="align-items: end;">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">الحساب الجاري</label_input>
                                 <input class="input--style-1" type="number" value="<?php echo $result['compte_courant']; ?>"  step="any" name="compte_courant" placeholder="الحساب الجاري">
                              </div>
                             
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit12">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>





<?php if ($type=="pi_suivi_pompage_distribution_eau") {

$sql = "SELECT * FROM pi_suivi_pompage_distribution_eau  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">





                        <div class="tab-pane   col-12" id="tab13">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              متابعة ضخ و توزيع المياه
                           </h2>
                           <div class="d-flex mx-auto gap-3 grp">
                             
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">كمية المياه التي تم ضخها</label_input>
                                 <input class="input--style-1" type="number"  value="<?php echo $result['quantite_eau_pompee']; ?>"  step="any" name="quantite_eau_pompee" placeholder="كمية المياه التي تم ضخها" id="num2" oninput="calculateSum()">
                              </div>
                           </div>
                           <div class="d-flex mx-auto gap-3 grp">
                              <div class="inputs-group col-11">
                                 <label_input class="label_input">كمية المياه الموزعة</label_input>
                                 <input class="input--style-1" type="number"   value="<?php echo $result['quantite_eau_distribuee']; ?>" step="any" name="quantite_eau_distribuee" id="num1" placeholder="كمية المياه الموزعة" oninput="calculateSum()">
                              </div>
                              <?php echo $result['vente_a_credit']==1 ?  "checked " : '' ?> 
                           </div>
                           <div class="d-flex mx-auto gap-3 grp col-12">
                           <div class="inputs-group col-11">
                              <label_input class="label_input">نسبة الضياع (بالمئة)</label_input>
                              <input id="result"  class="input--style-1" type="number" value="<?php echo $result['taux_perte']; ?>"  step="any" name="taux_perte" placeholder="نسبة الضياع (بالمئة)" disabled>
                           </div>
                           </div>
                           
                           <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit13">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>







<?php if ($type=="pi_logistique_mojamaa") {

$sql = "SELECT * FROM pi_logistique_mojamaa  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">






                        <div class="tab-pane  col-12" id="tab14">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوضعية اللوجستية للمجمع                                
                           </h2>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">محل</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['local']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="local"/>
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">مكتب</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['bureau']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="bureau" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">كراسي</label_input>
                                 <label class="switch">
                                 <input  <?php echo $result['chaises']==1 ?  "checked " : '' ?> class="switch-input" type="checkbox" name="chaises" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">خزانة</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['armoire']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="armoire" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">لوحة إعلانات</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['panneau_publicitaire']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="panneau_publicitaire"/>
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">حاسوب</label_input>
                                 <label class="switch">
                                 <input  <?php echo $result['ordinateur']==1 ?  "checked " : '' ?> class="switch-input" type="checkbox" name="ordinateur" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">هاتف</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['telephone']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="telephone"/>
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">فاكس</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['fax']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="fax" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">طابعة</label_input>
                                 <label class="switch">
                                 <input <?php echo $result['imprimante']==1 ?  "checked " : '' ?>  class="switch-input" type="checkbox" name="imprimante"/>
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              <div class="inputs-group col-5 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">دراجة</label_input>
                                 <label class="switch">
                                 <input  <?php echo $result['velo']==1 ?  "checked " : '' ?> class="switch-input" type="checkbox" name="velo" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="d-flex  gap-3 col-12 ">
                           </div>
                           <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit14">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>






<?php if ($type=="documents_administratifs") {

$sql = "SELECT * FROM documents_administratifs  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">




                        <div class="tab-pane  col-12" id="tab15">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الوثائق الادارية                               
                           </h2>
                           <!-- <h2 class="title"
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
                           </div> -->


                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:22px;text-align: right;color:green">
                              ملف المراسلات
                           </h2>
                           

                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الصادرات</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['exportations']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين الصادرات</label_input>
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
                                                <h4 style="text-align:center"> تحيين الصادرات</h4>
                                             </label>
                                             <input class="form-control" name="exportations[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">الواردات</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['importations']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين الواردات</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['rapports']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين التقارير</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['rapports']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين قائمات الحضور</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['comptes_rendus']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين المحاضر</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['listes']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين القوائم</label_input>
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
                                 <label_input class="label_input">  دفتر محاضر الجلسات</label_input>
                                 
                                 <label_input class="label_input"><?php echo getFilesUrl($result['registre_comptes_rendus_seances']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين دفتر محاضر الجلسات</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['convocations']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين الاستدعاءات</label_input>
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
                                 <label_input class="label_input">برنامج العمل التشاركي </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['programme_collaboratif']) ?>  </label_input><br>
                                 <label_input class="label_input"> تحيين برنامج العمل التشاركي</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['registre_adhesions']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين دفتر الانخراطات</label_input>
                               
                                 
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['listes_mises_a_jour']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين القوائم المحينة</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['demandes_raccordement_reseau']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين طلبات الربط بالشبكة</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['engagements']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   الالتزامات</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['delegations']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   التوكيلات</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['conseil_administration']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   ملف أعضاء مجلس الادارة و مهامهم </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['inventaire_biens_collectifs']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   جرد لممتلكات المجمع</label_input>
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
                                 <label_input class="label_input">ملف مطالب الاقتصاد في الماء  </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['dossier_revendications_economie_eau']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   ملف مطالب الاقتصاد في الماء </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="E_switch-inputI" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="E_fileI">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف مطالب الاقتصاد في الماء  </h4>
                                             </label>
                                             <input class="form-control" name="dossier_revendications_economie_eau[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">ملف البيانات و الاحصاءات حول نشاط المجمع</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['donnees_statistiques_activite_collectif']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   ملف البيانات و الاحصاءات حول نشاط المجمع<</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['cahiers_visites']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  كراس الزيارات</label_input>
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
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit15">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>








<?php if ($type=="dossier_juridique") {

$sql = "SELECT * FROM dossier_juridique  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">



                        
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
                                  <label_input class="label_input"><?php echo getFilesUrl($result['publication_journal_officiel']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين الإعلان بالرائد الإعلان الرسمي</label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['rapports1']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين التصريح   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['statuts_fondamentaux']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين القانون الأساسي   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['reglement_interieur']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين النظام الداخلي   </label_input>
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
                                <label_input class="label_input"><?php echo getFilesUrl($result['contrats_utilisation_eau']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  عقود الانتفاع بالماء المبرمة مع المنتفعين او الفلاحين    </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['electricite']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  الكهرباء   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['eau']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين الماء    </label_input>
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
                              <label_input class="label_input"><?php echo getFilesUrl($result['contrats_manutention']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين عقود المناولة   </label_input>
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
                              عقد التصرف في النظام المائي
                           </h2>

                           
                              <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['contrat_gestion_systeme_hydrique']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  عقد التصرف في النظام المائي   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['contrats']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  العقود   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['dossier_mandat']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  ملف الانتداب   </label_input>
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
                              <label_input class="label_input"><?php echo getFilesUrl($result['cartes_versement_salaires']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  بطاقات خلاص الأجور     </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['proces_verbaux_mandatement_determination_salaires']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  حاضر المصادقة على الانتداب و تحديد الأجرة   </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['dossier_etat_civil_agents']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين ملف الحالة المدنية للأعوان   </label_input>
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
                              <label_input class="label_input"><?php echo getFilesUrl($result['certificat_inscription']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  شهادة التسجيل    </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['autorisations_periodiques']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  التصاريح الدورية      </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['recus_paiement']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  وصولات الدفع   </label_input>
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
                              <label_input class="label_input"><?php echo getFilesUrl($result['carte_identite_fiscale']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  بطاقة التعريف  الجبائية     </label_input>
                                 
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['1_autorisations_periodiques']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  التصاريح الدورية      </label_input>
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['1_recus_paiement']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  وصولات الدفع      </label_input>
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
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit16">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>







<?php if ($type=="pi_dossier_technique") {

$sql = "SELECT * FROM pi_dossier_technique  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">





                        
                              <!-- tab17 -->

                   
                        
                              <div class="tab-pane  col-12" id="tab17">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الملف الفني
                           </h2>
                          


                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              نسخة من مثال المستغلات الفلاحية
                           </h2>
                           

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Exploitations_Agricoles']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين   نسخة من مثال المستغلات الفلاحية      </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                       
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">نسخة من مثال المستغلات الفلاحية
</h4>
                                             </label>
                                             <input class="form-control" type="file" name="Exploitations_Agricoles[]" multiple id="formFile">
                                          </div>
                                       </div>
                                 
                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              نسخة من مثال المنظومة المائية و أمثلة لمختلف المنشآت المائية
                          </h2>
                           <div class="d-flex gap-3 grp">
                              
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input">   محطات الضخ</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Stations_Pompage']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  محطات   الضخ        </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">محطات الضخ</h4>
                                             </label>
                                             <input class="form-control" type="file" name="Stations_Pompage[]" multiple id="formFile">
                                          </div>
                                       </div>
                           <div class="d-flex gap-3 grp">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> الشبكة المائية</label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Reseau_Maien']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين  الشبكة   المائية        </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-input5" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                              
                           </div>

                           <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_file5">
                                             <label for="formFile" class="form-label">
                                                <h4>  الشبكة المائية</h4>
                                             </label>
                                             <input class="form-control" type="file" name="Reseau_Maien[]" multiple id="formFile">
                                          </div>
                                       </div>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"> الخزانات

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Reservoirs']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين     الخزانات        </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputA" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                        
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileA">
                                             <label for="formFile" class="form-label">
                                                <h4> الخزانات
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Reservoirs[]" multiple id="formFile">
                                          </div>
                                       </div>
                              
                          
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                           ملف الخصائص و المواصفات الفنية  للتجهيزات                            </h2>
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Caracteristiques_Normes']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين     ملف الخصائص و المواصفات الفنية  للتجهيزات            </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">ملف الخصائص و المواصفات الفنية  للتجهيزات </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Caracteristiques_Normes[]" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                           
                          
                         
                              
                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              مختلف الدراسات الفنية المتعلقة بالمشروع
                           </h2>
                          

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 <label_input class="label_input"><?php echo getFilesUrl($result['Etudes_Techniques']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين    مختلف الدراسات الفنية المتعلقة بالمشروع            </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputM" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>
                             

                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileM">
                                             <label for="formFile" class="form-label">
                                                <h4>مختلف الدراسات الفنية المتعلقة بالمشروع
                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Etudes_Techniques[]" multiple id="formFile">
                                          </div>
                                       </div>
                                    
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر محطة الضخ
                           </h2>
                            

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Registre_Pompage']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين       دفتر محطة الضخ            </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputP" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileP">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر محطة الضخ
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Registre_Pompage[]" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              نموذج للدورة المائية
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Cycle_Eau']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين         نموذج للدورة المائية            </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputS" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileS">
                                             <label for="formFile" class="form-label">
                                                <h4>  نموذج للدورة المائية 
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Cycle_Eau[]" multiple id="formFile">
                                          </div>
                                       </div>
                                

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر استهلاك ماء الري
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Registre_Consommation']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            دفتر استهلاك ماء الري              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputO" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileO">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر استهلاك ماء الري

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Registre_Consommation[]" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر توزيع الماء
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Registre_Distribution']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            دفتر توزيع الماء              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputQ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileQ">
                                             <label for="formFile" class="form-label">
                                                <h4>    دفتر توزيع الماء 
  
                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Registre_Distribution[]" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;"> <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر الأذون بالتوزيع

                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Permis_Distribution']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين                دفتر الأذون بالتوزيع              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputU" onchange="switchChanged(this)" type="checkbox" />
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
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileU">
                                             <label for="formFile" class="form-label">
                                                <h4>  دفتر الأذون بالتوزيع

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Permis_Distribution[]" multiple id="formFile">
                                          </div>
                                       </div>
                                    </td>
                                    
                                 </tr>
                               
                              </tbody>
                           </table>

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              وثائق متابعة الاستغلال
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Documents_Suivi']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين                وثائق متابعة الاستغلال              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputV" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                           
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileV">
                                             <label for="formFile" class="form-label">
                                                <h4> وثائق متابعة الاستغلال

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Documents_Suivi[]" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                           الصيانة الدورية و الوقائية  ( برنامج الصيانة ، وثائق متابعة)                            </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Maintenance_Preventive']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            الصيانة الدورية و الوقائية              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputW" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileW">
                                             <label for="formFile" class="form-label">
                                                <h4>  الصيانة الدورية و الوقائية

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Maintenance_Preventive[]" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر متابعة طلبات التوزيع
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">

                                 </label_input>
                                 <label_input class="label_input"><?php echo getFilesUrl($result['Registre_Demandes_Distribution']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين         دفتر متابعة طلبات التوزيع              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="H_switch-inputX" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="H_fileX">
                                             <label for="formFile" class="form-label">
                                                <h4> دفتر متابعة طلبات التوزيع

                                                   </h4>
                                             </label>
                                             <input class="form-control" type="file" name="Registre_Demandes_Distribution[]" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                        
                                       <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit17">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>





                     
<?php if ($type=="pi_dossier_financier") {

$sql = "SELECT * FROM pi_dossier_financier  WHERE idGess = :idGess";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idGess', $idGess, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
if ($result) {

   ?>

<form class="wizard-container" method="POST"  id="js-wizard-form" onsubmit="loading()"  enctype="multipart/form-data">




                        
                        <div class="tab-pane  col-12" id="tab18">
                           <h2 class="title"
                              style="margin-bottom: 20px;font-size:28px;text-align: center;margin-top:-10px">
                              الملف المالي
                           </h2>
                          


                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الفواتير و مؤيدات الفوترة
                           </h2>
                           

                           
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['factures_et_mouidates']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            الفواتير و مؤيدات الفوترة              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-input1" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file1">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center">الفواتير و مؤيدات الفوترة
</h4>
                                             </label>
                                             <input class="form-control" name="factures_et_mouidates[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                  
                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              نسخ من الميزانيات و الموازنات السنوية
                          </h2>
                           
                          <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['copies_budgets_annuels']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين             نسخ من الميزانيات و الموازنات السنوية              </label_input>
                                 <label class="switch">
                                 
                                 <input class="switch-input" id="I_switch-input4" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                        
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file4">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> نسخ من الميزانيات و الموازنات السنوية</h4>
                                             </label>
                                             <input class="form-control" name="copies_budgets_annuels[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                  
                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              رفع العدادات الدوري و التقارير الدورية للاستغلال
                          </h2>

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['releve_compteurs_rapports']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين           رفع العدادات الدوري و التقارير الدورية للاستغلال              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputA" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileA">
                                             <label for="formFile" class="form-label">
                                                <h4> رفع العدادات الدورية و التقارير الدورية للاستغلال

  
                                                   </h4>
                                             </label>
                                             <input class="form-control" name="releve_compteurs_rapports[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   
                          
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              كشوفات الحساب الجاري
                           </h2>
                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['etats_compte_courant']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين              كشوفات الحساب الجاري              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-input8" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                           </div>

                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_file8">
                                             <label for="formFile" class="form-label">
                                                <h4 style="text-align:center"> كشوفات الحساب الجاري  </h4>
                                             </label>
                                             <input class="form-control" name="etats_compte_courant[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    
                          
                         
                              
                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              مؤيدات المصاريف
                           </h2>
                          

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['mouidates_depenses']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين           مؤيدات المصاريف              </label_input>

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
                                                <h4>  مؤيدات المصاريف </h4>
                                             </label>
                                             <input class="form-control" name="mouidates_depenses[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                  
                         <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              كنشات بطاقات الانخراط
                           </h2>
                            

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['cartes_adhesion']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين              كنشات بطاقات الانخراط              </label_input>
                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputP" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileP">
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['recevabilites_livraison']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين             كنشات وصل التسليم              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputS" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileS">
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
                                 <label_input class="label_input"><?php echo getFilesUrl($result['fichier_abonnements']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين              ملف الاشتراكات              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputO" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileO">
                                             <label for="formFile" class="form-label">
                                                <h4>ملف الاشتراكات

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="fichier_abonnements[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                        <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              ملف مخطط التعريفة
                           </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['fichier_tarification']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين              ملف  ملف مخطط التعريفة              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputQ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileQ">
                                             <label for="formFile" class="form-label">
                                                <h4>  ملف مخطط التعريفة

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="fichier_tarification[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                    

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              تقارير مراقب الحسابات
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['rapports_controle_comptable']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            تقارير مراقب الحسابات              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputU" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileU">
                                             <label for="formFile" class="form-label">
                                                <h4>  تقارير مراقب الحسابات

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="rapports_controle_comptable[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                           <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              الجذاذات الدورية لمتابعة الاستغلال و الفوترة و الاستخلاص
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['registres_suivi_exploitation_facturation_encaissement']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين             الجذاذات الدورية لمتابعة الاستغلال و الفوترة و الاستخلاص              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputV" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                        
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileV">
                                             <label for="formFile" class="form-label">
                                                <h4>  الجذاذات الدورية لمتابعة الاستغلال و الفوترة و الاستخلاص

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="registres_suivi_exploitation_facturation_encaissement[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر المحاسبة
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['livre_comptabilite']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين              دفتر المحاسبة              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputW" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileW">
                                             <label for="formFile" class="form-label">
                                                <h4>  دفتر المحاسبة

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="livre_comptabilite[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                        <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              تقارير الوضعية المالية
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['rapports_situation_financiere']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين            تقارير الوضعية المالية              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputX" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                          
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileX">
                                             <label for="formFile" class="form-label">
                                                <h4>  تقارير الوضعية المالية

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="rapports_situation_financiere[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['registre_listes_dettes_agriculteurs_beneficiaires']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين                دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputY" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                         
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileY">
                                             <label for="formFile" class="form-label">
                                                <h4>  دفتر أو قائمات في الديون لدى الفلاحين أو المنتفعين

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="registre_listes_dettes_agriculteurs_beneficiaires[]" type="file" multiple id="formFile">
                                          </div>
                                       </div>
                                   

                          <h2 class="title" style="margin-bottom: 20px;font-size:22px;text-align: right;color:green;margin-left:20px;">
                              قائمة ديون الجمعية ازاء المزودين
                        </h2>
                             

                           <div class="d-flex gap-3 grp ">
                              <div class="inputs-group col-11 d-flex align-items-end flex-column bd-highlight mb-3"
                                 style="align-items: end;">
                                 <label_input class="label_input"><?php echo getFilesUrl($result['liste_dettes_association_fournisseurs']) ?>  </label_input><br>
                                 <label_input class="label_input">  تحيين               قائمة ديون الجمعية ازاء المزودين              </label_input>

                                 <label class="switch">
                                 <input class="switch-input" id="I_switch-inputZ" onchange="switchChanged(this)" type="checkbox" />
                                 <span class="switch-label" data-on="نعم" data-off="لا" style="font-size: 16px;"></span>
                                 <span class="switch-handle"></span>
                                 </label>
                              </div>
                             
                              </div>


                        
                                       <div class="col-12 ">
                                          <div class="mb-3 col-12 visually-hidden" id="I_fileZ">
                                             <label for="formFile" class="form-label">
                                                <h4>  قائمة ديون الجمعية ازاء المزودين

                                                   </h4>
                                             </label>
                                             <input class="form-control" name="liste_dettes_association_fournisseurs[]" type="file" multiple id="formFile">
                                          </div>
                                  
                     

                          
                        
                                          <div class="btn-next-con">
                           <a class="btn-back"  href="<?php echo "../../pages/info.php?id=$idGess" ?>" >رجوع</a>
                              <button class="btn-next" type="submit"  name="submit18">تحيين</button>
                           </div>
                        </div>
                        
</form>
                        <?php
                     } }

?>



                        
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
       </div>
      <div class="spinner" style="display:none" id="spinner">
    <span style="color : green">...جاري التحميل ، الرجاء الانتظار</span>
        <div class="spinner-border text-success" role="status">
        </div>
   
      <script>

            const submitButton = document.getElementById('button1');
            const submitButton2 = document.getElementById('button2');
            const fieldNames = ['nom', 'etat_tunisie', 'accreditation', 'decanat', 'date_debut', 'date_creation'];
            const fieldNames2 = [ 'nom_utilisateur', 'email_utilisateur', 'tel_utilisateur'];

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
    
      <!-- Jquery JS-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <!-- Vendor JS-->
      <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
      <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
      <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
      <!-- Main JS-->
      <script src="js/global.js"></script>
      <script src="js/functions.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="js/complement.js"></script>
   </body>
</html>
<!-- end document-->
<?php 

if (isset($_GET['delmembre'])){
   $idMembre=$_GET['delmembre'];
   $sqlDelete = "DELETE FROM membre_conseil WHERE id_controle_interne = :idToDelete AND idGess = :idGess";
   $stmtDelete = $conn->prepare($sqlDelete);
   $stmtDelete->bindParam(':idToDelete', $idMembre, PDO::PARAM_INT);
   $stmtDelete->bindParam(':idGess', $idGess, PDO::PARAM_INT);

   $stmtDelete->execute();

   // Check if any rows were affected
   if ($stmtDelete->rowCount() > 0) {
      header("Location: ../../pages/info.php?id=$idGess");
   } 

}
if (isset($_GET['delcont'])){
   $idMembre=$_GET['delcont'];
   $sqlDelete = "DELETE FROM controle_interne WHERE id_membre_conseil  = :idToDelete AND idGess = :idGess";
   $stmtDelete = $conn->prepare($sqlDelete);
   $stmtDelete->bindParam(':idToDelete', $idMembre, PDO::PARAM_INT);
   $stmtDelete->bindParam(':idGess', $idGess, PDO::PARAM_INT);

   $stmtDelete->execute();

   // Check if any rows were affected
   if ($stmtDelete->rowCount() > 0) {
      header("Location: ../../pages/info.php?id=$idGess");
   } 

}
if (isset($_GET['delmoun'])){
   $idMembre=$_GET['delmoun'];
   $sqlDelete = "DELETE FROM pi_informations_agents WHERE id  = :idToDelete AND idGess = :idGess";
   $stmtDelete = $conn->prepare($sqlDelete);
   $stmtDelete->bindParam(':idToDelete', $idMembre, PDO::PARAM_INT);
   $stmtDelete->bindParam(':idGess', $idGess, PDO::PARAM_INT);

   $stmtDelete->execute();

   // Check if any rows were affected
   if ($stmtDelete->rowCount() > 0) {
      header("Location: ../../pages/info.php?id=$idGess");
   } 

}
?>


<?php
} else {
   include "../notfound.php";
}

?>