<?php
// Informations sur la page
$np = "Accueil";
$_SESSION['page'] = "accueil";
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
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="css/bootstrap-player.css" rel="stylesheet">
  </head>
<!-- NAVBAR================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
<?php include('template/alert.php'); ?>
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
               <?php include('template/menu.php'); ?>
          </div>
        </nav>
      </div>
    </div>
    <!-- Carousel    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
<?php
if (!isset($_SESSION['pseudo'])) {
?>
        <li data-target="#myCarousel" data-slide-to="2"></li>
<?php
}
?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/banner/1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>PlayPower</h1>
              <p>Radio qui diffuse tous les hits du moment.</p>
              <p><a class="btn btn-lg btn-primary" href="?p=ecoute" role="button">Je l'écoute !</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/banner/2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>L'équipe</h1>
              <p>L'équipe de <?php echo $nr; ?> est la pour mettre l'ambiance ! Communique avec elle pendant les lives.</p>
              <p><a class="btn btn-lg btn-primary" href="?p=direct" role="button">Je vais sur le direct</a> <a class="btn btn-lg btn-primary" href="?p=equipe" role="button">Je vais voir l'équipe</a></p>
            </div>
          </div>
        </div>
<?php
if (!isset($_SESSION['pseudo'])) {
?>
        <div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Ton compte</h1>
              <p>Inscrips-toi pour avoir accès à toutes les fonctions du site.</p>
              <p><a class="btn btn-lg btn-primary" href="?p=inscription" role="button">Inscription</a></p>
            </div>
          </div>
        </div>
<?php
}
?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    <!-- Marketing messaging and featurettes    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
<?php include('template/header.php'); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Dernière new</div>
            <div class="panel-body">
<?php
$sql = 'SELECT id, nom, description, image FROM news ORDER BY id DESC LIMIT 1';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
while ($data = mysql_fetch_array($req)) {
?>
          <img class="img-circle" src="<?php echo $data['image']; ?>" alt="" width="140" height="140" style="border: 2px solid #DDD;">
          <h2><?php echo $data['nom']; ?></h2>
          <p><?php echo $data['description']; ?></p>
          <p><a class="btn btn-primary" href="?p=news&id=<?php echo $data['id']; ?>" role="button">Voir la suite &raquo;</a></p>
<?php
}
mysql_free_result ($req);
?>
              </div>
            </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Top n°1</div>
            <div class="panel-body">
<?php
$sql = 'SELECT * FROM top10 WHERE id="1"';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysql_fetch_array($req);
mysql_free_result ($req);
?>
                <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;">
                <h2><?php echo $data['titre']; ?></h2>
                <p>De <?php echo $data['artiste']; ?></p>
		      <audio controls>
			     <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		      </audio>
              </div>
            </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Dédicace</div>
            <div class="panel-body">
<?php if (isset($_SESSION['pseudo'])) { ?>
<form action="?action=dedicace" method="post">
<div class="form-group">
<textarea class="form-control" rows="3" id="dedicace" name="dedicace" placeholder="Ta dédicace ..." required></textarea>
</div>
<button type="submit" class="btn btn-success">Publier</button>
</form>
<?php } else { ?>
<label>Tu dois <a href="?p=inscription">t'inscrire</a> pour publier ta dédicace</label>
<?php } ?>
              </div>
            </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-8">
          <div class="panel panel-primary">
            <div class="panel-heading"><center>Tchat</center></div>
            <div class="panel-body">

              </div>
            </div>
        </div><!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Au programme</div>
            <div class="panel-body">

                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>Heure</th>
                        <th>Emission</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql = 'SELECT heure, emission, heure_fin FROM programme WHERE jour="'.$jour.'" AND mois="'.$mois.'" AND annee="'.$annee.'" ORDER BY heure';
                        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                        while ($data = mysql_fetch_array($req)) {
                      ?>
                      <tr>
                        <td><?php echo $data['heure']; ?>h à <?php echo $data['heure_fin']; ?>h</td>
                        <td><?php echo $data['emission']; ?></td>
                        <td><a href="?p=emission&nom=<?php echo $data['emission']; ?>" class="text-success"><span class="glyphicon glyphicon-plus-sign"></span></a></td>
                      </tr>
                      <?php
                        }
                        mysql_free_result ($req);
                      ?>
                    </tbody>
                  </table>
              </div>
            </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
<?php include('template/footer.php'); ?>
<?php include('template/modal_connexion.php'); ?>
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-player.js"></script>
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