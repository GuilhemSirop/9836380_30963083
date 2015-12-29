<?php

//On teste si le paramètre uc n'est renseigné
if (!isset($_REQUEST['module'])) { //on définit uc par "accueil" par défaut
  $module = 'accueil';
} else {
  $module = $_REQUEST['module']; // sinon uc récupère sa valeur
}

//include ('admin/vues/menuInferieurAdmin.php');

switch ($module) {
  // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
  case 'accueil': {

    include("vues/v_accueil.php");//dans ce cas on affiche directement l'index d'administration
    break;
  }

  case 'gestion_users': {

    include("vues/admin/v_gestion_users.php");//dans ce cas on affiche directement l'index d'administration
    break;
  }

  case 'accueil': {

    include("vues/v_accueil.php");//dans ce cas on affiche directement l'index d'administration
    break;
  }
}

?>
