<?php
  session_start();
  if ($_SESSION['email'] == "") {
      header('Location: connexion.php?erreur=6');
  }
  ?>
  <?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$date = isset($_POST["date"])? $_POST["date"] : "";
$creneau = isset($_POST["creneau"])? $_POST["creneau"] : "";
$idpersonnel = isset($_POST["id"])? $_POST["id"] : "";
echo $date.$creneau.$idpersonnel;
$sql="";
$sql1="";

if ($db_found) {
    $sql="UPDATE `calendrier` SET `statuscreneau` = '-1' WHERE `calendrier`.`idpersonnel` = '$idpersonnel' AND `calendrier`.`date` = '$date' AND `calendrier`.`creneau` = '$creneau';";
    $result = mysqli_query($db_handle, $sql);
    if ($result) {
        echo "Modification réussie";
    } else {
        echo "Modification échouée". mysqli_error($db_handle);
    }
    header('location: ajoutsupressionadmin.php');
    mysqli_close($db_handle);
}
