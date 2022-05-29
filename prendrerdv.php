<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
?>
<html>
<head>
    <title>Prise de rendez vous</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css\styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        /*$('.show').click(function() {
               $('.menu').toggle("slide");
        });*/
      
      $(".hide").click(function(){
        $(".menu").hide();
      });
    
      //Dès qu'on clique sur #b1, on applique show() au titre
      $(".show").click(function(){
        $(".menu").show();
      });
    });
    </script>
    <style type="text/css">
        .jour/* Les cellules d'en-tête */
        {
            border: 1px solid #9ec2f8;
            background-color: #9ec2f8;
            border-radius: 0;
            color: #fff;
            text-align: center;
        }
        table{
          margin: 0px 50px 20px 200px;
        }
        .menu {
          margin:100px;
        }
        form{
 margin:0px; padding:0px; display:inline;
}
        </style>
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
<?php
echo "<br><br><br>";
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
        while ($data = mysqli_fetch_assoc($result)) {
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $specialite=$data['specialite'];
            echo '<div class="navbar"><div class="nav-item">'.$specialite.' : '.$nom.' '.$prenom.'</div></div> ';
        }
    }
} else {
    echo "erreur bdd pas trouvee";
}
        mysqli_close($db_handle);
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$id = isset($_POST["id"])? $_POST["id"] : "";
$sql = "";
$date = date("Y-m-d");
$date2 = date("Y-m-d", strtotime('+6 days'));
$yday = getdate();
$nbjour = $yday['yday'];
$max = $yday['yday']+6;

//Si la BDD existe

$jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$temp = date('w')-1;
if ($temp<0) {
    $temp = 6;
}

if ($db_found) {
    $sql = "SELECT `date`, `creneau`, `statuscreneau` FROM `calendrier` WHERE `idpersonnel`='$id' AND `date` BETWEEN '$date' AND '$date2'; ";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        echo "pas de calendrier trouvé";
    } else {
        echo "<table><tr><td class='jour'>".$jour[$temp]."</td>";
        while ($data = mysqli_fetch_assoc($result)) {
            $datebdd=$data['date'];
            $creneau=$data['creneau'];
            $status=$data['statuscreneau'];
            if ($status == -1 && $creneau > 7 && $creneau < 18) {
                echo '<td><a type="button" class="btn btn-secondary">'.$creneau.'h-'.($creneau+1)."h</a></td>";
            }
            if ($status == 0) {
                //echo '<td><a type="button" class="btn-outline-primary mb-2 btn btn-light mb-2 show">'.$creneau.'h-'.($creneau+1)."h</a></td>";
                echo '<td><form action="mailrdv.php" method="post"><input  style="display:none;" name="idpersonnel" value='.$id.'><input  style="display:none;"  name="creneau" value='.$creneau.'><input  style="display:none;" name="date" value='.$datebdd.'><button type="submit" class="btn-outline-primary mb-2 btn btn-light mb-2 show" name="Valider">'.$creneau.'h-'.($creneau+1)."h</button></form></td>";
            }
            if ($status > 0) {
                echo '<td><a type="button" class="btn btn-primary">'.$creneau.'h-'.($creneau+1)."h</a></td>";
            }
            if ($creneau == 23) {
                $nbjour++;
                if ($nbjour <= $max) {
                    if ($temp == 6) {
                        $temp = 0;
                    } else {
                        $temp ++;
                    }
                    echo "</tr><tr><td class='jour'>".$jour[$temp]."</td>";
                }
            }
        }
        echo "</table";
        //header('Location: index.php');
    }
} else {
    header('Location: connexion.php?erreur=3');
}
mysqli_close($db_handle);
/*echo '<div class="show"></div>
<form action="mailrdv.php" method="post"><div class="menu float-right" style="display: none;"><label>Confirmez vous votre rendez-vous : </label><br><button class="btn btn-secondary hide">Annuler</button><button type="submit" class="btn btn-secondary" name="Valider">Valider</button></div></form>
';*/
?>

</body>
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
