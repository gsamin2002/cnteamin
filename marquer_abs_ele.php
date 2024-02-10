<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cnte_database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle5.css">
    <title>Formulaire avec Select</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<center>
    <h3>Choisissez la classe pour marquer les absences de ses élèves.</h3><br>
<table cellpadding="10px"><tr><td><label for="cla">Sélectionnez une classe :</label></td><td> <select name="cla">
    <option>----------------</option>
    <?php
                            $classes = ['1A', '1B', '1C', '1D', '2A', '2B', '2C', '2D', '3A', '3B', '3C', '3D', '4A', '4B', '4C', '4D', '5A', '5B', '5C', '5D', '6A', '6B', '6C', '6D'];
                            foreach ($classes as $classe) {
                                $selected = (isset($_POST['cla']) && $_POST['cla'] == $classe) ? 'selected' : '';
                                echo "<option value=\"$classe\" $selected>$classe</option>";
                            }
                            ?>
</select>

<button name="b0"> Valider la classe</button></td></tr>
<tr></tr></table><br><br>
    <table border="1">
    <?php
            $mess = "";

            if (isset($_POST['b0'])) {
                $idele = $_POST['cla'];

                if (isset($_POST['submitted_class']) && $_POST['submitted_class'] == $idele) {
                    // Le formulaire a déjà été soumis pour cette classe, réinitialiser le tableau
                    unset($_POST['b0']);
                    unset($_POST['submitted_class']);
                }

                $sql = "SELECT Mat_Ele, Nom_Ele, Pren_Ele FROM eleve WHERE Nom_Classe_Ele = '$idele'";
                $result = $conn->query($sql);

                // Vérification des résultats et affichage dans le tableau
                if ($result->num_rows > 0) {
                    echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
                    echo '<input type="hidden" name="submitted_class" value="' . $idele . '">';
                    echo '<table border="1">';
                    echo '<tr bgcolor="#ff9800"><td>Nom & Prénom</td><td>Présent(e)</td><td>Absent(e)</td></tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['Nom_Ele'] . ' ' . $row['Pren_Ele'] . '</td>';
                        echo '<td><input type="radio" name="p[' . $row['Mat_Ele'] . ']" class="rad" value="Present(e)"></td>';
                        echo '<td><input type="radio" name="p[' . $row['Mat_Ele'] . ']" class="rad" value="Absent(e)"></td>';
                        echo '</tr>';
                    }
                    $date_p0 = date("Y-m-d");

                    echo '</table>';
                    echo '<input type="hidden" name="cla" value="' . $idele . '">';
                    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                    $date_p0 = date("Y-m-d");
                    $date_formatte = strftime("%e %B %Y", strtotime($date_p0));
                    echo "<br><br><b class='msg0'> NB : Les absences de cette classe seront enregistrées avec la date d'aujourd'hui, le ".utf8_encode($date_formatte).", en précisant également l'heure actuelle du cours.</b>";
                    echo '<br><br><button name="b2">Enregistrer les absences</button>';
                    echo '</form>';
                } else {
                    echo '<p>Aucun élève trouvé dans cette classe.</p>';
                }
            }

            if (isset($_POST['b2'])) {
                $idele = $_POST['cla'];
                $presence = $_POST['p'];

                foreach ($presence as $mat_ele => $statut) {
                    $date_p = date("Y-m-d H:i:s");
                    $sql_insert = "INSERT INTO Presence (Date_P, Statut, Mat_Ele) VALUES ('$date_p', '$statut', '$mat_ele')";
                    $conn->query($sql_insert);
                }

                $mess = "Absences enregistrées avec succès.";
            }

            $conn->close();
            ?>
    </table>
 <?php echo $mess;?>
</center>
</form>

</body>
</html>