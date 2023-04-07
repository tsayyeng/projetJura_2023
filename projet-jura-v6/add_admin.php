<head>
   
</head>
<!--Page d'inscription d'un utilisateur-->
<section>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Ajouter un admin</h2>
                            <?php
                            if (isset($_REQUEST['identifiant'], $_REQUEST['mdp'], $_REQUEST['admin'])) {

                                // récupérer identifiant client
                                $identifiant = stripslashes($_REQUEST['identifiant']);
                                $identifiant = mysqli_real_escape_string($link, $identifiant);

                                // récupérer le mot de passe
                                $mdp = stripslashes($_REQUEST['mdp']);
                                $mdp = mysqli_real_escape_string($link, $mdp);

                                $admin = stripslashes($_REQUEST['admin']);
                                $admin = mysqli_real_escape_string($link, $admin);

                                $query = "INSERT into utilisateur (identifiant, mdp, admin)
				VALUES ('$identifiant','" . hash('sha256', $mdp) . "$admin')";
                                $res = mysqli_query($link, $query);

                                if ($res) {
                                    echo "<div class='sucess'>
             <h3>Nouvel admin ajouté</h3>
			 </div>";
                                }
                            } else {
                            ?>
                                <form>

                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control form-control-lg" name="identifiant" placeholder="Identifiant" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control form-control-lg" name="mdp" placeholder="Mot de passe" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="number" class="form-control form-control-lg" name="admin" placeholder="admin" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="submit" value="S'inscrire" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" />
                                    </div>
                                </form>
                            <?php }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>