

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
      Configurer l'Accueil
    </h3>



    <ul class="breadcrumb">
      <li>
        <a href="index.php">Tableau de bord</a>
        <span class="divider">/</span>
      </li>

      <li class="active">
        Paramètres de l'Accueil
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
  <div class="span9">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget purple ">
      <div class="widget-title">
        <h4><i class="icon-tablet"></i> Page Accueil</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>

      <!-- contenu de mon module -->
      <div class="widget-body">


        <div class="frm_ajout_event">


          <div class="center">
            <h3>Présentation de la page : Accueil

              <a class="btn  btn-warning" type="button" href="#modifier_accueil" ><i class="icon-cog"></i> Modifier</a>
            </h3>
            <hr>
            <?php
            $features_site = $connexion->get("Features_Site", "id", "1");


            ?>
            <h4><?php echo $features_site['titre_video']; ?></h4>
            <h5 style = "margin:0 10%;"><?php echo $features_site['description_video']; ?></h5>
            <br>
            <iframe width="100%" height="365" src="https://www.youtube.com/embed/<?php echo $features_site['video_accueil']; ?>" frameborder="0" allowfullscreen=""></iframe>
            <!--<img src="http://i1.ytimg.com/vi/IgIey-E6leU/hqdefault.jpg">-->



          </div>




        </div>
        <!-- FIN DU FORMULAIRE -->





      </div>
      <!-- FIN DU contenu de mon module -->





    </div>
  </div>
  <!-- END ROW FLUID-->
</div>



<!-- BEGIN EDITABLE ACCUEIL -->
<div class="row-fluid" id ="modifier_accueil">
  <div class="span7">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget orange ">
      <div class="widget-title">
        <h4><i class="icon-cog"></i> Modification Accueil</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>

      <!-- contenu de mon module -->
      <div class="widget-body">


        <div class="frm_ajout_event">

          <form method="post" action="index.php?ac=gestion_frontend&view=update_accueil" >


            <h3 class="center">Informations concernant l'Accueil</h3>
            <hr>

            <div class="control-group">
              <label class="control-label">Titre de la vidéo</label>
                                    <div class="controls">
                                        <input type="text" placeholder=".input-xxlarge" class="input-xxlarge"value="<?php echo $features_site['titre_video']; ?>">
                                    </div>
                                </div>


                                <div class="control-group">
                                  <label class="control-label">Description de la vidéo</label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" rows="3"><?php echo $features_site['description_video']; ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label">ID de la vidéo</label>
                                  <p>*Renseignez bien l'ID comme par exemple : IgIey-E6leU <br>
                                  *Exemple : <strike>https://www.youtube.com/embed/</strike><strong>IgIey-E6leU </strong> <br>
                                  *Exemple : <strike>https://www.youtube.com/watch?v=</strike><strong>IgIey-E6leU </strong></p
                                                        <div class="controls">
                                                            <input type="text" placeholder=".input-xxlarge" class="input-xxlarge"value="<?php echo $features_site['video_accueil']; ?>">
                                                        </div>
                                                    </div>

                                                    <input type="submit" name="submit_accueil"  value="Enregistrer" title="Cliquez ici pour enregistrer votre utilisateur !" class="btn btn-success pull-right">

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
