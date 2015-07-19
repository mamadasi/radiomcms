<?php
// Informations sur la page
$np = "Partenaires";
$_SESSION['page'] = "partenaires";
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
              <h1>Les partenaires de <?php echo $nr; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <center>Demande de partenariat</center>
                </div>
                <div class="panel-body">
                  <?php
                    if (isset($_SESSION['pseudo'])) {
                  ?>
                  <form action="?action=partenaire" method="post">
                    <label for="nom">Nom du site ou de la communauté</label>
                    <input type="text" class="form-control" id="nom" name="nom" required><br>
                    <label for="logo">Lien du logo</label>
                    <input type="url" class="form-control" id="logo" name="logo" required><br>
                    <label for="email">Email personnel</label>
                    <input type="mail" class="form-control" id="email" name="email" required><br>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                  </form>
                  <?php
                    } else {
                  ?>
                  <label>Tu dois <a href="?p=inscription">t'inscrire</a> pour publier ta dédicace</label>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM partenaires WHERE verif="1" ORDER BY id';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <a target="_BLANC" href="<?php echo $data['lien']; ?>"><img src="<?php echo $data['lien_image']; ?>" style="width: 20%;"></a>
                  <?php
                    }
                    mysql_free_result ($req);
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