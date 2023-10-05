<?php
$server="localhost";
$database="recrutement";
$username="root";
$password="";
$conn = new mysqli("localhost","root","","recrutement");
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
?>