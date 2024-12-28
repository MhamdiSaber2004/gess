
<?php 



    $idBenefique=$_SESSION['idBenefique'];
    $sql = "SELECT * FROM benefique$type where idBenefique=$idBenefique";
    $result = $conn->query($sql);
                                       
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc() ;
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
                  <h3 class="mb-0">معلومات المنتفع</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=dashboard" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form  method="post" action="controller/controller.php">
              <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible fade <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden"  ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
              <h6 class="heading-small text-muted mb-4">معلومات المنتفع </h6>
                <div class="pl-lg-4">

                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رمز المنتفع (تلقائي)</label>
                        <input id="id" class="form-control form-control-alternative" placeholder="رمز المنتفع (تلقائي)" type="text" name="idBenefique" readonly value="<?php echo $_SESSION['idBenefique'] ?>">
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رقم الهاتف </label>
                        <input id="tel" name="tel" class="form-control form-control-alternative" placeholder="+216 12345678 " type="number" value="<?php echo $row['tel'] ?>">
                      </div>
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
                        <label class="form-control-label" for="input-email">تغيير كلمة السر</label>
                        <input name="mdpN1" type="password" id="mdpN1" class="form-control form-control-alternative" placeholder="تغيير كلمة السر" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">أعد إدخال كلمة السر</label>
                        <input name="mdpN2" type="password" id="mdpN2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر" >
                      </div>
                    </div>

                  </div>
                  <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label text-red" for="input-email">الرجاء إدخال كلمات السر القديمة لإكمال التعديل </label>
                        <input name="mdp" type="password" id="mdp" class="form-control form-control-alternative" placeholder="الرجاء إدخال كلمات السر لإكمال التعديل " >
                      </div>
                    </div>

                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" onclick="return checkInputsParametreComptee()" name="parametreCompte" class="btn btn-primary my-4">تحيين</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
        </div>
   <script>
    function checkInputsParametreComptee(){

  var nom = document.getElementById("nom").value;
 
  var tel = document.getElementById("tel").value;
 
  var email = document.getElementById("email").value;
  var mdpN1 = document.getElementById("mdpN1").value;
  var mdpN2 = document.getElementById("mdpN2").value;
  var mdp = document.getElementById("mdp").value;
  
  var erreur = document.getElementById("erreur");


  
  if(nom=="" || tel=="" || email=="" || mdp=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }


  if(mdpN1!="")
  {
    if(mdpN1!=mdpN2)
    {
      erreur.innerHTML="كلمات السر الجديدة غير مطابقة"
      return false;
  
    }
    if(mdpN1.length < 8)
    {
      erreur.innerHTML="كلمات السر الجديدة يجب أن تكون أكثر من 8 أحرف وأرقام"
      return false;
  
    }


  }

  if( mdp.length < 8)
  {
    erreur.innerHTML="كلمة السر القديمة يجب أن تكون أكثر من 8 أحرف وأرقام"
    return false;

  }



return true;

}

   </script>