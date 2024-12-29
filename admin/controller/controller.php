<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../db/db.php";

session_start();

if (isset($_POST["updateData"])) {

    $email = $_POST['email'];
     $pwd = $_POST['pwd'];
     $pwdConfirm = $_POST['pwdConfirm'];
     $nom = $_POST['nom'];

     if (empty($pwd) && empty($pwdConfirm) ){

        $updateQuery = "UPDATE admin 
        SET  nom = ?, email = ?
        WHERE idAdmin = ?";

            $stmt = $conn->prepare($updateQuery);

            if ($stmt === false) {
            die("Error in SQL statement: " . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("sss", $nom, $email,$_SESSION["loginAdmin"]);

            if ($stmt->execute()) {
            } else {
            echo "Error updating data: " . $stmt->error;
            }



     }
 
   if (!empty($pwd)  ) {
       if ($pwd === $pwdConfirm){
        
        $updateQuery = "UPDATE admin 
        SET mdp = ?, nom = ?, email = ?
        WHERE idAdmin = ?";

            $stmt = $conn->prepare($updateQuery);

            if ($stmt === false) {
            die("Error in SQL statement: " . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("ssss", $pwd, $nom, $email,$_SESSION['loginAdmin']);

            if ($stmt->execute()) {
            } else {
            echo "Error updating data: " . $stmt->error;
            }

       }
       else {
       

        $msg="تأكيد كلمة المرور غير متطابق";
            
            } 
        }
            
    
 
 }





?>
