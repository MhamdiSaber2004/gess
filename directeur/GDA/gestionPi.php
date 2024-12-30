<?php session_start();

if (!isset($_SESSION["idGess"])) {
  header("location: ../index.php");
  exit();
}


include_once "../db/db.php";
$idGess=$_SESSION['idGess'];
$sql = "SELECT type FROM gess WHERE idGess = $idGess";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $type = $row['type'];

    if ($type === "منطقة ماء صالح للشرب") {
        header("Location: gestionAep.php");
        exit;
    }
}
include "gestionPiController.php";






?>

<!DOCTYPE html>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="../../../cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.html"></script>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #000000;
      padding: 8px;
      text-align: right;
      direction: ltr;
    }

    th {
      background-color: #e7bb8261;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .capture-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    .accept-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: green;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
   
   
    .refuse-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: red;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    .btnsub{
        width: 70%;
        height: 44px;
    }

    @media print {
     h3, .capture-button {
        display: none;
      }
      body {
        zoom: 80%;
      }
    }
    @media  (max-width: 768px) {
      body {
        padding: 2px !imprtant;
        zoom: 80%;
      }
      
}
@media  (min-width: 769px) {
  table{
      font-size: 16px;
    }
     body{
      padding: 250px;
      padding-top: 20px;
      zoom: 90%;
    }
   
      
}

.title1 {
    text-align: center;
    margin-top: 25px;
    margin-bottom: 30px;
}

.text-with-border {
    border: 2px solid #000; 
    padding: 15px; 
    font-size: 15px;
    border-radius:10px;
    font-weight: bold;
}



  </style>
</head>
<body>

<?php 
  
  $sql = "SELECT * FROM budget WHERE idGess=$idGess";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {

?>
<div style="display:flex;">
<button class="capture-button" onclick="location.href='/gess/apgess/'">رجوع</button>
<button class="capture-button" onclick="capturePage()">طباعة</button>
</div>
<h3 style="text-align: right;font-size:22px">مرحبا, 
<?php
$idPompiste = $_SESSION['idPompiste'];
$sql = "SELECT nom FROM pompiste where idPompiste='$idGess'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo $row["nom"]; 
    }
  }
?>
</h3>
<h5 style="text-align: right;font-size:16px"> مجمع التنمية في قطاع الفلاحة و الصيد البحري للري </h5>
<div class="title1">  <span class="text-with-border">الميزانية السنوية لسنة 2023 - 2024</span></div>
<table>
    
    <tr>
      <th colspan="8" style="text-align: center;">  المعطيات الأولية </th>
    </tr>
    <tr>
       <th colspan="8" style="text-align: center;">  معطيات خاصة بالمنتفعين </th>
    </tr>
   
    <tr>
      <td colspan="1" ><?php echo $row["nombre_mitoyennete"] ;?> </td>
      <td colspan="2" >عدد المقاسم الفلاحية</td>
      <td colspan="1"  style="width:32px">هك</td>
      <td colspan="1" ><?php echo $row["surface_totale"] ;?></td>
      <td colspan="2" > المساحة الجملية  </td>
      <td colspan="1"  style="width:8px">(1)</td>
    </tr>
    <tr>
      <td colspan="1" ><?php echo $row["nombre_exploitants"] ;?></td>
      <td colspan="2" >عدد  المستغلين</td>
      <td colspan="1" >هك</td>
      <td colspan="1" ><?php echo $row["superficie_irriguee"] ;?></td>
      <td colspan="2" > المساحة المروية  </td>
      <td colspan="1"  style="width:8px">(2)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">   تقدير كميات الماء المتوقع انتاجها و توزيعها </th>
    </tr>
    <tr>
      <td  colspan="2"><?php echo $row["quantite_prevue_achat_ou_pompage"] ;?></td>
      <td  colspan="2">	م3</td>
      <td  colspan="3">  الكمية المزمع شرائها أو ضخها  </td>
      <td  colspan="1" style="width:8px">(3)</td>
    </tr>
    <tr>
      <td  colspan="2"> <?php echo $row["pourcentage_perte"] ;?></td>
      <td  colspan="2">%</td>
      <td  colspan="3">  نسبة الضياع	  </td>
      <td  colspan="1" style="width:8px">(4)</td>
    </tr>
    <tr>
      <td  colspan="2"><?php echo $row["quantite_prevue_distribution"] ;?></td>
      <td  colspan="2">	م3</td>
      <td  colspan="3">   الكمية المزمع توزيعها	((3)-(4)*(3)) </td>
      <td  colspan="1" style="width:8px">(5)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">   معطيات خاصة بمحطة الضخ</th>
    </tr> 
    <tr>
      <td colspan="2" ><?php echo $row["debit_pompe"] ;?></td>
      <td colspan="2" > (م3/س)</td>
      <td colspan="3" > 3,6 * (ل/ث) دفق محطة الضخ	  (م3/س)	 = دفق محطة الضخ </td>
      <td colspan="1"  style="width:8px">(8)</td>
    </tr>
    <tr>
      <td colspan="2" ><?php echo $row["heure_travail_ness"] ;?></td>
      <td colspan="2" >س</td>
      <td colspan="3" >  ((3)/(8))	= عدد ساعات التشغيل الضرورية  </td>
      <td colspan="1"  style="width:8px">(9)</td>
    </tr>
    <tr>
      <td colspan="2" ><?php echo $row["consommation_energie_par_heure"] ;?></td>
      <td colspan="2" ></td>
      <td colspan="3" >  استهلاك الطاقة في الساعة (كيلواط / الساعة أو لتر/س) </td>
      <td colspan="1"  style="width:8px">(10)</td>
    </tr>
    
    <tr>
      <th colspan="8" style="text-align: center;">تقدير تكاليف الصيانة السنوية</th>
    </tr> 
    <tr style="background-color : #fbe8d061;">
      <td colspan="5" >تكاليف الصيانة السنوية</td>
      <td colspan="1" >  	تكاليف الانجاز    </td>
      <td colspan="2"  style="width:8px">مكونات المشروع	</td>
    </tr>
    <tr>
    <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["point_eau1"] ;?></td>

      <td colspan="1" >=(11)*0.001</td>
      <td colspan="2" >(16)</td>
      <td colspan="1" ><?php echo $row["point_eau"] ;?></td>
      <td colspan="1" >  	نقطة الماء    </td>
      <td colspan="1"  style="width:8px">(11)</td>
    </tr>
    <tr>
    <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["reseau_construction1"] ;?></td>

      <td colspan="1" >=(12)*0.005</td>
      <td colspan="2" >(17)</td>
      <td colspan="1" ><?php echo $row["reseau_construction"] ;?></td>
      <td colspan="1" >  	الشبكة و البناء    </td>
      <td colspan="1"  style="width:8px">(12)</td>
    </tr>
    <tr>

      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["pompage_equipement1"] ;?></td>
      <td colspan="1" >=(13)*0.025</td>
      <td colspan="2" >(18)</td>
      <td colspan="1" ><?php echo $row["pompage_equipement"] ;?></td>
      <td colspan="1" >  	 تجهيزات محطة الضخ   </td>
      <td colspan="1"  style="width:8px">(13)</td>
    </tr>
    <tr>

      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["electricite1"] ;?></td>
      <td colspan="1" >=(14)*0.005</td>
      <td colspan="2" >(19)</td>
      <td colspan="1" ><?php echo $row["electricite"] ;?></td>
      <td colspan="1" >  		الكهربة (المحلول الكهربائي)    </td>
      <td colspan="1"  style="width:8px">(14)</td>
    </tr>
    <tr>

      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["compteurs1"] ;?></td>
      <td colspan="1" >=(15)*0.01</td>
      <td colspan="2" ></td>
      <td colspan="1" ><?php echo $row["compteurs"] ;?></td>
      <td colspan="1" >العدادات</td>
      <td colspan="1"  style="width:8px">(15)</td>
    </tr>
    <tr>

      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["couts_maintenance_totals"] ;?></td>
      <td colspan="1" >مجموع  تكاليف الصيانة</td>
      <td colspan="2" >(20)</td>
      <td colspan="1" ><?php echo $row["couts_totals_realisation"] ;?></td>
      <td colspan="1" >مجموع تكاليف الانجاز    </td>
      <td colspan="1"  style="width:8px"></td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">معطيات أخرى</th>
    </tr> 
    <tr>
      <td colspan="1" ><?php echo $row["nombre_membres"] ;?></td>
      <td colspan="2" >  عدد  المنخرطين</td>
      <td colspan="1" >(31)</td>
      <td colspan="1" ><?php echo $row["cout_unitaire_energie"] ;?></td>
      <td colspan="2" >تكلفة وحدة الطاقة</td>
      <td colspan="1"  style="width:8px">(21)</td>
    </tr>
    <tr>
      <td colspan="1" ><?php echo $row["informations_adhesion"] ;?></td>
      <td colspan="2"  > معلوم الانخراط</td>
      <td colspan="1" >(32)</td>
      <td colspan="1" ><?php echo $row["cout_achat_eau"] ;?></td>
      <td colspan="2" >  	تكلفة شراء الماء    </td>
      <td colspan="1"  style="width:8px">(22)</td>
    </tr>
    <tr>
      <td colspan="1" ><?php echo $row["solde_initial_debut_annee"] ;?></td>
      <td colspan="2" >الرصيد الجملي في بداية السنة</td>
      <td colspan="1" >(33)</td>
      <td colspan="1" ></td>
      <td colspan="2" >  	    </td>
      <td colspan="1"  style="width:8px">(23)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(34)</td>
      <td colspan="1" ><?php echo $row["prix_compteur"] ;?></td>
      <td colspan="2" >  	سعر العداد	    </td>
      <td colspan="1"  style="width:8px">(24)</td>
    </tr>
    <tr>
      <td colspan="1" ><?php echo $row["montant_mensuel_net"] ;?></td>
      <td colspan="2" > المعلوم الشهري القار </td>
      <td colspan="1" >(35)</td>
      <td colspan="1" ><?php echo $row["prix_moto"] ;?></td>
      <td colspan="2" >  	 سعر الدراجة النارية   </td>
      <td colspan="1"  style="width:8px">(25)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(36)</td>
      <td colspan="1" ><?php echo $row["duree_renovation_moto"] ;?></td>
      <td colspan="2" >  		المدة المخصصة لتجديد الدراجة النارية    </td>
      <td colspan="1"  style="width:8px">(26)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(37)</td>
      <td colspan="1" ><?php echo $row["nombre_Travailleur"] ;?></td>
      <td colspan="2" >  		عدد العملة    </td>
      <td colspan="1"  style="width:8px">(27)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["salaire_et_avantages_en_nature_par_an"] ;?></td>
      <td colspan="2" >  	أجرة ومنح العملة في السنة    </td>
      <td colspan="1"  style="width:8px">(28)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["salaire_et_avantages_du_directeur_technique_par_an"] ;?></td>
      <td colspan="2" >  		أجرة ومنح المدير الفني في السنة    </td>
      <td colspan="1"  style="width:8px">(29)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["salaire_gardien_per_m3_eau"] ;?></td>
      <td colspan="2" >  	أجرة الحارس المتصرف على م3 من الماء    </td>
      <td colspan="1"  style="width:8px">(30)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;"> تقدير المصاريف</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_achat_eau"] ;?></td>
      <td colspan="5" >مصاريف شراء الماء = (3 ) * (22 )</td>
      <td colspan="1"  style="width:8px">(40)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_energie"] ;?></td>
      <td colspan="5" >مصاريف الطاقة = (10) * (9) * (21)</td>
      <td colspan="1"  style="width:8px">(41)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["salaire_et_avantages_en_nature_par_an1"] ;?></td>
      <td colspan="2" >أجرة العملة = (28)</td>
      <td colspan="3" rowspan="3" >  	أجرة اليد العاملة    </td>
      <td colspan="1" rowspan="3"  style="width:8px">(42)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["salaire_et_avantages_du_directeur_technique_par_an1"] ;?></td>
      <td colspan="2" >	أجرة المدير الفني = (29)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["couts_maintenance_totals1"] ;?></td>
      <td colspan="2" >	التكاليف السنوية المخصصة للصيانة = (20)</td>
      <td colspan="3" rowspan="3" > المصاريف الجملية المخصصة للصيانة والإصلاح   </td>
      <td colspan="1" rowspan="3"  style="width:8px">(43)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["couverture_deficit_enregistre"] ;?></td>
      <td colspan="2" >	تغطية العجز االمسجل في مجال جمع إعتمادات الصيانة خلال السنوات الفارطة</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["renouvellement_des_compteurs"] ;?></td>
      <td colspan="2" >	تجديد العدادات = (1) * 0.1 * (24)	</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_de_transport_deplacement"] ;?></td>
      <td colspan="2" >	مصاريف النقل و التنقل</td>
      <td colspan="3" rowspan="4" > مصاريف الإستغلال الأخرى  </td>
      <td colspan="1"  style="width:8px">(44)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
      <td colspan="1"  style="width:8px">(45)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
      <td colspan="1"  style="width:8px">(46)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(47)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["renouvellement_des_equipements"] ;?></td>
      <td colspan="5" >  	  تجديد المعدات ( الدراجة النارية ) = (25) / (26)  </td>
      <td colspan="1"  style="width:8px">(48)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_gestion_association"] ;?></td>
      <td colspan="5" >  		مصاريف التصرف الخاص بالمجمع    </td>
      <td colspan="1"  style="width:8px">(49)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_gestion_association"] ;?></td>
      <td colspan="5" >  		مصاريف مختلفة و طارئة	   </td>
      <td colspan="1"  style="width:8px">(50)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["total_frais_exploitation_entretien"] ;?></td>
      <td colspan="5" >  		مجموع مصاريف الإستغلال والصيانة = مجموع المصاريف المنصوص عليها اعلاه   </td>
      <td colspan="1"  style="width:8px">(51)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["cout_par_metre_cube"] ;?></td>
      <td colspan="5" >  تكلفة المتر المكعب = (51) / (5)  </td>
      <td colspan="1"  style="width:8px">(52)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="3"rowspan="2" >  			مصاريف الإستثمار والتجهيز  </td>
      <td colspan="1" rowspan="2" style="width:8px">(53)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["prix_moto1"] ;?></td>
      <td colspan="2" >شراء دراجة نارية = (25)</td> 
     
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["frais_activites_autres"] ;?></td>
      <td colspan="5" >  		مصاريف الأنشطة الأخرى  </td>
      <td colspan="1"  style="width:8px">(54)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["total_des_depenses"] ;?></td>
      <td colspan="5" >  	مجموع المصاريف = (51) + (53) +(25) + (54)	  </td>
      <td colspan="1"  style="width:8px">(55)</td>
    </tr> 
    <tr>
      <th colspan="8" style="text-align: center;"> تقدير المداخيل</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["revenues_des_adhesions"] ;?></td>
      <td colspan="5" >	مداخيل الإنخراطات = (31) * (32)</td>
      <td colspan="1"  style="width:8px">(56)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["revenues_des_frais_globaux"] ;?></td>
      <td colspan="5" >المداخيل المتأتية من المعاليم القارة الموظفة على الربط الخاص = (1) * (35) * 12 شهرا</td>
      <td colspan="1"  style="width:8px">(57)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["revenues_vente_eau"] ;?></td>
      <td colspan="5" >مداخيل بيع الماء = (51) - (56) - (57)</td>
      <td colspan="1"  style="width:8px">(58)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["total_revenues_exploitation_maintenance"] ;?></td>
      <td colspan="5" >مجموع مداخيل الإستغلال والصيانة = (51) = (56) + (57) + (58)	</td>
      <td colspan="1"  style="width:8px">(59)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="5" ></td>
      <td colspan="1"  style="width:8px">(60)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["revenues_other_activities"] ;?></td>
      <td colspan="5" >مداخيل الأنشطة الأخرى</td>
      <td colspan="1"  style="width:8px">(61)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["total_revenues"] ;?></td>
      <td colspan="5" >مجموع المداخيل = (59) + (60) + (61)</td>
      <td colspan="1"  style="width:8px">(62)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["solde_attendu_fin_annee"] ;?></td>
      <td colspan="5" >	الرصيد المنتظر في نهاية السنة = (33) - (55) + (62)</td>
      <td colspan="1"  style="width:8px">(63)</td>
    </tr> 
    <tr>
      <th colspan="8" style="text-align: center;">  التسعيرة</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["tarif_m3_eau"] ;?></td>
      <td colspan="3" >	سعر م3 من الماء = (58) / (5)</td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(64)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><?php echo $row["prix_vente_heure"] ;?></td>
      <td colspan="3" >	سعر البيع بالساعة = (64) / (8)</td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(65)</td>
    </tr> 
    

  
</table>

<?php }}else { ?>
  <div style="display:flex;">
<button class="capture-button" onclick="location.href='../index.php'">رجوع</button>
</div>
<h3 style="text-align: right;font-size:22px">مرحبا, 
<?php
$idPompiste = $_SESSION['idPompiste'];
$sql = "SELECT nom FROM pompiste where idPompiste='$idGess'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo $row["nom"]; 
    }
  }
?>
</h3>
<h5 style="text-align: right;font-size:16px"> مجمع التنمية في قطاع الفلاحة و الصيد البحري للري </h5><br>
<h5 style="text-align: right;font-size:14px;color :red">  الرجاء تعمير جميع الخانات و التثبت من صحتها قبل التسجيل / لا يمكن تعديل الخانات بعد التسجيل *</h5>
<div class="title1">  <span class="text-with-border">الميزانية السنوية لسنة 2023 - 2024</span></div>
<form method="POST" onsubmit="submitData()">
<table>
    
    <tr>
      <th colspan="8" style="text-align: center;">  المعطيات الأولية </th>
    </tr>
    <tr>
       <th colspan="8" style="text-align: center;">  معطيات خاصة بالمنتفعين </th>
    </tr>
    <?php
      $sql = "SELECT surface_totale 
      FROM
      pi_donnees_points_distribution where idGess=$idGess";
      
      // Execute the query
      $result = $conn->query($sql);
      
      // Check for and retrieve the result
      if ($result) {
          $row = $result->fetch_assoc();
          $totalSum = $row['surface_totale'];
      } 

  ?>
    <tr>
      <td colspan="1" ><input type="number" step="any" name="nombre_mitoyennete" id="nombre_mitoyennete" dir="rtl" placeholder="ادخال عدد المقاسم الفلاحية " value="2"  ></td>
      <td colspan="2" >عدد المقاسم الفلاحية</td>
      <td colspan="1"  style="width:32px">هك</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="surface_totale" id="surface_totale" placeholder="ادخال عدد المقاسم الفلاحية " value="<?php echo $totalSum ;?>"  ></td>
      <td colspan="2" > المساحة الجملية  </td>
      <td colspan="1"  style="width:8px">(1)</td>
    </tr>
    <tr>
      <td colspan="1" ><input type="number" step="any" name="nombre_exploitants" id="nombre_exploitants" dir="rtl" placeholder=" ادخال  عدد المستغلين" ></td>
      <td colspan="2" >عدد  المستغلين</td>
      <td colspan="1" >هك</td>
      <td colspan="1" ><input type="number" step="any" name="superficie_irriguee" id="superficie_irriguee" dir="rtl" placeholder=" ادخال المساحة المروية" ></td>
      <td colspan="2" > المساحة المروية  </td>
      <td colspan="1"  style="width:8px">(2)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">   تقدير كميات الماء المتوقع انتاجها و توزيعها </th>
    </tr>
    <tr>
      <td  colspan="2"><input  type="number" step="any" name="quantite_prevue_achat_ou_pompage" id="quantite_prevue_achat_ou_pompage"  dir="rtl" placeholder="  الكمية المزمع شرائها أو ضخها   "   onkeyup="calcul()"></td>
      <td  colspan="2">	م3</td>
      <td  colspan="3">  الكمية المزمع شرائها أو ضخها  </td>
      <td  colspan="1" style="width:8px">(3)</td>
    </tr>
    <tr>
      <td  colspan="2"> <input type="number" step="any"  name="pourcentage_perte" id="pourcentage_perte" dir="rtl" placeholder=" نسبة الضياع	  " onkeyup="calcul()" ></td>
      <td  colspan="2">%</td>
      <td  colspan="3">  نسبة الضياع	  </td>
      <td  colspan="1" style="width:8px">(4)</td>
    </tr>
    <tr>
      <td  colspan="2"><input type="number" step="any"  name="quantite_prevue_distribution" id="quantite_prevue_distribution"  dir="rtl"  value="" onkeyup="calcul()"  disabled></td>
      <td  colspan="2">	م3</td>
      <td  colspan="3">   الكمية المزمع توزيعها	((3)-(4)*(3)) </td>
      <td  colspan="1" style="width:8px">(5)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">   معطيات خاصة بمحطة الضخ</th>
    </tr> 
    <tr>
      <td colspan="2" ><input type="number" step="any" dir="rtl" name="debit_pompe" id="debit_pompe" placeholder=" دفق  محطة الضخ" onkeyup="calcul()" ></td>
      <td colspan="2" > (م3/س)</td>
      <td colspan="3" > 3,6 * (ل/ث) دفق محطة الضخ	  (م3/س)	 = دفق محطة الضخ </td>
      <td colspan="1"  style="width:8px">(8)</td>
    </tr>
    <tr>
      <td colspan="2" ><input disabled type="number" name="heure_travail_ness" id="heure_travail_ness" step="any" dir="rtl" value="0" onkeyup="calcul()" ></td>
      <td colspan="2" >س</td>
      <td colspan="3" >  ((3)/(8))	= عدد ساعات التشغيل الضرورية  </td>
      <td colspan="1"  style="width:8px">(9)</td>
    </tr>
    <tr>
      <td colspan="2" ><input  type="number" name="consommation_energie_par_heure" id="consommation_energie_par_heure" step="any" dir="rtl" onkeyup="calcul()"></td>
      <td colspan="2" ></td>
      <td colspan="3" >  استهلاك الطاقة في الساعة (كيلواط / الساعة أو لتر/س) </td>
      <td colspan="1"  style="width:8px">(10)</td>
    </tr>
    
    <tr>
      <th colspan="8" style="text-align: center;">تقدير تكاليف الصيانة السنوية</th>
    </tr> 
    <tr style="background-color : #fbe8d061;">
      <td colspan="5" >تكاليف الصيانة السنوية</td>
      <td colspan="1" >  	تكاليف الانجاز    </td>
      <td colspan="2"  style="width:8px">مكونات المشروع	</td>
    </tr>
    <tr>
      <td colspan="1" ><input disabled type="number" name="point_eau1" id="point_eau1" step="any" dir="rtl"></td>
      <td colspan="1" >د</td>
      <td colspan="1" >=(11)*0.001</td>
      <td colspan="2" >(16)</td>
      <td colspan="1" ><input  type="number" name="point_eau" id="point_eau" step="any" dir="rtl" placeholder="  نقطة الماء   " onkeyup="calcul()"></td>
      <td colspan="1" >  	نقطة الماء    </td>
      <td colspan="1"  style="width:8px">(11)</td>
    </tr>
    <tr>
      <td colspan="1" ><input disabled type="number" name="reseau_construction1" id="reseau_construction1" step="any" dir="rtl" onkeyup="calcul()" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" >=(12)*0.005</td>
      <td colspan="2" >(17)</td>
      <td colspan="1" ><input  type="number" name="reseau_construction" id="reseau_construction" step="any" dir="rtl" placeholder="  الشبكة و البناء   " onkeyup="calcul()"></td>
      <td colspan="1" >  	الشبكة و البناء    </td>
      <td colspan="1"  style="width:8px">(12)</td>
    </tr>
    <tr>
      <td colspan="1" ><input disabled type="number" name="pompage_equipement1" id="pompage_equipement1" step="any" dir="rtl" onkeyup="calcul()" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" >=(13)*0.025</td>
      <td colspan="2" >(18)</td>
      <td colspan="1" ><input  type="number" name="pompage_equipement" id="pompage_equipement" step="any" dir="rtl" placeholder="  تجهيزات محطة الضخ   " onkeyup="calcul()"></td>
      <td colspan="1" >  	 تجهيزات محطة الضخ   </td>
      <td colspan="1"  style="width:8px">(13)</td>
    </tr>
    <tr>
      <td colspan="1" ><input disabled type="number" name="electricite1" id="electricite1" step="any" dir="rtl" onkeyup="calcul()" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" >=(14)*0.005</td>
      <td colspan="2" >(19)</td>
      <td colspan="1" ><input  type="number" name="electricite" id="electricite" step="any" dir="rtl" placeholder="الكهربة" onkeyup="calcul()"></td>
      <td colspan="1" >  		الكهربة (المحلول الكهربائي)    </td>
      <td colspan="1"  style="width:8px">(14)</td>
    </tr>
    <tr>
      <td colspan="1" ><input disabled type="number" name="compteurs1" id="compteurs1" step="any" dir="rtl" onkeyup="calcul()" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" >=(15)*0.01</td>
      <td colspan="2" ></td>
      <td colspan="1" ><input  type="number" name="compteurs" id="compteurs" step="any" dir="rtl" placeholder="   العدادات   " onkeyup="calcul()"></td>
      <td colspan="1" >العدادات</td>
      <td colspan="1"  style="width:8px">(15)</td>
    </tr>
    <tr>
      <td colspan="1" ><input  type="couts_maintenance_totals" onkeyup="calcul()" name="couts_maintenance_totals" id="couts_maintenance_totals" step="any" dir="rtl" disabled></td>
      <td colspan="1" >د</td>
      <td colspan="1" >مجموع  تكاليف الصيانة</td>
      <td colspan="2" >(20)</td>
      <td colspan="1" ><input  type="number" onkeyup="calcul()" name="couts_totals_realisation" id="couts_totals_realisation" step="any" dir="rtl" disabled></td>
      <td colspan="1" >مجموع تكاليف الانجاز    </td>
      <td colspan="1"  style="width:8px"></td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;">معطيات أخرى</th>
    </tr> 
    <tr>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="nombre_membres" id="nombre_membres" placeholder=" عدد  المنخرطين "  ></td>
      <td colspan="2" >  عدد  المنخرطين</td>
      <td colspan="1" >(31)</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="cout_unitaire_energie" id="cout_unitaire_energie" placeholder=" تكلفة وحدة الطاقة"  ></td>
      <td colspan="2" >تكلفة وحدة الطاقة</td>
      <td colspan="1"  style="width:8px">(21)</td>
    </tr>
    <tr>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="informations_adhesion" id="informations_adhesion" placeholder=" معلوم الانخراط"  ></td>
      <td colspan="2"  > معلوم الانخراط</td>
      <td colspan="1" >(32)</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="cout_achat_eau" id="cout_achat_eau" placeholder="   تكلفة شراء الماء  "  ></td>
      <td colspan="2" >  	تكلفة شراء الماء    </td>
      <td colspan="1"  style="width:8px">(22)</td>
    </tr>
    <tr>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="solde_initial_debut_annee" id="solde_initial_debut_annee" placeholder="  الرصيد الجملي في بداية السنة   "  ></td>
      <td colspan="2" >الرصيد الجملي في بداية السنة</td>
      <td colspan="1" >(33)</td>
      <td colspan="1" ></td>
      <td colspan="2" >  	    </td>
      <td colspan="1"  style="width:8px">(23)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(34)</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="prix_compteur" id="prix_compteur" placeholder="    سعر العداد"  ></td>
      <td colspan="2" >  	سعر العداد	    </td>
      <td colspan="1"  style="width:8px">(24)</td>
    </tr>
    <tr>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="montant_mensuel_net" id="montant_mensuel_net" placeholder=" المعلوم الشهري القار "  ></td>
      <td colspan="2" > المعلوم الشهري القار </td>
      <td colspan="1" >(35)</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="prix_moto" id="prix_moto" placeholder="سعر الدراجة النارية "  onkeyup="calcul()" ></td>
      <td colspan="2" >  	 سعر الدراجة النارية   </td>
      <td colspan="1"  style="width:8px">(25)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(36)</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="duree_renovation_moto" id="duree_renovation_moto" placeholder=" المدة المخصصة لتجديد الدراجة النارية "  ></td>
      <td colspan="2" >  		المدة المخصصة لتجديد الدراجة النارية    </td>
      <td colspan="1"  style="width:8px">(26)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >(37)</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="nombre_Travailleur" id="nombre_Travailleur" placeholder=" عدد العملة "  ></td>
      <td colspan="2" >  		عدد العملة    </td>
      <td colspan="1"  style="width:8px">(27)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="salaire_et_avantages_en_nature_par_an" id="salaire_et_avantages_en_nature_par_an" placeholder=" أجرة ومنح العملة في السنة "   ></td>
      <td colspan="2" >  	أجرة ومنح العملة في السنة    </td>
      <td colspan="1"  style="width:8px">(28)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="salaire_et_avantages_du_directeur_technique_par_an" id="salaire_et_avantages_du_directeur_technique_par_an" placeholder=" أجرة ومنح المدير الفني في السنة "   ></td>
      <td colspan="2" >  		أجرة ومنح المدير الفني في السنة    </td>
      <td colspan="1"  style="width:8px">(29)</td>
    </tr>
    <tr>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="salaire_gardien_per_m3_eau" id="salaire_gardien_per_m3_eau" placeholder="أجرة الحارس المتصرف على م3 من الماء "  ></td>
      <td colspan="2" >  	أجرة الحارس المتصرف على م3 من الماء    </td>
      <td colspan="1"  style="width:8px">(30)</td>
    </tr>
    <tr>
      <th colspan="8" style="text-align: center;"> تقدير المصاريف</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="frais_achat_eau" id="frais_achat_eau" disabled onkeyup="calcul()" ></td>
      <td colspan="5" >مصاريف شراء الماء = (3 ) * (22 )</td>
      <td colspan="1"  style="width:8px">(40)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="frais_energie" id="frais_energie"  onkeyup="calcul()"  disabled></td>
      <td colspan="5" >مصاريف الطاقة = (10) * (9) * (21)</td>
      <td colspan="1"  style="width:8px">(41)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="salaire_et_avantages_en_nature_par_an1" id="salaire_et_avantages_en_nature_par_an1" disabled onkeyup="calcul()" ></td>
      <td colspan="2" >أجرة العملة = (28)</td>
      <td colspan="3" rowspan="3" >  	أجرة اليد العاملة    </td>
      <td colspan="1" rowspan="3"  style="width:8px">(42)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" onkeyup="calcul()" dir="rtl" name="salaire_et_avantages_du_directeur_technique_par_an1" id="salaire_et_avantages_du_directeur_technique_par_an1" onkeyup="calcul()" ></td>
      <td colspan="2" >	أجرة المدير الفني = (29)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" onkeyup="calcul()" dir="rtl" name="couts_maintenance_totals1" id="couts_maintenance_totals1"  onkeyup="calcul()" ></td>
      <td colspan="2" >	التكاليف السنوية المخصصة للصيانة = (20)</td>
      <td colspan="3" rowspan="3" > المصاريف الجملية المخصصة للصيانة والإصلاح   </td>
      <td colspan="1" rowspan="3"  style="width:8px">(43)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="couverture_deficit_enregistre" placeholder="تغطية العجز" id="couverture_deficit_enregistre" onkeyup="calcul()" ></td>
      <td colspan="2" >	تغطية العجز االمسجل في مجال جمع إعتمادات الصيانة خلال السنوات الفارطة</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" onkeyup="calcul()" dir="rtl" name="renouvellement_des_compteurs" id="renouvellement_des_compteurs"  onkeyup="calcul()" ></td>
      <td colspan="2" >	تجديد العدادات = (1) * 0.1 * (24)	</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" onkeyup="calcul()" dir="rtl" name="frais_de_transport_deplacement" id="frais_de_transport_deplacement" placeholder=" مصاريف النقل و التنقل" onkeyup="calcul()" ></td>
      <td colspan="2" >	مصاريف النقل و التنقل</td>
      <td colspan="3" rowspan="4" > مصاريف الإستغلال الأخرى  </td>
      <td colspan="1"  style="width:8px">(44)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
      <td colspan="1"  style="width:8px">(45)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" >	</td>
      <td colspan="1"  style="width:8px">(46)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(47)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="renouvellement_des_equipements" id="renouvellement_des_equipements" onkeyup="calcul()" ></td>
      <td colspan="5" >  	  تجديد المعدات ( الدراجة النارية ) = (25) / (26)  </td>
      <td colspan="1"  style="width:8px">(48)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="frais_gestion_association" id="frais_gestion_association" placeholder=" مصاريف التصرف الخاص بالمجمع  " onkeyup="calcul()" ></td>
      <td colspan="5" >  		مصاريف التصرف الخاص بالمجمع    </td>
      <td colspan="1"  style="width:8px">(49)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="frais_divers_taraa" id="frais_divers_taraa" placeholder=" مصاريف مختلفة و طارئة	" onkeyup="calcul()" ></td>
      <td colspan="5" >  		مصاريف مختلفة و طارئة	   </td>
      <td colspan="1"  style="width:8px">(50)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="total_frais_exploitation_entretien" id="total_frais_exploitation_entretien"  onkeyup="calcul()" ></td>
      <td colspan="5" >  		مجموع مصاريف الإستغلال والصيانة = مجموع المصاريف المنصوص عليها اعلاه   </td>
      <td colspan="1"  style="width:8px">(51)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="cout_par_metre_cube" id="cout_par_metre_cube" onkeyup="calcul()"></td>
      <td colspan="5" >  تكلفة المتر المكعب = (51) / (5)  </td>
      <td colspan="1"  style="width:8px">(52)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="2" ></td>
      <td colspan="3"rowspan="2" >  			مصاريف الإستثمار والتجهيز  </td>
      <td colspan="1" rowspan="2" style="width:8px">(53)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="prix_moto1" id="prix_moto1" onkeyup="calcul()" ></td>
      <td colspan="2" >شراء دراجة نارية = (25)</td> 
     
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input type="number" step="any" dir="rtl" name="frais_activites_autres" id="frais_activites_autres"  placeholder="    مصاريف الأنشطة الأخرى " onkeyup="calcul()" ></td>
      <td colspan="5" >  		مصاريف الأنشطة الأخرى  </td>
      <td colspan="1"  style="width:8px">(54)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="total_des_depenses" id="total_des_depenses"   onkeyup="calcul()" ></td>
      <td colspan="5" >  	مجموع المصاريف = (51) + (53) +(25) + (54)	  </td>
      <td colspan="1"  style="width:8px">(55)</td>
    </tr> 
    <tr>
      <th colspan="8" style="text-align: center;"> تقدير المداخيل</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="revenues_des_adhesions" id="revenues_des_adhesions" onkeyup="calcul()" ></td>
      <td colspan="5" >	مداخيل الإنخراطات = (31) * (32)</td>
      <td colspan="1"  style="width:8px">(56)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="revenues_des_frais_globaux" id="revenues_des_frais_globaux" onkeyup="calcul()" ></td>
      <td colspan="5" >المداخيل المتأتية من المعاليم القارة الموظفة على الربط الخاص = (1) * (35) * 12 شهرا</td>
      <td colspan="1"  style="width:8px">(57)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="revenues_vente_eau" id="revenues_vente_eau" onkeyup="calcul()" ></td>
      <td colspan="5" >مداخيل بيع الماء = (51) - (56) - (57)</td>
      <td colspan="1"  style="width:8px">(58)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="total_revenues_exploitation_maintenance" id="total_revenues_exploitation_maintenance" onkeyup="calcul()" ></td>
      <td colspan="5" >مجموع مداخيل الإستغلال والصيانة = (51) = (56) + (57) + (58)	</td>
      <td colspan="1"  style="width:8px">(59)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ></td>
      <td colspan="5" ></td>
      <td colspan="1"  style="width:8px">(60)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input  type="number" step="any" dir="rtl" name="revenues_other_activities" placeholder="مداخيل الأنشطة الأخرى	" id="revenues_other_activities" onkeyup="calcul()" ></td>
      <td colspan="5" >مداخيل الأنشطة الأخرى</td>
      <td colspan="1"  style="width:8px">(61)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="total_revenues" id="total_revenues" onkeyup="calcul()" ></td>
      <td colspan="5" >مجموع المداخيل = (59) + (60) + (61)</td>
      <td colspan="1"  style="width:8px">(62)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="solde_attendu_fin_annee" id="solde_attendu_fin_annee" onkeyup="calcul()" ></td>
      <td colspan="5" >	الرصيد المنتظر في نهاية السنة = (37) - (55) + (62)</td>
      <td colspan="1"  style="width:8px">(63)</td>
    </tr> 
    <tr>
      <th colspan="8" style="text-align: center;">  التسعيرة</th>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="tarif_m3_eau" id="tarif_m3_eau" onkeyup="calcul()" ></td>
      <td colspan="3" >	سعر م3 من الماء = (58) / (5)</td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(64)</td>
    </tr> 
    <tr>
      <td colspan="1" >د</td>
      <td colspan="1" ><input disabled type="number" step="any" dir="rtl" name="prix_vente_heure" id="prix_vente_heure" onkeyup="calcul()" ></td>
      <td colspan="3" >	سعر البيع بالساعة = (64) / (8)</td>
      <td colspan="2" ></td>
      <td colspan="1"  style="width:8px">(65)</td>
    </tr> 
    <th colspan="8" style="text-align: center;background-color: white;">  <button class="btn btn-success btnsub" type="submit" name="submit">تسجيل</button>  </th>



  
</table>

    </form>
<?php } ?>
<script src="js/calcul.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  function capturePage() {
    // Use window.print() to open the print dialog
    window.print();
  }
</script>
</body>

<!-- Mirrored from gcs.org.tn/GDA/admin/infogda.php?id=39 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Sep 2023 05:11:44 GMT -->
</html>




