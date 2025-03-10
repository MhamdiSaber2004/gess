<?php 

include "head.php";

error_reporting(E_ERROR | E_PARSE);

include "sidebar.php";


if(!isset($_GET['page']) || empty($_GET['page']))
{
  include "./pages/dashboard.php";
}


if(isset($_GET['page']) && ! empty ( $_GET['page'] ) ) {
  switch ($_GET['page']) {
      case 'dashboard':
        include "./pages/dashboard.php";
        break;
        case 'ajoutBenefiquePublique':
          include "./pages/ajoutBenefiquePublique.php";
          break;
          case 'documents':
            include "./pages/documents.php";
            break;
            case 'modifProbleme':
              include "./pages/modifProbleme.php";
              break;
              case 'ajoutProbleme':
                include "./pages/ajoutProbleme.php";
                break;
          case 'prgPompeEauQuotiqien':
            include "./pages/prgPompeEauQuotiqien.php";
            break;
          case 'printPrgPompeEauQuotiqien':
            include "./pages/printPrgPompeEauQuotiqien.php";
            break;
          case 'printMa7dherEjtime3Numero':
            include "./pages/printMa7dherEjtime3Numero.php";
            break;
            case 'printProgrammeTravaille':
              include "./pages/printProgrammeTravaille.php";
              break;
          case 'printPremierMa7dherReunionPublique':
            include "./pages/printPremierMa7dherReunionPublique.php";
            break;
          case 'printMa7dherReunionPublique':
            include "./pages/printMa7dherReunionPublique.php";
            break;
        case 'ajoutBenefiqueAEP':
          include "./pages/ajoutBenefiqueAEP.php";
          break;

          case 'ajoutBenefiquePI':
            include "./pages/ajoutBenefiquePI.php";
            break;
        case 'demandes':
          include "./pages/demandes.php";
          break;
          case 'listePompiste':
            include "./pages/listePompiste.php";
            break;
            case 'listeBenefique':
              include "./pages/listeBenefique.php";
              break;

              case 'demandeBenefique':
                include "./pages/demandeBenefique.php";
                break;
              
              case 'listeDemandes':
                include "./pages/listeDemandes.php";
                break;
                     
          case 'listeDemandeEnCours':
            include "./pages/listeDemandeEnCours.php";
            break;

            case 'ajoutPompiste':
              include "./pages/ajoutPompiste.php";
              break;

              case 'modifPompiste':
                include "./pages/modifPompiste.php";
                break;

                

              case 'listeProblemes':
                include "./pages/listeProblemes.php";
                break;

                case 'listeDonneesCompteurs':
                  include "./pages/listeDonneesCompteurs.php";
                  break;

                  case 'ajoutBenefique':
                    include "./pages/ajoutBenefique.php";
                    break;
                    case 'modifBenefique':
                      include "./pages/modifBenefique.php";
                      break;

                      case 'ajoutPea':
                        include "./pages/ajoutPea.php";
                        break;
                        
                        

                        case 'parametre':
                          include "./pages/parametre.php";
                          break;


                          case 'printPompiste':
                            include "./pages/printPompiste.php";
                            break;
                            case 'printReunionPublique':
                              include "./pages/printReunionPublique.php";
                              break;
                            case 'printDemande':
                              include "./pages/printDemande.php";
                              break;

                          //  from pompiste

                              case 'listePrisePi':
                              include "./pages/listePrisePi.php";
                              break;
    
    
                              case 'factureAEP':
                                include "./pages/factureAEP.php";
                                break;



                                /*case 'ajoutBenefiqueAEP':
                                  include "./pages/ajoutBenefiqueAEP.php";
                                  break;
                        
                                  case 'ajoutBenefiquePI':
                                    include "./pages/ajoutBenefiquePI.php";
                                    break;*/
                                    case 'modifBenefiqueAEP':
                                      include "./pages/modifBenefiqueAEP.php";
                                      break;


                                      case 'modifBenefiquePI':
                                        include "./pages/modifBenefiquePI.php";
                                        break;


                          
            
                                  case 'recuPayementAEP':
                                    include "./print/recuPayementAEP.php";
                                    break;
                                    case 'listeBenefiqueAEP':
                                      include "./pages/listeBenefiqueAEP.php";
                                      break;
                                      case 'listeBenefiquePublique':
                                        include "./pages/listeBenefiquePublique.php";
                                        break;

                                      case 'listeAttenteAEP':
                                        include "./pages/listeAttenteAEP.php";
                                        break;
                                        case 'listeDesactiveAEP':
                                          include "./pages/listeDesactiveAEP.php";
                                          break;
                    
                                      case 'listeBenefiquePI':
                                        include "./pages/listeBenefiquePI.php";
                                        break;

                                        case 'listeAttentePI':
                                          include "./pages/listeAttentePI.php";
                                          break;
                                          case 'listeDesactivePI':
                                            include "./pages/listeDesactivePI.php";
                                            break;
                  
                             
                  
                                            case 'consommationAEP':
                                              include "./pages/consommationAEP.php";
                                              break;

                                              case 'listeBranche':
                                                include "./pages/listeBranche.php";
                                                break;
                  
                  
                                          case 'consommationPI':
                                            include "./pages/consommationPI.php";
                                            break;
                  
                  
                                            case 'consommationPompe':
                                              include "./pages/consommationPompe.php";
                                              break;
                                        
                  
                  
                                    case 'modifDonneesCompteur':
                                      include "./pages/modifDonneesCompteur.php";
                                      break;
                  
                  
                                      case 'payementAEP':
                                        include "./pages/payementAEP.php";
                                        break;

                                        case 'ajoutDonneesPompe':
                                          include "./pages/ajoutDonneesPompe.php";
                                          break;

                                          case 'venteEau':
                                            include "./pages/venteEau.php";
                                            break;
    
                                      
      
      default:
        include "./pages/dashboard.php";
        break;
  }
}


include "topNavBar.php";

include "footer.php" 

?>





<div class="col-md-6">
    <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">قائمة الانتفاع</h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الانتفاع  </div>
        
      <div class="btn-wrapper text-center">
      <a href="index.php?page=listeBranche" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">فرع</span>
                </a><br><br>

                <a href="index.php?page=listePrisePi" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">مأخذ</span>
                </a><br><br>
            
                <a href="index.php?page=listeBenefique<?php echo $typeGess ?>" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع  </span>
                </a><br><br>
                <a href="index.php?page=listeBenefiquePublique" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text"> منتفعين خارج المنطقة السقوية  </span>
                </a><br><br>
         
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>




<div class="col-md-6">
    <div class="modal fade" id="consommation" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">قائمة الإستهلاك</h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الإستهلاك  </div>
        
      <div class="btn-wrapper text-center">
    
      <a href="index.php?page=consommationPompe" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">مضخة</span>
                </a><br><br>
                <a href="index.php?page=consommation<?php echo $typeGess ?>" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع</span>
                </a><br><br>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>



<div class="col-md-6">
    <div class="modal fade" id="payement" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">قائمة الإستخلاص</h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الإستخلاص  </div>
        
      <div class="btn-wrapper text-center">
                <a href="index.php?page=payementPI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع المنطقة السقوية</span>
                </a><br><br>
                <a href="index.php?page=payementAEP" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع منطقة الماء الصالح للشرب</span>
                </a>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>


<div class="col-md-6">
    <div class="modal fade" id="datePrgPompeEau" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="get" action="index.php?page=prgPompeEauQuotidien">
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2"> </h3><br>
      <div class="text-center mb-4">الرجاء إختيار اليوم  </div>
        
      <div class="btn-wrapper text-center">
             

              <input type="text" name="page" id="" value="prgPompeEauQuotiqien" hidden>
                <input type="date" name="jour" required>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="factureAEP" >متابعة</button>
                                  
                                  </div>
      </form>
      </div>
  </div>
</div>

</div>









<div class="col-md-6">
    <div class="modal fade" id="factureAEP" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">إستخراج فاتورة </h3><br>
      <div class="text-center mb-4">الرجاء كتابة رقم العداد   </div>
        
      <div class="btn-wrapper text-center">
      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم العداد</label>
                        <input type="number" name="numCompteur" list="numeroCompteur" id="numCompteur" class="form-control form-control-alternative" placeholder="رقم العداد" >
                        <datalist id="numeroCompteur">
                                                <?php
                                                   
                                                    $sql = "SELECT numCompteur FROM benefique_aep where idGess='$idGess' ";
                                                                  $result = $conn->query($sql);
                                                   
                                                                  if ($result->num_rows > 0) {
                                                                   while ($row = $result->fetch_assoc()) {
                                                                   echo "<option>".$row['numCompteur']."</option>";
                                                                  
                                                                   
                                                                 }
                                                                  }
                                                    ?>
                                             </datalist> 
                      </div>
                    </div>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="factureAEP" >متابعة</button>
                                  
                                  </div>
      </form>
          
      </div>
  </div>
</div>

</div>




<div class="col-md-6">
    <div class="modal fade" id="factures" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">إستخراج فاتورة </h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الفاتورة  </div>
        
      <div class="btn-wrapper text-center">

            
                <a href="index.php?page=facturePI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">فاتورة المنطقة السقوية</span>
                </a><br><br>
                <a href="index.php?page=factureAEP" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">فاتورة منطقة الماء الصالح للشرب</span>
                </a>
                
            </div>
        
      
  </div>
 
</div>
          </div>
          
      </div>
  </div>
</div>

</div>

<div class="col-md-6">
    <div class="modal fade" id="registre" tabindex="-2" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">دفتر المحاسبة  </h3><br>
      <div class="text-center mb-4">الرجاء إختيار شهر و سنة صفحة الدفتر المراد عرضها   </div>
        
      <div class="btn-wrapper text-center">

            
              <div class="card border-0 mb-0">
  <div class="card-header bg-transparent pb-5">

          <div class="btn-wrapper text-center">
<label class="form-control-label" for="etat">السنة : &nbsp;&nbsp;</label>
<select  onchange="chargerAccreditations()" class="form-control-alternative col-6" type="text" id="year">
                                    <option value="">اختر السنة</option>
                                    <option value="2018"> 2018</option>
                                    <option value="2019"> 2019</option>
                                    <option value="2020"> 2020</option>
                                    <option value="2021"> 2021</option>
                                    <option value="2022"> 2022</option>
                                    <option value="2023"> 2023</option>
                                    <option value="2024"> 2024</option>
                                    <option value="2025"> 2025</option>
                                    <option value="2026"> 2026</option>
                                    <option value="2027"> 2027</option>
                                    <option value="2028"> 2028</option>
                                    <option value="2029"> 2029</option>
                                    <option value="2030"> 2030</option>
                                    
                                 </select>
                               <br><br>
<label class="form-control-label">الشهر : &nbsp;&nbsp;</label>
                                 <select class="form-control-alternative col-6" id="month">
                                 <option value="">اختر الشهر</option>
                                  <option value="January">جانفي</option>
                                    <option value="February">فيفري</option>
                                    <option value="March">مارس</option>
                                    <option value="April">أفريل</option>
                                    <option value="May">ماي</option>
                                    <option value="June">جوان</option>
                                    <option value="July">جويلية</option>
                                    <option value="August">أوت</option>
                                    <option value="September">سبتمبر</option>
                                    <option value="October">أكتوبر</option>
                                    <option value="November">نوفمبر</option>
                                    <option value="December">ديسمبر</option>
                                 </select>
                                 <br>
                                 <h6 class="heading-small  mb-4 text-danger" id="erreurGess"></h6>
            
          </div>
          
      
  </div>
 <div class="modal-footer flex-row-reverse">
        <button  id="getPage" onclick="getRegistrePage()" class="btn btn-primary" >عرض الصفحة </button>
      </div>
</div>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>

<script>
    function getRegistrePage() {
                var months = [
          'January', 'February', 'March', 'April', 'May', 'June',
          'July', 'August', 'September', 'October', 'November', 'December'
        ];

    var currentDate = new Date();
    var currentMonth = months[currentDate.getMonth()];
   
    var currentYear = currentDate.getFullYear();
     
      var monthSelect = document.getElementById("month");
      var yearSelect = document.getElementById("year");
      var goToRegistreButton = document.getElementById("goToRegistrePage");
      var selectedMonth = monthSelect.options[monthSelect.selectedIndex].value;
      var selectedYear = yearSelect.options[yearSelect.selectedIndex].value;
   
      
      if(selectedYear.length <1 && selectedMonth.length <1 ){
          monthSelect = currentMonth;
          selectedYear = currentYear;
          
      }
    
      var url = "/gess/apgess/GDA/registre.php?moisValue=" + selectedMonth + "&annee=" + selectedYear;

  window.location.href = url;
}




function toggleButtonState() {


  getPage.disabled = false;
}
</script>





<!-- vente eau, si n'a pas des données deja enregistré -->

<div class="col-md-6">
    <div class="modal fade" id="premierVenteEau" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">بيع الماء  </h3><br>
      <div class="text-center mb-4">الرجاء كتابة رقم الاستهلاك المسجل في العداد      </div>
        
      <div class="btn-wrapper text-center">
      <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم الاستهلاك </label>
                        <input type="number" name="numConsomme"  id="numConsomme" class="form-control form-control-alternative" placeholder="رقم الاستهلاك " >
                        
                      </div>
                    </div>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="ajoutPremierVenteEau" >متابعة</button>
                                  
                                  </div>
      </form>
          
      </div>
  </div>
</div>

</div>






<div class="col-md-6">
    <div class="modal fade" id="reunions" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">إستخراج وثائق </h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الوثيقة  </div>
        
      <div class="btn-wrapper text-center">
      <a href="index.php?page=printReunionPublique" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">إعلان عن الجلسة العامة  </span>
                </a><br><br>
                <a href="index.php?page=printMa7dherReunionPublique" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">محضر جلسة عامــة  </span>
                </a><br><br>
                <a href="index.php?page=printPremierMa7dherReunionPublique" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">محضر جلسة اول اجتماع لمجلس الإدارة  </span>
                </a><br><br>
                <a href="index.php?page=printMa7dherEjtime3Numero" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">محضر اجتماع مجلس إدارة عدد   </span>
                </a><br><br>
                <a href="index.php?page=printProgrammeTravaille" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">برنامج العمل  </span>
                </a><br><br>
                <a href="index.php?page=payementPI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع  </span>
                </a><br><br>
                <a href="index.php?page=payementPI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع  </span>
                </a><br><br>
                <a href="index.php?page=payementPI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع  </span>
                </a><br><br>
               
            </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>






<div class="col-md-6">
    <div class="modal fade" id="archive" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
          <form method="get" action="pagesComplet/utilisationEtFacture.php">
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">دفتر متابعة الاستهلاك والفوترة الخاصة بكل المنتفعين</h3><br>
      <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
        
          <div class="btn-wrapper text-center">
          <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">رقم الاستهلاك </label>
                        <input type="month" name="mois"  id="numConsomme" class="form-control form-control-alternative" placeholder="رقم الاستهلاك " required>
                        
                      </div>
                    </div>
          </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="submit"class="btn btn-primary" name="" >متابعة</button>
                                  
                                  </div>
</form>
      </div>
  </div>
</div>

</div>