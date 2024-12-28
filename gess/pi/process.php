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
      while (file_exists("documents/" . $newFilename)) {
          $filenameParts = pathinfo($originalFilename);
          $newFilename = $filenameParts['filename'] . "_$counter." . $filenameParts['extension'];
          $counter++;
      }

      move_uploaded_file($tmpFilePath, "documents/" . $newFilename);

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

   



if(isset($_POST['submit'])) {

    // add new aep
    $nom=$_POST['nom'];
    $etat_tunisie=$_POST['etat_tunisie'];
    $accreditation=$_POST['accreditation'];
    $decanat=$_POST['decanat'];
    $date_creation=$_POST['date_creation'];
    $date_debut=$_POST['date_debut']; 
    $type="منطقة سقوية";

    $sql = "INSERT INTO gess (type,nom, etat_tunisie,accreditation,decanat, date_creation, date_debut)
    VALUES (:type,:nom, :etat_tunisie, :accreditation,:decanat, :date_creation, :date_debut)";
     

     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':type', $type);
     $stmt->bindParam(':nom', $nom);
     $stmt->bindParam(':etat_tunisie', $etat_tunisie);
     $stmt->bindParam(':accreditation', $accreditation);
     $stmt->bindParam(':decanat', $decanat);
     $stmt->bindParam(':date_creation', $date_creation);
     $stmt->bindParam(':date_debut', $date_debut);
     $stmt->execute();
    $lastInsertIdPi = $conn->lastInsertId();

    if($lastInsertIdPi)
    {

          // utilisateurs 
          $role_utilisateur =$_POST['roleU'];
          $nom_utilisateur = $_POST['nom_utilisateur'];
          $email_utilisateur = $_POST['email_utilisateur'];
          $tel_utilisateur = $_POST['tel_utilisateur'];
          
          $sql2 = "INSERT INTO utilisateurs (role_utilisateur, nom_utilisateur, email_utilisateur, tel_utilisateur, idGess)
                  VALUES (:role_utilisateur, :nom_utilisateur, :email_utilisateur, :tel_utilisateur, :idGess)";
          
          $stmt = $conn->prepare($sql2);
          $stmt->bindParam(':role_utilisateur', $role_utilisateur);
          $stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
          $stmt->bindParam(':email_utilisateur', strtolower($email_utilisateur));
          $stmt->bindParam(':tel_utilisateur', $tel_utilisateur);
          $stmt->bindParam(':idGess', $lastInsertIdPi);
          
          $stmt->execute();

          // مجلس ادارة المجمع


          $conseil_administration = $_POST['conseil_administration1'];
          $seance_generale =getTabFilesName($_FILES['seance_generale']);
          $date_prevue = $_POST['date_prevue'];
          $derniere_seance = $_POST['derniere_seance'];
          $pourcentage = $_POST['pourcentage'];
          $quorum_derniere_seance =getTabFilesName($_FILES['quorum_derniere_seance']);
      
          $sql3 = "INSERT INTO pi_conseil_administration (conseil_administration,seance_generale, date_prevue, derniere_seance, pourcentage, quorum_derniere_seance, idGess)
                  VALUES (:conseil_administration, :seance_generale, :date_prevue, :derniere_seance, :pourcentage, :quorum_derniere_seance, :idGess)";
      
          $stmt = $conn->prepare($sql3);
          $stmt->bindParam(':conseil_administration', $conseil_administration);
          $stmt->bindParam(':seance_generale', $seance_generale);
          $stmt->bindParam(':date_prevue', $date_prevue);
          $stmt->bindParam(':derniere_seance', $derniere_seance);
          $stmt->bindParam(':pourcentage', $pourcentage);
          $stmt->bindParam(':quorum_derniere_seance', $quorum_derniere_seance);
          $stmt->bindParam(':idGess', $lastInsertIdPi); 
      
          $stmt->execute();

        
       // الفلاحين


         $nombre_fermiers = isset($_POST['nombre_fermiers']) ? intval($_POST['nombre_fermiers']) : 0;
        $nombre_contrats = isset($_POST['nombre_contrats']) ? intval($_POST['nombre_contrats']) : 0;
        $f_contrat = getTabFilesName($_FILES['f_contrat']);
        $presence_liste = getTabFilesName($_FILES['presence_liste']);
        $mise_a_jour = getTabFilesName($_FILES['mise_a_jour']);
        $nombre_membres = isset($_POST['nombre_membres']) ? intval($_POST['nombre_membres']) : 0;
        $montant_adhesion = isset($_POST['montant_adhesion']) ? intval($_POST['montant_adhesion']) : 0;
        $presence_registre =getTabFilesName( $_FILES['presence_registre']);

        $sql4 = "INSERT INTO pi_paysans (nombre_fermiers, nombre_contrats, presence_liste, mise_a_jour, nombre_membres, montant_adhesion, presence_registre,idGess,f_contrat)
                VALUES (:nombre_fermiers, :nombre_contrats, :presence_liste, :mise_a_jour, :nombre_membres, :montant_adhesion, :presence_registre,:idGess,:f_contrat)";

        $stmt = $conn->prepare($sql4);
        $stmt->bindParam(':idGess', $lastInsertIdPi); 
        $stmt->bindParam(':nombre_fermiers', $nombre_fermiers);
        $stmt->bindParam(':nombre_contrats', $nombre_contrats);
        $stmt->bindParam(':presence_liste', $presence_liste);
        $stmt->bindParam(':mise_a_jour', $mise_a_jour);
        $stmt->bindParam(':nombre_membres', $nombre_membres);
        $stmt->bindParam(':montant_adhesion', $montant_adhesion);
        $stmt->bindParam(':presence_registre', $presence_registre);
        $stmt->bindParam(':f_contrat', $f_contrat);

        $stmt->execute();

        

         if (isset($_POST['nom_prenom']) && is_array($_POST['nom_prenom'])){
             
             
              //معطيات حول اعضاء المجلس

        $role = $_POST['role'];
        $nom_prenom = $_POST['nom_prenom'];
        $age = $_POST['age'];
        $niveau_education = $_POST['niveau_education'] ;
        $anciennete = $_POST['anciennete'];
        $num_tel = $_POST['num_tel'];
        $cp_cin = $_FILES['cp_cin'];
        

          
     
            for ($i = 0; $i < count($role); $i++)
          {
            $sql = "INSERT INTO membre_conseil (role, nom_prenom, age, niveau_education, anciennete, num_tel, idGess,cp_cin)
            VALUES (:role, :nom_prenom, :age, :niveau_education, :anciennete, :num_tel, :idGess,:cp_cin)";
             $ran= rand(1, 500);
        $destinationPath = 'documents/';
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
            $stmt->bindParam(':idGess', $lastInsertIdPi);
            $stmt->bindParam(':cp_cin',  $cp_cin2v);
            
            if ($stmt->execute()) {
                
            } else {
                // Insertion failed, handle the error
                echo "Error: " . $stmt->errorInfo()[2]; // Display the SQL error message
            }

          }
         }
        
          
          if (isset($_POST['nom_prenom1']) && is_array($_POST['nom_prenom1'])){
                // معطيات حول هيئة المراقبة الداخلية

            $role1 = $_POST['role1'];
            $nom_prenom1 = $_POST['nom_prenom1'];
            $age1 =$_POST['age1'];
            $niveau_education1 = $_POST['niveau_education1'];
            $anciennete1 = $_POST['anciennete1'];
            $num_tel1 = $_POST['num_tel1'];
    
              
      
            for ($i = 0; $i < count($role1); $i++)
          {
            $sql1 = "INSERT INTO controle_interne (role, nom_prenom, age, niveau_education, anciennete, num_tel, idGess)
            VALUES (:role, :nom_prenom, :age, :niveau_education, :anciennete, :num_tel, :idGess)";
             if ($age1[$i] === '') {
                
                $age1[$i] = 0;
            } elseif (is_numeric($age1[$i])) {
                $age1[$i] = (int)$age1[$i];
            }
             if ($num_tel1[$i] === '') {
                
                $num_tel1[$i] = 0;
            } elseif (is_numeric($num_tel1[$i])) {
                $num_tel1[$i] = (int)$num_tel1[$i];
            }
            
            

            $stmt = $conn->prepare($sql1);
            $stmt->bindParam(':role', $role1[$i]);
            $stmt->bindParam(':nom_prenom', $nom_prenom1[$i]);
            $stmt->bindParam(':age', $age1[$i]);
            $stmt->bindParam(':niveau_education', $niveau_education1[$i]);
            $stmt->bindParam(':anciennete', $anciennete1[$i]);
            $stmt->bindParam(':num_tel', $num_tel1[$i]);
            $stmt->bindParam(':idGess', $lastInsertIdPi);
            
            $stmt->execute();
          }
        
          }


     // اجتماعات مجلس الادارة

    
    $nombre_reunions_annee_precedente = isset($_POST['$nombre_reunions_annee_precedente']) ? intval($_POST['$nombre_reunions_annee_precedente']) : 0;
    $presence_proces_verbaux = getTabFilesName($_FILES['presence_proces_verbaux']);
    $moyenne_presence_reunions =  getTabFilesName($_FILES['moyenne_presence_reunions']);
    $absences_membres_justifiees =  getTabFilesName($_FILES['absences_membres_justifiees']);
    $periodicite_reunions =  getTabFilesName($_FILES['periodicite_reunions']);
    $presentation_problemes_internes = $_POST['$presentation_problemes_internes'];
    
    $sql6 = "INSERT INTO pi_reunions_conseil_administration (idGess, nombre_reunions_annee_precedente, presence_proces_verbaux, moyenne_presence_reunions, absences_membres_justifiees, periodicite_reunions, presentation_problemes_internes)
            VALUES (:idGess, :nombre_reunions_annee_precedente, :presence_proces_verbaux, :moyenne_presence_reunions, :absences_membres_justifiees, :periodicite_reunions, :presentation_problemes_internes)";
    
    $stmt = $conn->prepare($sql6);
    $stmt->bindParam(':idGess', $lastInsertIdPi);
    $stmt->bindParam(':nombre_reunions_annee_precedente', $nombre_reunions_annee_precedente);
    $stmt->bindParam(':presence_proces_verbaux', $presence_proces_verbaux);
    $stmt->bindParam(':moyenne_presence_reunions', $moyenne_presence_reunions);
    $stmt->bindParam(':absences_membres_justifiees', $absences_membres_justifiees);
    $stmt->bindParam(':periodicite_reunions', $periodicite_reunions);
    $stmt->bindParam(':presentation_problemes_internes', $presentation_problemes_internes);
    
    $stmt->execute();

  if (isset($_POST['nom_prenom2']) && is_array($_POST['nom_prenom2'])){
      
        // معلومات حول أعوان المجمع

       
   
    $contrat_travail2=$_FILES['contrat_travail2'];
    $securite_sociale2=$_FILES['securite_sociale2'];
       $niveau_education2 = $_POST['niveau_education2'];
    $agents_executifs2 = $_POST['agents_executifs2'];
    $nom_prenom2 = $_POST['nom_prenom2'];
    $age2 = $_POST['age2'];
    $salaire2 = $_POST['salaire2'];
     $numero_telephone2 = $_POST['numero_telephone2'];

    

      for ($j = 0; $j < count($agents_executifs2);$j++)
    {
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
        $destinationPath = 'documents/';
        if (empty($contrat_travail2['name'][$j])) {
        $contrat_travail2v = null;
        } else {
          $contrat_travail2v =$ran. $contrat_travail2['name'][$j];
        }
        if (empty($securite_sociale2['name'][$j])) {
        $securite_sociale2v = null;
        } else {
          $securite_sociale2v = $ran.$securite_sociale2['name'][$j];
        }
        move_uploaded_file($contrat_travail2['tmp_name'][$j], $destinationPath. $contrat_travail2v);
        move_uploaded_file($securite_sociale2['tmp_name'][$j], $destinationPath.$securite_sociale2v);
      

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':agents_executifs2', $agents_executifs2[$j]);
      $stmt->bindParam(':niveau_education2', $niveau_education2[$j]);
      $stmt->bindParam(':nom_prenom2', $nom_prenom2[$j]);
      $stmt->bindParam(':age2', $age2[$j]);
      $stmt->bindParam(':salaire2', $salaire2[$j]);
      $stmt->bindParam(':contrat_travail2', $contrat_travail2v);
      $stmt->bindParam(':securite_sociale2', $securite_sociale2v);
      $stmt->bindParam(':numero_telephone2', $numero_telephone2[$j]);
      $stmt->bindParam(':idGess', $lastInsertIdPi);
      
      $stmt->execute();
  
 }
  }

  // التكوين و التأطير
        
        

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

        $sql99 = "INSERT INTO pi_formation_tutorat (
        idGess, 
        conseil_administration_president_motifs_formation,
        conseil_administration_president_nombre_formations,
        conseil_administration_president_nombre_encadrements,
        conseil_administration_tresorier_motifs_formation,
        conseil_administration_tresorier_nombre_formations,
        conseil_administration_tresorier_nombre_encadrements,
        conseil_administration_membre_motifs_formation,
        conseil_administration_membre_nombre_formations,
        conseil_administration_membre_nombre_encadrements,
        controleurs_internes_controleur1_motifs_formation,
        controleurs_internes_controleur1_nombre_formations,
        controleurs_internes_controleur1_nombre_encadrements,
        controleurs_internes_controleur2_motifs_formation,
        controleurs_internes_controleur2_nombre_formations,
        controleurs_internes_controleur2_nombre_encadrements,
        agents_magasin_directeur_technique_motifs_formation,
        agents_magasin_directeur_technique_nombre_formations,
        agents_magasin_directeur_technique_nombre_encadrements,
        agents_magasin_garde_systeme_hydro_motifs_formation,
        agents_magasin_garde_systeme_hydro_nombre_formations,
        agents_magasin_garde_systeme_hydro_nombre_encadrements,
        agents_magasin_garde_systeme_eau_motifs_formation,
        agents_magasin_garde_systeme_eau_nombre_formations,
        agents_magasin_garde_systeme_eau_nombre_encadrements,
        agents_magasin_distributeur_motifs_formation,
        agents_magasin_distributeur_nombre_formations,
        agents_magasin_distributeur_nombre_encadrements
      ) VALUES (
        :idGess, 
        :conseil_administration_president_motifs_formation,
        :conseil_administration_president_nombre_formations,
        :conseil_administration_president_nombre_encadrements,
        :conseil_administration_tresorier_motifs_formation,
        :conseil_administration_tresorier_nombre_formations,
        :conseil_administration_tresorier_nombre_encadrements,
        :conseil_administration_membre_motifs_formation,
        :conseil_administration_membre_nombre_formations,
        :conseil_administration_membre_nombre_encadrements,
        :controleurs_internes_controleur1_motifs_formation,
        :controleurs_internes_controleur1_nombre_formations,
        :controleurs_internes_controleur1_nombre_encadrements,
        :controleurs_internes_controleur2_motifs_formation,
        :controleurs_internes_controleur2_nombre_formations,
        :controleurs_internes_controleur2_nombre_encadrements,
        :agents_magasin_directeur_technique_motifs_formation,
        :agents_magasin_directeur_technique_nombre_formations,
        :agents_magasin_directeur_technique_nombre_encadrements,
        :agents_magasin_garde_systeme_hydro_motifs_formation,
        :agents_magasin_garde_systeme_hydro_nombre_formations,
        :agents_magasin_garde_systeme_hydro_nombre_encadrements,
        :agents_magasin_garde_systeme_eau_motifs_formation,
        :agents_magasin_garde_systeme_eau_nombre_formations,
        :agents_magasin_garde_systeme_eau_nombre_encadrements,
        :agents_magasin_distributeur_motifs_formation,
        :agents_magasin_distributeur_nombre_formations,
        :agents_magasin_distributeur_nombre_encadrements
      )";

      $stmt = $conn->prepare($sql99);

      $stmt->bindParam(':idGess', $lastInsertIdPi);
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
        
       
  


   // معطيات حول نقاط التوزيع


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
      $document_suivi_distribution = getTabFilesName($_FILES['document_suivi_distribution']);
      $mise_a_jour_documents = getTabFilesName($_FILES['mise_a_jour_documents']);
      $engagement_2 = getTabFilesName($_FILES['engagement_2']);
   

      
      $sql = "INSERT INTO pi_donnees_points_distribution (idGess, surface_totale, surface_hors_zone, nombre_sans_compteur, engagement_2, nombre_compteurs, nombre_compteurs_desactives, nombre_compteurs_non_autorises, nombre_compteurs_conformes_specifications, nombre_fournisseurs_citernes, distribution_eau_selon, document_suivi_distribution, mise_a_jour_documents, observations)
      VALUES (:idGess, :surface_totale, :surface_hors_zone, :nombre_sans_compteur, :engagement_2, :nombre_compteurs, :nombre_compteurs_desactives, :nombre_compteurs_non_autorises, :nombre_compteurs_conformes_specifications, :nombre_fournisseurs_citernes, :distribution_eau_selon, :document_suivi_distribution, :mise_a_jour_documents, :observations)";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':idGess', $lastInsertIdPi);
      $stmt->bindParam(':surface_totale', $surface_totale);
      $stmt->bindParam(':surface_hors_zone', $surface_hors_zone);
      $stmt->bindParam(':nombre_sans_compteur', $nombre_sans_compteur);
      $stmt->bindParam(':engagement_2', $engagement_2);
      $stmt->bindParam(':nombre_compteurs', $nombre_compteurs);
      $stmt->bindParam(':nombre_compteurs_desactives', $nombre_compteurs_desactives);
      $stmt->bindParam(':nombre_compteurs_non_autorises', $nombre_compteurs_non_autorises);
      $stmt->bindParam(':nombre_compteurs_conformes_specifications', $nombre_compteurs_conformes_specifications);
      $stmt->bindParam(':nombre_fournisseurs_citernes', $nombre_fournisseurs_citernes);
      $stmt->bindParam(':distribution_eau_selon', $distribution_eau_selon);
      $stmt->bindParam(':document_suivi_distribution', $document_suivi_distribution);
      $stmt->bindParam(':mise_a_jour_documents', $mise_a_jour_documents);
      $stmt->bindParam(':observations', $observations);

      $stmt->execute();



      // الغراسات الموجودة


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
$arbres_fruitiers = isset($_POST['arbres_fruitiers']) ? intval($_POST['arbres_fruitiers']) : "";
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
if (isset($_POST["arbres_fruitiers"])) {
       $arbres_fruitiers1 = $_POST["arbres_fruitiers"];

        $arbres_fruitiers = implode(",", $arbres_fruitiers1);
        
}

      $sql = "INSERT INTO pi_plantes_presentes (idGess, cultures_grandes_surface_hectares, cultures_grandes_surface_goutte_goutte, cultures_grandes_surface_arrosage, cultures_grandes_surface_irrigation_traditionnelle, fourrages_surface_hectares, fourrages_surface_goutte_goutte, fourrages_surface_arrosage, fourrages_surface_irrigation_traditionnelle, legumes_surface_hectares, legumes_surface_goutte_goutte, legumes_surface_arrosage, legumes_surface_irrigation_traditionnelle, arbres_fruitiers, arbres_fruitiers_surface_hectares, arbres_fruitiers_surface_goutte_goutte, arbres_fruitiers_surface_arrosage, arbres_fruitiers_surface_irrigation_traditionnelle, oliviers_surface_hectares, oliviers_surface_goutte_goutte, oliviers_surface_arrosage, oliviers_surface_irrigation_traditionnelle, autres_arbres_type, autres_arbres_surface_hectares, autres_arbres_surface_goutte_goutte, autres_arbres_surface_arrosage, autres_arbres_surface_irrigation_traditionnelle, legumineuses_surface_hectares, legumineuses_surface_goutte_goutte, legumineuses_surface_arrosage, legumineuses_surface_irrigation_traditionnelle, total)
      VALUES (:idGess, :cultures_grandes_surface_hectares, :cultures_grandes_surface_goutte_goutte, :cultures_grandes_surface_arrosage, :cultures_grandes_surface_irrigation_traditionnelle, :fourrages_surface_hectares, :fourrages_surface_goutte_goutte, :fourrages_surface_arrosage, :fourrages_surface_irrigation_traditionnelle, :legumes_surface_hectares, :legumes_surface_goutte_goutte, :legumes_surface_arrosage, :legumes_surface_irrigation_traditionnelle, :arbres_fruitiers, :arbres_fruitiers_surface_hectares, :arbres_fruitiers_surface_goutte_goutte, :arbres_fruitiers_surface_arrosage, :arbres_fruitiers_surface_irrigation_traditionnelle, :oliviers_surface_hectares, :oliviers_surface_goutte_goutte, :oliviers_surface_arrosage, :oliviers_surface_irrigation_traditionnelle, :autres_arbres_type, :autres_arbres_surface_hectares, :autres_arbres_surface_goutte_goutte, :autres_arbres_surface_arrosage, :autres_arbres_surface_irrigation_traditionnelle, :legumineuses_surface_hectares, :legumineuses_surface_goutte_goutte, :legumineuses_surface_arrosage, :legumineuses_surface_irrigation_traditionnelle, :total)";

      $stmt = $conn->prepare($sql);

      
      $stmt->bindParam(':idGess', $lastInsertIdPi);
      $stmt->bindParam(':cultures_grandes_surface_hectares', $cultures_grandes_surface_hectares);
      $stmt->bindParam(':cultures_grandes_surface_goutte_goutte', $cultures_grandes_surface_goutte_goutte);
      $stmt->bindParam(':cultures_grandes_surface_arrosage', $cultures_grandes_surface_arrosage);
      $stmt->bindParam(':cultures_grandes_surface_irrigation_traditionnelle', $cultures_grandes_surface_irrigation_traditionnelle);
      $stmt->bindParam(':fourrages_surface_hectares', $fourrages_surface_hectares);
      $stmt->bindParam(':fourrages_surface_goutte_goutte', $fourrages_surface_goutte_goutte);
      $stmt->bindParam(':fourrages_surface_arrosage', $fourrages_surface_arrosage);
      $stmt->bindParam(':fourrages_surface_irrigation_traditionnelle', $fourrages_surface_irrigation_traditionnelle);
      $stmt->bindParam(':legumes_surface_hectares', $legumes_surface_hectares);
      $stmt->bindParam(':legumes_surface_goutte_goutte', $legumes_surface_goutte_goutte);
      $stmt->bindParam(':legumes_surface_arrosage', $legumes_surface_arrosage);
      $stmt->bindParam(':legumes_surface_irrigation_traditionnelle', $legumes_surface_irrigation_traditionnelle);
      $stmt->bindParam(':arbres_fruitiers', $arbres_fruitiers);
      $stmt->bindParam(':arbres_fruitiers_surface_hectares', $arbres_fruitiers_surface_hectares);
      $stmt->bindParam(':arbres_fruitiers_surface_goutte_goutte', $arbres_fruitiers_surface_goutte_goutte);
      $stmt->bindParam(':arbres_fruitiers_surface_arrosage', $arbres_fruitiers_surface_arrosage);
      $stmt->bindParam(':arbres_fruitiers_surface_irrigation_traditionnelle', $arbres_fruitiers_surface_irrigation_traditionnelle);
      $stmt->bindParam(':oliviers_surface_hectares', $oliviers_surface_hectares);
      $stmt->bindParam(':oliviers_surface_goutte_goutte', $oliviers_surface_goutte_goutte);
      $stmt->bindParam(':oliviers_surface_arrosage', $oliviers_surface_arrosage);
      $stmt->bindParam(':oliviers_surface_irrigation_traditionnelle', $oliviers_surface_irrigation_traditionnelle);
      $stmt->bindParam(':autres_arbres_type', $autres_arbres_type);
      $stmt->bindParam(':autres_arbres_surface_hectares', $autres_arbres_surface_hectares);
      $stmt->bindParam(':autres_arbres_surface_goutte_goutte', $autres_arbres_surface_goutte_goutte);
      $stmt->bindParam(':autres_arbres_surface_arrosage', $autres_arbres_surface_arrosage);
      $stmt->bindParam(':autres_arbres_surface_irrigation_traditionnelle', $autres_arbres_surface_irrigation_traditionnelle);
      $stmt->bindParam(':legumineuses_surface_hectares', $legumineuses_surface_hectares);
      $stmt->bindParam(':legumineuses_surface_goutte_goutte', $legumineuses_surface_goutte_goutte);
      $stmt->bindParam(':legumineuses_surface_arrosage', $legumineuses_surface_arrosage);
      $stmt->bindParam(':legumineuses_surface_irrigation_traditionnelle', $legumineuses_surface_irrigation_traditionnelle);
      $stmt->bindParam(':total', $total);

      
      $stmt->execute();


      // الجوانب المالية

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
     

      $sql10 = "INSERT INTO pi_aspects_financiers (
          idGess, 
          vente_eau_par_heure, 
          tarif_par_heure, 
          vente_eau_par_metre_cube, 
          tarif_par_metre_cube, 
          paiement, 
          methode_fixation_tarif_eau, 
          vente_a_credit, 
          montant_a_credit, 
          retard_paiement, 
          dettes_agriculteurs, 
          dettes_fournisseurs, 
          dettes_steg, 
          dettes_crda, 
          autres_dettes, 
          description_dettes, 
          caisse, 
          compte_courant
      ) VALUES (
          :idGess, 
          :vente_eau_par_heure, 
          :tarif_par_heure, 
          :vente_eau_par_metre_cube, 
          :tarif_par_metre_cube, 
          :paiement, 
          :methode_fixation_tarif_eau, 
          :vente_a_credit, 
          :montant_a_credit, 
          :retard_paiement, 
          :dettes_agriculteurs, 
          :dettes_fournisseurs, 
          :dettes_steg, 
          :dettes_crda, 
          :autres_dettes, 
          :description_dettes, 
          :caisse, 
          :compte_courant
      )";

      $stmt = $conn->prepare($sql10);

      $stmt->bindParam(':idGess', $lastInsertIdPi);
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


        // متابعة ضخ و توزيع المياه

    $quantite_eau_pompee = isset($_POST['quantite_eau_pompee']) ? intval($_POST['quantite_eau_pompee']) : 0;
    $quantite_eau_distribuee = isset($_POST['quantite_eau_distribuee']) ? intval($_POST['quantite_eau_distribuee']) : 0;

    

     if($quantite_eau_pompee>0){
      $taux_perte = (($quantite_eau_pompee - $quantite_eau_distribuee) / $quantite_eau_pompee) * 100;
      $taux_perte = number_format($taux_perte, 2);

     }
     else{
      $taux_perte=0;
     }

     $sql12 = "INSERT INTO pi_suivi_pompage_distribution_eau (
         idGess, 
         quantite_eau_pompee, 
         quantite_eau_distribuee, 
         taux_perte
     ) VALUES (
         :idGess, 
         :quantite_eau_pompee, 
         :quantite_eau_distribuee, 
         :taux_perte
     )";

     $stmt = $conn->prepare($sql12);

     $stmt->bindParam(':idGess', $lastInsertIdPi);
     $stmt->bindParam(':quantite_eau_pompee', $quantite_eau_pompee);
     $stmt->bindParam(':quantite_eau_distribuee', $quantite_eau_distribuee);
     $stmt->bindParam(':taux_perte', $taux_perte);

     $stmt->execute();



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


        $sql = "INSERT INTO pi_logistique_mojamaa (
            idGess, 
            local, 
            bureau, 
            chaises, 
            armoire, 
            panneau_publicitaire, 
            ordinateur, 
            telephone, 
            fax, 
            imprimante, 
            velo
        ) VALUES (
            :idGess, 
            :local, 
            :bureau, 
            :chaises, 
            :armoire, 
            :panneau_publicitaire, 
            :ordinateur, 
            :telephone, 
            :fax, 
            :imprimante, 
            :velo
        )";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':idGess', $lastInsertIdPi);
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


          // الوثائق الادارية


      

    
  


              
   if (isset($_POST['role_de']) && is_array($_POST['role_de'])){
        $role_de = $_POST['role_de'];
    $cin_de = $_FILES['cin_de'];
    $attestation_de = $_FILES['attestation_de'];
    $exigence_de = $_FILES['exigence_de'];
       
        for ($i = 0; $i < count($role_de); $i++)
    {
      $sql = "INSERT INTO documents_employee (role_de, cin_de, attestation_de, exigence_de,idGess)
      VALUES (:role_de, :cin_de, :attestation_de, :exigence_de,:idGess)";
      $ran= rand(1, 500);
       $destinationPath = 'documents/';
       if (empty($cin_de['name'][$i])) {
        $cin_dev = null;
      } else {
          $cin_dev =$ran. $cin_de['name'][$i];
      }
      if (empty($attestation_de['name'][$i])) {
        $attestation_dev = null;
      } else {
          $attestation_dev = $ran.$attestation_de['name'][$i];
      }
      if (empty($exigence_de['name'][$i])) {
        $exigence_dev = null;
      } else {
          $exigence_dev = $ran.$exigence_de['name'][$i];
      } 
       move_uploaded_file($cin_de['tmp_name'][$i], $destinationPath. $cin_dev);
       move_uploaded_file($attestation_de['tmp_name'][$i], $destinationPath.$attestation_dev);
       move_uploaded_file($exigence_de['tmp_name'][$i], $destinationPath.$exigence_dev);

        

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idGess', $lastInsertIdPi);
        $stmt->bindParam(':role_de', $role_de[$i]);
        $stmt->bindParam(':cin_de', $cin_dev);
        $stmt->bindParam(':attestation_de',$attestation_dev);
        $stmt->bindParam(':exigence_de', $exigence_dev);

        $stmt->execute();

    }
   }


        $exportations = getTabFilesName($_FILES['exportations']);
        $importations = getTabFilesName($_FILES['importations']);
        $rapports = getTabFilesName($_FILES['rapports']);
        $listes_presence = getTabFilesName($_FILES['listes_presence']);
        $comptes_rendus = getTabFilesName($_FILES['comptes_rendus']);
        $listes = getTabFilesName($_FILES['listes']);
        $registre_comptes_rendus_seances = getTabFilesName($_FILES['registre_comptes_rendus_seances']);
        $convocations = getTabFilesName($_FILES['convocations']);
        $programme_collaboratif = getTabFilesName($_FILES['programme_collaboratif']);
        $registre_adhesions = getTabFilesName($_FILES['registre_adhesions']);
        $listes_mises_a_jour = getTabFilesName($_FILES['listes_mises_a_jour']);
        $demandes_raccordement_reseau = getTabFilesName($_FILES['demandes_raccordement_reseau']);
        $engagements = getTabFilesName($_FILES['engagements']);
        $delegations = getTabFilesName($_FILES['delegations']);
        $conseil_administration = getTabFilesName($_FILES['conseil_administration']);
        $inventaire_biens_collectifs = getTabFilesName($_FILES['inventaire_biens_collectifs']);
        $dossier_revendications_economie_eau = getTabFilesName($_FILES['dossier_revendications_economie_eau']);
        $donnees_statistiques_activite_collectif = getTabFilesName($_FILES['donnees_statistiques_activite_collectif']);
        $cahiers_visites = getTabFilesName($_FILES['cahiers_visites']);


        $sql12 = "INSERT INTO documents_administratifs (idGess,exportations, importations, rapports,
        listes_presence, comptes_rendus, listes, registre_comptes_rendus_seances, convocations, 
        programme_collaboratif, registre_adhesions, listes_mises_a_jour, demandes_raccordement_reseau,
          engagements, delegations, conseil_administration, inventaire_biens_collectifs, dossier_revendications_economie_eau, 
          donnees_statistiques_activite_collectif, cahiers_visites)
          VALUES (:idGess,:exportations, :importations, :rapports, :listes_presence, :comptes_rendus, :listes, :registre_comptes_rendus_seances, 
          :convocations, :programme_collaboratif, :registre_adhesions, :listes_mises_a_jour, :demandes_raccordement_reseau, :engagements,
          :delegations, :conseil_administration, :inventaire_biens_collectifs, :dossier_revendications_economie_eau, 
          :donnees_statistiques_activite_collectif, :cahiers_visites)";

        $stmt = $conn->prepare($sql12);

        $stmt->bindParam(':idGess', $lastInsertIdPi);
        $stmt->bindParam(':exportations',  $exportations);
        $stmt->bindParam(':importations',  $importations);
        $stmt->bindParam(':rapports',  $rapports);
        $stmt->bindParam(':listes_presence',  $listes_presence);
        $stmt->bindParam(':comptes_rendus',  $comptes_rendus);
        $stmt->bindParam(':listes',  $listes);
        $stmt->bindParam(':registre_comptes_rendus_seances',  $registre_comptes_rendus_seances);
        $stmt->bindParam(':convocations',  $convocations);
        $stmt->bindParam(':programme_collaboratif',  $programme_collaboratif);
        $stmt->bindParam(':registre_adhesions',  $registre_adhesions);
        $stmt->bindParam(':listes_mises_a_jour',  $listes_mises_a_jour);
        $stmt->bindParam(':demandes_raccordement_reseau',  $demandes_raccordement_reseau);
        $stmt->bindParam(':engagements',  $engagements);
        $stmt->bindParam(':delegations',  $delegations);
        $stmt->bindParam(':conseil_administration',  $conseil_administration);
        $stmt->bindParam(':inventaire_biens_collectifs',  $inventaire_biens_collectifs);
        $stmt->bindParam(':dossier_revendications_economie_eau',  $dossier_revendications_economie_eau);
        $stmt->bindParam(':donnees_statistiques_activite_collectif',  $donnees_statistiques_activite_collectif);
        $stmt->bindParam(':cahiers_visites',  $cahiers_visites);

        $stmt->execute();

               
        // الملف القانوني

        $publication_journal_officiel = getTabFilesName($_FILES['publication_journal_officiel']);
        $rapports1 =getTabFilesName( $_FILES['rapports1']);
        $statuts_fondamentaux = getTabFilesName ($_FILES['statuts_fondamentaux']);
        $reglement_interieur = getTabFilesName($_FILES['reglement_interieur']);
        $contrats_utilisation_eau = getTabFilesName ($_FILES['contrats_utilisation_eau']);
        $electricite =getTabFilesName( $_FILES['electricite']);
        $eau = getTabFilesName ($_FILES['eau']);
        $contrats_manutention = getTabFilesName($_FILES['contrats_manutention']);
        $contrat_gestion_systeme_hydrique = getTabFilesName($_FILES['contrat_gestion_systeme_hydrique']);
        $contrats =getTabFilesName( $_FILES['contrats']);
        $dossier_mandat = getTabFilesName ($_FILES['dossier_mandat']);
        $cartes_versement_salaires = getTabFilesName($_FILES['cartes_versement_salaires']);
        $proces_verbaux_mandatement_determination_salaires =getTabFilesName( $_FILES['proces_verbaux_mandatement_determination_salaires']);
        $dossier_etat_civil_agents = getTabFilesName ($_FILES['dossier_etat_civil_agents']);
        $certificat_inscription = getTabFilesName($_FILES['certificat_inscription']);
        $autorisations_periodiques =getTabFilesName( $_FILES['autorisations_periodiques']);
        $recus_paiement = getTabFilesName ($_FILES['recus_paiement']);
        $carte_identite_fiscale = getTabFilesName($_FILES['carte_identite_fiscale']);
        $autorisations_periodiques1 =getTabFilesName( $_FILES['1_autorisations_periodiques']);
        $recus_paiement1 = getTabFilesName ($_FILES['1_recus_paiement']);

        $sql77 = "INSERT INTO dossier_juridique (
          idGess,
          publication_journal_officiel,
          rapports1,
          statuts_fondamentaux,
          reglement_interieur,
          contrats_utilisation_eau,
          electricite,
          eau,
          contrats_manutention,
          contrat_gestion_systeme_hydrique,
          contrats,
          dossier_mandat,
          cartes_versement_salaires,
          proces_verbaux_mandatement_determination_salaires,
          dossier_etat_civil_agents,
          certificat_inscription,
          autorisations_periodiques,
          recus_paiement,
          carte_identite_fiscale,
          1_autorisations_periodiques,
          1_recus_paiement
      ) VALUES (
          :idGess,
          :publication_journal_officiel,
          :rapports1,
          :statuts_fondamentaux,
          :reglement_interieur,
          :contrats_utilisation_eau,
          :electricite,
          :eau,
          :contrats_manutention,
          :contrat_gestion_systeme_hydrique,
          :contrats,
          :dossier_mandat,
          :cartes_versement_salaires,
          :proces_verbaux_mandatement_determination_salaires,
          :dossier_etat_civil_agents,
          :certificat_inscription,
          :autorisations_periodiques,
          :recus_paiement,
          :carte_identite_fiscale,
          :autorisations_periodiques1,
          :recus_paiement1
      )";
        
       
        $stmt = $conn->prepare($sql77);

        // Bind the parameters
        $stmt->bindParam(':idGess', $lastInsertIdPi);
        $stmt->bindParam(':publication_journal_officiel', $publication_journal_officiel);
        $stmt->bindParam(':rapports1', $rapports1);
        $stmt->bindParam(':statuts_fondamentaux', $statuts_fondamentaux);
        $stmt->bindParam(':reglement_interieur', $reglement_interieur);
        $stmt->bindParam(':contrats_utilisation_eau', $contrats_utilisation_eau);
        $stmt->bindParam(':electricite', $electricite);
        $stmt->bindParam(':eau', $eau);
        $stmt->bindParam(':contrats_manutention', $contrats_manutention);
        $stmt->bindParam(':contrat_gestion_systeme_hydrique', $contrat_gestion_systeme_hydrique);
        $stmt->bindParam(':contrats', $contrats);
        $stmt->bindParam(':dossier_mandat', $dossier_mandat);
        $stmt->bindParam(':cartes_versement_salaires', $cartes_versement_salaires);
        $stmt->bindParam(':proces_verbaux_mandatement_determination_salaires', $proces_verbaux_mandatement_determination_salaires);
        $stmt->bindParam(':dossier_etat_civil_agents', $dossier_etat_civil_agents);
        $stmt->bindParam(':certificat_inscription', $certificat_inscription);
        $stmt->bindParam(':autorisations_periodiques', $autorisations_periodiques);
        $stmt->bindParam(':recus_paiement', $recus_paiement);
        $stmt->bindParam(':carte_identite_fiscale', $carte_identite_fiscale);
        $stmt->bindParam(':autorisations_periodiques1', $autorisations_periodiques1);
        $stmt->bindParam(':recus_paiement1', $recus_paiement1);
        

        $stmt->execute();

        // الملف الفني


        $Exploitations_Agricoles = getTabFilesName($_FILES['Exploitations_Agricoles']);
        $Stations_Pompage = getTabFilesName($_FILES['Stations_Pompage']);
        $Reseau_Maien = getTabFilesName($_FILES['Reseau_Maien']);
        $Reservoirs = getTabFilesName($_FILES['Reservoirs']);
        $Caracteristiques_Normes = getTabFilesName($_FILES['Caracteristiques_Normes']);
        $Etudes_Techniques = getTabFilesName($_FILES['Etudes_Techniques']);
        $Registre_Pompage = getTabFilesName($_FILES['Registre_Pompage']);
        $Cycle_Eau = getTabFilesName($_FILES['Cycle_Eau']);
        $Registre_Consommation = getTabFilesName($_FILES['Registre_Consommation']);
        $Registre_Distribution = getTabFilesName($_FILES['Registre_Distribution']);
        $Permis_Distribution = getTabFilesName($_FILES['Permis_Distribution']);
        $Documents_Suivi = getTabFilesName($_FILES['Documents_Suivi']);
        $Maintenance_Preventive = getTabFilesName($_FILES['Maintenance_Preventive']);
        $Registre_Demandes_Distribution = getTabFilesName($_FILES['Registre_Demandes_Distribution']);

        $sql = "INSERT INTO pi_dossier_technique (idGess, Exploitations_Agricoles, Stations_Pompage, Reseau_Maien, Reservoirs, Caracteristiques_Normes, Etudes_Techniques, Registre_Pompage, Cycle_Eau, Registre_Consommation, Registre_Distribution, Permis_Distribution, Documents_Suivi, Maintenance_Preventive, Registre_Demandes_Distribution) VALUES (:idGess, :Exploitations_Agricoles, :Stations_Pompage, :Reseau_Maien, :Reservoirs, :Caracteristiques_Normes, :Etudes_Techniques, :Registre_Pompage, :Cycle_Eau, :Registre_Consommation, :Registre_Distribution, :Permis_Distribution, :Documents_Suivi, :Maintenance_Preventive, :Registre_Demandes_Distribution)";

          $stmt = $conn->prepare($sql);

          $stmt->bindParam(':idGess', $lastInsertIdPi);
          $stmt->bindParam(':Exploitations_Agricoles', $Exploitations_Agricoles);
          $stmt->bindParam(':Stations_Pompage', $Stations_Pompage);
          $stmt->bindParam(':Reseau_Maien', $Reseau_Maien);
          $stmt->bindParam(':Reservoirs', $Reservoirs);
          $stmt->bindParam(':Caracteristiques_Normes', $Caracteristiques_Normes);
          $stmt->bindParam(':Etudes_Techniques', $Etudes_Techniques);
          $stmt->bindParam(':Registre_Pompage', $Registre_Pompage);
          $stmt->bindParam(':Cycle_Eau', $Cycle_Eau);
          $stmt->bindParam(':Registre_Consommation', $Registre_Consommation);
          $stmt->bindParam(':Registre_Distribution', $Registre_Distribution);
          $stmt->bindParam(':Permis_Distribution', $Permis_Distribution);
          $stmt->bindParam(':Documents_Suivi', $Documents_Suivi);
          $stmt->bindParam(':Maintenance_Preventive', $Maintenance_Preventive);
          $stmt->bindParam(':Registre_Demandes_Distribution', $Registre_Demandes_Distribution);
          $stmt->execute();

          // الملف المالي


   $factures_et_mouidates = getTabFilesName($_FILES['factures_et_mouidates']);
   $copies_budgets_annuels = getTabFilesName($_FILES['copies_budgets_annuels']);
   $releve_compteurs_rapports = getTabFilesName($_FILES['releve_compteurs_rapports']);
   $etats_compte_courant = getTabFilesName($_FILES['etats_compte_courant']);
   $mouidates_depenses = getTabFilesName($_FILES['mouidates_depenses']);
   $cartes_adhesion = getTabFilesName($_FILES['cartes_adhesion']);
   $recevabilites_livraison = getTabFilesName($_FILES['recevabilites_livraison']);
   $fichier_abonnements = getTabFilesName($_FILES['fichier_abonnements']);
   $fichier_tarification = getTabFilesName($_FILES['fichier_tarification']);
   $rapports_controle_comptable = getTabFilesName($_FILES['rapports_controle_comptable']);
   $registres_suivi_exploitation_facturation_encaissement = getTabFilesName($_FILES['registres_suivi_exploitation_facturation_encaissement']);
   $livre_comptabilite = getTabFilesName($_FILES['livre_comptabilite']);
   $rapports_situation_financiere = getTabFilesName($_FILES['rapports_situation_financiere']);
   $registre_listes_dettes_agriculteurs_beneficiaires = getTabFilesName($_FILES['registre_listes_dettes_agriculteurs_beneficiaires']);
   $liste_dettes_association_fournisseurs = getTabFilesName($_FILES['liste_dettes_association_fournisseurs']);
   
   // Your database insertion query
   $sql10 = "INSERT INTO pi_dossier_financier (
       idGess, 
       factures_et_mouidates,
       copies_budgets_annuels,
       releve_compteurs_rapports,
       etats_compte_courant,
       mouidates_depenses,
       cartes_adhesion,
       recevabilites_livraison,
       fichier_abonnements,
       fichier_tarification,
       rapports_controle_comptable,
       registres_suivi_exploitation_facturation_encaissement,
       livre_comptabilite,
       rapports_situation_financiere,
       registre_listes_dettes_agriculteurs_beneficiaires,
       liste_dettes_association_fournisseurs
   ) VALUES (
       :idGess, 
       :factures_et_mouidates,
       :copies_budgets_annuels,
       :releve_compteurs_rapports,
       :etats_compte_courant,
       :mouidates_depenses,
       :cartes_adhesion,
       :recevabilites_livraison,
       :fichier_abonnements,
       :fichier_tarification,
       :rapports_controle_comptable,
       :registres_suivi_exploitation_facturation_encaissement,
       :livre_comptabilite,
       :rapports_situation_financiere,
       :registre_listes_dettes_agriculteurs_beneficiaires,
       :liste_dettes_association_fournisseurs
   )";
   
   $stmt = $conn->prepare($sql10);
   
   $stmt->bindParam(':idGess', $lastInsertIdPi);
   $stmt->bindParam(':factures_et_mouidates', $factures_et_mouidates);
   $stmt->bindParam(':copies_budgets_annuels', $copies_budgets_annuels);
   $stmt->bindParam(':releve_compteurs_rapports', $releve_compteurs_rapports);
   $stmt->bindParam(':etats_compte_courant', $etats_compte_courant);
   $stmt->bindParam(':mouidates_depenses', $mouidates_depenses);
   $stmt->bindParam(':cartes_adhesion', $cartes_adhesion);
   $stmt->bindParam(':recevabilites_livraison', $recevabilites_livraison);
   $stmt->bindParam(':fichier_abonnements', $fichier_abonnements);
   $stmt->bindParam(':fichier_tarification', $fichier_tarification);
   $stmt->bindParam(':rapports_controle_comptable', $rapports_controle_comptable);
   $stmt->bindParam(':registres_suivi_exploitation_facturation_encaissement', $registres_suivi_exploitation_facturation_encaissement);
   $stmt->bindParam(':livre_comptabilite', $livre_comptabilite);
   $stmt->bindParam(':rapports_situation_financiere', $rapports_situation_financiere);
   $stmt->bindParam(':registre_listes_dettes_agriculteurs_beneficiaires', $registre_listes_dettes_agriculteurs_beneficiaires);
   $stmt->bindParam(':liste_dettes_association_fournisseurs', $liste_dettes_association_fournisseurs);
   
   $stmt->execute();


   

          
  




     
    

        



   

   

        header("Location: /gess/apgess/login/index.php?etat=inscriptionEffctuee");
          ob_end_flush(); 

   
   }


}


?>