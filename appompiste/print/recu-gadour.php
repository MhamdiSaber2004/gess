<?php 

include_once "../db/db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">


  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />


  <!-- Argon CSS -->
  <!--<link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">-->
  <!--Argon rtl CSS-->
  <link type="text/css" href="../assets/css/argon-rtl.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
  <style>
       @media print {
    body {
        -webkit-transform: scale(0.85);  /* Saf3.1+, Chrome */
             -moz-transform: scale(0.85);  /* FF3.5+ */
              -ms-transform: scale(0.85);  /* IE9 */
               -o-transform: scale(0.85);  /* Opera 10.5+ */
                  transform: scale(0.85);
        margin: -50px -73px 0;
        -webkit-print-color-adjust: exact !important;   /* Chrome, Safari 6 – 15.3, Edge */
    color-adjust: exact !important;                 /* Firefox 48 – 96 */
    print-color-adjust: exact !important; 
    }
}
    .specific-case {
      @media print {
        body * {
          visibility: hidden;
        }

        .printable-table,
        .printable-table * {
          visibility: visible;
        }

        .printable-table {
          position: absolute;
          left: 0;
          top: 0;
        }
      }
    }
  </style>


  <style>
    .table td {
      white-space: pre-line;
    }
  </style>

  <style>
    .tabe {
      border: 3px solid #000000;
      border-collapse: collapse;
      padding: 1px;
    }

    .the {
      border: 3px solid #000000;
      padding: 1px;
      background: #bdbdbd;
      color: #313030;
    }

    .tde {
      border: 3px solid #000000;
      text-align: center;
      padding: 1px;
      background: #ffffff;
      color: #313030;
    }
  </style>
  <style>
    .in {
      border: 3px solid #000000;

    }

    .textee {
      font-weight: 700;
      color: #000000;
    }
  </style>
  <style>
    #imprimerBouton2 {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <br><br>
<div class="container">
    <div class="row col-12 no-print" >
    <div class="col-4">
            <button class="btn btn-primary" id="imprimerBouton2" onclick="window.printTable()">طباعة</button>

        </div>
        <div class="col-4">
        </div>  
        <div class="col-4">
            <a href="../index.php?page=suiviConsommation" class="start-50 translate-middle btn btn-danger" style="background-color: red;"> رجوع</a>

        </div>
    </div>
</div>

<br><br>
<div class="tabee">
    <div class="container-fluid">
        <div class="row">
            <div style="border: 3px solid #000000;padding:1px;padding-top: 5px;" class="col-4">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">إسم و لقب المنتفع</label> &nbsp;
                    <input type="text" class="in">&nbsp;

                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;
                    <label style="color: black;font-size : 15px" class="textee">رقم الحنفية</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                </div>

                <br>

                <div>
                    <table class="tabe">
                        <thead>
                            <tr>
                                <th class="the">فترة الإستهلاك</th>
                                <th class="the">الكمية المستهلكة</th>
                                <th class="the">الرقم القديم</th>
                                <th class="the">الرقم الجديد</th>
                                <th colspan="2" style="text-align: center;" class="the">تاريخ رفع العداد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <br><br>
                    <table class="tabe ">
                        <thead>
                            <tr>
                                <th class="the">المبلغ القار للإستهلاك</th>
                                <th class="the">المعلوم القار</th>
                                <th class="the">المبلغ</th>
                                <th class="the">السعر الفردي</th>
                                <th class="the">الكمية المستهلكة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
    <div class="row col-12" >
    <div class="col-6">
            <span class="textee" >  إمضاء رئيس المجلس </span>

        </div>
     
        <div class="col-6">
            <span  class=" textee">      إمضاء أمين المال</span>

        </div>
    </div>
                </div><br>
            </div>






            <div style="border: 3px solid #000000;padding:10px;" class="col-3 ml-5">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">معاليم أخرى</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">&nbsp;

                </div><br>
                <div>
                    <label style="color: black;font-size : 15px" class="textee">المبلغ المتخلد بالذمة</label>&nbsp;
                    <input type="text" class="in">
                </div><br><br><br><br>
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">المبلغ الجملي <br> المطلوب</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">&nbsp;

                </div><br>
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee"> آخر أجل للدفع</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                    <br>
                </div>
                <hr class="mb-1 " style=" border: 2px solid #000000; ">
                <div> <label style="color: black;font-size : 15px;" class="textee">التاريخ و إسم و إمضاء متسلم الفاتورة</label>

                    <br><br>
                </div>

            </div>




            <div style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;padding:8px 0px 0px 0px;margin-right: 20px;" class="col-4 ">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px; " class="textee mb-0">إسم صاحب الفاتورة : &nbsp;&nbsp; </label>
                    <br><br>
                </div>

                <hr class="mb-1 " style=" border: 2px solid #000000; margin-top: 0px;">
                <br>

                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">المبلغ المدفوع (بلسان القلم) : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                </div>
                <br><br>
                <div>
                    &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">الدين المتبقي (بالأرقام) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                </div>
                <br><br>
                <div>
                    &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">التاريخ: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                </div>
                <hr class="mb-1 " style=" border: 2px solid #000000; ">
                <div style="text-align: center;">
                    <label style="color: black;font-size : 15px ; " class="textee">إمضاء و ختم أمين المال </label>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-3">
                <label style="color: black;font-size : 15px;border: 3px solid #000000;padding: 10px ; " class="textee ">رقم الحساب الجاري للمجمع : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
            </div>
            <div class="col-4">
                <label style="color: black;font-size : 15px;border: 3px solid #000000;padding: 10px ;margin-right: -20px " class="textee ">................................................................................................................................</label>
            </div>
            <div style="border-top: 3px none #ffffff;
border-right: 3px solid #000000;
border-bottom: 3px solid #000000;
border-left: 3px solid #000000;padding:10px;margin-right: 106.5px;" class="col-4 ">
            </div>

        </div>


        <div class=" row">

            <div class="col-12">
                <br><br>
            </div>

        </div>


        <div class="row">
            <div class="col-4" style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;">
                <label style="color: black;font-size : 10px; " class="textee"> مجمع التنمية في قطاع الفلاحة و الصيد البحري ب... </label>&nbsp;&nbsp;&nbsp;
                <input type="text" class="in">
            </div>
            <div class="col-3" style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;text-align: center; padding: 5px 10px 2px 102.5px;">

                <label style="color: black;font-size : 15px" class="textee">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;كشف إستهلاك الماء </label>
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;">
            </div>
            <div class="col-3" style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;text-align: center; padding: 5px 10px 2px 18px;">

                <label style="color: black;font-size : 15px; padding-right: 40px;" class="textee"> الفاتورة رقم</label>&nbsp;&nbsp;&nbsp;
                <input type="text" class="in">
            </div>
            <div class="col-4">
                <label style="color: black;font-size : 15px; padding-right: 25px;" class="textee">خلاص الفاتورة رقم</label>
                <input type="text" class="in">
            </div>
        </div>


        <div class="row">
            <div style="border: 3px solid #000000;padding:1px;padding-top: 5px;" class="col-4">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">إسم و لقب المنتفع</label> &nbsp;
                    <input type="text" class="in">&nbsp;

                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;
                    <label style="color: black;font-size : 15px" class="textee">رقم الحنفية</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                </div>

                <br>

                <div>
                    <table class="tabe">
                        <thead>
                            <tr>
                                <th class="the">فترة الإستهلاك</th>
                                <th class="the">الكمية المستهلكة</th>
                                <th class="the">الرقم القديم</th>
                                <th class="the">الرقم الجديد</th>
                                <th colspan="2" style="text-align: center;" class="the">تاريخ رفع العداد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    
                    <table class="tabe ">
                        <thead>
                            <tr>
                                <th class="the">المبلغ القار للإستهلاك</th>
                                <th class="the">المعلوم القار</th>
                                <th class="the">المبلغ</th>
                                <th class="the">السعر الفردي</th>
                                <th class="the">الكمية المستهلكة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                                <td class="tde">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>

                <div class="row col-12" >
    <div class="col-6">
            <span class="textee" >  إمضاء رئيس المجلس </span>

        </div>
     
        <div class="col-6">
            <span  class=" textee">      إمضاء أمين المال</span>

        </div>
    </div>                </div><br>
            </div>





            <div style="border: 3px solid #000000;padding:10px;" class="col-3 ml-5">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">معاليم أخرى</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">&nbsp;

                </div><br>
                <div>
                    <label style="color: black;font-size : 15px" class="textee">المبلغ المتخلد بالذمة</label>&nbsp;
                    <input type="text" class="in">
                </div><br><br><br><br>
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">المبلغ الجملي <br> المطلوب</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">&nbsp;

                </div><br>
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee"> آخر أجل للدفع</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                    <br><br><br>
                </div>
                <hr class="mb-1 " style=" border: 2px solid #000000; ">
                <div> <label style="color: black;font-size : 15px;" class="textee">التاريخ و إسم و إمضاء متسلم الفاتورة</label>

                    <br><br>
                </div>

            </div>




            <div style="border-top: 3px solid #000000;
border-right: 3px solid #000000;
border-bottom: 3px solid none #ffffff;
border-left: 3px solid #000000;padding:8px 0px 0px 0px;margin-right: 20px;" class="col-4 ">
                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px; " class="textee mb-0">إسم صاحب الفاتورة : &nbsp;&nbsp; </label>
                    <br><br>
                </div>

                <hr class="mb-1 " style=" border: 2px solid #000000; margin-top: 0px;">
                <br>

                <div> &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">المبلغ المدفوع (بلسان القلم) : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                </div>
                <br><br>
                <div>
                    &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">الدين المتبقي (بالأرقام) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="in">
                </div>
                <br><br>
                <div>
                    &nbsp;&nbsp;&nbsp;<label style="color: black;font-size : 15px" class="textee">التاريخ: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                </div>
                <hr class="mb-1 " style=" border: 2px solid #000000; ">
                <div style="text-align: center;">
                    <label style="color: black;font-size : 15px ; " class="textee">إمضاء و ختم أمين المال </label>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-3">
                <label style="color: black;font-size : 15px;border: 3px solid #000000;padding: 10px ; " class="textee ">رقم الحساب الجاري للمجمع : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
            </div>
            <div class="col-4">
                <label style="color: black;font-size : 15px;border: 3px solid #000000;padding: 10px ;margin-right: -20px " class="textee ">................................................................................................................................</label>
            </div>
            <div style="border-top: 3px none #ffffff;
border-right: 3px solid #000000;
border-bottom: 3px solid #000000;
border-left: 3px solid #000000;padding:10px;margin-right: 106.5px;" class="col-4 ">
            </div>

        </div>


    </div>
</div>
    
<script>
    // Sélectionnez le bouton par son ID
    var boutonImprimer = document.getElementById('imprimerBouton2');

    // Ajoutez un gestionnaire d'événements pour le clic sur le bouton
    boutonImprimer.addEventListener('click', function() {
        window.print(); // Ouvre la boîte de dialogue d'impression
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>