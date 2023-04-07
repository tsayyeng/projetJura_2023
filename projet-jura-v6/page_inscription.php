<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/styles.css">
    <?php require "header.php"; ?>
</head>

<body>


    <?php
    require 'navbar.php';
    ?>


    <!--Page d'inscription d'un utilisateur-->
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Créer un compte</h2>
                                <?php
                                if (isset($_REQUEST['login'], $_REQUEST['mail'], $_REQUEST['mdp'])) {
                                    // récupérer le nom d'utilisateur
                                    $nom = stripslashes($_REQUEST['nom']);
                                    $nom = mysqli_real_escape_string($link, $nom);

                                    // récupérer le prenom d'utilisateur
                                    $prenom = stripslashes($_REQUEST['prenom']);
                                    $prenom = mysqli_real_escape_string($link, $prenom);

                                    // récupérer login client
                                    $login = stripslashes($_REQUEST['login']);
                                    $login = mysqli_real_escape_string($link, $login);

                                    // récupérer mail client
                                    $mail = stripslashes($_REQUEST['mail']);
                                    $mail = mysqli_real_escape_string($link, $mail);

                                    // vérifier si l'adresse e-mail est valide
                                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                        echo "L'adresse e-mail est invalide.
                                        <a href='page_inscription.php'>retour</a>";
                                    } else {
                                        // récupérer le mot de passe
                                        $mdp = stripslashes($_REQUEST['mdp']);
                                        $mdp = mysqli_real_escape_string($link, $mdp);

                                        $query = "INSERT into utilisateur (login, mdp, nom, prenom, mail)
                                            VALUES ('$login','" . hash('sha256', $mdp) . "', '$nom', '$prenom', '$mail')";
                                        $res = mysqli_query($link, $query);

                                        if ($res) {
                                            echo "<div class='sucess'>
                                                <h3>Vous êtes inscrit avec succès.</h3>
                                                <p>Cliquez ici pour vous <a href='se_connecter.php'>connecter</a></p>
                                            </div>";
                                        } else {
                                           echo "Une erreur est survenue lors de l'inscription.";
                                        }
                                    }
                                } else {
                                ?>
                                    <form method="post">

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="nom" placeholder="Nom" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="prenom" placeholder="Prenom" required />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="login" placeholder="identifiant" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="mdp" placeholder="Mot de passe" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="mail" class="form-control form-control-lg" name="mail" placeholder="Mail" required />
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="submit" name="submit" value="S'inscrire" class="btn btn-success btn-block btn-lg gradient-custom-4" />
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Vous êtes déjà inscrit ? <a href="se_connecter.php" class="fw-bold text-body"><u>Connectez-vous</u></a></p>
                                        <a href="index.php">retour accueil</a>
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
</body>

</html>