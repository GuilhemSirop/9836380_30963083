<!-- Header -->
<header class="header-container">
  <!-- header Top -->
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="login-details clearfix">
            <!-- dans le cas ou un utilisateur est connecté, on affiche le logo, le login, la deconnexion -->

                  <li><a href="index.php?uc=inscription" class="membericon">Pas encore membre ?</a></li>
                  <li><a href="#" class="pri-color" data-toggle="modal" data-target="#modal_frm_connexion">Se connecter</a></li>


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
    <!-- Moblie Nav Wrapper  -->
    <div class="mobile-nav-wrapper">
      <div class="container ">
        <!-- logo -->
        <div id="logo">
          <a href="index.htm"><img src="img/logo.png" alt=""></a>
        </div>

        <!-- Search -->
        <div id="sb-search" class="sb-search">
          <form>
            <input class="sb-search-input" placeholder="Search" type="text" name="search" id="search">
            <input class="sb-search-submit" type="submit" value="">
            <span class="sb-icon-search"></span>
          </form>
        </div>
        <!-- Moblie menu Icon -->
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <!-- Main Nav -->
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
<!-- Header -->




        <!-- Modal CONNEXION -->
        <div class="modal fade" id="modal_frm_connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="index.php?uc=connexion" method="POST">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Veuillez renseigner vos identifiants</h4>
                </div>
                <div class="modal-body">

                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Identifiant..." name="login" aria-describedby="sizing-addon2">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-unlock-alt"></i></span>
                    <input type="text" class="form-control" placeholder="Mot de Passe..." name="pass" aria-describedby="sizing-addon2">
                  </div>
                </div>
                <div class="modal-footer">

                  <input type="submit" class="btn btn-primary" value="Se connecter">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- FIN -->
