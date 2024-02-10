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
    <link rel="stylesheet" type="text/css" href="mystyle6.css">
    <title>Formulaire avec Select</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<center>
    <h3>Sélectionnez la classe de l'élève et son nom pour envoyer l'alerte à ses parents.</h3>
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
        <?php
        $mess="";
        session_start();
        if (isset($_POST['b2'])) {
            if (isset($_SESSION['xn'])) {
                $mat_ens = $_SESSION['xn'];
                $idele = @$_POST['choix'];
                $alert = @$_POST['alert_text'];
                $date_p0 = date("Y-m-d H:i:s");
                 if(isset($mat_ens)) {
                    $rq1 = mysqli_query($conn, "INSERT INTO observation(Mat_Ens, Mat_Ele, Alert_Text,Date_Alert) VALUES('$mat_ens', '$idele', '$alert','$date_p0')");
        
                    if ($rq1) {
                        $mess = "<b class='succes'>L'alerte a été envoyée !</b>";
                    } else {
                        $mess = "<b class='erreur'>L'alerte n'a pas été envoyée.</b>";
                    }
                } else {
                    $mess = "<b class='erreur'>Erreur dans la récupération des informations de session.</b>";
                }
            }
        }
        ?>
    </select></td></tr></table><br><br>
    <textarea placeholder="Taper votre alerte ici." name="alert_text"></textarea>
    <br><br>

   <button name="b2">Envoyer l'alert<br><?php echo $mess;?> </button><br><br>
</center>
</form>

</body>
</html>
