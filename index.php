<?php
// Insertion des fonctions
include('config/fonctions.php');

// Recherche de la page
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = "accueil";
}

// Affichage de la page
include $page.'.php';
exit();
?>