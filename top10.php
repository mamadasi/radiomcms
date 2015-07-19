<?php
// Informations sur la page
$np = "Top 10";
$_SESSION['page'] = "top10";
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
    <link href="css/bootstrap-player.css" rel="stylesheet">
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
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="1"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <div class="row">
                    <div class="col-lg-6">
                      <center><img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="60%" style="border: 2px solid #DDD;"></center>
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                      <h2><?php echo $data['titre']; ?></h2>
                      <p>De <?php echo $data['artiste']; ?></p>
	    	            <audio controls>
			         <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		            </audio>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="2"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>2 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="3"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>3 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="4"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>4 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="5"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>5 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="6"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>6 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="7"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>7 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="8"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>8 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="9"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>9 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $sql = 'SELECT * FROM top10 WHERE id="10"';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                    $data = mysql_fetch_array($req);
                    mysql_free_result ($req);
                  ?>
                  <h1>10 - <img class="img-circle" src="<?php echo $data['lien_image']; ?>" width="140" height="140" style="border: 2px solid #DDD;"></h1>
                  <h2><?php echo $data['titre']; ?></h2>
                  <p>De <?php echo $data['artiste']; ?></p>
	  	        <audio controls>
			       <source src="<?php echo $data['lien_musique']; ?>" type="audio/mpeg" />
		        </audio>
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