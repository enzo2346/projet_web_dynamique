<?php
  //start session
  session_start();
?>

<!DOCTYPE html>
<!--TD1 Q5-->
<html>
  <head>
    <meta charset="utf-8" />
    <title>connexion</title>
  </head>

<?php
$_SESSION["identifiant"]="";
$_SESSION["mdp"]="";
?>
  <body>
    <h1>Connexion - Page de connexion</h1>
    <form action="conn.php" method="post">
      <table>
        <tr>
          <td>Identifiant:</td>
          <td><input type="text" name="login" /></td>
        </tr>
        <tr>
          <td>Mot de passe:</td>
          <td><input type="text" name="passw" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="Valider" />
            <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err==1) {
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if ($err==2) {
                        echo "<p style='color:red'>Requete non fonctionnelle</p>";
                    }
                    if ($err==3) {
                        echo "<p style='color:red'>Connexion a la bdd impossible</p>";
                    }
                }
            ?>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
