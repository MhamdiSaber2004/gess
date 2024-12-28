<?php
/*
if(isset($_POST)){
    if(isset($_POST["date"])){
       $mois1=$_POST['mois'];
       $annee1=$_POST['annee'];
       $date=$_POST['date'];
       $statement=$_POST['statement'];
       $numeros_acces=$_POST['numeros_acces'];
       $adhesions=$_POST['adhesions'];
       $abonnements=$_POST['abonnements'];
       $vente_eau=$_POST['vente_eau'];
       $autres_revenus=$_POST['autres_revenus'];
       $montant_merchandises=$_POST['montant_merchandises'];
       $achat_eau=$_POST['achat_eau'];
       $enrgie=$_POST['enrgie'];
       $autres_frais_exploitation=$_POST['autres_frais_exploitation'];
       $maintenance_et_reparations=$_POST['maintenance_et_reparations'];
       $salaires=$_POST['salaires'];
       $gestion_et_administration=$_POST['gestion_et_administration'];
       $salaires2=$_POST['salaires2'];
       $depenses_activites_autres=$_POST['depenses_activites_autres'];
       $investissement_et_equipement=$_POST['investissement_et_equipement'];
       $dakhil=$_POST['dakhil'];
       $sarf=$_POST['sarf'];
       $dakhil1=$_POST['dakhil1'];
       $sarf1=$_POST['sarf1'];
 
       $sqlin = "INSERT INTO `registre`(`idGess`, `mois`, `annee`, `date`, `statement`, `numeros_acces`, `adhesions`, `abonnements`, `vente_eau`, `autres_revenus`, `montant_merchandises`, `achat_eau`, `enrgie`, `autres_frais_exploitation`, `maintenance_et_reparations`, `salaires`, `gestion_et_administration`, `salaires2`, `depenses_activites_autres`, `investissement_et_equipement`, `dakhil`, `sarf`, `dakhil1`, `sarf1`,`derinier_moin`) VALUES ('$idGess','$mois1','$annee1','$date','$statement','$numeros_acces','$adhesions','$abonnements','$vente_eau','$autres_revenus','$montant_merchandises','$achat_eau','$enrgie','$autres_frais_exploitation','$maintenance_et_reparations','$salaires','$gestion_et_administration','$salaires2','$depenses_activites_autres','$investissement_et_equipement','$dakhil','$sarf','$dakhil1','$sarf1','0')";
 
       if($conn->query($sqlin)){
          $_SESSION['messageClass']="success";
          $_SESSION['message']="تمت الإضافة بنجاح";
          header("Location: registre.php?moisValue=".$moisValue."&annee=".$annee);
       }
 
    }else{
       $mois1=$_POST['mois'];
       $annee1=$_POST['annee'];
       $adhesions=$_POST['adhesions'];
       $abonnements=$_POST['abonnements'];
       $vente_eau=$_POST['vente_eau'];
       $autres_revenus=$_POST['autres_revenus'];
       $montant_merchandises=$_POST['montant_merchandises'];
       $achat_eau=$_POST['achat_eau'];
       $enrgie=$_POST['enrgie'];
       $autres_frais_exploitation=$_POST['autres_frais_exploitation'];
       $maintenance_et_reparations=$_POST['maintenance_et_reparations'];
       $salaires=$_POST['salaires'];
       $gestion_et_administration=$_POST['gestion_et_administration'];
       $salaires2=$_POST['salaires2'];
       $depenses_activites_autres=$_POST['depenses_activites_autres'];
       $investissement_et_equipement=$_POST['investissement_et_equipement'];
       $dakhil=$_POST['dakhil'];
       $sarf=$_POST['sarf'];
       $dakhil1=$_POST['dakhil1'];
       $sarf1=$_POST['sarf1'];
 
       $sqlin = "INSERT INTO `registre`(`idGess`, `mois`, `annee`, `adhesions`, `abonnements`, `vente_eau`, `autres_revenus`, `montant_merchandises`, `achat_eau`, `enrgie`, `autres_frais_exploitation`, `maintenance_et_reparations`, `salaires`, `gestion_et_administration`, `salaires2`, `depenses_activites_autres`, `investissement_et_equipement`, `dakhil`, `sarf`, `dakhil1`, `sarf1`,`derinier_moin`) VALUES ('$idGess','$mois1','$annee1','$adhesions','$abonnements','$vente_eau','$autres_revenus','$montant_merchandises','$achat_eau','$enrgie','$autres_frais_exploitation','$maintenance_et_reparations','$salaires','$gestion_et_administration','$salaires2','$depenses_activites_autres','$investissement_et_equipement','$dakhil','$sarf','$dakhil1','$sarf1','1')";
 
       if($conn->query($sqlin)){
          $_SESSION['messageClass']="success";
          $_SESSION['message']="تمت الإضافة بنجاح";
          header("Location: registre.php?moisValue=".$moisValue."&annee=".$annee);
       }
    }
 }
*/
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

if(isset($_POST['submit'])) {
    
    $idRegistre=$_POST['idRegistre1'];

    $date=$_POST['date'];
    $statement=$_POST['statement'];
    $numeros_acces=$_POST['numeros_acces'];
    $adhesions=$_POST['adhesions'];
    $abonnements=$_POST['abonnements'];
    $vente_eau=$_POST['vente_eau'];
    $autres_revenus=$_POST['autres_revenus'];
    $montant_merchandises=$_POST['montant_merchandises'];
    $achat_eau=$_POST['achat_eau'];
    $enrgie=$_POST['enrgie'];
    $autres_frais_exploitation=$_POST['autres_frais_exploitation'];
    $maintenance_et_reparations=$_POST['maintenance_et_reparations'];
    $salaires=$_POST['salaires'];
    $gestion_et_administration=$_POST['gestion_et_administration'];
    $salaires2=$_POST['salaires2'];
    $depenses_activites_autres=$_POST['depenses_activites_autres'];
    $investissement_et_equipement=$_POST['investissement_et_equipement'];
    $dakhil=$_POST['dakhil'];
    $sarf=$_POST['sarf'];
    $dakhil1=$_POST['dakhil1'];
    $sarf1=$_POST['sarf1'];
    
    $sql = "UPDATE `registre` SET `date`='$date',`statement`='$statement',`numeros_acces`='$numeros_acces',`adhesions`='$adhesions',`abonnements`='$abonnements',`vente_eau`='$vente_eau',`autres_revenus`='autres_revenus',`montant_merchandises`='montant_merchandises',`achat_eau`='$achat_eau',`enrgie`='enrgie',`autres_frais_exploitation`='$autres_frais_exploitation',`maintenance_et_reparations`='$maintenance_et_reparations',`salaires`='$salaires',`gestion_et_administration`='$gestion_et_administration',`salaires2`='$salaires2',`depenses_activites_autres`='$depenses_activites_autres',`investissement_et_equipement`='$investissement_et_equipement',`dakhil`='$dakhil',`sarf`='$sarf',`dakhil1`='$dakhil1',`sarf1`='$sarf1' WHERE `registre`.`idRegistre`=$idRegistre";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: registre.php?moisValue=$moisValue&annee=$annee");
    } else {
        header("Location: registre.php?moisValue=$moisValue&annee=$annee");
    }
    
    
}
?>