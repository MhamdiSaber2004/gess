<!-- Main content -->
<div class="main-content">
<?php
   include "controller/controller.php";
                     $msg="";
                    $idAdmin = $_SESSION['loginAdmin'];

                    // Create a prepared statement
                    $stmt = $conn->prepare("SELECT * FROM admin WHERE idAdmin = ?");
                
                    // Bind the email value as a parameter
                    $stmt->bind_param("s", $idAdmin);
                
                    // Execute the statement
                    $stmt->execute();
                
                    // Get the result
                    $result = $stmt->get_result();
                
                    // Fetch a single row (since email is unique)
                    $row = $result->fetch_assoc();
                
                    if ($row) {
                        // You can access the data using $row['column_name']
                        $combinedData = $row;
                    } 
                     ?>
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
              <h3 class="mb-0">اعدادات الحساب</h3>
            </div>
            <div class="col-4 text-right">
              <a href="index.php" class="btn btn-sm btn-primary">رجوع</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form   method="post">
            <h6 class="heading-small text-muted mb-4">   </h6>
            <div class="pl-lg-4">
              <div class="row">
             

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address"> الاسم و اللقب</label>
                    <input  class="form-control form-control-alternative" placeholder=" الاسم و اللقب" type="text" name="nom" value="<?php echo $combinedData["nom"]?>" required>
                    <datalist id="numeroCompteur">

                   

                    </datalist>
                  </div>
                </div>
                
                
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">البريد الإلكتروني </label>
                    <input id="detail" name="email" type="email"  class="form-control form-control-alternative" value="<?php echo $combinedData["email"]?>" placeholder="البريد الإلكتروني " required >
                                     </div>
                </div>

                <!--<div class="col-lg-12">
                  <div class="form-group">

                  <label class="form-control-label" for="input-first-name"> رقم الهاتف</label>

                  <input id="detail" name="tele" type="number" rows="4" class="form-control form-control-alternative" value="<?php echo $combinedData["tele"]?>" placeholder=" رقم الهاتف " required >
                                     </div>


                  </div>-->
                </div>
                                  </div>
                                  <div class="row">
               
                                  <div class="col-lg-12">
                 <div class="form-group">
                   <label class="form-control-label" for="input-country"> تغيير كلمة المرور</label>
                   <input type="password" class="form-control form-control-alternative" placeholder=" تغيير كلمة المرور" name="pwd" >
                 </div>
               </div>

               <div class="row">
               
               <div class="col-lg-12">
                   <div class="form-group">
                     <label class="form-control-label" for="input-country">    تأكيد  كلمة المرور</label>
                     <input type="password"  class="form-control form-control-alternative" placeholder="    تأكيد  كلمة المرور" name="pwdConfirm" >
                   </div>
                 </div>
               
                    
         
          
            </div>
            <div class="row">
            </div>
            <h6 class="heading-small text-muted mb-4 text-red" id="erreur"><?php echo $msg; ?><br></h6>
            <div class="text-center">
              <button type="submit" name="updateData" class="btn btn-primary my-4">تسجيل </button>
            </div>
          </form>
        </div>
      </div>
    </div>

       
      </div>
    </div>

    