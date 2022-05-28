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
$idclient = isset($_POST["idclient"])? $_POST["idclient"] : "";

$sql="";
$sql1="";
if ($db_found) {
    $sql="UPDATE `calendrier` SET `statuscreneau` = '0' WHERE `calendrier`.`idpersonnel` = '$idpersonnel' AND `calendrier`.`date` = '$date' AND `calendrier`.`creneau` = '$creneau';";
    $sql1="DELETE FROM `rendezvous` WHERE rendezvous.date='$date' AND rendezvous.creneau='$creneau' AND rendezvous.idclient='$idclient';";
    $result = mysqli_query($db_handle, $sql);
    $result1 = mysqli_query($db_handle, $sql1);
    header('location: rendezvous.php');
}
mysqli_close($db_handle);
?>