<?php
  $radiouid = "e332ba1c-e73a-48a1-912c-f38cc450f10f";
  $apikey = "0c87d427-a8f8-491c-b3a5-5f58a7150105";
  $xml = @simplexml_load_file('http://api.radionomy.com/currentsong.cfm?radiouid='.$radiouid.'&apikey='.$apikey.'&callmeback=yes&type=xml&cover=yes');
  foreach ($xml as $track) {
    $artiste = $track->artists;
    $titre = $track->title;
    $image = $track->cover;
    $duree = $track->callmeback;
  }
  if (empty($image)) {
    $image = "img/player/no_cover.jpg";
  } elseif (!isset($image)) {
    $image = "img/player/no_cover.jpg";
  }
?>
<div id="player" class="row">
  <div class="col-lg-2">
    <a href="?p=direct"><img style="width: 80px;" src="<?php echo $image; ?>" ></a>
  </div>
  <div class="col-lg-10">
    <center>
      <p><?php echo @$titre; ?><br>De <?php echo @$artiste; ?></p>
      <p><a class="text-success" href="?action=like&titre=<?php echo $titre; ?>&artiste=<?php echo $artiste; ?>" data-toggle="tooltip" data-placement="top" title="J'aime"><span class="text-success glyphicon glyphicon-thumbs-up"></span> J'aime</a> <a class="text-danger" href="?action=no_like&titre=<?php echo $titre; ?>&artiste=<?php echo $artiste; ?>" data-toggle="tooltip" data-placement="down" title="Je n'aime pas"><span class="text-danger glyphicon glyphicon-thumbs-down"></span> Je n'aime pas</a></p>
    </center>
  </div>
</div>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#player').load('template/player.php').fadeIn("slow");
}, <?php echo $duree; ?>);
</script>