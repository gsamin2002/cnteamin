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
if(isset($_POST['b1'])){
$mat1=@$_POST['matdir'];
$mat1=htmlspecialchars($mat1);
$pass=@$_POST['passdir'];
$pass=htmlspecialchars($pass);
$rq="select * from directeur where Mat_Dir='$mat1'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);
if($result){
  if($result['Mdp_Dir']==$pass){
  $_SESSION['id']=$result['id'];
  $_SESSION['login']=$mat1;
  header('Location:HomeDirecteur.php?id=' . $_POST['matdir'] );
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
<div class="login-page">
  <div class="form"><img src="b22.png" width="260px">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" name="f" >
      <input type="text" placeholder="Matricule" name="matdir"/>
      <input type="password" placeholder="Mot de passe" name="passdir"/>
      <?php print $mess;?><br><br>
      <button type="submit" name="b1">Se Connecter</button>
    </form>
  </div>
</div>
</body>
</html>