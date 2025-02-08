<?php
include_once('../db/db.php');

if(isset($_SESSION['idbenifique'])){
   echo 'ok !';
}


?>

<!doctype html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <style>
      .rotate-arabic {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        
        }
        th, td {
            text-align: center;
            font-size: 10px;
            vertical-align: middle;
            border: 1px solid #000000;
            
            }
            .row div{
            
            }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
   <script src="jqury.js"></script>


  </head>
  <body>

  <div class="card-header  border-0">
              <div class="row align-items-center">
                <div class="col-6 text-center">
                </div>
                <div class="col-6 text-center">
                  <a href="../index.php" class="btn btn-sm btn-primary">رجوع</a>
                </div>
              </div>
            </div>

<div  class="no-print" id="printDiv">
   
<div class="container">
  <div class="row">
    <strong class="col-3 text-primary">
        المجمع المائي :<br> 
        test    
    </strong>
    <div class="col"> 
    </div>
  </div>
</div>
<br><br>

<table class="table">

    <tr>
      <td rowspan="2">العدد الجملي</td>
      <td rowspan="2" class="text-center">إسم ولقب المنتفع</td>
      <td rowspan="2" class="rotate-arabic bg-transparent">الديون المتخلدة بذمة <br>المنتفع قبل إصدار<br> الفاتورة الخاصة بهذه<br> الطريقة</td>
      <td colspan="3">رفع العدادات الخاصة</td>
      <td colspan="11">الفوترة</td>
    </tr>
    <tr>
      <td class="rotate-arabic bg-transparent">التاريخ</td>
      <td class="rotate-arabic bg-transparent">الرقم الجديد</td>
      <td class="rotate-arabic bg-transparent">الرقم القديم</td>
      <td class="rotate-arabic bg-transparent">الكمية المستهلكة</td>
      <td class="rotate-arabic bg-transparent">السعر m3 او h</td>
      <td class="rotate-arabic bg-transparent">المعلوم النسبي للإستهلك</td>
      <td class="rotate-arabic bg-transparent">المعلوم القار</td>
      <td class="rotate-arabic bg-transparent">المعلوم الجملي للإستهلاك</td>
      <td class="rotate-arabic bg-transparent">معالم أخرى</td>
      <td class="rotate-arabic bg-transparent">المبلغ المطلوب</td>
      <td class="rotate-arabic bg-transparent">المبلغ المدفوع</td>
      <td class="rotate-arabic bg-transparent">المبلغ المتخلد بالذمة</td>
      <td class="rotate-arabic bg-transparent">رقم الفاتورة</td>
      <td class="rotate-arabic bg-transparent">رقم وصل الخلاص</td>

    </tr>

   <tr>
      <td>1</td>
      <td id="tr_idBenefique_1">saber</td>
      <td>500</td>
      <td>2025-01-01</td>
      <td>5000</td>
      <td>4500</td>
      <td>500</td>
      <td>200</td>
      <td>100000</td>
      <td>50</td>
      <td>100050</td>
      <td>500</td>
      <td>100550</td>
      <td>0</td>
      <td>100550</td>
      <td>70</td>
      <td>50</td>
   </tr>  
</table>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>