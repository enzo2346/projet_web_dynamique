<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<h1>Les promotions cette semaine:</h1> 
<a href="profil.php"> Retour à la page d'accueil.</a>
<?php
if (isset($_GET['nom']) || isset($_GET['prenom']) || isset($_GET['specialite']) || isset($_GET['salle']) || isset($_GET['telephone']) || isset($_GET['email'])) {
    $nom = $_GET['nom'];
    $prenom= $_GET['prenom'];
    $specialite = $_GET['specialite'];
    $salle = $_GET['salle'];
    $telephone = $_GET['telephone'];
    $emailpersonnel = $_GET['email'];
    echo "<p> nom = $nom</p>";
    echo "<p> prenom = $prenom</p>";
    echo "<p> specialite = $specialite</p>";
    echo "<p>salle  = $salle</p>";
    echo "<p>telephone  = $telephone</p>";
    echo "<p>emailpersonnel  = $emailpersonnel</p>";
}

if (isset($_GET['photo'])) {
    $img = $_GET['photo'];
    echo "<img src=$img alt='image'>";
}
?>
</body>
</html>