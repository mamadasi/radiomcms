<?php
// Informations sur la page
$np = "Lecteur personnalisable";
$_SESSION['page'] = "lecteur";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>
        <?php
            echo $nr;
            echo " - ";
            echo $np;
        ?>
    </title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/default.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <?php include('template/menu.php'); ?>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <?php include('template/alert.php'); ?>
          <?php include('template/header.php'); ?>
          <div class="panel panel-default">
            <div class="panel-body">
              <h1><?php echo $np; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p class="text-primary"><span class="glyphicon glyphicon-paperclip"></span> Choisis les couleurs de ton lecteur en cliquant sur les bandes de couleurs</p>
                  <form action="?p=lecteur" method="post">
                    <div class="row">
                      <div class="col-lg-4">
                        <label><u>Couleur de fond</u></label>
                      </div>
                      <div class="col-lg-8">
                        <input type="color" class="form-control" id="bg" name="bg" value="<?php
                          if (isset($_POST['bg'])) {
                            echo $_POST['bg'];
                          } else {
                            echo '#000000';
                          }
                          ?>" required>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-4">
                        <label><u>Couleur de police</u></label>
                      </div>
                      <div class="col-lg-8">
                        <input type="color" class="form-control" id="police" name="police" value="<?php
                          if (isset($_POST['police'])) {
                            echo $_POST['police'];
                          } else {
                            echo '#ffffff';
                          }
                          ?>" required>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-4">
                        <label><u>Format</u></label>
                      </div>
                      <div class="col-lg-8">
                        <p><input type="radio" name="format" id="format1" value="medium" <?php
                          if (!isset($_POST['format'])) {
                            echo 'checked=""';
                          } elseif (isset($_POST['format'])) {
                            if ($_POST['format'] == "medium") {
                              echo 'checked=""';
                            }
                          }
                        ?>> 300 x 389 pixels</p>
                        <p><input type="radio" name="format" id="format2" value="horizontal" <?php
                          if (isset($_POST['format'])) {
                            if ($_POST['format'] == "horizontal") {
                              echo 'checked=""';
                            }
                          }
                        ?>> 728 x 90 pixels</p>
                        <p><input type="radio" name="format" id="format3" value="mobile" <?php
                          if (isset($_POST['format'])) {
                            if ($_POST['format'] == "mobile") {
                              echo 'checked=""';
                            }
                          }
                        ?>> 320 x 90 pixels</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-4">
                        <label><u>Lecture</u></label>
                      </div>
                      <div class="col-lg-8">
                        <p><input type="checkbox" id="lecture" name="lecture" value="oui" <?php
                          if (isset($_POST['lecture'])) {
                            if ($_POST['format'] == "oui") {
                              echo 'checked=""';
                            }
                          } 
                          ?>> Lecture automatique</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-4">
                        <button type="submit" class="btn btn-success"><?php
                          if (isset($_POST['bg']) && isset($_POST['police']) && isset($_POST['format'])) {
                            echo "Modifier";
                          } else {
                            echo "Visualiser";
                          }
                        ?></button>
                      </div>
                      <div class="col-lg-8">
                        <a href="<?php echo $lrl; ?>" target="_BLANC">Aller voir les lecteurs sur Radionomy</a>
                     </div>
                   </div>
                </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    if (isset($_POST['bg']) && isset($_POST['police']) && isset($_POST['format'])) {
                      $bg_couleur = $_POST['bg'];
                      $police_couleur = $_POST['police'];
                      $format = $_POST['format'];
                      if (isset($_POST['lecture'])) {
                        if ($_POST['lecture'] == "oui") {
                          $lecture_auto = "1";
                        } else {
                          $lecture_auto = "0";
                        }
                      } else {
                        $lecture_auto = "0";
                      }
                      ?>
                        <script>(function (win, doc, script, source, objectName) { (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName); win[objectName] = win[objectName] || function (k, v) { (win[objectName].parameters = win[objectName].parameters || { src: source, version: '1.1' })[k] = v; }; var js, rjs = doc.getElementsByTagName(script)[0]; js = doc.createElement(script); js.async = 1; js.src = source; rjs.parentNode.insertBefore(js, rjs); }(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
radplayer('url', 'playpowerofficiel');
radplayer('type', '<?php echo $format; ?>');
radplayer('autoplay', '<?php echo $lecture_auto; ?>');
radplayer('volume', '50');
radplayer('color1', '<?php echo $bg_couleur; ?>');
radplayer('color2', '<?php echo $police_couleur; ?>');
                        </script>
                        <div class="radionomy-player"></div>
                        <h4>Copie ce code sur ton site pour écouter <?php echo $nr; ?></h4>
                        <textarea class="form-control" rows="15"><script>(function (win, doc, script, source, objectName) { (win.RadionomyPlayerObject = win.RadionomyPlayerObject || []).push(objectName); win[objectName] = win[objectName] || function (k, v) { (win[objectName].parameters = win[objectName].parameters || { src: source, version: '1.1' })[k] = v; }; var js, rjs = doc.getElementsByTagName(script)[0]; js = doc.createElement(script); js.async = 1; js.src = source; rjs.parentNode.insertBefore(js, rjs); }(window, document, 'script', 'https://www.radionomy.com/js/radionomy.player.js', 'radplayer'));
radplayer('url', 'playpowerofficiel');
radplayer('type', '<?php echo $format; ?>');
radplayer('autoplay', '<?php echo $lecture_auto; ?>');
radplayer('volume', '50');
radplayer('color1', '<?php echo $bg_couleur; ?>');
radplayer('color2', '<?php echo $police_couleur; ?>');
</script></textarea>
                      <?php
                    } else {
                      ?>
                      <label>Remplis le formulaire ci-contre pour visualiser ton lecteur</label>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php include('template/footer.php'); ?>
        </div>
      </div>
    </div>
    <?php include('template/modal_connexion.php'); ?>
    <!-- Bootstrap core JavaScript    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
      if (isset($pseudo_verif) && isset($avatar_verif)) {
    ?>
    <script>
     $('#modal_connexion').modal('show')
    </script>
    <?php
      }
    ?>
  </body>
</html>