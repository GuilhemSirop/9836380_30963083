<?php

//On teste si le paramètre uc n'est renseigné
if (!isset($_REQUEST['view'])) { //on définit uc par "accueil" par défaut
	$view = 'dashboard';
} else {
	$view = $_REQUEST['view']; // sinon uc récupère sa valeur
}

//include ('admin/vues/menuInferieurAdmin.php');

switch ($view) {
	// on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
	case 'dashboard': {

		include("vues/gestion_users/v_gestion_users.php");//dans ce cas on affiche directement l'index d'administration

		include("vues/gestion_users/v_gestion_users_en_attente.php");
		include("vues/gestion_users/v_gestion_users_new.php");
		break;
	}

	case 'fiche_user': {
		if (isset($_REQUEST['user'])) {
			$id_user=$_REQUEST['user'];
			$user = $connexion->get("Users", "id_user", $id_user);
			if (!empty ($user)){

				include ("vues/gestion_users/v_gestion_users_fiche.php");
			}
			else {
				echo "erreur";
			}


		}

		break;
	}


	case 'add_user': {
		include ("vues/gestion_users/v_gestion_users_add.php");
		break;
	}

	case 'add_a_user': {

		foreach($_POST as $key => $val) echo '$_POST["'.$key.'"]='.$val.'<br />';

		// SI ON VALIDE LE FORMULAIRE PARTICULIER
		if (isset($_POST['submit_particulier'])) {

			if (!empty($_POST['nom']) && !empty($_POST['prenom'])  && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['adresse']) && !empty($_POST['cp']) ) {
				if (!empty($_POST['ville']) && !empty($_POST['tel1'])  && !empty($_POST['mail']) && isset($_POST['newsletter']) ) {
					//echo "tout est correctement rempli !";
					$nom = $_POST["nom"];
					$prenom = $_POST["prenom"];

					$mdp1 = sha1($_POST["mdp1"]);
					$mdp2 = sha1($_POST["mdp2"]);
					$adresse = $_POST["adresse"];
					$cp = $_POST["cp"];
					$ville = $_POST["ville"];
					$tel1 = $_POST["tel1"];
					$tel2 = $_POST["tel2"];
					$mail = $_POST["mail"];
					$newsletter = $_POST["newsletter"];
					$com_visible = $_POST["com_visible"];
					$com_masque = $_POST["com_masque"];


					//Si l'utilisateur est activé
					if (isset($_POST["etat_user"]) && $_POST["etat_user"]==1){
						$etat_user = $_POST["etat_user"];

					}
					else {
						$etat_user = 0;
					}

					//on récupère la date actuelle
					$type_user="particulier";


					$mail_existant = $connexion->compare_value_table("Users","mail_user",$mail);
					//var_dump($login_existant);

					if ($mail_existant['result'] == 0) {

						//on teste si les deux mot de passes sont identiques
						if ($mdp1 == $mdp2) {
							//on ajoute l'utilisateur Particulier
							$ajout_user = $connexion->add_user($type_user,$nom,$prenom,$mdp2,$adresse,$cp,$ville,$tel1,$tel2,$mail,$newsletter,$com_visible,$com_masque,$etat_user);

							//array THEMES
							if (isset($_POST["themes"]) ){
								$themes=$_POST["themes"];
								//var_dump($themes);
								foreach ($themes as $idtheme) {
									echo "voici le thème :".$idtheme;
									$ajout_user_theme = $connexion->add_user_theme($idtheme);
								}
							}
							// On renvoi à l'interface de gestion des Utilisateurs
							?>
							<script type="text/javascript">location.href = 'index.php?ac=gestion_users'</script>
							<?php

						}
						else {
							$erreur= "Les deux mots de passe ne sont pas identiques";
							include('vues/gestion_users/v_gestion_users_add.php');

						}

				}
				else {
						$erreur= "Cet eMail est déjà utilisé !";
						include('vues/gestion_users/v_gestion_users_add.php');

					}


				}
				else {
					$erreur= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
					include('vues/gestion_users/v_gestion_users_add.php');
				}

			}
			else {
				$erreur= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
				include('vues/gestion_users/v_gestion_users_add.php');
			}


			//if (!preg_match("/^[a-zA-Z ]*$/",$name))
		}


		// SI ON VALIDE LE FORMULAIRE PROFESSIONNEL
		if (isset($_POST['submit_professionnel'])) {
			if (!empty($_POST['nom'])  && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && isset($_POST['newsletter']) ) {
				if (!empty($_POST['ville']) && !empty($_POST['tel1'])  && !empty($_POST['mail']) && !empty($_POST['comite']) && !empty($_POST['raison_sociale']) && !empty($_POST['siret']) && !empty($_POST['activite'])  ) {
					//echo "tout est correctement rempli !";
					$comite = $_POST["comite"];
					$raison_sociale = $_POST["raison_sociale"];
					$siret = $_POST["siret"];
					$activite = $_POST["activite"];

					$nom = $_POST["nom"];
					//$prenom = $_POST["prenom"];
					//$login = $_POST["login"];
					$mdp1 = sha1($_POST["mdp1"]);
					$mdp2 = sha1($_POST["mdp2"]);
					$adresse = $_POST["adresse"];
					$cp = $_POST["cp"];
					$ville = $_POST["ville"];
					$tel1 = $_POST["tel1"];
					$tel2 = $_POST["tel2"];
					$mail = $_POST["mail"];
					$newsletter = $_POST["newsletter"];
					$com_visible = $_POST["com_visible"];
					$com_masque = $_POST["com_masque"];


					//Si l'utilisateur est activé
					if (isset($_POST["etat_user"]) && $_POST["etat_user"]==1){
						$etat_user = $_POST["etat_user"];

					}
					else {
						$etat_user = 0;
					}

					//on récupère le type d'utilisateur
					if ($comite == 0) {
						$type_user="entreprise";
					}
					elseif ($comite == 1) {
						$type_user="comite";
					}


					//On teste si le mail existe déjà

					$mail_existant = $connexion->compare_value_table("Users","mail_user",$mail);
					//var_dump($login_existant);

					if ($mail_existant['result'] == 0) {

					// Si le mail n'existe pas, c'est à dire qu'il n'a pas compter de champs login avec cette valeur
						//on teste si les deux mot de passes sont identiques
						if ($mdp1 == $mdp2) {
							//on ajoute l'utilisateur Particulier
							$ajout_user = $connexion->add_user($type_user,$nom,$login,$mdp2,$adresse,$cp,$ville,$tel1,$tel2,$mail,$newsletter,$com_visible,$com_masque,$etat_user,$siret,$raison_sociale,$comite);
							var_dump($ajout_user);
							//array THEMES
							if (isset($_POST["themes"]) && ($ajout_user !== "0") ){
								$themes=$_POST["themes"];
								//var_dump($themes);
								foreach ($themes as $idtheme) {
									echo "voici le thème :".$idtheme;
									$ajout_user_theme = $connexion->add_user_theme($idtheme);
								}
							}
							// On renvoi à l'interface de gestion des Utilisateurs
							?>
							<!--<script type="text/javascript">location.href = 'index.php?ac=gestion_users'</script>
							--><?php

						}
						else {
							$erreur= "Les deux mots de passe ne sont pas identiques";
							include('vues/gestion_users/v_gestion_users_add.php');

						}

				}
				else {
						$erreur= "Cet eMail est déjà utilisé !";
						include('vues/gestion_users/v_gestion_users_add.php');

					}


				}
				else {
					$erreur= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
					include('vues/gestion_users/v_gestion_users_add.php');
				}

			}
			else {
				$erreur= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
				include('vues/gestion_users/v_gestion_users_add.php');
			}

		}



		// SI ON VALIDE LE FORMULAIRE ADMIN
		if (isset($_POST['submit_admin'])){
			if (isset ($_POST['type_user']) && !empty($_POST['nom'])  && !empty($_POST['prenom']) && !empty($_POST['mail'])   && !empty($_POST['mdp1']) && !empty($_POST['mdp2'])  ) {
				echo "ok";

					$nom = $_POST["nom"];
					$prenom = $_POST["prenom"];
					$mail = $_POST["mail"];
					$mdp1 = sha1($_POST["mdp1"]);
					$mdp2 = sha1($_POST["mdp2"]);
					$com_visible = $_POST["com_visible"];
					$type_user = $_POST['type_user'];


					//Si l'utilisateur est activé
					if (isset($_POST["etat_user"]) && $_POST["etat_user"]==1){
						$etat_user = $_POST["etat_user"];

					}
					else {
						$etat_user = 0;
					}


					//on récupère le type d'utilisateur
					switch ($type_user) {
				    // on affiche l'accueil, on teste si la variable SESSION utilisateur est renseigné
				    case 'commercial': {
							$type_commercial = 1;
							$type_technique = 0;
							$type_comptable = 0;
							$type_direction = 0;
				      break;
				    }
						case 'technique': {
							$type_commercial = 0;
							$type_technique = 1;
							$type_comptable = 0;
							$type_direction = 0;
				      break;
				    }
						case 'comptable': {
							$type_commercial = 0;
							$type_technique = 0;
							$type_comptable = 1;
							$type_direction = 0;
				      break;
				    }
						case 'direction': {
							$type_commercial = 0;
							$type_technique = 0;
							$type_comptable = 0;
							$type_direction = 1;
				      break;
				    }
					}




					//On teste si le mail existe déjà
					$mail_existant = $connexion->compare_value_table("Users","mail_user",$mail);
					//var_dump($login_existant);

					// Si le mail n'existe pas, c'est à dire qu'il n'a pas compter de champs login avec cette valeur
					if ($mail_existant['result'] == 0) {

						//on teste si les deux mot de passes sont identiques
						if ($mdp1 == $mdp2) {



							//on ajoute l'utilisateur Admin
							$ajout_user = $connexion->add_user_admin($type_user,$nom,$prenom,$mdp2,$mail,$com_visible,$etat_user,$type_direction,$type_commercial,$type_technique,$type_comptable);
							var_dump($ajout_user);

							// On renvoi à l'interface de gestion des Utilisateurs
							?>
							<!--<script type="text/javascript">location.href = 'index.php?ac=gestion_users'</script>
							--><?php

						}
						else {
							$erreur= "Les deux mots de passe ne sont pas identiques";
							include('vues/gestion_users/v_gestion_users_add.php');

						}

				}
				else {
						$erreur= "Cet eMail est déjà utilisé !";
						include('vues/gestion_users/v_gestion_users_add.php');

					}




			}
			else {
				$erreur= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
				include('vues/gestion_users/v_gestion_users_add.php');
			}
		}


		break;
	}
}
