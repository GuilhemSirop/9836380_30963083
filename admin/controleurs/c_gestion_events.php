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
    }
