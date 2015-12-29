<!-- background -->
<section class="background_error clearfix">
    <div class="container">
        <div class="border-cover-error">
            <div class="background-content clearfix">
                <h2 class="title">Oups, Nous avons rencontré <br>une erreur !</h2>
                <p><?php echo $erreur; ?><br>
                  <a href="#" class="pri-color" data-toggle="modal" data-target="#modal_frm_connexion">Se connecter</a>
                </p>

                <div class="both-btn clearfix">
                    <div class="find-events">
                        <a href="index.php?uc=<?php echo $lien1; ?>"><?php echo $option1; ?></a>
                    </div>

                    <div class="but-ticket">
                        <a href="index.php?uc=<?php echo $lien2; ?>"> <?php echo $option2; ?></a>
                    </div>

                    <span class="round">ou</span>
                </div>
            </div>
        </div>
    </div>
</section>
