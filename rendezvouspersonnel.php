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
    <br /><br /><br /><br />
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Télephone</th>
      <th scope="col">Salle</th>
      <th scope="col">Date et heure</th>
      <th scope="col">Annulation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //identifier votre BDD
    $database = "omnessante";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $sql = "";
    $id = $_SESSION['idpersonnel'];
    //si la BDD existe
    if ($db_found) {
        $sql = "SELECT rendezvous.idclient,rendezvous.date,rendezvous.creneau,client.nom,client.prenom,client.telephone FROM rendezvous, client WHERE idpersonnel='$id' AND rendezvous.idclient = client.idclient;";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result)==0) {
            echo "Aucun rendez-vous";
        } else {
            while ($data = mysqli_fetch_assoc($result)) {
                $idclient=$data["idclient"];
                $nom=$data["nom"];
                $prenom=$data["prenom"];
                $telephone=$data["telephone"];
                $salle=$_SESSION['salle'];
                $date=$data["date"];
                $heure=$data["creneau"];
                $heure1=$heure+1;

                echo '
       <tr>
        <td>'.$nom.'</td>
        <td>'.$prenom.'</td>
        <td>'.$telephone.'</td>
        <td>'.$salle.'</td>
        <td>'.$date.'  '.$heure.'h-'.$heure1.'h</td>
        <td><form action="annulerdvpersonnel.php" method="post"><input type="hidden" name="idpersonnel" value='.$id.'><input type="hidden"  name="idclient" value='.$idclient.'><input type="hidden" name="date" value='.$date.'><input type="hidden" name="creneau" value='.$heure.'><button type="submit" class="btn btn-danger" data-mdb-ripple-color="dark" name="Valider">Annuler</button></form></td>
      </tr>';
            }
        }
    }
    mysqli_close($db_handle);
    ?>
    
  </tbody>
</table>
    <!--footer-->
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
