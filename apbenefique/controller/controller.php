<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/db.php';

$idBenefique=$_SESSION['idBenefique'];

if($_SESSION['idBenefique'])
{
    $type=$_SESSION['type'];

$sql = "SELECT * from benefique$type where idBenefique='$idBenefique'";

    $result = $conn->query($sql);


        $row = $result->fetch_assoc();
        $idGess=$row['idGess'];
        $numCompteur=$row['numCompteur'];
}




// connexion benefique
if (isset($_POST["login"])) {
    $error[] = [];
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM benefique_aep where email='$username' and mdp='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["active"] == 1) {
            $_SESSION['type']="_aep";
            $_SESSION["idBenefique"] = $row["idBenefique"];
            $_SESSION["idGess"] = $row["idGess"];
            header("Location: ./index.php");
            exit();
        }
        else if ($row["active"] == -1) {
            $error["erreur"]="تم تعطيل حسابك، الرجاء التواصل مع رئيس الموقع";
        } else {
            $error["erreur"] ="مازال حسابك قيد المراجعة";
        }
    } else {
        
    $sql = "SELECT * FROM benefique_pi where email='$username' and mdp='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["active"] == 1) {
            $_SESSION['type']="_pi";
            $_SESSION["idBenefique"] = $row["idBenefique"];
            $_SESSION["idGess"] = $row["idGess"];
            header("Location: ./index.php");
            exit();
        }else if ($row["active"] == -1) {
                $error["erreur"]="تم تعطيل حسابك، الرجاء التواصل مع رئيس الموقع";
            } else {
                $error["erreur"] ="مازال حسابك قيد المراجعة";
            }
    } else {
        $error["erreur"] = "الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
    }
    }



}




// inscription benefique
if (isset($_POST['signUp'])) {

    $idGess = mysqli_real_escape_string($conn, $_POST['idGess']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
   



    
    $sql="INSERT INTO `demandes_benefique` (`idGess`, `nom`, `CIN`, `address`, `tel`, `type`) 
    VALUES ('$idGess', '$nom', '$CIN', '$address', '$tel', '$type');";

    
    if($conn->query($sql) === TRUE){

                

header("Location: ../stillNotAccepted.php");
        exit();
         
        
       }
       else
       {

        header("Location: ../stillNotAccepted.php");
        exit();
       }
    
    }



// upload image

if (isset($_POST['ajoutDemande'])) {



    $imageBack=$_FILES['backCIN']['name']; 
    $imageArrBack=explode('.',$imageBack); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $nameBackCIN=$rand.'.'.$imageArrBack[1];
    $uploadPathBack="../uploads/".$nameBackCIN;
    $isUploadedBack=move_uploaded_file($_FILES["backCIN"]["tmp_name"],$uploadPathBack);


   
  
  

    $image=$_FILES['frontCIN']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $NameFrontCIN=$rand.'.'.$imageArr[1];
    $uploadPath="../uploads/".$NameFrontCIN;
    $isUploaded=move_uploaded_file($_FILES["frontCIN"]["tmp_name"],$uploadPath);


   
  
  
    $idDemande = mysqli_real_escape_string($conn, $_POST['numDemande']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    
    $dateConseil = mysqli_real_escape_string($conn, $_POST['dateConseil']);
    $dateCreationDemande = mysqli_real_escape_string($conn, $_POST['dateDemande']);
    $placeCreationDemande = mysqli_real_escape_string($conn, $_POST['placeDemande']);


  if ($image!=null)
  $frontCIN=$NameFrontCIN;
else 
    $frontCIN="";
  
    if ($imageBack!=null)
    $backCIN=$nameBackCIN;
  else 
      $backCIN="";



            
        $sql="INSERT INTO `demandes` (`idDemande`, `idBenefique`, `idGess`, `typeDemande`, `CIN`, `dateConseil`, `dateCreationDemande`, `placeCreationDemande`, `frontCIN`, `backCIN`) 
  VALUES ('$idDemande', '$idBenefique', '$idGess', '$type', '$CIN', '$dateConseil', current_timestamp(), '$placeCreationDemande', '$frontCIN', '$backCIN');";
  
  
  if ($conn->query($sql) === true) {
            
    $_SESSION['messageClass']="success";
            $_SESSION['message']="تم ارسل المطلب بنجاح";
    header("Location: ../index.php?page=listeDemandes");
    exit();
        } else {
        
        $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة bbbbbbbbbbb";
    header("Location: ../index.php?page=listeDemandes");
    exit();
        }
        


  
  
  
  
}




// modifier parametre compte
if (isset($_POST['parametreCompte'])) {

    
    $idBenefique = mysqli_real_escape_string($conn, $_POST['idBenefique']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $mdpN = mysqli_real_escape_string($conn, $_POST['mdpN1']);
    
    

    $sql = "SELECT * FROM benefique$type where email='$email' and mdp='$mdp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        if($mdpN!="")
            $mdp=$mdpN;


    
            if(strlen($cin)<8)
            $cin='0'.$cin;

        $sql="UPDATE `benefique$type` SET  `nom` = '$nom', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `benefique$type`.`idBenefique` = '$idBenefique' ";
   
    
        if($conn->query($sql) === TRUE){
    
                    
          
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تمت التحيين بنجاح";
        header("Location: ../index.php?page=parametreCompte");
              
        
            
           }
           else
           {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
    header("Location: ../index.php?page=parametreCompte");
           }
    }
     else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="كلمات السر القديمة التي قمت بادخلها خاطئة";
header("Location: ../index.php?page=parametreCompte");
    }
}

if (isset($_POST["ajoutProbleme"])) {
   $detail=$_POST['detail'];

   
   $sql="INSERT INTO `problemes`(`idGess`, `numCompteur`, `detail`) VALUES ('$idGess','$numCompteur','$detail')";
    if($conn->query($sql) === TRUE){
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت التحيين بنجاح";
        header("Location: ../index.php");
    }else{
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php");
    }
}
    

















/*

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

$date=date("Y-m-d");

$sql = "UPDATE pompiste set actif=0 , dateFin='$date' where idGess=1 and actif=1";


if($conn->query($sql) === TRUE){

    $sql1="INSERT INTO `pompiste` (`id`,`idGess` , `nom`, `dateN`, `CIN`, `dateCIN`, `payement`, `famille`, `travail`, `address`, `tel`, `dateDebut`, `dateFin`, `email`, `mdp`) VALUES ('$id','1', '$nom', '$dateN', '$CIN', '$dateCIN', '$payement', '$famille', '$travail', '$address', '$tel', current_timestamp(), '1000-10-10', '$email', '$mdp')";

            
    if ($conn->query($sql1) === TRUE) {
        header("Location: ../index.php?page=listePompiste");
    exit();
      }
      else
      {
        echo '<script>alert("nonnnnn")</script>';
      }
    
   }
   else
   {
    echo '<script>alert("حصل خطأ ما، الرجاء المحاولة لاحقا")</script>';
    header("Location: ../index.php?page=dashboard");
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
    
    
    $sql="UPDATE `pompiste` SET `nom` = '$nom', `dateN` = '$dateN', `CIN` = '$CIN', `dateCIN` = '$dateCIN', `payement` = '$payement', `famille` = '$famille', `travail` = '$travail', `address` = '$address', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `pompiste`.`id` = $id;";    

    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=listePompiste");
        exit();
          }
    
        
       }
       else
       {
        echo '<script>alert("حصل خطأ ما، الرجاء المحاولة لاحقا")</script>';
        header("Location: ../index.php?page=dashboard");
        exit();
       }
    
}




// supprimer pompiste
if (isset($_GET['idPompisteSupprimer']) && $_GET['idPompisteSupprimer']!="" && is_numeric($_GET['idPompisteSupprimer']) ) {

    $id=$_GET['idPompisteSupprimer'];

    echo "AAAAAAAAAAAAAAAAAAA ".$id;

    $sql="DELETE FROM pompiste WHERE `pompiste`.`id` = $id";
    
    
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
    else {
        echo '<script type="text/javascript" >alert("حصل خطأ ما، الرجاء المحاولة لاحقا")</script>';
        header("Location: ../index.php?page=listePompiste");
        exit();
    }








// ajout benefique
if (isset($_POST['ajoutBenefique'])) {

    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
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
    $numPrise = mysqli_real_escape_string($conn, $_POST['numPrise']);
    $flux = mysqli_real_escape_string($conn, $_POST['flux']);
    $numCompteur = mysqli_real_escape_string($conn, $_POST['numCompteur']);
    $numParticipant = mysqli_real_escape_string($conn, $_POST['numParticipant']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    
    
    $sql="INSERT INTO `benefique` (`id`, `idGess`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dateInscription`, `numPlace`, `aire`, `numDiviseur`, `numPrise`, `flux`, `numCompteur`, `numParticipant`, `type`, `email`, `mdp`, `active`) 
    VALUES ('$id', '1', '$nom', '$dateN', '$CIN', '$dateCIN', '$address', '$propriete', '$tel', current_timestamp(), '$numPlace', '$aire', '$numDiviseur', '$numPrise', '$flux', '$numCompteur', '$numParticipant', '$type', '$email', '$mdp','1');";

    
    
    if($conn->query($sql) === TRUE){

                
            header("Location: ../index.php?page=listeBenefique");
        exit();
         
        
       }
       else
       {
        echo '<script>alert("حصل خطأ ما، الرجاء المحاولة لاحقا")</script>';
        header("Location: ../index.php?page=dashboard");
        exit();
       }
    
    }






*/