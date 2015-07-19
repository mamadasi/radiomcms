<div class="modal fade" id="modal_connexion" tabindex="-1" role="dialog" aria-labelledby="modal_connexion_label">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form action="?action=connexion" method="post">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="modal_connexion_label">Connexion à <?php echo $nr; ?></h4>
</div>
<div class="modal-body">
<?php
if (isset($pseudo_verif) && isset($avatar_verif)) {
?>
<p>Il semble que tu te sois connecté avec le compte ci-dessous sur cet ordinateur la dernière fois</p>
<center>
<img class="img-circle" src="<?php echo $avatar_verif; ?>" style="border: 2px solid #DDD; width: 80px;"><br>
<h4><?php echo $pseudo_verif; ?></h4>
</center>
<br><br><br>
<label for="mdp">Mot de passe</label>
<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Ton mot de passe ..." required>
<?php
} else {
?>
<label for="pseudo">Pseudo</label>
<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Ton pseudo ..." required><br>
<label for="mdp">Mot de passe</label>
<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Ton mot de passe ..." required>
<?php
}
?>
</div>
<div class="modal-footer">
<?php
if (isset($pseudo_verif) && isset($avatar_verif)) {
?>
<a href="?action=ignorer_connexion_auto"><button type="button" class="btn btn-danger">Ce compte n'est pas à moi</button></a>
<?php
}
?>
<button type="submit" class="btn btn-success">Go !</button>
</div>
</form>
</div>
</div>
</div>