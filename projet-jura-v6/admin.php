<!DOCTYPE html>


<head>
    <?php require "header.php"; ?>
</head>

<body>

    <?php
    require "navbar.php";

    ?>


    <h1>Liste des utilisateurs</h1>
    <?php
    mysqli_set_charset($link, "utf8");
    $req = 'SELECT *
    FROM utilisateur';

    $result = mysqli_query($link, $req);

    ?>

    <ul>
        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <li>Id utilisateur : <?= $row['idUser'] ?> | Login : <?= $row['login'] ?> | Adresse mail : <?= $row['mail'] ?> </li><br>
        <?php } ?>
    </ul>

    <?php require "add_admin.php";  ?>
</body>

</html>