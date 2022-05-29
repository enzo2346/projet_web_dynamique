<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Omnes Santé Accueil</title>
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
      <a class="navbar-brand" href="#haut"><img src="images/logo.jpg" alt="Logo"></a>
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
            <a class="nav-link" href="Acceuiladmin.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajoutsupressionadmin.php">Ajout Supression Modification Utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gestioncvadmin.php">Gestion CV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="votrecompteadmin.php">Mon Compte</a>
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
    <form name="savefile" method="post" action="">
        Nom du fichier: <input type="text" name="filename" value=""><br/>
        <textarea rows="16" cols="100" name="textdata"></textarea><br/>
        <input type="submit" name="submitsave" value="Sauver le fichier">
</form>
    <?php
    if (isset($_POST)) {
        if (@$_POST['submitsave'] == "Sauver le fichier"  && !empty($_POST['filename'])) {
            if (!file_exists($_POST['filename'] . ".xml")) {
                $file = tmpfile();
            }
            $file = fopen($_POST['filename'] . ".xml", "a+");
            while (!feof($file)) {
                @$old = $old . fgets($file);//. "<br />";
            }
            $text = $_POST["textdata"];
            file_put_contents($_POST['filename'] . ".xml", $old . $text);
            fclose($file);
        }

        if (@$_POST['submitopen'] == "Submit File Request") {
            if (!file_exists($_POST['filename'] . ".xml")) {
                exit("Error: File does not exist.");
            }
            $file = fopen($_POST['filename'] . ".xml", "r");
            while (!feof($file)) {
                echo fgets($file);//. "<br />";
            }
            fclose($file);
        }
    }
    ?>
    <br><br><br>
    <h1>Modèle CV</h1>
      <textarea name="cv" rows="50" cols="100" value=<?php echo '<?xml version="1.0"?>
<?xml-stylesheet type="text/xsl" href="cv.xsl"?>
<!DOCTYPE cave SYSTEM "cv.dtd">
<cv>
	<identite>
		<nom>Mercure</nom>
		<prenom>Alain</prenom>
		<photo>images/icon1.jpg</photo>
	</identite>

	<mail>medecing1@gmail.com</mail>
	<telephone>06 11 11 11 01</telephone>
	<specialite>Généraliste</specialite>

	<experiences>
		<experience>
			<date>2018</date>
			<etablissement>Omnes Santé</etablissement>
		</experience>
		<experience>
			<date>2014</date>
			<etablissement>Hôpital Maritime de Zuydcoote</etablissement>
		</experience>
	</experiences>

	<formations>
		<formation>
			<date>2013</date>
			<diplome>Diplôme dEtat de Docteur en Médecine</diplome>
			<etablissement> UFR Médecine de Lille</etablissement>
		</formation>
		<formation>
			<date>2004</date>
			<diplome>Baccalauréat Scientifique</diplome>
			<etablissement>Lycée Carnot Lille</etablissement>
		</formation>
	</formations>

	<competences>
		<competence>Formateur</competence>
		<competence>A lécoute</competence>
	</competences>
</cv'?>></textarea><br>
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
