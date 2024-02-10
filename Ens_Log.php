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
 if(isset($_GET['action'])){
   $action=$_GET['action'];
   if($action=="deconn"){
   unset($_SESSION['id']);
    unset($_SESSION['log']);
   }
 }
 ?>
  <?php
 //authentification
 $mess="";
if(isset($_POST['b2'])){
$mat=@$_POST['matens'];
$mat=htmlspecialchars($mat);
$pass=@$_POST['passens'];
$pass=htmlspecialchars($pass);
$rq="select * from enseignant where Mat_Ens='$mat'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);
if($result){
  if($result['Mdp_Ens']==$pass){
  $_SESSION['id']=$result['id'];
  $_SESSION['login']=$mat;
  header('Location:HomeEnseignant.php?id=' . $_POST['matens'] );
  exit();
  }
  else
  $mess="<br><b class='erreur'>Mot de passe incorrect !</b>";
}
else
 $mess="<br><b class='erreur'>Matricule introuvable ! </b>";

}

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
<div class="login-page1">
    
  <div class="form1"><img src="b33.png" width="260px">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
      <input type="text" placeholder="Matricule" name="matens"/>
      <input type="password" placeholder="Mot de passe" name="passens"/>
      <?php print $mess;?><br><br>
      <button type="submit" name="b2">Se Connecter</button>
    </form>
  </div>
</div>
</body>
</html>