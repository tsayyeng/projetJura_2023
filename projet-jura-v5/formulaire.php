<!DOCTYPE HTML>
<html>
<?php
require 'head.php';
?>

  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
         <?php
      if (isset($_REQUEST['dateDepart'], $_REQUEST['dateArrivee'], $_REQUEST['nbPersonne'])) {

          // récupérer le nom d'utilisateur
          $dateDepart = stripslashes($_REQUEST['dateDepart']);
          $dateDepart = mysqli_real_escape_string($link, $dateDepart);

          // récupérer le prenom d'utilisateur
          $dateArrivee = stripslashes($_REQUEST['dateArrivee']);
          $dateArrivee = mysqli_real_escape_string($link, $dateArrivee);

          // récupérer nbPersonne client
          $nbPersonne = stripslashes($_REQUEST['nbPersonne']);
          $nbPersonne = mysqli_real_escape_string($link, $nbPersonne);


          $query = "INSERT into reservation (dateDepart, dateArrivee, nbPersonne)
				VALUES ('$dateDepart', '$dateArrivee', '$nbPersonne')";
          $res = mysqli_query($link, $query);

          if ($res) {
            echo "<div class='sucess'>
             <h3>vous avez réservé.</h3>
             <p>retour à l'accueil <a href='index.php'>cliquez ici</a></p>
			 </div>";
          }
        } else {

        ?>
          <form>

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg" name="dateDepart" placeholder="Date de départ" required />
            </div>

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg" name="dateArrivee" placeholder="DAte d'arrivé" required />

            </div>

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg" name="nbPersonne" placeholder="nombre de personne" required />
            </div>

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg" name="dateReservation" placeholder="Date de réservation" required />
            </div>

            <div class="d-flex justify-content-center">
              <input type="submit" name="submit" value="Réserver" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" />
            </div>

            <a href="index.php">retour accueil</a>
          </form>
        <?php }
        ?>
