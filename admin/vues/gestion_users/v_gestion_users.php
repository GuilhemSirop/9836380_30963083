

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
      Gestion des Utilisateurs
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
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget purple">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i> Liste des Utilisateurs</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <div>
          <div class="clearfix">
            <!-- <div class="btn-group">
            <button id="editable-sample_new" class="btn green">
            Ajouter un nouveau <i class="icon-plus"></i>
          </button>
        </div> -->
        <h3 class="pull-left"> Voici l'ensemble des utilisateurs </h3>
        <div class="btn-group pull-right">
          <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Outils <i class="icon-angle-down"></i>
          </button>
          <ul class="dropdown-menu pull-right">
            <li><a href="#">Imprimer</a></li>
            <li><a href="#">Enregistrer en PDF</a></li>
            <li><a href="#">Exporter sur Excel</a></li>
          </ul>
        </div>
      </div>
      <div class="space8"></div>
      <table class="table table-striped table-hover table-bordered" id="editable-sample">
        <thead>
          <tr>
            <th> ID </th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Mail</th>

            <th>Type</th>
            <th>Etat</th>
            <th>Action</th>

          </tr>
        </thead>

        <tbody>

          <?php
          $users_all = $connexion->gets_without_option_order("Users","date_inscription","DESC");


          foreach ($users_all as $user) {
            echo "
            <tr>
            <td>".$user['id_user']."</td>
            <td>".$user['nom_user']."</td>
            <td>".$user['prenom_user']."</td>
            <td>".$user['tel1_user']."</td>
            <td>".$user['mail_user']."</td>
            <td>".$user['type_user']."</td>
            <td>";
            if ($user['etat_user']==1) {
              echo "<span class=\"label label-success\">Actif</span><a class=\"etat pull-right\" href=\"index.php?ac=gestion_users&\"><button class=\"btn btn-inverse\"><i class=\"icon-pause\"></i></button></a>"; } else { echo "<span class=\"label label-warning\">Désactiver</span><a class=\"etat pull-right\" href=\"javascript:;\"><button class=\"btn btn-inverse\"><i class=\"icon-play\"></i></button></a>"; }
            echo "</td>
            <td><a class=\"edit\" href=\"javascript:;\"><button class=\"btn btn-warning\"><i class=\"icon-cog\"></i></button></a>
            <a  href=\"index.php?ac=gestion_users&view=fiche_user&user=".$user['id_user']."   \">
              <button class=\"btn btn-primary\"><i class=\"icon-zoom-in\"></i></button></a>";


            echo "  <a class=\"delete\" href=\"javascript:;\"><button class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button></a>

            </td>

            </tr>";


          }
          ?>


        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END EXAMPLE TABLE widget-->
</div>
</div>
