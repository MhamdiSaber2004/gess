<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'a_ness_com_tn');

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

// Récupération de l'ID de l'état depuis la requête GET
$etatId = $_GET['etat_id'];

// Préparation de la requête SQL avec une déclaration préparée
$query = "SELECT * FROM gess WHERE accreditation = ?";
$requeteAccreditations = $mysqli->prepare($query);
$requeteAccreditations->bind_param('s', $etatId);
$requeteAccreditations->execute();

// Récupération des résultats
$result = $requeteAccreditations->get_result();

// Création d'un tableau d'accréditations
$accreditations = array();
while ($accreditation = $result->fetch_assoc()) {
    $accreditations[] = array('idGess' => $accreditation['idGess'], 'nom_accreditation' => $accreditation['nom']);
}

// Fermeture de la requête et de la connexion
$requeteAccreditations->close();
$mysqli->close();

// Renvoi des accréditations au format JSON
header('Content-Type: application/json');
echo json_encode($accreditations);

?>
