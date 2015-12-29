<?php
//On récupère les valeurs entrés en POST
if (isset ($_POST['login']) || isset ($_POST['pass'])) {
echo   $login = $_POST['login'];
echo   $mdp = sha1($_POST['pass']);

  // On réalise une requête pour tester ce champs dans la bdd
  $utilisateur = $connexion->getConnexion($login,$mdp);
}
else {
  $utilisateur=NULL;
}
//var_dump($utilisateur);
if (empty($utilisateur)) {

  $erreur="Vos identifiants sont incorrects, veuillez réessayer <br> Sinon, inscrivez-vous !";
  $lien1="accueil";
  $lien2="inscription";
  $option1="Retourner à l'accueil";
  $option2="Inscrivez-vous";
  include("vues/v_erreur.php");
}
else {
  if(isset($_SESSION['user_type']) ) {
    //On teste l'utilisateur
    if ($_SESSION['user_type']=="particulier") {
      // Si c'est un particulier
      ?>
      <script type="text/javascript">location.href = 'index.php';</script>
      <?php

    }
    elseif (($_SESSION['user_type']=="entreprise") || ($_SESSION['user_type']=="comite")) {
      // Si c'est un particulier
      ?>
      <script type="text/javascript">location.href = 'index.php';</script>
      <?php

    }
    elseif ( ($_SESSION['user_type']=="commercial") || ($_SESSION['user_type']=="comptable") || ($_SESSION['user_type']=="technique") || ($_SESSION['user_type']=="direction") ) {
      // Si c'est un admin
      ?>
      <script type="text/javascript">location.href = 'admin/index.php';</script>
      <?php
    }

    else {
      ?>
      <script type="text/javascript">location.href = 'admin/index.php';</script>
      <?php
    }

  }
  else {

    //include ('includes/topbarre_user.php');
    include ('includes/menu.php');
  }

  /*switch ($_SESSION['user_type']) {
  // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
  case 'basic': {
  ?>
  <script type="text/javascript">location.href = 'index.php';</script>
  <?php
  break;
}

// POUR LA PAGE SOCIÉTÉ
case 'pro': {

?>
<script type="text/javascript">location.href = 'index.php';</script>
<?php
break;
}
case 'adm': {

?>
<script type="text/javascript">location.href = 'admin/index.php';</script>
<?php

break;
}
} */

}

//echo $_SESSION['user_type'];
//die($admin);
// Si on obtient un champs on regarde si c'est un compte Admin ou Secrétaire
