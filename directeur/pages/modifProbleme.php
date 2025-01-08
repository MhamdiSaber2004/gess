<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['idProbleme']) && ! empty ( $_GET['idProbleme'] ))
{
    $idProbleme=$_GET['idProbleme'];
    $sql = "SELECT * FROM problemes where idProbleme=$idProbleme";
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
              <h3 class="mb-0">تحيين معطيات العطب  </h3>
            </div>
            <div class="col-4 text-right">
              <a href="index.php?page=listeProbleme" class="btn btn-sm btn-primary">رجوع</a>
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
                    <label class="form-control-label" for="input-address">رمز العطب </label>
                    <input id="idProbleme" class="form-control form-control-alternative" placeholder="رمز العطب " type="text" name="idProbleme" readonly value="<?php echo $row['idProbleme']; ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">بتاريخ</label>
                    <input type="date" id="date" class="form-control form-control-alternative" placeholder="بتاريخ" name="dateCIN" readonly value="<?php echo substr($row['date'], 0,10) ?>">
                  </div>
                </div>
                <div class="col-md-12 visually-hidden">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address"></label>
                    <input id="numCompteurPrecedent" class="form-control form-control-alternative" placeholder="رمز العطب " type="text" name="numCompteurPrecedent" hidden value="<?php echo $row['numCompteur']; ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">الساكورة عدد</label>
                    <input type="nom" list="numeroCompteur" id="numCompteur" class="form-control form-control-alternative" placeholder="" name="numCompteur" value="<?php echo $row['numCompteur']; ?>">
                    <datalist id="numeroCompteur">

                        <?php
                        
                        $idPompiste=$_SESSION['idPompiste'];
                        $sql = "SELECT * FROM benefique_$typeGess  where idGess='$idGess'";
                        $result = $conn->query($sql);

                                       if ($result->num_rows > 0) {
                                        while ($row1 = $result->fetch_assoc()) {
                                        echo "<option>".$row1['numCompteur']."</option>";
                                       
                                        
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
                       <option value="سقوي" <?php if($row['typeBenefique']=="سقوي") {echo "selected";} ?>> سقوي</option>
                       <option value="صالح للشراب" <?php if($row['typeBenefique']=="صالح للشراب") {echo "selected";} ?>>صالح للشراب</option>
                      </select>


                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">تفاصيل العطب</label>
                        <textarea id="detail" name="detail" rows="4" class="form-control form-control-alternative" placeholder="تفاصيل العطب ..." ><?php echo $row['detail']; ?></textarea>                      </div>
                    </div>
               
              
                
              </div>
              <div class="col-lg-12">
                  <div class="form-group">

                  <label class="form-control-label" for="input-first-name">طبيعة التدخل</label>

                      <select id="typeProbleme" class="form-control form-control-alternative" type="text" name="typeProbleme" placeholder="" >
                       <option value="الرجاء إختيار طبيعة التدخل" >الرجاء إختيار طبيعة التدخل</option>
                       <option value="خارجي" <?php if($row['typeProbleme']=="خارجي") {echo "selected";} ?>> خارجي</option>
                       <option value="محلي" <?php if($row['typeProbleme']=="محلي") {echo "selected";} ?>>محلي</option>
                      </select>


                  </div>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-12">
                     <div class="form-group">
                       <label class="form-control-label" for="input-country">مصاريف الاصلاح</label>
                       <input type="number" id="prix" class="form-control form-control-alternative" placeholder="مصاريف الاصلاح" name="prix" value="<?php echo $row['prix']; ?>">
                     </div>
                   </div>
                   <div class="col-lg-12">
                     <div class="form-group">
                     <label class="form-control-label" for="file1"> مرفقات ان وجدت</label>
                     <input type="file" id="file1" class="form-control "  name="file1">
                     </div>
                   </div>
                   <div class="col-lg-12">
                     <div class="form-group">
                       <label class="form-control-label" for="input-country"> المواد المشتراة اذا وجدت</label>
                       <input type="text" id="elementAchete" class="form-control form-control-alternative" placeholder=" المواد المشتراة اذا وجدت" name="elementAchete" value="<?php echo $row['elementAchete']; ?>">
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
            <h6 class="heading-small text-muted mb-4 text-red" id="erreur"></h6>
            <div class="text-center">
              <button type="submit"  name="modifProbleme" class="btn btn-primary my-4">تحيين</button>
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
