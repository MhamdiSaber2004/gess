<?php 

//header("Location: login");

if (isset($_GET['idGess'])){
    header("Location: login/index.php?etat=inscriptionEffctuer");

}

header("Location: apgess/login");


?>