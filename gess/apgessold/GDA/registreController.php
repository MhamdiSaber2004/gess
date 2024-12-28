<?php

if(isset($_POST['submit1'])) {


    $monthTranslationsNmr = [
        'جانفي' => 1,
        'فيفري' => 2,
        'مارس' => 3,
        'أفريل' => 4,
        'ماي' => 5,
        'جوان' => 6,
        'جويلية' => 7,
        'أوت' => 8,
        'سبتمبر' => 9,
        'أكتوبر' => 10,
        'نوفمبر' => 11,
        'ديسمبر' => 12,
      ];
     

    $processedVariables = array();

    foreach ($_POST as $key => $value) {
        if ($value === '' && is_numeric($value)) {
            $processedVariables[$key] = 0;
            $x++;
        } else {
            $processedVariables[$key] = $conn->real_escape_string($value);
        }
    }

    $processedVariables["idGess"]=$idGess;
    $processedVariables["annee"]=$annee;
    $processedVariables["mois"]=$mois;
    $processedVariables["date"]=$currentDayOfMonth;

    $processedVariables["moisNmr"] = $monthTranslationsNmr[$mois] ?? 0;
    unset($processedVariables['submit1']);
    
    $sql = "INSERT INTO registre (" . implode(", ", array_keys($processedVariables)) . ")
            VALUES ('" . implode("', '", $processedVariables) . "')";
    

        if ($conn->query($sql) === TRUE) {
       
  
    header("Location: registre.php?moisValue=$moisValue&annee=$annee");
    exit();
   } 
    
}

if(isset($_POST['submit2'])) {

    $processedVariables = array();

    foreach ($_POST as $key => $value) {
        if ($value === '' && is_numeric($value)) {
            $processedVariables[$key] = 0;
        } else {
            $processedVariables[$key] = $conn->real_escape_string($value);
        }
    }

    $processedVariables["idGess"]=$idGess;
    $processedVariables["annee"]=$annee-1;
    $processedVariables["mois"]="all";
    unset($processedVariables['submit2']);
    
    $sql = "INSERT INTO registre (" . implode(", ", array_keys($processedVariables)) . ")
            VALUES ('" . implode("', '", $processedVariables) . "')";
    
    if ($conn->query($sql) === TRUE) {
       
    } else {
    }
    header("Location: registre.php?moisValue=$moisValue&annee=$annee");
    exit(); 
    
}
?>