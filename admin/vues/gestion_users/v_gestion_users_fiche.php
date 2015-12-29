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
        <a href="index.php?ac=gestion_users">Gestion Utilisateurs</a>
        <span class="divider">/</span>
      </li>
      <li class="active">
        Informations Utilisateur
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
        <p class="info">Utilisateur</p>
      </a>
      <a href="#infos" class="profile-features active" style="background:#BB2D2D;">
        <i class=" icon-th"></i>
        <p class="info">Informations</p>
      </a>

    </div>
    <div class="span10" id="infos">
      <div class="profile-head">
        <div class="span8">
          <h1><?php echo $user['nom_user']." ".$user['prenom_user']; ?></h1>
          <h5>Type de compte : <strong style="color:#0DA38A;"><?php echo $user['type_user']; ?></strong></h5>
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
          <a href="edit_profile.html" class="btn btn-edit btn-large pull-right mtop20"><i class="icon-cog"></i> Modifier l'utilisateur </a>
        </div>
      </div>



      <div class="row-fluid">
        <div class="span8 bio">
          <h2>Informations</h2>
          <p>Nom Prénom : <?php echo $user['nom_user']." ".$user['prenom_user']; ?> </p>
          <p>Téléphone 1 : <?php echo $user['tel1_user']; ?></p>
          <p>Téléphone 2 : <?php echo $user['tel2_user']; ?></p>
          <p>Email : <?php echo $user['mail_user']; ?></p>

          <hr>

          <p>Adresse : <?php echo $user['adresse']; ?></p>
          <p>Code Postale : <?php echo $user['code_postale']; ?></p>
          <p>Ville : <?php echo $user['ville']; ?></p>

          <hr>
          <p>Abonné à la Newsletter ? <?php echo $user['newsletter']; ?></p>

          <p>Commentaire (visible) : <?php echo $user['com_visible']; ?></p>
          <p>Commentaire (masqué) : <?php echo $user['com_masque']; ?></p>

          <p>Inscrit depuis le <?php echo $date_inscription=$connexion->dateToFr($user['date_inscription']);  ?></p>


<?php var_dump($user); ?>
          <div class="space15"></div>
          <hr>
          <div class="space15"></div>

          <h2>Réservations</h2>
          <?php include('vues/gestion_users/v_gestion_users_reservations.php'); ?>

          <div class="text-center">
            <button class="btn btn-primary ">Toutes les réservation</button>
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
