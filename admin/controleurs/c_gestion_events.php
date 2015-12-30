<?php

//On teste si le paramètre uc n'est renseigné
	if (!isset($_REQUEST['view'])) { //on définit uc par "accueil" par défaut
  		$view = 'dashboard';
	} else {
  		$view = $_REQUEST['view']; // sinon uc récupère sa valeur
	}

//include ('admin/vues/menuInferieurAdmin.php');

	switch ($view) {
  		// lorsqu'on clique sur EVENEMENTS -> GESTION EVENEMENTS
			case 'dashboard': {

    		include("vues/gestion_events/v_gestion_events.php");//dans ce cas on affiche directement l'index d'administration
        //include("vues/v_gestion_events_new.php");
        break;
  		}
			// lorsqu'on clique sur EVENEMENTS -> AJOUTER
      case 'add_event': {
        include ("vues/gestion_events/v_gestion_events_add.php");

        break;
      }
			// lorsqu'on clique sur EVENEMENTS -> UN EVENEMENT
      case 'fiche_event': {
				// Si l'id de l'événement est renseigné
				if (isset($_REQUEST['event'])) {
					$id_event=$_REQUEST['event'];
          $event = $connexion->get("Evenements", "id", $id_event);
					if (!empty ($event)){

						include ("vues/gestion_events/v_gestion_events_fiche.php");
					}
					else {
						echo "erreur";
					}


				}


        break;
      }





			case 'add_a_theme': {

				if (!empty($_POST['nom_theme'])){
					$titre=htmlspecialchars($_POST['nom_theme']);
					//$titre=strtr($titre);
					// Si le titre est formé uniquement de bons caractère
					if(preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$#', $titre)) {

						$titre_existant=$connexion->compare_value_table("Themes","nom_theme",$titre);
						if ($titre_existant['result'] == 0) {
							$ajout_theme=$connexion->create("Themes",$_POST);

							//var_dump($ajout_theme);
							$success_theme= "Le thème à été correctement ajouter !";
							//$ajout_theme=$connexion->create("Themes","nom_theme",$titre);
							include('vues/gestion_events/v_gestion_events_add.php');
							//include('vues/gestion_users/v_gestion_users_add.php');
						}
						else {
							$erreur_theme= "Ce nom est déjà utilisé !";
							include('vues/gestion_events/v_gestion_events_add.php');
						}

					}
					else {

						$erreur_theme= "Seul les caractères alpha-numérique et le _ sont acceptés !";
						include('vues/gestion_events/v_gestion_events_add.php');
						//Si tout est OK on enrégistre le pseudo

					}

				}

				else {
					$erreur_theme= "Le nom est vide !";
					include('vues/gestion_events/v_gestion_events_add.php');
				}
				break;
			}


						case 'add_a_domaine': {

							if (!empty($_POST['nom_domaine'])){
								$titre=htmlspecialchars($_POST['nom_domaine']);
								//$titre=strtr($titre);
								// Si le titre est formé uniquement de bons caractère
								if(preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$#', $titre)) {

									$titre_existant=$connexion->compare_value_table("Domaines_Activites","nom_domaine",$titre);
									if ($titre_existant['result'] == 0) {
										$ajout_domaine=$connexion->create("Domaines_Activites",$_POST);

										//var_dump($ajout_theme);
										$success_domaine= "Le Domaine d'activité à été correctement ajouter !";
										//$ajout_theme=$connexion->create("Themes","nom_theme",$titre);
										include('vues/gestion_events/v_gestion_events_add.php');
										//include('vues/gestion_users/v_gestion_users_add.php');
									}
									else {
										$erreur_domaine= "Ce nom est déjà utilisé !";
										include('vues/gestion_events/v_gestion_events_add.php');
									}

								}
								else {

									$erreur_domaine= "Seul les caractères alpha-numérique et le _ sont acceptés !";
									include('vues/gestion_events/v_gestion_events_add.php');
									//Si tout est OK on enrégistre le pseudo

								}

							}

							else {
								$erreur_domaine= "Le nom est vide !";
								include('vues/gestion_events/v_gestion_events_add.php');
							}
							break;
						}

		}
