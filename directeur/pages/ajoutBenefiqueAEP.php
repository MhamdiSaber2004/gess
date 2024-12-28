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
header("Location: ../index.php?page=demandeBenefique");
  }

}
else
{
  $_SESSION['messageClass']="danger";
  $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=demandeBenefique");
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
                  <a href="index.php?page=<?php if (isset($_SESSION['idDemandeBenefique'])) echo "demandeBenefique" ; else echo "listeBenefiqueAEP" ?>" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form onsubmit ="return checkInputsBenefiqueAEP()" method="post" action="controller/controller.php">
              <h6 class="heading-small text-muted mb-4">معلومات المنتفع </h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رمز المنتفع (تلقائي)</label>
                        <input id="id" class="form-control form-control-alternative" placeholder="رمز المنتفع (تلقائي)" type="text" name="idBenefique" readonly value="<?php
                         $random =  mt_rand(100000, 999999) ;
                         $sql = "SELECT idBenefique FROM benefique_aep where idGess='$idGess'";
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
                         $sql = "SELECT count(idBenefique) as num FROM benefique_aep where idGess='$idGess'";
                                       $result = $conn->query($sql);
                                       
                                       
                                           // output data of each row
                                          $row = $result->fetch_assoc();
                                          echo $row["num"]+1
                                               
                                       
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
                        <input type="date" name="dateCIN" id="dateCIN" class="form-control form-control-alternative" placeholder="بتاريخ" value="<?php  if(isset($_SESSION['idDemandeBenefique']))
                        {
                          echo "";
                        }
                       ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">الديون المتخلدة بذمة المنتفع</label>
                        <input name="dette" type="number" id="dette" class="form-control form-control-alternative" placeholder="الديون المتخلدة بذمة المنتفع" value="<?php
                         if(isset($_SESSION['idDemandeBenefique']))
                         {
                           echo "";
                         }
                       
                        
                         ?>">
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

                      <select class="form-control form-control-alternative" type="text" name="propriete" placeholder="" >
                       <option value="مالك"> مالك</option>
                       <option value="متسوغ"> متسوغ</option>
                      </select>


                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">عدد افراد العائلة </label>
                        <input  name="numFamille" type="text" id="numFamille" class="form-control form-control-alternative" placeholder="عدد افراد العائلة ">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">التجمع السكني</label>
                        <input  name="unionFamiliale" type="text" id="numFamille" class="form-control form-control-alternative" placeholder="التجمع السكني">
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
                <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم القطعة</label>
                        <input type="number"  name="numPlace" id="numPlace" class="form-control form-control-alternative" placeholder="رقم القطعة" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">المساحة</label>
                        <input type="number"  name="aire" id="aire" class="form-control form-control-alternative" placeholder="المساحة" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم المقسم</label>
                        <input type="number" name="numDiviseur" id="numDiviseur" class="form-control form-control-alternative" placeholder="رقم المقسم" >
                      </div>
                    </div>
                                      </div>
                                      <hr class="my-4" />
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
                        <input name="mdp" type="password" id="mdp1" class="form-control form-control-alternative" placeholder="كلمة السر" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">أعد إدخال كلمة السر</label>
                        <input type="password" id="mdp2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر" >
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" name="ajoutBenefique" class="btn btn-primary my-4">إضافة</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>


        <?php  ?>