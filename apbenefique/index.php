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
        case 'demande':
          include "./pages/demande.php";
          break;
          case 'listePompiste':
            include "./pages/listePompiste.php";
            break;
            case 'listeBenefique':
              include "./pages/listeBenefique.php";
              break;
              
          case 'listeDemandes':
            include "./pages/listeDemandes.php";
            break;

            case 'parametreCompte':
              include "./pages/parametreCompte.php";
              break;

              case 'modifPompiste':
                include "./pages/modifPompiste.php";
                break;

                case 'printPompiste':
                  include "./pages/printPompiste.php";
                  break;


                  case 'recuconsommation':
                    include "./pages/recuconsommation.php";
                    break;
                

              case 'listeDemandesEau':
                include "./pages/listeDemandesEau.php";
                break;

               
            case 'ajoutPi':
              include "./pages/ajoutPi.php";
              break;

              case 'ajoutPea':
                include "./pages/ajoutPea.php";
                break;
      
      default:
        include "./pages/dashboard.php";
        break;
  }
}


include "topNavBar.php";

include "footer.php" 

?>