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
$creneau2 = $creneau+1;
echo $date.$creneau.$idpersonnel.$idclient;
$sql="";
$sql1="";
if ($db_found) {
    $sql="UPDATE `calendrier` SET `statuscreneau` = '1' WHERE `calendrier`.`idpersonnel` = '$idpersonnel' AND `calendrier`.`date` = '$date' AND `calendrier`.`creneau` = '$creneau';";
    $sql1="INSERT INTO `rendezvous` (`idclient`, `idpersonnel`, `date`, `creneau`) VALUES ('$idclient', '$idpersonnel', '$date', '$creneau'); ";
    $sql2 = "SELECT personnel.nom, personnel.prenom,personnel.specialite,personnel.salle,personnel.telephone,personnel.emailpersonnel FROM personnel WHERE idpersonnel = ".$idpersonnel.";";
    $result = mysqli_query($db_handle, $sql);
    $result1 = mysqli_query($db_handle, $sql1);
    $result2 = mysqli_query($db_handle, $sql2);
    if (mysqli_num_rows($result2)==0) {
        echo "erreur requete";
    } else {
        while ($data = mysqli_fetch_assoc($result2)) {
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $specialite=$data['specialite'];
            $salle=$data['salle'];
            $telephone=$data['telephone'];
            $email=$data['emailpersonnel'];
        }
        $to = 'enzogallos91@gmail.com';
        $subject = 'Rendez-vous avec le médecin '.$specialite.' : '.$prenom.' '.$nom.' le '.$date;
        $message = 'Informations sur le rendez-vous : <br>
        Date : '.$date.'<br>
        Créneau : '.$creneau.'h-'.$creneau2.'h<br>
        Salle : '.$salle.'<br>
        Médecin '.$specialite.' : '.$prenom.' '.$nom.'<br>
        Téléphone : '.$telephone.'<br>
        Email : '.$email.'<br>';
        $headers = 'From: steamallguys@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
        if (mail($to, $subject, $message, $headers)) {
            header('location: rendezvous.php');
        } else {
            echo 'Email sending failed';
        }
    }
    mysqli_close($db_handle);
}
