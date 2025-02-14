<?php 

include "head.php";
error_reporting(E_ERROR | E_PARSE);

include "sidebar.php";
include './db/db.php';

if(!isset($_GET['page']) || empty($_GET['page']))
{
  include "./pages/dashboard.php";
}


if(isset($_GET['page']) && ! empty ( $_GET['page'] ) ) {
  switch ($_GET['page']) {
      case 'dashboard':
        include "./pages/dashboard.php";
        break;

        case 'prgPompeEauQuotiqien':
          include "./pages/prgPompeEauQuotiqien.php";
          break;


          case 'documents':
            include "./pages/documents.php";
            break;

            case 'listeFix':
              include "./pages/listeFix.php";
              break;
      
              case 'listeInfoCompteur':
                include "./pages/listeInfoCompteur.php";
                break;
                
        case 'ajoutBenefiqueAEP':
          include "./pages/ajoutBenefiqueAEP.php";
          break;

          case 'ajoutBenefiquePI':
            include "./pages/ajoutBenefiquePI.php";
            break;

           
          case 'modifBenefiqueAEP':
            include "./pages/modifBenefiqueAEP.php";
            break;
        
            case 'listeProblemes':
              include "./pages/listeProblemes.php";
              break;

              case 'ajoutProbleme':
                include "./pages/ajoutProbleme.php";
                break;

                case 'modifProbleme':
                  include "./pages/modifProbleme.php";
                  break;


                  case 'listeBenefiqueAEP':
                    include "./pages/listeBenefiqueAEP.php";
                    break;
  
                    case 'listeBenefiquePI':
                      include "./pages/listeBenefiquePI.php";
                      break;

           

                      case 'consommationAEP':
                        include "./pages/consommationAEP.php";
                        break;


                        case 'consommationPI':
                          include "./pages/consommationPI.php";
                          break;


                          case 'consommationPompe':
                            include "./pages/consommationPompe.php";
                            break;


                            case 'consommationPrise':
                              include "./pages/consommationPrise.php";
                              break;
                      


                  case 'modifDonneesCompteur':
                    include "./pages/modifDonneesCompteur.php";
                    break;


                    case 'payementPI':
                      include "./pages/payementPI.php";
                      break;



                      case 'payementAEP':
                        include "./pages/payementAEP.php";
                        break;
  
                        case 'recuPayementAEP':
                          include "./print/recuPayementAEP.php";
                          break;

                          case 'recuPayementPI':
                            include "./print/recuPayementPI.php";
                            break;

                            case 'listeFacture':
                              include "./pages/listeFacture.php";
                              break;
    
           
      


                    case 'printPompiste':
                      include "./pages/printPompiste.php";
                      break;
                    
                      case 'parametreCompte':
                        include "./pages/parametreCompte.php";
                        break;


                      

                        case 'factureAEP':
                          include "./pages/factureAEP.php";
                          break;

                          case 'venteEau':
                            include "./pages/venteEau.php";
                            break;

                            
              case 'demandeBenefique':
                include "./pages/demandeBenefique.php";
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
  <div class="modal fade" id="archive" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <form action="pages/stationPompage.php" method="get">
                <input class="form-check-input" type="moin" name="moin">
                <input type="submit" value="متابعة">
              </form>
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
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">دفتر متابعة الاستهلاك والفوترة الخاصة بكل المنتفعين</h3><br>
      <!--<div class="text-center mb-4">الرجاء إختيار سنة وشهر الدفتر الذي تريد طباعته</div>-->
        
          <div class="btn-wrapper text-center">
          <h6 class="heading-small text-muted mb-4 text-red text-center" id="erreur">  هذه الخاصية غير متوفرة بعد    </h6>
          </div>
        
      
  </div>
 
</div>
  
          </div>
          
      </div>
  </div>
</div>

</div>


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

            
                <a href="index.php?page=listeBenefiquePI" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">منتفع المنطقة السقوية</span>
                </a><br><br>
                <a href="index.php?page=listeBenefiqueAEP" class="btn btn-neutral btn-icon">
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
    <div class="modal fade" id="consommation" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">قائمة الإستهلاك</h3><br>
      <div class="text-center mb-4">الرجاء إختيار نوع الإستهلاك  </div>
        
      <div class="btn-wrapper text-center">
      <a href="index.php?page=consommationPrise" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--text">مأخذ</span>
                </a><br><br>
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
                                                   
                                                    $sql = "SELECT numCompteur FROM benefique_aep where idGess='$idGess' and active=1";
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



<!-- perte EAU -->
<div class="col-md-6">
    <div class="modal fade" id="perteEau" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="post" action="controller/controller.php">
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2">ضياع المياه   </h3><br>
        
      <div class="btn-wrapper text-center">
      <div class="col-lg-12">
        <h6 class="heading-small text-muted mb-4 text-red" id="erreur">الرجاء تعمير معطيات إستهلاك جميع المنتفعين لتحصل على نتيجة الضياع</h6>
      </div>
                
            </div>
        
      
  </div>
 
</div>
  
          </div>
          <div class="modal-footer flex-row-reverse">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                  <button type="button"class="btn btn-primary" name="ajoutPremierVenteEau" >متابعة</button>
                                  
                                  </div>
      </form>
          
      </div>
  </div>
</div>

</div>





<div class="col-md-6">
    <div class="modal fade" id="datePrgPompeEau" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
      <form method="get" action="pageComplet/programPompage.php">
          <div class="modal-body p-0">
            
<div class="card bg-secondary border-0 mb-0">
  <div class="card-header bg-transparent pb-5">
      <h3 class=" text-center mt-2"> </h3><br>
      <div class="text-center mb-4">الرجاء إختيار اليوم  </div>
        
      <div class="btn-wrapper text-center">
             

              <input type="text" name="page" id="" value="prgPompeEauQuotiqien" hidden>
                <input type="date" name="date" required>
                
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
