<?php   

if (isset($_SESSION['idDemandeBenefique']))
{

  $idDemande =  $_SESSION['idDemandeBenefique'];

  $sql = "SELECT * FROM demandes_benefique where idDemandeBenefique='$idDemande'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $demande = $result->fetch_assoc();
  }
  else
  {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    //header("Location: ../index.php?page=demandeBenefique");
  }

}
else
{
  $_SESSION['messageClass']="danger";
  $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
  //header("Location: ../index.php?page=demandeBenefique");
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
     
            <div class="table-responsive">
            <div class="col-xl-12 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-header bg-secondary border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">اضافة منتفع</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listeBenefique" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form onsubmit ="return checkInputsBenefiquePI()" method="post" action="controller/controller.php">
              <h6 class="heading-small text-muted mb-4">معلومات المنتفع </h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رمز المنتفع (تلقائي)</label>
                        <input id="id" class="form-control form-control-alternative" placeholder="رمز المنتفع (تلقائي)" type="text" name="idBenefique" readonly value="<?php
                         $random =  mt_rand(100000, 999999) ;
                         $sql = "SELECT idBenefique FROM benefique_pi";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['idBenefique'] == $random)
                                               {
                                                $random = mt_rand(111111, 999999) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">العدد الرتبي  (تلقائي)</label>
                        <input id="id" class="form-control form-control-alternative" placeholder="العدد الرتبي (تلقائي)" type="text" name="numBenefique" readonly value="<?php
                         $sql = "SELECT count(idBenefique) as num FROM benefique_pi where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       
                                           // output data of each row
                                          $row = $result->fetch_assoc();
                                          echo $row["num"];
                                               
                                       
                         ?>">
                      </div>
                    </div> 
                  
        
                    
                  </div>
                  
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">معلومات المستخدم </h6>
                <div class="pl-lg-4">
                  <div class="row">
                  
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">الإسم و اللقب</label>
                        <input type="text" id="nom" name="nom" class="form-control form-control-alternative" placeholder="الإسم و اللقب" value="<?php 
                        if(isset($_SESSION['idDemandeBenefique']))
                        {
                          echo $demande['nom'];
                        }
                       
                       
                       // echo randomName();

                        function randomName() {
                            $firstname = array(
                                'Johnathon',
                                'Anthony',
                                'Erasmo',
                                'Raleigh',
                                'Nancie',
                                'Tama',
                                'Camellia',
                                'Augustine',
                                'Christeen',
                                'Luz',
                                'Diego',
                                'Lyndia',
                                'Thomas',
                                'Georgianna',
                                'Leigha',
                                'Alejandro',
                                'Marquis',
                                'Joan',
                                'Stephania',
                                'Elroy',
                                'Zonia',
                                'Buffy',
                                'Sharie',
                                'Blythe',
                                'Gaylene',
                                'Elida',
                                'Randy',
                                'Margarete',
                                'Margarett',
                                'Dion',
                                'Tomi',
                                'Arden',
                                'Clora',
                                'Laine',
                                'Becki',
                                'Margherita',
                                'Bong',
                                'Jeanice',
                                'Qiana',
                                'Lawanda',
                                'Rebecka',
                                'Maribel',
                                'Tami',
                                'Yuri',
                                'Michele',
                                'Rubi',
                                'Larisa',
                                'Lloyd',
                                'Tyisha',
                                'Samatha',
                            );
                        
                            $lastname = array(
                                'Mischke',
                                'Serna',
                                'Pingree',
                                'Mcnaught',
                                'Pepper',
                                'Schildgen',
                                'Mongold',
                                'Wrona',
                                'Geddes',
                                'Lanz',
                                'Fetzer',
                                'Schroeder',
                                'Block',
                                'Mayoral',
                                'Fleishman',
                                'Roberie',
                                'Latson',
                                'Lupo',
                                'Motsinger',
                                'Drews',
                                'Coby',
                                'Redner',
                                'Culton',
                                'Howe',
                                'Stoval',
                                'Michaud',
                                'Mote',
                                'Menjivar',
                                'Wiers',
                                'Paris',
                                'Grisby',
                                'Noren',
                                'Damron',
                                'Kazmierczak',
                                'Haslett',
                                'Guillemette',
                                'Buresh',
                                'Center',
                                'Kucera',
                                'Catt',
                                'Badon',
                                'Grumbles',
                                'Antes',
                                'Byron',
                                'Volkman',
                                'Klemp',
                                'Pekar',
                                'Pecora',
                                'Schewe',
                                'Ramage',
                            );
                        
                            $name = $firstname[rand ( 0 , count($firstname) -1)];
                            $name .= ' ';
                            $name .= $lastname[rand ( 0 , count($lastname) -1)];
                        
                            return $name;
                        }
                        ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">تاريخ الميلاد</label>
                        <input type="date" name="dateN" id="dateN" class="form-control form-control-alternative" placeholder="تاريخ الميلاد" >
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                        <input name="CIN" type="text" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف" value="<?php
                                  if(isset($_SESSION['idDemandeBenefique']))
                                  {
                                    echo $demande['CIN'];
                                  }
                           
                         ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">بتاريخ</label>
                        <input type="date" name="dateCIN" id="dateCIN" class="form-control form-control-alternative" placeholder="بتاريخ" >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">الديون المتخلدة بذمة المنتفع</label>
                        <input name="dette" type="number" id="dette" class="form-control form-control-alternative" placeholder="الديون المتخلدة بذمة المنتفع">
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">معلومات عامة </h6>
                <div class="pl-lg-4">
                <div class="row">
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">مكان السكنى</label>
                        <input  name="address" type="text" id="address" class="form-control form-control-alternative" placeholder="مكان السكنى" value="<?php 
                        if(isset($_SESSION['idDemandeBenefique']))
                        {
                          echo $demande['address'];
                        }
                         ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">الصفة</label>

                      <select class="form-control form-control-alternative" type="text" name="propriete" placeholder="">
                       <option value="مالك"> مالك</option>
                       <option value="متسوغ"> متسوغ</option>
                      </select>


                      </div>
                    </div>
                  
                  </div>
                  <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">الإتصال  </h6>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رقم الهاتف </label>
                        <input id="tel" name="tel" class="form-control form-control-alternative" placeholder="+216 12345678 " type="number" value="<?php
                          if(isset($_SESSION['idDemandeBenefique']))
                          {
                            echo $demande['tel'];
                          }
                         ?>">
                      </div>
                    </div>
                  </div>

                  <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">معلومات الأرض</h6>
                <div class="row">
                <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم القطعة</label>
                        <input type="number"  name="numPlace" id="numPlace" class="form-control form-control-alternative" placeholder="رقم القطعة"  >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">المساحة</label>
                        <input type="number"  name="aire" id="aire" class="form-control form-control-alternative" placeholder="المساحة"  >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم المقسم</label>
                        <input type="number"  name="numDiviseur" id="aire" class="form-control form-control-alternative" placeholder="رقم المقسم">
                      </div>
                    </div>
                  
                                      </div>
                                      <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">معلومات العداد</h6>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم العداد</label>
                        <input type="number" name="numCompteur" id="numCompteur" class="form-control form-control-alternative" placeholder="رقم العداد" >
                      </div>
                    </div>
             
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم إستهلاك الماء المسجل بالعداد (في حال عداد جديد اكتب 0)  </label>
                        <input type="number" name="donneesCompteur" id="donneesCompteur" class="form-control form-control-alternative" placeholder=" رقم إستهلاك الماء المسجل بالعداد (في حال عداد جديد اكتب 0) "  >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم المأخذ </label>
                        <input type="number" name="numPrise" id="numPrise" list="numPrises" class="form-control form-control-alternative" placeholder="رقم المأخذ " >
                        <datalist id="numPrises">
                                                <?php

                                                   $idPompiste=$_SESSION['idPompiste'];
                                                   $sql = "SELECT * from pompiste where idPompiste='$idPompiste'";

                                                   $result = $conn->query($sql);
                                               
                                                   
                                                       $row = $result->fetch_assoc();
                                                       $idGess=$row['idGess'];
                                                   
                                                   
                                                    $sql = "SELECT numPrise FROM prise_pi where idGess='$idGess' ";
                                                                  $result = $conn->query($sql);
                                                   
                                                                  if ($result->num_rows > 0) {
                                                                   while ($row = $result->fetch_assoc()) {
                                                                   echo "<option>".$row['numPrise']."</option>";
                                                                  
                                                                   
                                                                 }
                                                                  }
                                                    ?>
                                             </datalist>
                      </div>
                    </div>
                  </div>
                  
                  <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">معلومات الحساب</h6>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">البريد الإلكتروني </label>
                        <input  name="email" type="email" id="email" class="form-control form-control-alternative" placeholder="example@gmail.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">كلمة السر</label>
                        <input name="mdp" type="password" id="mdp1" class="form-control form-control-alternative" placeholder="كلمة السر">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">أعد إدخال كلمة السر</label>
                        <input type="password" id="mdp2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر">
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" name="ajoutBenefiquePI" class="btn btn-primary my-4">إضافة</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>
   <script>

  
  
   </script>