





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>تسجيل الدخول</title>
    <!-- MDB icon -->
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    
  <div class="wrapper wrapper--w690">
            <div class="card card-1">
    <section class="pb-4" >
      <div class=" rounded-5" >
        
        <section class="w-100 p-4 d-flex justify-content-center pb-4">
          <div class="first-div" >
          
                <?php

                if (isset($_GET['etat'])){

                

                ?>
          <div class="alert alert-success" id="inscri" style="text-align:center;display:block;">  
           <span style="text-align:center;color : green;font-size:18px;"> تم تسجيل طلبكم بنجاح ! سنقوم بمراجعة معلوماتكم وسنتواصل معكم في أقرب وقت ممكن. 
           <br>نشكركم على انتظاركم 
          </span>
          </div>
    <?php } ?>
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" style="font-size:20px" role="tab"  aria-controls="pills-login" aria-selected="true">اشتراك</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" style="font-size:20px"  role="tab" aria-controls="pills-register" aria-selected="false" tabindex="-1">تسجيل الدخول</a>
              </li>
            </ul>
            <!-- Pills navs -->
    
            <!-- Pills content -->
            <div class="tab-content">
              <div class="tab-pane fade active show" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form>
                 
    
                <h2 class="text-center">انشاء حساب</h2>

             
                  <!-- Submit button -->
                  <a  class="btn btn-primary btn-block mb-4" href="../pi" style="margin-top : 30px;font-size: 20px"> المنطقة السقوية</a>
                  <a class="btn btn-primary btn-block mb-4"  href="../aep" style="margin-top : 30px;font-size: 20px">مجامع التنمية للماء الصالح للشراب </a>
    
                 
                </form>
              </div>
              <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
              <form>
                  <div class="text-center mb-3">
                  <h2 class="text-center"> تسجيل الدخول</h2>
    
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="loginName" class="form-control"  style="margin-top : 30px;">
                    <label class="form-label" for="loginName" style="margin-left: 0px;"> البريد الإلكتروني </label>
                  <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 114.4px;"></div><div class="form-notch-trailing"></div></div></div>
    
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control">
                    <label class="form-label" for="loginPassword" style="margin-left: 0px;">كلمة السر</label>
                  <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>
    
                  <!-- 2 column grid layout -->
                
    
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4" style="font-size : 20px"> الدخول</button>
    
                  <!-- Register buttons -->
                  <!-- <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                  </div> -->
                </form>
              </div>
            </div>
            <!-- Pills content -->
          </div>
        </section>
    
        
        
        
        
      </div>
    </section>
            </div>
  </div>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
