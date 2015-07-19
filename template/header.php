<div class="row">
<div class="col-lg-8">
<div class="well well-sm">
<marquee style="margin-top: 5px;">
<u>Dédicaces:</u>
<?php
$sql = 'SELECT auteur, dedicace FROM dedicaces ORDER BY id DESC';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
while ($data = mysql_fetch_array($req))
{
?>
<?php echo $data['auteur']; ?>: <?php echo $data['dedicace']; ?> - </font>
<?php
}
mysql_free_result ($req);
?>
</marquee>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-primary">
<div class="panel-heading"><center>En ce moment</center></div>
<div class="panel-body">
<?php include('template/player.php'); ?>
</div>
</div>
</div>
</div>