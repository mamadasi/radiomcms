<?php
// Informations sur la page
$np = "Programme";
$_SESSION['page'] = "programme";
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
            <div class="col-lg-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>Aujourd'hui</center></div>
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
            </div>
            <div class="col-lg-8">
              <div class="panel panel-primary">
                <div class="panel-heading"><center>Pour les jours qui viennent</center></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <?php
                        if ($jour == "31") {
                          $jour_demain = "01";
                          if ($mois <= "08") {
                            $mois_apres = $mois+1;
                            $mois_apres = '0'.$mois_apres;
                          } else {
                            $mois_apres = $mois=1;
                          }
                          if ($mois == "12") {
                            $annee_apres = $annee+1;
                          } else {
                            $annee_apres = $annee;
                          }
                        } else {
                          if ($jour <= "08") {
                            $jour_demain = $jour+1;
                            $jour_demain = '0'.$jour_demain;
                            $mois_apres = $mois;
                            $annee_apres = $annee;
                          } else {
                            $jour_demain = $jour+1;
                            $mois_apres = $mois;
                            $annee_apres = $annee;
                          }
                        }
                      ?>
                      <p>Demain le <?php echo $jour_demain; ?> / <?php echo $mois_apres; ?> / <?php echo $annee_apres; ?></p>
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
                            $sql = 'SELECT heure, emission, heure_fin FROM programme WHERE jour="'.$jour_demain.'" AND mois="'.$mois_apres.'" AND annee="'.$annee_apres.'" ORDER BY heure';
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
                    <div class="col-lg-6">
                      <?php
                        if ($jour == "30") {
                          $jour_apres_demain = "01";
                          if ($mois <= "08") {
                            $mois_apres = $mois+1;
                            $mois_apres = '0'.$mois_apres;
                          } else {
                            $mois_apres = $mois=1;
                          }
                          if ($mois == "12") {
                            $annee_apres = $annee+1;
                          } else {
                            $annee_apres = $annee;
                          }
                        } elseif ($jour == "31") {
                          $jour_apres_demain = "02";
                          if ($mois <= "08") {
                            $mois_apres = $mois+1;
                            $mois_apres = '0'.$mois_apres;
                          } else {
                            $mois_apres = $mois=1;
                          }
                          if ($mois == "12") {
                            $annee_apres = $annee+1;
                          } else {
                            $annee_apres = $annee;
                          }
                        } else {
                          if ($jour <= "08") {
                            $jour_apres_demain = $jour+2;
                            $jour_apres_demain = '0'.$jour_apres_demain;
                            $mois_apres = $mois;
                            $annee_apres = $annee;
                          } else {
                            $jour_apres_demain = $jour+2;
                            $mois_apres = $mois;
                            $annee_apres = $annee;
                          }
                        }
                      ?>
                      <p>Après-demain le <?php echo $jour_apres_demain; ?> / <?php echo $mois_apres; ?> / <?php echo $annee_apres; ?></p>
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
                            $sql = 'SELECT heure, emission, heure_fin FROM programme WHERE jour="'.$jour_apres_demain.'" AND mois="'.$mois_apres.'" AND annee="'.$annee_apres.'" ORDER BY heure';
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