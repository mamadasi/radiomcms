<?php
$hote = "localhost";
$nom_de_la_db = "PlayPower";
$utilisateur_de_la_db = "root";
$mdp_de_la_db = "adminadmin";
$connexion = mysql_connect ($hote, $utilisateur_de_la_db, $mdp_de_la_db);
mysql_select_db ($nom_de_la_db, $connexion);
?>