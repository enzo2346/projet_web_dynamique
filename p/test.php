<html>
<head>
    <title>Mon super emploi du temps</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css\styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script type="text/javascript">
      $(document).ready(function () {
        $(".header").height($(window).height());
      });
    </script>
    <style type="text/css">
        th /* Les cellules d'en-tête */
        {
            border: 1px solid #9ec2f8;
            background-color: #9ec2f8;
            border-radius: 0;
            color: #fff;
            text-align: center;
        }
        td /* Les cellules normales */
        {
           font-size:0.8em;
           border: 2px solid #B4B4B4;
           font-family: Verdana, "Trebuchet MS", Times, "Times New Roman", serif;
           text-align: center; /* Tous les textes des cellules seront centrés*/
           padding: 5px; /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
           height:25px;
           width:200px;
        }
        </style>
</head>
<body>
<table>
<?php
    $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    $rdv["Dimanche"]["16"] = "Dermatologue";
    $rdv["Lundi"]["9"] = "Mémé -_-";
    echo "<tr>";
    for ($x = 0; $x < 7; $x++) {
        echo "<th>".$jour[$x]."</th>";
    }
    echo "</tr>";
    for ($j = 0; $j < 24; $j ++) {
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            if ($i == 0) {
                $heure = str_replace(".5", ":30", $j);
                /*if (substr($heure, -3, 3) != ":30") {
                    echo "<td class=\"time\" rowspan=\"2\">".$heure."h</td>";
                }*/
            }
            echo "<td>";
            if (!isset($rdv[$jour[$i]][$heure])) {
                echo '<a type="button" class="btn-outline-primary mb-2 btn btn-light mb-2" href="#">'.$heure.'</a>';
            } else {
                echo '<a type="button" class="btn-outline-dark mb-2 btn btn-dark mb-2">'.$heure.'</a>';
            }
            echo "</td>";
        }
        echo "</tr>";
    }
?>
</table>
</body>