<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
  $_SESSION['page'] = "recherche";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Omnes Santé Recherche</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css\styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
    <br><br><br>
    <!--header a supprimer pour mettre en forme la page-->
    <div style="text-align: center;">
    <form action="recherche.php" method="post">
      <input type="text" name="recherche" placeholder="Recherche">
    <select class="form-select btn btn-light" aria-label="Default select example" name="choix" required>
      <option selected>Nom ou Spécialité ou Etablissement</option>
      <option name="NSE" value="nom">Nom</option>
      <option name="NSE" value="specialite">Spécialité</option>
      <option name="NSE" value="etablisement">Etablissement</option>
    </select>
    <input type="submit" name="Rechercher" value="Rechercher" class="btn btn-primary" /></form></div>
    <?php
    if (!empty($_POST['Rechercher'])) {
        if (!empty($_POST['recherche']) && ($_POST['choix']!="Nom ou Spécialité ou Etablissement")) {
            $r = $_POST['recherche'];
            //identifier votre BDD
            $database = "omnessante";
            //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            $sql = "";
            //Si la BDD existe
            if ($db_found) {
                if ($_POST['choix']=="nom") {
                    $sql = "SELECT * FROM personnel WHERE nom LIKE '%$r%'";
                } elseif ($_POST['choix']=="specialite") {
                    $sql = "SELECT * FROM personnel WHERE specialite LIKE '%$r%'";
                } elseif ($_POST['choix']=="etablisement") {
                    $sql = 'SELECT * FROM `personnel` WHERE `emailpersonnel` LIKE "serv%";  ';
                }
                $result = mysqli_query($db_handle, $sql);
                $nbr = mysqli_num_rows($result);
                if ($nbr==0) {
                    echo "Aucun résultat";
                } else {
                    while ($data = mysqli_fetch_assoc($result)) {
                        $id=$data['idpersonnel'];
                        $nom=$data['nom'];
                        $prenom=$data['prenom'];
                        $specialite=$data['specialite'];
                        echo '<form action="cartedocteur.php" method="post"><div style="text-align: center;margin: 15px;"><button type="submit" name="id" value="'.$id.'" class="btn btn-outline-primary">'.$specialite.' : '.$nom.' '.$prenom.'</button></div></form>';
                    }
                }
            } else {
                echo "Database not found";
            }
            mysqli_close($db_handle);
        }
    }
    ?>
    <!--footer retirer le fixed bottom si besoin-->
    <footer class="page-footer fixed-bottom">
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
