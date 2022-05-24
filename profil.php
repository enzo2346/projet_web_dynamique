<?php
//identifier votre BDD
$database = "omnessante";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$email = "medecing1@gmail.com";

//Si la BDD existe
if ($db_found) {
    $sql = "SELECT personnel.nom, personnel.prenom,personnel.specialite,personnel.salle,personnel.telephone,personnel.emailpersonnel,profil.photo FROM personnel,profil WHERE emailpersonnel = 'medecing1@gmail.com' AND personnel.idprofil = profil.idprofil; ";
    if (mysqli_query($db_handle, $sql)) {
        //echo "requete fonctionnelle.";
    } else {
        //echo "Requete non fonctionnelle.";
        header('Location: profil2.php?erreur=2');
    }
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)==0) {
        header('Location: profil2.php?erreur=1');
    } else {
        while ($data = mysqli_fetch_assoc($result)) {
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $specialite=$data['specialite'];
            $salle=$data['salle'];
            $telephone=$data['telephone'];
            $email=$data['emailpersonnel'];
            $photo=$data['photo'];
        }
        header('Location: profil2.php?nom='.$nom.'&prenom='.$prenom.'&specialite='.$specialite.'&salle='.$salle.'&telephone='.$telephone.'&email='.$email.'&photo='.$photo);
    }
} else {
    header('Location: profil2.php?erreur=3');
}
mysqli_close($db_handle);
