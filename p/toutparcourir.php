<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Omnes Santé Tout Parcourir</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css\styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script type="text/javascript">
      $(document).ready(function () {
        $(".header").height($(window).height());
      });
    </script>
  </head>
  <body>
    <!--menu-->
    <nav class="navbar navbar-expand-md fixed-top">
      <a class="navbar-brand" href="#haut"
        ><img src="images/logo.jpg" alt="Logo"
      /></a>
      <button
        class="navbar-toggler navbar-dark"
        type="button"
        data.toggle="collapse"
        data-target="#main-navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Acceuil.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="toutparcourir.php">Tout Parcourir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recherche.php">Recherche</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rendezvous.php">Rendez-Vous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="votrecompte.php">Mon Compte</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a
              type="button"
              class="btn-outline-light mb-2 btn btn-light mb-2"
              href="deconnexion.php"
            >
              Déconnexion
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!--header a supprimer pour mettre en forme la page-->
    <body>
    <br><br><br><br>
        <div class="container">
            <div class="navbar">
                <!--La classe bg-info ajoute un fond bleu à l'élément-->
                <div class="col dropdown">
                  <button class="dropbtn">Médecine générale</button>
                  <div class="dropdown-content">
                  <?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql = "";
//Si la BDD existe
if ($db_found) {
    $sql = 'SELECT * FROM `personnel` WHERE `specialite`="generaliste"; ';

    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "pas de médecins trouvés";
    } else {
        while ($data = mysqli_fetch_assoc($result)) {
            $id=$data['idpersonnel'];
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            echo '<a href="#">'.$nom.' '.$prenom.'</a>';
        }
    }
}
mysqli_close($db_handle);
?>
                  </div>
                </div> 
                <!--La classe bg-warning ajoute un fond jaune à l'élément-->
                <div class="col dropdown">
                  <button class="dropbtn">Médecins spécialistes</button>
                  <div class="dropdown-content">
                  <?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql = "";
//Si la BDD existe
if ($db_found) {
    $sql = 'SELECT * FROM `personnel` WHERE `emailpersonnel` LIKE "med%" AND `specialite` NOT LIKE "gener%";  ';

    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "pas de médecins trouvés";
    } else {
        while ($data = mysqli_fetch_assoc($result)) {
            $id=$data['idpersonnel'];
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $specialite=$data['specialite'];
            echo '<a href="#">'.$specialite.' : '.$nom.' '.$prenom.'</a>';
        }
    }
}
mysqli_close($db_handle);
?>
                  </div>
                </div> 
                <!--La classe bg-success ajoute un fond vert à l'élément-->
                <div class="col dropdown">
                  <button class="dropbtn">Laboratoire de biologie médicale</button>
                  <div class="dropdown-content">
                  <?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$sql = "";
//Si la BDD existe
if ($db_found) {
    $sql = 'SELECT * FROM `personnel` WHERE `emailpersonnel` LIKE "serv%";  ';

    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "pas de médecins trouvés";
    } else {
        while ($data = mysqli_fetch_assoc($result)) {
            $id=$data['idpersonnel'];
            $specialite=$data['specialite'];
            echo '<a href="#">'.$specialite.'</a>';
        }
    }
}
mysqli_close($db_handle);
?>
                  </div>
                </div> 
            </div>
        </div>
        <?php
        for ($x = 0; $x < 50; $x++) {
            echo '</br>';
        }
        ?>
    </body>
    <!--footer-->
    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 ml-auto">
            <!--lien vers googlemap-->
            <iframe
              id="inlineFrameExample"
              title="Inline Frame Example"
              width="300"
              height="200"
              src="https://maps.google.com/maps?q=48.85181, 2.28724&z=15&output=embed"
              width="360"
              height="270"
              frameborder="0"
              style="border: 0"
            >
            </iframe>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 footer-copyright text-center">
            &copy; 2020 Copyright | Droit d'auteur: webDynamique.ece.fr
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h6 class="text-uppercase font-weight.bold">Contact</h6>
            <p>
              37, quai de Grenelle, 75015 Paris, France <br />
              info@webDynamique.ece.fr <br />
              +33 01 02 03 04 05 <br />
              +33 01 03 02 05 04
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
