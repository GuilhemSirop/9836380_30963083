<!-- Header -->

<header class="header-container">
  <!-- Header Top -->
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="login-details clearfix">
            <!-- On a déjà testé dans l'index si l'utilisateur était renseigné donc on l'affiche directement-->
                  <li><a href="#" class="customericon"><?php echo $_SESSION['user'][nom_user]._.$_SESSION['user'][prenom_user];  ?></a></li>

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
