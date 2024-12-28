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
 
  if ($tabFilesName=="['_1.']" || $tabFilesName=="['_1.','_1.']" || $tabFilesName=="['_1.','_1.','_1.']"  || empty($files)  ){
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
    $qualite_interventions=$_POST['qualite_interventions'];
    $type="منطقة ماء صالح للشرب";



    $sql = "INSERT INTO gess (type,nom, etat_tunisie,accreditation,decanat, date_creation, date_debut,qualite_interventions)
    VALUES (:type,:nom, :etat_tunisie, :accreditation,:decanat, :date_creation, :date_debut,:qualite_interventions)";
     

     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':type', $type);
     $stmt->bindParam(':nom', $nom);
     $stmt->bindParam(':etat_tunisie', $etat_tunisie);
     $stmt->bindParam(':accreditation', $accreditation);
     $stmt->bindParam(':decanat', $decanat);
     $stmt->bindParam(':date_creation', $date_creation);
     $stmt->bindParam(':date_debut', $date_debut);
     $stmt->bindParam(':qualite_interventions', $qualite_interventions);
     $stmt->execute();
    $lastInsertIdAep = $conn->lastInsertId();

    if($lastInsertIdAep)
    {

          // utilisateurs 
          $role_utilisateur =$_POST['roleU'];
          $nom_utilisateur = $_POST['nom_utilisateur'];
          $email_utilisateur = $_POST['email_utilisateur'];
          $tel_utilisateur = $_POST['tel_utilisateur'];
          
          $sql = "INSERT INTO utilisateurs (role_utilisateur, nom_utilisateur, email_utilisateur, tel_utilisateur, idGess)
                  VALUES (:role_utilisateur, :nom_utilisateur, :email_utilisateur, :tel_utilisateur, :idGess)";
          
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':role_utilisateur', $role_utilisateur);
          $stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
          $stmt->bindParam(':email_utilisateur', strtolower($email_utilisateur));
          $stmt->bindParam(':tel_utilisateur', $tel_utilisateur);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          
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
            $stmt->bindParam(':idGess', $lastInsertIdAep);
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
            $stmt->bindParam(':idGess', $lastInsertIdAep);
            
            $stmt->execute();
          }
        
          }
                
        
        
          // معطيات حول توزيع الماء   

          $liaison_prive = isset($_POST['liaison_prive']) ? intval($_POST['liaison_prive']) : 0;
          $fournisseurs_reservoirs = isset($_POST['fournisseurs_reservoirs']) ? intval($_POST['fournisseurs_reservoirs']) : 0;
          $reservoir_public=isset($_POST['reservoir_public']) ? 1 : 0;
          $reservoir_prive=isset($_POST['reservoir_prive']) ? 1 : 0;
          $robinet_public	=isset($_POST['robinet_public']) ? intval($_POST['robinet_public']) : 0;
          $liaison_public=isset($_POST['liaison_public']) ? intval($_POST['liaison_public']) : 0;
          $robinet_util_public=isset($_POST['robinet_util_public']) ? 1 : 0;
          $robinet_util_prive=isset($_POST['robinet_util_prive']) ? 1 : 0;

          $file_reservoir_public = getTabFilesName($_FILES['file_reservoir_public']); 
          $files_reservoir_prive = getTabFilesName($_FILES['files_reservoir_prive']); 
          $file_robinet_util_public = getTabFilesName($_FILES['file_robinet_util_public']); 
          $file_robinet_util_prive = getTabFilesName($_FILES['file_robinet_util_prive']); 
        


          $sql2 = "INSERT INTO distribution_eau (idGess, liaison_prive, fournisseurs_reservoirs, reservoir_public,reservoir_prive, 
          robinet_public, liaison_public, robinet_util_public, robinet_util_prive,file_reservoir_public,files_reservoir_prive,file_robinet_util_public,file_robinet_util_prive)
          VALUES (:idGess, :liaison_prive, :fournisseurs_reservoirs, :reservoir_public,:reservoir_prive, :robinet_public, :liaison_public, 
          :robinet_util_public, :robinet_util_prive,:file_reservoir_public,:files_reservoir_prive,:file_robinet_util_public,:file_robinet_util_prive)";

          $stmt = $conn->prepare($sql2);

          // Bind parameters
          $stmt->bindParam(':idGess',$lastInsertIdAep);
          $stmt->bindParam(':liaison_prive', $liaison_prive);
          $stmt->bindParam(':fournisseurs_reservoirs', $fournisseurs_reservoirs);
          $stmt->bindParam(':reservoir_public', $reservoir_public);
          $stmt->bindParam(':reservoir_prive', $reservoir_prive);
          $stmt->bindParam(':robinet_public', $robinet_public);
          $stmt->bindParam(':liaison_public', $liaison_public);
          $stmt->bindParam(':robinet_util_public', $robinet_util_public);
          $stmt->bindParam(':robinet_util_prive', $robinet_util_prive);
          $stmt->bindParam(':file_reservoir_public', $file_reservoir_public);
          $stmt->bindParam(':files_reservoir_prive', $files_reservoir_prive);
          $stmt->bindParam(':file_robinet_util_public', $file_robinet_util_public);
          $stmt->bindParam(':file_robinet_util_prive', $file_robinet_util_prive);

          $stmt->execute();





          // الحراس
        $nombre = isset($_POST['nombre']) ? intval($_POST['nombre']) : 0;
        $bailleurs = isset($_POST['bailleurs']) ? intval($_POST['bailleurs']) : 0;
        $benevoles = isset($_POST['benevoles']) ? intval($_POST['benevoles']) : 0;
        $paiement = isset($_POST['paiement']) ? intval($_POST['paiement']) : 0;
          $sql3 = "INSERT INTO gardes (nombre, idGess, bailleurs, benevoles, paiement)
          VALUES (:nombre, :idGess, :bailleurs, :benevoles, :paiement)";

          $stmt = $conn->prepare($sql3);
          $stmt->bindParam(':nombre', $nombre);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          $stmt->bindParam(':bailleurs', $bailleurs);
          $stmt->bindParam(':benevoles', $benevoles);
          $stmt->bindParam(':paiement', $paiement);
          $stmt->execute();

          

          // الجوانب المالية


         $montant_abonnement = isset($_POST['montant_abonnement']) ? intval($_POST['montant_abonnement']) : 0;
        $prix_eau_m3 = isset($_POST['prix_eau_m3']) ? intval($_POST['prix_eau_m3']) : 0;
        $tarification = isset($_POST['tarification']) ? intval($_POST['tarification']) : 0;
        $facturation = isset($_POST['facturation']) ? intval($_POST['facturation']) : '';
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

          $sql4 = "INSERT INTO aspects_financiers (idGess, montant_abonnement, prix_eau_m3, tarification, facturation, beneficiaires_a_temps, beneficiaires_jamais, beneficiaires_delai, beneficiaires_dettes, soned, steg, crda, autre_dettes, fonds, compte_courant)
          VALUES (:idGess, :montant_abonnement, :prix_eau_m3, :tarification, :facturation, :beneficiaires_a_temps, :beneficiaires_jamais, :beneficiaires_delai, :beneficiaires_dettes, :soned, :steg, :crda, :autre_dettes, :fonds, :compte_courant)";

          $stmt = $conn->prepare($sql4);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          $stmt->bindParam(':montant_abonnement', $montant_abonnement);
          $stmt->bindParam(':prix_eau_m3', $prix_eau_m3);
          $stmt->bindParam(':tarification', $tarification);
          $stmt->bindParam(':facturation', $facturation);
          $stmt->bindParam(':beneficiaires_a_temps', $beneficiaires_a_temps);
          $stmt->bindParam(':beneficiaires_jamais', $beneficiaires_jamais);
          $stmt->bindParam(':beneficiaires_delai', $beneficiaires_delai);
          $stmt->bindParam(':beneficiaires_dettes', $beneficiaires_dettes);
          $stmt->bindParam(':soned', $soned);
          $stmt->bindParam(':steg', $steg);
          $stmt->bindParam(':crda', $crda);
          $stmt->bindParam(':autre_dettes', $autre_dettes);
          $stmt->bindParam(':fonds', $fonds);
          $stmt->bindParam(':compte_courant', $compte_courant);
          $stmt->execute();


        

           // الوثائق الإدارية والقانونية

           
           $pub_off = getTabFilesName($_FILES['pub_off']);
          $loi_fonda = getTabFilesName($_FILES['loi_fonda']);
          $dossier_seance = getTabFilesName($_FILES['dossier_seance']);
          $loi_interieur = getTabFilesName($_FILES['loi_interieur']);
          $registre = getTabFilesName($_FILES['registre']);
          $contrat_gestion = getTabFilesName($_FILES['contrat_gestion']);
          $registre_inscri = getTabFilesName($_FILES['registre_inscri']);

          $sql5 = "INSERT INTO d_admin_juridiques (idGess, pub_off, loi_fonda, dossier_seance, loi_interieur, registre,contrat_gestion, registre_inscri)
                  VALUES (:idGess, :pub_off, :loi_fonda, :dossier_seance, :loi_interieur, :registre,:contrat_gestion,:registre_inscri)";

          $stmt = $conn->prepare($sql5);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          $stmt->bindParam(':pub_off', $pub_off);
          $stmt->bindParam(':loi_fonda', $loi_fonda);
          $stmt->bindParam(':dossier_seance', $dossier_seance);
          $stmt->bindParam(':loi_interieur', $loi_interieur);
          $stmt->bindParam(':registre', $registre);
          $stmt->bindParam(':contrat_gestion', $contrat_gestion);
          $stmt->bindParam(':registre_inscri', $registre_inscri);
           $stmt->execute();
       
         //الوثائق المالية


         $revenus_depenses = getTabFilesName($_FILES['revenus_depenses']);
         $budget_balancement = getTabFilesName($_FILES['budget_balancement']);
         $factures_compta = getTabFilesName($_FILES['factures_compta']);
         $compta_generale = getTabFilesName($_FILES['compta_generale']);
         $compte_courant = getTabFilesName($_FILES['compte_courant']);
         $budget = getTabFilesName($_FILES['budget']);
         $docs_support = getTabFilesName($_FILES['docs_support']);
     
         $sql6 = "INSERT INTO documents_financiers (idGess, revenus_depenses, budget_balancement, factures_compta, compta_generale,
                                                 compte_courant, budget, docs_support)
                 VALUES (:idGess, :revenus_depenses, :budget_balancement, :factures_compta, :compta_generale,
                         :compte_courant, :budget, :docs_support)";
     
         $stmt = $conn->prepare($sql6);
         $stmt->bindParam(':idGess', $lastInsertIdAep);
         $stmt->bindParam(':revenus_depenses', $revenus_depenses);
         $stmt->bindParam(':budget_balancement', $budget_balancement);
         $stmt->bindParam(':factures_compta', $factures_compta);
         $stmt->bindParam(':compta_generale', $compta_generale);
         $stmt->bindParam(':compte_courant', $compte_courant);
         $stmt->bindParam(':budget', $budget);
         $stmt->bindParam(':docs_support', $docs_support);
         $stmt->execute();

          //الوثائق التقنية


          $lecture_compteur = getTabFilesName($_FILES['lecture_compteur']);
          $etude_projet = getTabFilesName($_FILES['etude_projet']);
          $plan_reseau = getTabFilesName($_FILES['plan_reseau']);
          $suivi_conso_facturation = getTabFilesName($_FILES['suivi_conso_facturation']);
          $station_pompage = getTabFilesName($_FILES['station_pompage']);
          $budget = $_POST['budget'];

          $sql7 = "INSERT INTO documents_technique (idGess, lecture_compteur, etude_projet, plan_reseau, suivi_conso_facturation, station_pompage, budget)
                  VALUES (:idGess, :lecture_compteur, :etude_projet, :plan_reseau, :suivi_conso_facturation, :station_pompage, :budget)";
          
          $stmt = $conn->prepare($sql7);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          $stmt->bindParam(':lecture_compteur', $lecture_compteur);
          $stmt->bindParam(':etude_projet', $etude_projet);
          $stmt->bindParam(':plan_reseau', $plan_reseau);
          $stmt->bindParam(':suivi_conso_facturation', $suivi_conso_facturation);
          $stmt->bindParam(':station_pompage', $station_pompage);
          $stmt->bindParam(':budget', $budget);

          $stmt->execute();

 
 
        // تأمين تعقيم الماء


        $pompe_dosage = isset($_POST['pompe_dosage']) ? 1 : 0;
        $situation_assurance_appliquee =isset($_POST['situation_assurance_appliquee']) ? 1 : 0;
        $situation_assurance_organisee =isset($_POST['situation_assurance_organisee']) ? 1 : 0;
        $file_pompe_dosage = getTabFilesName($_FILES['file_pompe_dosage']);
        $file_situation_appliquee =getTabFilesName( $_FILES['file_situation_appliquee']);
        $file_situation_organisee = getTabFilesName ($_FILES['file_situation_organisee']);

        $sql8 = "INSERT INTO assurer_sterilisation_eau (idGess, Pompe_Dosage, Situation_Assurance_Appliquee, Situation_Assurance_Organisee
        ,file_pompe_dosage,file_situation_appliquee,file_situation_organisee)
                VALUES (:idGess, :pompe_dosage, :situation_assurance_appliquee, :situation_assurance_organisee,
                :file_pompe_dosage,:file_situation_appliquee,:file_situation_organisee)";
        
        $stmt = $conn->prepare($sql8);
        $stmt->bindParam(':idGess', $lastInsertIdAep);
        $stmt->bindParam(':pompe_dosage', $pompe_dosage);
        $stmt->bindParam(':situation_assurance_appliquee', $situation_assurance_appliquee);
        $stmt->bindParam(':situation_assurance_organisee', $situation_assurance_organisee);

        $stmt->bindParam(':file_pompe_dosage', $file_pompe_dosage);
        $stmt->bindParam(':file_situation_appliquee', $file_situation_appliquee);
        $stmt->bindParam(':file_situation_organisee', $file_situation_organisee);

        $stmt->execute();

        // في حالة عطب . بأي شركة أو تقني تتصل ؟

        $nom_societe_technicien = isset($_POST['nom_societe_technicien']) ? intval($_POST['nom_societe_technicien']) : '';
        $domaine = isset($_POST['domaine']) ? intval($_POST['domaine']) : '';
        $numero_telephone = isset($_POST['numero_telephone']) ? intval($_POST['numero_telephone']) : 0;
        if(is_array($numero_telephone) && is_array($nom_societe_technicien))
        {
            for ($i = 0; $i < count($nom_societe_technicien); $i++){
          $sql = "INSERT INTO en_cas_de_panne (idGess, nom_societe_technicien, domaine, numero_telephone)
          VALUES (:idGess, :nom_societe_technicien, :domaine, :numero_telephone)";
  
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':idGess', $lastInsertIdAep);
          $stmt->bindParam(':nom_societe_technicien', $nom_societe_technicien[$i]);
          $stmt->bindParam(':domaine', $domaine[$i]);
          $stmt->bindParam(':numero_telephone', $numero_telephone[$i]);

          $stmt->execute();
          
        }
            
        }

        // الوثائق الموجودة

        $lois_fondamentales = getTabFilesName($_FILES['lois_fondamentales']);
        $annonce_journal_officiel = getTabFilesName($_FILES['annonce_journal_officiel']);
        $dossier_seance_generale = getTabFilesName($_FILES['dossier_seance_generale']);
        $reglement_interieur = getTabFilesName($_FILES['reglement_interieur']);
        $registre_revenus_depenses_annee = getTabFilesName($_FILES['registre_revenus_depenses_annee']);
        $budget_annee = getTabFilesName($_FILES['budget_annee']);
        $registre_recettes_annee = getTabFilesName($_FILES['registre_recettes_annee']);
        $factures = getTabFilesName($_FILES['factures']);

        $sql9 = "INSERT INTO documents_existants (idGess, lois_fondamentales, annonce_journal_officiel, dossier_seance_generale, reglement_interieur, registre_revenus_depenses_annee, budget_annee, registre_recettes_annee, factures)
                VALUES (:idGess, :lois_fondamentales, :annonce_journal_officiel, :dossier_seance_generale, :reglement_interieur, :registre_revenus_depenses_annee, :budget_annee, :registre_recettes_annee, :factures)";
        
        $stmt = $conn->prepare($sql9);
        $stmt->bindParam(':idGess', $lastInsertIdAep);
        $stmt->bindParam(':lois_fondamentales', $lois_fondamentales);
        $stmt->bindParam(':annonce_journal_officiel', $annonce_journal_officiel);
        $stmt->bindParam(':dossier_seance_generale', $dossier_seance_generale);
        $stmt->bindParam(':reglement_interieur', $reglement_interieur);
        $stmt->bindParam(':registre_revenus_depenses_annee', $registre_revenus_depenses_annee);
        $stmt->bindParam(':budget_annee', $budget_annee);
        $stmt->bindParam(':registre_recettes_annee', $registre_recettes_annee);
        $stmt->bindParam(':factures', $factures);
        $stmt->execute();


        // الوثائق الادارية


      

    
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
        $stmt->bindParam(':idGess', $lastInsertIdAep);
        $stmt->bindParam(':role_de', $role_de[$i]);
        $stmt->bindParam(':cin_de', $cin_dev);
        $stmt->bindParam(':attestation_de',$attestation_dev);
        $stmt->bindParam(':exigence_de', $exigence_dev);

        $stmt->execute();

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
        $dossier_revendications_economie_eau = null;
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

        $stmt->bindParam(':idGess', $lastInsertIdAep);
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
        $contrats_utilisation_eau = getTabFilesName($_FILES['contrats_utilisation_eau']);
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
        $stmt->bindParam(':idGess', $lastInsertIdAep);
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

  


          //  الملف الفني



          
          
        $copie_systeme_moderne = null;
        $stations_pompage =getTabFilesName( $_FILES['stations_pompage']);
        $reseau_eau = getTabFilesName ($_FILES['reseau_eau']);
        $reservoirs = getTabFilesName($_FILES['reservoirs']);
        $caracteristiques_techniques =getTabFilesName( $_FILES['caracteristiques_techniques']);
        $etudes_techniques = getTabFilesName ($_FILES['etudes_techniques']);
        $registre_pompage = getTabFilesName($_FILES['registre_pompage']);
        $documents_suivi = getTabFilesName($_FILES['documents_suivi']);
        $maintenance_preventive = getTabFilesName($_FILES['maintenance_preventive']);
        $registre_suivi_distribution = null;

        $sql88 = "INSERT INTO dossier_technique (copie_systeme_moderne, stations_pompage, reseau_eau,
         reservoirs, caracteristiques_techniques, etudes_techniques, registre_pompage,documents_suivi,maintenance_preventive,
         registre_suivi_distribution, idGess)
        VALUES (:file_copie_systeme_moderne, :file_stations_pompage, :file_reseau_eau, :file_reservoirs, 
        :file_caracteristiques_techniques, :file_etudes_techniques, :file_registre_pompage,:documents_suivi,:maintenance_preventive,:file_registre_suivi_distribution, :idGess)";

        $stmt = $conn->prepare($sql88);
        $stmt->bindParam(':idGess', $lastInsertIdAep);
        $stmt->bindParam(':file_copie_systeme_moderne', $copie_systeme_moderne);
        $stmt->bindParam(':file_stations_pompage', $stations_pompage);
        $stmt->bindParam(':file_reseau_eau', $reseau_eau);
        $stmt->bindParam(':file_reservoirs', $reservoirs);
        $stmt->bindParam(':file_caracteristiques_techniques', $caracteristiques_techniques);
        $stmt->bindParam(':file_etudes_techniques', $etudes_techniques);
        $stmt->bindParam(':file_registre_pompage', $registre_pompage);
        $stmt->bindParam(':documents_suivi', $documents_suivi);
        $stmt->bindParam(':maintenance_preventive', $maintenance_preventive);
        $stmt->bindParam(':file_registre_suivi_distribution', $registre_suivi_distribution);
     
       

        $stmt->execute();


        // الملف المالي


        
        $factures_approbations = getTabFilesName($_FILES['factures_approbations']);
        $budgets_anuels = getTabFilesName($_FILES['budgets_anuels']);
        $releves_compteurs = getTabFilesName($_FILES['releves_compteurs']);
        $etat_compte_courant = getTabFilesName($_FILES['etat_compte_courant']);
        $justificatifs_depenses = getTabFilesName($_FILES['justificatifs_depenses']);
        $cartes_adhesion = getTabFilesName($_FILES['cartes_adhesion']);
        $recevabilites_livraison = getTabFilesName($_FILES['recevabilites_livraison']);
        $fichier_abonnements = getTabFilesName($_FILES['fichier_abonnements']);
        $rapports_controle_comptable = getTabFilesName($_FILES['rapports_controle_comptable']);
        $rapports_periodiques = getTabFilesName($_FILES['rapports_periodiques']);
        $comptabilite = getTabFilesName($_FILES['comptabilite']);
        $rapports_financiers = getTabFilesName($_FILES['rapports_financiers']);
        $dettes_fournisseurs = getTabFilesName($_FILES['dettes_fournisseurs']);
        $dettes_association = getTabFilesName($_FILES['dettes_association']);
   
        
        $sql = "INSERT INTO dossier_financier (factures_approbations, budgets_anuels, releves_compteurs,
         etat_compte_courant, justificatifs_depenses,cartes_adhesion,recevabilites_livraison,fichier_abonnements,rapports_controle_comptable,
          rapports_periodiques, comptabilite, rapports_financiers,
         dettes_fournisseurs, dettes_association, idGess)
                VALUES (:file_factures_approbations, :file_budgets_anuels, :file_releves_compteurs, :file_etat_compte_courant,:file_justificatifs_depenses,
                :cartes_adhesion,:recevabilites_livraison,:fichier_abonnements, :rapports_controle_comptable,
                 :file_rapports_periodiques, :file_comptabilite, 
                 :file_rapports_financiers,:file_dettes_fournisseurs,:file_dettes_association, :idGess)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':file_factures_approbations', $factures_approbations);
        $stmt->bindParam(':file_budgets_anuels', $budgets_anuels);
        $stmt->bindParam(':file_releves_compteurs', $releves_compteurs);
        $stmt->bindParam(':file_etat_compte_courant', $etat_compte_courant);
        $stmt->bindParam(':file_justificatifs_depenses', $justificatifs_depenses);
        $stmt->bindParam(':cartes_adhesion', $cartes_adhesion);
        $stmt->bindParam(':recevabilites_livraison', $recevabilites_livraison);
        $stmt->bindParam(':fichier_abonnements', $fichier_abonnements);
        $stmt->bindParam(':rapports_controle_comptable', $rapports_controle_comptable);
        $stmt->bindParam(':file_rapports_periodiques', $rapports_periodiques);
        $stmt->bindParam(':file_comptabilite', $comptabilite);
        $stmt->bindParam(':file_rapports_financiers', $rapports_financiers);
        $stmt->bindParam(':file_dettes_fournisseurs', $dettes_fournisseurs);
        $stmt->bindParam(':file_dettes_association', $dettes_association);
        $stmt->bindParam(':idGess', $lastInsertIdAep);
        
        $stmt->execute();

         
header("Location: /gess/apgess/login/index.php?etat=inscriptionEffctuee");

          ob_end_flush(); 



       
    }
   


}



?>