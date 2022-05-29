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
        $sql = "SELECT `idprofil` FROM `personnel` WHERE `emailpersonnel`='$email';";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $idprofil = $data['idprofil'];
        $sql1 = "SELECT `idpersonnel` FROM `personnel` WHERE `emailpersonnel`='$email';";
        $result1 = mysqli_query($db_handle, $sql1);
        $data1 = mysqli_fetch_assoc($result1);
        $idpersonnel = $data1['idpersonnel'];
        $sql2 = "DELETE FROM `utilisateurs` WHERE `email`='$email';";
        $result2 = mysqli_query($db_handle, $sql2);
        $sql3 = "DELETE FROM `personnel` WHERE `idpersonnel`='$idpersonnel';";
        $sql4 = "DELETE FROM `profil` WHERE `idprofil`='$idprofil';";
        $sql5 = "DELETE FROM `calendrier` WHERE `idpersonnel`='$idpersonnel';";
        $sql6 = "DELETE FROM `rendezvous` WHERE `idpersonnel`='$idpersonnel';";
        $result3 = mysqli_query($db_handle, $sql3);
        $result4 = mysqli_query($db_handle, $sql4);
        $result5 = mysqli_query($db_handle, $sql5);
        $result6 = mysqli_query($db_handle, $sql6);
        if ($result2 && $result3 && $result4 && $result5 && $result6) {
            echo "Suppression réussie";
        } else {
            echo "Suppression échouée". mysqli_error($db_handle);
        }
        header('location: ajoutsupressionadmin.php');
    }
