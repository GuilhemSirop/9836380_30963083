<?php

//On teste si le paramètre uc n'est renseigné
if (!isset($_REQUEST['action'])) { //on définit uc par "accueil" par défaut
	$action = 'dashboard';
} else {
	$action = $_REQUEST['action']; // sinon uc récupère sa valeur
}

//include ('admin/vues/menuInferieurAdmin.php');

switch ($action) {
	// lorsqu'on clique sur EVENEMENTS -> GESTION EVENEMENTS
	case 'add_a_event': {

		// SI ON VALIDE LE FORMULAIRE EVENEMENT
		foreach($_POST as $key => $val) echo '$_POST["'.$key.'"]='.$val.'<br />';

		//foreach($_FILES as $key1 => $val1) var_dump($_FILES[$key1]);

		if (!empty($_POST['nom']) && !empty($_POST['description_1'])  && !empty($_POST['description_2']) && !empty($_POST['domaine']) && !empty($_POST['themes']) && !empty($_POST['date_debut_ev']) ) {
			if (!empty($_POST['date_fin_ev']) && !empty($_POST['heure_debut_ev'])  && !empty($_POST['heure_fin_ev']) && !empty($_POST['date_debut_res']) && !empty($_POST['date_fin_res']) && !empty($_POST['heure_debut_res'])  && !empty($_POST['heure_fin_res']) ) {
				if (!empty($_POST['nb_entrees']) && !empty($_POST['prix_particulier'])  && !empty($_POST['prix_entreprise']) && !empty($_POST['prix_comite']) ) {



					$nom = $_POST["nom"];
					//$description1 = addslashes(htmlspecialchars($_POST["description_1"]);
					$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
					$allowedTags.='<li><ol><ul><span><div><br><ins><del>';

					$description1 = htmlspecialchars(htmlentities($_POST['description_1']));

					$description2 = htmlspecialchars(htmlentities($_POST["description_2"]));
					$themes = $_POST["themes"];
					$domaine = $_POST["domaine"];


					$date_debut_ev = $connexion->dateToEn($_POST["date_debut_ev"]);
					$date_fin_ev = $connexion->dateToEn($_POST["date_fin_ev"]);
					$heure_debut_ev = $_POST["heure_debut_ev"];
					$heure_fin_ev = $_POST["heure_fin_ev"];

					$date_debut_res = $connexion->dateToEn($_POST["date_debut_res"]);
					$date_fin_res = $connexion->dateToEn($_POST["date_fin_res"]);
					$heure_debut_res = $_POST["heure_debut_res"];
					$heure_fin_res = $_POST["heure_fin_res"];

					$nbentrees = $_POST['nb_entrees'];

					$prix_particulier=$_POST['prix_particulier'];
					$prix_entreprise=$_POST['prix_entreprise'];
					$prix_comite=$_POST['prix_comite'];

					//on récupère l'id avant qu'il soit créé pour nommer les répertoires pour les photos
					$id_evenement_max=$connexion->get_id_before_action("Evenements");
					$id_evenement_actuel=$id_evenement_max['idmax']+1;

					$extension_news=$connexion->get_file_ext($_FILES['img_newsletter']['name']);
					$extension_imgprincipale=$connexion->get_file_ext($_FILES['img_principale']['name']);
					//on récupère le nom le l'image Newsletter pour la BDD
					$nom_img_news="img_newsletter.".$extension_news;
					$nom_img_principale="img_principale.".$extension_imgprincipale;
					$nom_img_1="";
					$nom_img_2="";
					$nom_img_3="";
					$nom_img_4="";

					//var_dump($id_evenement_actuel);
					//On teste si le nom existe déjà
					$nom_existant = $connexion->compare_value_table("Evenements","nom_event",$nom);
					if ($nom_existant['result'] == 0) {

						// On crée les fichiers de l'évènement
						$structure="../img/events/event_".$id_evenement_actuel."/images_event";
						$creation_dossiers=mkdir($structure, 0777, true);

						//Si le client est renseigné
						if (isset($_POST['client'])){
							$client=$_POST['client'];
						}
						else { $client=""; }

						$ajout_evenement = $connexion->add_event($id_evenement_actuel,$client,$nom,$description1,$description2,$nom_img_principale,$nom_img_news,$domaine,$date_debut_ev,$date_fin_ev,$heure_debut_ev,$heure_fin_ev,$date_debut_res,$date_fin_res,$heure_debut_res,$heure_fin_res,$nbentrees,$prix_particulier,$prix_entreprise,$prix_comite);
						//On ajoute l'évènement puisque tous les champs obligatoires sont remplis
						if ($ajout_evenement !== FALSE ) {
							echo "Bien ajouté dans la BDD";
							// On ajoute les différents thèmes
							foreach ($themes as $idtheme) {
								$ajout_event_theme = $connexion->add_event_theme($idtheme,$id_evenement_actuel);
							}

							//Si on a renseigner l'image PRINCIPALE
							if (isset($_FILES['img_principale'])){

								$upload_imgprincipale = $connexion->upload('img_principale','../img/events/event_'.$id_evenement_actuel.'/img_principale.'.$extension_news,10485760, array('png','gif','jpg','jpeg') );


								if ($upload_imgprincipale !== FALSE) {
									$success[]="- Ajout de l'image Principale ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image Principale (Vérifiez que le poids ne dépasse pas les 3Mo) !";


								}

							}
							//Si on a renseigner l'image de Newsletter
							if (isset($_FILES['img_newsletter'])){

								$upload_newsletter = $connexion->upload('img_newsletter','../img/events/event_'.$id_evenement_actuel.'/img_newsletter.'.$extension_news,10485760, array('png','gif','jpg','jpeg') );


								if ($upload_newsletter !== FALSE) {
									$success[]="- Ajout de l'image de la Newsletter ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image de Newsletter (Vérifiez que le poids ne dépasse pas les 3Mo) !";


								}

							}
							//Si on a renseigné l'image 1
							if (!empty($_FILES['img_1']['name'])){

								$extension=$connexion->get_file_ext($_FILES['img_1']['name']);
								$upload_img1 = $connexion->upload('img_1','../img/events/event_'.$id_evenement_actuel.'/images_event/img_1.'.$extension,10485760, array('png','gif','jpg','jpeg') );

								//on récupère le nom le l'image 1 pour la BDD
								$nom_img_1="img_1.".$extension;

								if ($upload_img1 !== FALSE) {
									$success[]="- Ajout de l'image 1 ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image 1 ! (Vérifiez que le poids ne dépasse pas les 3Mo)";


								}

							}

							//Si on a renseigné l'image 2
							if ( !empty($_FILES['img_2']['name']) ) {
								//echo "Voici l'image 2  : ".var_dump($_FILES["img_2"]);
								$extension=$connexion->get_file_ext($_FILES['img_2']['name']);
								$upload_img2 = $connexion->upload('img_2','../img/events/event_'.$id_evenement_actuel.'/images_event/img_2.'.$extension,10485760, array('png','gif','jpg','jpeg') );

								//on récupère le nom le l'image 3 pour la BDD
								$nom_img_2="img_2.".$extension;
								if ($upload_img2 !== FALSE) {
									$success[]="- Ajout de l'image 2 ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image 2 ! (Vérifiez que le poids ne dépasse pas les 3Mo)";


								}

							}

							//Si on a renseigné l'image 4
							if (!empty($_FILES['img_3']['name'])){
								$extension=$connexion->get_file_ext($_FILES['img_3']['name']);
								$upload_img3 = $connexion->upload('img_3','../img/events/event_'.$id_evenement_actuel.'/images_event/img_3.'.$extension,10485760, array('png','gif','jpg','jpeg') );

								//on récupère le nom le l'image 3 pour la BDD
								$nom_img_3="img_3.".$extension;
								if ($upload_img3 !== FALSE) {
									$success[]="- Ajout de l'image 3 ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image 3 ! (Vérifiez que le poids ne dépasse pas les 3Mo)";


								}

							}

							//Si on a renseigné l'image 4
							if (!empty($_FILES['img_4']['name'])){
								$extension=$connexion->get_file_ext($_FILES['img_4']['name']);
								$upload_img1 = $connexion->upload('img_4','../img/events/event_'.$id_evenement_actuel.'/images_event/img_4.'.$extension,10485760, array('png','gif','jpg','jpeg') );

								//on récupère le nom le l'image 4 pour la BDD
								$nom_img_4="img_4.".$extension;
								if ($upload_img1 !== FALSE) {
									$success[]="- Ajout de l'image 4 ok !";

								}
								else {
									$erreur[]= "- Erreur lors de l'ajout de l'image 4 ! (Vérifiez que le poids ne dépasse pas les 3Mo)";


								}

							}

							include('vues/gestion_events/v_gestion_events_add.php');


						}
						else {
							$erreur[] = "Erreur lors de l'ajout dans la base";
							include('vues/gestion_events/v_gestion_events_add.php');
							//$ajout_evenement = $connexion->add_event("Evenements","nom_event",$nom);
						}

						//array THEMES

					}
					else {
						$erreur[]= "Ce nom est déjà utilisé !";
						include('vues/gestion_events/v_gestion_events_add.php');

					}

				}
				else {
					$erreur[]= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
					include('vues/gestion_events/v_gestion_events_add.php');
				}
			}
			else {
				$erreur[]= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
				include('vues/gestion_events/v_gestion_events_add.php');
			}

		}
		else {
			$erreur[]= "Les champs obligatoires mentionnés par (*) ne sont pas tous remplis";
			include('vues/gestion_events/v_gestion_events_add.php');
		}



		//include("vues/v_gestion_events_new.php");
		break;
	}
	// lorsqu'on clique sur EVENEMENTS -> AJOUTER


}
