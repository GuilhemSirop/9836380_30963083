<?php
session_start();

//initialisation de la variable commande
include("modeles/mod_actions.php");
//lancement de la connexion en pdo à la base de données
$connexion = mod_actions::getmod_action();
//On ajoute l'entete (title/description/stylesheets...)
include ('includes/head.php');

echo "utilisateur : ".$_SESSION['user_type'];
//Dans le cas où un utilisateur est connecté
if(isset($_SESSION['user_type']) ) {
  //On teste l'utilisateur
  if ($_SESSION['user_type']=="particulier") {
    // Si c'est un particulier
    include ('includes/basic/menu.php');

  }
  elseif (($_SESSION['user_type']=="entreprise") || ($_SESSION['user_type']=="comite")) {
    // Si c'est un particulier
    include ('includes/pro/menu.php');

  }
  elseif ( ($_SESSION['user_type']=="commercial") || ($_SESSION['user_type']=="comptable") || ($_SESSION['user_type']=="technique") || ($_SESSION['user_type']=="direction") ) {
    // Si c'est un particulier
    include ('includes/admin/menu.php');

  }

  else {
    include ('includes/menu.php');
  }

}
else {

  //include ('includes/topbarre_user.php');
  include ('includes/menu.php');
}



//On ajoute le menu inférieur de l'administrateur avec les différentes options d'Administrations


//On teste si le paramètre uc n'est renseigné
if (!isset($_REQUEST['uc'])) { //on définit uc par "accueil" par défaut
  $uc = 'accueil';
} else {
  $uc = $_REQUEST['uc']; // sinon uc récupère sa valeur
}

//include ('admin/vues/menuInferieurAdmin.php');

switch ($uc) {
  // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
  case 'accueil': {

    include("vues/v_accueil.php");//dans ce cas on affiche directement l'index d'administration
    break;
  }

  // POUR LA PAGE SOCIÉTÉ
  case 'societe': {

    include("vues/v_organiser.php");
    include("vues/v_galerie.php");
    break;
  }
  case 'organiser': {

    include("vues/v_organiser.php");

    break;
  }

  case 'galerie': {

    include("vues/v_galerie.php");

    break;
  }

  case 'presse': {

    include("vues/v_presse.php");

    break;
  }
  case 'agenda': {

    include("vues/v_agenda.php");

    break;
  }
  case 'contact': {

    include("vues/v_contact.php");

    break;
  }

  case 'inscription': {

    include("vues/v_frm_inscription.php");
    break;

  }

  case 'connexion': {

    include("controleurs/c_connexion.php");
    break;

  }

  case 'admin': {

    include("controleurs/c_admin.php");
    break;

  }

  case 'basic': {

    include("controleurs/c_basic.php");
    break;

  }



  case 'deconnexion': {
    session_destroy();
    ?>
    <script type="text/javascript">location.href = 'index.php';</script>
    <?php
    break;

  }


}

include ('includes/footer.php');
