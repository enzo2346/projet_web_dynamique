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
        if ($_SESSION["typ"]==1) {
            $email = $_SESSION["email"];
            $sql = "SELECT * FROM `client` WHERE `emailclient`='$email'; ";
            if (mysqli_query($db_handle, $sql)) {
                //echo "requete fonctionnelle.";
            } else {
                //echo "Requete non fonctionnelle.";
                header('Location: connexion.php?erreur=5');
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result)==0) {
                header('Location: connexion.php?erreur=4');
            } else {
                while ($data = mysqli_fetch_assoc($result)) {
                    $_SESSION["idclient"]=$data['idclient'];
                    $_SESSION["emailclient"]=$data['emailclient'];
                    $_SESSION["nom"]=$data['nom'];
                    $_SESSION["prenom"]=$data['prenom'];
                    $_SESSION["adresse"]=$data['adresse'];
                    $_SESSION["ville"]=$data['ville'];
                    $_SESSION["codepostal"]=$data['codepostal'];
                    $_SESSION["pays"]=$data['pays'];
                    $_SESSION["telephone"]=$data['telephone'];
                    $_SESSION["cartevitale"]=$data['cartevitale'];
                }
                header('Location: acceuil.php');
            }
        }
        if ($_SESSION["typ"]==2) {
            header('Location: personnel.html');
        }
        if ($_SESSION["typ"]==3) {
            header('Location: admin.html');
        }
    }
} else {
    header('Location: connexion.php?erreur=3');
}
mysqli_close($db_handle);
