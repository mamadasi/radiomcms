<?php
// Démarrage des sessions
session_start();

// Chargement des fichiers de configurations
include('info.php');
include('db.php');

// Recherche de l'heure
setlocale(LC_TIME, 'fra_fra');
$date = strftime('%A %d %B %Y, %H:%M');
$date2 = strftime('%m/%Y');
$mois = strftime('%m');
$annee = strftime('%Y');
$jour = strftime('%d');

// Recherche des informations de l'auditeur
if (isset($_SESSION['pseudo'])) {
    $sql = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
    $data = mysql_fetch_array($req);
    mysql_free_result ($req);
    $email = $data['email'];
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $ddn = $data['date_de_naissance'];
    $la = $data['lien_avatar'];
    $description = $data['description'];
    $statu = $data['statu'];
    $rank = $data['rank'];
    $derniere_ip = $data['derniere_ip'];
}

// Vérification du visiteur
if (!isset($_SESSION['pseudo'])) {
    if (!isset($_SESSION['connexion_auto'])) {
        $sql = 'SELECT count(*) FROM users WHERE derniere_ip="'.$_SERVER["REMOTE_ADDR"].'"';
        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
        $data = mysql_fetch_array($req);
        mysql_free_result($req);
        if ($data[0] == 1) {
            $sql = 'SELECT * FROM users WHERE derniere_ip="'.$_SERVER["REMOTE_ADDR"].'"';
            $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
            $data = mysql_fetch_array($req);
            mysql_free_result ($req);
            $pseudo_verif = $data['pseudo'];
            $avatar_verif = $data['lien_avatar'];
        }
    }
}

// Actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "inscription") {
        // Vérification des mots de passe
        if (isset($_POST['mdp']) && isset($_POST['cmdp'])) {
            if ($_POST['mdp'] == $_POST['cmdp']) {
                $pseudo = $_POST['pseudo'];
                $email = $_POST['email'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $jour = $_POST['jour'];
                $mois = $_POST['mois'];
                $annee = $_POST['annee'];
                $mdp = $_POST['mdp'];
                $ddn = $jour . " " . $mois . " ". $annee;
                $sql = 'SELECT count(*) FROM users WHERE pseudo="'.mysql_escape_string($pseudo).'"';
		      $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		      $data = mysql_fetch_array($req);
                if ($data[0] == 0) {
                    $sql = 'INSERT INTO users VALUES ("", "'.mysql_escape_string($pseudo).'", "'.mysql_escape_string(md5($mdp)).'", "'.$email.'", "'.$nom.'", "'.$prenom.'", "'.$ddn.'", "'.$lad.'", "", "Nouveau", "1", "'.$_SERVER["REMOTE_ADDR"].'", "")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $sql = 'INSERT INTO logs VALUES ("", "Inscription", "'.$date.'", "'.$pseudo.' s est inscrit")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $_SESSION['action'] = "inscription";
                    header('Location: ./');
                    exit();
                } else {
                    $_SESSION['inscription_erreur'] = "ce";
                    header('Location: ?p=inscription.php');
                    exit();
                }
            }
        }
    }
    if ($action == "connexion") {
       if (isset($pseudo_verif) && isset($avatar_verif)) {
           $pseudo = $pseudo_verif;
       } else {
           $pseudo = $_POST['pseudo'];
       }
	  $sql = 'SELECT count(*) FROM users WHERE pseudo="'.mysql_escape_string($pseudo).'" AND mdp="'.mysql_escape_string(md5($_POST['mdp'])).'"';
	  $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	  $data = mysql_fetch_array($req);
       mysql_free_result($req);
	  if ($data[0] == 1) {
           $sql ='UPDATE users SET derniere_ip="'.$_SERVER["REMOTE_ADDR"].'" WHERE pseudo="'.$pseudo.'"';
           mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
           $sql = 'INSERT INTO logs VALUES ("", "Connexion", "'.$date.'", "'.$pseudo.' s est connecté")';
           mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		 $_SESSION['pseudo'] = $pseudo;
           $_SESSION['action'] = "connexion";
           header('Location: ?p='.$_SESSION['page'].'');
           exit();
	  } elseif ($data[0] == 0) {
            $_SESSION['connexion'] = "compte_non_reconnu";
            header('Location: ?p='.$_SESSION['page'].'');
            exit();
       }
    }
    if ($_GET['action'] == "deconnexion") {
        if (isset($_SESSION['pseudo'])) {
            $sql = 'INSERT INTO logs VALUES ("", "Deconnexion", "'.$date.'", "'.$_SESSION['pseudo'].' s est déconnecté")';
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
            session_unset();
            session_destroy();
            $_SESSION['action'] = "deconnexion";
            header('Location: ./');
            exit();
        }
    }
    if ($_GET['action'] == "dedicace") {
        if (isset($_SESSION['pseudo'])) {
            $sql = 'INSERT INTO dedicaces VALUES ("", "'.$_SESSION['pseudo'].'", "'.$_POST['dedicace'].'")';
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
            $sql = 'INSERT INTO logs VALUES ("", "Dedicace", "'.$date.'", "'.$_SESSION['pseudo'].' a publié une dédicace")';
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
            $_SESSION['action'] = "dedicace";
            header('Location: ./');
            exit();
        }
    }
    if ($_GET['action'] == "commentaire") {
        if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['id_new']) && isset($_POST['commentaire'])) {
                $sql = 'INSERT INTO commentaires VALUES ("", "'.$_GET['id_new'].'", "'.$_SESSION['pseudo'].'", "'.$la.'", "'.$_POST['commentaire'].'")';
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                $sql = 'INSERT INTO logs VALUES ("", "Commentaire", "'.$date.'", "'.$_SESSION['pseudo'].' a commenté la new '.$_GET['id_new'].'")';
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                $_SESSION['action'] = "commentaire";
                header('Location: ?p=news&id='.$_GET['id_new'].'');
                exit();
            }
        } else {
            $_SESSION['news'] = "deconnecter";
            header('Location: ?p=news');
            exit();
        }
    }
    if ($_GET['action'] == "like") {
        if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['titre']) && isset($_GET['artiste'])) {
                $sql = 'SELECT count(*) FROM top10_vote WHERE auteur="'.$_SESSION['pseudo'].'"';
	           $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	           $data = mysql_fetch_array($req);
                mysql_free_result($req);
	           if ($data[0] == 0) {
                    $sql = 'INSERT INTO top10_vote VALUES ("", "'.$_SESSION['pseudo'].'", "'.$_GET['titre'].'", "'.$_GET['artiste'].'")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $sql = 'INSERT INTO logs VALUES ("", "Vote", "'.$date.'", "'.$_SESSION['pseudo'].' a aimé le titre '.$_GET['titre'].' de '.$_GET['artiste'].'")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $_SESSION['action'] = "vote";
                    header('Location: ?p='.$_SESSION['page'].'');
                    exit();
                } elseif ($data[0] == 1) {
                    $_SESSION['vote'] = "deja_vote";
                    header('Location: ?p='.$_SESSION['page'].'');
                    exit();
                }
            }
        } else {
            $_SESSION['vote'] = "deconnecter";
            header('Location: ?p='.$_SESSION['page'].'');
            exit();
        }
    }
    if ($_GET['action'] == "no_like") {
        if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['titre']) && isset($_GET['artiste'])) {
                $sql = 'SELECT count(*) FROM top10_vote_2 WHERE auteur="'.$_SESSION['pseudo'].'"';
	           $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	           $data = mysql_fetch_array($req);
                mysql_free_result($req);
	           if ($data[0] == 0) {
                    $sql = 'INSERT INTO top10_vote_2 VALUES ("", "'.$_SESSION['pseudo'].'", "'.$_GET['titre'].'", "'.$_GET['artiste'].'")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $sql = 'INSERT INTO logs VALUES ("", "Vote", "'.$date.'", "'.$_SESSION['pseudo'].' a aimé le titre '.$_GET['titre'].' de '.$_GET['artiste'].'")';
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    $_SESSION['action'] = "vote";
                    header('Location: ?p='.$_SESSION['page'].'');
                    exit();
                } elseif ($data[0] == 1) {
                    $_SESSION['vote'] = "deja_vote";
                    header('Location: ?p='.$_SESSION['page'].'');
                    exit();
                }
            }
        } else {
            $_SESSION['vote'] = "deconnecter";
            header('Location: ?p='.$_SESSION['page'].'');
            exit();
        }
    }
    if ($_GET['action'] == "ignorer_connexion_auto") {
        if (!isset($_SESSION['pseudo'])) {
            $_SESSION['connexion_auto'] = "ignorer";
            header('Location: ?p='.$_SESSION['page'].'');
            exit();
        }
    }
}
?>