<?php
if(isset($_GET['idBenefique']) && ! empty ( $_GET['idBenefique'] ))
{
    $idBenefique=$_GET['idBenefique'];
    $sql = "SELECT * FROM benefique_aep where idBenefique=$idBenefique";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
   
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
                  <a href="index.php?page=listeBenefiqueAEP" class="btn btn-sm btn-primary">رجوع</a>
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
                        <input id="id" class="form-control form-control-alternative" placeholder="رمز المنتفع (تلقائي)" type="text" name="idBenefique" readonly value="<?php echo $row['idBenefique'] ?>">
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
                        <input type="text" id="nom" name="nom" class="form-control form-control-alternative" placeholder="الإسم و اللقب" value="<?php echo $row['nom'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">تاريخ الميلاد</label>
                        <input type="date" name="dateN" id="dateN" class="form-control form-control-alternative" placeholder="تاريخ الميلاد" value="<?php echo $row['dateN'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                        <input name="CIN" type="text" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف" value="<?php echo $row['CIN'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">بتاريخ</label>
                        <input type="date" name="dateCIN" id="dateCIN" class="form-control form-control-alternative" placeholder="بتاريخ" value="<?php echo $row['dateCIN'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city"> 



                        <?php 
                        $numCompteur=$row['numCompteur'];
                        $sql1="SELECT * from consommation_aep where numCompteur='$numCompteur' "; 
                        $result1 = $conn->query($sql1);
   
 
                        if ($result1->num_rows > 0) {
                         $consomme=true;
                         echo "  لا يمكنك تغير الديون المتخلدة إذا كان هناك إستهلك مسجل للمنتفع";

                        }
                        else{
                          echo " الديون المتخلدة بذمة المنتفع";

                        }
                        ?> 
                        </label>
                        <input name="dette" type="number" id="dette" class="form-control form-control-alternative" placeholder="الديون المتخلدة بذمة المنتفع" value="<?php echo $row['dette'] ?>"
                        <?php 
                        if($consomme)
                        echo "readonly";
                        
                             ?>
                             
                        >
                        
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
                        <input  name="address" type="text" id="address" class="form-control form-control-alternative" placeholder="مكان السكنى" value="<?php echo $row['address'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">الصفة</label>

                      <select class="form-control form-control-alternative" type="text" name="propriete" placeholder="" >
                   <option value="مالك" <?php if($row['propriete']=="مالك") echo "selected" ?>> مالك</option>
                   <option value="متسوغ" <?php if($row['propriete']=="متسوغ") echo "selected" ?>> متسوغ</option>
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
                        <input id="tel" name="tel" class="form-control form-control-alternative" placeholder="+216 12345678 " type="number" value="<?php echo $row['tel'] ?>">
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
                        <input type="number"  name="numPlace" id="numPlace" class="form-control form-control-alternative" placeholder="رقم القطعة" value="<?php echo $row['numPlace'] ?>" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">المساحة</label>
                        <input type="number"  name="aire" id="aire" class="form-control form-control-alternative" placeholder="المساحة" value="<?php echo $row['aire'] ?>" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم المقسم</label>
                        <input type="number" name="numDiviseur" id="numDiviseur" class="form-control form-control-alternative" placeholder="رقم المقسم" value="<?php echo $row['numDiviseur'] ?>">
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
                        <input type="number" name="numCompteur" id="numCompteur" class="form-control form-control-alternative" placeholder="رقم العداد" value="<?php echo $row['numCompteur'] ?>">
                      </div>
                    </div>
             
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">
                        <?php 
                        $numCompteur=$row['numCompteur'];
                        $sql1="SELECT * from consommation_aep where numCompteur='$numCompteur' "; 
                        $result1 = $conn->query($sql1);
   
 
                        if ($result1->num_rows > 0) {
                         $consomme=true;
                         echo "  لا يمكنك تغير الإستهلاك إذا كان هناك إستهلك مسجل للمنتفع";

                        }
                        else{
                          echo "  رقم إستهلاك الماء المسجل بالعداد (في حال عداد جديد اكتب 0) ";

                        }
                        ?>  
                        
                       </label>
                        <input type="number" name="donneesCompteur" id="donneesCompteur" class="form-control form-control-alternative" placeholder=" رقم إستهلاك الماء المسجل بالعداد (في حال عداد جديد اكتب 0) "  value="<?php echo $row['donneesCompteur'] ?>"
                        <?php 
                        if($consomme)
                        echo "readonly";
                        
                             ?>
                             
                        >
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
                        <input  name="email" type="email" id="email" class="form-control form-control-alternative" placeholder="example@gmail.com" value="<?php echo $row['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">كلمة السر</label>
                        <input name="mdp" type="password" id="mdp1" class="form-control form-control-alternative" placeholder="كلمة السر" value="<?php echo $row['mdp'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">أعد إدخال كلمة السر</label>
                        <input type="password" id="mdp2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر" value="<?php echo $row['mdp'] ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" name="modifBenefiqueAEP" class="btn btn-primary my-4">تحيين</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>



<?php 
     }
    }
}

?>