<?php 
include 'sql.php';
$ref=$_POST["ref"];
$sql = "delete from offre where ref='$ref'";
if(mysqli_query($conn,$sql)){
   header("refresh:5;url=../index.php");
   die("Supprimé avec succés !");
}else{
   header("refresh:5;url=../index.php");
   die('L\'élement n\'est pas supprimé !');
}
?>