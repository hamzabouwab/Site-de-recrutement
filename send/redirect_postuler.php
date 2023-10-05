<?php
session_start();
$reference=$_POST['id'];
$_SESSION["reference"]=$reference;

header("location:../postuler.php");

?>