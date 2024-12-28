<?php
ob_start();

function getTabFilesName($files) {
  $tabFilesName = "['";
  $fileCount = count($files['tmp_name']);

  foreach ($files['tmp_name'] as $index => $tmpFilePath) {
      $originalFilename = str_replace(' ', '-', $files["name"][$index]);
      $newFilename = $originalFilename;
      $counter = 1;

      // Check if the file already exists, and if so, append a counter
      while (file_exists($_SERVER['DOCUMENT_ROOT'] . '/gess/aep/documents/' . $newFilename)) {
          $filenameParts = pathinfo($originalFilename);
          $newFilename = $filenameParts['filename'] . "_$counter." . $filenameParts['extension'];
          $counter++;
      }

     move_uploaded_file($tmpFilePath, $_SERVER['DOCUMENT_ROOT'] . '/gess/aep/documents/' . $newFilename);

      $tabFilesName .= $newFilename;
      if ($index < $fileCount - 1) {
          $tabFilesName .= "','";
      }
  }

  $tabFilesName .= "']";
  echo "<script>console.log('" . $tabFilesName . "')</script>";
  if ($tabFilesName=="['_1.']" || $tabFilesName=="['_1.','_1.']" || $tabFilesName=="['_1.','_1.','_1.']"  || empty($files)) {
    return null;
  }
  return $tabFilesName;
}

   

if(isset($_POST['submit01'])){
  $nom=$_POST['nom'];
  $etat_tunisie=$_POST['etat_tunisie'];
  $accreditation=$_POST['accreditation'];
  $decanat=$_POST['decanat'];
  $date_creation=$_POST['date_creation'];
  $date_debut=$_POST['date_debut']; 
  $type="منطقة ماء صالح للشرب";

  $sqlUpdate = "UPDATE gess SET
  type = :type,
  nom = :nom,
  etat_tunisie = :etat_tunisie,
  accreditation = :accreditation,
  decanat = :decanat,
  date_creation = :date_creation,
  date_debut = :date_debut WHERE idGess=:idGess" ;

$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bindParam(':type', $type);
$stmtUpdate->bindParam(':nom', $nom);
$stmtUpdate->bindParam(':etat_tunisie', $etat_tunisie);
$stmtUpdate->bindParam(':accreditation', $accreditation);
$stmtUpdate->bindParam(':decanat', $decanat);
$stmtUpdate->bindParam(':date_creation', $date_creation);
$stmtUpdate->bindParam(':date_debut', $date_debut);
$stmtUpdate->bindParam(':idGess', $idGess);

$stmtUpdate->execute();

header("Location: ../../pages/infoaep.php?id=$idGess");


  
}

if(isset($_POST['submit02'])){

  $role_utilisateur = $_POST['roleU'];
  $nom_utilisateur = $_POST['nom_utilisateur'];
  $email_utilisateur = $_POST['email_utilisateur'];
  $tel_utilisateur = $_POST['tel_utilisateur'];
  $mdp = $_POST['mdp'];



    // Record with the given idGess exists, perform update
    $sqlUpdate = "UPDATE utilisateurs
                  SET role_utilisateur = :role_utilisateur,
                      nom_utilisateur = :nom_utilisateur,
                      email_utilisateur = :email_utilisateur,
                      tel_utilisateur = :tel_utilisateur,
                      mdp = :mdp
                  WHERE idGess = :idGess";

    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':role_utilisateur', $role_utilisateur);
    $stmtUpdate->bindParam(':nom_utilisateur', $nom_utilisateur);
    $stmtUpdate->bindParam(':email_utilisateur', $email_utilisateur);
    $stmtUpdate->bindParam(':tel_utilisateur', $tel_utilisateur);
    $stmtUpdate->bindParam(':mdp', $mdp);
    $stmtUpdate->bindParam(':idGess', $idGess);

    $stmtUpdate->execute();

    header("Location: ../../pages/infoaep.php?id=$idGess");



}


if(isset($_POST['submit03'])){

  $conseil_administration = $_POST['conseil_administration1'];

  $date_prevue = $_POST['date_prevue'];
  $derniere_seance = $_POST['derniere_seance'];
  $pourcentage = $_POST['pourcentage'];
  $quorum_derniere_seance =getTabFilesName($_FILES['quorum_derniere_seance']);


  $sqlUpdate = "UPDATE pi_conseil_administration
  SET conseil_administration = :conseil_administration,
      date_prevue = :date_prevue,
      derniere_seance = :derniere_seance,
      pourcentage = :pourcentage
  WHERE idGess = :idGess";

$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bindParam(':conseil_administration', $conseil_administration);
$stmtUpdate->bindParam(':date_prevue', $date_prevue);
$stmtUpdate->bindParam(':derniere_seance', $derniere_seance);
$stmtUpdate->bindParam(':pourcentage', $pourcentage);
$stmtUpdate->bindParam(':idGess', $idGess);

$stmtUpdate->execute();

if (isset($_FILES['seance_generale']) && !empty($_FILES['seance_generale']['name'][0])){
  $seance_generale =getTabFilesName($_FILES['seance_generale']);
  $sqlUpdate = "UPDATE pi_conseil_administration
  SET seance_generale = :seance_generale
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':seance_generale', $seance_generale);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

}
if (isset($_FILES['quorum_derniere_seance']) && !empty($_FILES['quorum_derniere_seance']['name'][0]) ){
  $quorum_derniere_seance =getTabFilesName($_FILES['quorum_derniere_seance']);
  $sqlUpdate = "UPDATE pi_conseil_administration
  SET quorum_derniere_seance = :quorum_derniere_seance
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':quorum_derniere_seance', $quorum_derniere_seance);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

}

}

if(isset($_POST['submit04'])){
  $nombre_fermiers = isset($_POST['nombre_fermiers']) ? intval($_POST['nombre_fermiers']) : 0;
$nombre_contrats = isset($_POST['nombre_contrats']) ? intval($_POST['nombre_contrats']) : 0;
$f_contrat = getTabFilesName($_FILES['f_contrat']);
$presence_liste = getTabFilesName($_FILES['presence_liste']);
$mise_a_jour = getTabFilesName($_FILES['mise_a_jour']);
$nombre_membres = isset($_POST['nombre_membres']) ? intval($_POST['nombre_membres']) : 0;
$montant_adhesion = isset($_POST['montant_adhesion']) ? intval($_POST['montant_adhesion']) : 0;
$presence_registre = getTabFilesName($_FILES['presence_registre']);


  $sqlUpdate = "UPDATE pi_paysans
  SET nombre_fermiers = :nombre_fermiers,
      nombre_contrats = :nombre_contrats,
      nombre_membres = :nombre_membres,
      montant_adhesion = :montant_adhesion
  WHERE idGess = :idGess";

$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bindParam(':nombre_fermiers', $nombre_fermiers);
$stmtUpdate->bindParam(':nombre_contrats', $nombre_contrats);
$stmtUpdate->bindParam(':nombre_membres', $nombre_membres);
$stmtUpdate->bindParam(':montant_adhesion', $montant_adhesion);
$stmtUpdate->bindParam(':idGess', $idGess);

$stmtUpdate->execute();


if (isset($_FILES['f_contrat']) && !empty($_FILES['f_contrat']['name'][0])){
  $f_contrat =getTabFilesName($_FILES['f_contrat']);
  $sqlUpdate = "UPDATE pi_paysans
  SET f_contrat = :f_contrat
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':f_contrat', $f_contrat);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

}
if (isset($_FILES['presence_liste']) && !empty($_FILES['presence_liste']['name'][0])){
  $presence_liste =getTabFilesName($_FILES['presence_liste']);
  $sqlUpdate = "UPDATE pi_paysans
  SET presence_liste = :presence_liste
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':presence_liste', $presence_liste);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

}
if (isset($_FILES['mise_a_jour']) && !empty($_FILES['mise_a_jour']['name'][0])){
  $mise_a_jour =getTabFilesName($_FILES['mise_a_jour']);
  $sqlUpdate = "UPDATE pi_paysans
  SET mise_a_jour = :mise_a_jour
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':mise_a_jour', $mise_a_jour);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

}
if (isset($_FILES['presence_registre']) && !empty($_FILES['presence_registre']['name'][0])){
  $presence_registre =getTabFilesName($_FILES['presence_registre']);
  $sqlUpdate = "UPDATE pi_paysans
  SET presence_registre = :presence_registre
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':presence_registre', $presence_registre);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

 

}
header("Location: ../../pages/infoaep.php?id=$idGess");
}

if(isset($_POST['submit05'])){
  $role = $_POST['role'];
  $nom_prenom = $_POST['nom_prenom'];
  $age = $_POST['age'];
  $niveau_education = $_POST['niveau_education'] ;
  $anciennete = $_POST['anciennete'];
  $num_tel = $_POST['num_tel'];
  $cp_cin = $_FILES['cp_cin'];
  $id_controle_interne  = $_POST['idus'];

  for ($i = 0; $i < count($role); $i++) {
    $sqlUpdate = "UPDATE membre_conseil
        SET nom_prenom = :nom_prenom,
            role = :role,
            age = :age,
            niveau_education = :niveau_education,
            anciennete = :anciennete,
            num_tel = :num_tel
        WHERE idGess = :idGess AND id_controle_interne = :id_controle_interne";

    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':nom_prenom', $nom_prenom[$i]);
    $stmtUpdate->bindParam(':role', $role[$i]);
    $stmtUpdate->bindParam(':age', $age[$i]);
    $stmtUpdate->bindParam(':niveau_education', $niveau_education[$i]);
    $stmtUpdate->bindParam(':anciennete', $anciennete[$i]);
    $stmtUpdate->bindParam(':num_tel', $num_tel[$i]);
    $stmtUpdate->bindParam(':idGess', $idGess);
    $stmtUpdate->bindParam(':id_controle_interne', $id_controle_interne[$i]);

    $stmtUpdate->execute();
    if($id_controle_interne[$i] =='0'){
      $sql = "INSERT INTO membre_conseil (role, nom_prenom, age, niveau_education, anciennete, num_tel, idGess,cp_cin)
      VALUES (:role, :nom_prenom, :age, :niveau_education, :anciennete, :num_tel, :idGess,:cp_cin)";
       $ran= rand(1, 500);
  $destinationPath =    $_SERVER['DOCUMENT_ROOT'] . '/gess/aep/documents/';
      if (empty($cp_cin['name'][$i])) {
      $cp_cin2v = null;
      }else {
        $cp_cin2v =$ran. $cp_cin['name'][$i];
      }
      
      if ($age[$i] === '') {
          
          $age[$i] = 0;
      } elseif (is_numeric($age[$i])) {
          $age[$i] = (int)$age[$i];
      }
       if ($num_tel[$i] === '') {
          
          $num_tel[$i] = 0;
      } elseif (is_numeric($num_tel[$i])) {
          $num_tel[$i] = (int)$num_tel[$i];
      }
      
     
      move_uploaded_file($cp_cin['tmp_name'][$i], $destinationPath. $cp_cin2v);

     $stmt = $conn->prepare($sql);
      $stmt->bindParam(':role', $role[$i]);
      $stmt->bindParam(':nom_prenom', $nom_prenom[$i]);
      $stmt->bindParam(':age', $age[$i]);
      $stmt->bindParam(':niveau_education', $niveau_education[$i]);
      $stmt->bindParam(':anciennete', $anciennete[$i]);
      $stmt->bindParam(':num_tel', $num_tel[$i]);
      $stmt->bindParam(':idGess', $idGess);
      $stmt->bindParam(':cp_cin',  $cp_cin2v);
      
      if ($stmt->execute()) {
          
      } else {
          // Insertion failed, handle the error
          echo "Error: " . $stmt->errorInfo()[2]; // Display the SQL error message
      }

    }
   
    if (empty($cp_cin['name'][$i] && $id_controle_interne[$i] !='0')) {
      $cp_cin2v = null;
      }else {
        $ran= rand(1, 500);
        $cp_cin2v =$ran. $cp_cin['name'][$i];
        $destinationPath = '/gess/aep/documents/';
        
        move_uploaded_file($cp_cin['tmp_name'][$i],  $_SERVER['DOCUMENT_ROOT'] .$destinationPath. $cp_cin2v);
        $sqlUpdate = "UPDATE membre_conseil
      SET cp_cin = :cp_cin
      WHERE idGess = :idGess AND id_controle_interne = :id_controle_interne";
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':cp_cin', $cp_cin2v);
    
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->bindParam(':id_controle_interne', $id_controle_interne[$i]);
      $stmtUpdate->execute();
        
      }
}

header("Location: ../../pages/infoaep.php?id=$idGess");

}

if(isset($_POST['submit06'])){

  $rolesToUpdate = $_POST['role1'];
    $nomsPrenomsToUpdate = $_POST['nom_prenom1'];
    $agesToUpdate = $_POST['age1'];
    $niveauxEducationsToUpdate = $_POST['niveau_education1'];
    $anciennetesToUpdate = $_POST['anciennete1'];
    $numsTelsToUpdate = $_POST['num_tel1'];
    $idsControleInternesToUpdate = $_POST['idcon'];

    for ($i = 0; $i < count($rolesToUpdate); $i++) {
      


      if ($idsControleInternesToUpdate[$i]=='0'){
        echo "11111111";
        
        $sql1 = "INSERT INTO controle_interne (role, nom_prenom, age, niveau_education, anciennete, num_tel, idGess)
            VALUES (:role, :nom_prenom, :age, :niveau_education, :anciennete, :num_tel, :idGess)";
             if ($agesToUpdate[$i] === '') {
                
              $agesToUpdate[$i] = 0;
            } elseif (is_numeric($agesToUpdate[$i])) {
              $agesToUpdate[$i] = (int)$agesToUpdate[$i];
            }
             if ($numsTelsToUpdate[$i] === '') {
                
              $numsTelsToUpdate[$i] = 0;
            } elseif (is_numeric($numsTelsToUpdate[$i])) {
              $numsTelsToUpdate[$i] = (int)$numsTelsToUpdate[$i];
            }
            
            

            $stmt = $conn->prepare($sql1);
            $stmt->bindParam(':role', $rolesToUpdate[$i]);
            $stmt->bindParam(':nom_prenom', $nomsPrenomsToUpdate[$i]);
            $stmt->bindParam(':age', $agesToUpdate[$i]);
            $stmt->bindParam(':niveau_education', $niveauxEducationsToUpdate[$i]);
            $stmt->bindParam(':anciennete', $anciennetesToUpdate[$i]);
            $stmt->bindParam(':num_tel', $numsTelsToUpdate[$i]);
            $stmt->bindParam(':idGess', $idGess);
            
            $stmt->execute();

      }
      else {
        $sqlUpdate = "UPDATE controle_interne
          SET role = :role,
              nom_prenom = :nom_prenom,
              age = :age,
              niveau_education = :niveau_education,
              anciennete = :anciennete,
              num_tel = :num_tel
          WHERE 	id_membre_conseil = :id_controle_interne AND idGess = :idGess";

      // Prepare and execute the UPDATE query
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':role', $rolesToUpdate[$i]);
      $stmtUpdate->bindParam(':nom_prenom', $nomsPrenomsToUpdate[$i]);
      $stmtUpdate->bindParam(':age', $agesToUpdate[$i]);
      $stmtUpdate->bindParam(':niveau_education', $niveauxEducationsToUpdate[$i]);
      $stmtUpdate->bindParam(':anciennete', $anciennetesToUpdate[$i]);
      $stmtUpdate->bindParam(':num_tel', $numsTelsToUpdate[$i]);
      $stmtUpdate->bindParam(':id_controle_interne', $idsControleInternesToUpdate[$i]);
      $stmtUpdate->bindParam(':idGess', $idGess);

      $stmtUpdate->execute();
      }
     

}
header("Location: ../../pages/infoaep.php?id=$idGess");
}


if(isset($_POST['submit08'])){
  $contrat_travail2=$_FILES['contrat_travail2'];
  $securite_sociale2=$_FILES['securite_sociale2'];
     $niveau_education2 = $_POST['niveau_education2'];
  $agents_executifs2 = $_POST['agents_executifs2'];
  $nom_prenom2 = $_POST['nom_prenom2'];
  $age2 = $_POST['age2'];
  $salaire2 = $_POST['salaire2'];
   $numero_telephone2 = $_POST['numero_telephone2'];
   $idbom = $_POST['idbom'];

   for ($i = 0; $i < count($agents_executifs2);$i++)  {
    if ($idbom[$i]=='0'){
   
    
      $sql = "INSERT INTO pi_informations_agents (agents_executifs2, niveau_education2, nom_prenom2, age2,
       salaire2, contrat_travail2,securite_sociale2 , numero_telephone2, idGess)
      VALUES (:agents_executifs2, :niveau_education2, :nom_prenom2,:age2, :salaire2, :contrat_travail2,:securite_sociale2,:numero_telephone2, :idGess)";
         
        
         if ($age2[$i] === '') {
            $age2[$i] = 0;
        } elseif (is_numeric($age2[$i])) {
            $age2[$i] = (int)$age2[$i];
        }
         if ($salaire2[$i] === '') {
            $salaire2[$i] = 0;
        } elseif (is_numeric($salaire2[$i])) {
            $salaire2[$i] = (int)$salaire2[$i];
        }
        
      
  
        $ran= rand(1, 500);
        $destinationPath =    $_SERVER['DOCUMENT_ROOT'] . '/gess/aep/documents/';
        if (empty($contrat_travail2['name'][$i])) {
        $contrat_travail2v = null;
        } else {
          $contrat_travail2v =$ran. $contrat_travail2['name'][$i];
        }
        if (empty($securite_sociale2['name'][$i])) {
        $securite_sociale2v = null;
        } else {
          $securite_sociale2v = $ran.$securite_sociale2['name'][$i];
        }
     
        move_uploaded_file($contrat_travail2['tmp_name'][$i], $destinationPath. $contrat_travail2v);
        move_uploaded_file($securite_sociale2['tmp_name'][$i], $destinationPath.$securite_sociale2v);
      
  
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':agents_executifs2', $agents_executifs2[$i]);
      $stmt->bindParam(':niveau_education2', $niveau_education2[$i]);
      $stmt->bindParam(':nom_prenom2', $nom_prenom2[$i]);
      $stmt->bindParam(':age2', $age2[$i]);
      $stmt->bindParam(':salaire2', $salaire2[$i]);
      $stmt->bindParam(':contrat_travail2', $contrat_travail2v);
      $stmt->bindParam(':securite_sociale2', $securite_sociale2v);
      $stmt->bindParam(':numero_telephone2', $numero_telephone2[$i]);
      $stmt->bindParam(':idGess', $idGess);
      
      $stmt->execute();
  
  }
   }

   
   
   for ($i = 0; $i < count($agents_executifs2);$i++)  
   
   {

    
  

   

   if (true) {
    for ($i = 0; $i < count($nom_prenom2); $i++){
      $sqlUpdate = "UPDATE pi_informations_agents
          SET niveau_education2 = :niveau_education2,
              agents_executifs2 = :agents_executifs2,
              nom_prenom2 = :nom_prenom2,
              age2 = :age2,
              salaire2 = :salaire2,
              numero_telephone2 = :numero_telephone2
          WHERE id = :condition AND idGess = :idGess"; // Change 'id' to your actual identifier
  
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':niveau_education2', $niveau_education2[$i]);
      $stmtUpdate->bindParam(':agents_executifs2', $agents_executifs2[$i]);
      $stmtUpdate->bindParam(':nom_prenom2', $nom_prenom2[$i]);
      $stmtUpdate->bindParam(':age2', $age2[$i]);
      $stmtUpdate->bindParam(':salaire2', $salaire2[$i]);
      $stmtUpdate->bindParam(':numero_telephone2', $numero_telephone2[$i]);
      $stmtUpdate->bindParam(':condition', $idbom[$i]);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  
   
        // Check if the file array exists and has elements
        $ran= rand(1, 500);
        $destinationPath =    $_SERVER['DOCUMENT_ROOT'] . '/gess/aep/documents/';
        if (empty($contrat_travail2['name'][$i])) {
        $contrat_travail2v = null;
        } else {
          $contrat_travail2v =$ran. $contrat_travail2['name'][$i];
          move_uploaded_file($contrat_travail2['tmp_name'][$i], $destinationPath. $contrat_travail2v);
          $sqlUpdateFile = "UPDATE pi_informations_agents
          SET contrat_travail2 = :fileValue
          WHERE idGess = :idGess AND id = :condition";
  
          $stmtUpdateFile = $conn->prepare($sqlUpdateFile);
          $stmtUpdateFile->bindParam(':fileValue',$contrat_travail2v);
          $stmtUpdateFile->bindParam(':idGess', $idGess);
          $stmtUpdateFile->bindParam(':condition', $idbom[$i]);
  
          $stmtUpdateFile->execute();
        }
        if (empty($securite_sociale2['name'][$i])) {
        $securite_sociale2v = null;
        } else {
          $securite_sociale2v = $ran.$securite_sociale2['name'][$i];
          move_uploaded_file($securite_sociale2['tmp_name'][$i], $destinationPath.$securite_sociale2v);
          $sqlUpdateFile = "UPDATE pi_informations_agents
          SET securite_sociale2 = :fileValue
          WHERE idGess = :idGess AND id = :condition";
  
          $stmtUpdateFile = $conn->prepare($sqlUpdateFile);
          $stmtUpdateFile->bindParam(':fileValue',$securite_sociale2v);
          $stmtUpdateFile->bindParam(':idGess', $idGess);
          $stmtUpdateFile->bindParam(':condition', $idbom[$i]);
  
          $stmtUpdateFile->execute();
          
  
          
        }
       
        }
    
  
     }

   }
   header("Location: ../../pages/infoaep.php?id=$idGess");

}

if(isset($_POST['submit09'])){
  

  $variableNames = [
    'conseil_administration_president_motifs_formation',
    'conseil_administration_president_nombre_formations',
    'conseil_administration_president_nombre_encadrements',
    'conseil_administration_tresorier_motifs_formation',
    'conseil_administration_tresorier_nombre_formations',
    'conseil_administration_tresorier_nombre_encadrements',
    'conseil_administration_membre_motifs_formation',
    'conseil_administration_membre_nombre_formations',
    'conseil_administration_membre_nombre_encadrements',
    'controleurs_internes_controleur1_motifs_formation',
    'controleurs_internes_controleur1_nombre_formations',
    'controleurs_internes_controleur1_nombre_encadrements',
    'controleurs_internes_controleur2_motifs_formation',
    'controleurs_internes_controleur2_nombre_formations',
    'controleurs_internes_controleur2_nombre_encadrements',
    'agents_magasin_directeur_technique_motifs_formation',
    'agents_magasin_directeur_technique_nombre_formations',
    'agents_magasin_directeur_technique_nombre_encadrements',
    'agents_magasin_garde_systeme_hydro_motifs_formation',
    'agents_magasin_garde_systeme_hydro_nombre_formations',
    'agents_magasin_garde_systeme_hydro_nombre_encadrements',
    'agents_magasin_garde_systeme_eau_motifs_formation',
    'agents_magasin_garde_systeme_eau_nombre_formations',
    'agents_magasin_garde_systeme_eau_nombre_encadrements',
    'agents_magasin_distributeur_motifs_formation',
    'agents_magasin_distributeur_nombre_formations',
    'agents_magasin_distributeur_nombre_encadrements',
        ];
        
        foreach ($variableNames as $variableName) {
            ${$variableName} = $_POST[$variableName];
        }

        $sql99 = "UPDATE pi_formation_tutorat
        SET
          conseil_administration_president_motifs_formation = :conseil_administration_president_motifs_formation,
          conseil_administration_president_nombre_formations = :conseil_administration_president_nombre_formations,
          conseil_administration_president_nombre_encadrements = :conseil_administration_president_nombre_encadrements,
          conseil_administration_tresorier_motifs_formation = :conseil_administration_tresorier_motifs_formation,
          conseil_administration_tresorier_nombre_formations = :conseil_administration_tresorier_nombre_formations,
          conseil_administration_tresorier_nombre_encadrements = :conseil_administration_tresorier_nombre_encadrements,
          conseil_administration_membre_motifs_formation = :conseil_administration_membre_motifs_formation,
          conseil_administration_membre_nombre_formations = :conseil_administration_membre_nombre_formations,
          conseil_administration_membre_nombre_encadrements = :conseil_administration_membre_nombre_encadrements,
          controleurs_internes_controleur1_motifs_formation = :controleurs_internes_controleur1_motifs_formation,
          controleurs_internes_controleur1_nombre_formations = :controleurs_internes_controleur1_nombre_formations,
          controleurs_internes_controleur1_nombre_encadrements = :controleurs_internes_controleur1_nombre_encadrements,
          controleurs_internes_controleur2_motifs_formation = :controleurs_internes_controleur2_motifs_formation,
          controleurs_internes_controleur2_nombre_formations = :controleurs_internes_controleur2_nombre_formations,
          controleurs_internes_controleur2_nombre_encadrements = :controleurs_internes_controleur2_nombre_encadrements,
          agents_magasin_directeur_technique_motifs_formation = :agents_magasin_directeur_technique_motifs_formation,
          agents_magasin_directeur_technique_nombre_formations = :agents_magasin_directeur_technique_nombre_formations,
          agents_magasin_directeur_technique_nombre_encadrements = :agents_magasin_directeur_technique_nombre_encadrements,
          agents_magasin_garde_systeme_hydro_motifs_formation = :agents_magasin_garde_systeme_hydro_motifs_formation,
          agents_magasin_garde_systeme_hydro_nombre_formations = :agents_magasin_garde_systeme_hydro_nombre_formations,
          agents_magasin_garde_systeme_hydro_nombre_encadrements = :agents_magasin_garde_systeme_hydro_nombre_encadrements,
          agents_magasin_garde_systeme_eau_motifs_formation = :agents_magasin_garde_systeme_eau_motifs_formation,
          agents_magasin_garde_systeme_eau_nombre_formations = :agents_magasin_garde_systeme_eau_nombre_formations,
          agents_magasin_garde_systeme_eau_nombre_encadrements = :agents_magasin_garde_systeme_eau_nombre_encadrements,
          agents_magasin_distributeur_motifs_formation = :agents_magasin_distributeur_motifs_formation,
          agents_magasin_distributeur_nombre_formations = :agents_magasin_distributeur_nombre_formations,
          agents_magasin_distributeur_nombre_encadrements = :agents_magasin_distributeur_nombre_encadrements
        WHERE
          idGess = :idGess";

      $stmt = $conn->prepare($sql99);

      $stmt->bindParam(':idGess', $idGess);
      $stmt->bindParam(':conseil_administration_president_motifs_formation', $conseil_administration_president_motifs_formation);
      $stmt->bindParam(':conseil_administration_president_nombre_formations', $conseil_administration_president_nombre_formations);
      $stmt->bindParam(':conseil_administration_president_nombre_encadrements', $conseil_administration_president_nombre_encadrements);
      $stmt->bindParam(':conseil_administration_tresorier_motifs_formation', $conseil_administration_tresorier_motifs_formation);
      $stmt->bindParam(':conseil_administration_tresorier_nombre_formations', $conseil_administration_tresorier_nombre_formations);
      $stmt->bindParam(':conseil_administration_tresorier_nombre_encadrements', $conseil_administration_tresorier_nombre_encadrements);
      $stmt->bindParam(':conseil_administration_membre_motifs_formation', $conseil_administration_membre_motifs_formation);
      $stmt->bindParam(':conseil_administration_membre_nombre_formations', $conseil_administration_membre_nombre_formations);
      $stmt->bindParam(':conseil_administration_membre_nombre_encadrements', $conseil_administration_membre_nombre_encadrements);
      $stmt->bindParam(':controleurs_internes_controleur1_motifs_formation', $controleurs_internes_controleur1_motifs_formation);
      $stmt->bindParam(':controleurs_internes_controleur1_nombre_formations', $controleurs_internes_controleur1_nombre_formations);
      $stmt->bindParam(':controleurs_internes_controleur1_nombre_encadrements', $controleurs_internes_controleur1_nombre_encadrements);
      $stmt->bindParam(':controleurs_internes_controleur2_motifs_formation', $controleurs_internes_controleur2_motifs_formation);
      $stmt->bindParam(':controleurs_internes_controleur2_nombre_formations', $controleurs_internes_controleur2_nombre_formations);
      $stmt->bindParam(':controleurs_internes_controleur2_nombre_encadrements', $controleurs_internes_controleur2_nombre_encadrements);
      $stmt->bindParam(':agents_magasin_directeur_technique_motifs_formation', $agents_magasin_directeur_technique_motifs_formation);
      $stmt->bindParam(':agents_magasin_directeur_technique_nombre_formations', $agents_magasin_directeur_technique_nombre_formations);
      $stmt->bindParam(':agents_magasin_directeur_technique_nombre_encadrements', $agents_magasin_directeur_technique_nombre_encadrements);
      $stmt->bindParam(':agents_magasin_garde_systeme_hydro_motifs_formation', $agents_magasin_garde_systeme_hydro_motifs_formation);
      $stmt->bindParam(':agents_magasin_garde_systeme_hydro_nombre_formations', $agents_magasin_garde_systeme_hydro_nombre_formations);
      $stmt->bindParam(':agents_magasin_garde_systeme_hydro_nombre_encadrements', $agents_magasin_garde_systeme_hydro_nombre_encadrements);
      $stmt->bindParam(':agents_magasin_garde_systeme_eau_motifs_formation', $agents_magasin_garde_systeme_eau_motifs_formation);
      $stmt->bindParam(':agents_magasin_garde_systeme_eau_nombre_formations', $agents_magasin_garde_systeme_eau_nombre_formations);
      $stmt->bindParam(':agents_magasin_garde_systeme_eau_nombre_encadrements', $agents_magasin_garde_systeme_eau_nombre_encadrements);
      $stmt->bindParam(':agents_magasin_distributeur_motifs_formation', $agents_magasin_distributeur_motifs_formation);
      $stmt->bindParam(':agents_magasin_distributeur_nombre_formations', $agents_magasin_distributeur_nombre_formations);
      $stmt->bindParam(':agents_magasin_distributeur_nombre_encadrements', $agents_magasin_distributeur_nombre_encadrements);

      $stmt->execute();

}

if(isset($_POST['submit10'])){
  $variableNames = [
    'surface_totale',
    'surface_hors_zone',
    'nombre_sans_compteur',
    'nombre_compteurs',
    'nombre_compteurs_desactives',
    'nombre_compteurs_non_autorises',
    'nombre_compteurs_conformes_specifications',
    'nombre_fournisseurs_citernes'
];

foreach ($variableNames as $variableName) {
    ${$variableName} = isset($_POST[$variableName]) ? intval($_POST[$variableName]) : 0;
}
$observations = $_POST['observations'];
$distribution_eau_selon = $_POST['distribution_eau_selon'];   

$sqlUpdate = "UPDATE pi_donnees_points_distribution
              SET
                surface_totale = :surface_totale,
                observations = :observations,
                distribution_eau_selon = :distribution_eau_selon,
                surface_hors_zone = :surface_hors_zone,
                nombre_sans_compteur = :nombre_sans_compteur,
                nombre_compteurs = :nombre_compteurs,
                nombre_compteurs_desactives = :nombre_compteurs_desactives,
                nombre_compteurs_non_autorises = :nombre_compteurs_non_autorises,
                nombre_compteurs_conformes_specifications = :nombre_compteurs_conformes_specifications,
                nombre_fournisseurs_citernes = :nombre_fournisseurs_citernes
              WHERE
                idGess = :idGess";

$stmt = $conn->prepare($sqlUpdate);

$stmt->bindParam(':idGess', $idGess);
$stmt->bindParam(':surface_totale', $surface_totale);
$stmt->bindParam(':observations', $observations);
$stmt->bindParam(':distribution_eau_selon', $distribution_eau_selon);
$stmt->bindParam(':surface_hors_zone', $surface_hors_zone);
$stmt->bindParam(':nombre_sans_compteur', $nombre_sans_compteur);
$stmt->bindParam(':nombre_compteurs', $nombre_compteurs);
$stmt->bindParam(':nombre_compteurs_desactives', $nombre_compteurs_desactives);
$stmt->bindParam(':nombre_compteurs_non_autorises', $nombre_compteurs_non_autorises);
$stmt->bindParam(':nombre_compteurs_conformes_specifications', $nombre_compteurs_conformes_specifications);
$stmt->bindParam(':nombre_fournisseurs_citernes', $nombre_fournisseurs_citernes);

$stmt->execute();

      $document_suivi_distribution = getTabFilesName($_FILES['document_suivi_distribution']);
      $mise_a_jour_documents = getTabFilesName($_FILES['mise_a_jour_documents']);
      $engagement_2 = getTabFilesName($_FILES['engagement_2']);

if (isset($_FILES['document_suivi_distribution']) && !empty($_FILES['document_suivi_distribution']['name'][0])){
  $document_suivi_distribution =getTabFilesName($_FILES['document_suivi_distribution']);
  $sqlUpdate = "UPDATE pi_donnees_points_distribution
  SET document_suivi_distribution = :document_suivi_distribution
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':document_suivi_distribution', $document_suivi_distribution);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

  

}

if (isset($_FILES['engagement_2']) && !empty($_FILES['engagement_2']['name'][0])){
  $engagement_2=getTabFilesName($_FILES['engagement_2']);
  $sqlUpdate = "UPDATE pi_donnees_points_distribution
  SET engagement_2 = :engagement_2
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':engagement_2', $engagement_2);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

  

}
if (isset($_FILES['mise_a_jour_documents']) && !empty($_FILES['mise_a_jour_documents']['name'][0])){
  $mise_a_jour_documents =getTabFilesName($_FILES['mise_a_jour_documents']);
  $sqlUpdate = "UPDATE pi_donnees_points_distribution
  SET mise_a_jour_documents = :mise_a_jour_documents
  WHERE idGess = :idGess";
  $stmtUpdate = $conn->prepare($sqlUpdate);
  $stmtUpdate->bindParam(':mise_a_jour_documents', $mise_a_jour_documents);

  $stmtUpdate->bindParam(':idGess', $idGess);
  
  $stmtUpdate->execute();

  

}

header("Location: ../../pages/infoaep.php?id=$idGess");

}
if(isset($_POST['submit11'])){

  
  $cultures_grandes_surface_hectares = isset($_POST['cultures_grandes_surface_hectares']) ? intval($_POST['cultures_grandes_surface_hectares']) : 0;
  $cultures_grandes_surface_goutte_goutte = isset($_POST['cultures_grandes_surface_goutte_goutte']) ? intval($_POST['cultures_grandes_surface_goutte_goutte']) : 0;
  $cultures_grandes_surface_arrosage = isset($_POST['cultures_grandes_surface_arrosage']) ? intval($_POST['cultures_grandes_surface_arrosage']) : 0;
  $cultures_grandes_surface_irrigation_traditionnelle = isset($_POST['cultures_grandes_surface_irrigation_traditionnelle']) ? intval($_POST['cultures_grandes_surface_irrigation_traditionnelle']) : 0;
  $fourrages_surface_hectares = isset($_POST['fourrages_surface_hectares']) ? intval($_POST['fourrages_surface_hectares']) : 0;
  $fourrages_surface_goutte_goutte = isset($_POST['fourrages_surface_goutte_goutte']) ? intval($_POST['fourrages_surface_goutte_goutte']) : 0;
  $fourrages_surface_arrosage = isset($_POST['fourrages_surface_arrosage']) ? intval($_POST['fourrages_surface_arrosage']) : 0;
  $fourrages_surface_irrigation_traditionnelle = isset($_POST['fourrages_surface_irrigation_traditionnelle']) ? intval($_POST['fourrages_surface_irrigation_traditionnelle']) : 0;
  $legumes_surface_hectares = isset($_POST['legumes_surface_hectares']) ? intval($_POST['legumes_surface_hectares']) : 0;
  $legumes_surface_goutte_goutte = isset($_POST['legumes_surface_goutte_goutte']) ? intval($_POST['legumes_surface_goutte_goutte']) : 0;
  $legumes_surface_arrosage = isset($_POST['legumes_surface_arrosage']) ? intval($_POST['legumes_surface_arrosage']) : 0;
  $legumes_surface_irrigation_traditionnelle = isset($_POST['legumes_surface_irrigation_traditionnelle']) ? intval($_POST['legumes_surface_irrigation_traditionnelle']) : 0;
  $arbres_fruitiers_surface_hectares = isset($_POST['arbres_fruitiers_surface_hectares']) ? intval($_POST['arbres_fruitiers_surface_hectares']) : 0;
  $arbres_fruitiers_surface_goutte_goutte = isset($_POST['arbres_fruitiers_surface_goutte_goutte']) ? intval($_POST['arbres_fruitiers_surface_goutte_goutte']) : 0;
  $arbres_fruitiers_surface_arrosage = isset($_POST['arbres_fruitiers_surface_arrosage']) ? intval($_POST['arbres_fruitiers_surface_arrosage']) : 0;
  $arbres_fruitiers_surface_irrigation_traditionnelle = isset($_POST['arbres_fruitiers_surface_irrigation_traditionnelle']) ? intval($_POST['arbres_fruitiers_surface_irrigation_traditionnelle']) : 0;
  $oliviers_surface_hectares = isset($_POST['oliviers_surface_hectares']) ? intval($_POST['oliviers_surface_hectares']) : 0;
  $oliviers_surface_goutte_goutte = isset($_POST['oliviers_surface_goutte_goutte']) ? intval($_POST['oliviers_surface_goutte_goutte']) : 0;
  $oliviers_surface_arrosage = isset($_POST['oliviers_surface_arrosage']) ? intval($_POST['oliviers_surface_arrosage']) : 0;
  $oliviers_surface_irrigation_traditionnelle = isset($_POST['oliviers_surface_irrigation_traditionnelle']) ? intval($_POST['oliviers_surface_irrigation_traditionnelle']) : 0;
  $autres_arbres_type = isset($_POST['autres_arbres_type']) ? intval($_POST['autres_arbres_type']) : 0;
  $autres_arbres_surface_hectares = isset($_POST['autres_arbres_surface_hectares']) ? intval($_POST['autres_arbres_surface_hectares']) : 0;
  $autres_arbres_surface_goutte_goutte = isset($_POST['autres_arbres_surface_goutte_goutte']) ? intval($_POST['autres_arbres_surface_goutte_goutte']) : 0;
  $autres_arbres_surface_arrosage = isset($_POST['autres_arbres_surface_arrosage']) ? intval($_POST['autres_arbres_surface_arrosage']) : 0;
  $autres_arbres_surface_irrigation_traditionnelle = isset($_POST['autres_arbres_surface_irrigation_traditionnelle']) ? intval($_POST['autres_arbres_surface_irrigation_traditionnelle']) : 0;
  $legumineuses_surface_hectares = isset($_POST['legumineuses_surface_hectares']) ? intval($_POST['legumineuses_surface_hectares']) : 0;
  $legumineuses_surface_goutte_goutte = isset($_POST['legumineuses_surface_goutte_goutte']) ? intval($_POST['legumineuses_surface_goutte_goutte']) : 0;
  $legumineuses_surface_arrosage = isset($_POST['legumineuses_surface_arrosage']) ? intval($_POST['legumineuses_surface_arrosage']) : 0;
  $legumineuses_surface_irrigation_traditionnelle = isset($_POST['legumineuses_surface_irrigation_traditionnelle']) ? intval($_POST['legumineuses_surface_irrigation_traditionnelle']) : 0;
  $total = isset($_POST['total']) ? intval($_POST['total']) : 0;


$sqlUpdate = "UPDATE pi_plantes_presentes
              SET
                cultures_grandes_surface_hectares = :cultures_grandes_surface_hectares,
                cultures_grandes_surface_goutte_goutte = :cultures_grandes_surface_goutte_goutte,
                cultures_grandes_surface_arrosage = :cultures_grandes_surface_arrosage,
                cultures_grandes_surface_irrigation_traditionnelle = :cultures_grandes_surface_irrigation_traditionnelle,
                fourrages_surface_hectares = :fourrages_surface_hectares,
                fourrages_surface_goutte_goutte = :fourrages_surface_goutte_goutte,
                fourrages_surface_arrosage = :fourrages_surface_arrosage,
                fourrages_surface_irrigation_traditionnelle = :fourrages_surface_irrigation_traditionnelle,
                legumes_surface_hectares = :legumes_surface_hectares,
                legumes_surface_goutte_goutte = :legumes_surface_goutte_goutte,
                legumes_surface_arrosage = :legumes_surface_arrosage,
                legumes_surface_irrigation_traditionnelle = :legumes_surface_irrigation_traditionnelle,
                arbres_fruitiers_surface_hectares = :arbres_fruitiers_surface_hectares,
                arbres_fruitiers_surface_goutte_goutte = :arbres_fruitiers_surface_goutte_goutte,
                arbres_fruitiers_surface_arrosage = :arbres_fruitiers_surface_arrosage,
                arbres_fruitiers_surface_irrigation_traditionnelle = :arbres_fruitiers_surface_irrigation_traditionnelle,
                oliviers_surface_hectares = :oliviers_surface_hectares,
                oliviers_surface_goutte_goutte = :oliviers_surface_goutte_goutte,
                oliviers_surface_arrosage = :oliviers_surface_arrosage,
                oliviers_surface_irrigation_traditionnelle = :oliviers_surface_irrigation_traditionnelle,
                autres_arbres_type = :autres_arbres_type,
                autres_arbres_surface_hectares = :autres_arbres_surface_hectares,
                autres_arbres_surface_goutte_goutte = :autres_arbres_surface_goutte_goutte,
                autres_arbres_surface_arrosage = :autres_arbres_surface_arrosage,
                autres_arbres_surface_irrigation_traditionnelle = :autres_arbres_surface_irrigation_traditionnelle,
                legumineuses_surface_hectares = :legumineuses_surface_hectares,
                legumineuses_surface_goutte_goutte = :legumineuses_surface_goutte_goutte,
                legumineuses_surface_arrosage = :legumineuses_surface_arrosage,
                legumineuses_surface_irrigation_traditionnelle = :legumineuses_surface_irrigation_traditionnelle,
                total = :total
              WHERE idGess = :idGess";

$stmtUpdate = $conn->prepare($sqlUpdate);

// Bind parameters
$stmtUpdate->bindParam(':cultures_grandes_surface_hectares', $cultures_grandes_surface_hectares);
$stmtUpdate->bindParam(':cultures_grandes_surface_goutte_goutte', $cultures_grandes_surface_goutte_goutte);
$stmtUpdate->bindParam(':cultures_grandes_surface_arrosage', $cultures_grandes_surface_arrosage);
$stmtUpdate->bindParam(':cultures_grandes_surface_irrigation_traditionnelle', $cultures_grandes_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':fourrages_surface_hectares', $fourrages_surface_hectares);
$stmtUpdate->bindParam(':fourrages_surface_goutte_goutte', $fourrages_surface_goutte_goutte);
$stmtUpdate->bindParam(':fourrages_surface_arrosage', $fourrages_surface_arrosage);
$stmtUpdate->bindParam(':fourrages_surface_irrigation_traditionnelle', $fourrages_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':legumes_surface_hectares', $legumes_surface_hectares);
$stmtUpdate->bindParam(':legumes_surface_goutte_goutte', $legumes_surface_goutte_goutte);
$stmtUpdate->bindParam(':legumes_surface_arrosage', $legumes_surface_arrosage);
$stmtUpdate->bindParam(':legumes_surface_irrigation_traditionnelle', $legumes_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':arbres_fruitiers_surface_hectares', $arbres_fruitiers_surface_hectares);
$stmtUpdate->bindParam(':arbres_fruitiers_surface_goutte_goutte', $arbres_fruitiers_surface_goutte_goutte);
$stmtUpdate->bindParam(':arbres_fruitiers_surface_arrosage', $arbres_fruitiers_surface_arrosage);
$stmtUpdate->bindParam(':arbres_fruitiers_surface_irrigation_traditionnelle', $arbres_fruitiers_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':oliviers_surface_hectares', $oliviers_surface_hectares);
$stmtUpdate->bindParam(':oliviers_surface_goutte_goutte', $oliviers_surface_goutte_goutte);
$stmtUpdate->bindParam(':oliviers_surface_arrosage', $oliviers_surface_arrosage);
$stmtUpdate->bindParam(':oliviers_surface_irrigation_traditionnelle', $oliviers_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':autres_arbres_type', $autres_arbres_type);
$stmtUpdate->bindParam(':autres_arbres_surface_hectares', $autres_arbres_surface_hectares);
$stmtUpdate->bindParam(':autres_arbres_surface_goutte_goutte', $autres_arbres_surface_goutte_goutte);
$stmtUpdate->bindParam(':autres_arbres_surface_arrosage', $autres_arbres_surface_arrosage);
$stmtUpdate->bindParam(':autres_arbres_surface_irrigation_traditionnelle', $autres_arbres_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':legumineuses_surface_hectares', $legumineuses_surface_hectares);
$stmtUpdate->bindParam(':legumineuses_surface_goutte_goutte', $legumineuses_surface_goutte_goutte);
$stmtUpdate->bindParam(':legumineuses_surface_arrosage', $legumineuses_surface_arrosage);
$stmtUpdate->bindParam(':legumineuses_surface_irrigation_traditionnelle', $legumineuses_surface_irrigation_traditionnelle);
$stmtUpdate->bindParam(':total', $total);
$stmtUpdate->bindParam(':idGess', $idGess);
$stmtUpdate->execute();
header("Location: ../../pages/infoaep.php?id=$idGess");



}

if(isset($_POST['submit12'])){
  $vente_eau_par_metre_cube = isset($_POST['vente_eau_par_metre_cube']) ? 1 : 0;
        $vente_a_credit = isset($_POST['vente_a_credit']) ? 1 : 0;
      $vente_eau_par_heure = isset($_POST['vente_eau_par_heure']) ? 1 : 0;
      $retard_paiement = isset($_POST['retard_paiement']) ? 1 : 0;
      
          $tarif_par_heure = isset($_POST['tarif_par_heure']) ? floatval($_POST['tarif_par_heure']) : 0;
    $tarif_par_metre_cube = isset($_POST['tarif_par_metre_cube']) ? floatval($_POST['tarif_par_metre_cube']) : 0;
    $paiement = $_POST['paiement'];
    $methode_fixation_tarif_eau = $_POST['methode_fixation_tarif_eau'];
    $montant_a_credit = isset($_POST['montant_a_credit']) ? floatval($_POST['montant_a_credit']) : 0;
    $dettes_agriculteurs = isset($_POST['dettes_agriculteurs']) ? floatval($_POST['dettes_agriculteurs']) : 0;
    $dettes_fournisseurs = isset($_POST['dettes_fournisseurs']) ? floatval($_POST['dettes_fournisseurs']) : 0;
    $dettes_steg = isset($_POST['dettes_steg']) ? floatval($_POST['dettes_steg']) : 0;
    $dettes_crda = isset($_POST['dettes_crda']) ? floatval($_POST['dettes_crda']) : 0;
    $autres_dettes = isset($_POST['autres_dettes']) ? floatval($_POST['autres_dettes']) : 0;
    $description_dettes =$_POST['description_dettes'];
    $caisse = isset($_POST['caisse']) ? floatval($_POST['caisse']) : 0;
    $compte_courant = isset($_POST['compte_courant']) ? floatval($_POST['compte_courant']) : 0;
     

    $sqlUpdate = "UPDATE pi_aspects_financiers
    SET vente_eau_par_heure = :vente_eau_par_heure, 
        tarif_par_heure = :tarif_par_heure, 
        vente_eau_par_metre_cube = :vente_eau_par_metre_cube, 
        tarif_par_metre_cube = :tarif_par_metre_cube, 
        paiement = :paiement, 
        methode_fixation_tarif_eau = :methode_fixation_tarif_eau, 
        vente_a_credit = :vente_a_credit, 
        montant_a_credit = :montant_a_credit, 
        retard_paiement = :retard_paiement, 
        dettes_agriculteurs = :dettes_agriculteurs, 
        dettes_fournisseurs = :dettes_fournisseurs, 
        dettes_steg = :dettes_steg, 
        dettes_crda = :dettes_crda, 
        autres_dettes = :autres_dettes, 
        description_dettes = :description_dettes, 
        caisse = :caisse, 
        compte_courant = :compte_courant
    WHERE idGess = :idGess";

      $stmt = $conn->prepare($sqlUpdate);

      $stmt->bindParam(':idGess', $idGess);
      $stmt->bindParam(':vente_eau_par_heure', $vente_eau_par_heure);
      $stmt->bindParam(':tarif_par_heure', $tarif_par_heure);
      $stmt->bindParam(':vente_eau_par_metre_cube', $vente_eau_par_metre_cube);
      $stmt->bindParam(':tarif_par_metre_cube', $tarif_par_metre_cube);
      $stmt->bindParam(':paiement', $paiement);
      $stmt->bindParam(':methode_fixation_tarif_eau', $methode_fixation_tarif_eau);
      $stmt->bindParam(':vente_a_credit', $vente_a_credit);
      $stmt->bindParam(':montant_a_credit', $montant_a_credit);
      $stmt->bindParam(':retard_paiement', $retard_paiement);
      $stmt->bindParam(':dettes_agriculteurs', $dettes_agriculteurs);
      $stmt->bindParam(':dettes_fournisseurs', $dettes_fournisseurs);
      $stmt->bindParam(':dettes_steg', $dettes_steg);
      $stmt->bindParam(':dettes_crda', $dettes_crda);
      $stmt->bindParam(':autres_dettes', $autres_dettes);
      $stmt->bindParam(':description_dettes', $description_dettes);
      $stmt->bindParam(':caisse', $caisse);
      $stmt->bindParam(':compte_courant', $compte_courant);

      $stmt->execute();
      header("Location: ../../pages/infoaep.php?id=$idGess");


}

if(isset($_POST['submit13'])){
  $quantite_eau_pompee = isset($_POST['quantite_eau_pompee']) ? intval($_POST['quantite_eau_pompee']) : 0;
  $quantite_eau_distribuee = isset($_POST['quantite_eau_distribuee']) ? intval($_POST['quantite_eau_distribuee']) : 0;

  

   if($quantite_eau_pompee>0){
    $taux_perte = (($quantite_eau_pompee - $quantite_eau_distribuee) / $quantite_eau_pompee) * 100;
    $taux_perte = number_format($taux_perte, 2);

   }
   else{
    $taux_perte=0;
   }

   $sqlUpdate = "UPDATE pi_suivi_pompage_distribution_eau
   SET quantite_eau_pompee = :quantite_eau_pompee,
       quantite_eau_distribuee = :quantite_eau_distribuee,
       taux_perte = :taux_perte
   WHERE idGess = :idGess";

   $stmt = $conn->prepare($sqlUpdate);

   $stmt->bindParam(':idGess', $idGess);
   $stmt->bindParam(':quantite_eau_pompee', $quantite_eau_pompee);
   $stmt->bindParam(':quantite_eau_distribuee', $quantite_eau_distribuee);
   $stmt->bindParam(':taux_perte', $taux_perte);

   $stmt->execute();

}

if(isset($_POST['submit14'])){
  
  $local = isset($_POST['local']) ? 1 : 0;
  $bureau =isset($_POST['bureau']) ? 1 : 0;
  $chaises = isset($_POST['chaises']) ? 1 : 0;
  $armoire = isset($_POST['armoire']) ? 1 : 0;
  $panneau_publicitaire =isset($_POST['panneau_publicitaire']) ? 1 : 0;
  $ordinateur =isset($_POST['ordinateur']) ? 1 : 0;
  $telephone = isset($_POST['telephone']) ? 1 : 0;
  $fax =isset($_POST['fax']) ? 1 : 0;
  $imprimante = isset($_POST['imprimante']) ? 1 : 0;
  $velo =isset($_POST['velo']) ? 1 : 0;


  $sql = "UPDATE pi_logistique_mojamaa
        SET local = :local,
            bureau = :bureau,
            chaises = :chaises,
            armoire = :armoire,
            panneau_publicitaire = :panneau_publicitaire,
            ordinateur = :ordinateur,
            telephone = :telephone,
            fax = :fax,
            imprimante = :imprimante,
            velo = :velo
        WHERE idGess = :idGess";

  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':idGess', $idGess);
  $stmt->bindParam(':local', $local);
  $stmt->bindParam(':bureau', $bureau);
  $stmt->bindParam(':chaises', $chaises);
  $stmt->bindParam(':armoire', $armoire);
  $stmt->bindParam(':panneau_publicitaire', $panneau_publicitaire);
  $stmt->bindParam(':ordinateur', $ordinateur);
  $stmt->bindParam(':telephone', $telephone);
  $stmt->bindParam(':fax', $fax);
  $stmt->bindParam(':imprimante', $imprimante);
  $stmt->bindParam(':velo', $velo);

  $stmt->execute();
  header("Location: ../../pages/infoaep.php?id=$idGess");

}

if(isset($_POST['submit15'])){
  $exportations = $_FILES['exportations'];
  $importations = $_FILES['importations'];
  $rapports = $_FILES['rapports'];
  $listes_presence = $_FILES['listes_presence'];
  $comptes_rendus = $_FILES['comptes_rendus'];
  $listes = $_FILES['listes'];
  $registre_comptes_rendus_seances = $_FILES['registre_comptes_rendus_seances'];
  $convocations = $_FILES['convocations'];
  $programme_collaboratif = $_FILES['programme_collaboratif'];
  $registre_adhesions = $_FILES['registre_adhesions'];
  $listes_mises_a_jour = $_FILES['listes_mises_a_jour'];
  $demandes_raccordement_reseau = $_FILES['demandes_raccordement_reseau'];
  $engagements = $_FILES['engagements'];
  $delegations = $_FILES['delegations'];
  $conseil_administration = $_FILES['conseil_administration'];
  $inventaire_biens_collectifs = $_FILES['inventaire_biens_collectifs'];
  $dossier_revendications_economie_eau = $_FILES['dossier_revendications_economie_eau'];
  $donnees_statistiques_activite_collectif = $_FILES['donnees_statistiques_activite_collectif'];
  $cahiers_visites = $_FILES['cahiers_visites'];

  $fileFields = [
    'exportations' => $exportations,
    'importations' => $importations,
    'rapports' => $rapports,
    'listes_presence' => $listes_presence,
    'comptes_rendus' => $comptes_rendus,
    'listes' => $listes,
    'registre_comptes_rendus_seances' => $registre_comptes_rendus_seances,
    'convocations' => $convocations,
    'programme_collaboratif' => $programme_collaboratif,
    'registre_adhesions' => $registre_adhesions,
    'listes_mises_a_jour' => $listes_mises_a_jour,
    'demandes_raccordement_reseau' => $demandes_raccordement_reseau,
    'engagements' => $engagements,
    'delegations' => $delegations,
    'conseil_administration' => $conseil_administration,
    'inventaire_biens_collectifs' => $inventaire_biens_collectifs,
    'dossier_revendications_economie_eau' => $dossier_revendications_economie_eau,
    'donnees_statistiques_activite_collectif' => $donnees_statistiques_activite_collectif,
    'cahiers_visites' => $cahiers_visites,
];



       



foreach ($fileFields as $fieldName => $fileValue) {
    if (isset($fileValue) && !empty($fileValue['name'][0])) {
        $sqlUpdate = "UPDATE documents_administratifs
                      SET $fieldName = :fileValue
                      WHERE idGess = :idGess";
        $x=getTabFilesName($fileValue);
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':fileValue', $x);
        $stmtUpdate->bindParam(':idGess', $idGess);
        $stmtUpdate->execute();
    }
}
header("Location: ../../pages/infoaep.php?id=$idGess");

}

if(isset($_POST['submit16'])){
  $publication_journal_officiel = $_FILES['publication_journal_officiel'];
  $rapports1 = $_FILES['rapports1'];
  $statuts_fondamentaux = $_FILES['statuts_fondamentaux'];
  $reglement_interieur = $_FILES['reglement_interieur'];
  $contrats_utilisation_eau = $_FILES['contrats_utilisation_eau'];
  $electricite = $_FILES['electricite'];
  $eau = $_FILES['eau'];
  $contrats_manutention = $_FILES['contrats_manutention'];
  $contrat_gestion_systeme_hydrique = $_FILES['contrat_gestion_systeme_hydrique'];
  $contrats = $_FILES['contrats'];
  $dossier_mandat = $_FILES['dossier_mandat'];
  $cartes_versement_salaires = $_FILES['cartes_versement_salaires'];
  $proces_verbaux_mandatement_determination_salaires = $_FILES['proces_verbaux_mandatement_determination_salaires'];
  $dossier_etat_civil_agents = $_FILES['dossier_etat_civil_agents'];
  $certificat_inscription = $_FILES['certificat_inscription'];
  $autorisations_periodiques = $_FILES['autorisations_periodiques'];
  $recus_paiement = $_FILES['recus_paiement'];
  $carte_identite_fiscale = $_FILES['carte_identite_fiscale'];
  $autorisations_periodiques1 = $_FILES['1_autorisations_periodiques'];
  $recus_paiement1 =$_FILES['1_recus_paiement'];
 

  $fileFields = [
    'publication_journal_officiel' => $publication_journal_officiel,
    'rapports1' => $rapports1,
    'statuts_fondamentaux' => $statuts_fondamentaux,
    'reglement_interieur' => $reglement_interieur,
    'contrats_utilisation_eau' => $contrats_utilisation_eau,
    'electricite' => $electricite,
    'eau' => $eau,
    'contrats_manutention' => $contrats_manutention,
    'contrat_gestion_systeme_hydrique' => $contrat_gestion_systeme_hydrique,
    'contrats' => $contrats,
    'dossier_mandat' => $dossier_mandat,
    'cartes_versement_salaires' => $cartes_versement_salaires,
    'proces_verbaux_mandatement_determination_salaires' => $proces_verbaux_mandatement_determination_salaires,
    'dossier_etat_civil_agents' => $dossier_etat_civil_agents,
    'certificat_inscription' => $certificat_inscription,
    'autorisations_periodiques' => $autorisations_periodiques,
    'recus_paiement' => $recus_paiement,
    'carte_identite_fiscale' => $carte_identite_fiscale,
    '1_autorisations_periodiques' => $autorisations_periodiques1,
    '1_recus_paiement' => $recus_paiement1,
];


foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE dossier_juridique
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
}
header("Location: ../../pages/infoaep.php?id=$idGess");
}

if(isset($_POST['submit17'])){
  
  $Exploitations_Agricoles = $_FILES['Exploitations_Agricoles'];
  $Stations_Pompage = $_FILES['Stations_Pompage'];
  $Reseau_Maien = $_FILES['Reseau_Maien'];
  $Reservoirs = $_FILES['Reservoirs'];
  $Caracteristiques_Normes = $_FILES['Caracteristiques_Normes'];
  $Etudes_Techniques = $_FILES['Etudes_Techniques'];
  $Registre_Pompage = $_FILES['Registre_Pompage'];
  $Cycle_Eau = $_FILES['Cycle_Eau'];
  $Registre_Consommation = $_FILES['Registre_Consommation'];
  $Registre_Distribution = $_FILES['Registre_Distribution'];
  $Permis_Distribution = $_FILES['Permis_Distribution'];
  $Documents_Suivi = $_FILES['Documents_Suivi'];
  $Maintenance_Preventive = $_FILES['Maintenance_Preventive'];
  $Registre_Demandes_Distribution = $_FILES['Registre_Demandes_Distribution'];

  $fileFields = [
    'Exploitations_Agricoles' => $Exploitations_Agricoles,
    'Stations_Pompage' => $Stations_Pompage,
    'Reseau_Maien' => $Reseau_Maien,
    'Reservoirs' => $Reservoirs,
    'Caracteristiques_Normes' => $Caracteristiques_Normes,
    'Etudes_Techniques' => $Etudes_Techniques,
    'Registre_Pompage' => $Registre_Pompage,
    'Cycle_Eau' => $Cycle_Eau,
    'Registre_Consommation' => $Registre_Consommation,
    'Registre_Distribution' => $Registre_Distribution,
    'Permis_Distribution' => $Permis_Distribution,
    'Documents_Suivi' => $Documents_Suivi,
    'Maintenance_Preventive' => $Maintenance_Preventive,
    'Registre_Demandes_Distribution' => $Registre_Demandes_Distribution,
];

foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE pi_dossier_technique
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
 
}
header("Location: ../../pages/infoaep.php?id=$idGess");
}
if(isset($_POST['submit18'])){
  $factures_et_mouidates =$_FILES['factures_et_mouidates'];
  $copies_budgets_annuels =$_FILES['copies_budgets_annuels'];
  $releve_compteurs_rapports =$_FILES['releve_compteurs_rapports'];
  $etats_compte_courant =$_FILES['etats_compte_courant'];
  $mouidates_depenses =$_FILES['mouidates_depenses'];
  $cartes_adhesion =$_FILES['cartes_adhesion'];
  $recevabilites_livraison =$_FILES['recevabilites_livraison'];
  $fichier_abonnements =$_FILES['fichier_abonnements'];
  $fichier_tarification =$_FILES['fichier_tarification'];
  $rapports_controle_comptable =$_FILES['rapports_controle_comptable'];
  $registres_suivi_exploitation_facturation_encaissement =$_FILES['registres_suivi_exploitation_facturation_encaissement'];
  $livre_comptabilite =$_FILES['livre_comptabilite'];
  $rapports_situation_financiere =$_FILES['rapports_situation_financiere'];
  $registre_listes_dettes_agriculteurs_beneficiaires =$_FILES['registre_listes_dettes_agriculteurs_beneficiaires'];
  $liste_dettes_association_fournisseurs = $_FILES['liste_dettes_association_fournisseurs'];

  $fileFields = [
    'factures_et_mouidates' => $factures_et_mouidates,
    'copies_budgets_annuels' => $copies_budgets_annuels,
    'releve_compteurs_rapports' => $releve_compteurs_rapports,
    'etats_compte_courant' => $etats_compte_courant,
    'mouidates_depenses' => $mouidates_depenses,
    'cartes_adhesion' => $cartes_adhesion,
    'recevabilites_livraison' => $recevabilites_livraison,
    'fichier_abonnements' => $fichier_abonnements,
    'fichier_tarification' => $fichier_tarification,
    'rapports_controle_comptable' => $rapports_controle_comptable,
    'registres_suivi_exploitation_facturation_encaissement' => $registres_suivi_exploitation_facturation_encaissement,
    'livre_comptabilite' => $livre_comptabilite,
    'rapports_situation_financiere' => $rapports_situation_financiere,
    'registre_listes_dettes_agriculteurs_beneficiaires' => $registre_listes_dettes_agriculteurs_beneficiaires,
    'liste_dettes_association_fournisseurs' => $liste_dettes_association_fournisseurs,
];




  foreach ($fileFields as $fieldName => $fileValue) {
    if (isset($fileValue) && !empty($fileValue['name'][0])) {
        $sqlUpdate = "UPDATE pi_dossier_financier
                      SET $fieldName = :fileValue
                      WHERE idGess = :idGess";
        $x=getTabFilesName($fileValue);
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':fileValue', $x);
        $stmtUpdate->bindParam(':idGess', $idGess);
        $stmtUpdate->execute();
    }
    
  }
  header("Location: ../../pages/infoaep.php?id=$idGess");
}


if(isset($_POST['submit31'])){
  $liaison_prive = isset($_POST['liaison_prive']) ? intval($_POST['liaison_prive']) : 0;
  $fournisseurs_reservoirs = isset($_POST['fournisseurs_reservoirs']) ? intval($_POST['fournisseurs_reservoirs']) : 0;
  $reservoir_public=isset($_POST['reservoir_public']) ? 1 : 0;
  $reservoir_prive=isset($_POST['reservoir_prive']) ? 1 : 0;
  $robinet_public	=isset($_POST['robinet_public']) ? intval($_POST['robinet_public']) : 0;
  $liaison_public=isset($_POST['liaison_public']) ? intval($_POST['liaison_public']) : 0;
  $robinet_util_public=isset($_POST['robinet_util_public']) ? 1 : 0;
  $robinet_util_prive=isset($_POST['robinet_util_prive']) ? 1 : 0;

  $file_reservoir_public = $_FILES['file_reservoir_public']; 
  $files_reservoir_prive = $_FILES['files_reservoir_prive']; 
  $file_robinet_util_public = $_FILES['file_robinet_util_public']; 
  $file_robinet_util_prive = $_FILES['file_robinet_util_prive']; 


  $sqlUpdate = "UPDATE distribution_eau
                  SET liaison_prive = :liaison_prive,
                      fournisseurs_reservoirs = :fournisseurs_reservoirs,
                      reservoir_public = :reservoir_public,
                      reservoir_prive = :reservoir_prive,
                      robinet_public = :robinet_public,
                      liaison_public = :liaison_public,
                      robinet_util_public = :robinet_util_public,
                      robinet_util_prive = :robinet_util_prive
                  WHERE idGess = :idGess";

    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':liaison_prive', $liaison_prive);
    $stmtUpdate->bindParam(':fournisseurs_reservoirs', $fournisseurs_reservoirs);
    $stmtUpdate->bindParam(':reservoir_public', $reservoir_public);
    $stmtUpdate->bindParam(':reservoir_prive', $reservoir_prive);
    $stmtUpdate->bindParam(':robinet_public', $robinet_public);
    $stmtUpdate->bindParam(':liaison_public', $liaison_public);
    $stmtUpdate->bindParam(':robinet_util_public', $robinet_util_public);
    $stmtUpdate->bindParam(':robinet_util_prive', $robinet_util_prive);
    $stmtUpdate->bindParam(':idGess', $idGess);
    $stmtUpdate->execute();

    $fileFields = [
      'file_reservoir_public' => $file_reservoir_public,
      'files_reservoir_prive' => $files_reservoir_prive,
      'file_robinet_util_public' => $file_robinet_util_public,
      'file_robinet_util_prive' => $file_robinet_util_prive,
  ];
  

  foreach ($fileFields as $fieldName => $fileValue) {
    if (isset($fileValue) && !empty($fileValue['name'][0])) {
        $sqlUpdate = "UPDATE distribution_eau
                      SET $fieldName = :fileValue
                      WHERE idGess = :idGess";
        $x=getTabFilesName($fileValue);
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':fileValue', $x);
        $stmtUpdate->bindParam(':idGess', $idGess);
        $stmtUpdate->execute();
    }
   
  }
  header("Location: ../../pages/infoaep.php?id=$idGess");
}


if(isset($_POST['submit32'])){
  $nombre = isset($_POST['nombre']) ? intval($_POST['nombre']) : 0;
        $bailleurs = isset($_POST['bailleurs']) ? intval($_POST['bailleurs']) : 0;
        $benevoles = isset($_POST['benevoles']) ? intval($_POST['benevoles']) : 0;
        $paiement = isset($_POST['paiement']) ? intval($_POST['paiement']) : 0;

        $sqlUpdate = "UPDATE gardes
                  SET nombre = :nombre,
                      bailleurs = :bailleurs,
                      benevoles = :benevoles,
                      paiement = :paiement
                  WHERE idGess = :idGess";

    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':nombre', $nombre);
    $stmtUpdate->bindParam(':bailleurs', $bailleurs);
    $stmtUpdate->bindParam(':benevoles', $benevoles);
    $stmtUpdate->bindParam(':paiement', $paiement);
    $stmtUpdate->bindParam(':idGess', $idGess);
    $stmtUpdate->execute();


}



if(isset($_POST['submit33'])){
  
  $montant_abonnement = isset($_POST['montant_abonnement']) ? intval($_POST['montant_abonnement']) : 0;
  $prix_eau_m3 = isset($_POST['prix_eau_m3']) ? intval($_POST['prix_eau_m3']) : 0;
  $tarification = isset($_POST['tarification']) ? intval($_POST['tarification']) : 0;
  $beneficiaires_a_temps = isset($_POST['beneficiaires_a_temps']) ? intval($_POST['beneficiaires_a_temps']) : 0;
  $beneficiaires_jamais = isset($_POST['beneficiaires_jamais']) ? intval($_POST['beneficiaires_jamais']) : 0;
  $beneficiaires_delai = isset($_POST['beneficiaires_delai']) ? intval($_POST['beneficiaires_delai']) : 0;
  $beneficiaires_dettes = isset($_POST['beneficiaires_dettes']) ? intval($_POST['beneficiaires_dettes']) : 0;
  $soned = isset($_POST['soned']) ? intval($_POST['soned']) : 0;
  $steg = isset($_POST['steg']) ? intval($_POST['steg']) : 0;
  $crda = isset($_POST['crda']) ? intval($_POST['crda']) : 0;
  $autre_dettes = isset($_POST['autre_dettes']) ? intval($_POST['autre_dettes']) : 0;
  $fonds = isset($_POST['fonds']) ? intval($_POST['fonds']) : 0;
  $compte_courant = isset($_POST['compte_courant']) ? intval($_POST['compte_courant']) : 0;
  $sqlUpdate = "UPDATE aspects_financiers
                  SET montant_abonnement = :montant_abonnement,
                      prix_eau_m3 = :prix_eau_m3,
                      tarification = :tarification,
                      beneficiaires_a_temps = :beneficiaires_a_temps,
                      beneficiaires_jamais = :beneficiaires_jamais,
                      beneficiaires_delai = :beneficiaires_delai,
                      beneficiaires_dettes = :beneficiaires_dettes,
                      soned = :soned,
                      steg = :steg,
                      crda = :crda,
                      autre_dettes = :autre_dettes,
                      fonds = :fonds,
                      compte_courant = :compte_courant
                  WHERE idGess = :idGess";

    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':montant_abonnement', $montant_abonnement);
    $stmtUpdate->bindParam(':prix_eau_m3', $prix_eau_m3);
    $stmtUpdate->bindParam(':tarification', $tarification);
    $stmtUpdate->bindParam(':beneficiaires_a_temps', $beneficiaires_a_temps);
    $stmtUpdate->bindParam(':beneficiaires_jamais', $beneficiaires_jamais);
    $stmtUpdate->bindParam(':beneficiaires_delai', $beneficiaires_delai);
    $stmtUpdate->bindParam(':beneficiaires_dettes', $beneficiaires_dettes);
    $stmtUpdate->bindParam(':soned', $soned);
    $stmtUpdate->bindParam(':steg', $steg);
    $stmtUpdate->bindParam(':crda', $crda);
    $stmtUpdate->bindParam(':autre_dettes', $autre_dettes);
    $stmtUpdate->bindParam(':fonds', $fonds);
    $stmtUpdate->bindParam(':compte_courant', $compte_courant);
    $stmtUpdate->bindParam(':idGess', $idGess);
    $stmtUpdate->execute();


}
if(isset($_POST['submit34'])){

  $pub_off = $_FILES['pub_off'];
  $loi_fonda = $_FILES['loi_fonda'];
  $dossier_seance = $_FILES['dossier_seance'];
  $loi_interieur = $_FILES['loi_interieur'];
  $registre = $_FILES['registre'];
  $contrat_gestion = $_FILES['contrat_gestion'];
  $registre_inscri = $_FILES['registre_inscri'];

  $fileFields = [
    'pub_off' => $pub_off,
    'loi_fonda' => $loi_fonda,
    'dossier_seance' => $dossier_seance,
    'loi_interieur' => $loi_interieur,
    'registre' => $registre,
    'contrat_gestion' => $contrat_gestion,
    'registre_inscri' => $registre_inscri,
];

foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE d_admin_juridiques
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
 
}
header("Location: ../../pages/infoaep.php?id=$idGess");
}


if(isset($_POST['submit35'])){
  $revenus_depenses = $_FILES['revenus_depenses'];
  $budget_balancement = $_FILES['budget_balancement'];
  $factures_compta = $_FILES['factures_compta'];
  $compta_generale = $_FILES['compta_generale'];
  $compte_courant = $_FILES['compte_courant'];
  $budget = $_FILES['budget'];
  $docs_support = $_FILES['docs_support'];

  $fileFields = [
    'revenus_depenses' => $revenus_depenses,
    'budget_balancement' => $budget_balancement,
    'factures_compta' => $factures_compta,
    'compta_generale' => $compta_generale,
    'compte_courant' => $compte_courant,
    'budget' => $budget,
    'docs_support' => $docs_support,
];

foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE documents_financiers
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
 
}
header("Location: ../../pages/infoaep.php?id=$idGess");


}


if(isset($_POST['submit36'])){
  $lecture_compteur = $_FILES['lecture_compteur'];
          $etude_projet = $_FILES['etude_projet'];
          $plan_reseau = $_FILES['plan_reseau'];
          $suivi_conso_facturation = $_FILES['suivi_conso_facturation'];
          $station_pompage = $_FILES['station_pompage'];
          $budget = $_POST['budget'];

          $fileFields = [
            'lecture_compteur' => $lecture_compteur,
            'etude_projet' => $etude_projet,
            'plan_reseau' => $plan_reseau,
            'suivi_conso_facturation' => $suivi_conso_facturation,
            'station_pompage' => $station_pompage,
        ];

        foreach ($fileFields as $fieldName => $fileValue) {
          if (isset($fileValue) && !empty($fileValue['name'][0])) {
              $sqlUpdate = "UPDATE documents_technique
                            SET $fieldName = :fileValue
                            WHERE idGess = :idGess";
              $x=getTabFilesName($fileValue);
              $stmtUpdate = $conn->prepare($sqlUpdate);
              $stmtUpdate->bindParam(':fileValue', $x);
              $stmtUpdate->bindParam(':idGess', $idGess);
              $stmtUpdate->execute();
          }
         
        }

        $sqlUpdate = "UPDATE documents_technique
                    SET budget = :fileValue
                    WHERE idGess = :idGess";
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $budget);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
        header("Location: ../../pages/infoaep.php?id=$idGess");



}


if(isset($_POST['submit37'])){
  $file_pompe_dosage =$_FILES['file_pompe_dosage'];
  $file_situation_appliquee = $_FILES['file_situation_appliquee'];
  $file_situation_organisee = $_FILES['file_situation_organisee'];
  $fileFields = [
    'file_pompe_dosage' => $file_pompe_dosage,
    'file_situation_appliquee' => $file_situation_appliquee,
    'file_situation_organisee' => $file_situation_organisee,
];
foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE assurer_sterilisation_eau
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
 
}

header("Location: ../../pages/infoaep.php?id=$idGess");

}


if(isset($_POST['submit38'])){
  $qualite_interventions=$_POST['qualite_interventions'];
 

  $sqlUpdate = "UPDATE gess SET
  qualite_interventions = :qualite_interventions
  WHERE idGess=:idGess" ;

$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bindParam(':qualite_interventions', $qualite_interventions);

$stmtUpdate->bindParam(':idGess', $idGess);

$stmtUpdate->execute();

header("Location: ../../pages/infoaep.php?id=$idGess");
}


if(isset($_POST['submit39'])){
  $registre_revenus_depenses_annee = $_FILES['registre_revenus_depenses_annee'];
        $budget_annee =$_FILES['budget_annee'];
        $registre_recettes_annee =$_FILES['registre_recettes_annee'];
        $factures = $_FILES['factures'];
        $fileFields = [
          'registre_revenus_depenses_annee' => $registre_revenus_depenses_annee,
          'budget_annee' => $budget_annee,
          'registre_recettes_annee' => $registre_recettes_annee,
          'factures' => $factures,
      ];
      foreach ($fileFields as $fieldName => $fileValue) {
        if (isset($fileValue) && !empty($fileValue['name'][0])) {
            $sqlUpdate = "UPDATE documents_existants
                          SET $fieldName = :fileValue
                          WHERE idGess = :idGess";
            $x=getTabFilesName($fileValue);
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':fileValue', $x);
            $stmtUpdate->bindParam(':idGess', $idGess);
            $stmtUpdate->execute();
        }
       
      }
      
      header("Location: ../../pages/infoaep.php?id=$idGess");
      
}


if(isset($_POST['submit40'])){

  $stations_pompage = $_FILES['stations_pompage'];
        $reseau_eau = $_FILES['reseau_eau'];
        $reservoirs = $_FILES['reservoirs'];
        $caracteristiques_techniques = $_FILES['caracteristiques_techniques'];
        $etudes_techniques = $_FILES['etudes_techniques'];
        $registre_pompage = $_FILES['registre_pompage'];
        $documents_suivi = $_FILES['documents_suivi'];
        $maintenance_preventive = $_FILES['maintenance_preventive'];

        $fileFields = [
          'stations_pompage' => $stations_pompage,
          'reseau_eau' => $reseau_eau,
          'reservoirs' => $reservoirs,
          'caracteristiques_techniques' => $caracteristiques_techniques,
          'etudes_techniques' => $etudes_techniques,
          'registre_pompage' => $registre_pompage,
          'documents_suivi' => $documents_suivi,
          'maintenance_preventive' => $maintenance_preventive,
      ];
      foreach ($fileFields as $fieldName => $fileValue) {
        if (isset($fileValue) && !empty($fileValue['name'][0])) {
            $sqlUpdate = "UPDATE dossier_technique
                          SET $fieldName = :fileValue
                          WHERE idGess = :idGess";
            $x=getTabFilesName($fileValue);
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':fileValue', $x);
            $stmtUpdate->bindParam(':idGess', $idGess);
            $stmtUpdate->execute();
        }
       
      }
      
      header("Location: ../../pages/infoaep.php?id=$idGess");
      



}
if(isset($_POST['submit41'])){
  
  $factures_approbations = $_FILES['factures_approbations'];
  $budgets_anuels = $_FILES['budgets_anuels'];
  $releves_compteurs = $_FILES['releves_compteurs'];
  $etat_compte_courant = $_FILES['etat_compte_courant'];
  $justificatifs_depenses = $_FILES['justificatifs_depenses'];
  $cartes_adhesion = $_FILES['cartes_adhesion'];
  $recevabilites_livraison = $_FILES['recevabilites_livraison'];
  $fichier_abonnements = $_FILES['fichier_abonnements'];
  $rapports_controle_comptable = $_FILES['rapports_controle_comptable'];
  $rapports_periodiques = $_FILES['rapports_periodiques'];
  $comptabilite = $_FILES['comptabilite'];
  $rapports_financiers = $_FILES['rapports_financiers'];
  $dettes_fournisseurs = $_FILES['dettes_fournisseurs'];
  $dettes_association = $_FILES['dettes_association'];

  $fileFields = [
    'factures_approbations' => $factures_approbations,
    'budgets_anuels' => $budgets_anuels,
    'releves_compteurs' => $releves_compteurs,
    'etat_compte_courant' => $etat_compte_courant,
    'justificatifs_depenses' => $justificatifs_depenses,
    'cartes_adhesion' => $cartes_adhesion,
    'recevabilites_livraison' => $recevabilites_livraison,
    'fichier_abonnements' => $fichier_abonnements,
    'rapports_controle_comptable' => $rapports_controle_comptable,
    'rapports_periodiques' => $rapports_periodiques,
    'comptabilite' => $comptabilite,
    'rapports_financiers' => $rapports_financiers,
    'dettes_fournisseurs' => $dettes_fournisseurs,
    'dettes_association' => $dettes_association,
];

foreach ($fileFields as $fieldName => $fileValue) {
  if (isset($fileValue) && !empty($fileValue['name'][0])) {
      $sqlUpdate = "UPDATE dossier_financier
                    SET $fieldName = :fileValue
                    WHERE idGess = :idGess";
      $x=getTabFilesName($fileValue);
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->bindParam(':fileValue', $x);
      $stmtUpdate->bindParam(':idGess', $idGess);
      $stmtUpdate->execute();
  }
 
}

header("Location: ../../pages/infoaep.php?id=$idGess");




}

?>