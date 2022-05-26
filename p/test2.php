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
    <style type="text/css">
        .jour/* Les cellules d'en-tête */
        {
            border: 1px solid #9ec2f8;
            background-color: #9ec2f8;
            border-radius: 0;
            color: #fff;
            text-align: center;
        }
        </style>
</head>
<?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//$id = isset($_POST["idpersonnel"])? $_POST["idpersonnel"] : "";
$id=1;
$date = date("Y-m-d");
$max = -1*(date('w')-7)-1;
$bool = 0;
$date2 = date("Y-m-d", strtotime('+6 days'));
$sql = "";
//Si la BDD existe

$jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$x=date('w')-1;
if ($db_found) {
    $sql = "SELECT `date`, `creneau`, `statuscreneau` FROM `calendrier` WHERE `idpersonnel`=$id AND `date` BETWEEN '$date' AND '$date2'; ";
    if (mysqli_query($db_handle, $sql)) {
        //echo "requete fonctionnelle.<br>";
    } else {
        //echo "Requete non fonctionnelle.<br>";
        //header('Location: connexion.php?erreur=2');
    }
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        //header('Location: connexion.php?erreur=1');
    } else {
        echo "<table><tr><td class='jour'>".$jour[$x]."</td>";
        while ($data = mysqli_fetch_assoc($result)) {
            $datebdd=$data['date'];
            $creneau=$data['creneau'];
            $status=$data['statuscreneau'];
            if ($status == -1 && $creneau > 7 && $creneau < 18) {
                echo '<td><a type="button" class="btn btn-secondary">'.$creneau."</a></td>";
            }
            if ($status == 0) {
                echo '<td><a type="button" class="btn-outline-primary mb-2 btn btn-light mb-2" href="#">'.$creneau."</a></td>";
            }
            if ($status > 0) {
                echo '<td><a type="button" class="btn btn-primary">'.$creneau."</a></td>";
            }
            if ($creneau == 23 && $x < 6) {
                if ($bool == 0 || $x < $max) {
                    $x++;
                    echo "</tr><tr><td class='jour'>".$jour[$x]."</td>";
                }
                if ($x == 6) {
                    $x = -1;
                    $bool = 1;
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
