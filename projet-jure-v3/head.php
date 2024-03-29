<?php session_start(); ?>
<!DOCTYPE html>
<?php
require 'connexion_bdd.php';
?>


<html lang="fr" dir="ltr">
<meta charset="utf-8" />
<!--Head du site-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Projet Jura</title>
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="#!">Projet Jura</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="page_connexion.php">Connexion</a></li>
          <?php
          /* onglet "Votre espace" qui s'affiche seulement quand on est connecté */

          mysqli_set_charset($link, "utf8");
          if (isset($_SESSION['identifiant'])) {
            $req = "SELECT identifiant
                  FROM client
                  WHERE identifiant = '" . $_SESSION['identifiant'] . "';";
            $result = mysqli_query($link, $req);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($row['identifiant'] == $_SESSION['identifiant']) {
              echo " <li class='nav-item'><a class='nav-link' href='espace_client.php'>Votre espace </a></li>";
              echo " <li class='nav-item'><a class='nav-link' href='formulaire.php'>formulaire de réservation </a></li>";
              echo " <form action='index.php' method='post'>

              <button type='submit'>
                <li class='nav-item'><a class='nav-link'>Déconnexion</a></li>
              </button>
              
              </form>";
            }
          }
          ?>

          <?php
          if ($_SERVER['REQUEST_METHOD'] == "POST") {

            unset($_SESSION['identifiant']);
            header("location:index.php");
          }


          ?>

          </li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>


  </ul>
  </div>