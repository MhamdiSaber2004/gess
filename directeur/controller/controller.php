<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/db.php';
session_start();

$idPompiste=$_SESSION['idPompiste'];
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
//ajouter reunion
if(isset($_POST['numtype'])){
    

    $file1 = $_FILES['newReun']['name'];
    $imageArrBack = explode('.', $file1); 
    $rand = rand(10000, 99999);
    $newReunfile = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $newReunfile;
    $isUploadedBack = move_uploaded_file($_FILES["newReun"]["tmp_name"], $uploadPathBack);

    $date=date("Y-m-d h:i:s");

    $numtype=$_POST['numtype'];
    $type=$_POST['type'];

    if($isUploadedBack){
        
        $sql1="INSERT INTO `reunionpublique` (`date`, `doc`, `idGess`,`active`,`type`,`numtype`) VALUES ('$date','$newReunfile','$idGess','1','$type','$numtype')";
        
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../index.php?page=documentsReunions&type=$numtype");
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=documentsReunions&type=$numtype");
        }
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=documentsReunions&type=$numtype");
        exit();
    }
}
//suprision reunion
if (isset($_GET['idReunionDesacive']) && $_GET['idReunionDesacive']!="" && is_numeric($_GET['idReunionDesacive']) ) {

    $id=$_GET['idReunionDesacive'];
    $typeR=$_GET['type'];

    $sql="UPDATE reunionpublique set active=0  WHERE `reunionpublique`.`idReun` = '$id'";
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=documentsReunions&type=$typeR");
            exit();
        }
    
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=documentsReunions&type=$typeR");
        exit();
    }
    
}

//ajouter reunion interne
if(isset($_POST['newReunIName'])){
    

    $file1 = $_FILES['newReunI']['name'];
    $imageArrBack = explode('.', $file1); 
    $rand = rand(10000, 99999);
    $newReunfile = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $newReunfile;
    $isUploadedBack = move_uploaded_file($_FILES["newReunI"]["tmp_name"], $uploadPathBack);

    $date=date("Y-m-d h:i:s");

    if($isUploadedBack){
        
        $sql1="INSERT INTO `reunioninterne` (`date`, `doc`, `idGess`,`activ`) VALUES ('$date','$newReunfile','$idGess','1')";
        
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../index.php?page=reunionInterne");
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=reunionInterne");
        }
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=reunionInterne");
        exit();
    }
}
//suprision reunion interne
if (isset($_GET['idReunionIDesacive']) && $_GET['idReunionIDesacive']!="" && is_numeric($_GET['idReunionIDesacive']) ) {

    $id=$_GET['idReunionIDesacive'];

    $sql="UPDATE reunioninterne set activ=0  WHERE `reunioninterne`.`idReunI` = '$id'";
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=reunionInterne");
            exit();
        }
    
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=reunionInterne");
        exit();
    }
    
}

//ajouter Dettes des benificieur
if(isset($_POST['nom_dettes_beneficiaires'])){
    $datedebut = $_GET['dateDebut'];
    $dateFin =  $_GET['dateFin'] ;

    $nom_dettes_beneficiaires = $_POST['nom_dettes_beneficiaires'];
    $montant = $_POST['montant'];
    $numFacture = $_POST['numFacture'];
    $date = $_POST['date'];
    $note = $_POST['note'];
    $otre_non = $_POST['otre_non'];

    $sql1="INSERT INTO `dettes_beneficiaires` (`beneficiaires`, `montant`, `numFacture`, `date`, `note`,`idGess`,`activ`,`otre_non`) VALUES ('$nom_dettes_beneficiaires','$montant','$numFacture','$date ','$note','$idGess','1','$otre_non')";
        
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../pages/listedetteBenificaierPI.php?dateDebut=".$datedebut."&dateFin=".$dateFin);
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../pages/listedetteBenificaierPI.php?dateDebut=".$datedebut."&dateFin=".$dateFin);
        }

}

//ajouter Revenus Depenses
if(isset($_POST['factureRecettes'])){
    $factureRecettes=$_POST['factureRecettes'];
    $date=$_POST['date'];
    $facture=$_POST['facture'];
    $montant=$_POST['montant'];
    if($factureRecettes==1 or $factureRecettes==3){
        $nomBayan=$_POST['nomBayan'];

        $file1 = $_FILES['doc']['name'];
        $imageArrBack = explode('.', $file1); 
        $rand = rand(10000, 99999);
        $doc = $rand . '.' . $imageArrBack[1];
        $uploadPathBack = "../uploads/" . $doc;
        $isUploadedBack = move_uploaded_file($_FILES["doc"]["tmp_name"], $uploadPathBack);

        $sqtA ="INSERT INTO `revenusdepenses`( `idGess`, `nomBayan`, `facture`, `date`, `montant`, `doc`, `factureRecettes`, `activ`) VALUES ('$idGess','$nomBayan','$facture','$date','$montant','$doc','$factureRecettes','1')";
        
        if ( $conn->query($sqtA)=== TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../index.php?page=revenusDepenses&factureRecettes=$factureRecettes");
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=revenusDepenses&factureRecettes=$factureRecettes");
        }

    }else{
        $file1 = $_FILES['nomBayanf']['name'];
        $imageArrBack = explode('.', $file1); 
        $rand = rand(10000, 99999);
        $nomBayanf = $rand . '.' . $imageArrBack[1];
        $uploadPathBack = "../uploads/" . $nomBayanf;
        $isUploadedBack = move_uploaded_file($_FILES["nomBayanf"]["tmp_name"], $uploadPathBack);


        $file1 = $_FILES['doc']['name'];
        $imageArrBack = explode('.', $file1); 
        $rand = rand(10000, 99999);
        $doc = $rand . '.' . $imageArrBack[1];
        $uploadPathBack = "../uploads/" . $doc;
        $isUploadedBack = move_uploaded_file($_FILES["doc"]["tmp_name"], $uploadPathBack);

        $sqtA ="INSERT INTO `revenusdepenses`( `idGess`, `nomBayan`, `facture`, `date`, `montant`, `doc`, `factureRecettes`, `activ`) VALUES ('$idGess','$nomBayanf','$facture','$date','$montant','$doc','$factureRecettes','1')";
        
        if ($conn->query($sqtA) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../index.php?page=revenusDepenses&factureRecettes=$factureRecettes");
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=revenusDepenses&factureRecettes=$factureRecettes");
        }
    }

}

//ajouter Finance Situation

if(isset($_POST['newFinanceSituation'])){
        
    $datedebut = $_POST['dateDabut'];
    $dateFin =  $_POST['dateFin'] ;

    $file1 = $_FILES['FinanceSituation']['name'];
    $imageArrBack = explode('.', $file1); 
    $rand = rand(10000, 99999);
    $doc = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $doc;
    $isUploadedBack = move_uploaded_file($_FILES["FinanceSituation"]["tmp_name"], $uploadPathBack);

    $sqtA ="INSERT INTO `financesituation`(`idGess`, `dateDebut`, `dateFin`, `doc`, `activ`) VALUES ('$idGess','$datedebut','$dateFin','$doc','1')";
   
    if ($conn->query($sqtA) === TRUE) {
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
        header("Location: ../index.php?page=financeSituation");
    exit();
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=financeSituation");
    }
}

//suprision Finance Situationdec
if (isset($_GET['idFinanceSituationdec']) && $_GET['idFinanceSituationdec']!="" && is_numeric($_GET['idFinanceSituationdec']) ) {

    $id=$_GET['idFinanceSituationdec'];

    $sql="UPDATE financesituation set activ=0  WHERE `financesituation`.`idFinanceSituation` = '$id'";
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=financeSituation");
            exit();
        }
    
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=financeSituation");
        exit();
    }
    
}

if(isset($_POST['nom_C'])){
    $datedebut = $_GET['dateDebut'];
    $dateFin =  $_GET['dateFin'] ;

    $nom_C = $_POST['nom_C'];
    $dateFacture = $_POST['dateFacture'];
    $montant_C = $_POST['montant_C'];
    $dateMontant = $_POST['dateMontant'];
    $note_C = $_POST['note_C'];
    $otre_non_C = $_POST['otre_non_C'];

    $sql1="INSERT INTO `dettes_complexe`( `nom`, `dateFacture`, `montant`, `dateMontant`, `note`, `idGess`, `active`, `otre_non`) VALUES ('$nom_C','$dateFacture','$montant_C','$dateMontant','$note_C','$idGess','1','$otre_non_C')";
        
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
            header("Location: ../pages/listeDettesComplexePI.php?dateDebut=".$datedebut."&dateFin=".$dateFin);
        exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../pages/listeDettesComplexePI.php?dateDebut=".$datedebut."&dateFin=".$dateFin);
        }

}


// connexion gess --directeur
if(isset($_POST["login"])) {

    $username = $_POST["email"];
    $password = $_POST["password"];
  
  
    $sql = "SELECT * FROM pompiste where email='$username' and mdp='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
  
        if ($row["directeur"] == 1) {
            
            $_SESSION["idPompiste"] = $row["idPompiste"];
            header("Location: ./index.php");
            exit();
        } else {
            $_SESSION['messageClass']="success";
            $_SESSION["message"] ="ليس لديك إمكانيات الوصول لهذا الموقع";
            header("Location: ./login.php");
            exit();
        }
    } else {
        $_SESSION['login']="";
        $_SESSION['messageClass']="success";
        $_SESSION['message']="الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
        header("Location: ./login.php");
        exit();
    }
  }

// donnees pompe
if (isset($_POST['donneesPompe'])) {

    $numConsommationPompe = mysqli_real_escape_string($conn, $_POST['numConsommationPompe']);

    $sql="INSERT INTO `pompe` (`idGess`, `numConsommationPompe`) 
    VALUES ('$idGess', '$numConsommationPompe');";

    if($conn->query($sql) === TRUE){
        $_SESSION['messageClass']="warning";
        $_SESSION['message']="الرجاء تعمير المعطيات للبدء في إستعمال الحساب";
        header("Location: ../index.php?page=parametre");
        exit();   
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php");
         exit();
        }
    }


// ajouter pompiste
if (isset($_POST['ajoutPompiste'])) {

    
//$id = mysqli_real_escape_string($conn, $_POST['id']);
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
$CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
$dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
$payement = mysqli_real_escape_string($conn, $_POST['payement']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$tel = mysqli_real_escape_string($conn, $_POST['tel']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
$travail = mysqli_real_escape_string($conn, $_POST['travail']);
$famille = mysqli_real_escape_string($conn, $_POST['famille']);
//$file1 = mysqli_real_escape_string($conn, $_POST['file1']);

$date=date("Y-m-d");

$sql2 = "SELECT * FROM pompiste where CIN = '$CIN'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="رقم بطاقة التعريف مسجل بالفعل";
    header("Location: ../index.php?page=listePompiste");
}

$file1 = $_FILES['file1']['name'];
$imageArrBack = explode('.', $file1); 
$rand = rand(10000, 99999);
$nameFile1 = $rand . '.' . $imageArrBack[1];
$uploadPathBack = "../uploads/" . $nameFile1;
$isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);

if($isUploadedBack)
{

    $sql1="INSERT INTO `pompiste` (`idGess` , `nom`, `dateN`, `CIN`, `dateCIN`, `payement`, `famille`, `travail`, `address`, `tel`, `dateDebut`, `dateFin`, `email`, `mdp`, `file`, `directeur`) VALUES ('$idGess', '$nom', '$dateN', '$CIN', '$dateCIN', '$payement', '$famille', '$travail', '$address', '$tel', current_timestamp(), '1000-10-10', '$email', '$mdp', '$nameFile1','0')";

            
    if ($conn->query($sql1) === TRUE) {
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=listePompiste");
    exit();
      }
      else
      {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listePompiste");
      }

    }
    else
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listePompiste");
        exit();
    }
    
    


}


// modifier info pompiste
if (isset($_POST['modifPompiste'])) {

    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
    $CIN = $_POST['CIN'];
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $payement = mysqli_real_escape_string($conn, $_POST['payement']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $travail =  $_POST['travail'];
    $famille = mysqli_real_escape_string($conn, $_POST['famille']);
    
    
if(strlen($CIN)<8)
    $CIN='0'.$CIN;
    $sql="UPDATE `pompiste` SET `nom` = '$nom', `dateN` = '$dateN', `CIN` = '$CIN', `dateCIN` = '$dateCIN', `payement` = '$payement', `famille` = '$famille', `travail` = '$travail', `address` = '$address', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `pompiste`.`idPompiste` = $id ;";    

        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم التحيين بنجاح";
            header("Location: ../index.php?page=listePompiste");
            exit();
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listePompiste");
            exit();
       }
    
}





// desactive pompiste
if (isset($_GET['idPompisteDesacive']) && $_GET['idPompisteDesacive']!="" && is_numeric($_GET['idPompisteDesacive']) ) {

    $id=$_GET['idPompisteDesacive'];


    $sql="UPDATE pompiste set actif=0,  dateFin=current_timestamp()   WHERE `pompiste`.`idPompiste` = $id";
    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
     header("Location: ../index.php?page=listePompiste");
        exit();
          }
    
        
       }
       else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listePompiste");
        exit();
       }
    
    }




// supprimer pompiste
if (isset($_GET['idPompisteSupprimer']) && $_GET['idPompisteSupprimer']!="" && is_numeric($_GET['idPompisteSupprimer']) ) {

    $id=$_GET['idPompisteSupprimer'];


    $sql="DELETE FROM pompiste WHERE `pompiste`.`idPompistePompiste` = $id";
    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=listePompiste");
        exit();
          }
    
        
       }
       else
       {
        echo '<script>alert("حصل خطأ ما، الرجاء المحاولة لاحقا")</script>';
        header("Location: ../index.php?page=listePompiste");
        exit();
       }
    
    }





// ajout benefique publique
if (isset($_POST['ajoutBenefiquePublique'])) {
    $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);

    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);

    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $tel = mysqli_real_escape_string($conn, $_POST['tel']);

    $sql2 = "SELECT * FROM benefique_publique where CIN = '$CIN'";
    $result2 = $conn->query($sql2);
    
    if ($result2->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم بطاقة التعريف مسجل بالفعل";
        header("Location: ../index.php?page=listePompiste");
    }

    $sql="INSERT INTO `benefique_publique` (`idBenefique`,`idGess`, `CIN`, `tel`, `address`, `nom`, `date`) VALUES ('$idBenefique','$idGess', '$CIN', '$tel', '$address', '$nom', current_timestamp());";

    if($conn->query($sql) === TRUE){


        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
        header("Location: ../index.php?page=listeBenefiquePublique");
        exit();
         
    }else{
     $_SESSION['messageClass']="danger";
     $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
     header("Location: ../index.php?page=listeBenefiquePublique");
     exit();
    }


}


// supprimer prise PI
if (isset($_GET["idBenefiquePubliqueSupprimer"]) &&  $_GET["idBenefiquePubliqueSupprimer"] != "" &&is_numeric($_GET["idBenefiquePubliqueSupprimer"])) 
{
    $idBenefiquePubliqueSupprimer = $_GET["idBenefiquePubliqueSupprimer"];



        $sql = "DELETE FROM benefique_publique WHERE idBenefique = $idBenefiquePubliqueSupprimer";
        
        if ($conn->query($sql) === true) {
           
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تم الحذف بنجاح";
        header("Location: ../index.php?page=listeBenefiquePublique");
            
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=listeBenefiquePublique");
        }


    
}









// parametre
if (isset($_POST['parametre'])) {

    $prixM3 = mysqli_real_escape_string($conn, $_POST['prixM3']);
    $prixHeure = mysqli_real_escape_string($conn, $_POST['prixHeure']);
    $prixFixe = mysqli_real_escape_string($conn, $_POST['prixFixe']);
    $autrePrix = mysqli_real_escape_string($conn, $_POST['autrePrix']);



    $sql="SELECT * FROM `parametre` where `parametre`.`idGess`='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{    $sql="UPDATE `parametre` SET  `prixM3` = '$prixM3', `prixHeure` = '$prixHeure', `prixFixe` = '$prixFixe', `autrePrix` = '$autrePrix' WHERE `parametre`.`idGess` = '$idGess';";
    header("Location: ../index.php?page=aaa");

}    
    else
    $sql="INSERT INTO `parametre` (`idGess`, `prixM3`, `prixHeure`, `prixFixe`, `autrePrix`) VALUES ( '$idGess', '$prixM3', '$prixHeure', '$prixFixe', '$autrePrix');";

        
    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت التسجيل بنجاح";
header("Location: ../index.php?page=parametre");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=parametre");
   }


}




// accepter demande
if (isset($_GET['accepterDemande']) && $_GET['accepterDemande']!="" && is_numeric($_GET['accepterDemande']) ) {

    $idDemande=$_GET['accepterDemande'];
    $date=date("Y-m-d");

    $sql="UPDATE `demandes` SET `resultat` = 'مقبول' , dateAcceptation='$date' WHERE `demandes`.`idDemande` = '$idDemande';";


    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الموافقة بنجاح";
header("Location: ../index.php?page=listeDemandeEnCours");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeDemandeEnCours");
   }


}





// refuser demande
if (isset($_GET['refuserDemande']) && $_GET['refuserDemande']!="" && is_numeric($_GET['refuserDemande']) ) {

    $idDemande=$_GET['refuserDemande'];

    $sql="UPDATE `demandes` SET `resultat` = 'مرفوض' WHERE `demandes`.`idDemande` = '$idDemande';";


    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم الرفض بنجاح";
header("Location: ../index.php?page=listeDemandeEnCours");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeDemandeEnCours");
   }


}



// accepte demande benefique inscription
if (isset($_GET['accepteDemandeBenefique']) && $_GET['accepteDemandeBenefique']!="" && is_numeric($_GET['accepteDemandeBenefique']) ) {

    $idDemande=$_GET['accepteDemandeBenefique'];

    $sql="UPDATE `demandes_benefique` SET `active` = '1' WHERE `idDemandeBenefique` = '$idDemande';";


    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم الموافقة بنجاح , الرجاء إنتظار حارس النظام المائي ليقوم بتسجيل المنتفع";
header("Location: ../index.php?page=demandeBenefique");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=demandeBenefique");
   }


}





// refuser demande benefique inscription
if (isset($_GET['refuseDemandeBenefique']) && $_GET['refuseDemandeBenefique']!="" && is_numeric($_GET['refuseDemandeBenefique']) ) {

    $idDemande=$_GET['refuseDemandeBenefique'];

    $sql="UPDATE `demandes_benefique` SET `active` = '-1' WHERE `idDemandeBenefique` = '$idDemande';";


    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم الرفض بنجاح";
header("Location: ../index.php?page=demandeBenefique");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=demandeBenefique");
   }


}




// from pompiste

// ajout prise PI
if (isset($_POST['ajoutPrisePi'])) {

    
    $idPrise = mysqli_real_escape_string($conn, $_POST['idPrise']);
    $numPrise = mysqli_real_escape_string($conn, $_POST['numPrise']);
    $fluxPrise = mysqli_real_escape_string($conn, $_POST['fluxPrise']);
    $numBranche = mysqli_real_escape_string($conn, $_POST['numBranche']);
    $numConsomme = mysqli_real_escape_string($conn, $_POST['numConsomme']);


    $sql="SELECT * FROM `prise_pi` where `numPrise`='$numPrise' and `idGess`='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{    
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="هناك مأخذ مسجل بهذا الرقم ، الرجاء إختيار رقم أخر";
    header("Location: ../index.php?page=listePrisePi");
    exit();

}  


$sql="SELECT * FROM `prise_pi` where `numBranche`='$numBranche' and `idGess`='$idGess'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{    
$_SESSION['messageClass']="danger";
$_SESSION['message']="لا يمكنك تسجيل أكثر من مأخذ في فرع واحد";
header("Location: ../index.php?page=listePrisePi");
exit();

}  



$sql="SELECT * FROM `branche` where `idGess`='$idGess' and numBranche='$numBranche'";

$result = $conn->query($sql);

if ($result->num_rows == 0) 
{    
$_SESSION['messageClass']="danger";
$_SESSION['message']="ليس هنالك فرع بهذا العدد في المجمع التابع لك";
header("Location: ../index.php?page=listePrisePi");
exit();

}  
   

    $sql="INSERT INTO `prise_pi` (`idPrise`, `idGess`, `numPrise`,`numBranche`, `fluxPrise`, `numConsomme`) 
    VALUES ('$idPrise', '$idGess', '$numPrise', '$numBranche', '$fluxPrise', '$numConsomme');";

    
    
    if($conn->query($sql) === TRUE){


    $_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=listePrisePi");
    exit();

           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listePrisePi");
         exit();
        }
 
    
    }




    // modification prise PI
if (isset($_POST['modificationPrisePI'])) {

    
    $idPrise = mysqli_real_escape_string($conn, $_POST['idPrise']);
    $numPrise = mysqli_real_escape_string($conn, $_POST['numPrise']);
    $fluxPrise = mysqli_real_escape_string($conn, $_POST['fluxPrise']);
    $numBranche = mysqli_real_escape_string($conn, $_POST['numBranche']);
    $numConsomme = mysqli_real_escape_string($conn, $_POST['numConsomme']);


    $sql="SELECT * FROM `prise_pi` where `idPrise`='$idPrise' and `idGess`='$idGess'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row['numPrise']!=$numPrise) 
{    


    $sql="SELECT * FROM `prise_pi` where `numPrise`='$numPrise' and `idGess`='$idGess'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) 
    {    
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك مأخذ مسجل بهذا الرقم ، الرجاء إختيار رقم أخر";
        header("Location: ../index.php?page=listePrisePi");
        exit();
    }



}  


    $sql="SELECT * FROM `branche` where `idGess`='$idGess' and numBranche='$numBranche'";

$result = $conn->query($sql);

if ($result->num_rows == 0) 
{    
$_SESSION['messageClass']="danger";
$_SESSION['message']="ليس هنالك فرع بهذا العدد في المجمع التابع لك";
header("Location: ../index.php?page=listePrisePi");
exit();

}  
   

    $sql="UPDATE `prise_pi` SET `numPrise` = '$numPrise', `numConsomme` = '$numConsomme', `fluxPrise` = '$fluxPrise', `numBranche` = '$numBranche' WHERE `prise_pi`.`idPrise` = '$idPrise';";

    
    
    if($conn->query($sql) === TRUE){

            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم التحيين بنجاح";
    header("Location: ../index.php?page=listePrisePi");
            exit();
             
        } else
        {

         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listePrisePi");
         exit();
        }
 
    
    }



// supprimer prise PI
if (isset($_GET["idPriseSupprimer"]) &&  $_GET["idPriseSupprimer"] != "" &&is_numeric($_GET["idPriseSupprimer"])) 
{
    $idPriseSupprimer = $_GET["idPriseSupprimer"];




        
        $sql = "SELECT numPrise, numParticipantPrise from prise_pi where idPrise='$idPriseSupprimer'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        if ($row['numParticipantPrise']>0)
        {

            $_SESSION['messageClass']="danger";
            $_SESSION['message']="لا يمكنك حذف مأخذ به منتفعين";
    header("Location: ../index.php?page=listePrisePi");
    exit();

        }


        $sql = "DELETE FROM prise_pi WHERE idPrise = $idPriseSupprimer";
        
        if ($conn->query($sql) === true) {
           
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تم الحذف بنجاح";
        header("Location: ../index.php?page=listePrisePi");
            
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=listePrisePi");
        }


    }
    
}






// ajout branche
if (isset($_POST['ajoutBranche'])) {

    
    $idBranche = mysqli_real_escape_string($conn, $_POST['idBranche']);
    $numBranche = mysqli_real_escape_string($conn, $_POST['numBranche']);



    $sql="SELECT * FROM `branche` where `numBranche`='$numBranche' and `idGess`='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{    
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="هناك فرع مسجل بهذا الرقم ، الرجاء إختيار رقم أخر";
    header("Location: ../index.php?page=listeBranche");
    exit();

}  


   

    $sql="INSERT INTO `branche` (`idBranche`, `idGess`, `numBranche`) 
    VALUES ('$idBranche', '$idGess', '$numBranche');";

    
    
    if($conn->query($sql) === TRUE){


    $_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=listeBranche");
    exit();

           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeBranche");
         exit();
        }
 
    
    }




    // modification branche
if (isset($_POST['modificationBranche'])) {

    
    $idBranche = mysqli_real_escape_string($conn, $_POST['idBranche']);
    $numBranche = mysqli_real_escape_string($conn, $_POST['numBranche']);


    $sql="SELECT * FROM `branche` where `numBranche`='$numBranche' and `idGess`='$idGess'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{    
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="هناك فرع مسجل بهذا الرقم ، الرجاء إختيار رقم أخر";
    header("Location: ../index.php?page=listeBranche");
    exit();

} 




   

    $sql="UPDATE `branche` SET `numBranche` = '$numBranche' WHERE `branche`.`idBranche` = '$idBranche';";

    
    
    if($conn->query($sql) === TRUE){

            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم التحيين بنجاح";
    header("Location: ../index.php?page=listeBranche");
            exit();
             
        } else
        {

         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeBranche");
         exit();
        }
 
    
    }



// supprimer branche
if (isset($_GET["idBrancheSupprimer"]) &&  $_GET["idBrancheSupprimer"] != "" &&is_numeric($_GET["idBrancheSupprimer"])) 
{
    $idBrancheSupprimer = $_GET["idBrancheSupprimer"];




        
        $sql = "SELECT * from prise_pi where numBranche='$numBranche'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {


        if ($row['numParticipantPrise']>0)
        {

            $_SESSION['messageClass']="danger";
            $_SESSION['message']="لا يمكنك حذف فرع به مأخذ ";
    header("Location: ../index.php?page=listeBranche");
    exit();

        }


        $sql = "DELETE FROM branche WHERE idBranche = $idBrancheSupprimer";
        
        if ($conn->query($sql) === true) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=listeBranche");
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBranche");
        }


    }
    
}




// ajout benefique AEP
if (isset($_POST['ajoutBenefique'])) {

    if(isset($_SESSION["idDemandeBenefique"]))
    {
        $idDemande =  $_SESSION['idDemandeBenefique'];
        unset($_SESSION["idDemandeBenefique"]);
    }

    
    $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $propriete = mysqli_real_escape_string($conn, $_POST['propriete']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $numPlace = mysqli_real_escape_string($conn, $_POST['numPlace']);
    $aire = mysqli_real_escape_string($conn, $_POST['aire']);
    $numDiviseur = mysqli_real_escape_string($conn, $_POST['numDiviseur']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $dette = mysqli_real_escape_string($conn, $_POST['dette']);
    $numFamille = mysqli_real_escape_string($conn, $_POST['numFamille']);
    $numBenefique = mysqli_real_escape_string($conn, $_POST['numBenefique']);
    $unionFamiliale = mysqli_real_escape_string($conn, $_POST['unionFamiliale']);

    
    $sql = "SELECT * from benefique_aep where email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك منتفع مسجل بهذا الحساب الالكتروني   ";
        header("Location: ../index.php?page=listeBenefiqueAEP");
        exit();
    }

    $sql="INSERT INTO `benefique_aep` (`idBenefique`, `idGess`, `idPompiste`, `numBenefique`, `unionFamiliale`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `numFamille`, `dateInscription`, `numPlace`, `aire`, `numDiviseur`, `email`, `mdp`, `active`) 
    VALUES ('$idBenefique', '$idGess', '$idPompiste', '$numBenefique', '$unionFamiliale', '$nom', '$dateN', '$CIN', '$dateCIN', '$address', '$propriete', '$tel', '$dette', '$numFamille', current_timestamp(), '$numPlace', '$aire', '$numDiviseur', '$email', '$mdp','1');";

    
    
    if($conn->query($sql) === TRUE){

                
        $idDette =  mt_rand(100000, 999999) ;
        $sql = "SELECT idDette FROM dette_pi";
                      $result = $conn->query($sql);
                      
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                           
                              while ($row['idDette'] == $idDette)
                              {
                               $idDette =  mt_rand(100000, 999999) ;
                              }
                          }
                      }


        $sql="INSERT INTO `dette_aep` (`idDette`, `idBenefique`, `dette`) VALUES ('$idDette', '$idBenefique', '$dette');";

        if($conn->query($sql) === TRUE){

            $sql="UPDATE `demandes_benefique` SET `active` = '2' WHERE `idDemandeBenefique` = '$idDemande';";


            if($conn->query($sql) === TRUE){
        
                $_SESSION['numCompteur']=$numCompteur;
                $_SESSION['nom']=$nom;
              
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تم الإضافة بنجاح";
        header("Location: ../index.php?page=listeBenefiqueAEP");
              
        
            
           }
           else
           {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=listeBenefiqueAEP");
           }

             
        } else
        {
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeBenefiqueAEP");
         exit();
        }



        
       }
       else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=listeBenefiqueAEP");
        exit();
       }
    
}




    // ajout benefique PI
if (isset($_POST['ajoutBenefiquePI'])) {

    if(isset($_SESSION["idDemandeBenefique"]))
    {
        $idDemande =  $_SESSION['idDemandeBenefique'];
        unset($_SESSION["idDemandeBenefique"]);
    }
    
    $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $propriete = mysqli_real_escape_string($conn, $_POST['propriete']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $numPlace = mysqli_real_escape_string($conn, $_POST['numPlace']);
    $aire = mysqli_real_escape_string($conn, $_POST['aire']);
    $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
    $donneesCompteur = mysqli_real_escape_string($conn, $_POST['donneesCompteur']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $dette = mysqli_real_escape_string($conn, $_POST['dette']);
    $numPrise = mysqli_real_escape_string($conn, $_POST['numPrise']);
    $numBranch = mysqli_real_escape_string($conn, $_POST['numBranch']);
    $numBenefique = mysqli_real_escape_string($conn, $_POST['numBenefique']);
    $nature = mysqli_real_escape_string($conn, $_POST['nature']);

    $numDiviseur = mysqli_real_escape_string($conn, $_POST['numDiviseur']);

    $sql1 = "SELECT * from benefique_pi where numCompteur='$numCompteur'";

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك منتفع مسجل برقم العداد الذي أدخلته";
        header("Location: ../index.php?page=listeBenefiquePI");
        exit();
    }

    
    $sql = "SELECT * from benefique_pi where email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك منتفع مسجل بهذا الحساب الالكتروني   ";
        header("Location: ../index.php?page=listeBenefiqueAEP");
        exit();
    }

    $sql2 = "SELECT * FROM prise_pi where idGess='$idGess' and numPrise='$numPrise'";

    $result2 = $conn->query($sql2);

    if ($result2->num_rows == 0) {
        $row = $result->fetch_assoc();
        $idPrise=$row['idPrise'];


        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم المأخذ هذا خاطئ أو لا ينتمي إلى نفس المجمع الذي أنت فيه";
        header("Location: ../index.php?page=listeBenefiquePI");
    }else{

    $sql3="INSERT INTO `benefique_pi` (`idBenefique`, `idGess`, `numBenefique`, `idPompiste`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `dateInscription`, `numPlace`,  `numDiviseur`, `aire`, `numCompteur`, `donneesCompteur`, `numPrise`, `email`, `mdp`, `active`,`numBranch`,`nature`) 
    VALUES ('$idBenefique', '$idGess', '$numBenefique', '$idPompiste', '$nom', '$dateN', '$CIN', '$dateCIN', '$address', '$propriete', '$tel', '$dette', current_timestamp(), '$numPlace', '$numDiviseur', '$aire', '$numCompteur', '$donneesCompteur', '$numPrise', '$email', '$mdp','1','$numBranch','$nature');";

        if($conn->query($sql3) === TRUE){                
        
            $_SESSION['numCompteur']=$numCompteur;
            $_SESSION['nom']=$nom;
        
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الإضافة بنجاح";
            header("Location: ../index.php?page=listeBenefiquePI");
        }else{
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBenefiquePI");
        }        
    }
  }
    
    






    
// modifier info Benefique AEP
if (isset($_POST['modifBenefiqueAEP'])) {

    
    $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $propriete = mysqli_real_escape_string($conn, $_POST['propriete']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $numPlace = mysqli_real_escape_string($conn, $_POST['numPlace']);
    $aire = mysqli_real_escape_string($conn, $_POST['aire']);
    $numDiviseur = mysqli_real_escape_string($conn, $_POST['numDiviseur']);
    $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
    $donneesCompteur = mysqli_real_escape_string($conn, $_POST['donneesCompteur']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $dette = mysqli_real_escape_string($conn, $_POST['dette']);
    $numFamille = mysqli_real_escape_string($conn, $_POST['numFamille']);
    $unionFamiliale = mysqli_real_escape_string($conn, $_POST['unionFamiliale']);
    $nature = mysqli_real_escape_string($conn, $_POST['nature']);



    $sql = "SELECT * FROM dette_aep WHERE idBenefique='$idBenefique'";
          
    $result = $conn->query($sql);
    
  
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $allDette=$row['dette'];


        $sql = "SELECT dette FROM benefique_aep WHERE idBenefique='$idBenefique'";
  
        $result = $conn->query($sql);
        
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $oldDette=$row['dette'];


                $newDette=$allDette-$oldDette+$dette;

                $sql="UPDATE `benefique_aep` SET `numFamille` = '$numFamille', `nom` = '$nom', `unionFamiliale` = '$unionFamiliale', `CIN` = '$CIN', `address` = '$address', `propriete` = '$propriete', `tel` = '$tel', `dette` = '$dette', `numPlace` = '$numPlace', `aire` = '$aire', `numDiviseur` = '$numDiviseur', `email` = '$email', `mdp` = '$mdp' , `nature`=$nature WHERE `benefique_aep`.`idBenefique` = '$idBenefique';";

                if($conn->query($sql) === TRUE){
        
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تمت التحيين بنجاح";
            header("Location: ../index.php?page=listeBenefiqueAEP");
                  exit();
               }
               else
                   {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBenefiqueAEP");
                   }



            }
            else
                   {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBenefiqueAEP");
                   }


    }
    else
                   {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBenefiqueAEP");
                   }

    
}

// accepte benefique AEP
if (isset($_GET["accepteBenefiqueAEP"]) &&  $_GET["accepteBenefiqueAEP"] != "" &&is_numeric($_GET["accepteBenefiqueAEP"])) 
{
    $idBenefique = $_GET["accepteBenefiqueAEP"];
    $sql="UPDATE `benefique_aep` SET  `active` = 1 WHERE `benefique_aep`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت القبول بنجاح";
header("Location: ../index.php?page=listeBenefiqueAEP");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiqueAEP");
       }

    }


    // refuse benefique AEP
if (isset($_GET["refuseBenefiqueAEP"]) &&  $_GET["refuseBenefiqueAEP"] != "" &&is_numeric($_GET["refuseBenefiqueAEP"])) 
{
    $idBenefique = $_GET["refuseBenefiqueAEP"];
    $sql="UPDATE `benefique_aep` SET  `active` = -1 WHERE `benefique_aep`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت تعطيل الحساب بنجاح";
header("Location: ../index.php?page=listeBenefiqueAEP");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiqueAEP");
       }

    }


// desactiver benefique AEP
if (isset($_GET["idBenefiqueAEP"]) &&  $_GET["idBenefiqueAEP"] != "" &&is_numeric($_GET["idBenefiqueAEP"])) 
{
    $idBenefique = $_GET["idBenefiqueAEP"];
    $sql="UPDATE `benefique_aep` SET  `active` = -1 WHERE `benefique_aep`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت التعطيل بنجاح";
header("Location: ../index.php?page=listeBenefiqueAEP");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiqueAEP");
       }

/*
 $sql = "SELECT * FROM benefique_aep WHERE idBenefique='$idBenefique'";
  
        $result = $conn->query($sql);
        
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dette=$row['dette'];
                $numCompteur=$row['numCompteur'];


                $sql = "SELECT * FROM dette_aep WHERE idBenefique='$idBenefique' LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if($row['dette']!=$dette)
                    {
                        
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="لا يمكنك حذف منتفع لديه ديون بذمته";
        header("Location: ../index.php?page=listeBenefiqueAEP");
            exit();

                    }

                    else if($row['dette']==0 )
                    {
                        $sql = "SELECT * FROM consommation_aep where numCompteur='$numCompteur'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $_SESSION['messageClass']="danger";
                $_SESSION['message']="لا يمكنك حذف منتفع لديه إستهلاك مسجل بإسمه";
        header("Location: ../index.php?page=listeBenefiqueAEP");
            exit();
                        }
                        
                        else

                        {

                            
                            $sql = "DELETE FROM consommation_aep WHERE `numCompteur` = $numCompteur";

                            if ($conn->query($sql) === true) {
                               
                                   
                            $sql = "DELETE FROM dette_aep WHERE `idBenefique` = $idBenefique";

                            if ($conn->query($sql) === true) {
                               
                                   
                            $sql = "DELETE FROM benefique_aep WHERE `idBenefique` = $idBenefique";

                            if ($conn->query($sql) === true) {
                               
                                    $_SESSION['messageClass']="success";
                                    $_SESSION['message']="تم الحذف بنجاح";
                            header("Location: ../index.php?page=listeBenefiqueAEP");
                                
                            } else {
                                $_SESSION['messageClass']="danger";
                                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                        header("Location: ../index.php?page=listeBenefiqueAEP");
                            }
                                
                            } else {
                                $_SESSION['messageClass']="danger";
                                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                        header("Location: ../index.php?page=listeBenefiqueAEP");
                            }
                                
                            } else {
                                $_SESSION['messageClass']="danger";
                                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                        header("Location: ../index.php?page=listeBenefiqueAEP");
                            }





                        }


                    }
                    
                    
                }
                else {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=listeBenefiqueAEP");
                }


                



            }*/


}





        
    // modifier info Benefique PI
    if (isset($_POST['modifBenefiquePI'])) {
    
        
        $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
        $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
        $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $propriete = mysqli_real_escape_string($conn, $_POST['propriete']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $numPlace = mysqli_real_escape_string($conn, $_POST['numPlace']);
        $aire = mysqli_real_escape_string($conn, $_POST['aire']);
        $numDiviseur = mysqli_real_escape_string($conn, $_POST['numDiviseur']);
        $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
        $donneesCompteur = mysqli_real_escape_string($conn, $_POST['donneesCompteur']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
        $dette = mysqli_real_escape_string($conn, $_POST['dette']);
        $numPrise = mysqli_real_escape_string($conn, $_POST['numPrise']);
    
    
    
        $sql = "SELECT * FROM prise_pi where idGess='$idGess' and numPrise='$numPrise'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows == 0) {
            $row = $result->fetch_assoc();
            $idPrise=$row['idPrise'];
    
    
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم المأخذ هذا خاطئ أو لا ينتمي إلى نفس المجمع الذي أنت فيه";
    header("Location: ../index.php?page=listeBenefiquePI");
    exit();
        }
    
    
    
    
        $sql = "SELECT * FROM dette_pi WHERE idBenefique='$idBenefique'";
              
        $result = $conn->query($sql);
        
      
        if ($result->num_rows > 0) { 
            $row = $result->fetch_assoc();
            $allDette=$row['dette'];
    
    
            $sql = "SELECT dette FROM benefique_pi WHERE idBenefique='$idBenefique'";
      
            $result = $conn->query($sql);
            
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $oldDette=$row['dette'];
    
    
                    $newDette=$allDette-$oldDette+$dette;
    
                    $sql="UPDATE `benefique_pi` SET `nom` = '$nom', `CIN` = '$CIN', `address` = '$address', `propriete` = '$propriete', `tel` = '$tel', `dette` = '$dette', `numPlace` = '$numPlace', `aire` = '$aire', `numDiviseur` = '$numDiviseur', `numCompteur` = '$numCompteur', `donneesCompteur` = '$donneesCompteur', `email` = '$email', `mdp` = '$mdp' WHERE `benefique_pi`.`idBenefique` = '$idBenefique';";
    
                    if($conn->query($sql) === TRUE){
            
                        $_SESSION['messageClass']="success";
                        $_SESSION['message']="تمت التحيين بنجاح";
                header("Location: ../index.php?page=listeBenefiquePI");
                      exit();
                   }
                   else
                       {
                        $_SESSION['messageClass']="danger";
                        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                header("Location: ../index.php?page=listeBenefiquePI");
                       }
    
    
    
                }
                else
                       {
                        $_SESSION['messageClass']="danger";
                        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                header("Location: ../index.php?page=listeBenefiquePI");
                       }
    
    
        }
        else
                       {
                        $_SESSION['messageClass']="danger";
                        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                header("Location: ../index.php?page=listeBenefiquePI");
                       }
    
        
    }
    
    // accepte benefique PI
if (isset($_GET["accepteBenefiquePI"]) &&  $_GET["accepteBenefiquePI"] != "" &&is_numeric($_GET["accepteBenefiquePI"])) 
{
    $idBenefique = $_GET["accepteBenefiquePI"];
    $sql="UPDATE `benefique_pi` SET  `active` = 1 WHERE `benefique_pi`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت القبول بنجاح";
header("Location: ../index.php?page=listeBenefiquePI");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiquePI");
       }

    }


    // refuse benefique PI
if (isset($_GET["refuseBenefiquePI"]) &&  $_GET["refuseBenefiquePI"] != "" &&is_numeric($_GET["refuseBenefiquePI"])) 
{
    $idBenefique = $_GET["refuseBenefiquePI"];
    $sql="UPDATE `benefique_pi` SET  `active` = -1 WHERE `benefique_pi`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت تعطيل الحساب بنجاح";
header("Location: ../index.php?page=listeBenefiquePI");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiquePI");
       }

    }


// desactiver benefique PI
if (isset($_GET["idBenefiquePI"]) &&  $_GET["idBenefiquePI"] != "" &&is_numeric($_GET["idBenefiquePI"])) 
{
    $idBenefique = $_GET["idBenefiquePI"];
    $sql="UPDATE `benefique_pi` SET  `active` = -1 WHERE `benefique_pi`.`idBenefique` = '$idBenefique';";

    if($conn->query($sql) === TRUE){

        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت التعطيل بنجاح";
header("Location: ../index.php?page=listeBenefiquePI");
      exit();
   }
   else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeBenefiquePI");
       }

    }

    // supprimer benefique PI
    /*
    if (isset($_GET["idBenefiquePI"]) &&  $_GET["idBenefiquePI"] != "" &&is_numeric($_GET["idBenefiquePI"])) 
    {
        $idBenefique = $_GET["idBenefiquePI"];
    
    
    
     $sql = "SELECT * FROM benefique_pi WHERE idBenefique='$idBenefique'";
      
            $result = $conn->query($sql);
            
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $dette=$row['dette'];
                    $numCompteur=$row['numCompteur'];
                    $numPrise=$row['numPrise'];
    
    
                    $sql = "SELECT * FROM dette_pi WHERE idBenefique='$idBenefique' LIMIT 1";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
    
                        if($row['dette']!=$dette)
                        {
                            
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="لا يمكنك حذف منتفع لديه ديون بذمته";
            header("Location: ../index.php?page=listeBenefiquePI");
                exit();
    
                        }
    
                        else if($row['dette']==0 || $row['dette']!=$dette)
                        {
                            $sql = "SELECT * FROM consommation_pi where numCompteur='$numCompteur'";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                $_SESSION['messageClass']="danger";
                    $_SESSION['message']="لا يمكنك حذف منتفع لديه إستهلاك مسجل بإسمه";
            header("Location: ../index.php?page=listeBenefiquePI");
                exit();
                            }
                            
                            else
    
                            {
    
                                
                                $sql = "DELETE FROM consommation_pi WHERE `numCompteur` = $numCompteur";
    
                                if ($conn->query($sql) === true) {
                                   
                                       
                                $sql = "DELETE FROM dette_pi WHERE `idBenefique` = $idBenefique";
    
                                if ($conn->query($sql) === true) {
                                   
                                       
                                $sql = "DELETE FROM benefique_pi WHERE `idBenefique` = $idBenefique";
    
                                if ($conn->query($sql) === true) {
    
                              
                                    $sql="UPDATE prise_pi set numParticipantPrise=numParticipantPrise-1 where numPrise=$numPrise";
    
    
                if($conn->query($sql) === TRUE){
    
    
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=listeBenefiquePI");
                    exit();
                     
                }
    
    
     else
            {
             $_SESSION['messageClass']="danger";
             $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
             header("Location: ../index.php?page=listeBenefiquePI");
             exit();
            }
    
    
    
    
    
    
    
    
                              
                                } else {
                                    $_SESSION['messageClass']="danger";
                                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                            header("Location: ../index.php?page=listeBenefiquePI");
                                }
                                    
                                } else {
                                    $_SESSION['messageClass']="danger";
                                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                            header("Location: ../index.php?page=listeBenefiquePI");
                                }
                                    
                                } else {
                                    $_SESSION['messageClass']="danger";
                                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                            header("Location: ../index.php?page=listeBenefiquePI");
                                }
    
    
    
    
    
                            }
    
    
                        }
                        
                        
                    }
                    else {
                        $_SESSION['messageClass']="danger";
                        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                header("Location: ../index.php?page=listeBenefiquePI");
                    }
    
    
                    
    
    
    
                }
    
    
              }
    



$sql5 = "SELECT surface_totale 
FROM
budget where idGess=$idGess";
$NotExist=true;
// Execute the query
$result5 = $conn->query($sql5);

// Check for and retrieve the result
if ($result5->num_rows > 0) {
   $NotExist=false;
} 

if(isset($_POST['submit'])) {
    if ($NotExist){
    $columns = array(
        "nombre_mitoyennete",
        "surface_totale",
        "nombre_exploitants",
        "superficie_irriguee",
        "quantite_prevue_achat_ou_pompage",
        "pourcentage_perte",
        "quantite_prevue_distribution",
        "debit_pompe",
        "heure_travail_ness",
        "consommation_energie_par_heure",
        "prix_m3_sans_garde_administrateur",
        "point_eau1",
        "point_eau",
        "reseau_construction1",
        "information_mensuelle_global",
        "reseau_construction",
        "pompage_equipement1",
        "pompage_equipement",
        "electricite1",
        "electricite",
        "compteurs1",
        "compteurs",
        "couts_maintenance_totals",
        "couts_totals_realisation",
        "nombre_membres",
        "cout_unitaire_energie",
        "informations_adhesion",
        "cout_achat_eau",
        "solde_initial_debut_annee",
        "prix_compteur",
        "montant_mensuel_net",
        "prix_moto",
        "duree_renovation_moto",
        "nombre_Travailleur",
        "salaire_et_avantages_en_nature_par_an",
        "salaire_et_avantages_du_directeur_technique_par_an",
        "salaire_gardien_per_m3_eau",
        "frais_achat_eau",
        "frais_energie",
        "salaire_et_avantages_en_nature_par_an1",
        "salaire_et_avantages_du_directeur_technique_par_an1",
        "couts_maintenance_totals1",
        "couverture_deficit_enregistre",
        "renouvellement_des_compteurs",
        "frais_de_transport_deplacement",
        "revenus_realises_sur_realisation_raccordement_specifique",
        "renouvellement_des_equipements",
        "frais_gestion_association",
        "frais_divers_taraa",
        "total_frais_exploitation_entretien",
        "cout_par_metre_cube",
        "prix_moto1",
        "frais_activites_autres",
        "total_des_depenses",
        "revenues_des_adhesions",
        "revenues_des_frais_globaux",
        "revenues_vente_eau",
        "total_revenues_exploitation_maintenance",
        "revenues_other_activities",
        "total_revenues",
        "solde_attendu_fin_annee",
        "tarif_m3_eau",
        "prix_vente_heure"
    );
    
   
    $data = array();
    
    foreach ($columns as $column) {
        if (isset($_POST[$column])) {
            $data[$column] = $_POST[$column];
        } else {
            $data[$column] = ""; 
        }
    }
    $data["idGess"] = $idGess;
    
    
    $sql = "INSERT INTO budget (" . implode(", ", array_keys($data)) . ") 
            VALUES ('" . implode("', '", $data) . "')";

    $conn->query($sql);
    
    
}
}


if(isset($_POST['submit1'])) {
    if($NotExist){
    $columns = array(
        "liaison_prive",
        "surface_totale",
        "nombre_points_deau_publics",
        "connexion_dediee",
        "bi_realisation",
        "points_deau_publics",
        "prix_litre_javal",
        "couverture_deficit_maintenance",
        "quantite_prevue_achat_ou_pompage",
        "pourcentage_perte",
        "prix_m3_sans_garde_administrateur",
        "information_mensuelle_global",
        "nombre_bi_prevus",
        "quantite_prevue_distribution",
        "remuneration_gardien_gestionnaire",
        "depenses_analyse_eau",
        "debit_pompe",
        "heure_travail_ness",
        "consommation_energie_par_heure",
        "point_eau1",
        "point_eau",
        "reseau_construction1",
        "reseau_construction",
        "pompage_equipement1",
        "pompage_equipement",
        "electricite1",
        "electricite",
        "compteurs1",
        "compteurs",
        "couts_maintenance_totals",
        "couts_totals_realisation",
        "nombre_membres",
        "cout_unitaire_energie",
        "informations_adhesion",
        "cout_achat_eau",
        "solde_initial_debut_annee",
        "prix_compteur",
        "montant_mensuel_net",
        "prix_moto",
        "duree_renovation_moto",
        "nombre_Travailleur",
        "salaire_et_avantages_en_nature_par_an",
        "salaire_et_avantages_du_directeur_technique_par_an",
        "salaire_gardien_per_m3_eau",
        "frais_achat_eau",
        "frais_energie",
        "salaire_et_avantages_en_nature_par_an1",
        "salaire_et_avantages_du_directeur_technique_par_an1",
        "couts_maintenance_totals1",
        "couverture_deficit_enregistre",
        "renouvellement_des_compteurs",
        "frais_de_transport_deplacement",
        "renouvellement_des_equipements",
        "frais_gestion_association",
        "frais_divers_taraa",
        "total_frais_exploitation_entretien",
        "cout_par_metre_cube",
        "prix_moto1",
        "frais_activites_autres",
        "total_des_depenses",
        "revenues_des_adhesions",
        "revenues_des_frais_globaux",
        "revenues_vente_eau",
        "total_revenues_exploitation_maintenance",
        "revenues_other_activities",
        "total_revenues",
        "depenses_jafal",
        "cout_realisation_connexion_speciale",
        "huiles_et_filtres",
        "solde_attendu_fin_annee",
        "tarif_m3_eau",
        "prix_vente_heure"
    );
    
   
    $data = array();
    
    foreach ($columns as $column) {
        if (isset($_POST[$column])) {
            $data[$column] = $_POST[$column];
        } else {
            $data[$column] = ""; 
        }
    }
    $data["idGess"] = $idGess;
    
    
    $sql = "INSERT INTO budget (" . implode(", ", array_keys($data)) . ") 
            VALUES ('" . implode("', '", $data) . "')";

    $conn->query($sql);
    
}
    
}
*/







    // ajouter payement AEP
    if (isset($_POST["factureAEP"])) {

        $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    
    
        $sql = "SELECT * FROM benefique_aep WHERE benefique_aep.numCompteur = '$numCompteur'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $benefique = $result->fetch_assoc();
            $idBenefique=$benefique['idBenefique'];
    
            $sql = "SELECT * FROM consommation_aep WHERE numCompteur = '$numCompteur' order by date desc limit 1";
    
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $consommation = $result->fetch_assoc();
                $idConsommation=$consommation['idConsommation'];
    
    
    
                $sql = "SELECT * FROM consommation_aep WHERE numCompteur = '$numCompteur' order by date desc limit 1";
    
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $consommationPrecedente = $result->fetch_assoc();
    
    
    
    
    
                $sql = "SELECT * FROM dette_aep WHERE idBenefique = '$idBenefique' ";
    
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    $dette = $result->fetch_assoc();
    
    
    
    
    
    
    
                    $sql = "SELECT * FROM parametre WHERE idGess = '$idGess' ";
    
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        $parametre = $result->fetch_assoc();
    
                        $idConsommation=$consommation['idConsommation'];
                        $idConsommationPrecedente=$consommationPrecedente['idConsommation'];
                        $detteBenefique=$dette['dette'];
                        $prixM3=$parametre['prixM3'];
                        $autrePrix=$parametre['autrePrix'];
                        $prixFixe=$parametre['prixFixe'];
    
                        $idFacture =  mt_rand(100000, 999999) ;
                        $sql = "SELECT idFacture FROM facture_aep";
                                      $result = $conn->query($sql);
                                      
                                      if ($result->num_rows > 0) {
                                          // output data of each row
                                          while ($row = $result->fetch_assoc()) {
                                           
                                              while ($row['idFacture'] == $idFacture)
                                              {
                                               $idFacture =  mt_rand(100000, 999999) ;
                                              }
                                          }
                                      }
    
                        $sql="INSERT INTO `facture_aep` ( `idFacture`,  `idBenefique`, `idPompiste`, `idGess`, `idConsommation`, `idConsommationPrecedente`, `dette`, `prixM3`, `autrePrix`, `prixFixe`, `date`) 
                        VALUES ('$idFacture', '$idBenefique', '$idPompiste', '$idGess', '$idConsommation', '$idConsommationPrecedente', '$detteBenefique', '$prixM3', '$autrePrix', 'prixFixe', current_timestamp());";
    
    
    
    
    
    if ($conn->query($sql) === true) { 
    
    
    
    
                    header("Location: ../print/recu.php?idFacture=$idFacture");
                    exit();
                } $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة aaa";
               header("Location: ../index.php?page=factureAEP");
                exit();
    
    
    
    
    
                    } $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة bbb";
                   header("Location: ../index.php?page=factureAEP");
                    exit();
    
    
    
    
    
    
    
    
    
    
    
    
                } $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة ccc";
               header("Location: ../index.php?page=factureAEP");
                exit();
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            } $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة ddd";
           header("Location: ../index.php?page=factureAEP");
            exit();
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            } $_SESSION['messageClass']="danger";
            $_SESSION['message']="لا يوجد إستهلاك مسجل برقم العداد هذا";
           header("Location: ../index.php?page=factureAEP");
            exit();
    
    
    
    
        }
        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
        header("Location: ../index.php?page=factureAEP");
        exit();
        } 
    
    
    
    }
    
    





// ajouter consommation AEP
if (isset($_POST["ajoutConsommationAEP"])) {


    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);

    $currentMonth = date('Y-m');
    
    $sql = "SELECT * from consommation_aep WHERE numCompteur = $numCompteur AND DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يمكنك إضافة إستهلاك عداد أكثر من مرة في الشهر";
header("Location: ../index.php?page=consommationAEP");
exit();
    }
    


    $sql = "SELECT benefique_aep.numCompteur FROM benefique_aep WHERE benefique_aep.numCompteur = '$numCompteur' and benefique_aep.idGess='$idGess' and active=1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM `consommation_aep` where numCompteur='$numCompteur' ORDER BY date DESC LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $consommeRow = $result->fetch_assoc();
            $numConsommePrecedent = $consommeRow["numConsomme"];
        } else {
            $sql = "SELECT * FROM `benefique_aep` where numCompteur='$numCompteur'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $numConsommePrecedent = $row['donneesCompteur'];
        }


        if($numConsomme-$numConsommePrecedent> 30) {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="لقد تجاوز إستهلاك المنتفع 30 م ، الرجاء التواصل مع مدير المجمع للمناقشة حول تقير المنتفع إلى منتفع سقوي";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }

        if($numConsommePrecedent>$numConsomme)
        {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }



    // dette
    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();
        

        $sql = "INSERT INTO `consommation_aep` ( `numCompteur`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `date`, `idGess`) 
    VALUES ( '$numCompteur', '$idPompiste', '$numConsomme', '$numConsommePrecedent', current_timestamp(),'$idGess');";

if ($conn->query($sql) === true) { 




        $sql="SELECT * from benefique_aep where numCompteur='$numCompteur'";
    
        $result = $conn->query($sql);
        $benefiqueRow = $result->fetch_assoc();

        $idBenefique=$benefiqueRow['idBenefique'];


        $sql="SELECT * from dette_aep where idBenefique='$idBenefique'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $detteRow = $result->fetch_assoc();


            if ($numConsomme!=$numConsommePrecedent)
            {
                $newDette=$detteRow['dette']+(($numConsomme-$numConsommePrecedent)*$parametre['prixM3'])+$parametre['prixFixe']+$parametre['autrePrix'];
            }
            if ($numConsomme==$numConsommePrecedent)
            {
                $newDette=$detteRow['dette'];
            }
            
            $sql="UPDATE dette_aep set dette='$newDette' where idBenefique='$idBenefique'";

            if ($conn->query($sql) === true) {
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تمت الاضافة بنجاح";
                header("Location: ../index.php?page=consommationAEP");
                exit();
            }

            else {
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة aaa";
        header("Location: ../index.php?page=consommationAEP");
        exit();
            }

         
           
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة bbb";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }



       
    }
         else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة ddd";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }





   



    /*$_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الاضافة بنجاح";
    header("Location: ../index.php?page=consommationAEP");
    exit();*/
}
 else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لم يتم تحديد ثمن المياه من طرف رئيس المجمع";
header("Location: ../index.php?page=consommationAEP");
exit();
    }

   
    }
    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
    header("Location: ../index.php?page=consommationAEP");
    exit();
    } 
}







// supprimer consommation AEP
if (isset($_GET["idConsommation"]) &&  $_GET["idConsommation"] != "" &&is_numeric($_GET["idConsommation"])) 
{
    $idConsommation = $_GET["idConsommation"];


    $sql="SELECT * from consommation_aep inner join benefique_aep on consommation_aep.numCompteur=benefique_aep.numCompteur where idConsommation='$idConsommation'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idBenefique=$row['idBenefique'];
        $numCompteur=$row['numCompteur'];
        $numConsomme=$row['numConsomme'];
        $numConsommePrecedent=$row['numConsommePrecedent'];



$sql="SELECT * from dette_aep where idBenefique='$idBenefique'";
    
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $idDette=$row['idDette'];
    $oldDette=$row['dette'];




    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();
    
    
        $newDette=$oldDette-(($numConsomme-$numConsommePrecedent)*$parametre['prixM3'])-$parametre['prixFixe']-$parametre['autrePrix'];
    
           
    
        $sql="UPDATE dette_aep set dette='$newDette' where idDette='$idDette'";
    
        if ($conn->query($sql) === true) {
    
    
            $sql = "DELETE FROM consommation_aep WHERE `consommation_aep`.`idConsommation` = $idConsommation";
    
            if ($conn->query($sql) === true) {
               
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=consommationAEP");
                
            } else {
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=consommationAEP");
            }
    
    
        }
    
        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }
    
    }
    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=consommationAEP");
exit();
    }





}




        
}



}




    if (isset($_GET["database"])) {

        if ($_GET["database"]=="show")
        {
            $tablesResult = $conn->query("SHOW TABLES");
        if ($tablesResult->num_rows > 0) {
            while ($tableRow = $tablesResult->fetch_array()) {
                $tableName = $tableRow[0];
                echo "<h3>Table: $tableName\n<br></h3>";
        
                // Get column names for the current table
                $columnsResult = $conn->query("SHOW COLUMNS FROM $tableName");
                $columns = [];
                while ($columnRow = $columnsResult->fetch_assoc()) {
                    $columns[] = $columnRow['Field'];
                }
        
                // Fetch all data from the current table
                $dataResult = $conn->query("SELECT " . implode(", ", $columns) . " FROM $tableName");
                while ($dataRow = $dataResult->fetch_assoc()) {
                    print_r($dataRow);
                    echo "\n<br>\n<br>";
                }
        
                echo "\n<br>"."\n<br>"; // For better separation between tables
            }
        } else {
            echo "No tables found in the database.";
        }
        }
        if ($_GET["database"]=="delete")
        {
            $conn->query("SET FOREIGN_KEY_CHECKS = 0");
            $result = $conn->query("SHOW TABLES");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $tableName = $row[0];
        $conn->query("DROP TABLE $tableName"); // Drop each table
    }
    echo "All tables deleted successfully.";
} else {
    echo "No tables found in the database.";
}
        }
}




// modifier consommation AEP
if (isset($_POST["modifierConsommationAEP"])) {


    $idConsommation = mysqli_real_escape_string($conn, $_POST["idConsommation"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);

    
    $sql = "SELECT * from consommation_aep WHERE idConsommation='$idConsommation'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $numConsommePrec=$row['numConsomme'];
        $numConsommePrecedentPrec=$row['numConsommePrecedent'];

    }
    


        $sql = "SELECT * FROM `consommation_aep` where numCompteur='$numCompteur' ORDER BY date DESC LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $consommeRow = $result->fetch_assoc();
            $numConsommePrecedent = $consommeRow["numConsomme"];
        } else {
            $sql = "SELECT * FROM `benefique_aep` where numCompteur='$numCompteur'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $numConsommePrecedent = $row['donneesCompteur'];
        }


        if($numConsommePrecedentPrec>$numConsomme)
        {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }


    $sql="UPDATE `consommation_aep` SET `numConsomme` = '$numConsomme', `numConsommePrecedent` = '$numConsommePrecedentPrec' WHERE `consommation_aep`.`idConsommation` = '$idConsommation';";

if ($conn->query($sql) === true) { 


    // dette
    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();

        $sql="SELECT * from benefique_aep where numCompteur='$numCompteur'";
    
        $result = $conn->query($sql);
        $benefiqueRow = $result->fetch_assoc();

        $idBenefique=$benefiqueRow['idBenefique'];


        $sql="SELECT * from dette_aep where idBenefique='$idBenefique'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $detteRow = $result->fetch_assoc();


            if ($numConsomme!=$numConsommePrecedentPrec)
            {
                $newDette=$detteRow['dette']-(($numConsommePrec-$numConsommePrecedent)*$parametre['prixM3'])+(($numConsomme-$numConsommePrecedent)*$parametre['prixM3']);

                $sql="UPDATE dette_aep set dette='$newDette' where idBenefique='$idBenefique'";

                if ($conn->query($sql) === true) {
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تمت الاضافة بنجاح";
                    header("Location: ../index.php?page=consommationAEP");
                    exit();
                }
    
                else {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=consommationAEP");
            exit();
                }

            }

         
           
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }



       
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=consommationAEP");
exit();
    }





   



    /*$_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الاضافة بنجاح";
    header("Location: ../index.php?page=consommationAEP");
    exit();*/
}

        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationAEP");
    exit();
        }
    
 
}








// ajouter consommation PI
if (isset($_POST["ajoutConsommationPI"])) {


    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);

    $currentMonth = date('Y-m');
    
    $sql = "SELECT * from consommation_pi WHERE numCompteur = $numCompteur AND DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يمكنك إضافة إستهلاك عداد أكثر من مرة في الشهر";
header("Location: ../index.php?page=consommationPI");
exit();
    }
    


    $sql = "SELECT benefique_pi.numCompteur FROM benefique_pi WHERE benefique_pi.numCompteur = '$numCompteur' and active=1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM `consommation_pi` where numCompteur='$numCompteur' ORDER BY date DESC LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $consommeRow = $result->fetch_assoc();
            $numConsommePrecedent = $consommeRow["numConsomme"];
        } else {
            $sql = "SELECT * FROM `benefique_pi` where numCompteur='$numCompteur'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $numConsommePrecedent = $row['donneesCompteur'];
        }


        if($numConsommePrecedent>$numConsomme)
        {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }


        $sql = "INSERT INTO `consommation_pi` ( `numCompteur`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `date`, `idGess`) 
    VALUES ( '$numCompteur', '$idPompiste', '$numConsomme', '$numConsommePrecedent', current_timestamp(),'$idGess');";

if ($conn->query($sql) === true) { 


    // dette
    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();

        $sql="SELECT * from benefique_pi where numCompteur='$numCompteur'";
    
        $result = $conn->query($sql);
        $benefiqueRow = $result->fetch_assoc();

        $idBenefique=$benefiqueRow['idBenefique'];


        $sql="SELECT * from dette_pi where idBenefique='$idBenefique'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $detteRow = $result->fetch_assoc();


            if ($numConsomme!=$numConsommePrecedent)
            {
                $newDette=$detteRow['dette']+(($numConsomme-$numConsommePrecedent)*$parametre['prixM3'])+$parametre['prixFixe']+$parametre['autrePrix'];
            }
            if ($numConsomme==$numConsommePrecedent)
            {
                $newDette=$detteRow['dette'];
            }
            
            $sql="UPDATE dette_pi set dette='$newDette' where idBenefique='$idBenefique'";

            if ($conn->query($sql) === true) {
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تمت الاضافة بنجاح";
                header("Location: ../index.php?page=consommationPI");
                exit();
            }

            else {
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="aaa خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=consommationPI");
        exit();
            }

         
           
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="bbb خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }



       
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="ccc خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=consommationPI");
exit();
    }





   



    /*$_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الاضافة بنجاح";
    header("Location: ../index.php?page=consommationPI");
    exit();*/
}

        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="ddd خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }
    }
    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
    header("Location: ../index.php?page=consommationPI");
    exit();
    } 
}







// supprimer consommation PI
if (isset($_GET["idConsommation"]) &&  $_GET["idConsommation"] != "" &&is_numeric($_GET["idConsommation"])) 
{
    $idConsommation = $_GET["idConsommation"];


    $sql="SELECT * from consommation_pi inner join benefique_pi on consommation_pi.numCompteur=benefique_pi.numCompteur where idConsommation='$idConsommation'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idBenefique=$row['idBenefique'];
        $numCompteur=$row['numCompteur'];
        $numConsomme=$row['numConsomme'];
        $numConsommePrecedent=$row['numConsommePrecedent'];



$sql="SELECT * from dette_pi where idBenefique='$idBenefique'";
    
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $idDette=$row['idDette'];
    $oldDette=$row['dette'];




    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();
    
    
        $newDette=$oldDette-(($numConsomme-$numConsommePrecedent)*$parametre['prixM3'])-$parametre['prixFixe']-$parametre['autrePrix'];
     
           
    
        $sql="UPDATE dette_pi set dette='$newDette' where idDette='$idDette'";
    
        if ($conn->query($sql) === true) {
    
    
            $sql = "DELETE FROM consommation_pi WHERE `consommation_pi`.`idConsommation` = $idConsommation";
    
            if ($conn->query($sql) === true) {
               
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=consommationPI");
                
            } else {
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=consommationPI");
            }
    
    
        }
    
        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }
    
    }
    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=consommationPI");
exit();
    }





}




        
}



}







// modifier consommation PI
if (isset($_POST["modifierConsommationPI"])) {


    $idConsommation = mysqli_real_escape_string($conn, $_POST["idConsommation"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);

    
    $sql = "SELECT * from consommation_pi WHERE idConsommation='$idConsommation'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $numConsommePrec=$row['numConsomme'];
        $numConsommePrecedentPrec=$row['numConsommePrecedent'];

    }
    


    $sql = "SELECT benefique_pi.numCompteur FROM benefique_pi WHERE benefique_pi.numCompteur = '$numCompteur'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM `consommation_pi` where numCompteur='$numCompteur' ORDER BY date DESC LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $consommeRow = $result->fetch_assoc();
            $numConsommePrecedent = $consommeRow["numConsomme"];
        } else {
            $sql = "SELECT * FROM `benefique_pi` where numCompteur='$numCompteur'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $numConsommePrecedent = $row['donneesCompteur'];
        }


        if($numConsommePrecedentPrec>$numConsomme)
        {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }


    $sql="UPDATE `consommation_pi` SET `numConsomme` = '$numConsomme', `numConsommePrecedent` = '$numConsommePrecedentPrec' WHERE `consommation_pi`.`idConsommation` = '$idConsommation';";

if ($conn->query($sql) === true) { 


    // dette
    $sql="SELECT * from parametre where idGess='$idGess'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parametre = $result->fetch_assoc();

        $sql="SELECT * from benefique_pi where numCompteur='$numCompteur'";
    
        $result = $conn->query($sql);
        $benefiqueRow = $result->fetch_assoc();

        $idBenefique=$benefiqueRow['idBenefique'];


        $sql="SELECT * from dette_pi where idBenefique='$idBenefique'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $detteRow = $result->fetch_assoc();


            if ($numConsomme!=$numConsommePrecedentPrec)
            {
                $newDette=$detteRow['dette']-(($numConsommePrec-$numConsommePrecedent)*$parametre['prixM3'])+(($numConsomme-$numConsommePrecedent)*$parametre['prixM3']);

                $sql="UPDATE dette_pi set dette='$newDette' where idBenefique='$idBenefique'";

                if ($conn->query($sql) === true) {
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تمت الاضافة بنجاح";
                    header("Location: ../index.php?page=consommationPI");
                    exit();
                }
    
                else {
                    $_SESSION['messageClass']="danger";
                    $_SESSION['message']="aaa خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=consommationPI");
            exit();
                }

            }

         
           
        } else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="bbb خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }



       
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="ccc خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=consommationPI");
exit();
    }


}

        else {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="ddd خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=consommationPI");
    exit();
        }
    }
    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
    header("Location: ../index.php?page=consommationPI");
    exit();
    } 
}







// ajout vente eau
if (isset($_POST["ajoutVenteEau"])) {


    $file1 = $_FILES['file1']['name'];
    $imageArrBack = explode('.', $file1); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile1 = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $nameFile1;
    $isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);



    if ($isUploadedBack) {
        $f1 = $nameFile1;
    }
    else
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="صورة الفاتورة اجبارية";
        header("Location: ../index.php?page=venteEau");
        exit();
    }



    $numConsommePrecedent = mysqli_real_escape_string($conn, $_POST["numConsommePrecedent"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);


    if($numConsommePrecedent>=$numConsomme)
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
        header("Location: ../index.php?page=venteEau");
        exit();
    }




    $sql="INSERT INTO `vente_eau` (`idGess`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `prix`, `facture`, `date`) 
    VALUES ('$idGess', '$idPompiste', '$numConsomme', '$numConsommePrecedent', '$prix', '$f1', current_timestamp());";

if ($conn->query($sql) === true) {
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تمت الاضافة بنجاح";
    header("Location: ../index.php?page=venteEau");
    exit();
}
else
{
 $_SESSION['messageClass']="danger";
 $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=venteEau");
 exit();
}

}



// ajout vente eau
if (isset($_POST["ajoutPremierVenteEau"])) {



    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);

    $sql="INSERT INTO `vente_eau` (`idGess`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `prix`, `facture`, `date`) 
    VALUES ('$idGess', '$idPompiste', '$numConsomme', '0', '0', '0', current_timestamp());";

if ($conn->query($sql) === true) {
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم التسجيل بنجاح، يمكنك البدأ ببيع الماء";
    header("Location: ../index.php?page=venteEau");
    exit();
}
else
{
 $_SESSION['messageClass']="danger";
 $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=venteEau");
 exit();
}

}














// ajout ligne numero - page : prgPompeEauQuotiqien
if (isset($_POST['ajoutLigne1'])) {

    
    $idJ = mysqli_real_escape_string($conn, $_POST['idJ']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);


    $sql="INSERT INTO `programme_pompe_eau_quotidien_lignes_num` (`idLN`, `numLigne`, `idGess`, `idPompiste`, `rowLigne`, `idJ`, `date`) 
    VALUES (NULL, '$numLigne', '$idGess', '$idPompiste', '1', '$idJ', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}

if (isset($_POST['ajoutLigne2'])) {

    
    $idJ = mysqli_real_escape_string($conn, $_POST['idJ']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);


    $sql="INSERT INTO `programme_pompe_eau_quotidien_lignes_num` (`idLN`, `numLigne`, `idGess`, `idPompiste`, `rowLigne`, `idJ`, `date`) 
    VALUES (NULL, '$numLigne', '$idGess', '$idPompiste', '2', '$idJ', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}

if (isset($_POST['ajoutLigne3'])) {

    
    $idJ = mysqli_real_escape_string($conn, $_POST['idJ']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);


    $sql="INSERT INTO `programme_pompe_eau_quotidien_lignes_num` (`idLN`, `numLigne`, `idGess`, `idPompiste`, `rowLigne`, `idJ`, `date`) 
    VALUES (NULL, '$numLigne', '$idGess', '$idPompiste', '3', '$idJ', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}





if (isset($_POST['ajout1'])) {

    
    $heure = mysqli_real_escape_string($conn, $_POST['heure']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateDe = mysqli_real_escape_string($conn, $_POST['dateDe']);
    $dateA = mysqli_real_escape_string($conn, $_POST['dateA']);
    $quantite = mysqli_real_escape_string($conn, $_POST['quantite']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);
 


    $sql="INSERT INTO `programme_pompe_eau_quotidien_data` (`idPEQ`, `idGess`, `idPompiste`, `numLigne`, `rowNum`, `heure`, `nom`, `dateDe`, `dateA`, `quantite`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$numLigne', '1', '$heure', '$nom', '$dateDe', '$dateA', '$quantite', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}


if (isset($_POST['ajout2'])) {

    
    $heure = mysqli_real_escape_string($conn, $_POST['heure']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateDe = mysqli_real_escape_string($conn, $_POST['dateDe']);
    $dateA = mysqli_real_escape_string($conn, $_POST['dateA']);
    $quantite = mysqli_real_escape_string($conn, $_POST['quantite']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);
 


    $sql="INSERT INTO `programme_pompe_eau_quotidien_data` (`idPEQ`, `idGess`, `idPompiste`, `numLigne`, `rowNum`, `heure`, `nom`, `dateDe`, `dateA`, `quantite`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$numLigne', '2', '$heure', '$nom', '$dateDe', '$dateA', '$quantite', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}


if (isset($_POST['ajout3'])) {

    
    $heure = mysqli_real_escape_string($conn, $_POST['heure']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateDe = mysqli_real_escape_string($conn, $_POST['dateDe']);
    $dateA = mysqli_real_escape_string($conn, $_POST['dateA']);
    $quantite = mysqli_real_escape_string($conn, $_POST['quantite']);
    $numLigne = mysqli_real_escape_string($conn, $_POST['numLigne']);
 


    $sql="INSERT INTO `programme_pompe_eau_quotidien_data` (`idPEQ`, `idGess`, `idPompiste`, `numLigne`, `rowNum`, `heure`, `nom`, `dateDe`, `dateA`, `quantite`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$numLigne', '3', '$heure', '$nom', '$dateDe', '$dateA', '$quantite', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=prgPompeEauQuotiqien");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=prgPompeEauQuotiqien");
         exit();
        }
    
}
    
    






// ajouter probleme
if (isset($_POST["ajoutProbleme"])) {



    if($_FILES['file1']['name']!=""){

        $file1 = $_FILES['file1']['name'];
        $imageArrBack = explode('.', $file1); //first index is file name and second index file type
        $rand = rand(10000, 99999);
        $nameFile1 = $rand . '.' . $imageArrBack[1];
        $uploadPathBack = "../uploads/" . $nameFile1;
        $isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);
    }else{
        $nameFile1="";
    }
    if($_FILES['file2']['name'] != ""){

        $file2 = $_FILES['file2']['name'];
        $file2Arr = explode('.', $file2); //first index is file name and second index file type
        $rand = rand(10000, 99999);
        $nameFile2 = $rand . '.' . $file2Arr[1];
        $uploadPath = "../uploads/" . $nameFile2;
        $isUploaded = move_uploaded_file($_FILES["file2"]["tmp_name"], $uploadPath);
    }else{
        $nameFile2 = "";
    }

    //$idProbleme = mysqli_real_escape_string($conn, $_POST["idProbleme"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
    $typeProbleme = mysqli_real_escape_string($conn, $_POST["typeProbleme"]);
    $typeBenefique = mysqli_real_escape_string($conn, $_POST["typeBenefique"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    $elementAchete = mysqli_real_escape_string($conn, $_POST["elementAchete"]);

    $sql = "INSERT INTO `problemes` ( `idPompiste`, `idGess`, `numCompteur`, `detail`, `typeBenefique`, `prix`, `elementAchete`, `date`, `typeProbleme`, `fichierPrix`, `fichierElementAchete`) 
    VALUES ('$idPompiste', '$idGess', '$numCompteur', '$detail', '$typeBenefique', '$prix', '$elementAchete', current_timestamp(), '$typeProbleme', '$nameFile1', '$nameFile2');";

    if ($conn->query($sql) === true) {
        
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
        header("Location: ../index.php?page=listeProblemes");
    } else {
    
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=listeProblemes");
    }
   
}




// modifier info probleme
if (isset($_POST["modifProbleme"])) {
 
    $idProbleme = mysqli_real_escape_string($conn, $_POST["idProbleme"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numCompteurPrecedent = mysqli_real_escape_string($conn,$_POST["numCompteurPrecedent"]);
    $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
    $typeProbleme = mysqli_real_escape_string($conn, $_POST["typeProbleme"]);
    $typeBenefique = mysqli_real_escape_string($conn, $_POST["typeBenefique"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    //$file1 = mysqli_real_escape_string($conn, $_POST["file1"]);
    $elementAchete = mysqli_real_escape_string($conn, $_POST["elementAchete"]);
    //$file2 = mysqli_real_escape_string($conn, $_POST["file2"]);

    if($_FILES['file1']['name'] != "" ){
        $file1 = $_FILES['file1']['name'];
        $imageArrBack = explode('.', $file1); //first index is file name and second index file type
        $rand = rand(10000, 99999);
        $nameFile1 = $rand . '.' . $imageArrBack[1];
        $uploadPathBack = "../uploads/" . $nameFile1;
        $isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);
    }else{
        $sql="SELECT fichierPrix from problemes where idProbleme='$idProbleme'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $rfile1 = $result->fetch_assoc();
            $nameFile1=$rfile1['fichierPrix'] ;
        }
    }
    if($_FILES['file2']['name'] != ""){
    $file2 = $_FILES['file2']['name'];
    $file2Arr = explode('.', $file2); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile2 = $rand . '.' . $file2Arr[1];
    $uploadPath = "../uploads/" . $nameFile2;
    $isUploaded = move_uploaded_file($_FILES["file2"]["tmp_name"], $uploadPath);
    }else{
        $sql2="SELECT fichierElementAchete from problemes where idProbleme='$idProbleme'";
    
        $result2 = $conn->query($sql2);
    
        if ($result2->num_rows > 0) {
            $rfile2 = $result2->fetch_assoc();
            $nameFile2=$rfile2['fichierElementAchete'] ;
        }
    }
    
    $sql = "UPDATE `problemes` SET `detail` = '$detail', `numCompteur` = '$numCompteur', `typeBenefique` = '$typeBenefique', `prix` = '$prix', `elementAchete` = '$elementAchete', `typeProbleme` = '$typeProbleme', `fichierPrix` = '$nameFile1', `fichierElementAchete` = '$nameFile2' WHERE `problemes`.`idProbleme` = '$idProbleme';";

    if ($conn->query($sql) === true) {
       $_SESSION['messageClass']="success";
       $_SESSION['message']="تم التحيين بنجاح";
        header("Location: ../index.php?page=listeProblemes");
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=listeProblemes");
        exit();
    }
}








// ajout document
if (isset($_POST["ajoutDocument"])) {




    $file2 = $_FILES['file2']['name'];
    $file2Arr = explode('.', $file2); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile2 = $rand . '.' . $file2Arr[1];
    $uploadPath = "../uploads/" . $nameFile2;
    $isUploaded = move_uploaded_file($_FILES["file2"]["tmp_name"], $uploadPath);

    $f1 = ""; // Initialize $f1 and $f2

    if ($isUploaded) {
        $f1 = $nameFile2;
    }



    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);




    $sql="INSERT INTO `documents` (`idD`, `idGess`, `idPompiste`, `nom`, `type`, `chemain`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$nom', '$type', '$f1', current_timestamp());";


if ($conn->query($sql) === true) {
            
    $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
    header("Location: ../index.php?page=documents");
        } else {
        
        $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=documents");
        }



}



if (isset($_GET['idDocumentSupprimer']) && $_GET['idDocumentSupprimer']!="" && is_numeric($_GET['idDocumentSupprimer']) ) {

    $idD=$_GET['idDocumentSupprimer'];


    $sql="DELETE FROM documents WHERE `documents`.`idD` = '$idD'";
    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === true) {
           
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
    header("Location: ../index.php?page=documents");
        
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=documents");
    }
    
    }

}






if (isset($_POST['ajoutFix'])) {

    
    $numFixe = mysqli_real_escape_string($conn, $_POST['numFixe']);
    $personne = mysqli_real_escape_string($conn, $_POST['personne']);
    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
    $dateFix = mysqli_real_escape_string($conn, $_POST['dateFix']);
   
 


    $sql="INSERT INTO `fix` (`idF`, `idGess`, `idPompiste`, `numFix`, `personne`, `prix`, `dateFix`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$numFix', '$personne', '$prix', '$dateFix', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم الإضافة بنجاح";
  header("Location: ../index.php?page=listeFix");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeFix");
         exit();
        }
    
}
    


if (isset($_POST['modifierFix'])) {

    
    $idF = mysqli_real_escape_string($conn, $_POST['idF']);
    $numFix = mysqli_real_escape_string($conn, $_POST['numFix']);
    $personne = mysqli_real_escape_string($conn, $_POST['personne']);
    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
    $dateFix = mysqli_real_escape_string($conn, $_POST['dateFix']);
   
 


    $sql="UPDATE `fix` SET `numFix` = '$numFix', `personne` = '$personne', `prix` = '$prix', `dateFix` = '$dateFix' WHERE `fix`.`idF` = '$idF';";

    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم التحيين بنجاح";
 header("Location: ../index.php?page=listeFix");
    exit();
      }

    

   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeFix");
    exit();
   }
    
}
    


if (isset($_GET['idFixSupprimer']) && $_GET['idFixSupprimer']!="" && is_numeric($_GET['idFixSupprimer']) ) {

    $idF=$_GET['idFixSupprimer'];


    $sql="DELETE FROM `fix` WHERE `fix`.`idF` = '$idF'";
    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === true) {
           
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم الحذف بنجاح";
    header("Location: ../index.php?page=listeFix");
        
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=listeFix");
    }
    
    }

}



if (isset($_POST['ajoutInfoCompteur'])) {

    
    $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $contrat = mysqli_real_escape_string($conn, $_POST['contrat']);
    $avoirCompteur = mysqli_real_escape_string($conn, $_POST['avoirCompteur']);
    $typeCompteur = mysqli_real_escape_string($conn, $_POST['typeCompteur']);
    $travailleCompteur = mysqli_real_escape_string($conn, $_POST['travailleCompteur']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $liaison = mysqli_real_escape_string($conn, $_POST['liaison']);
    $utilisation = mysqli_real_escape_string($conn, $_POST['utilisation']);
   
 


    $sql="INSERT INTO `info_compteur` (`idIC`, `idGess`, `idPompiste`, `numCompteur`, `nom`, `contrat`, `avoirCompteur`, `typeCompteur`, `travailleCompteur`, `distance`, `liaison`, `utilisation`, `date`) 
    VALUES (NULL, '$idGess', '$idPompiste', '$numCompteur', '$nom', '$contrat', '$avoirCompteur', '$typeCompteur', '$travailleCompteur', '$distance', '$liaison', '$utilisation', current_timestamp());";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم تسجيل المعطيات بنجاح  ";
  header("Location: ../index.php?page=listeBenefique$typeGess");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeBenefique$typeGess");
         exit();
        }
    
}



if (isset($_POST['updateInfoCompteur'])) {

    
    $idIC = mysqli_real_escape_string($conn, $_POST['idIC']);
    $contrat = mysqli_real_escape_string($conn, $_POST['contrat']);
    $avoirCompteur = mysqli_real_escape_string($conn, $_POST['avoirCompteur']);
    $typeCompteur = mysqli_real_escape_string($conn, $_POST['typeCompteur']);
    $travailleCompteur = mysqli_real_escape_string($conn, $_POST['travailleCompteur']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $liaison = mysqli_real_escape_string($conn, $_POST['liaison']);
    $utilisation = mysqli_real_escape_string($conn, $_POST['utilisation']);
   
 


    $sql="UPDATE `info_compteur` SET `contrat` = '$contrat', `avoirCompteur` = '$avoirCompteur', `typeCompteur` = '$typeCompteur', `travailleCompteur` = '$travailleCompteur', `distance` = '$distance', `liaison` = '$liaison', `utilisation` = '$utilisation' WHERE `info_compteur`.`idIC` = '$idIC';";
  if($conn->query($sql) === TRUE){
  
  
    $_SESSION['messageClass']="success";
    $_SESSION['message']="تم تحيين المعطيات بنجاح  ";
  header("Location: ../index.php?page=listeInfoCompteur");
   exit();
  
           
             
        }else
        {
        
         $_SESSION['messageClass']="danger";
         $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php?page=listeInfoCompteur");
         exit();
        }
    
}





if (isset($_POST['rapportFinancier'])) {

    $year = date("Y");
    $idRL=$idGess."".$year;

    $data = array("descriptionGess", "evolutionParticipants", "quantiteEauPompe", "joursProbleme", "reparation", "renouvellement", "activite", "relation", "activitesProgrammees", "acceptationDemandes4", "refuseDemandes", "demandePouvoir", "acceptationDemandes5", "autresProblemes");


    $i=1;
    foreach ($data as $x) {

        $inputArea = mysqli_real_escape_string($conn, $_POST['inputArea'.$i]);

        $sql="UPDATE `rapport_litteraire` SET `$x` = '$inputArea' WHERE `rapport_litteraire`.`idRL` = '$idRL';";

        if($conn->query($sql) === false){
  
  
            $_SESSION['messageClass']="danger";
                 $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
                 header("Location: ../index.php?page=rapportLitteraire");
                 exit();
          
                   
                     
                }
                else
                {
                    $i++;
                }

        
      }

      if($i==15)
      {
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم تحيين المعطيات بنجاح  ";
      header("Location: ../index.php?page=rapportLitteraire");
       exit();
      }

/*
    for ($x = 1; $x <= 14; $x++) {
       
        $inputArea = mysqli_real_escape_string($conn, $_POST['inputArea'.$x]);

      }*/

    




}




// ajout consommation pompe
if (isset($_POST['ajoutConsommationPompe'])) {

    $currentMonth = date('Y-m');
    
    $sql = "SELECT * from consommation_pompe WHERE idGess = $idGess AND DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يمكنك إضافة إستهلاك عداد أكثر من مرة في الشهر";
header("Location: ../index.php?page=consommationPompe");
exit();
    }

    $idConsommation =  mt_rand(100000, 999999) ;
    $sql = "SELECT idConsommation FROM consommation_pompe";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                          while ($row['idConsommation'] == $random)
                          {
                           $idConsommation = mt_rand(111111, 999999) ;
                          }
                      }
                  }

    
    $numConsommationPompe = mysqli_real_escape_string($conn, $_POST['numConsomme']);


    $sql = "SELECT * FROM consommation_pompe where idGess='$idGess'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "SELECT * FROM pompe where idGess='$idGess'";
    $result = $conn->query($sql);
    $pompe = $result->fetch_assoc();

    $numConsommationPrecedente=$pompe['numConsommationPompe'];


    }

    else
    {
        $sql = "SELECT * FROM consommation_pompe where idGess='$idGess' order by date desc limit 1";
        $result = $conn->query($sql);
        $lastConsommation = $result->fetch_assoc();

        $numConsommationPrecedente=$lastConsommation['numComsommation'];


    }

    $sql = "SELECT * FROM pompe where idGess='$idGess'";
    $result = $conn->query($sql);
    $pompe = $result->fetch_assoc();
    $idPompe=$pompe['idPompe'];

    if($numConsommationPompe<$numConsommationPrecedente)
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
header("Location: ../index.php?page=consommationPompe");
exit();
    }


    $sql="INSERT INTO `consommation_pompe` (`idConsommation`, `idPompe`, `idGess`, `idPompiste`, `numComsommation`, `numConsommationPrecedente`, date) 
    VALUES ('$idConsommation', '$idPompe', '$idGess', '$idPompiste', '$numConsommationPompe', '$numConsommationPrecedente', CURRENT_TIMESTAMP);";

    
    
    if($conn->query($sql) === TRUE){


        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=consommationPompe");
        exit();

           
             
        }else
        {

            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=consommationPompe");
            exit();
        }
 
    
    }





// modif consommation pompe
if (isset($_POST['modifConsommationPompe'])) {

    
    $idConsommation = mysqli_real_escape_string($conn, $_POST['idConsommation']);
    $numConsommationPompe = mysqli_real_escape_string($conn, $_POST['numConsomme']);


    


    $sql="UPDATE `consommation_pompe` SET `numComsommation` = '$numConsommationPompe' WHERE `consommation_pompe`.`idConsommation` = '$idConsomm';";

    
    
    if($conn->query($sql) === TRUE){


        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=consommationPompe");
        exit();

           
             
        }else
        {

            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
            header("Location: ../index.php?page=consommationPompe");
            exit();
        }
 
    
    }


// supprimer consommation pompe
if (isset($_GET["idConsommationPompe"]) &&  $_GET["idConsommationPompe"] != "" &&is_numeric($_GET["idConsommationPompe"])) 
{
    $idConsommationPompe = $_GET["idConsommationPompe"];

    $sql = "DELETE FROM consommation_pompe WHERE `idConsommation` = $idConsommationPompe";
    
            if ($conn->query($sql) === true) {
               
                    $_SESSION['messageClass']="success";
                    $_SESSION['message']="تم الحذف بنجاح";
            header("Location: ../index.php?page=consommationPompe");
                
            } else {
                $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=consommationPompe");
            }

}



