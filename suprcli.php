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
    $email = isset($_POST["email"])? $_POST["email"] : "";
    
    $sql = "";
    $sql1 = "";

    if ($db_found) {
        $sql = "SELECT `idclient` FROM `client` WHERE `emailclient`='$email';";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $idclient = $data['idclient'];
        $sql1 = "SELECT `idpersonnel`,`date`,`creneau` FROM `rendezvous` WHERE `idclient`='$idclient'";
        $result1 = mysqli_query($db_handle, $sql1);
        if (mysqli_num_rows($result)==0) {

            //header('Location: connexion.php?erreur=4');
        } else {
            while ($data1 = mysqli_fetch_assoc($result1)) {
                $idpersonnel = $data1['idpersonnel'];
                $date = $data1['date'];
                $creneau = $data1['creneau'];
                $sql2 = "UPDATE `calendrier` SET `statuscreneau` = '0' WHERE `calendrier`.`idpersonnel` = '$idpersonnel' AND `calendrier`.`date` = '$date' AND `calendrier`.`creneau` = '$creneau';";
                $result2 = mysqli_query($db_handle, $sql2);
                $sql3 = "DELETE FROM `rendezvous` WHERE `idpersonnel`='$idpersonnel'";
                $result3 = mysqli_query($db_handle, $sql3);
                if ($result2 && $result3) {
                    echo "Suppression réussie";
                } else {
                    echo "Suppression échouée". mysqli_error($db_handle);
                }
            }
            $sql4 = "DELETE FROM `utilisateurs` WHERE `email`='$email';";
            $sql5 = "DELETE FROM `client` WHERE `emailclient`='$email';";
            $result4 = mysqli_query($db_handle, $sql4);
            $result5 = mysqli_query($db_handle, $sql5);
            if ($result4 && $result5) {
                echo "Suppression réussie";
            } else {
                echo "Suppression échouée". mysqli_error($db_handle);
            }
            header('location: ajoutsupressionadmin.php');
        }
    }
