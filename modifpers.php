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
    if ($mdp != "") {
        $champ = "mdp";
        $donnee = $mdp;
    }
    if ($nom != "") {
        $champ = "nom";
        $donnee = $nom;
    }
    if ($prenom != "") {
        $champ = "prenom";
        $donnee = $prenom;
    }
    if ($specialite != "") {
        $champ = "specialite";
        $donnee = $specialite;
    }
    if ($telephone != "") {
        $champ = "telephone";
        $donnee = $telephone;
    }
    if ($salle != "") {
        $champ = "salle";
        $donnee = $salle;
    }
    if ($teams != "") {
        $champ = "teams";
        $donnee = $teams;
    }
    if ($cv != "") {
        $champ = "cv";
        $donnee = $cv;
    }
    if ($photo != "") {
        $champ = "photo";
        $donnee = $photo;
    }
    if ($db_found) {
        if ($champ == "mdp") {
            $sql = "UPDATE `utilisateurs` SET `mdp`='$donnee' WHERE `email`='$email'";
        }

        if ($champ == "nom" || $champ == "prenom" || $champ == "specialite" || $champ == "telephone" || $champ == "salle" || $champ == "teams") {
            $sql = "UPDATE `personnel` SET `$champ`='$donnee' WHERE `emailpersonnel`='$email'";
        }
        if ($champ == "cv" || $champ == "photo") {
            $sql1="SELECT `idprofil` FROM `personnel` WHERE `emailpersonnel`='$email'";
            $result = mysqli_query($db_handle, $sql1);
            $data = mysqli_fetch_assoc($result);
            $idprofil = $data["idprofil"];
            $sql = "UPDATE `profil` SET `$champ`='$donnee' WHERE `idprofil`='$idprofil'";
        }

    
        if (mysqli_query($db_handle, $sql)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_handle);
        }
        header('location: ajoutsupressionadmin.php');
    }
