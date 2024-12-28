<?php 
 session_start();
include "head.php";

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
              
            case 'request':
              include "./pages/request.php";
              break;

              case 'ajoutProbleme':
                include "./pages/ajoutProbleme.php";
                break;

                case 'list':
                  include "./pages/list.php";
                  break;
                  case 'comptes':
                  include "./pages/comptes.php";
                  break;

                  case 'refuse':
                    include "./pages/refuse.php";
                    break;

                    case 'parametre':
                      include "./pages/parametre.php";
                      break;



                case 'modifProbleme':
                  include "./pages/modifProbleme.php";
                  break;

                

           

                case 'donneesCompteur':
                  include "./pages/donneesCompteur.php";
                  break;



                  case 'modifDonneesCompteur':
                    include "./pages/modifDonneesCompteur.php";
                    break;

           
      


                    case 'printPompiste':
                      include "./pages/printPompiste.php";
                      break;
                    



      default:
        include "./pages/dashboard.php";
        break;
  }
}


include "topNavBar.php";

include "footer.php" 

?>