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
      Informations liés à l'événement
    </h3>
    <ul class="breadcrumb">
      <li>
        <a href="index.php">Tableau de bord</a>
        <span class="divider">/</span>
      </li>
      <li>
        <a href="index.php?ac=gestion_events&view=dashboard">Gestion Événements</a>
        <span class="divider">/</span>
      </li>
      <li class="active">
        Informations Événement
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


<div class="row-fluid">
  <!-- BEGIN PROFILE PORTLET-->
  <div class=" profile span12">
    <div class="span2">

      <a href="#" class="profile-features active">
        <i class=" icon-user"></i>
        <p class="info">Évènement</p>
      </a>
      <a href="#infos" class="profile-features active" style="background:#BB2D2D;">
        <i class=" icon-th"></i>
        <p class="info">Informations</p>
      </a>

    </div>
    <div class="span10" id="infos">
      <div class="profile-head">
        <div class="span8">
          <h1><?php echo $event['nom_event']; ?></h1>
          <p>Client : <a href="#">Hometravo.</a></p>
        </div>

        <!--<div class="span4">
          <ul class="social-link-pf">
            <li><a href="#">
              <i class="icon-facebook"></i>
            </a></li>
            <li><a href="#">
              <i class="icon-twitter"></i>
            </a></li>
            <li><a href="#">
              <i class="icon-linkedin"></i>
            </a></li>
          </ul>
        </div>-->

        <div class="span4">
          <a href="edit_profile.html" class="btn btn-edit btn-large pull-right mtop20"> Modifier l'événement </a>
        </div>
      </div>

      <div class="profile-head img_principale" style="background:url('../img/events/<?php echo "event_".$event['id']; ?>/<?php echo $event['img_principale']; ?>')">
        <h1 class="center"> IMAGE PRINCIPALE <br>
        <input type="file" class="default">
      </h1>



      </div>

      <div class="row-fluid">
        <div class="span8 bio">
          <h2>Présentation</h2>
          <p><?php echo $event['presentation_event']; ?></p>
          <h3>Description (courte)</h3>
          <p><?php echo $event['description_event']; ?></p>
          <div class="space15"></div>
          <h2>Informations</h2>
          <?php
          $date_debut=$connexion->dateToFr($event['date_debut']);
          $date_fin=$connexion->dateToFr($event['date_fin']);
          $date_debut_res=$connexion->dateToFr($event['date_debut_res']);
          $date_fin_res=$connexion->dateToFr($event['date_fin_res']);

          ?>

          <p><label>Date de début </label>: Le <?php echo $date_debut." à ".$event['heure_debut']; ?></p>
          <p><label>Date de fin </label>: Le <?php echo $date_fin." à ".$event['heure_fin']; ?></p>
          <h3>Réservations </h3>
          <p><label>Ouvertes le </label>: <?php echo $date_debut_res; ?></p>
          <p><label>Fermées le </label>: <?php echo $date_fin_res; ?></p>
          <p><label>Occupation </label>: <?php echo $event['nom_event']; ?></p>
          <p><label>Email </label>: <a href="#"><?php echo $event['nom_event']; ?></a></p>
          <p><label>Phone </label>: <?php echo $event['nom_event']; ?></p>
          <p><label>Website Url </label>: <a href="#"><?php echo $event['nom_event']; ?></a></p>
          <div class="space15"></div>
          <hr>
          <div class="space15"></div>

          <h2>Project Progress</h2>
          <ul class="unstyled">
            <li>
              Envato Website <strong class="label"> 48%</strong>
              <div class="space10"></div>
              <div class="progress">
                <div class="bar" style="width: 48%;"></div>
              </div>
            </li>
            <li>
              Themeforest CMS Dashboard <strong class="label label-success"> 85%</strong>
              <div class="space10"></div>
              <div class="progress progress-success">
                <div class="bar" style="width: 85%;"></div>
              </div>
            </li>
            <li>
              VectorLab Portfolio <strong class="label label-important"> 65%</strong>
              <div class="space10"></div>
              <div class="progress progress-danger">
                <div class="bar" style="width: 65%;"></div>
              </div>
            </li>

          </ul>
          <div class="text-center">
            <button class="btn btn-primary ">All Projects</button>
          </div>
          <div class="space20"></div>

        </div>
        <div class="span4">

          <div class="profile-side-box green">
            <h1>Chiffres en cours</h1>
            <div class="desk">
              <div class="row-fluid experience">
                <h4><i class="icon-tags"></i> <?php echo $event['nb_places'] ?> Places restantes</h4>

              </div>
              <hr>
              <div class="row-fluid experience">
                <h4><i class="icon-ticket"></i> 180 Réservations</h4>

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PROFILE PORTLET-->
</div>

<?php



?>
