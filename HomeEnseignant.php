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

$mess1="<b class='bien_ms1'>Bienvenue , L'enseignant</b>";
$id = $_GET['id'];
$rq="select Nom_Ens,Pren_Ens from enseignant where Mat_Ens='$id'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);
$mess2="<b class='bien_ms2'>".$result['Nom_Ens'].' '.$result['Pren_Ens']."</b>";
if(isset($_POST['ac'])){
header('Location:Change_Dir_Pass.php?id='.$id);}
session_start(); 
$_SESSION['xn'] = $id;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<meta charset="utf8">
</head>

<body>

<div class="a">
	<center>
		<table width="100%">
		<tr><td width="36%" align="center"><a href="https://www.cnte.tn/"><img src="L2.png" width="160px"></a></td><td  align="left" width="40%"><img src="L1.png" width="320px"></td><td width="33px" align="center"><a href="https://www.education.gov.tn/?lang=fr"><img src="L3.png" width="80px"></a></td></tr>
        </table>
</center>
</div><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<table width="100%" cellpadding="2px" class="tab">
    <tr><td>
<?php print  $mess1;?><br><?php print  $mess2;?>
</td><td align="right"><a href="index.php" class="decon">déconnexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Change_Dir_Pass.php" class="decon">Changer Votre mot de passe</a></td></tr>
</table>
<center><br>
		<div>
			<table cellpadding="40px">
				<tr><td><a href="remplir_note_ele.php" target="if"><img class="im3" src="save_note.png" width="150px"></a></td><td><a href="marquer_abs_ele.php" target="if"><img class="im3" src="save_abs.png"  width="150px"></a></td><td><a href="parental_alert.php" target="if"><img class="im3" src="alert_parental.png"  width="150px"></a></td></tr>
</table>
		</div>
        <hr>
        
</center>
<iframe  width="100%" height="900px" name="if">

</iframe>
</form>
</body>
</html>