<script type="text/javascript">
function delete_theme(id,nom) {

  swal({
    title: "Êtes-vous sûr ?",
    text: "Le Thème "+nom+" va être supprimé définitivement !",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Oui, supprimer !',
    closeOnConfirm: false
  },
  function(){

    if($('#fidtheme').val()==""){
      alert("Erreur !");
      return false;
    } else {
      var fidtheme = id;
    }
    jQuery.post("modeles/ajax.php?ajax=delete_theme", {
      firstname: fidtheme
    },
    function(data, textStatus){
      if(data == 1){
        swal("Supprimé !", "Le Thème a bien été supprimé!", "success");
        setTimeout(function(){
          location.reload();
        },1000);

      }else{
        swal("Erreur !", "Erreur lors de la Suppression !", "error");

      }
    });
  });

}

function update_theme(id,nom) {

  swal({
    title: "Modifier le Libellé",
    text: "Veuillez modifier si vous le souhaitez le nom du Thème :",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Ex: +262 6 92 123 123",
    // JSON
    inputValue: nom },
    function(inputValue){
      if (inputValue === false)
      return false;
      if (inputValue === "") {
        swal.showInputError("Vous devez renseigner ce champs !");
        return false   }
        if (inputValue.length > 17) {
          swal.showInputError("Trop long !");
          return false   }

          var fnomtheme = inputValue;
          var fidtheme = id;

          jQuery.post("modeles/ajax.php?ajax=update_theme", {

            firstname: fidtheme,
            fnomtheme: fnomtheme
          },
          function(data, textStatus){
            if(data == 1){
              swal("Modifié !", "Le Thème a bien été modifié!", "success");
              setTimeout(function(){
                location.reload();
              },1000);

              //document.getElementById("nom_theme_"+fidtheme).innerHTML = fnomtheme;
              //document.getElementById('nom_theme_'+fidtheme).innerHTML(fnomtheme);

            }else{
              swal("Erreur !", "Erreur lors de la Modification !", "error");

            }
          });
        });

      }






      $(document).ready(function () {



        $('#supp_topbarre_num').click(function(){


        });

        $("#mail_particulier").blur(function () {
          var username = $(this).val();
          if (username == '') {
            $("#availability_mail_particulier").html("");
          }
          else{
            $.ajax({
              url: "modeles/ajax.php?ajax=check_mail&uname="+username
            }).done(function( data ) {
              $("#availability_mail_particulier").html(data);
            });
          }
        });

        $("#mail_pro").blur(function () {
          var username = $(this).val();
          if (username == '') {
            $("#availability_mail_pro").html("");
          }
          else{
            $.ajax({
              url: "modeles/ajax.php?ajax=check_mail&uname="+username
            }).done(function( data ) {
              $("#availability_mail_pro").html(data);
            });
          }
        });

        $("#mail_admin").blur(function () {
          var username = $(this).val();
          if (username == '') {
            $("#availability_mail_admin").html("");
          }
          else{
            $.ajax({
              url: "modeles/ajax.php?ajax=check_mail&uname="+username
            }).done(function( data ) {
              $("#availability_mail_admin").html(data);
            });
          }
        });


      });
      </script>

      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN THEME CUSTOMIZER-->
          <div id="theme-change" class="hidden-phone">
            <i class="icon-cogs"></i>
            <span class="settings">
              <span class="text">Theme Color:</span>
              <span class="colors">
                <span class="color-default" data-style="default"></span>
                <span class="color-green" data-style="green"></span>
                <span class="color-gray" data-style="gray"></span>
                <span class="color-purple" data-style="purple"></span>
                <span class="color-red" data-style="red"></span>
              </span>
            </span>
          </div>
          <!-- END THEME CUSTOMIZER-->
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
            Ajouter un Utilisateur
          </h3>



          <ul class="breadcrumb">
            <li>
              <a href="index.php">Tableau de bord</a>
              <span class="divider">/</span>
            </li>

            <li class="active">
              Gestion des Utilisateurs
            </li>
            <li class="pull-right search-wrap">
              <form action="search_result.html" class="hidden-phone">
                <div class="input-append search-input-area">
                  <input class="" id="appendedInputButton" type="text">
                  <button class="btn" type="button"><i class="icon-search"></i> </button>
                </div>
              </form>
            </li>
          </ul>
          <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN EDITABLE TABLE widget-->
      <div class="row-fluid">
        <div class="span6">
          <!-- BEGIN EXAMPLE TABLE widget-->
          <div class="widget purple ">
            <div class="widget-title">
              <h4><i class="icon-reorder"></i> Formulaire d'ajout d'un nouvel utilisateur</h4>
              <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
              </span>
            </div>

            <!-- contenu de mon module -->
            <div class="widget-body">


              <div class="frm_connexion">
                <?php if (isset($erreur)){ ?>
                  <div class="alert alert-block alert-error fade in">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Erreur !</h4>
                    <p>
                      <?php echo $erreur; ?>
                    </p>
                  </div>
                  <?php } ?>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#particulier" aria-controls="particulier" role="tab" data-toggle="tab">Basic (Particulier)</a></li>
                    <li role="presentation"><a href="#entreprise" aria-controls="entreprise" role="tab" data-toggle="tab">Entreprise / Comité </a></li>
                    <li role="presentation"><a href="#administrateur" aria-controls="administrateur" role="tab" data-toggle="tab">Gestionnaire / Direction</a></li>

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content center">

                    <!-- Si on clique sur PARTICULIER -->
                    <div role="tabpanel" class="tab-pane fade in active" id="particulier">
                      <form method="post" action="index.php?ac=gestion_users&view=add_a_user" id="contactform">

                        <h2> Ajouter un PARTICULIER</h2>
                        <hr>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Nom<strong style="color:red">*</strong></span><input name="nom" required="required" class=" " type="text" placeholder="..." maxlength="50">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Prénom<strong style="color:red">*</strong></span><input name="prenom" required="required" class=" " type="text" placeholder="..." maxlength="25">
                            </div>
                          </div>
                        </div>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Email<strong style="color:red">*</strong></span><input id="mail_particulier" name="mail" required="required" type="email" class="form-control" placeholder="julien.ismail@gmail.com" maxlength="100">
                            </div>
                          </div>
                          <div id="availability_mail_particulier"></div>

                        </div>

                        <hr>
                        <h4>Identifiants de connexion </h4>





                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp1" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>
                        <p>Vérification du mot de passe  </p>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp2" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>

                        <p>Souhaitez-vous activer cet utilisateur ?  </p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="etat_user"  value="1"> Oui
                          </label>
                          <label class="btn btn-info btn-option ">
                            <input type="radio" name="etat_user" value="0" checked="checked"> Non
                          </label>

                        </div>
                        <hr>
                        <div class="control-group">
                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Adresse<strong style="color:red">*</strong></span><input name="adresse" required="required" class=" " type="text" placeholder="10 rue de l'Arsonne..." maxlength="100">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Code Postal<strong style="color:red">*</strong></span><input name="cp" required="required" class=" " type="text" placeholder="97460, 97400..." maxlength="5">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Ville<strong style="color:red">*</strong></span><input name="ville" required="required" class=" " type="text" placeholder="Saint-Denis, Le Port..." maxlength="25">
                            </div>
                          </div>
                        </div>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Téléphone 1<strong style="color:red">*</strong></span><input name="tel1" required="required" class=" " type="text" placeholder="0692, 0693..." maxlength="10">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Téléphone 2</span><input name="tel2" required="required" class=" " type="text" placeholder="0262..." maxlength="10">
                            </div>
                          </div>
                        </div>




                        <hr>


                        <p>Ses thèmes préférés : </p>

                        <div class="control-group">

                          <!-- On récupère tout les thèmes existants -->
                          <?php
                          $themes_all = $connexion->gets_without_option("Themes");


                          foreach ($themes_all as $theme) {
                            echo "
                            <label class=\"btn btn-info btn-option\">
                            <input type=\"checkbox\" name=\"themes[]\" value=\"".$theme['id_theme']."\" >".$theme['nom_theme']."
                            </label>
                            ";
                          }
                          ?>

                        </div>
                        <br>

                        <p>Abonner à la Newsletter : </p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="newsletter"  value="1"> Oui
                          </label>
                          <label class="btn btn-info btn-option ">
                            <input type="radio" name="newsletter" value="0" checked="checked"> Non
                          </label>

                        </div>
                        <hr>
                        <p>Commentaire sur l'utilisateur (visible) : </p>
                        <div class="control-group">

                          <div class="controls">
                            <textarea class="input-xlarge" name="com_visible" rows="3"></textarea>
                          </div>
                        </div>
                        <p>Commentaire sur l'utilisateur (masqué) : </p>
                        <div class="control-group">
                          <div class="controls">
                            <textarea class="input-xlarge" name="com_masque" rows="3"></textarea>
                          </div>
                        </div>


                        <input type="submit" name="submit_particulier"  value="Enregistrer" title="Cliquez ici pour enregistrer votre utilisateur !" class="btn btn-success pull-right">

                      </form>
                    </div>
                    <!-- FIN POUR PARTICULIER -->



                    <!-- Si on choisi ENTREPRISE -->
                    <div role="tabpanel" class="tab-pane fade" id="entreprise">
                      <form method="post"  action="index.php?ac=gestion_users&view=add_a_user">
                        <h2> Ajouter une ENTREPRISE ou un COMITÉ</h2>
                        <hr>
                        <p>Veuillez séléctionner le type d'utilisateur à ajouter :</p>


                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="comite" value="0"> Entreprise
                          </label>
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="comite" value="1"> Comité d'Entreprises
                          </label>

                        </div>
                        <br><br>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Nom<strong style="color:red">*</strong></span><input name="nom" required="required" class=" " type="text" placeholder="..." maxlength="50">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Raison Sociale<strong style="color:red">*</strong></span><input name="raison_sociale" required="required" class=" " type="text" placeholder="...">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">SIRET<strong style="color:red">*</strong></span><input name="siret" required="required" class=" " type="text" placeholder="..." maxlength="50">
                            </div>
                          </div>
                        </div>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Email<strong style="color:red">*</strong></span><input id="mail_pro"  name="mail" required="required" type="email" class="form-control" placeholder="julien.ismail@gmail.com" maxlength="100">
                            </div>
                          </div>
                          <div id="availability_mail_pro"></div>

                        </div>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Activité<strong style="color:red">*</strong></span><input name="activite" required="required" class=" " type="text" placeholder="..." maxlength="50">
                            </div>
                          </div>
                        </div>
                        <hr>
                        <h4>Veuillez choisir un Mot de passe </h4>


                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp1" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>
                        <p>Vérification du mot de passe  </p>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp2" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>

                        <p>Souhaitez-vous activer cet utilisateur ?  </p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="etat_user"  value="1"> Oui
                          </label>
                          <label class="btn btn-info btn-option ">
                            <input type="radio" name="etat_user" value="0" checked="checked"> Non
                          </label>

                        </div>
                        <hr>
                        <div class="control-group">
                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Adresse<strong style="color:red">*</strong></span><input name="adresse" required="required" class=" " type="text" placeholder="10 rue de l'Arsonne..." maxlength="100">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Code Postal<strong style="color:red">*</strong></span><input name="cp" required="required" class=" " type="text" placeholder="97460, 97400..." maxlength="5">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Ville<strong style="color:red">*</strong></span><input name="ville" required="required" class=" " type="text" placeholder="Saint-Denis, Le Port..." maxlength="25">
                            </div>
                          </div>
                        </div>

                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Téléphone 1<strong style="color:red">*</strong></span><input name="tel1" required="required" class=" " type="text" placeholder="0692, 0693..." maxlength="10">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Téléphone 2</span><input name="tel2" required="required" class=" " type="text" placeholder="0262..." maxlength="10">
                            </div>
                          </div>
                        </div>


                        <hr>
                        <p>Ses thèmes préférés : </p>
                        <div class="control-group">

                          <!-- On récupère tout les thèmes existants -->
                          <?php
                          $themes_all = $connexion->gets_without_option("Themes");


                          foreach ($themes_all as $theme) {
                            echo "
                            <label class=\"btn btn-info btn-option\">
                            <input type=\"checkbox\" name=\"themes[]\" value=\"".$theme['id_theme']."\" >".$theme['nom_theme']."
                            </label>
                            ";
                          }
                          ?>

                        </div>
                        <br>
                        <p>Abonner à la Newsletter : </p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="newsletter"  value="1"> Oui
                          </label>
                          <label class="btn btn-info btn-option ">
                            <input type="radio" name="newsletter" value="0" checked="checked"> Non
                          </label>

                        </div>
                        <hr>
                        <p>Commentaire sur l'utilisateur (visible) : </p>
                        <div class="control-group">

                          <div class="controls">
                            <textarea class="input-xlarge" name="com_visible" rows="3"></textarea>
                          </div>
                        </div>
                        <p>Commentaire sur l'utilisateur (masqué) : </p>
                        <div class="control-group">
                          <div class="controls">
                            <textarea class="input-xlarge" name="com_masque" rows="3"></textarea>
                          </div>
                        </div>


                        <input type="submit" name="submit_professionnel"  value="Enregistrer" title="Cliquez ici pour enregistrer votre utilisateur !" class="btn btn-success pull-right">

                      </form>
                    </div>

                    <!-- FIN POUR ENTREPRISE -->


                    <!-- Si on choisi Admin / Gestionnaire -->
                    <div role="tabpanel" class="tab-pane fade" id="administrateur">
                      <form method="post"  action="index.php?ac=gestion_users&view=add_a_user" >
                        <h2> Ajouter un GESTIONNAIRE</h2>
                        <hr>
                        <p>Veuillez choisir une des Options :</p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" checked="checked" name="type_user" value="commercial"> Commercial
                          </label>
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="type_user" value="technique"> Technique
                          </label>
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="type_user" value="comptable"> Comptable
                          </label>
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="type_user" value="direction"> Direction
                          </label>

                        </div>

                        <br><br>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Nom<strong style="color:red">*</strong></span><input name="nom" required="required" class=" " type="text" placeholder="..." maxlength="50">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Prénom<strong style="color:red">*</strong></span><input name="prenom" required="required" class=" " type="text" placeholder="..." maxlength="25">
                            </div>
                          </div>
                        </div>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on">Email<strong style="color:red">*</strong></span><input id="mail_admin" name="mail" required="required" type="email" class="form-control" placeholder="julien.ismail@gmail.com" maxlength="100">
                            </div>
                          </div>
                          <div id="availability_mail_admin"></div>

                        </div>



                        <hr>
                        <h4>Veuillez choisir un Mot de passe </h4>


                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp1" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>
                        <p>Vérification du mot de passe  </p>
                        <div class="control-group">

                          <div class="controls">
                            <div class="input-prepend">
                              <span class="add-on"><strong>Mot de passe<em style="color:red">*</em></strong></span><input name="mdp2" required="required"  type="password" class="form-control" placeholder="...">
                            </div>
                          </div>
                        </div>

                        <p>Souhaitez-vous activer cet utilisateur ?  </p>

                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-info btn-option">
                            <input type="radio" name="etat_user"  value="1"> Oui
                          </label>
                          <label class="btn btn-info btn-option ">
                            <input type="radio" name="etat_user" value="0" checked="checked"> Non
                          </label>

                        </div>
                        <hr>
                        <p>Commentaire sur l'utilisateur  : </p>
                        <div class="control-group">

                          <div class="controls">
                            <textarea class="input-xlarge" name="com_visible" rows="3"></textarea>
                          </div>
                        </div>





                        <input type="submit" name="submit_admin"  value="Enregistrer" title="Cliquez ici pour enregistrer votre utilisateur !" class="btn btn-success pull-right">

                      </form>
                    </div>
                    <!-- FIN POUR ADMIN / GESTIONNAIRES -->
                  </div>

                </div>

              </div>
              <!-- FIN DU contenu de mon module -->





            </div>
          </div>
          <!-- END ROW FLUID-->



          <!-- PARTIE DROITE -->
          <div class="span6">
            <!-- BEGIN PROGRESS PORTLET-->
            <div class="widget green">
              <div class="widget-title">
                <h4><i class="icon-plus"></i> Ajouter un Thème </h4>
                <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                </span>
              </div>
              <div class="widget-body">
                <?php if (isset($erreur_theme)){ ?>
                  <div class="alert alert-block alert-error fade in">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Erreur !</h4>
                    <p>
                      <?php echo $erreur_theme; ?>
                    </p>
                  </div>
                  <?php } ?>


                  <h3 class="titreblock center"> Ajouter un Thème </h3>
                  <form method="post" action="index.php?ac=gestion_users&amp;view=add_a_theme" id="contactform">


                    <div class="control-group">

                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">Titre<strong style="color:red">*</strong></span><input name="nom_theme" required="required" class=" " type="text" placeholder="..." maxlength="50">
                        </div>
                      </div>
                    </div>

                    <input type="submit"  title="Cliquez ici pour enregistrer votre thème !" class="btn btn-success pull-right">
                    <br>
                  </form>

                  <hr>

                  <h3 class="titreblock center"> Ensemble des Thèmes </h3>
                  <table class="table table-striped table-bordered" id="sample_1">
                    <thead>
                      <tr>

                        <th class="hidden-phone">Libellé</th>

                        <th class="hidden-phone">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $themes = $connexion->gets_without_option("Themes");


                      foreach ($themes as $untheme) {
                        //On convertit la date en FR
                        //$date=$connexion->dateToFr($unevideo['date_ajout']);


                        echo "
                        <tr>

                        <td id=\"nom_theme_".$untheme['id_theme']."\">".$untheme['nom_theme']."</td>
                        <td>

                        <button onclick=\"update_theme(".$untheme['id_theme'].",'".$untheme['nom_theme']."')\"  class=\"btn btn-warning\"><i class=\"icon-cog\"></i></button>

                        <button onclick=\"delete_theme(".$untheme['id_theme'].",'".$untheme['nom_theme']."')\"   class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button>

                        </td>
                        </tr>";


                      }
                      ?>


                    </tbody>
                  </table>

                </div>
              </div>
              <!-- END PROGRESS PORTLET-->

            </div>

            <!-- FIBN PARTIE DROITE -->
          </div>

          <script>


          </script>
