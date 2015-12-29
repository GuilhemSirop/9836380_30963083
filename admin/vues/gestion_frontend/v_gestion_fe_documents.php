

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
      Gestion des Documents
    </h3>



    <ul class="breadcrumb">
      <li>
        <a href="index.php">Tableau de bord</a>
        <span class="divider">/</span>
      </li>

      <li class="active">
        Gestion des Documents
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


<!-- BEGIN ADVANCED TABLE Photos widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-picture"></i> Les Documents à télécharger</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>

                                <th class="hidden-phone">Fichier</th>

                                <th class="hidden-phone">Titre</th>
                                <th class="hidden-phone">Description</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              $documents = $connexion->gets_without_option_inner("Societe_Media","id_media","Societe_Media_Documents","id_media");


                              foreach ($documents as $undocument) {
                                //On convertit la date en FR
                                //$date=$connexion->dateToFr($unevideo['date_ajout']);


                                echo "
                                <tr>

                                <td><a href=\"../img/gallerie/documents/".$undocument['nom_fichier']."\" title=\"aperçu\" alt=\"aperçu\" ></td>

                                <td>".$undocument['titre']."</td>
                                <td>".$undocument['description']."</td>

                                <td>
                                <a href=\"index.php?ac=gestion_users&view=fiche_user&user=".$undocument['id_user']."   \"><button class=\"btn btn-info\"><i class=\"icon-zoom-in\"></i></button></a>

                                <button class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button>
                                </td>
                                </tr>";


                              }
                              ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE Photos widget-->
