<?php
// Informations sur la page
$np = "Equipe";
$_SESSION['page'] = "equipe";
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
              <h1><?php echo $nr; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>Annimateurs</center></div>
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM users WHERE rank="2" ORDER BY id';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <div class="row">
                      <div class="col-lg-3">
                        <center>
                          <img class="img-circle" style="width: 50px; height: 50px; border: 2px solid #dddddd;" src="<?php echo $data['lien_avatar']; ?>">
                          <br>
                          <p><?php echo $data['pseudo']; ?></p>
                        </center>
                      </div>
                      <div class="col-lg-9">
                        <div class="well">
                          <p><u>Role:</u> <?php echo $data['statu']; ?></p>
                          <p><u>Description:</u> <?php echo $data['description']; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                    mysql_free_result ($req);
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>DJ's</center></div>
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM users WHERE rank="3" ORDER BY id';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <div class="row">
                      <div class="col-lg-3">
                        <center>
                          <img class="img-circle" style="width: 50px; height: 50px; border: 2px solid #dddddd;" src="<?php echo $data['lien_avatar']; ?>">
                          <br>
                          <p><?php echo $data['pseudo']; ?></p>
                        </center>
                      </div>
                      <div class="col-lg-9">
                        <div class="well">
                          <p><u>Role:</u> <?php echo $data['statu']; ?></p>
                          <p><u>Description:</u> <?php echo $data['description']; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                    mysql_free_result ($req);
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>Autres</center></div>
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM users WHERE rank="4" ORDER BY id';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <div class="row">
                      <div class="col-lg-3">
                        <center>
                          <img class="img-circle" style="width: 50px; height: 50px; border: 2px solid #dddddd;" src="<?php echo $data['lien_avatar']; ?>">
                          <br>
                          <p><?php echo $data['pseudo']; ?></p>
                        </center>
                      </div>
                      <div class="col-lg-9">
                        <div class="well">
                          <p><u>Role:</u> <?php echo $data['statu']; ?></p>
                          <p><u>Description:</u> <?php echo $data['description']; ?></p>
                        </div>
                      </div>
                    </div>
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