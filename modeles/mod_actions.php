<?php
class mod_actions {
  private static $source = "mysql:host=localhost;dbname=billeterie_V2";
  private static $utilisateur = "root";
  private static $mot_de_passe = "root";


  //     private static $source = "mysql:host=localhost;dbname=coeurdelion3";
  //    private static $utilisateur = "coeurdelion3";
  //    private static $mot_de_passe = "C3ng4GGohtSn";

  private static $monPDO;
  private static $connexion=null;

  //constructeur
  private function __construct() {
    mod_actions::$monPDO = new PDO(mod_actions::$source, mod_actions::$utilisateur, mod_actions::$mot_de_passe);
    //pdo_conception::$monPDO=new PDO($this->source, $this->utilisateur, $this->mot_de_passe);
    mod_actions::$monPDO->query("SET CHARACTER SET utf8");
  }

  public function __destruct() {
    mod_actions::$monPDO = NULL;
  }

  public static function getmod_action() {
    if(mod_actions::$connexion==NULL){
      mod_actions::$connexion=  new mod_actions;
    }
    return mod_actions::$connexion;

  }
  //Fonction qui teste si l'utilisateur renseigné est bien Admin
  public function getConnexion($login,$mdp) {


    //On teste si l'utilisateur est Particulier
    $sql = "SELECT COUNT(*) FROM Users u inner join User_Particulier p on u.id_user=p.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";
    //On teste si la requête passe
    if ($res =  mod_actions::$monPDO->query($sql)) {

      /* Récupère le nombre de lignes qui correspond à la requête SELECT */
      if ($res->fetchColumn() > 0) {

        /* Effectue la vraie requête SELECT et renvoi le résultat */
        $sql = "SELECT * FROM Users u inner join User_Particulier p on u.id_user=p.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";
        $res =  mod_actions::$monPDO->query($sql);
        $admin = $res->fetch();
        $_SESSION['user_type']=$admin['type_user'];
        $_SESSION['user']=$admin;
        return $admin;


      }
      /* Aucune ligne ne correspond -- faire quelque chose d'autre
      On teste si l'utilisateur est Professionnel */
      else {
        //print "Ce n'est pas un Admin.";
        $sql = "SELECT COUNT(*) FROM Users u inner join User_Professionnel p on u.id_user=p.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";
        // On teste si la requête passe
        if ($res =  mod_actions::$monPDO->query($sql)) {

          /* Récupère le nombre de lignes qui correspond à la requête SELECT */
          if ($res->fetchColumn() > 0) {

            /* Effectue la vraie requête SELECT et travaille sur le résultat */
            $sql = "SELECT * FROM Users u inner join User_Professionnel p on u.id_user=p.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";
            $res =  mod_actions::$monPDO->query($sql);
            $admin = $res->fetch();
            $_SESSION['user_type']=$admin['type_user'];
            $_SESSION['user']=$admin;
            return $admin;

          }
          /* Aucune ligne ne correspond -- faire quelque chose d'autre */
          else {
            //print "Ce n'est pas un Professionnel.";
            $sql = "SELECT COUNT(*) FROM Users u inner join User_Admin a on u.id_user=a.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";

            if ($res =  mod_actions::$monPDO->query($sql)) {

              /* Récupère le nombre de lignes qui correspond à la requête SELECT */
              if ($res->fetchColumn() > 0) {

                /* Effectue la vraie requête SELECT et travaille sur le résultat */
                $sql = "SELECT * FROM Users u inner join User_Admin a on u.id_user=a.id_user where mail_user = \"$login\" and pass_user =\"$mdp\";";
                $res =  mod_actions::$monPDO->query($sql);
                $admin = $res->fetch();
                $_SESSION['user_type']=$admin['type_user'];
                $_SESSION['user']=$admin;
                return $admin;

              }
              /* Aucune ligne ne correspond -- faire quelque chose d'autre */
              else {
                //print "Ce n'est pas un Administrateur.";





              }
            }




          }
        }



      }
    }


  }


public function gets_without_option($table){
  $query = "SELECT DISTINCT * FROM $table WHERE 1";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  //$result = mysql_query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}

public function gets_with_option_order($table, $champ, $valeur, $order, $by){
  $query = "SELECT DISTINCT * FROM $table WHERE $champ='".$valeur."' ORDER BY $order $by";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}


function get($table, $champ, $valeur){
	$query = "SELECT DISTINCT * FROM $table WHERE $champ='".$valeur."'";
	$result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetch();
  return $array;
}


// A EXECUTER UNIQUEMENT LORSQU'ON AJOUTE UN UTILISATEUR
public function add_user_theme($idtheme) {
    echo $query = "INSERT INTO Users_themes(id_user,id_theme) VALUES ((SELECT MAX(id_user) from Users),\"$idtheme\" ); ";

    $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");

}


function dateToFr($date){
  $date=date("d-m-Y", strtotime($date));
  return $date;
}




}

?>
