<?php

include '../db/db.php';

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



// connexion gess --directeur
if (isset($_POST["connexion"])) {

 
    $username = $_POST["email"];
    $password = $_POST["password"];
  
  
  
    $sql = "SELECT * FROM pompiste where email='$username' and mdp='$password'";
  
    $result = $conn->query($sql);
    
  
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
  
        if ($row["directeur"] == 1) {
            
            $_SESSION["idPompiste"] = $row["idPompiste"];
            header("Location: ../index.php");
            exit();
        } else {
  
         
          $_SESSION['messageClass']="success";
          $_SESSION["message"] ="ليس لديك إمكانيات الوصول لهذا الموقع";
          header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['login']="";
  
        $_SESSION['messageClass']="success";
        $_SESSION['message']="الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
        header("Location: ../index.php");
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

           
             
        }else
        {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
         header("Location: ../index.php");
         exit();
        }
 
    
    }


// ajouter pompiste
if (isset($_POST['ajoutPompiste'])) {

    
$id = mysqli_real_escape_string($conn, $_POST['id']);
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
$file1 = mysqli_real_escape_string($conn, $_POST['file1']);

$date=date("Y-m-d");



if(strlen($CIN)<8)
$CIN='0'.$CIN;


$file1 = $_FILES['file1']['name'];
$imageArrBack = explode('.', $file1); //first index is file name and second index file type
$rand = rand(10000, 99999);
$nameFile1 = $rand . '.' . $imageArrBack[1];
$uploadPathBack = "../uploads/" . $nameFile1;
$isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);

if($isUploadedBack)
{

    $sql1="INSERT INTO `pompiste` (`idPompiste`,`idGess` , `nom`, `dateN`, `CIN`, `dateCIN`, `payement`, `famille`, `travail`, `address`, `tel`, `dateDebut`, `dateFin`, `email`, `mdp`, `file`, `directeur`) VALUES ('$id','$idGess', '$nom', '$dateN', '$CIN', '$dateCIN', '$payement', '$famille', '$travail', '$address', '$tel', current_timestamp(), '1000-10-10', '$email', '$mdp', '$nameFile1','1')";

            
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
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $payement = mysqli_real_escape_string($conn, $_POST['payement']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $travail = mysqli_real_escape_string($conn, $_POST['travail']);
    $famille = mysqli_real_escape_string($conn, $_POST['famille']);
    
    
if(strlen($cin)<8)
$cin='0'.$cin;
    $sql="UPDATE `pompiste` SET `nom` = '$nom', `dateN` = '$dateN', `CIN` = '$CIN', `dateCIN` = '$dateCIN', `payement` = '$payement', `famille` = '$famille', `travail` = '$travail', `address` = '$address', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `pompiste`.`idPompiste` = $id;";    

    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم التحيين بنجاح";
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



    $sql="INSERT INTO `benefique_publique` (`idBenefique`,`idGess`, `CIN`, `tel`, `address`, `nom`, `date`) VALUES ('$idBenefique','$idGess', '$CIN', '$tel', '$address', '$nom', current_timestamp());";

    if($conn->query($sql) === TRUE){


        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الإضافة بنجاح";
header("Location: ../index.php?page=listeBenefiquePublique");
        exit();
         
    } else
    {
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
    $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
    $donneesCompteur = mysqli_real_escape_string($conn, $_POST['donneesCompteur']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $dette = mysqli_real_escape_string($conn, $_POST['dette']);
    $numFamille = mysqli_real_escape_string($conn, $_POST['numFamille']);
    $numBenefique = mysqli_real_escape_string($conn, $_POST['numBenefique']);
    $unionFamiliale = mysqli_real_escape_string($conn, $_POST['unionFamiliale']);

    $sql = "SELECT * from benefique_aep where numCompteur='$numCompteur'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك منتفع مسجل برقم العداد الذي أدخلته";
        header("Location: ../index.php?page=listeBenefiqueAEP");
        exit();
    }


    $sql = "SELECT * from benefique_aep where email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="هناك منتفع مسجل بهذا الحساب الالكتروني   ";
        header("Location: ../index.php?page=listeBenefiqueAEP");
        exit();
    }

    $sql="INSERT INTO `benefique_aep` (`idBenefique`, `idGess`, `idPompiste`, `numBenefique`, `unionFamiliale`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `numFamille`, `dateInscription`, `numPlace`, `aire`, `numDiviseur`, `numCompteur`, `donneesCompteur`, `email`, `mdp`, `active`) 
    VALUES ('$idBenefique', '$idGess', '$idPompiste', '$numBenefique', '$unionFamiliale', '$nom', '$dateN', '$CIN', '$dateCIN', '$address', '$propriete', '$tel', '$dette', '$numFamille', current_timestamp(), '$numPlace', '$aire', '$numDiviseur', '$numCompteur', '$donneesCompteur', '$email', '$mdp','1');";

    
    
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
    $numBenefique = mysqli_real_escape_string($conn, $_POST['numBenefique']);

    $numDiviseur = mysqli_real_escape_string($conn, $_POST['numDiviseur']);



    $sql = "SELECT * from benefique_pi where numCompteur='$numCompteur'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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

    $sql = "SELECT * FROM prise_pi where idGess='$idGess' and numPrise='$numPrise'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $row = $result->fetch_assoc();
        $idPrise=$row['idPrise'];


    $_SESSION['messageClass']="danger";
    $_SESSION['message']="رقم المأخذ هذا خاطئ أو لا ينتمي إلى نفس المجمع الذي أنت فيه";
header("Location: ../index.php?page=listeBenefiquePI");
    }

  else
  {







    $sql="INSERT INTO `benefique_pi` (`idBenefique`, `idGess`, `numBenefique`, `idPompiste`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `dateInscription`, `numPlace`,  `numDiviseur`, `aire`, `numCompteur`, `donneesCompteur`, `numPrise`, `email`, `mdp`, `active`) 
    VALUES ('$idBenefique', '$idGess', '$numBenefique', '$idPompiste', '$nom', '$dateN', '$CIN', '$dateCIN', '$address', '$propriete', '$tel', '$dette', current_timestamp(), '$numPlace', '$numDiviseur', '$aire', '$numCompteur', '$donneesCompteur', '$numPrise', '$email', '$mdp','1');";

    
    
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


        $sql="INSERT INTO `dette_pi` (`idDette`, `idBenefique`, `dette`) VALUES ('$idDette', '$idBenefique', '$dette');";

        if($conn->query($sql) === TRUE){



            $sql="UPDATE prise_pi set numParticipantPrise=numParticipantPrise+1 where numPrise=$numPrise";


            if($conn->query($sql) === TRUE){


                $sql="UPDATE `demandes_benefique` SET `active` = '2' WHERE `idDemandeBenefique` = '$idDemande';";


            if($conn->query($sql) === TRUE){
        
                        
              
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تم الإضافة بنجاح";
        header("Location: ../index.php?page=listeBenefiquePI");
              
        
            
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
         exit();
        }



        
       }
       else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=listeBenefiquePI");
        exit();
       }
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

                $sql="UPDATE `benefique_aep` SET `numFamille` = '$numFamille', `nom` = '$nom', `unionFamiliale` = '$unionFamiliale', `CIN` = '$CIN', `address` = '$address', `propriete` = '$propriete', `tel` = '$tel', `dette` = '$dette', `numPlace` = '$numPlace', `aire` = '$aire', `numDiviseur` = '$numDiviseur', `numCompteur` = '$numCompteur', `donneesCompteur` = '$donneesCompteur', `email` = '$email', `mdp` = '$mdp' WHERE `benefique_aep`.`idBenefique` = '$idBenefique';";

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




    $file1 = $_FILES['file1']['name'];
    $imageArrBack = explode('.', $file1); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile1 = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $nameFile1;
    $isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);

    $file2 = $_FILES['file2']['name'];
    $file2Arr = explode('.', $file2); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile2 = $rand . '.' . $file2Arr[1];
    $uploadPath = "../uploads/" . $nameFile2;
    $isUploaded = move_uploaded_file($_FILES["file2"]["tmp_name"], $uploadPath);

    $f1 = ""; // Initialize $f1 and $f2
    $f2 = "";

    if ($isUploadedBack) {
        $f1 = $nameFile1;
    }

    if ($isUploaded) {
        $f2 = $nameFile2;
    }




    $idProbleme = mysqli_real_escape_string($conn, $_POST["idProbleme"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
    $typeProbleme = mysqli_real_escape_string($conn, $_POST["typeProbleme"]);
    $typeBenefique = mysqli_real_escape_string($conn, $_POST["typeBenefique"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    $elementAchete = mysqli_real_escape_string($conn, $_POST["elementAchete"]);



     $sql = "SELECT * FROM benefique_$typeGess  where idGess='$idGess' and numCompteur='$numCompteur'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "INSERT INTO `problemes` (`idProbleme`, `idPompiste`, `idGess`, `numCompteur`, `detail`, `typeBenefique`, `prix`, `elementAchete`, `date`, `typeProbleme`, `fichierPrix`, `fichierElementAchete`) 
VALUES ('$idProbleme', '$idPompiste', '$idGess', '$numCompteur', '$detail', '$typeBenefique', '$prix', '$elementAchete', current_timestamp(), '$typeProbleme', '$f1', '$f2');";

        if ($conn->query($sql) === true) {
            
    $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الإضافة بنجاح";
    header("Location: ../index.php?page=listeProblemes");
        } else {
        
        $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=listeProblemes");
        }
    } else {
  
       $_SESSION['messageClass']="danger";
            $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
    header("Location: ../index.php?page=listeProblemes");
    }
}




// modifier info probleme
if (isset($_POST["modifProbleme"])) {



    
    $file1 = $_FILES['file1']['name'];
    $imageArrBack = explode('.', $file1); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile1 = $rand . '.' . $imageArrBack[1];
    $uploadPathBack = "../uploads/" . $nameFile1;
    $isUploadedBack = move_uploaded_file($_FILES["file1"]["tmp_name"], $uploadPathBack);

    $file2 = $_FILES['file2']['name'];
    $file2Arr = explode('.', $file2); //first index is file name and second index file type
    $rand = rand(10000, 99999);
    $nameFile2 = $rand . '.' . $file2Arr[1];
    $uploadPath = "../uploads/" . $nameFile2;
    $isUploaded = move_uploaded_file($_FILES["file2"]["tmp_name"], $uploadPath);

    $f1 = ""; // Initialize $f1 and $f2
    $f2 = "";

    if ($isUploadedBack) {
        $f1 = $nameFile1;
    }

    if ($isUploaded) {
        $f2 = $nameFile2;
    }




    $idProbleme = mysqli_real_escape_string($conn, $_POST["idProbleme"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);
    $numCompteurPrecedent = mysqli_real_escape_string($conn,$_POST["numCompteurPrecedent"]);
    $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
    $typeProbleme = mysqli_real_escape_string($conn, $_POST["typeProbleme"]);
    $typeBenefique = mysqli_real_escape_string($conn, $_POST["typeBenefique"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    $file1 = mysqli_real_escape_string($conn, $_POST["file1"]);
    $elementAchete = mysqli_real_escape_string($conn, $_POST["elementAchete"]);
    $file2 = mysqli_real_escape_string($conn, $_POST["file2"]);

    $idPompiste = $_SESSION["idPompiste"];

    $sql = "SELECT * FROM benefique_$typeGess  where idGess='$idGess' and numCompteur='$numCompteur' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE `problemes` SET `detail` = '$detail', `numCompteur` = '$numCompteur', `typeBenefique` = '$typeBenefique', `prix` = '$prix', `elementAchete` = '$elementAchete', `typeProbleme` = '$typeProbleme', `fichierPrix` = '$f1', `fichierElementAchete` = '$f2' WHERE `problemes`.`idProbleme` = '$idProbleme';";

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
    } else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="رقم العداد هذا لا ينتمي إلى نفس المجمع الذي أنت فيه";
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



