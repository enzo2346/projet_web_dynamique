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
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $specialite = isset($_POST["specialite"])? $_POST["specialite"] : "";
    $telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
    $salle = isset($_POST["salle"])? $_POST["salle"] : "";
    $teams = isset($_POST["teams"])? $_POST["teams"] : "";
    $cv = isset($_POST["cv"])? $_POST["cv"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    
    $sql = "";
    $sql1 = "";
    $sql2 = "";
    $sql3 = "";

    //si la bdd existe
    if ($db_found) {
        $sql = "SELECT COUNT(idprofil) FROM `profil` WHERE 1; ";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $id = $data['COUNT(idprofil)'];
        $id = $id + 1;
        $sql2 = "INSERT INTO `personnel` (`emailpersonnel`,`nom`,`prenom`,`specialite`,`telephone`,`salle`,`teams`,`idprofil`) VALUES ('$email','$nom','$prenom','$specialite','$telephone','$salle','compte de chat','$id')";
        if (mysqli_query($db_handle, $sql2)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql2. " . mysqli_error($db_handle);
        }
        $sql1 = "INSERT INTO `profil` (`idprofil`,`cv`,`video`,`photo`) VALUES ('$id','$cv','https://yt.com','$photo')";
        if (mysqli_query($db_handle, $sql1)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($db_handle);
        }
        
        $sql3 = "INSERT INTO `utilisateurs` (`email`,`typ`,`mdp`,`emailclient`,`emailpersonnel`,`emailadministrateur`) VALUES ('$email',2,'$mdp','pasclient','$email','pasadmin')";
        if (mysqli_query($db_handle, $sql3)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql3. " . mysqli_error($db_handle);
        }
        header('location: ajoutsupressionadmin.php');
    }
