<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$id = isset($_POST["id"])? $_POST["id"] : "";
 
//Si la BDD existe
if ($db_found) {
    $sql = "SELECT personnel.nom, personnel.prenom,personnel.specialite,personnel.salle,personnel.telephone,personnel.emailpersonnel,profil.photo FROM personnel,profil WHERE idpersonnel = ".$id." AND personnel.idprofil = profil.idprofil; ";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "erreur requete";
    } else {
        echo '<div class="container">';
        while ($data = mysqli_fetch_assoc($result)) {
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $specialite=$data['specialite'];
            $salle=$data['salle'];
            $telephone=$data['telephone'];
            $email=$data['emailpersonnel'];
            $photo=$data['photo'];
        }
        echo "<h1>Dr.$nom $prenom<span><i>  Medecin $specialite</i> </span></h1>";
        echo "<div class= col-lg-12><img src=$photo alt='image' height='200' width='200'></div>";
        echo "<div class= col-lg-12>
  <label for='inputEmail4' class='form-label'>Telephone:</label>
  <label for='inputEmail4' class='form-label'> $telephone</label></div>

<div class= col-lg-12>
  <label for='inputEmail4' class='form-label'>Email:</label>
  <label for='inputEmail4' class='form-label'>$email</label></div>
 

<div class= col-lg-12>
  <label for='inputEmail4' class='form-label'>Salle:</label>
  <label for='inputEmail4' class='form-label'>$salle</label>
  </div>";
    }
} else {
    echo "erreur bdd pas trouvee";
}
mysqli_close($db_handle);
echo '<form action="toutparcourir.php" method="post"><div class= col-lg-12><button type="submit" name="your_name" value="your_value" class="btn btn-primary">Retour</button></div></form><br>';
echo '<form action="prendrerdv.php" method="post"><div class= col-lg-12><button type="submit" name="id" value="'.$id.'" class="btn btn-primary">Prendre un rendez-vous</button></div></form><br>';
echo '<form action="communcation.php" method="post"><div class= col-lg-12><button type="submit" name="your_name" value="your_value" class="btn btn-primary">Communiquer avec le médecin</button></div></form><br>';
echo '<form action="cv.php" method="post"><div class= col-lg-12><button type="submit" name="your_name" value="your_value" class="btn btn-primary">Voir son cv</button></div></form></div></br></br>';
?>

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
