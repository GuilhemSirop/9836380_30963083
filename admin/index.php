<?php
session_start();

//initialisation de la variable commande
include("modeles/mod_actions.php");
//lancement de la connexion en pdo à la base de données
$connexion = mod_actions::getmod_action();
//On ajoute l'entete (title/description/stylesheets...)

include ('includes/adm_head.php');


//Dans le cas où un utilisateur est connecté
if (isset($_SESSION['user_type']) ) {
  //echo "coucou";
  if ( ($_SESSION['user_type']=="commercial") || ($_SESSION['user_type']=="technique") || ($_SESSION['user_type']=="comptable") || ($_SESSION['user_type']=="direction") ) {
    //echo "yesss";
    //include ('includes/adm_topbarre_user.php');
    include ('includes/adm_menu.php');


    //On teste si le paramètre uc n'est renseigné
    if (!isset($_REQUEST['ac'])) { //on définit uc par "accueil" par défaut
      $ac = 'dashboard';
    } else {
      $ac = $_REQUEST['ac']; // sinon uc récupère sa valeur
    }

    //include ('admin/vues/menuInferieurAdmin.php');

    switch ($ac) {
      // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
      case 'dashboard': {

        include("vues/v_dashboard.php");//dans ce cas on affiche directement l'index d'administration
        break;
      }

      case 'gestion_users': {
        include ("controleurs/c_gestion_users.php");

        break;
      }

      case 'gestion_events': {
        include ("controleurs/c_gestion_events.php");

        break;
      }

      case 'gestion_frontend': {
        include ("controleurs/c_gestion_frontend.php");

        break;
      }

      case 'deconnexion': {

        session_destroy();
        ?>
        <script type="text/javascript">location.href = '../index.php';</script>
        <?php
        break;
      }


    }
  }

}

else {
  echo "tu n'est pas connecté pour acceder";
}



include ('includes/adm_footer.php');
