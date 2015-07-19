<?php
// Informations sur la page
$np = "Ecoute";
$_SESSION['page'] = "ecoute";
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
    <nav class="navbar navbar-inverse navbar-static-top">
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
              <h1>Ecoutes où que tu sois <?php echo $nr; ?> ...</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>... Avec son lecteur</h4>
                  <a data-toggle="modal" data-target="#modal_lecteur"><button class="btn btn-primary">Aller voir les lecteurs &raquo;</button></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>... Sur son site grâce au direct</h4>
                  <a href="?p=direct"><button class="btn btn-primary">Aller sur le direct &raquo;</button></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>... Sur mobile avec l'application Radionomy</h4>
                  <a data-toggle="modal" data-target="#modal_application"><button class="btn btn-primary">Télécharger l'application &raquo;</button></a>
                </div>
              </div>
            </div>
          </div>
          <?php include('template/footer.php'); ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_lecteur" tabindex="-1" role="dialog" aria-labelledby="modal_lecteur_label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal_lecteur_label">Lecteur personnalisable</h4>
          </div>
          <div class="modal-body">
            <p class="text-primary"><span class="glyphicon glyphicon-paperclip"></span> Choisis les couleurs de ton lecteur en cliquant sur les bandes de couleurs</p>
            <form action="?p=lecteur" method="post">
            <div class="row">
              <div class="col-lg-4">
                <label><u>Couleur de fond</u></label>
              </div>
              <div class="col-lg-8">
                <input type="color" class="form-control" id="bg" name="bg" value="#000000" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <label><u>Couleur de police</u></label>
              </div>
              <div class="col-lg-8">
                <input type="color" class="form-control" id="police" name="police" value="#ffffff" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <label><u>Format</u></label>
              </div>
              <div class="col-lg-8">
                <p><input type="radio" name="format" id="format1" value="medium" checked=""> 300 x 389 pixels</p>
                <p><input type="radio" name="format" id="format2" value="horizontal"> 728 x 90 pixels</p>
                <p><input type="radio" name="format" id="format3" value="mobile"> 320 x 90 pixels</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <label><u>Lecture</u></label>
              </div>
              <div class="col-lg-8">
                <p><input type="checkbox" id="lecture" name="lecture" value="oui"> Lecture automatique</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <button type="submit" class="btn btn-success">Visualiser</button>
              </div>
              <div class="col-lg-8">
                <a href="<?php echo $lrl; ?>" target="_BLANC">Aller voir les lecteurs sur Radionomy</a>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_application" tabindex="-1" role="dialog" aria-labelledby="modal_application_label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal_application_label">Application mobile</h4>
          </div>
          <div class="modal-body">
            <center>
              <a href="https://itunes.apple.com/fr/app/radionomy/id465042448?mt=8" target="_BLANC">
                <img width="200px" src="img/application/apple_store.png">
              </a>
              <hr>
              <a href="https://play.google.com/store/apps/details?id=com.tapptic.radionomy" target="_BLANC">
                <img width="200px" src="img/application/play_store.png">
              </a>
              <hr>
              <a href="http://www.windowsphone.com/fr-fr/store/app/radionomy/ee688aa3-2d45-486e-9ac0-561094ed5ecc" target="_BLANC">
                <img width="200px" src="img/application/windows_phone_store.png">
              </a>
            </center>
          </div>
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