


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
              <form  method="post" action="controller/controller.php">
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


                  
                  
                    
                  </div>
                  
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">معلومات المستخدم </h6>
                <div class="pl-lg-4">
                  <div class="row">
                  
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">الإسم و اللقب</label>
                        <input type="text" id="nom" name="nom" class="form-control form-control-alternative" placeholder="الإسم و اللقب" >
                      </div>
                    </div>
                

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                        <input name="CIN" type="text" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف">
                      </div>
                    </div>

               
                
                  </div>
                  
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">معلومات عامة </h6>
                <div class="pl-lg-4">
                <div class="row">
                    
                    <div class="col-lg-12">
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

     
             
                </div>
                <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
                <div class="text-center">
                  <button type="submit" name="ajoutBenefiquePublique" class="btn btn-primary my-4">إضافة</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>


        <?php  ?>