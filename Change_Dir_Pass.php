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
$apass = @$_POST['pass0'];
$npass = @$_POST['pass1'];
$cpass = @$_POST['pass2'];
if(isset($_POST['b1'])){
$mrq=mysqli_query($conn,"select * from directeur");
while($rsu=mysqli_fetch_assoc($mrq)){
  if($apass==$rsu['Mdp_Dir']){
  mysqli_query($conn,"update directeur set Mdp_Dir='$npass' where Mat_Dir='$id'");
  $mess='<b class="succes">Changement reussie !</b>';
  }
  else
   $mess="<b class='erreur'>Autorisation refusée !</b>";
}}
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
	       <tr><td width="36%" align="center"><a href="https://www.cnte.tn/"><img src="L2.png" width="160px"></a></td><td  align="left" width="40%"><a href="index.php"><img src="L1.png" width="320px"></a></td><td width="33px" align="center"><a href="https://www.education.gov.tn/?lang=fr"><img src="L3.png" width="80px"></a></td></tr>
       </table>
    </center>
</div>
<div class="login-page">
  <div class="form"><img src="changepass.png" width="140px"><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <input type="password" placeholder="Ancien mot de passe" name="pass0"/>
    <input type="password" placeholder="Nouveau mot de passe" name="pass1"/>
    <input type="password" placeholder="Confirmer mot de passe" name="pass2"/>
    <button type="submit" name="b1">Modifier le mot de passe</button>
    </form>
  </div>
</div>
</body>
</html>