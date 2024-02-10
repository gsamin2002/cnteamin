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
$mess="";
$m=@$_POST['ma'];
if(isset($_POST['d'])){

$rq="select Nom_Ele,Pren_Ele from eleve where Mat_Ele='$m'";
$ex=mysqli_query($cnx,$rq);
$r=mysqli_fetch_assoc($ex);
$nomeleve=$r['Nom_Ele'].' '.$r['Pren_Ele'];
$rq1=mysqli_query($cnx,"delete from eleve where Mat_Ele='$m'");
if ($rq1) {
    $mess = "<b class='succes'>La suppression de l'élève ".$nomeleve." est  réussie !</b>";
} else {
    $mess = "<b class='erreur'>Suppression élève non réussie ! Error: " . mysqli_error($cnx) . "</b>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un élève</title>
    <link rel="stylesheet" type="text/css" href="mystyle3.css">
    <meta charset="utf-8">
</head>

<body class="b11">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" >
<div class="formf">
<input type="text" name="ma" placeholder="Taper la matricule élève ici" required><br><br><br>

<button type="submit" name="d" onclick="">Supprimer l'élève</button><br><br><?php echo $mess; ?><br><br>
</div>
</form>
</body>
</html>