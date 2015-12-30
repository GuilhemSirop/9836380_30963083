<script type="text/javascript">
function delete_domaine(id,nom) {

  swal({
    title: "Êtes-vous sûr ?",
    text: "Le domaine d'activité "+nom+" va être supprimé définitivement !",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Oui, supprimer !',
    closeOnConfirm: false
  },
  function(){

    if($('#fiddomaine').val()==""){
      alert("Erreur !");
      return false;
    } else {
      var fiddomaine = id;
    }
    jQuery.post("modeles/ajax.php?ajax=delete_domaine", {
      firstname: fiddomaine
    },
    function(data, textStatus){
      if(data == 1){
        swal("Supprimé !", "Le Domaine d'activité a bien été supprimé!", "success");
        setTimeout(function(){
          location.reload();
        },1000);

      }else{
        swal("Erreur !", "Erreur lors de la Suppression !", "error");

      }
    });
  });

}

function update_domaine(id,nom) {

  swal({
    title: "Modifier le Libellé",
    text: "Veuillez modifier si vous le souhaitez le nom du Domaine :",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    // JSON
    inputValue: nom },
    function(inputValue){
      if (inputValue === false)
      return false;
      if (inputValue === "") {
        swal.showInputError("Vous devez renseigner ce champs !");
        return false   }
        if (inputValue.length > 50) {
          swal.showInputError("Trop long !");
          return false   }

          var fnomdomaine = inputValue;
          var fiddomaine = id;

          jQuery.post("modeles/ajax.php?ajax=update_domaine", {

            firstname: fiddomaine,
            fnomdomaine: fnomdomaine
          },
          function(data, textStatus){
            if(data == 1){
              swal("Modifié !", "Le Domaine d'activité a bien été modifié!", "success");
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
          <div class="span6" id="frm_gestion_domaines">
            <!-- BEGIN PROGRESS PORTLET-->
            <div class="widget orange">
              <div class="widget-title">
                <h4><i class="icon-plus"></i> Ajouter un Domaine d'activité </h4>
                <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                </span>
              </div>
              <div class="widget-body">
                <?php if (isset($erreur_domaine)){ ?>
                  <div class="alert alert-block alert-error fade in">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Erreur !</h4>
                    <p>
                      <?php echo $erreur_domaine; ?>
                    </p>
                  </div>
                  <?php }
                  if (isset($success_domaine)){ ?>
                    <div class="alert alert-block alert-success fade in">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <h4 class="alert-heading">Enregistré !</h4>
                      <p>
                        <?php echo $success_domaine; ?>
                      </p>
                    </div>
                    <?php }
                     ?>


                  <h3 class="titreblock center"> Ajouter un Domaine d'activité </h3>
                  <form method="post" action="index.php?ac=gestion_events&amp;view=add_a_domaine" id="contactform">


                    <div class="control-group">

                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">Libellé<strong style="color:red">*</strong></span><input name="nom_domaine" required="required" class=" " type="text" placeholder="..." maxlength="50">
                        </div>
                      </div>
                    </div>

                    <input type="submit"  value="Enregistrer" title="Cliquez ici pour enregistrer votre thème !" class="btn btn-success pull-right">
                    <br>
                  </form>

                  <hr>

                  <h3 class="titreblock center"> Ensemble des Domaines d'activité </h3>
                  <table class="table table-striped table-bordered" id="sample_2">
                    <thead>
                      <tr>

                        <th class="hidden-phone">Libellé</th>

                        <th class="hidden-phone">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $domaines = $connexion->gets_without_option("Domaines_Activites");


                      foreach ($domaines as $undomaine) {
                        //On convertit la date en FR
                        //$date=$connexion->dateToFr($unevideo['date_ajout']);


                        echo "
                        <tr>

                        <td>".$undomaine['nom_domaine']."</td>
                        <td>

                        <button onclick=\"update_domaine(".$undomaine['id_domaine'].",'".$undomaine['nom_domaine']."')\"  class=\"btn btn-warning\"><i class=\"icon-cog\"></i></button>

                        <button onclick=\"delete_domaine(".$undomaine['id_domaine'].",'".$undomaine['nom_domaine']."')\"   class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button>

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
