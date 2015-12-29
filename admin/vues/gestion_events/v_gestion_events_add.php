

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
      Ajouter un Évènement
    </h3>



    <ul class="breadcrumb">
      <li>
        <a href="index.php">Tableau de bord</a>
        <span class="divider">/</span>
      </li>

      <li class="active">
        Gestion des Évènements
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
  <div class="span7">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget purple ">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i> Formulaire d'ajout d'un nouvel événement</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>

      <!-- contenu de mon module -->
      <div class="widget-body">


        <div class="frm_ajout_event">
          <form method="post" action="#" id="contactform">
            <hr>
            <div class="center">
            <h3>Présentation de l'événement : </h3>

            <div class="controls">
              <div class="input-prepend">
                <span class="add-on">Nom de l'événement</span><input required="required" class=" " type="text" placeholder="...">
              </div>
            </div>

          </div>
            <h4>Description de l'événement : </h4>
            <textarea id="event_description" name="descriptioncontent" style=" height: 100%; width: 100%;"></textarea>
            <br>
            <p>Description courte  : </p>
            <div class="control-group">
              <div class="controls">
                <textarea class="input-xlarge" rows="3"></textarea>
              </div>
            </div>

            <div class="control-group">
                                    <label class="control-label">Default datepicker </label>

                                    <div class="controls">
                                        <input id="dp1" type="text" value="<?php echo date("j-n-Y");  ?>" size="16" class="m-ctrl-medium">
                                    </div>
                                </div>



            <h4>Client : </h4>
            <select data-live-search="true" title="Choisissez un client..." class="selectpicker">
   <option>Mustard</option>
   <option>Ketchup</option>
   <option>Relish</option>
 </select>
 <br><br>



            <h4>Les thèmes concernés : </h4>

            <div class="control-group">
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="concert" value="1"> Concert
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Batiment" value="2"> Batiment
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Conférences" value="3"> Conférences
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Sport" value="4"> Sport
              </label>
              <label class="btn btn-info btn-option active">
                <input type="checkbox" name="Maison" checked="checked" value="5"> Maison
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="concert" value="6"> Concert
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Batiment" value="7"> Batiment
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Conférences" value="8"> Conférences
              </label>
              <label class="btn btn-info btn-option">
                <input type="checkbox" name="Sport" value="9"> Sport
              </label>
              <label class="btn btn-info btn-option active">
                <input type="checkbox" name="Maison" checked="checked" value="10"> Maison
              </label>
            </div>


<h4>Domaine d'activité : </h4>
            <select data-live-search="true" title="Choisissez..." class="selectpicker">
   <option>Informatique</option>
   <option>Alimentaire</option>
   <option>Politique</option>
   <option>Musique</option>
   <option>Batiment</option>
   <option>Association</option>
 </select>
 <br><br>

            <hr>
            <h3>Dates effectives de l'événement : </h3>



            <div class="control-group">

              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><strong>Date de début</strong></span><input required="required" class=" " type="date" placeholder="...">

                </div>
              </div>

            </div>
            <div class="control-group">

              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><strong>Date de fin</strong></span><input required="required" class=" " type="date" placeholder="...">

                </div>
              </div>

            </div>


            <hr>
            <h3>Informations pour les Résérvations : </h3>
            <div class="control-group">

              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><strong>Début</strong></span><input required="required" class=" " type="date" placeholder="...">

                </div>
              </div>

            </div>
            <div class="control-group">

              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><strong>Fin</strong></span><input required="required" class=" " type="date" placeholder="...">

                </div>
              </div>

            </div>







            <div class="control-group">

              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">Nombre Places</span><input required="required" class=" " type="text" placeholder="...">

                </div>
              </div>

            </div>

            <hr>



            <p>Ajouter une photo pour la newsletter : </p>


            <br>

            <p>Abonner à la Newsletter : </p>

            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-info btn-option">
                <input type="radio" name="newsletter"  value="1"> Oui
              </label>
              <label class="btn btn-info btn-option">
                <input type="radio" name="newsletter" value="0"> Non
              </label>

            </div>
            <hr>
            <p>Commentaire sur l'utilisateur (visible) : </p>
            <div class="control-group">

              <div class="controls">
                <textarea class="input-xlarge" rows="3"></textarea>
              </div>
            </div>
            <p>Commentaire sur l'utilisateur (masqué) : </p>
            <div class="control-group">
              <div class="controls">
                <textarea class="input-xlarge" rows="3"></textarea>
              </div>
            </div>


            <button type="submit" name="submit" id="submitButton" title="Click here to submit your message!" class="btn btn-success pull-right">Enregistrer</button>
            <br>
          </form>

        </div>
        <!-- FIN DU FORMULAIRE -->





      </div>
      <!-- FIN DU contenu de mon module -->





    </div>
  </div>
  <!-- END ROW FLUID-->
</div>
<script src="assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>
<script type="text/javascript">


          tinymce.init({
            selector: "#event_description",
            language: "fr_FR"
          });
</script>

<script type="text/javascript">
$(document).ready(function () {
    // debugger;
     window.prettyPrint && prettyPrint();
    $("#dp1").datepicker({

        format: 'dd-mm-yyyy'
    });
});

          </script>
