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

  <?php 
  

$sql = "SELECT * FROM parametre where idGess='$idGess'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
   $row = $result->fetch_assoc();


         ?>
 
        <div class="table-responsive">
        <div class="col-xl-12 order-xl-1">
      <div class="card bg-white shadow">
        <div class="card-header bg-secondary border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">الإعدادات</h3>
            </div>
            <div class="col-4 text-right">
              <a href="index.php?page=dashboard" class="btn btn-sm btn-primary">رجوع</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form onsubmit ="return checkInputsParametre()" action="controller/controller.php" method="post">
          <div id="alert" class="alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
 <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
          <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">السعر م3</label>
                    <input id="prixM3" class="form-control form-control-alternative" placeholder="السعر م3" type="number" name="prixM3" value="<?php echo $row['prixM3'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">السعر بالساعة</label>
                    <input id="prixHeure" class="form-control form-control-alternative" placeholder="السعر بالساعة" type="number" name="prixHeure" value="<?php echo $row['prixHeure'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">معلوم قار</label>
                    <input id="prixFixe" class="form-control form-control-alternative" placeholder="معلوم قار " type="number" name="prixFixe" value="<?php echo $row['prixFixe'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">معالم أخرى</label>
                    <input id="autrePrix" class="form-control form-control-alternative" placeholder="معالم أخرى " type="number" name="autrePrix" value="<?php echo $row['autrePrix'] ?>">
                  </div>
                </div>
              </div>
            <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
            <div class="text-center">
              <button type="submit" onclick="return checkInputsParametre()" name="parametre" class="btn btn-primary my-4">إضافة</button>
            </div>
          </form>
        </div>
      </div>
    </div>

       
      </div>
    </div>
<script>
    
function checkInputsParametre(){
  var prixM3 = document.getElementById("prixM3").value;
  var prixFixe = document.getElementById("prixFixe").value;
  var autrePrix = document.getElementById("autrePrix").value;
  var prixHeure = document.getElementById("prixHeure").value;


  var erreur = document.getElementById("erreur");


  if(prixM3 < 1  )
  {
    erreur.innerHTML="الرجاء التأكد من أن كل المعطيات كاملة وصحيحة";
    return false;

  }

    if(prixHeure < 1  )
  {
    erreur.innerHTML="الرجاء التأكد من أن كل المعطيات كاملة وصحيحة";
    return false;

  }

  if(prixFixe < 1  )
  {
    erreur.innerHTML="الرجاء التأكد من أن كل المعطيات كاملة وصحيحة";
    return false;

  }

  if(autrePrix < 1  )
  {
    erreur.innerHTML="الرجاء التأكد من أن كل المعطيات كاملة وصحيحة";
    return false;

  }

  

return true;

}

</script>