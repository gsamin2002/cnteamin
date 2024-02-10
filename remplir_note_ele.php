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
<?php
$mess = ""; // Initialisation de la variable en dehors de la condition

if (isset($_POST['b2'])) {
    $matieres = $_POST['Mat'];
    $notes = $_POST['t'];
    $coefficients = $_POST['c'];
    $mat_ele = @$_POST['choix'];

    // Boucle pour traiter chaque ligne du formulaire
    for ($i = 0; $i < count($matieres); $i++) {
        // Récupérer les valeurs pour chaque matière
        $nomMatiere = $matieres[$i];
        $noteMatiere = $notes[$i];
        $coefMatiere = $coefficients[$i];
        $requete = "INSERT INTO matiere (Nom_Mat, Note_Mat, Coef_Mat, Mat_Ele) VALUES ('$nomMatiere', '$noteMatiere', '$coefMatiere', '$mat_ele')";

        // Exécuter la requête
        if ($conn->query($requete) !== TRUE) {
            echo "Erreur lors de l'insertion : " . $conn->error;
            // Ajouter d'autres actions en cas d'échec si nécessaire
        }
    }

    // Vérifier si toutes les insertions ont réussi
    $insertionsReussies = ($i === count($matieres));

    // Afficher le message en fonction du succès ou de l'échec
    if ($insertionsReussies) {
        $mess = "<br><b class='erreur'>Les notes ont été enregistrées avec succès.</b>";
    } else {
        $mess = "<br><b class='erreur0'>Erreur lors de l'enregistrement des notes.</b>";
        // Ajouter d'autres actions en cas d'échec si nécessaire
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle4.css">
    <title>Formulaire avec Select</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<center>
    <h3>Sélectionnez la classe de l'élève et son nom pour enregistrer ses notes.</h3><br>
<table cellpadding="10px"><tr><td><label for="cla">Sélectionnez une classe :</label></td><td> <select name="cla">
        <option>----------------</option>
        <option value="1A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '1A') echo 'selected'; ?>>1A</option>
    <option value="1B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '1B') echo 'selected'; ?>>1B</option>
    <option value="1C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '1C') echo 'selected'; ?>>1C</option>
    <option value="1D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '1D') echo 'selected'; ?>>1D</option>
    <option value="2A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '2A') echo 'selected'; ?>>2A</option>
    <option value="2B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '2B') echo 'selected'; ?>>2B</option>
    <option value="2C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '2C') echo 'selected'; ?>>2C</option>
    <option value="2D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '2D') echo 'selected'; ?>>2D</option>
    <option value="3A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '3A') echo 'selected'; ?>>3A</option>
    <option value="3B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '3B') echo 'selected'; ?>>3B</option>
    <option value="3C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '3C') echo 'selected'; ?>>3C</option>
    <option value="3D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '3D') echo 'selected'; ?>>3D</option>
    <option value="4A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '4A') echo 'selected'; ?>>4A</option>
    <option value="4B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '4B') echo 'selected'; ?>>4B</option>
    <option value="4C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '4C') echo 'selected'; ?>>4C</option>
    <option value="4D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '4D') echo 'selected'; ?>>4D</option>
    <option value="5A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '5A') echo 'selected'; ?>>5A</option>
    <option value="5B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '5B') echo 'selected'; ?>>5B</option>
    <option value="5C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '5C') echo 'selected'; ?>>5C</option>
    <option value="5D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '5D') echo 'selected'; ?>>5D</option>
    <option value="6A" <?php if(isset($_POST['cla']) && $_POST['cla'] == '6A') echo 'selected'; ?>>6A</option>
    <option value="6B" <?php if(isset($_POST['cla']) && $_POST['cla'] == '6B') echo 'selected'; ?>>6B</option>
    <option value="6C" <?php if(isset($_POST['cla']) && $_POST['cla'] == '6C') echo 'selected'; ?>>6C</option>
    <option value="6D" <?php if(isset($_POST['cla']) && $_POST['cla'] == '6D') echo 'selected'; ?>>6D</option>
    </select>
<button name="b0"> Valider la classe</button></td></tr>
<tr><td> <label for="choix">Sélectionnez un élève :</label></td><td> <select name="choix" id="choix">
        <?php
        if(isset($_POST['b0'])){
            $idele = @$_POST['cla'];
            $requete = "SELECT Mat_Ele, Nom_Ele, Pren_Ele FROM eleve WHERE Nom_Classe_Ele = '$idele'";
            $resultat = $conn->query($requete);
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo "<option value=\"" . $row['Mat_Ele'] . "\">" . $row['Nom_Ele'] . ' ' . $row['Pren_Ele'] . "</option>";

                }
            } else {
                echo "<option value=\"\">Aucun élève trouvé</option>";
            }
        }
        ?>
    </select></td></tr></table><br><br>
    <table border="1">
        <tr bgcolor="#00cdd0"><td>Nom matière</td><td>Coef matière</td><td>Note matière</td></tr>
        <?php
        $matieres = ["Arabe", "Français", "Anglais", "Math", "Physique", "Histoire", "Géographie", "Dessin", "Musique", "Sport"];
        $coefficients = [1, 1, 2, 3, 2, 1, 1, 1, 1, 1];

        foreach ($matieres as $index => $nomMatiere) {
            echo '<tr>';
            echo '<td><input type="text" value="' . $nomMatiere . '" name="Mat[]"></td>';
            echo '<td align="center"><input type="text" size="3" name="c[]" value="' . $coefficients[$index] . '"></td>';
            echo '<td><input type="text" name="t[]"></td>';
            echo '</tr>';
        }
        ?>
    </table><br><br>
<button name="b2">Enregistrer les notes <?php echo $mess;?> </button><br><br>
</center>
</form>

</body>
</html>
