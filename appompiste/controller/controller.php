<?php


include "../db/db.php";

$idPompiste=$_SESSION['idPompiste'];
$sql = "SELECT * from pompiste where idPompiste='$idPompiste'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idGess=$row['idGess'];
}

// connexion pompiste
if (isset($_POST["login"])) {
    $error[] = [];
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM pompiste where email='$username' and mdp='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["actif"] == 1) {
            $_SESSION["idPompiste"] = $row["idPompiste"];
            header("Location: ./index.php");
            exit();
        } else {
            $error["deactivated"] =
                "لقد تم تعطيل حسابك، الرجاء الاتصال برئيس المجلس في حالي كان هذا خطأ";
        }
    } else {
        $error["erreur"] = "الرجاء التثبت من صحة المعطيات التي قمت بادخلها";
    }
}






// accepte demande benefique inscription
if (isset($_GET['accepteDemandeBenefique']) && $_GET['accepteDemandeBenefique']!="" && is_numeric($_GET['accepteDemandeBenefique']) ) {

    $idDemande=$_GET['accepteDemandeBenefique'];

    $_SESSION['idDemandeBenefique'] = $idDemande;



    $sql = "SELECT * FROM demandes_benefique where idDemandeBenefique='$idDemande'";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $type = $row["type"];



        if ($type == "صالح للشرب") {
            header("Location: ../index.php?page=ajoutBenefiqueAEP");
            exit();
        } 
        if ($type == "سقوي") {
            header("Location: ../index.php?page=ajoutBenefiquePI");
            exit();
        }

        switch ($type) 
        {
            case "صالح للشرب":header("Location: ../index.php?page=ajoutBenefiqueAEP"); break;;
            case "سقوي":header("Location: ../index.php?page=ajoutBenefiquePI"); break;;
        }


    







    header("Location: ../index.php?page=demandeBenefique");
/*
    $sql="UPDATE `demandes_benefique` SET `active` = '2' WHERE `idDemandeBenefique` = '$idDemande';";


    if($conn->query($sql) === TRUE){

                
      
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تم الموافقة بنجاح";
header("Location: ../index.php?page=demandeBenefique");
      

    
   }
   else
   {
    $_SESSION['messageClass']="danger";
    $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=demandeBenefique");
   }

*/
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

// ajouter consommation Prise
if (isset($_POST["ajoutConsommationPrise"])) {
    $numPrise = mysqli_real_escape_string($conn, $_POST["numPrise"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);






    $sql="SELECT * from prise_pi where numPrise='$numPrise' and idGess='$idGess'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $row = $result->fetch_assoc();
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يوجد مأخذ بهذا الرقم في المجمع الذي تنتمي إليه";
header("Location: ../index.php?page=consommationPrise");
exit();
    }




    $currentMonth = date('Y-9');
    
    $sql = "SELECT * from consommation_prise_pi WHERE numPrise = $numPrise AND DATE_FORMAT(date, '%Y-%m') = '$currentMonth'";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["numConsomme"]>$numConsomme)
        {
            $_SESSION['messageClass']="danger";
            $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ";
    header("Location: ../index.php?page=consommationPrise");
    exit();
        }
        

        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يمكنك إضافة إستهلاك مأخذ أكثر من مرة في الشهر";
header("Location: ../index.php?page=consommationPrise");
exit();
    }



    $sql = "SELECT * from consommation_prise_pi WHERE numPrise = $numPrise order by date desc limit 1";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $numConsommePrec=$row["numConsomme"];


    }
    else
    {

        $sql="SELECT * from prise_pi where numPrise='$numPrise' and idGess='$idGess'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $prise = $result->fetch_assoc();
            $numConsommePrecedent=$prise["numConsomme"];

            $sql = "INSERT INTO `consommation_prise_pi` (`idConsommation`, `numPrise`, `idPompiste`, `idGess`, `numConsomme`, `numConsommePrecedent`, `date`) 
            VALUES (NULL, '$numPrise', '$idPompiste', '$idGess', '$numConsomme', '$numConsommePrecedent', current_timestamp());";
        
        if ($conn->query($sql) === true) { 
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تمت الاضافة بنجاح";
            header("Location: ../index.php?page=consommationPrise");
            exit();

        }
        else
        {
            $_SESSION['messageClass']="danger";
                $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
        header("Location: ../index.php?page=consommationPrise");
        exit();
        }

        }
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="لا يوجد مأخذ بهذا الرقم في المجمع الذي تنتمي إليه";
header("Location: ../index.php?page=consommationPrise");
exit();

    }


}



// modifier consommation prise
if (isset($_POST["modifierConsommationPrise"])) {
    $idConsommation = mysqli_real_escape_string($conn, $_POST["idConsommation"]);
    $numPrise = mysqli_real_escape_string($conn, $_POST["numPrise"]);
    $numConsomme = mysqli_real_escape_string($conn, $_POST["numConsomme"]);


    
    $sql = "SELECT * from consommation_prise_pi WHERE numPrise='$numPrise' and idConsommation != '$idConsommation' and idGess='$idGess' order by date desc LIMIT 1";
            
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $numConsommePrecedent=$row["numConsomme"];

       
    }
    else
    {
        $sql="SELECT * from prise_pi where numPrise='$numPrise' and idGess='$idGess'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $prise = $result->fetch_assoc();
            $numConsommePrecedent=$prise["numConsomme"];
        }
    }

    if ($row["numConsomme"]>$numConsomme || $numConsommePrecedent>$numConsomme)
    {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="الرجاء التحقق من صحة رقم الاستهلاك الذي قمت بادخاله   ".$row["numConsomme"]."";
header("Location: ../index.php?page=consommationPrise");
exit();
    }


    $sql="UPDATE `consommation_prise_pi` SET `numConsomme` = '$numConsomme' WHERE `consommation_prise_pi`.`idConsommation` = '$idConsommation';";
    
    if ($conn->query($sql) === true) {
        $_SESSION['messageClass']="success";
        $_SESSION['message']="تمت الاضافة بنجاح";
        header("Location: ../index.php?page=consommationPrise");
        exit();
    }

    else {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة aaa";
header("Location: ../index.php?page=consommationPrise");
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



























// modifier parametre compte
if (isset($_POST['parametreCompte'])) {

    
    $idPompiste = mysqli_real_escape_string($conn, $_POST['idPompiste']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
    $CIN = mysqli_real_escape_string($conn, $_POST['CIN']);
    $dateCIN = mysqli_real_escape_string($conn, $_POST['dateCIN']);
    $payement = mysqli_real_escape_string($conn, $_POST['payement']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $travail = mysqli_real_escape_string($conn, $_POST['travail']);
    $famille = mysqli_real_escape_string($conn, $_POST['famille']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
    $mdpN = mysqli_real_escape_string($conn, $_POST['mdpN1']);





    $sql = "SELECT * FROM pompiste where email='$email' and mdp='$mdp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        if($mdpN!="")
            $mdp=$mdpN;



            $cin='0'.$cin;
            $sql="UPDATE `pompiste` SET `nom` = '$nom', `dateN` = '$dateN', `CIN` = '$CIN', `dateCIN` = '$dateCIN', `payement` = '$payement', `famille` = '$famille', `travail` = '$travail', `address` = '$address', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `pompiste`.`idPompiste` = $idPompiste;";    
        
    
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




    
if(strlen($cin)<8)
$cin='0'.$cin;
    $sql="UPDATE `pompiste` SET `nom` = '$nom', `dateN` = '$dateN', `CIN` = '$CIN', `dateCIN` = '$dateCIN', `payement` = '$payement', `famille` = '$famille', `travail` = '$travail', `address` = '$address', `tel` = '$tel', `email` = '$email', `mdp` = '$mdp' WHERE `pompiste`.`idPompiste` = $id;";    

    
    
    if($conn->query($sql) === TRUE){

                
        if ($conn->query($sql) === TRUE) {
            $_SESSION['messageClass']="success";
            $_SESSION['message']="تم التحيين بنجاح";
     header("Location: ../index.php?page=parametreCompte");
        exit();
          }
    
        
       }
       else
       {
        $_SESSION['messageClass']="danger";
        $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=parametreCompte");
        exit();
       }
    
}




// ajouter payement AEP
if (isset($_POST["payementArchiveAEP"])) {

    $montantPaye = mysqli_real_escape_string($conn, $_POST["montantPaye"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);

    $sql = "SELECT * FROM benefique_aep where numCompteur='$numCompteur'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $benefiqueRow = $result->fetch_assoc();
        $idBenefique=$benefiqueRow['idBenefique'];


        $idPayement =  mt_rand(100000, 999999) ;
        $sql = "SELECT idPayement FROM archive_payement_aep";
                      $result = $conn->query($sql);
                      
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                           
                              while ($row['idPayement'] == $idPayement)
                              {
                               $idPayement =  mt_rand(100000, 999999) ;
                              }
                          }
                      }



                      $sql = "SELECT * FROM dette_aep where idBenefique='$idBenefique'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $detteRow = $result->fetch_assoc();
        $dette=$detteRow['dette'];



        $newDette=$dette-$montantPaye;

        $sql="INSERT INTO `archive_payement_aep` (`idPayement`, `idBenefique`, `idPompiste`, `idGess`, `montantPaye`, `dette`) 
        VALUES ('$idPayement', '$idBenefique', '$idPompiste', '$idGess', '$montantPaye', '$dette');";

if ($conn->query($sql) === true) { 


    $sql="UPDATE dette_aep set dette='$newDette' where idBenefique='$idBenefique'";

            if ($conn->query($sql) === true) {
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تمت الاضافة بنجاح";
                header("Location: ../index.php?page=payementAEP");
                exit();
            }
            else
            {
             $_SESSION['messageClass']="danger";
             $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
     header("Location: ../index.php?page=payementAEP");
             exit();
            }












}
else
{
 $_SESSION['messageClass']="danger";
 $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementAEP");
 exit();
}




    }
    else
    {
     $_SESSION['messageClass']="danger";
     $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementAEP");
     exit();
    }




    }
    else
    {
     $_SESSION['messageClass']="danger";
     $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementAEP");
     exit();
    }





    }





    
// ajouter payement PI
if (isset($_POST["payementArchivePI"])) {

    $montantPaye = mysqli_real_escape_string($conn, $_POST["montantPaye"]);
    $numCompteur = mysqli_real_escape_string($conn, $_POST["numCompteur"]);

    $sql = "SELECT * FROM benefique_pi where numCompteur='$numCompteur'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $benefiqueRow = $result->fetch_assoc();
        $idBenefique=$benefiqueRow['idBenefique'];


        $idPayement =  mt_rand(100000, 999999) ;
        $sql = "SELECT idPayement FROM archive_payement_pi";
                      $result = $conn->query($sql);
                      
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                           
                              while ($row['idPayement'] == $idPayement)
                              {
                               $idPayement =  mt_rand(100000, 999999) ;
                              }
                          }
                      }



                      $sql = "SELECT * FROM dette_pi where idBenefique='$idBenefique'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $detteRow = $result->fetch_assoc();
        $dette=$detteRow['dette'];



        $newDette=$dette-$montantPaye;

        $sql="INSERT INTO `archive_payement_pi` (`idPayement`, `idBenefique`, `idPompiste`, `idGess`, `montantPaye`, `dette`) 
        VALUES ('$idPayement', '$idBenefique', '$idPompiste', '$idGess', '$montantPaye', '$dette');";

if ($conn->query($sql) === true) { 


    $sql="UPDATE dette_pi set dette='$newDette' where idBenefique='$idBenefique'";

            if ($conn->query($sql) === true) {
                $_SESSION['messageClass']="success";
                $_SESSION['message']="تمت الاضافة بنجاح";
                header("Location: ../index.php?page=payementPI");
                exit();
            }
            else
            {
             $_SESSION['messageClass']="danger";
             $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
     header("Location: ../index.php?page=payementPI");
             exit();
            }












}
else
{
 $_SESSION['messageClass']="danger";
 $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementPI");
 exit();
}




    }
    else
    {
     $_SESSION['messageClass']="danger";
     $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementPI");
     exit();
    }




    }
    else
    {
     $_SESSION['messageClass']="danger";
     $_SESSION['message']="حصل خطأ ما، الرجاء المحاولة لاحقا";
header("Location: ../index.php?page=payementPI");
     exit();
    }





    }
  



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