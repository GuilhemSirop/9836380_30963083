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

public function gets_without_option($table){
  $query = "SELECT DISTINCT * FROM $table WHERE 1";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  //$result = mysql_query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}

public function gets_without_option_order($table, $order, $by){
 $query = "SELECT DISTINCT * FROM $table ORDER BY $order $by";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}

public function gets_with_option_order($table, $champ, $valeur, $order, $by){
  $query = "SELECT DISTINCT * FROM $table WHERE $champ='".$valeur."' ORDER BY $order $by";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}

public function gets_without_option_inner($table1,$id1,$tablejoin,$idjoin){
  $query = "SELECT DISTINCT * FROM $table1 INNER JOIN $tablejoin ON $table1"."."."$id1=$tablejoin"."."."$idjoin";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}


function get($table, $champ, $valeur){
	$query = "SELECT DISTINCT * FROM $table WHERE $champ=\"$valeur\";";
	$result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetch();
  return $array;
}

function get_users_en_attente(){
  $query = "SELECT  * FROM Users u INNER JOIN User_professionnel p on u.id_user=p.id_user WHERE validation=0;";
  $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");
  $array = $result->fetchall();
  return $array;
}

public function add_user($type_user,$nom,$prenom,$mdp,$adresse,$cp,$ville,$tel1,$tel2,$mail,$newsletter,$com_visible,$com_masque,$etat_user,$siret,$raison_sociale,$comite) {

  if ($type_user == "particulier") {
     $query = "INSERT INTO Users(nom_user,prenom_user,pass_user,adresse,code_postale,ville,tel1_user,tel2_user,mail_user,newsletter_user,com_visible,com_masque,type_user,etat_user,date_inscription) VALUES (\"$nom\",\"$prenom\",\"$mdp\",\"$adresse\",\"$cp\",\"$ville\",\"$tel1\",\"$tel2\",\"$mail\",\"$newsletter\",\"$com_visible\",\"$com_masque\",\"$type_user\",\"$etat_user\",now() ); INSERT INTO User_Particulier (id_user) VALUES ((select max(id_user) from Users));";

    $result = mod_actions::$monPDO->query($query) or die ("0");

  }
  if (($type_user == "entreprise") || ($type_user == "comite")) {
    echo $query = "INSERT INTO Users(nom_user,pass_user,adresse,code_postale,ville,tel1_user,tel2_user,mail_user,newsletter_user,com_visible,com_masque,type_user,etat_user,date_inscription) VALUES (\"$nom\",\"$mdp\",\"$adresse\",\"$cp\",\"$ville\",\"$tel1\",\"$tel2\",\"$mail\",\"$newsletter\",\"$com_visible\",\"$com_masque\",\"$type_user\",\"$etat_user\",now() ); INSERT INTO User_Professionnel (id_user, raison_sociale,siret,comite,validation) VALUES ((SELECT MAX(id_user) FROM Users), \"$raison_sociale\",\"$siret\",\"$comite\",1);";

    $result = mod_actions::$monPDO->query($query) or die ("0");

  }




}

public function add_user_admin($type_user,$nom,$prenom,$mdp,$mail,$com_visible,$etat_user,$type_direction,$type_commercial,$type_technique,$type_comptable) {

if ($type_user == "commercial" || $type_user == "comptable" || $type_user == "technique" || $type_user == "direction") {
  echo $query = "INSERT INTO Users(nom_user,prenom_user,pass_user,mail_user,com_visible,type_user,etat_user,date_inscription) VALUES (\"$nom\",\"$prenom\",\"$mdp\",\"$mail\",\"$com_visible\",\"$type_user\",\"$etat_user\",now() );INSERT INTO User_Admin (id_user, direction,commercial,technique,comptable) VALUES ((SELECT MAX(id_user) FROM Users), \"$type_direction\",\"$type_commercial\",\"$type_technique\",\"$type_comptable\");";

  $result = mod_actions::$monPDO->query($query) or die ("0");

}

}
// A EXECUTER UNIQUEMENT LORSQU'ON AJOUTE UN UTILISATEUR
 function add_user_theme($idtheme) {
    echo $query = "INSERT INTO Users_themes(id_user,id_theme) VALUES ((SELECT MAX(id_user) from Users),\"$idtheme\" ); ";

    $result = mod_actions::$monPDO->query($query) or die ("erreur mysql");

}


function dateToFr($date){
  $date=date("d-m-Y", strtotime($date));
  return $date;
}

function compare_value_table($table,$champ,$value){
  $query = "SELECT COUNT($champ) AS result  FROM $table WHERE $champ=\"$value\";";
	$result = mod_actions::$monPDO->query($query) or die ("0");
  //Si il y a un resultat
  $array = $result->fetch();
  return $array;
}


function is_valid_date($value, $format = 'dd-mm-yyyy'){
    if(strlen($value) >= 6 && strlen($format) == 10){

        // find separator. Remove all other characters from $format
        $separator_only = str_replace(array('m','d','y'),'', $format);
        $separator = $separator_only[0]; // separator is first character

        if($separator && strlen($separator_only) == 2){
            // make regex
            $regexp = str_replace('mm', '(0?[1-9]|1[0-2])', $format);
            $regexp = str_replace('dd', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
            $regexp = str_replace('yyyy', '(19|20)?[0-9][0-9]', $regexp);
            $regexp = str_replace($separator, "\\" . $separator, $regexp);
            if($regexp != $value && preg_match('/'.$regexp.'\z/', $value)){

                // check date
                $arr=explode($separator,$value);
                $day=$arr[0];
                $month=$arr[1];
                $year=$arr[2];
                if(@checkdate($month, $day, $year))
                    return true;
            }
        }
    }
    return false;
}

function get_field_name_of($table){
	$query = "DESCRIBE $table";
  $result = mod_actions::$monPDO->query($query) or die ("0");
  $array = $result->fetchall();
  return $array;
}


function is_in_table($table, $key, $value){
	$i = 0;
	while (!empty($table[$i])){
		if ($table[$i][$key] == $value)
			return true;
		$i++;
	}
	return false;
}

function create($table, $post){
	$champs = '(';
	$values = '(';
	$res = array();
	$i = 0;
	$field = self::get_field_name_of($table);
	foreach($post as $key => $value){
		if ($key != 'submit'){
			$res[$i]['key'] = $key;
			$res[$i]['value'] = $value;
			$i++;
		}
	}
  echo "coucou";
	$i = 0;
	while (!empty($res[$i])){
		if (self::is_in_table($field, 'Field', $res[$i]['key']) && $res[$i]['key'] != 'id'){
			$champs .= "`".$res[$i]['key']."`,";
			$values .= "'".addslashes($res[$i]['value'])."',";
		}
		$i++;
	}
	if ($champs[strlen($champs) - 1] == ',')
		$champs[strlen($champs) - 1] = ' ';
	if ($values[strlen($values) - 1] == ',')
		$values[strlen($values) - 1] = ' ';
	$champs .= ')';
	$values .= ')';
	$query = "INSERT INTO $table $champs VALUES $values";
	 //$result = mysql_query($query) or die($query);
  return $result = mod_actions::$monPDO->query($query) or die ("0");

}

function update($table, $post){
	$field = get_field_name_of($table);
	$res = array();
	$i = 0;
	foreach($post as $key => $value){
		if ($key != 'submit' && $key != 'id'){
			$res[$i]['key'] = $key;
			$res[$i]['value'] = $value;
			$i++;
		}
	}
	$i = 0;
	$str='';
	while (!empty($res[$i])){
		if (is_in_table($field, 'Field', $res[$i]['key']) && !empty($res[$i+1]))
				$str .= "`".$res[$i]['key']."`=\"".addslashes($res[$i]['value'])."\",";
		if (empty($res[$i+1]))
			if (is_in_table($field, 'Field', $res[$i]['key']))
				$str .= $res[$i]['key']."=\"".addslashes($res[$i]['value'])."\"";
		$i++;
	}
	if ($str[strlen($str) - 1] == ',')
		$str[strlen($str) - 1] = ' ';
	$query = "UPDATE $table SET $str WHERE id=".$post['id'];
	return $result = mysql_query($query)or die($query);
}


}

?>
