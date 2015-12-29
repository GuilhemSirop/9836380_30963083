<div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget red">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> Utilisateurs innactifs </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> Nom</th>
                                        <th><i class="icon-bookmark"></i> Prénom</th>
                                        <th><i class=" icon-edit"></i> Téléphone</th>
                                        <th>Mail</th>
                                        <th>Inscrit le</th>
                                        <th>Type</th>
                                        <th>Etat</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $users_all = $connexion->gets_with_option_order("Users", "etat_user", "0", "date_inscription", "DESC");


                                        foreach ($users_all as $user) {
                                            //On convertit la date en FR
                                            $date=$connexion->dateToFr($user['date_inscription']);


                                            echo "
                                    <tr>
                                        <td>".$user['id_user']."</td>
                                         <td>".$user['nom_user']."</td>
                                         <td>".$user['prenom_user']."</td>
                                         <td>".$user['tel1_user']."</td>
                                         <td>".$user['mail_user']."</td>
                                         <td>".$date."</td>
                                         <td>".$user['type_user']."</td>
                                         <td>";
                                             if ($user['etat_user']==0) { echo "<span class=\"label label-warning label-mini\">Désactivé</span>"; } else { echo "<span class=\"label label-success\">Actif</span>"; }
                                             echo "</td>
                                         <td>
                                         <a href=\"index.php?ac=gestion_users&view=fiche_user&user=".$user['id_user']."   \"><button class=\"btn btn-info\"><i class=\"icon-zoom-in\"></i></button></a>

                                            <button class=\"btn btn-danger\"><i class=\"icon-trash\"></i></button>
                                         </td>

                                     </tr>";


                                }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>
