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
                  <h3 class="mb-0">إضافة عطب</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listeProblemes" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form onsubmit ="return checkInputsProbleme()" action="controller/controller.php" method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">معلومات العطب </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">الساكورة عدد</label>
                        <input id="numCompteur" class="form-control form-control-alternative" list="numeroCompteur" placeholder="الساكورة عدد" type="text" name="numCompteur" value="646077">
                        <datalist id="numeroCompteur">

                        <?php
                          $idPompiste=$_SESSION['idPompiste'];
                          $sql = "SELECT * FROM benefique_$typeGess where idGess='$idGess'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "<option>".$row['numCompteur']."</option>";
                            }
                          }
                         ?>
                        </datalist>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">نوع المنتفع</label>

                      <select id="typeBenefique" class="form-control form-control-alternative" type="text" name="typeBenefique" placeholder="" >
                       <option value="الرجاء إختيار نوع المنتفع" >الرجاء إختيار نوع المنتفع</option>
                       <option value="سقوي" selected> سقوي</option>
                       <option value="صالح للشراب">صالح للشراب</option>
                      </select>


                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">تفاصيل العطب</label>
                        <textarea id="detail" name="detail" rows="4" class="form-control form-control-alternative" placeholder="تفاصيل العطب ..." >value="1234"</textarea>                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label" for="input-first-name">طبيعة التدخل</label>

                      <select id="typeProbleme" class="form-control form-control-alternative" type="text" name="typeProbleme" placeholder="" >
                       <option value="الرجاء إختيار طبيعة التدخل" >الرجاء إختيار طبيعة التدخل</option>
                       <option value="خارجي" selected> خارجي</option>
                       <option value="محلي">محلي</option>
                      </select>


                      </div>
                    </div>
                                      </div>
                                      <div class="row">
                   
                                      <div class="col-lg-12">
                     <div class="form-group">
                       <label class="form-control-label" for="input-country">مصاريف الاصلاح</label>
                       <input type="number" id="prix" class="form-control form-control-alternative" placeholder="مصاريف الاصلاح" name="prix" value="123">
                     </div>
                   </div>
                   
                   <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1"> مرفقات ان وجدت</label>
                     <input type="file" id="file1" class="form-control "  name="file1">
                     </div>
                   </div>
                                      </div>

                                      <div class="row">
                   
                   <div class="col-lg-12">
                     <div class="form-group">
                       <label class="form-control-label" for="input-country"> المواد المشتراة اذا وجدت</label>
                       <input type="text" id="elementAchete" class="form-control form-control-alternative" placeholder=" المواد المشتراة اذا وجدت" name="elementAchete" value="123">
                     </div>
                   </div>
                   <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1"> مرفقات ان وجدت</label>
                     <input type="file" id="file2" class="form-control " name="file2">
                     </div>
                   </div>
                                      </div>
                   
                        
             
              
                </div>
                <div class="row">
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"><br></h6>
                <div class="text-center">
                  <button type="submit" name="ajoutProbleme" class="btn btn-primary my-4">تسجيل العطب</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>
   
        