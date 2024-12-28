<?php



if(isset($_POST['submitupdate'])){
    $type=$_POST['selectup'];
    header("Location: update/?idGess=$idGess&type=$type"); 
    exit();
  
    
  }



?>