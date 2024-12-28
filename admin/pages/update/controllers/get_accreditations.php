<?php
// Connexion à la base de données
$connexion = new PDO('mysql:host=102.219.176.39;dbname=cjmxjvbk_argon', 'cjmxjvbk_argon', 'cjmxjvbk_argon');

// Récupération de l'ID de l'état depuis la requête GET
$etatId = $_GET['etat_id'];

// Récupération des accréditations correspondant à l'ID de l'état
$requeteAccreditations = $connexion->prepare('SELECT * FROM accreditations WHERE etat_id = :etat_id');
$requeteAccreditations->bindParam(':etat_id', $etatId);
$requeteAccreditations->execute();

// Création d'un tableau d'accréditations
$accreditations = array();
while ($accreditation = $requeteAccreditations->fetch()) {
    $accreditations[] = array('id' => $accreditation['id'], 'nom_accreditation' => $accreditation['nom']);
}

// Renvoi des accréditations au format JSON
header('Content-Type: application/json');
echo json_encode($accreditations);
?>
