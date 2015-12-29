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

				include("vues/v_dashboard.php");//dans ce cas on affiche directement l'index d'administration
			//include("vues/v_gestion_events_new.php");
        break;
  		}
			// lorsqu'on clique sur EVENEMENTS -> AJOUTER
      case 'accueil': {
				echo "accueil";
        include ("vues/gestion_frontend/v_gestion_fe_accueil.php");

        break;
      }

			case 'galerie': {
				echo "galerie";
        include ("vues/gestion_frontend/v_gestion_fe_galerie.php");

        break;
      }
			case 'presse': {
				echo "presse";
        include ("vues/gestion_frontend/v_gestion_fe_presse.php");

        break;
      }
			case 'documents': {
				echo "documents";
        include ("vues/gestion_frontend/v_gestion_fe_documents.php");

        break;
      }

			default : {
				include("vues/v_dashboard.php");//dans ce cas on affiche directement l'index d'administration
			//include("vues/v_gestion_events_new.php");
        break;
			}
			// lorsqu'on clique sur EVENEMENTS -> UN EVENEMENT

    }
