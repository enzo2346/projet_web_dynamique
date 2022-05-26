<?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//$id = isset($_POST["idpersonnel"])? $_POST["idpersonnel"] : "";
$id=1;
$date = date("Y-m-d");
$date2 = date("Y-m-d", strtotime('+1 days'));
$sql = "";
//Si la BDD existe

if ($db_found) {
    $sql = "SELECT `date`, `creneau`, `statuscreneau` FROM `calendrier` WHERE `idpersonnel`=$id AND `date` BETWEEN '$date' AND '$date2'; ";
    if (mysqli_query($db_handle, $sql)) {
        echo "requete fonctionnelle.<br>";
    } else {
        echo "Requete non fonctionnelle.<br>";
        //header('Location: connexion.php?erreur=2');
    }
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        //header('Location: connexion.php?erreur=1');
    } else {
        echo '<tr>';
        while ($data = mysqli_fetch_assoc($result)) {
            $datebdd=$data['date'];
            $creaneau=$data['creneau'];
            $status=$data['statuscreneau'];
            if ($datebdd == $date) {
                echo "</tr>test<tr>";
                $date=$date2;
                $date2 = date("Y-m-d", strtotime('+1 days'));
            }
            echo $date.'...'.$date2.'<br>';
            /*echo "<td>";
            echo $datebdd.$creaneau;
            echo "</td>";*/
        }
        //header('Location: index.php');
    }
} else {
    header('Location: connexion.php?erreur=3');
}
mysqli_close($db_handle);
