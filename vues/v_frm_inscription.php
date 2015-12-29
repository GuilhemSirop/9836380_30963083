<div class="contact newsection inscription" id="inscription">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-2">
      </div>
      <div class="col-md-6 col-sm-6">
        <h2 class="title">Veuillez renseignez les champs pour poursuivre votre inscritption</h2>

        <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#particulier" aria-controls="particulier" role="tab" data-toggle="tab">Basic (Particulier)</a></li>
            <li role="presentation"><a href="#entreprise" aria-controls="entreprise" role="tab" data-toggle="tab">Entreprise / Comité Entreprises</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">

            <!-- Si on clique sur PARTICULIER -->
            <div role="tabpanel" class="tab-pane fade in active" id="particulier">
              <form method="post" action="#" id="contactform">
                <br>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Nom*</span>
                  <input type="text" class="form-control" required placeholder="Votre nom..." aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Prénom*</span>
                  <input type="text" class="form-control" required placeholder="Votre prenom..." aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Téléphone*</span>
                  <input type="text" class="form-control" required placeholder="06 9..." aria-describedby="basic-addon1" value="069">
                </div><br>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Email*</span>
                  <input type="text" class="form-control" required placeholder="Votre email..." aria-describedby="basic-addon1">
                </div><br>
                <div class="row">
                  <div class="col-sm-3">Vos thèmes préférés : </div>
                  <div class="col-sm-9">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-info btn-option">
                        <input type="checkbox"  name="concert" value="1" /> Concert
                      </label>
                      <label class="btn btn-info btn-option">
                        <input type="checkbox"  name="Batiment" value="2" /> Batiment
                      </label>
                      <label class="btn btn-info btn-option">
                        <input type="checkbox"  name="Conférences" value="3" /> Conférences
                      </label>
                      <label class="btn btn-info btn-option">
                        <input type="checkbox"  name="Sport" value="4" /> Sport
                      </label>
                      <label class="btn btn-info btn-option active">
                        <input type="checkbox"  name="Maison" checked="checked" value="5" /> Maison
                      </label>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-3">S'abonner à la Newsletter : </div>
                  <div class="col-sm-9">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-info btn-option">
                        <input type="radio"  name="newsletter" value="1" /> Oui
                      </label>
                      <label class="btn btn-info btn-option">
                        <input type="radio"  name="newsletter" value="0" /> Non
                      </label>

                    </div>
                  </div>
                </div>


                <button type="submit" name="submit" id="submitButton" title="Click here to submit your message!" class="btn btn-success pull-right">S'enregistrer</button>
              </p>
            </form>

          </div>
          <!-- FIN POUR PARTICULIER -->



          <!-- Si on choisi ENTREPRISE -->
          <div role="tabpanel" class="tab-pane fade" id="entreprise">
            <form method="post" action="#" id="contactform">
              <br>
              <div class="row">
                <div class="col-sm-3">Vous êtes : </div>
                <div class="col-sm-9">
                  <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-info btn-option">
                      <input type="radio"  name="choixpro" value="1" /> Entreprise
                    </label>
                    <label class="btn btn-info btn-option">
                      <input type="radio"  name="choixpro" value="0" /> Comité d'Entreprises
                    </label>

                  </div>
                </div>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Raison Sociale*</span>
                <input type="text" class="form-control" required placeholder="Votre nom..." aria-describedby="basic-addon1">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Siret*</span>
                <input type="text" class="form-control" required placeholder="Votre nom..." aria-describedby="basic-addon1">
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Adresse*</span>
                    <input type="text" class="form-control" required placeholder="Votre nom..." aria-describedby="basic-addon1">
                  </div>
                </div>
                <br>
                <br>
                <div class="col-lg-6">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Code Postal*</span>
                    <input type="text" class="form-control" required placeholder="Ex : 97400..." aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Ville*</span>
                    <input type="text" class="form-control" required placeholder="Saint-Denis, Saint-Paul..." aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>

              <br>

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Nom*</span>
                <input type="text" class="form-control" required placeholder="Votre nom..." aria-describedby="basic-addon1">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Prénom*</span>
                <input type="text" class="form-control" required placeholder="Votre prénom..." aria-describedby="basic-addon1">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Téléphone*</span>
                <input type="text" class="form-control"  aria-describedby="basic-addon1" value="069">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Email*</span>
                <input type="text" class="form-control" required placeholder="Votre email..." aria-describedby="basic-addon1">
              </div><br>
              <div class="row">
                <div class="col-sm-3">Vos thèmes préférés : </div>
                <div class="col-sm-9">
                  <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-info btn-option">
                      <input type="checkbox"  name="concert" value="1" /> Concert
                    </label>
                    <label class="btn btn-info btn-option">
                      <input type="checkbox"  name="Batiment" value="2" /> Batiment
                    </label>
                    <label class="btn btn-info btn-option">
                      <input type="checkbox"  name="Conférences" value="3" /> Conférences
                    </label>
                    <label class="btn btn-info btn-option">
                      <input type="checkbox"  name="Sport" value="4" /> Sport
                    </label>
                    <label class="btn btn-info btn-option active">
                      <input type="checkbox"  name="Maison" checked="checked" value="5" /> Maison
                    </label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-3">S'abonner à la Newsletter : </div>
                <div class="col-sm-9">
                  <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-info btn-option">
                      <input type="radio"  name="newsletter" value="1" /> Oui
                    </label>
                    <label class="btn btn-info btn-option">
                      <input type="radio"  name="newsletter" value="0" /> Non
                    </label>

                  </div>
                </div>
              </div>


              <button type="submit" name="submit" id="submitButton" title="Click here to submit your message!" class="btn btn-success pull-right">S'enregistrer</button>
            </p>
          </form>
        </div>

      </div>

    </div>

  </div>

  <div class="col-md-4 col-sm-4">

    <!-- Contact Info -->
    <div class="contactinfo">
      <h2 class="title">Contact Info</h2>
      <ul class="clearfix">
        <li class="clearfix">
          <span class="titles">1</span> <span class="content">Créez votre compte</span>
        </li>
        <li class="clearfix">
          <span class="titles">2</span> <span class="content">Créez votre Évènement</span>
        </li>
        <li class="clearfix">
          <span class="titles">3</span> <span class="content">Participez aux Évènements</span>
        </li>
        <li class="clearfix">
          <span class="titles">4</span> <span class="content">Réservez vos places</span>
        </li>

      </ul>
      <!-- Social Icon -->
      <div class="social-icon">
        <a href="#" class="facebook fa fa-facebook"></a>
        <a href="#" class="twitter fa fa-twitter"></a>
        <a href="#" class="googleplus fa fa-google-plus"></a>
        <a href="#" class="linkedin fa fa-linkedin"></a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
