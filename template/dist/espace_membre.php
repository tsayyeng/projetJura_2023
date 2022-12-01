<!--Espace de la personne connectée avec son compte -->

<?php require 'head.php';

$req = "SELECT *
          FROM livre li
          JOIN utilisateur u ON li.idUser = u.idUser
          WHERE login = '" . $_SESSION['login'] . "';";

$result = mysqli_query($link, $req);?>
<br>
<?php
echo "Bonjour " .  $_SESSION['login'] . ", bienvenue sur votre espace personnel.<br><br>";

    if (mysqli_num_rows($result) == 0) {
      echo "Vous n'avez aucun livre réservé.";
    }else {
      echo "<p>Vos livres réservés : </p>";
      echo "<ul>";
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
          <li>Titre : <?= $row['titre'] ?> | Isbn :<?= $row['isbn'] ?> </li>
      <?php } ?>
    </ul>
    <?php } ?>

    <br><br>





<?php
require 'foot.php';
require 'deconnexion_bdd.php';
?>
