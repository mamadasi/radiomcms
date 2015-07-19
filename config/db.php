<?php
$hote = "HOTE_DE_VOTRE_BDD";
$nom_de_la_db = "NOM_DE_VOTRE_BDD";
$utilisateur_de_la_db = "NOM_UTILISATEUR_DE_VOTRE_BDD";
$mdp_de_la_db = "MDP_DE_VOTRE_BDD";

//Connexion à la base de donnée: ne pas toucher au code ci-dessous
$connexion = mysql_connect ($hote, $utilisateur_de_la_db, $mdp_de_la_db);
mysql_select_db ($nom_de_la_db, $connexion);
?>