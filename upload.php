<?php 
session_start();
/*include_once('conn.php');*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cnte_database";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>
<?php

$table="eleve";
$nouveau_nom=$_FILES["file"]["name"];
$nouveau_nom=addslashes($nouveau_nom);
$nouveau_nom=htmlspecialchars($nouveau_nom);
$target_dir = "uploads/files/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(!empty($nouveau_nom)){

mysqli_query($conn,"insert into  $table (image) values('$nouveau_nom')");
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//if(file_exists($ancien_nom)){@unlink($ancien_nom);}
echo "<b>Envoi reussi !!</b>";
}


?>