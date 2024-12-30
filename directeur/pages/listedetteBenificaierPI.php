<?php 
include_once "../db/db.php";
$dateDebute=$_GET['dateDebut'];
$dateFin=$_GET['dateFin'];
$sommeMontant=0;
session_start();

if (!isset($_SESSION["idPompiste"])) {
  header("location: ../login.php");
  exit();
}

$idPompiste=$_SESSION["idPompiste"];
$sql = "SELECT * from gess inner join pompiste on pompiste.idGess=gess.idGess where idPompiste='$idPompiste'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['idGess']=$row['idGess'];
     
    }



$idGess=$_SESSION['idGess'];

$sql = "SELECT * from gess where idGess='$idGess'";

$result = $conn->query($sql);
    

    $row = $result->fetch_assoc();
    $type=$row['type'];

    if ($type=="منطقة ماء صالح للشرب") 
    {
      $typeGess="AEP";
    }
    else if ($type=="منطقة سقوية") 
    {
      $typeGess="PI";
    }

    

$sql = "SELECT * from pompe where idGess='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
      header("Location: pompe.php");
      exit();
    }
//fgkass@gmail.com
?>


<!DOCTYPE html>
<html>
<head>
<link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid black;
  text-align : center ;
}

th {
  background-color: #f2f2f2;
}
.btnon{
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    margin: 20px 50px 20px 50px;
}
@media print {
    .btnon {
        display: none;
    }
    #content{
        display: block;
    }
}
</style>
<script>
    function printer(){
        console.log('bjn,k;l');
        print();
    }
</script>
</head>
<body>

<div class="btnon">

    <a href="../index.php" class="btn btn-primary">رجوع</a>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#eaudouyoun">اضافةالديون المتعلة باستغلال المياه</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eauotre">اضافةالديون المتعلة الانشطة الاخرى</button>
    <button type="button" class="btn btn-success" onclick="printer()">طباعة</button>

</div>

<?php if(isset($_SESSION['messageClass']) && isset($_SESSION['message'])){?>
    <div id="alert" class="btnon alert alert-<?php echo $_SESSION['messageClass'] ?> alert-dismissible  <?php if($_SESSION['message']!="") echo "show"; else echo "visually-hidden" ; ?>" role="alert" >
        <?php echo $_SESSION['message'];  unset($_SESSION['message']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div id="content mx-4">
    <h3 style="text-align: center;">ديون المنتفعين نحو المجمع</h3>
    <h5 style="text-align: center;">الفترة من <?php echo $_GET['dateDebut'] ?> الى <?php echo $_GET['dateFin'] ?></h5>
    <table>
    <tr>
        <th rowspan="2">ملاحظات</th>
        <th rowspan="2">تاريخ الخلاص</th>
        <th colspan="2">مصدر الديون</th>
        <th rowspan="2">اسم المنتفع</th>
    </tr>
    <tr>
        <th>المبلغ</th>
        <th>رقم الفاتورة</th>
    </tr>
    <tr>
        <td colspan="6"> الديون المتعلة باستغلال المياه</td>
    </tr>
    <?php
        $sql = "SELECT * FROM `dettes_beneficiaires` WHERE idGess=$idGess and otre_non='0' and activ='1' and date between '$dateDebute'  and '$dateFin'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '  <tr>
                    <td>'.$row['note'].'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['montant'].'</td>
                    <td>'.$row['numFacture'].'</td>
                    <td>'.$row['beneficiaires'].'</td>
                </tr>';
                $sommeMontant = $sommeMontant + $row['montant'];
            }
        }
    ?>
  

    <tr>
        <td colspan="6"> الديون المتعلة الانشطة الاخرى</td>
    </tr>

    <?php
        $sql = "SELECT * FROM `dettes_beneficiaires` WHERE idGess=$idGess and otre_non='1' and activ='1' and date between '$dateDebute'  and '$dateFin' ";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '  <tr>
                    <td>'.$row['note'].'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['montant'].'</td>
                    <td>'.$row['numFacture'].'</td>
                    <td>'.$row['beneficiaires'].'</td>
                </tr>';
                $sommeMontant = $sommeMontant + $row['montant'];
            }
        }
    ?>

    <tr>
        <td>/</td>
        <td>/</td>
        <td><?php echo $sommeMontant ; ?></td>
        <td>/</td>
        <th>المجموع</th>
    </tr>
    </table>
</div>

<div class="modal fade" id="eaudouyoun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="../controller/controller.php?dateDebut=<?php echo $_GET['dateDebut'] ?>&dateFin=<?php echo $_GET['dateFin'] ?>" method="post" style="text-align: end;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: end;">اضافةالديون المتعلة باستغلال المياه</h5>
            </div>
            <div class="modal-body">
                <input type="text" class="d-none" name="otre_non" value="0">
                <div class="form-group">
                    <label for="exampleFormControlInput1">اسم المنتفع</label>
                    <select class="form-control" name="nom_dettes_beneficiaires" id="nom_dettes_beneficiaires">
                        
                    <?php
                        $sql = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1 ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['idBenefique'].'">'.$row['nom'].'</option>';
                            }
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">المبلغ</label>
                    <input type="text" name="montant" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">رقم الفاتورة</label>
                    <input type="text" name="numFacture" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">تاريخ الخلاص</label>
                    <input type="date" min="<?php echo $_GET['dateDebut'] ?>" max="<?php echo $_GET['dateFin'] ?>" name="date" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ملاحظات</label>
                    <input type="text" name="note" class="form-control" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">حذف</button>
                <input type="submit" class="btn btn-primary" value="حفض">
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="eauotre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="../controller/controller.php?dateDebut=<?php echo $_GET['dateDebut'] ?>&dateFin=<?php echo $_GET['dateFin'] ?>" method="post" style="text-align: end;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: end;">اضافةالديون المتعلة باستغلال المياه</h5>
            </div>
            <div class="modal-body">
                <input type="text" class="d-none" name="otre_non" value="1">
                <div class="form-group">
                    <label for="exampleFormControlInput1">اسم المنتفع</label>
                    <?php
                        $sql = "SELECT * FROM benefique_pi where idGess='$idGess' and active=1 ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['idBenefique'].'">'.$row['nom'].'</option>';
                            }
                        }
                    ?>                
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">المبلغ</label>
                    <input type="text" name="montant" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">رقم الفاتورة</label>
                    <input type="text" name="numFacture" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">تاريخ الخلاص</label>
                    <input type="date" name="date" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ملاحظات</label>
                    <input type="text" name="note" class="form-control" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">حذف</button>
                <input type="submit" class="btn btn-primary" value="حفض">
            </div>
        </form>
    </div>
  </div>
</div>


</body>
</html>