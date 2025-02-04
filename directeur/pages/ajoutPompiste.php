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
                  <h3 class="mb-0">إضافة</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listePompiste" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form onsubmit ="return checkInputsPompiste()" action="controller/controller.php" method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">معلومات المستخدم </h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رمز (تلقائي)</label>
                        <input id="id" class="form-control form-control-alternative" placeholder="رمز (تلقائي)" type="text" name="id" readonly value="<?php
                         $random = sprintf("%06d", mt_rand(111111, 999999)) ;
                         $sql = "SELECT idPompiste FROM pompiste";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['idPompiste'] == $random)
                                               {
                                                $random = sprintf("%06d", mt_rand(111111, 999999)) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>"require>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">الاسم و اللقب</label>
                        <input type="nom" id="nom" class="form-control form-control-alternative" placeholder="الاسم و اللقب" name="nom" require>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">تاريخ الميلاد</label>
                        <input type="date" id="dateN" class="form-control form-control-alternative" placeholder="تاريخ الميلاد" name="dateN"  require>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                        <input type="number" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف" name="CIN" require>
                      </div>
                    </div>
                   
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">بتاريخ</label>
                        <input type="date" id="dateCIN" class="form-control form-control-alternative" placeholder="بتاريخ" name="dateCIN" value="1977-02-05" require>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">صفة المهمة</label>

                      <select class="form-control form-control-alternative" type="text" placeholder="" name="payement" >
                       <option value="مقابل منحة شهرية" > مقابل منحة شهرية</option>
                       <option value="مقابل نسبة من المداخيل"> مقابل نسبة من المداخيل</option>
                       <option value="من دون مقابل">من دون مقابل</option>
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
                       <option value="أعزب" selected="selected"> أعزب</option>
                       <option value="متزوج"> متزوج</option>
                       <option value="مطلق">مطلق</option>
                      </select>


                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">المهنة</label>
                        <select class="form-control form-control-alternative" id="travail" type="text" placeholder="" name="travail">
                          <option value="حارس شابكة"> حارس شابكة</option>
                          <option value="حارس نظام مائي"> حارس نظام مائي</option>
                          <option value="موزع ماء"> موزع ماء</option>
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
                        <input id="address" class="form-control form-control-alternative" placeholder="العنوان" type="text" name="address" value="12345">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">رقم الهاتف </label>
                        <input id="tel" class="form-control form-control-alternative" placeholder="+216 12345678 " type="number" name="tel" value="<?php
                         $random = sprintf("%06d", mt_rand(20000000, 29999999)) ;
                         $sql = "SELECT tel FROM pompiste";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['tel'] == $random)
                                               {
                                                $random = sprintf("%06d", mt_rand(20000000, 29999999)) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>"require>
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
                        <input type="email" id="email" class="form-control form-control-alternative" placeholder="example@gmail.com" name="email" value="<?php
                         $random = sprintf("%06d", mt_rand(1, 19999999)) ;
                         $sql = "SELECT CIN FROM pompiste";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['CIN'] == $random)
                                               {
                                                $random = sprintf("%06d", mt_rand(1, 19999999)) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>@gmail.com" require>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">كلمة السر</label>
                        <input type="password" id="mdp1" class="form-control form-control-alternative" placeholder="كلمة السر" name="mdp" value="azeazeaze" require>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">أعد إدخال كلمة السر</label>
                        <input type="password" id="mdp2" class="form-control form-control-alternative" placeholder="أعد إدخال كلمة السر" value="azeazeaze"require>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1"> عقد العمل  </label>
                     <input type="file" id="file1" class="form-control "  name="file1" require>
                     </div>
                   </div>
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" name="ajoutPompiste" class="btn btn-primary my-4">إضافة</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>
   