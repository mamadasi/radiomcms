<?php
// Informations sur la page
$np = "News";
$_SESSION['page'] = "news";
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
              <h1><?php echo $np; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>News récentes</center></div>
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT id, nom FROM news WHERE date = "'.$date2.'" ORDER BY id DESC';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <a href="?p=news&id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-link"><?php echo $data['nom']; ?></button></a><br>
                  <?php
                    }
                    mysql_free_result ($req);
                  ?>
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading"><center>Mois dernier</center></div>
                <div class="panel-body">
                  <?php
                    $mois2 = $mois-1;
                    if ($mois2 <= "9") {
                      $date3 = '0'.$mois2.'/'.$annee;
                    } else {
                      $date3 = $mois2. '/'.$annee;
                    }
                    $sql = 'SELECT id, nom FROM news WHERE date="'.$date3.'" ORDER BY id DESC';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    while ($data = mysql_fetch_array($req)) {
                  ?>
                    <a href="?p=news&id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-link"><?php echo $data['nom']; ?></button></a><br>
                  <?php
                    }
                    mysql_free_result ($req);
                  ?>
                </div>
              </div>
              <a data-toggle="modal" data-target="#modal_news"><button type="button" class="btn btn-primary">Voir les autres news</button></a>
            </div>
            <div class="col-lg-10">
              <div class="panel panel-default">
                <?php
                if (isset($_GET['id'])) {
                  $sql = 'SELECT * FROM news WHERE id="'.$_GET['id'].'"';
                  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                  $data = mysql_fetch_array($req);
                  mysql_free_result ($req);
                ?>
                <div class="panel-heading"><?php echo $data['nom']; ?></div>
                <div class="panel-body">
                  <?php echo html_entity_decode($data['contenu']); ?>
                  <p class="text-right">Le <?php echo $data['date']; ?> par <?php echo $data['auteur']; ?></p>
                  <?php
                    if ($data['commentaire'] == "1") {
                      echo '<hr>';
                      echo '<u>Commentaires</u><br><br>';
                      if (isset($_SESSION['pseudo'])) {
                  ?>
                    <div class="row">
                      <div class="col-lg-2">
                        <center>
                          <img class="img-circle" style="width: 65px; height: 65px; border: 2px solid #dddddd;" src="<?php echo $la; ?>">
                          <br>
                          <p><?php echo $_SESSION['pseudo']; ?></p>
                        </center>
                      </div>
                      <div class="col-lg-10">
                        <form action="?action=commentaire&id_new=<?php echo $_GET['id']; ?>" method="post">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ton commentaire  ..." id="commentaire" name="commentaire">
                            <span class="input-group-btn">
                              <button class="btn btn-success" type="button">Poster</button>
                            </span>
                          </div>
                          </form>
                      </div>
                    </div>
                      <?php
                      } else {
                        echo '<label>Tu dois <a href="?p=inscription">t inscrire</a> pour publier ta dédicace</label>';
                      }
                        $sql = 'SELECT * FROM commentaires WHERE id_2="'.$_GET['id'].'" ORDER BY id DESC';
                        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                        while ($data = mysql_fetch_array($req)) {
                      ?>
                      <div class="row">
                        <div class="col-lg-2">
                          <center>
                            <img class="img-circle" style="width: 65px; height: 65px; border: 2px solid #dddddd;" src="<?php echo $data['avatar']; ?>">
                            <br>
                            <p><?php echo $data['auteur']; ?></p>
                          </center>
                        </div>
                        <div class="col-lg-10">
                          <div class="well well-sm">
                            <?php echo $data['commentaire']; ?>
                          </div>
                        </div>
                      </div>
                      <?php
                        }
                        mysql_free_result ($req);
                    }
                  ?>
                </div>
                <?php
                  } else {
                ?>
                <div class="panel-body">
                  <p class="text-primary"><span class="glyphicon glyphicon-paperclip"></span> Tu dois choisir une new à visionner</p>
                </div>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
          <?php include('template/footer.php'); ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_news" tabindex="-1" role="dialog" aria-labelledby="modal_news_label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal_news_label">Toutes les news</h4>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = 'SELECT * FROM news ORDER BY id DESC';
                  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                  while ($data = mysql_fetch_array($req)) {
                ?>
                <tr>
                  <td><?php echo $data['nom']; ?></td>
                  <td><?php echo $data['description']; ?></td>
                  <td><?php echo$data['date']; ?></td>
                  <td><a href="?p=news&id=<?php echo $data['id']; ?>">Aller voir <span class="glyphicon glyphicon-arrow-right"></span></a></td>
                </tr>
                <?php
                  }
                  mysql_free_result ($req);
                ?>
              </tbody>
            </table>
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