<?php
session_start();

include 'sql.php';

      $email=trim($_POST['email']);
      $password=trim($_POST['password']);
      $query="select * from users where email='$email' and password='$password'";
      $result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["name"]=$row["nom"];
    $_SESSION["id"]=$row["id"];
    $_SESSION["email"]=$row["email"];
    header("location:../index.php");
  }
} else{
  header("refresh:5;url=../index.php");
   die('<h3>Veuillez saisir des informations correctes</h3>');
 }

?>