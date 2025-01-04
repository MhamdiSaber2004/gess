<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../db/db.php";
session_start();
if (!isset($_SESSION["idPompiste"])) {
  header("location: ../login.php");
  exit();
}

$idGess=$_SESSION['idGess'];
$jourpp=$_GET['date'];

if(!empty($_POST['aBranche'])){
  $aBranche=$_POST['aBranche'];
  $aprise=$_POST['aprise'];
  $anomBenifique=$_POST['anomBenifique'];
  $anumAutorisationDistribution=$_POST['anumAutorisationDistribution'];
  $aquantiteParH=$_POST['aquantiteParH'];
  $atimeDe=$_POST['atimeDe'];
  $atimeA=$_POST['atimeA'];
  $atimeReelDe=$_POST['atimeReelDe'];
  $atimeReelA=$_POST['atimeReelA'];
  $anumheur=$_POST['anumheur'];
  $aquantiterDe=$_POST['aquantiterDe'];
  $aquantiterA=$_POST['aquantiterA'];
  $aquantiterReel=$_POST['aquantiterReel'];
 
  $ajout = "INSERT INTO `programme_pommpage`(`Branche`,`idGess` ,`prise`, `nomBenifique`, `numAutorisationDistribution`, `quantiteParH`, `timeDe`, `timeA`, `timeReelDe`, `timeReelA`, `numheur`, `quantiterDe`, `quantiterA`, `quantiterReel`, `datej`) VALUES ('$aBranche','$idGess', '$aprise', '$anomBenifique', '$anumAutorisationDistribution', '$aquantiteParH', '$atimeDe', '$atimeA', '$atimeReelDe', '$atimeReelA', '$anumheur', '$aquantiterDe', '$aquantiterA', '$aquantiterReel', '$jourpp')";
  if ($conn->query($ajout) === TRUE) {
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الإضافة بنجاح";
    header("Location: ProgrammePompage.php?date=".$jourpp);
    exit();
  }else{
      $_SESSION['messageClass']="danger";
      $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
      header("Location: ProgrammePompage.php?date=".$jourpp);
  }
}

if(!empty($_POST['mBranche'])){
  $midProgrammePompage=$_POST['midProgrammePompage'];
  $mBranche=$_POST['mBranche'];
  $mprise=$_POST['mprise'];
  $mnomBenifique=$_POST['mnomBenifique'];
  $mnumAutorisationDistribution=$_POST['mnumAutorisationDistribution'];
  $mquantiteParH=$_POST['mquantiteParH'];
  $mtimeDe=$_POST['mtimeDe'];
  $mtimeA=$_POST['mtimeA'];
  $mtimeReelDe=$_POST['mtimeReelDe'];
  $mtimeReelA=$_POST['mtimeReelA'];
  $mnumheur=$_POST['mnumheur'];
  $mquantiterDe=$_POST['mquantiterDe'];
  $mquantiterA=$_POST['mquantiterA'];
  $mquantiterReel=$_POST['mquantiterReel'];

  $modifier = "UPDATE `programme_pommpage` SET `Branche`='$mBranche',`prise`='$mprise',`nomBenifique`='$mnomBenifique',`numAutorisationDistribution`='$mnumAutorisationDistribution',`quantiteParH`='$mquantiteParH',`timeDe`='$mtimeDe',`timeA`='$mtimeA',`timeReelDe`='$mtimeReelDe',`timeReelA`='$mtimeReelA',`numheur`='$mnumheur',`quantiterDe`='$mquantiterDe',`quantiterA`='$mquantiterA',`quantiterReel`='$mquantiterReel' WHERE idProgrammePompage =$midProgrammePompage;";
  if ($conn->query($modifier) === TRUE) {
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الإضافة بنجاح";
    header("Location: ProgrammePompage.php?date=".$jourpp);
    exit();
  }else{
      $_SESSION['messageClass']="danger";
      $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
      header("Location: ProgrammePompage.php?date=".$jourpp);
  }
}


?>

<!DOCTYPE html>
<html lang="ar">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>برنامج التوزيع اليومي</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   <style>
      body {
         font-family: Arial, sans-serif;
         direction: rtl;
         text-align: right;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }
      table, th, td {
         border: 1px solid black;
      }
      th, td {
         padding: 8px;
         text-align: center;
      }
      th {
         background-color: #f2f2f2;
      }
      caption {
         margin-bottom: 10px;
         font-size: 1.2em;
         font-weight: bold;
      }
      @media print {
        .buttons{
          display: none;
        }
        #anonce{
          display: none;
        }
      }
   </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
   <script>
    function printPompiste(){
      window.print();
    }
   </script>
</head>
<body>
<br><br>
<div class="col-12">
<div class="card-header buttons  border-0">
              <div class="row align-items-center">
                <div class="col-4 text-center">
                  <h3 class="mb-0"><button onclick="printPompiste()" class="btn btn-sm btn-primary">طباعة</button> </h3>
                </div>
                <div class="col-4 text-center">
                  <button href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ajoutDistributionEau">إضافة</button>
                </div>
                <div class="col-4 text-center">
                  <a href="../index.php" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>
            <br>

<div class="row no-print" id="printDiv">
   
<div class="container col-10">
  <div class="row">
    <strong class="col-3 text-primary">
    <h6
    >مجمع التنمية في قطاع الفالحة والصيد البحري
  <br>
    للري ب:
    <?php 
        $sql1 = "SELECT nom FROM gess WHERE idGess = $idGess";

        $result1 = $conn->query($sql1);

        while ($row1 = $result1->fetch_assoc()) { 
            echo $row1['nom'];
        }
    ?>
</h6>
    </strong>
    <strong class=" text-center col-8 text-danger">
    برنامج التوزيع اليومي
    <br>
    تاريخ :<?php echo $jourpp; ?>   </strong>
    <div class="col">
      
    </div>
  </div>
</div>





<div class="col-11 mx-auto">
<table class="table">

<thead>
        <tr>
            <th rowspan="3">ع. ر</th>
            <th rowspan="3">فرع</th>
            <th rowspan="3">مأخذ</th>
            <th rowspan="3">اسم ولقب الفلاح</th>
            <th rowspan="3">اذن توزيع عدد</th>
            <th rowspan="3">كمية / ساعات</th>
            <th colspan="2" rowspan="2">توقيت </th>
            <th colspan="6" rowspan="1">التوزيع الفعلي</th>
        </tr>
        <tr>
          <th colspan="3">التوقيت</th>
          <th colspan="3">كمية / عداد</th>

        </tr>
        <tr>
          <th>من</th>
          <th>إلى</th>  
          <th>من</th>
          <th>إلى</th> 
          <th>عدد ساعات </th>
          <th>من</th>
          <th>إلى</th> 
          <th>كمية</th>
        </tr>

    </thead>
    <tbody>
      <?php
        $select="SELECT * FROM `programme_pommpage` WHERE idGess=$idGess AND datej='$jourpp'";
        $result = $conn->query($select);
        
        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            while ($row = $result->fetch_assoc()) {
              $i=$i+1;
                ?>
                <tr class="text-center">
                  <td id="<?php echo $i; ?>"><?php echo $i; ?></td>
                  <td><?php echo $row['Branche']; ?></td>
                  <td><?php echo $row['prise']; ?></td>
                  <td><?php echo $row['nomBenifique']; ?></td>
                  <td><?php echo $row['numAutorisationDistribution']; ?></td>
                  <td><?php echo $row['quantiteParH']; ?></td>
                  <td><?php echo $row['timeDe']; ?></td>
                  <td><?php echo $row['timeA']; ?></td>
                  <td><?php echo $row['timeReelDe']; ?></td>
                  <td><?php echo $row['timeReelA']; ?></td>
                  <td><?php echo $row['numheur']; ?></td>
                  <td><?php echo $row['quantiterDe']; ?></td>
                  <td><?php echo $row['quantiterA']; ?></td>
                  <td><?php echo $row['quantiterReel']; ?></td>
                  </tr>
                <?php
            }
        }else{
      ?>
        <tr class="text-center">
          <td colspan="14">لا يوجد أي تسجيل</td>
        </tr>
      <?php } ?>
    </tbody>
</table>
<span id="anonce">*انقر على ع.ر لتحيين</span>
</div>
</div>
</div>

<div class="col-md-6">
  <div class="modal fade" id="ajoutDistributionEau" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card border-0 mb-0">
              <div class="card-header bg-transparent pb-5">
               <form action="ProgrammePompage.php?date=<?php echo $jourpp ; ?>" method="post">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">اسم ولقب الفلاح	</label>
                    <input type="text" name="anomBenifique" class="form-control" id="anomBenifique">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">فرع</label>
                    <input type="text" name="aBranche" class="form-control" id="aBranche">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">مأخذ</label>
                    <input type="text" name="aprise" class="form-control" id="aprise">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">اذن توزيع عدد</label>
                    <input type="text" name="anumAutorisationDistribution" class="form-control" id="anumAutorisationDistribution">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">كمية / ساعات	</label>
                    <input type="text" name="aquantiteParH" class="form-control" id="aquantiteParH">
                  </div>
                  <hr>
                  <div class="row">
                    <label for="exampleInputPassword1" class="form-label">توقيت</label>
                    <div class="col-6">
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">من</label>
                          <input type="time" name="atimeDe" class="form-control" id="atimeDe">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">الى</label>
                        <input type="time" name="atimeA" class="form-control" id="atimeA">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <label for="exampleInputPassword1" class="form-label">التوزيع الفعلي</label>
                  <div class="row">
                    <label for="exampleInputPassword1" class="form-label">توقيت</label>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">من</label>
                          <input type="time" name="atimeReelDe" class="form-control" id="atimeReelDe">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">الى</label>
                          <input type="time" name="atimeReelA" class="form-control" id="atimeReelA">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">عدد ساعات</label>
                        <input type="text" name="anumheur" class="form-control" id="anumheur">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label for="exampleInputPassword1" class="form-label">كمية / عداد</label>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">من</label>
                          <input type="text" name="aquantiterDe" class="form-control" id="aquantiterDe">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">الى</label>
                          <input type="text" name="aquantiterA" class="form-control" id="aquantiterA">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">كمية</label>
                        <input type="text" name="aquantiterReel" class="form-control" id="aquantiterReel">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">اضافة</button>
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
  $('#aquantiterA').change(function(){
    $('#aquantiterReel').val($('#aquantiterA').val()-$('#aquantiterDe').val());
  });
  $('#atimeReelA').change(function(){
    //$('#anumheur').val(parseInt($('#atimeReelA').val().getHours())-parseInt($('#atimeDe').val().getHours()));
    console.log($('#atimeReelA').val().substring(2, 4));
  });
</script>

<?php
 $select1="SELECT * FROM `programme_pommpage` WHERE idGess=$idGess AND datej='$jourpp'";
 $result1 = $conn->query($select1);
 
 if ($result1->num_rows > 0) {
    echo '<tr class="text-center">';
    // output data of each row
    $i=0;
    while ($row1 = $result1->fetch_assoc()) {
      $i=$i+1;
      ?>
        <script>
          $(document).on('click', '#<?php echo $i; ?>', function() {
            $('#modifierDistributionEau<?php echo $i; ?>').modal('show');
          });
        </script>
        <div class="col-md-6">
          <div class="modal fade" id="modifierDistributionEau<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card border-0 mb-0">
                      <div class="card-header bg-transparent pb-5">
                      <form action="ProgrammePompage.php?date=<?php echo $jourpp ; ?>" method="post">
                      <input type="text" name="midProgrammePompage" value="<?php echo $row1['idProgrammePompage']; ?>" class="d-none">
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">فرع</label>
                            <input type="text" name="mBranche" class="form-control" id="mBranche" value="<?php echo $row1['Branche']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">مأخذ</label>
                            <input type="text" name="mprise" class="form-control" id="mprise" value="<?php echo $row1['prise'] ; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">اسم ولقب الفلاح	</label>
                            <input type="text" name="mnomBenifique" class="form-control" id="mnomBenifique" value="<?php echo $row1['nomBenifique'] ; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">اذن توزيع عدد</label>
                            <input type="text" name="mnumAutorisationDistribution" class="form-control" id="mnumAutorisationDistribution" value="<?php echo $row1['numAutorisationDistribution'] ; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">كمية / ساعات	</label>
                            <input type="text" name="mquantiteParH" class="form-control" id="mquantiteParH" value="<?php echo $row1['quantiteParH'] ; ?>">
                          </div>
                          <hr>
                          <div class="row">
                            <label for="exampleInputPassword1" class="form-label">توقيت</label>
                            <div class="col-6">
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">من</label>
                                  <input type="time" name="mtimeDe" class="form-control" id="mtimeDe" value="<?php echo $row1['timeDe'] ; ?>">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">الى</label>
                                <input type="time" name="mtimeA" class="form-control" id="mtimeA" value="<?php echo $row1['timeA'] ; ?>">
                              </div>
                            </div>
                          </div>
                          <hr>
                          <label for="exampleInputPassword1" class="form-label">التوزيع الفعلي</label>
                          <div class="row">
                            <label for="exampleInputPassword1" class="form-label">توقيت</label>
                            <div class="col-4">
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">من</label>
                                  <input type="time" name="mtimeReelDe" class="form-control" id="mtimeReelDe" value="<?php echo $row1['timeReelDe'] ; ?>">
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">الى</label>
                                  <input type="time" name="mtimeReelA" class="form-control" id="mtimeReelA" value="<?php echo $row1['timeReelA'] ; ?>">
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">عدد ساعات</label>
                                <input type="text" name="mnumheur" class="form-control" id="mnumheur" value="<?php echo $row1['numheur'] ; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label for="exampleInputPassword1" class="form-label">كمية / عداد</label>
                            <div class="col-4">
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">من</label>
                                  <input type="text" name="mquantiterDe" class="form-control" id="mquantiterDe" value="<?php echo $row1['quantiterDe'] ; ?>">
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">الى</label>
                                  <input type="text" name="mquantiterA" class="form-control" id="mquantiterA" value="<?php echo $row1['quantiterA'] ; ?>">
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">كمية</label>
                                <input type="text" name="mquantiterReel" class="form-control" id="mquantiterReel" value="<?php echo $row1['quantiterReel'] ; ?>">
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">تحيين</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      <?php
    }
  }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  

</body>
</html>