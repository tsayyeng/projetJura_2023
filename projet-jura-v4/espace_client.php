<!--Espace de la personne connectée avec son compte -->

<?php require 'head.php';

$req = "SELECT *
          FROM reservation r
          JOIN client cl ON r.idClient = cl.idClient
          WHERE identifiant = '" . $_SESSION['identifiant'] . "';";

$result = mysqli_query($link, $req);?>
<br>
<?php
echo "Bonjour " .  $_SESSION['identifiant'] . ", bienvenue sur votre espace personnel.<br><br>";

    if (mysqli_num_rows($result) == 0) {
      echo "<center><h1>aucune réservation</h1></center> (aucune réservation enregistrés.) ";
    }else {
      echo "<p>Vos réservations : </p>";
      echo "<ul>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
          <li>Date de réservation : <?= $row['dateReservation'] ?> | Date d'arrivé :<?= $row['dateDepart'] ?> </li>
      <?php } ?>
    </ul>
    <?php } ?>

    <br><br>







