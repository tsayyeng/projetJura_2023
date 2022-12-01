<?php
require("config.php");
$link = mysqli_connect (DB_HOST,DB_USER, DB_PWD, DB_NAME);

if(!$link){
  echo "Erreur: Impossible de se connecter à MySQL";
  exit;
}

echo "<br>Succès: Une connexion correcte à MySQL a été faite! La base de donée ipssisqfooteux a été ouverte.";
?>
