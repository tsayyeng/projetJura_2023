<!DOCTYPE html>

<head>
    <?php require "header.php"; ?>
    <link rel="stylesheet" href="css/styles.css">
</head>


<body>
    <?php
    include 'navbar.php';
    ?>

    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Se connecter</h2>

                                <form class="box" action="" method="post" name="login">

                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control form-control-lg" name="login" placeholder="identifiant" required />
                                        <label class="form-label" for="form3Example1cg"></label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control form-control-lg" name="mdp" placeholder="Mot de passe" required />
                                        <label class="form-label" for="form3Example1cg"></label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" value="Connexion" class="btn btn-success btn-block btn-lg gradient-custom-4" name="submit">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Vous n'avez pas de compte ?<a href="page_inscription.php" class="fw-bold text-body"><u> Créer un compte</u></a></p>
                                    <a href="index.php">retour accueil</a>
                                </form>
                                <?php

                                if (isset($_POST['login'])) {
                                    $login = stripslashes($_REQUEST['login']);
                                    $login = mysqli_real_escape_string($link, $login);
                                    $mdp = stripslashes($_REQUEST['mdp']);
                                    $mdp = mysqli_real_escape_string($link, $mdp);

                                    $query = "SELECT * FROM utilisateur
                                          WHERE login='$login'
                                          AND mdp='" . hash('sha256', $mdp) . "'";

                                    if ($result = mysqli_query($link, $query)) {
                                        if (mysqli_num_rows($result) == 1) {
                                            session_destroy();
                                            session_start();
                                            $_SESSION["login"] = $login;
                                            $sessionlogin = $_SESSION["login"];
                                            error_log("session login = $sessionlogin", 0);
                                            $user = mysqli_fetch_assoc($result);
                                            // vérifier si l'utilisateur est un administrateur ou un utilisateur
                                            if ($user['admin'] == '1') {
                                                header('location: admin.php');
                                            } else {
                                                header('location: index.php');
                                            }
                                        } else {
                                            error_log("suppression de la session", 0);
                                            session_unset();
                                           // session_destroy();
                                            $_SESSION = array();
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
</body>
</html>