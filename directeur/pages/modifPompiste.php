<?php
if(isset($_GET['id']) && ! empty ( $_GET['id'] ))
{
    $id=$_GET['id'];
    $sql = "SELECT * FROM pompiste where idPompiste=$id";
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
              <h3 class="mb-0">تحيين معطيات حارس النظام المائي</h3>
            </div>
            <div class="col-4 text-right">
              <a href="index.php?page=listePompiste" class="btn btn-sm btn-primary">رجوع</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form  action="controller/controller.php" onsubmit ="return checkInputsPompiste()" method="post">
            <h6 class="heading-small text-muted mb-4">معلومات المستخدم </h6>
            <div class="pl-lg-4">
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">رمز الحارس (تلقائي)</label>
                    <input id="id" class="form-control form-control-alternative" placeholder="رمز الحارس (تلقائي)" type="text" name="id" readonly value="<?php echo $row['idPompiste']; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">إسم الحارس</label>
                    <input type="nom" id="nom" class="form-control form-control-alternative" placeholder="" name="nom" value="<?php echo $row['nom']; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">تاريخ الميلاد</label>
                    <input type="date" id="dateN" class="form-control form-control-alternative" placeholder="تاريخ الميلاد" name="dateN" value="<?php echo $row['dateN']; ?>">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                    <input type="number" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف" name="CIN" value="<?php if(strlen($row['CIN'])<8) echo '0'.$row['CIN']; else echo $row['CIN'];  ?>">
                  </div>
                </div>
               
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">بتاريخ</label>
                    <input type="date" id="dateCIN" class="form-control form-control-alternative" placeholder="بتاريخ" name="dateCIN" value="<?php echo $row['dateCIN']; ?>">
                  </div>
                </div>
                
              </div>
              <div class="col-lg-12">
                  <div class="form-group">

                  <label class="form-control-label" for="input-first-name">صفة المهمة</label>

                  <select class="form-control form-control-alternative" type="text" placeholder="" name="payement" >
                   <option value="مقابل منحة شهرية" <?php if($row['payement']=="مقابل منحة شهرية") {echo "selected";} ?> > مقابل منحة شهرية</option>
                   <option value="مقابل نسبة من المداخيل"<?php if($row['payement']=="مقابل نسبة من المداخيل") {echo "selected";} ?>> مقابل نسبة من المداخيل</option>
                   <option value="من دون مقابل"<?php if($row['payement']=="من دون مقابل") {echo "selected";} ?>>من دون مقابل</option>
                  </select>


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
                    <label class="form-control-label" for="input-first-name">الحالة العائلية</label>
                    <select class="form-control form-control-alternative" type="text" name="famille" placeholder="" name="famille" >
                    <option value="أعزب" <?php if($row['famille']=="أعزب") {echo "selected";} ?>> أعزب</option>
                    <option value="متزوج"<?php if($row['famille']=="متزوج") {echo "selected";} ?>> متزوج</option>
                    <option value="مطلق"<?php if($row['famille']=="مطلق") {echo "selected";} ?>>مطلق</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">المهنة</label>
                    <select class="form-control form-control-alternative" id="travail" type="text" placeholder="" name="travail">
                      <option value="حارس شابكة"> حارس شابكة</option>
                      <option value="حارس نضام مائي"> حارس نضام مائي</option>
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
                    <label class="form-control-label" for="input-address">العنوان</label>
                    <input id="address" class="form-control form-control-alternative" placeholder="العنوان" type="text" name="address" value="<?php echo $row['address']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">رقم الهاتف </label>
                    <input id="tel" class="form-control form-control-alternative" placeholder="+216 12345678 " type="number" name="tel" value="<?php echo $row['tel']; ?>">
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
                    <input type="email" id="email" class="form-control form-control-alternative" placeholder="example@gmail.com" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">كلمة السر</label>
                    <input type="password" id="mdp1" class="form-control form-control-alternative" placeholder="كلمة السر" name="mdp" value="<?php echo $row['mdp']; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">أعد إدخال كلمة السر</label>
                    <input type="password" id="mdp2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر" value="<?php echo $row['mdp']; ?>">
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                     <div class="form-group">
                     <input type="text" id="file1"  class="form-control visually-hidden" value="../uploads/frisk.lua"  name="file1">
                     </div>
                   </div>
            </div>
            <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
            <div class="text-center">
              <button type="submit" onclick ="return checkInputsPompiste()" name="modifPompiste" class="btn btn-primary my-4">تحيين</button>
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