
<?php
//$connection = mysql_connect('localhost', 'coeurdelion3', 'C3ng4GGohtSn')
//or die("Erreur connexion");
//$db = mysql_select_db('coeurdelion3', $connection)
//or die("Erreur connexion");

$connection = mysql_connect('localhost', 'root', 'root')
or die("Erreur connexion");
$db = mysql_select_db('billeterie_V3', $connection)
or die("Erreur connexion");

//On teste si le paramètre uc n'est renseigné
if (isset($_REQUEST['ajax'])) { //on définit uc par "accueil" par défaut
  $ajax = $_REQUEST['ajax']; // sinon uc récupère sa valeur
}

switch ($ajax) {
  // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné


  case 'update_users': {


    $id = $_POST['fid_user'];
    $nom = utf8_decode($_POST['fnom_user']);
    $prenom = utf8_decode($_POST['fprenom_user']);
    $tel = utf8_decode($_POST['ftel_user']);
    $mail = utf8_decode($_POST['fmail_user']);


    $requete = "update Users set nom_user=\"$nom\", prenom_user=\"$prenom\", tel1_user=\"$tel\", mail_user=\"$mail\" where id_user=\"$id\";";
    $query=mysql_query($requete);

    if(mysql_affected_rows()>0){
      echo "1";
    }else{
      echo "2".$prenom;
    }



    break;
  }

  case 'activer_user': {
    $iduser = $_POST['firstname'];


      $requete = "update Users set etat_user=1 where id_user=\"$iduser\";";
      $query=mysql_query($requete) or die('0');
      if(mysql_affected_rows()>0){
        echo "1";
      }else{
        echo "0".$requete;
      }
break;
  }

  case 'desactiver_user': {
    $iduser = $_POST['firstname'];


      $requete = "update Users set etat_user=0 where id_user=\"$iduser\";";
      $query=mysql_query($requete) or die('0');
      if(mysql_affected_rows()>0){
        echo "1";
      }else{
        echo "0".$requete;
      }




    break;
  }

  case 'check_mail': {
    $uname=$_GET['uname'];
    $requete = "SELECT mail_user FROM Users WHERE mail_user = \"$uname\" ";

    $query=mysql_query($requete);

    //Prints the result
    if (mysql_num_rows($query)<1) {
      echo "<div class=\"alert alert-success\">
      <button class=\"close\" data-dismiss=\"alert\">×</button>
      <strong>Disponible !</strong> Cet email est disponible.
      </div>";
    }
    else{
      echo "<div class=\"alert alert-danger\">
      <button class=\"close\" data-dismiss=\"alert\">×</button>
      <strong>Existe déjà !</strong> Cet email est déjà utilisé.
      </div>";
    }

    break;
  }


  case 'delete_theme': {
    $idtheme = $_POST['firstname'];
    $requete = "DELETE FROM Themes where id_theme=".$idtheme."; ";
    $query=mysql_query($requete) or die('0');

    if(mysql_affected_rows()>0){
      echo "1";
    }else{
      echo "0";
    }
    break;
  }

  case 'update_theme': {
    $idtheme = $_POST['firstname'];
    $nomtheme =  utf8_decode($_POST['fnomtheme']);
    if(preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$#', $_POST['fnomtheme'])){
      $requete = "update Themes set nom_theme=\"$nomtheme\" where id_theme=\"$idtheme\";";
      $query=mysql_query($requete) or die('0');
      if(mysql_affected_rows()>0){
        echo "1";
      }else{
        echo "0";
      }

    }
    else {
      echo "0";
    }



    break;
  }

  case 'delete_domaine': {
    $iddomaine = $_POST['firstname'];
    $requete = "DELETE FROM Domaines_Activites where id_domaine=".$iddomaine."; ";
    $query=mysql_query($requete) or die('0');

    if(mysql_affected_rows()>0){
      echo "1";
    }else{
      echo "0";
    }
    break;
  }

  case 'update_domaine': {
    $iddomaine = $_POST['firstname'];
    $nomdomaine =  utf8_decode($_POST['fnomdomaine']);
    if(preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$#', $_POST['fnomdomaine'])){
      $requete = "update Domaines_Activites set nom_domaine=\"$nomdomaine\" where id_domaine=\"$iddomaine\";";
      $query=mysql_query($requete) or die('0');
      if(mysql_affected_rows()>0){
        echo "1";
      }else{
        echo "0";
      }

    }
    else {
      echo "0";
    }



    break;
  }


}





?>
