<?php


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


?>