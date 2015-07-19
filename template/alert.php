<?php
if (isset($_SESSION['action'])) {
     if ($_SESSION['action'] == "inscription") {
?>
<div id="alert" class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu es inscris. Tu peux maintenant te connecter.</p>
</div>
<?php
     } elseif ($_SESSION['action'] == "connexion") {
?>
<div id="alert" class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu es connecté <?php echo $_SESSION['pseudo']; ?>.</p>
</div>
<?php
     } elseif ($_SESSION['action'] == "dedicace") {
?>
<div id="alert" class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Ta dédicace a été publier.</p>
</div>
<?php
     } elseif ($_SESSION['action'] == "deconnexion") {
?>
<div id="alert" class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu es déconnecté.</p>
</div>
<?php
     } elseif ($_SESSION['action'] == "vote") {
?>
<div id="alert" class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Ton vote a été pris en compte. Tu ne peux plus voter jusqu'à la sortie du nouveau top 10.</p>
</div>
<?php
     }
$_SESSION['action'] = NULL;
}
if (isset($_SESSION['connexion'])) {
     if ($_SESSION['connexion'] == "compte_non_reconnu") {
?>
<div id="alert" class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Compte inconnu. Vérifie tes identifiants.</p>
</div>
<?php
     }
$_SESSION['connexion'] = NULL;
}
if (isset($_SESSION['inscription_erreur'])) {
     if ($_SESSION['inscription_erreur'] == "ce") {
?>
<div id="alert" class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Ce compte existe déjà.</p>
</div>
<?php
     }
$_SESSION['inscription_erreur'] = NULL;
}
if (isset($_SESSION['news'])) {
     if ($_SESSION['news'] == "deconnecter") {
?>
<div id="alert" class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu dois être connecter pour pouvoir utiliser cette fonction.</p>
</div>
<?php
}
$_SESSION['news'] = NULL;
}
if (isset($_SESSION['vote'])) {
     if ($_SESSION['vote'] == "deconnecter") {
?>
<div id="alert" class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu dois être connecter pour pouvoir utiliser cette fonction.</p>
</div>
<?php
}
     if ($_SESSION['vote'] == "deja_vote") {
?>
<div id="alert" class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4><u>Information:</u></h4>
<p>Tu as déjà voté.</p>
</div>
<?php
}
$_SESSION['vote'] = NULL;
}
?>
