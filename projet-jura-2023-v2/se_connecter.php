<link rel="stylesheet" href="css/styles.css">
<?php
require 'head.php';
?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Se connecter</h2>

                            <form class="box" action="" method="post" name="identifiant">

                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control form-control-lg" name="identifiant" placeholder="Identifiant" required />
                                    <label class="form-label" for="form3Example1cg">Identifiant</label>
                                </div>


                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control form-control-lg" name="mdp" placeholder="Mot de passe" required />
                                    <label class="form-label" for="form3Example1cg">Mot de passe</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" value="Connexion" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit">
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Vous n'avez pas de compte ?<a href="page_connexion.php" class="fw-bold text-body"><u> Créer un compte</u></a></p>
                                <a href="index.php">retour accueil</a>
                            </form>
                            <?php
                            if (isset($_POST['identifiant'])) {
                                $identifiant = stripslashes($_REQUEST['identifiant']);
                                $identifiant = mysqli_real_escape_string($link, $identifiant);
                                $_SESSION['identifiant'] = $identifiant;
                                $mdp = stripslashes($_REQUEST['mdp']);
                                $mdp = mysqli_real_escape_string($link, $mdp);

                                $query = "SELECT * FROM utilisateur
                                            WHERE identifiant='$identifiant'
	                                          AND mdp='" . hash('sha256', $mdp) . "'";
                                //Connexion d'un utlisateur
                                if ($result = mysqli_query($link, $query)) {
                                    if (mysqli_num_rows($result) == 1) {
                                        $user = mysqli_fetch_assoc($result);
                                        // vérifier si l'utilisateur est un administrateur ou un utilisateur
                                        if ($user['admin'] == '1') {
                                            header('location: admin.php');
                                        } else {
                                            header('location: index.php');
                                        }
                                    } else {
                                        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                                    }
                                }
                            }
                            ?>
                            <?php if (!empty($message)) { ?>
                                <p class="errorMessage"><?php echo $message; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>