 <?php 
 require "connexion_bdd.php";
 ?>
 
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="#!">Projet Jura</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="se_connecter.php">Connexion</a></li>

          <?php

          if (isset($_SESSION['login'])) {
            echo "<li class='nav-item'><a class='nav-link' href='espace_client.php'>Votre espace </a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='formulaire.php'>Vos réservations </a></li>";
          }


          mysqli_set_charset($link, "utf8");
          if (isset($_SESSION['login'])) {
            $req = "SELECT admin
              FROM utilisateur
              WHERE login = '" . $_SESSION['login'] . "';";
            $result = mysqli_query($link, $req);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if (!empty($row) && $row['admin'] == 1) {
              echo "<li class='nav-item'><a class='nav-link' href='admin.php'>Espace admin </a></li>";
            }
          ?>
            <form action="logout.php" method="post">

              <button type="submit">Déconnexion</button>

            </form>

          <?php
          }

          ?>
      </div>
  </nav>