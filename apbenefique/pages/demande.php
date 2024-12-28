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
              <h3 class="mb-0">مطلب ترشح</h3>
            </div>
            <div class="col-4 text-right">
              <a href="index.php" class="btn btn-sm btn-primary">رجوع</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="controller/controller.php" method="post" enctype="multipart/form-data">
            <h6 class="heading-small text-muted mb-4">معلومات المطلب </h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">رمز مطلب الانخراط</label>
                    <input type="number" id="numDemande" class="form-control form-control-alternative" placeholder="رقم بطاقات الانخراط " name="numDemande" value="<?php echo mt_rand(100000, 999999)   ?>" readonly>
                  </div>
                </div>
              <div class="col-lg-12">
                      <div class="form-group">

                      <label class="form-control-label">نوع المطلب</label>

                      <select class="form-control form-control-alternative" type="text" placeholder="" id="type" name="type" <?php $random=rand(1,9)  ?>>
                      <option value="" selected >الرجاء إختيار نوع المطلب</option>
                      <option value="طلب ترشح عضوية مجلس ادارة المجمع" <?php if($random<5) echo "selected" ?> >طلب ترشح عضوية مجلس ادارة المجمع</option>
                       <option value="طلب ترشح لعضوية اللجنة الداخلية لمراقبة الحسابات" <?php if($random>5) echo "selected" ?>>طلب ترشح لعضوية اللجنة الداخلية لمراقبة الحسابات</option>
                      </select>


                      </div>
                    </div>
                
                

</div>
<div class="row">
    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">رقم بطاقة التعريف</label>
                        <input type="number" id="CIN" class="form-control form-control-alternative" placeholder="رقم بطاقة التعريف" name="CIN" value="<?php
                         $random = sprintf("%06d", mt_rand(1000000, 19999999)) ;
                         $sql = "SELECT CIN FROM pompiste";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while ($row = $result->fetch_assoc()) {
                                               while ($row['CIN'] == $random)
                                               {
                                                $random = sprintf("%06d", mt_rand(1000000, 19999999)) ;
                                               }
                                           }
                                       }
                                       echo $random;
                         ?>">
                      </div>
                    </div>
</div>
<div class="row">


<label class="form-control-label">صورة بطاقة التعريف الوطنية</label>

                <div class="col-lg-6">
                  <!--Image-->

    <label for="frontCIN" class="mb-4 d-flex justify-content-center">
        <img id="viewFrontCIN" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
        alt="example placeholder" style="width: 300px;" />
    </label>
    <div class="d-flex justify-content-center">
        <div class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="frontCIN">تحميل صورة الواجهة الأمامية</label>
            <input type="file" name="frontCIN" class="form-control d-none" id="frontCIN" accept="image/*"/>
        </div>
   
</div>
<hr class="my-4 text-black" />


</div>




                <script>

document.addEventListener('DOMContentLoaded', function () {
    
    // Prepare the preview for profile picture
    document.getElementById('frontCIN').addEventListener('change', function () {
        frontReadURL(this);
    });
    // Prepare the preview for profile picture
document.getElementById('backCIN').addEventListener('change', function () {
        backReadURL(this);
    });

});


function frontReadURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('viewFrontCIN').setAttribute('src', e.target.result);
            document.getElementById('viewFrontCIN').style.opacity = '1';
            document.getElementById('viewFrontCIN').style.widows = '300';
        };
        reader.readAsDataURL(input.files[0]);
    }
}




function backReadURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('viewBackCIN').setAttribute('src', e.target.result);
            document.getElementById('viewBackCIN').style.opacity = '1';
            document.getElementById('viewBackCIN').style.widows = '300';
        };
        reader.readAsDataURL(input.files[0]);
    }
}


    </script>




               
                <div class="col-lg-6">
                  <!--Image-->

    <label for="backCIN" class="mb-4 d-flex justify-content-center">
        <img id="viewBackCIN" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
        alt="example placeholder" style="width: 300px;" />
    </label>
    <div class="d-flex justify-content-center">
        <div class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="backCIN">تحميل صورة الواجهة الخلفية</label>
            <input type="file" class="form-control d-none" id="backCIN" name="backCIN" accept="image/*" />
        </div>
    </div>
    <hr class="my-4 text-black" />
                </div>



                
              </div>
             
            </div>

            <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">

                  <label class="form-control-label" for="input-first-name">تاريخ المجلس</label>
                  <input id="dateConseil" class="form-control form-control-alternative" placeholder="تاريخ تحرير المطلب" type="date" name="dateConseil" value="12345">


                  </div>
                </div>
                
              </div>

            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">مكان تحرير المطلب</label>
                    <input id="placeDemande" class="form-control form-control-alternative" placeholder="مكان تحرير المطلب" type="text" name="placeDemande" value="تونس">
                  </div>
                </div>
              </div>
            
            
            </div>
            <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
            <div class="text-center">
              <button type="submit" onclick="return checkInputsDemande()" name="ajoutDemande" class="btn btn-primary my-4">ارسال مطلب</button>
            </div>
          </form>
        </div>
      </div>
    </div>

       
      </div>
    </div>

<script>

  function checkInputsDemande()
  {
    var type = document.getElementById("type").value;
  var CIN = document.getElementById("CIN").value;
  var frontCIN = document.getElementById("frontCIN").value;
  var backCIN = document.getElementById("backCIN").value;
  var dateConseil = document.getElementById("dateConseil").value;
  var placeDemande = document.getElementById("placeDemande").value;


  var erreur = document.getElementById("erreur");

  if(type=="" || CIN=="" ||  dateConseil=="" || placeDemande=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(backCIN=="" || frontCIN=="")
  {
    erreur.innerHTML="صور بطاقات التعريف الوطنية لازمة"
    return false;
  }


  return true;
  }

</script>