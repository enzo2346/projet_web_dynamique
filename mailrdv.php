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
$idpersonnel = isset($_POST["idpersonnel"])? $_POST["idpersonnel"] : "";
$idclient = $_SESSION["idclient"];
echo $date.$creneau.$idpersonnel.$idclient;
$sql="";
$sql1="";
if ($db_found) {
    $sql="UPDATE `calendrier` SET `statuscreneau` = '1' WHERE `calendrier`.`idpersonnel` = '$idpersonnel' AND `calendrier`.`date` = '$date' AND `calendrier`.`creneau` = '$creneau';";
    $sql1="INSERT INTO `rendezvous` (`idclient`, `idpersonnel`, `date`, `creneau`) VALUES ('$idclient', '$idpersonnel', '$date', '$creneau'); ";
    $result = mysqli_query($db_handle, $sql);
    $result1 = mysqli_query($db_handle, $sql1);
    header('location: rendezvous.php');
}
mysqli_close($db_handle);
