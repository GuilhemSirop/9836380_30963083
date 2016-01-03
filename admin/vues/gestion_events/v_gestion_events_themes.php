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
        swal("Supprimé !", "Le Thème a bien été supprimé! \n Vous allez être redirigé...", "success");
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
    inputPlaceholder: "Ex: Musique...",
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
              swal("Modifié !", "Le Thème a bien été modifié! \n Vous allez être redirigé...", "success");
              setTimeout(function(){
                location.reload();
              },1000);

            }else{
              swal("Erreur !", "Erreur lors de la Modification !", "error");

            }
          });
        });

      }



      </script>


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
                  <?php }
                  if (isset($success_theme)){ ?>
                    <div class="alert alert-block alert-success fade in">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <h4 class="alert-heading">Enregistré !</h4>
                      <p>
                        <?php echo $success_theme; ?>
                      </p>
                    </div>
                    <?php }
                     ?>


                  <h3 class="titreblock center"> Ajouter un Thème </h3>
                  <form method="post" action="index.php?ac=gestion_events&amp;view=add_a_theme" id="contactform">


                    <div class="control-group">

                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">Titre<strong style="color:red">*</strong></span><input name="nom_theme" required="required" class=" " type="text" placeholder="..." maxlength="50">
                        </div>
                      </div>
                    </div>

                    <input type="submit" value="Enregistrer" title="Cliquez ici pour enregistrer votre thème !" class="btn btn-success pull-right">
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

                        <td>".$untheme['nom_theme']."</td>
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
