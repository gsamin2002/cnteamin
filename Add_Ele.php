<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cnte_database";
$cnx= mysqli_connect($servername, $username, $password, $dbname);
if (!$cnx) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_POST["mat_e"])) {
  $mat = $_POST["mat_e"];
  $target_dir = "uploads/";
  $target_file = $target_dir . $mat;

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {
      $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
      $target_file .= "." . $imageFileType;
      
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
      $nouveau_nom=$mat.".".$imageFileType;
  }
}
$mess="";
$mat_e=@$_POST['mat_e'];
$pas_e=@$_POST['pass_e'];
$nom_e=@$_POST['ne'];
$pren_e=@$_POST['pe'];
$date_e=@$_POST['dne'];
$sexe_e=@$_POST['se'];
$class_e=@$_POST['cla'];
$red_e=@$_POST['red'];
$npe=@$_POST['npe'];
$tpe=@$_POST['tel_pe'];
$nme=@$_POST['nme'];
$tme=@$_POST['tel_me'];
if(isset($_POST['env'])){
  $rq=mysqli_query($cnx,"insert into eleve(Mat_Ele,Mdp_Ele,Nom_Ele,Pren_Ele,Sexe_Ele,Date_Nais_Ele,Nom_Classe_Ele,Red_Ele,Image_Ele) values('$mat_e','$pas_e','$nom_e','$pren_e','$sexe_e','$date_e','$class_e','$red_e','$nouveau_nom')");
  $rq1=mysqli_query($cnx,"insert into parent(Nom_Pere_Ele,Nom_Mere_Ele,Tel_Pere_Ele,Tel_Mere_Ele,Mat_Ele) values('$npe','$nme','$tpe','$tme','$mat_e')");
  if($rq && $rq1){
  $mess='<b class="succes">Insertion élève réussie !</b>';
  }
  else
  $mess="<b class='erreur'>Échec de l'insertion !</b>";
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un élève</title>
    <link rel="stylesheet" type="text/css" href="mystyl.css">
    <meta charset="utf-8">
</head>

<body class="b11">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data" class="formf" name="f">
        <center>
<h3>Informations concernant l'élève</h3><hr>
    <table >
<tr><td align="right">Matricule élève :</td><td><input type="text" name="mat_e" Style="max-width: 127px;">&nbsp;&nbsp;<button class="b_x" type="button"  onclick="genererMatricule()">Générer</button></td></tr>
<tr><td align="right">Mot de passe élève :</td><td><input type="text" name="pass_e" Style="max-width: 127px;">&nbsp;&nbsp;<button class="b_x" type="button"  onclick="genererMotDePasse()">Générer</button></td></tr>
<tr><td align="right">Nom :</td><td><input type="text" name="ne"></td></tr>
<tr><td align="right">Prénom :</td><td><input type="text" name="pe"></td></tr>
<tr><td align="right">Date de naissance :</td><td><input type="date" name="dne"></td></tr>
<tr><td align="right">Sexe :</td><td><input type="radio" name="se" Value="Masculin">Masculin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="se" value="Féminin">Féminin</td></tr>
<tr><td align="right">Classe :</td><td><select name="cla">
    <option>sélectionner une classe</option>
    <option value="1A">1A</option>
    <option value="1B">1B</option>
    <option value="1C">1C</option>
    <option value="1D">1D</option>
    <option value="2A">2A</option>
    <option value="2B">2B</option>
    <option value="2C">2C</option>
    <option value="2D">2D</option>
    <option value="3A">3A</option>
    <option value="3B">3B</option>
    <option value="3C">3C</option>
    <option value="3D">3D</option>
    <option value="4A">4A</option>
    <option value="4B">4B</option>
    <option value="4C">4C</option>
    <option value="4D">4D</option>
    <option value="5A">5A</option>
    <option value="5B">5B</option>
    <option value="5C">5C</option>
    <option value="5D">5D</option>
    <option value="6A">6A</option>
    <option value="6B">6B</option>
    <option value="6C">6C</option>
    <option value="6D">6D</option>
</select>

</td>
<tr><td align="right">Redoublant :</td><td><input type="radio" name="red" value="0">0 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="red" value="1">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="red" value="2">2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="red" value="3">3</td></tr>
</tr>
<tr><td align="right">Portrait élève :</td><td><input type="file" name="image" id="image" accept="image/*"></td></tr>
</table><hr>
<h3>Informations sur les parents</h3><hr>
<table>
<tr><td align="right">Nom Père :</td><td><input type="text" name="npe"></td></tr>
<tr><td align="right">Téléphone Père :</td><td><input type="number" name="tel_pe"></td></tr>
<tr><td align="right">Nom Mère :</td><td><input type="text" name="nme"></td></tr>
<tr><td align="rigth">Téléphone Mère :</td><td><input type="number" name="tel_me"></td></tr>
</table><br><?php echo $mess; ?> <br>
<button type="submit" class="bimp2" name="env">enregistrer élève</button>
<br><br>
</center>
</form>
<script>
   function genererMatricule() {
  var chiffresAleatoires = Math.floor(100000 + Math.random() * 900000);
  var matricule = "10" + chiffresAleatoires;
  f.mat_e.value=matricule;
}
function genererMotDePasse() {
  var caracteres = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  var motDePasse = "";

  for (var i = 0; i < 6; i++) {
    var caractereAleatoire = caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    motDePasse += caractereAleatoire;
  }
  f.pass_e.value=motDePasse;
}
</script>
</body>
</html>