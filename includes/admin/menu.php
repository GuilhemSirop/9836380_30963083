<!-- Header -->

<header class="header-container">
  <!-- Header Top -->
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="login-details clearfix">
            <!-- On a déjà testé dans l'index si l'utilisateur était renseigné donc on l'affiche directement-->
            <li><a href="admin/index.php" class="agenticon"><?php echo $_SESSION['user'][nom_user]." ".$_SESSION['user'][prenom_user];  ?></a></li>

            <!-- de toutes façons on laisse deconnexion -->
            <li><a href="index.php?uc=deconnexion" class="pri-color" >Se déconnecter</a></li>


          </ul>
        </div>
        <div class="col-md-6">
          <div class="social-icon pull-right">
            <a href="#" class="facebook fa fa-facebook"></a>
            <a href="#" class="twitter fa fa-twitter"></a>
            <a href="#" class="googleplus fa fa-google-plus"></a>
            <a href="#" class="dribble fa fa-dribbble"> </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Header -->
  <div class="main-header affix">
    <!-- Moblie Nav Wrapper -->
    <div class="mobile-nav-wrapper">
      <div class="container ">
        <!-- logo -->
        <div id="logo">
          <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>

        <div id="sb-search" class="sb-search">
          <form>
            <input class="sb-search-input" placeholder="Search" type="text" name="search" id="search">
            <input class="sb-search-submit" type="submit" value="">
            <span class="sb-icon-search"></span>
          </form>
        </div>
        <!-- moblie memu Icon -->
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <!--Main Nav -->
        <nav class="main-nav mobile-menu">

          <ul class="clearfix">
            <li><a href="index.php?uc=accueil">Accueil</a>

            </li>

            <li class="parent"><a href="index.php?uc=societe">La Société</a>
              <ul class="sub-menu">
                <li class="arrow"></li>
                <li><a href="index.php?uc=organiser">Organiser votre Évènement</a></li>
                <li><a href="event-sidebar-left.html">Fiche Technique</a></li>
                <li><a href="event-sidebar-right.html">Visite Virtuelle</a></li>
                <li><a href="index.php?uc=galerie">Galerie</a></li>
                <li><a href="index.php?uc=presse">Presse</a></li>
                <li><a href="event-detail.html">Affiches & Documents</a></li>

              </ul>
            </li>
            <li><a href="index.php?uc=agenda">Agenda</a></li>
            <li class="parent"><a href="event-blog.html">Infos Pratiques</a>
              <ul class="sub-menu">
                <li class="arrow"></li>
                <li><a href="event-blog.html">Accès</a></li>
                <li><a href="event-single-blog.html">Hébergements à proximité</a></li>
                <li><a href="event-single-blog.html">Découvrir le Site</a></li>
              </ul>
            </li>
            <li><a href="index.php?uc=contact">Contact</a></li>



          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
