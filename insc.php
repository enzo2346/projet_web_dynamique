<?php
    //identifier votre BDD
    $database = "omnessante";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $code = isset($_POST["code"])? $_POST["code"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $tel = isset($_POST["tel"])? $_POST["tel"] : "";
    $vitale = isset($_POST["vitale"])? $_POST["vitale"] : "";
    
    $sql = "";
    $sql1 = "";

    //si la bdd existe
    if ($db_found) {
        $sql = "INSERT INTO `client` ( `emailclient`,`nom`,`prenom`,`adresse`,`ville`,`codepostal`,`pays`,`telephone`,`cartevitale`) VALUES ('$mail','$nom','$prenom','$adresse','$ville','$code','$pays','$tel','$vitale')";
        $sql1 = "INSERT INTO `utilisateurs` (`email`,`typ`,`mdp`,`emailclient`,`emailpersonnel`,`emailadministrateur`) VALUES ('$mail',1,'$mdp','$mail','paspersonnel','pasadmin')";

        if (mysqli_query($db_handle, $sql)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_handle);
        }
        if (mysqli_query($db_handle, $sql1)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($db_handle);
        }
        header('location: connexion.php');
    }
