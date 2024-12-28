



function calcul(){

     //  عدد ساعات التشغيل الضرورية
     debit_pompe = document.getElementById("debit_pompe").value;
     quantite_prevue_achat_ou_pompage = document.getElementById("quantite_prevue_achat_ou_pompage").value;
 
     if (quantite_prevue_achat_ou_pompage != 0){
         document.getElementById("heure_travail_ness").value=(quantite_prevue_achat_ou_pompage/debit_pompe).toFixed(0)
     }
    
     document.getElementById("quantite_prevue_distribution").value=(document.getElementById("quantite_prevue_achat_ou_pompage").value-((document.getElementById("quantite_prevue_achat_ou_pompage").value)*((document.getElementById("pourcentage_perte").value)/100)));

    document.getElementById("point_eau1").value=((document.getElementById("point_eau").value)*0.001).toFixed(3);
    document.getElementById("reseau_construction1").value=((document.getElementById("reseau_construction").value)*0.005).toFixed(3);
    document.getElementById("pompage_equipement1").value=((document.getElementById("pompage_equipement").value)*0.025).toFixed(3);
    document.getElementById("electricite1").value=((document.getElementById("electricite").value)*0.005).toFixed(3);
    document.getElementById("compteurs1").value=((document.getElementById("compteurs").value)*0.01).toFixed(3);


    var pointEau = parseFloat(document.getElementById("point_eau").value) || 0;
    var reseauConstruction = parseFloat(document.getElementById("reseau_construction").value) || 0;
    var pompageEquipement = parseFloat(document.getElementById("pompage_equipement").value) || 0;
    var electricite = parseFloat(document.getElementById("electricite").value) || 0;
    var compteurs = parseFloat(document.getElementById("compteurs").value) || 0;
    
    var sum = pointEau + reseauConstruction + pompageEquipement + electricite + compteurs;
    
    document.getElementById("couts_totals_realisation").value = sum.toFixed(3);
    var pointEau1 = parseFloat(document.getElementById("point_eau1").value) || 0;
    var reseauConstruction1 = parseFloat(document.getElementById("reseau_construction1").value) || 0;
    var pompageEquipement1 = parseFloat(document.getElementById("pompage_equipement1").value) || 0;
    var electricite1 = parseFloat(document.getElementById("electricite1").value) || 0;
    var compteurs1 = parseFloat(document.getElementById("compteurs1").value) || 0;
    
    var sum1 = pointEau1 + reseauConstruction1 + pompageEquipement1 + electricite1 + compteurs1;
    
    document.getElementById("couts_maintenance_totals").value = sum1.toFixed(3);

    document.getElementById("frais_achat_eau").value = document.getElementById("cout_achat_eau").value * document.getElementById("quantite_prevue_achat_ou_pompage").value ;

    document.getElementById("frais_energie").value = document.getElementById("consommation_energie_par_heure").value * document.getElementById("heure_travail_ness").value * document.getElementById("cout_unitaire_energie").value ;
    document.getElementById("salaire_et_avantages_en_nature_par_an1").value = document.getElementById("salaire_et_avantages_en_nature_par_an").value
    document.getElementById("salaire_et_avantages_du_directeur_technique_par_an1").value = document.getElementById("salaire_et_avantages_du_directeur_technique_par_an").value
    document.getElementById("couts_maintenance_totals1").value = document.getElementById("couts_maintenance_totals").value
    document.getElementById("renouvellement_des_compteurs").value =( document.getElementById("surface_totale").value * document.getElementById("prix_compteur").value * 0.1).toFixed(3)
    document.getElementById("renouvellement_des_equipements").value = (document.getElementById("duree_renovation_moto").value / document.getElementById("prix_moto").value).toFixed(3)
     if (document.getElementById("remuneration_gardien_gestionnaire")){
        document.getElementById("remuneration_gardien_gestionnaire").value=(document.getElementById("salaire_gardien_per_m3_eau").value*document.getElementById("points_deau_publics").value).toFixed(3);
     }

    var fraisAchatEau = parseFloat(document.getElementById("frais_achat_eau").value) || 0;
    var fraisEnergie = parseFloat(document.getElementById("frais_energie").value) || 0;
    var salaireAvantagesParAn = parseFloat(document.getElementById("salaire_et_avantages_en_nature_par_an1").value) || 0;
    var salaireDirecteurTechniqueParAn = parseFloat(document.getElementById("salaire_et_avantages_du_directeur_technique_par_an1").value) || 0;
    var coutsMaintenanceTotals = parseFloat(document.getElementById("couts_maintenance_totals1").value) || 0;
    var couvertureDeficitEnregistre = parseFloat(document.getElementById("couverture_deficit_enregistre").value) || 0;
    var renouvellementCompteurs = parseFloat(document.getElementById("renouvellement_des_compteurs").value) || 0;
    var fraisTransportDeplacement = parseFloat(document.getElementById("frais_de_transport_deplacement").value) || 0;
    var renouvellementEquipements = parseFloat(document.getElementById("renouvellement_des_equipements").value) || 0;
    var fraisGestionAssociation = parseFloat(document.getElementById("frais_gestion_association").value) || 0;
    var fraisDiversTaraa = parseFloat(document.getElementById("frais_divers_taraa").value) || 0;

    // Calculate the sum of the values
    var sum4 = fraisAchatEau + fraisEnergie + salaireAvantagesParAn + salaireDirecteurTechniqueParAn + 
              coutsMaintenanceTotals + couvertureDeficitEnregistre + renouvellementCompteurs +
              fraisTransportDeplacement + renouvellementEquipements + fraisGestionAssociation + fraisDiversTaraa;

     document.getElementById("total_frais_exploitation_entretien").value = sum4.toFixed(3);
     if (document.getElementById("remuneration_gardien_gestionnaire")){
        remuneration_gardien_gestionnaire=parseFloat(document.getElementById("remuneration_gardien_gestionnaire").value) || 0;
        depenses_analyse_eau=parseFloat(document.getElementById("depenses_analyse_eau").value) || 0;
        document.getElementById("depenses_jafal").value=(document.getElementById("quantite_prevue_achat_ou_pompage").value/document.getElementById("frais_achat_eau").value*document.getElementById("prix_litre_javal").value).toFixed(3)
        depenses_jafal=parseFloat(document.getElementById("depenses_jafal").value) || 0;
        huiles_et_filtres=parseFloat(document.getElementById("huiles_et_filtres").value) || 0;
        document.getElementById("cout_realisation_connexion_speciale").value=(document.getElementById("bi_realisation").value*document.getElementById("nombre_bi_prevus").value).toFixed(3)
       
        document.getElementById("total_frais_exploitation_entretien").value=(sum4+remuneration_gardien_gestionnaire+depenses_analyse_eau+depenses_jafal+huiles_et_filtres).toFixed(3)

     }



     document.getElementById("cout_par_metre_cube").value = (document.getElementById("total_frais_exploitation_entretien").value  / document.getElementById("quantite_prevue_distribution").value).toFixed(3) ;
     document.getElementById("prix_moto1").value = document.getElementById("prix_moto").value;


     var totalFraisExploitationEntretien = parseFloat(document.getElementById("total_frais_exploitation_entretien").value) || 0;
    var prixMoto = parseFloat(document.getElementById("prix_moto").value) || 0;
    var prixMoto1 = parseFloat(document.getElementById("prix_moto1").value) || 0;
    var fraisActivitesAutres = parseFloat(document.getElementById("frais_activites_autres").value) || 0;

    var sum44 = totalFraisExploitationEntretien + prixMoto + fraisActivitesAutres;
    if (document.getElementById("cout_realisation_connexion_speciale")){
        cout_realisation_connexion_speciale=parseFloat(document.getElementById("cout_realisation_connexion_speciale").value) || 0;
        sum44=totalFraisExploitationEntretien + prixMoto  + fraisActivitesAutres+cout_realisation_connexion_speciale;
    }
    document.getElementById("total_des_depenses").value = sum44.toFixed(3);
    document.getElementById("revenues_des_adhesions").value = (document.getElementById("nombre_membres").value*document.getElementById("informations_adhesion").value).toFixed(3);
    document.getElementById("revenues_des_frais_globaux").value = (document.getElementById("nombre_points_deau_publics").value*document.getElementById("montant_mensuel_net").value*12).toFixed(3);
    document.getElementById("revenues_vente_eau").value = (document.getElementById("total_frais_exploitation_entretien").value-document.getElementById("revenues_des_adhesions").value-document.getElementById("revenues_des_frais_globaux").value).toFixed(3);
    document.getElementById("total_revenues_exploitation_maintenance").value = document.getElementById("total_frais_exploitation_entretien").value ;
    var totalRevenuesExploitationMaintenance = parseFloat(document.getElementById("total_revenues_exploitation_maintenance").value) || 0;
        var revenuesOtherActivities = parseFloat(document.getElementById("revenues_other_activities").value) || 0;

        var sum66 = totalRevenuesExploitationMaintenance + revenuesOtherActivities;
        if( document.getElementById("revenus_realises_sur_realisation_raccordement_specifique")){
            document.getElementById("revenus_realises_sur_realisation_raccordement_specifique").value=document.getElementById("cout_realisation_connexion_speciale").value
            revenus_realises_sur_realisation_raccordement_specifique=parseFloat(document.getElementById("revenus_realises_sur_realisation_raccordement_specifique").value) || 0;
            sum66 = totalRevenuesExploitationMaintenance + revenuesOtherActivities+revenus_realises_sur_realisation_raccordement_specifique;



        }
    document.getElementById("total_revenues").value = sum66.toFixed(3);

    var soldeInitialAnnee = parseFloat(document.getElementById("solde_initial_debut_annee").value) || 0;
        var totalDesDepenses = parseFloat(document.getElementById("total_des_depenses").value) || 0;
        var totalRevenues = parseFloat(document.getElementById("total_revenues").value) || 0;

        var result = soldeInitialAnnee - totalDesDepenses + totalRevenues;
        document.getElementById("solde_attendu_fin_annee").value = result.toFixed(3);
        if (document.getElementById("prix_m3_sans_garde_administrateur")){
            document.getElementById("tarif_m3_eau1").value= (document.getElementById("revenues_vente_eau").value/document.getElementById("quantite_prevue_distribution").value).toFixed(3);
            document.getElementById("prix_m3_sans_garde_administrateur").value= ((document.getElementById("revenues_vente_eau").value-document.getElementById("remuneration_gardien_gestionnaire").value)/document.getElementById("quantite_prevue_distribution").value).toFixed(3);
            document.getElementById("information_mensuelle_global").value=document.getElementById("montant_mensuel_net").value 
        }
        document.getElementById("tarif_m3_eau").value = (document.getElementById("revenues_vente_eau").value/document.getElementById("quantite_prevue_distribution").value).toFixed(3);
        
        document.getElementById("prix_vente_heure").value=(document.getElementById("tarif_m3_eau").value/document.getElementById("debit_pompe").value).toFixed(3);
      
}
calcul();


function submitData(){

    var inputElements = document.querySelectorAll('input');
        inputElements.forEach(function(input) {
        var id = input.id;
        if (id) {
            document.getElementById(id).disabled = false;
        }
        });

}