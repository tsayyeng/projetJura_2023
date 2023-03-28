<?php
require 'head.php';
?>

<body>
    <h1>Liste des utilisateurs</h1>
    <?php
    mysqli_set_charset($link, "utf8");
    $req = 'SELECT *
    FROM client';

    $result = mysqli_query($link, $req);

    ?>

    <ul>
        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <li>Id utilisateur : <?= $row['idClient'] ?> | Login : <?= $row['identifiant'] ?> | Adresse mail : <?= $row['mail'] ?> </li><br>
        <?php } ?>
    </ul>



