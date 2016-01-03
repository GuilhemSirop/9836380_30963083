

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
      Gestion des Évènements
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


<!-- BEGIN ADVANCED TABLE Evenements en cours widget-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget green">
      <div class="widget-title">
        <h4><i class="icon-picture"></i> Liste des Événements actifs</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <table class="table table-striped table-bordered" id="sample_1">
          <thead>
            <tr>
              <th> ID </th>
              <th>Nom</th>
              <th>Date Début</th>
              <th>Date Fin</th>
              <th>Description</th>


              <th>Etat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $events = $connexion->get_events_actifs();


            foreach ($events as $event) {
              $date_debut=date("d-m-Y", strtotime($event['date_debut']));
              $date_fin=date("d-m-Y", strtotime($event['date_fin']));
              echo "
              <tr>
              <td>".$event['id']."</td>
              <td>".$event['nom_event']."</td>
              <td>Le <strong style=\"color:#31a6b1;\">".$date_debut."</strong> à <strong style=\"color:#31a6b1;\">".$event['heure_debut']."</strong></td>
              <td>Le <strong style=\"color:#31a6b1;\">".$date_fin."</strong> à <strong style=\"color:#31a6b1;\">".$event['heure_fin']."</strong></td>
              <td>".html_entity_decode($event['description_event'])."</td>

              <td>";
              if ($event['actif_event']==1) { echo "<span class=\"label label-success\">Actif</span>"; } else { echo "<span class=\"label label-warning\">Désactiver</span>"; }
              echo "</td>
              <td><a href=\"index.php?ac=gestion_events&view=fiche_event&event=".$event['id']."   \"><button class=\"btn btn-info\"><i class=\"icon-zoom-in\"></i></button></a>

              <a class=\"delete\" href=\"javascript:;\"><button class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button></a>

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

<!-- END ADVANCED TABLE Evenements en cours widget-->


<!-- BEGIN ADVANCED Evenements finis  widget-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget red">
      <div class="widget-title">
        <h4><i class="icon-picture"></i> Liste des Événements terminés</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <table class="table table-striped table-bordered" id="sample_2">
          <thead>
            <tr>
              <th> ID </th>
              <th>Nom</th>
              <th>Date Début</th>
              <th>Date Fin</th>
              <th>Description</th>



              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $events_termines = $connexion->get_events_termines();


            foreach ($events_termines as $unevent) {
              $date_debut=date("d-m-Y", strtotime($unevent['date_debut']));
              $date_fin=date("d-m-Y", strtotime($unevent['date_fin']));
              echo "
              <tr>
              <td>".$unevent['id']."</td>
              <td>".$unevent['nom_event']."</td>
              <td>Le <strong style=\"color:#31a6b1;\">".$date_debut."</strong> à <strong style=\"color:#31a6b1;\">".$unevent['heure_debut']."</strong></td>
              <td>Le <strong style=\"color:#31a6b1;\">".$date_fin."</strong> à <strong style=\"color:#31a6b1;\">".$unevent['heure_fin']."</strong></td>
              <td>".html_entity_decode($unevent['description_event'])."</td>

              <td><a href=\"index.php?ac=gestion_events&view=fiche_event&event=".$unevent['id']."   \"><button class=\"btn btn-info\"><i class=\"icon-zoom-in\"></i></button></a>

              <a class=\"delete\" href=\"javascript:;\"><button class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button></a>

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

<!-- END ADVANCED TABLE Evenements finis widget-->
