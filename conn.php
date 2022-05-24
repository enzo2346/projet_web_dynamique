<?php
session_start();
?>

<?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$login = isset($_POST["login"])? $_POST["login"] : "";
$mdp = isset($_POST["passw"])? $_POST["passw"] : "";
//$_SESSION["identifiant"]=$login;
//$_SESSION["mdp"]=$mdp;
if (empty($login)) {
    $login = 0;
}
$sql = "";
//Si la BDD existe
if ($db_found) {
    $sql = "SELECT `email`,`typ`,`mdp`,`emailclient`,`emailpersonnel`,`emailadministrateur` FROM utilisateurs WHERE `email` = '$login' AND `mdp` = '$mdp'; ";
    if (mysqli_query($db_handle, $sql)) {
        //echo "requete fonctionnelle.";
    } else {
        //echo "Requete non fonctionnelle.";
        header('Location: connexion.php?erreur=2');
    }
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        header('Location: connexion.php?erreur=1');
    } else {
        while ($data = mysqli_fetch_assoc($result)) {
            $_SESSION["email"]=$data['email'];
            $_SESSION["typ"]=$data['typ'];
            $_SESSION["mdp"]=$data['mdp'];
            $_SESSION["emailclient"]=$data['emailclient'];
            $_SESSION["emailpersonnel"]=$data['emailpersonnel'];
            $_SESSION["emailadministrateur"]=$data['emailadministrateur'];
        }
        header('Location: index.php');
    }
} else {
    header('Location: connexion.php?erreur=3');
}
mysqli_close($db_handle);
