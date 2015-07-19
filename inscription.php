<?php
// Informations sur la page
$np = "Inscription";
$_SESSION['page'] = "inscription";

// Redirections
if (isset($_SESSION['pseudo'])) {
    header('Location: ./');
    exit();
}
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
<?php include('template/alert.php');
?>
       <?php include('template/header.php'); ?>
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="?action=inscription" method="post" class="form-horizontal">
              <fieldset>
                <legend><?php echo "Inscription à $nr"; ?></legend>
                <div class="form-group" id="form_email">
                   <label for="email" class="col-lg-2 control-label">Email</label>
                   <div class="col-lg-10">
                     <input type="text" class="form-control" id="email" name="email" placeholder="Ton adresse email ..." maxlength="100" required>
                   </div>
                 </div>
                <div class="form-group" id="form_pseudo">
                   <label for="pseudo" class="col-lg-2 control-label">Pseudo</label>
                   <div class="col-lg-10">
                     <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Ton pseudo ..." maxlength="25" required>
                   </div>
                 </div>
                <div class="form-group" id="form_nom">
                   <label for="nom" class="col-lg-2 control-label">Nom</label>
                   <div class="col-lg-10">
                     <input type="text" class="form-control" id="nom" name="nom" placeholder="Ton nom ..." maxlength="25" required>
                   </div>
                 </div>
                <div class="form-group" id="form_prenom">
                   <label for="prenom" class="col-lg-2 control-label">Prénom</label>
                   <div class="col-lg-10">
                     <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Ton prénom ..." maxlength="25" required>
                   </div>
                 </div>
                <div class="form-group" id="form_mdp">
                   <label for="mdp" class="col-lg-2 control-label">Mot de passe</label>
                   <div class="col-lg-10">
                     <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Ton mot de passe ..." maxlength="25" required>
                   </div>
                 </div>
                <div class="form-group" id="form_cmdp">
                   <label for="cmdp" class="col-lg-2 control-label">Confirmation mot de passe</label>
                   <div class="col-lg-10">
                     <input type="password" class="form-control" id="cmdp" name="cmdp" placeholder="Ton mot de passe ..." maxlength="25" required>
                   </div>
                 </div>
<div class="form-group">
<label for="select" class="col-lg-2 control-label">Date de naissance</label>
<div class="col-lg-3">
<select class="form-control" id="jour" name="jour" required>
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
</select>
</div>
<div class="col-lg-3">
<select class="form-control" id="mois" name="mois" required>
<option value="janvier">Janvier</option><option value="fevrier">Février</option><option value="mars">Mars</option><option value="avril">Avril</option><option value="mai">Mai</option><option value="juin">Juin</option><option value="juillet">Juillet</option><option value="aout">Aout</option><option value="septembre">Septembre</option><option value="octobre">Octobre</option><option value="novembre">Novembre</option><option value="decembre">Décembre</option>
</select>
</div>
<div class="col-lg-4">
<select class="form-control" id="annee" name="annee" required>
<option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option>
</select>
</div>
</div>
                <div class="form-group">
                   <label for="btn" class="col-lg-2 control-label"></label>
                   <div class="col-lg-10">
                     <button id="btn" class="btn btn-success" type="submit">Go !</button>

                   </div>

                 </div>
               </fieldset>
             </form>
</div></div>
<?php include('template/footer.php'); ?>
</div></div></div>
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