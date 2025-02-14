<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../db/db.php";
if (!isset($_SESSION["idPompiste"])) {
  header("location: ../login.php");
  exit();
}
$nomGess="";
$placeGess="";
$decanatGess="";
$idGess=0;
if(isset($_SESSION["idGess"])){
    $idGess=$_SESSION["idGess"];
    $sql1 = "SELECT * FROM gess WHERE idGess = $idGess";

    $result1 = $conn->query($sql1);

    while ($row1 = $result1->fetch_assoc()) { 
        $nomGess=$row1['nom'];
        $placeGess=$row1['accreditation'];
        $decanatGess=$row1['decanat'];
    }
}else{
    header("location: ../login.php");
    exit();
}

if(isset($_GET['moin'])){
    $moin=$_GET['moin'];
    list($year, $month_number) = explode('-', $moin);
    $days_in_moin = cal_days_in_month(CAL_GREGORIAN, $month_number, $year);
    
}else{
    header("location: ../index.php");
}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استغلال محطة الضخ الكهربائية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            color: red;
        }
        .header {
            font-size: 18px;
            font-weight: bold;
        }
        .print{
            display: block;
        }
        .non-print{
            display : block;
        }
        @media print {
            .print{
            display: block;
        }
        .non-print{
            display : none;
        }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="non-print">
            <a class="btn btn-primary mt-3 mb-3 float-start" href="../index.php">رجوع</a>
            <button onclick="printsp()" class="btn btn-primary  mt-3 mb-3 float-end">طباعة</button>
        </div>
        <table>
            <tr>
                <td>دائرة المجمع المائي</td>
                <td rowspan="2"><h2 class="title">استغلال محطة الضخ الكهربائية المتوسطة الجهد</h2></td>
                <td rowspan="3">المجمع المائي  : <?php echo $nomGess ?></td>
            </tr>
            <tr>
                <td>ولاية :  <?php echo $decanatGess ?></td>
            </tr>
            <tr>
                <td>معمدية  :  <?php echo $placeGess ?></td>        
                <td><p class="header">خلال شهر: <?php echo $moin ?></p></td>
            </tr>
            <tr>
            </tr>
        </table>
        <div class="non-print">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterSP">اضافة</button>
        </div>    
        <table>
            <tr>
                <th rowspan="3">التاريخ</th>
                <th colspan="3">مدة الضخ</th>
                <th rowspan="3">رقم العداد المائي</th>
                <th colspan="4">الطاقة الكهربائية</th>
                <th colspan="3"></th>
                <th colspan="5"></th>
                <th rowspan="3">ملاحظات</th>
            </tr>
            <tr>
                <th rowspan="2">من</th>
                <th rowspan="2">إلى</th>
                <th rowspan="2">العدد الساعاتي</th>
                <th rowspan="2">عداد النهار</th>
                <th rowspan="2">عداد الليل</th>
                <th rowspan="2">عداد المساء</th>
                <th rowspan="2">عداد الذروة</th>
                <th rowspan="2">شراء</th>
                <th rowspan="2">مستعمل</th>
                <th rowspan="2">اشغال المضخة</th>
                <th rowspan="2">انقطاع الماء</th>
                <th rowspan="2">عطب محطة الضخ</th>
                <th rowspan="2">انطاع الطاقة</th>
                <th colspan="2">عطب في الشبكة</th>
            </tr>
            <tr>
                <th>كلي</th>
                <th>جزئي</th>
            </tr>
            <tr>
                <th colspan="3">المجموع العام السابق</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="3">الرقم السابق</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <!-- تعبئة الجدول لـ 30 يومًا -->
            <?php
                for ($i = 1; $i <= $days_in_moin; $i++) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    for ($j = 0; $j < 17; $j++) {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            ?>
            <tr>
                <th colspan="3">المجموع الشهري</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="3">المجموع العام</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td colspan="5" rowspan="5" style="padding-bottom : 9%">الملاحضات</td>
                <td>الطاقة المستهاكة</td>
                <td></td>
                <td>الكيلوواط</td>
                <td colspan="10">الاسم و الامضاء</td>
            </tr>
            <tr>
                <td>الدفق</td>
                <td></td>
                <td>م3/ساعة</td>
                <td colspan="5" rowspan="3" style="padding-bottom : 9%">الحارس</td>
                <td colspan="5" rowspan="3" style="padding-bottom : 9%">الرئيس</td>
            </tr>
            <tr>
                <td>الطاقة</td>
                <td></td>
                <td>كيلوواط/ساعة</td>
            </tr>
            <tr>
                <td>الطاقة</td>
                <td></td>
                <td>كيلوواط/م3</td>
            </tr>
        </table>
        <br>
    </div>
    <div class="col-md-12">
        <div class="modal modal-xl fade" id="ajouterSP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" style="text-align: justify;">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1" class="form-label">تاريخ</label>
                                <select class="form-select mb-3" aria-label="Default select example" mane="jour">
                                    <?php
                                         for ($i = 1; $i <= $days_in_moin; $i++) {
                                            //ajout condition
                                           echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <hr>
                            <h5 for="de" class="form-label">مدة الضخ</h5>
                            <div class="col-6">
                                <label for="de" class="form-label">من</label>
                                <input type="time" class="form-control" id="de" name="de">
                            </div>
                            <div class="col-6">
                                <label for="a" class="form-label">الى</label>
                                <input type="time" class="form-control" id="a" name="a">
                            </div>
                            <hr>
                            <h5 class="form-label">الصاقة الكهربائية</h5>
                            <div class="col-6">
                                <label for="numCompter" class="form-label">رقم العداد المائي</label>
                                <input type="text" class="form-control" id="numCompter" name="numCompter">
                            </div>
                            <div class="col-6">
                                <label for="numJour" class="form-label">عداد النهار</label>
                                <input type="text" class="form-control" id="numJour" name="numJour">
                            </div>
                            <div class="col-6">
                                <label for="numNhuit" class="form-label">عداد الليل</label>
                                <input type="text" class="form-control" id="numNhuit" name="numNhuit">
                            </div>
                            <div class="col-6">
                                <label for="numMid" class="form-label">عداد المساء</label>
                                <input type="text" class="form-control" id="numMid" name="numMid">
                            </div>
                            <div class="clo-12">
                                <label for="numMax" class="form-label">عداد الذروة</label>
                                <input type="text" class="form-control" id="numMax" name="numMax">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printsp(){
            window.print();
        }
    </script>
</body>
</html>
