<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
                  <h3 class="mb-0">إضافة عطب</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="index.php?page=listeProblemes" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form onsubmit ="return checkInputsProbleme()" action="controller/controller.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">تفاصيل العطب</label>
                        <textarea id="detail" name="detail" rows="4" class="form-control form-control-alternative" placeholder="تفاصيل العطب ..." ></textarea>                      
                    </div>
                  <button type="submit" name="ajoutProbleme" class="btn btn-primary my-4">تسجيل العطب</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 
           
          </div>
        </div>
   
        