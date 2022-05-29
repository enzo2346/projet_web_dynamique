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
            <a class="nav-link" href="Acceuilpersonnel.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="chat.php" target= "_blank">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rendezvouspersonnel.php">Rendez-Vous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="votrecomptepersonnel.php">Mon Compte</a>
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
    <!--Titre plus description omnes santé-->
    <header class="page-header header container-fluid">
      <div class="overlay"></div>
      <div class="description">
        <h1>Omnes Santé : La plus grande communauté de medecin en ligne</h1>
        <p>
        Reserver votre consulation chez un professionnel de santé en ligne<br>
        Accédez rapidement aux disponibilités de tous vos professionnels de santé <br>
        Prenez des décisions éclairées et adaptées à vos besoins de santé <br>
        Gérez tout vos rendez-vous médicaux sur une même application 
        </p>
      </div>
    </header>
    <!--widget twitter-->
    <div class="twitter">
    <a class="twitter-timeline tw-align-center" data-width="1000" data-height="1000" href="https://twitter.com/BFMTV?ref_src=twsrc%5Etfw">Tweets by BFMTV</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <!--lien vers carrousel.html pour afficher le carrousel dans cette page-->
    <iframe
      id="serviceFrameSend"
      src="carrousel.html"
      width="1920"
      height="1000"
      frameborder="0"
    >
    </iframe>
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
