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
$t1Value = "";
$t2Value = "";
$t3Value = "";
$t4Value = "";
$t5Value = "";
$t6Value = "";
$t_1Value = "";
$t_2Value = "";
$t_3Value = "";
$t_4Value = "";
$msg="";
$matel=@$_POST['find'];
$rq = "SELECT Mat_Ele, Nom_Ele, Pren_Ele, Sexe_Ele, Date_Nais_Ele, Nom_Classe_Ele, Red_Ele ,Image_Ele
       FROM eleve 
       WHERE Mat_Ele = '$matel'";
$e = mysqli_query($cnx, $rq);
$res = mysqli_fetch_assoc($e);
if(isset($_POST['s'])){
    $file_show='uploads/'.$res['Image_Ele'];
    $msg='<br><b class="xx"> N°'.$res['Mat_Ele'].'</b>';
}
if(isset($_POST['s'])){
    $t1Value = isset($res['Nom_Ele']) ? $res['Nom_Ele'] : '';
    $t2Value = isset($res['Pren_Ele']) ? $res['Pren_Ele'] : '';
    $t3Value = isset($res['Date_Nais_Ele']) ? $res['Date_Nais_Ele'] : '';
    $t4Value = isset($res['Sexe_Ele']) ? $res['Sexe_Ele'] : '';
    $t5Value = isset($res['Nom_Classe_Ele']) ? $res['Nom_Classe_Ele'] : '';
    $t6Value = isset($res['Red_Ele']) ? $res['Red_Ele'] : '';
}
$rq1 = "SELECT *
        FROM parent 
        WHERE Mat_Ele = '$matel'";
$e1 = mysqli_query($cnx, $rq1);
$res2 = mysqli_fetch_assoc($e1);
if(isset($_POST['s'])){
    $t_1Value = isset($res2['Nom_Pere_Ele']) ? $res2['Nom_Pere_Ele'] : '';
    $t_2Value = isset($res2['Tel_Pere_Ele']) ? $res2['Tel_Pere_Ele'] : '';
    $t_3Value = isset($res2['Nom_Mere_Ele']) ? $res2['Nom_Mere_Ele'] : '';
    $t_4Value = isset($res2['Tel_Mere_Ele']) ? $res2['Tel_Mere_Ele'] : '';
}
session_start();
if(isset($_SESSION['xn'])) {
   $variable_recue = $_SESSION['xn'];
$msg1="";
$rq0="select Nom_Dir,Pren_Dir from directeur where Mat_Dir='$variable_recue'";
$exe0=mysqli_query($cnx,$rq0);
$r=mysqli_fetch_assoc($exe0);
if(isset($_POST['s'])){
    $msg1='<br><b class="xxx"><u> Remarque :</u> Cette fiche est conçue par le directeur '.$r['Nom_Dir'].' '.$r['Pren_Dir'].'<br>le '.date("d-m-Y H:i:s").'</b>';
}
unset($_SESSION['variable']); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consulter fiche élève</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
</head>
<body class="b11"><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="formf">
        <input type="search" name="find" placeholder="Taper la matricule élève ici" required>
        <button type="submit" name="s" onclick="">Consulter fiche</button>
  <br><br>
    <center> 
        <div class="row print-container" >
    <table bgcolor="white" cellpadding="10px" border="1"><tr><td align="center">
    <table class="head_ficha" border="1" cellpadding="10px" align="center" width="100%"><tr><td align="left" width="40px"><img src="L2.png" width="100px"></td><td align="center"><h3>Fiche élève <?php echo $msg ?></h3></td><td align="center"><img src="L3.png" width="50px"></td></tr></table>
        <br>
<table border="1" class="ficha">
         <tr><td rowspan="2" align="center" cellpadding="10px">&nbsp;&nbsp;&nbsp;<?php if (isset($file_show)) { echo "<img src='$file_show' width='100px' height='130px'>";}?></td><td align="right">Nom :</td><td> <input type="text" value="<?php echo htmlspecialchars($t1Value); ?>" disabled></td></tr>
         <tr><td align="right">Prénom :</td><td><input type="text"  value="<?php echo htmlspecialchars($t2Value); ?>" disabled></td></tr>
         <tr><td rowspan="4">Nom Père :<br><input type="text" value="<?php echo htmlspecialchars($t_1Value); ?>" disabled><br>Téléphone Père :<br><input type="text" value="<?php echo htmlspecialchars($t_2Value); ?>" disabled><br>Nom Mère :<br><input type="text" value="<?php echo htmlspecialchars($t_3Value); ?>" disabled><br>Téléphone Mère :<br><input type="text" value="<?php echo htmlspecialchars($t_4Value); ?>" disabled></td><td>Date de naissance :</td><td><input type="text" value="<?php echo htmlspecialchars($t3Value); ?>" disabled></td></tr>
         <tr><td align="right">Sexe :</td><td><input type="text" value="<?php echo htmlspecialchars($t4Value); ?>" disabled></td></tr>
         <tr><td align="right">Classe :</td><td><input type="text" value="<?php echo htmlspecialchars($t5Value); ?>" disabled></td></tr>
         <tr><td align="right">Redoublant :</td><td><input type="text" value="<?php echo htmlspecialchars($t6Value); ?>" disabled></td></tr>
</table>
<p><?php echo $msg1 ?></p>
<br>
<button type="button" onClick="window.print();" class="bimp">IMPRIMER FICHE</button></td></tr></table></div></form>
</center>
</body>
</html>
