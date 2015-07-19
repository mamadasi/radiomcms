            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="."><?php echo $nr; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li <?php if ($np == "Accueil") { ?>class="active"<?php } ?>><a href=".">Accueil</a></li>
                <li <?php if ($np == "Ecoute") { ?>class="active"<?php } ?>><a href="?p=ecoute">Ecouter</a></li>
                <li <?php if ($np == "News") { ?>class="active"<?php } ?>><a href="?p=news">News</a></li>
                <li <?php if ($np == "Programme") { ?>class="active"<?php } ?>><a href="?p=programme">Programme</a></li>
                <li <?php if ($np == "Equipe") { ?>class="active"<?php } ?>><a href="?p=equipe">Equipe</a></li>
                <li <?php if ($np == "Top 10") { ?>class="active"<?php } ?>><a href="?p=top10">Top 10</a></li>
                <li <?php if ($np == "Partenaires") { ?>class="active"<?php } ?>><a href="?p=partenaires">Partenaires</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
<?php
if (!isset($_SESSION['pseudo'])) {
?>
                <li <?php if ($np == "Inscription") { ?>class="active"<?php } ?>><a href="?p=inscription">Inscription</a></li>
                <li><a data-toggle="modal" data-target="#modal_connexion"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
<?php
} elseif (isset($_SESSION['pseudo'])) {
?>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $la; ?>" width: 22px" height="22px" class="img-circle"> <?php echo $_SESSION['pseudo']; ?></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Mon compte</a></li>
                    <li><a href="#">Paramètres</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Besoin d'aide ?</a></li>
                    <li><a href="#">Support</a></li>
<?php
if ($rank >= "2") {
?>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Admin tool</li>
                    <li><a href="#">Administration</a></li>
                    <li><a href="#">Modération</a></li>
<?php
}
?>
                    <li role="separator" class="divider"></li>
                    <li><a href="?action=deconnexion">Déconnexion</a></li>
                  </ul>
                </li>
<?php
}
?>
              </ul>
            </div>
