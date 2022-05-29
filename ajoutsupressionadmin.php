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
    <br><br><br><br>
    <div class="container">
  <h1>Ajouter personnel</h1>
  <form action="addpers.php" method="post">
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label"
      >Adresse mail :</label
    >
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="mdp" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Nom :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="prenom" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Spécialité :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="specialite" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Téléphone :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="telephone" required/>
  </div> 
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Salle :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="salle" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Teams :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="teams" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">CV :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="cv" required/>
  </div>
  <br />
  <div class="col-lg-12">
    <label for="formFile" class="form-label">Photo :</label>
    <input class="form-control" type="text" id="formFile" name="photo" required/>
  </div><br>
  <button type="submit" class="btn btn-primary" name="Valider">Ajouter</button>
  </form>
</div>
<br><br>
<div class="container">
  <h1>Modifier personnel</h1>
  <form action="modifpers.php" method="post">
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label"
      >Adresse mail :</label
    >
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="mdp"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Nom :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nom"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="prenom"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Spécialité :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="specialite"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Téléphone :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="telephone"/>
  </div> 
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Salle :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="salle"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">Teams :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="teams"/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">CV :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="cv" />
  </div>
  <br />
  <div class="col-lg-12">
    <label for="formFile" class="form-label">Photo :</label>
    <input class="form-control" type="text" id="formFile" name="photo"/>
  </div><br>
  <button type="submit" class="btn btn-primary" name="Valider">Modifier</button>
  </form></div>
<br><br>
<div class="container">
<form action="suprpers.php" method="post">
  <h1>Supprimer Personnel</h1>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label"
      >Adresse mail :</label
    >
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required/>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="Valider">Supprimer</button>
</div></form>
<br><br>
<div class="container">
<form action="suprcli.php" method="post">
  <h1>Supprimer Client</h1>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label"
      >Adresse mail :</label
    >
    <br>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required/>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="Valider">Supprimer</button>
</div></form>
<br><br><br><br>
<div class="container">
  <h1>bloquer créneau</h1>
  <form action="creneaupers.php" method="post">
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label"
      >id :</label
    >
    <input type="text" class="form-control" id="exampleFormControlInput1" name="id" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">date :</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" name="date" required/>
  </div>
  <div class="col-lg-12">
    <label for="exampleFormControlInput1" class="form-label">creneau :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="creneau" required/>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="Valider">ajouter</button>
  </form></div>
<br><br><br><br>
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
