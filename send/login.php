<?php
session_start();
$_SESSION["invalid_email"]="";
$_SESSION["invalid_password"]="";
$_SESSION["validation"]="needs-validation";

include 'ado.php';

      $email=trim($_POST['email']);
      $password=trim($_POST['password']);
      $query="select * from users where email='$email'";
      $result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($row['password']==$password){
        $_SESSION["name"]=$row["nom"];
        $_SESSION["id"]=$row["id"];
        $_SESSION["email"]=$row["email"];
        $_SESSION["password"]=$row["password"];
        $_SESSION['validation']="needs-validation";

        header("location:../index.php");
        die();
      }
    
  }
  $_SESSION["invalid_password"]="Le mot de passe n'est pas valide !";
  $_SESSION['validation']="";
  $_SESSION['password_feedback']="is-invalid";
  $_SESSION['email_feedback']="";
  header("location:../connection.php");
  die();
}
else{
  $_SESSION['validation']="";
  $_SESSION["invalid_email"] = "L'email n'est pas valide !";
  $_SESSION['email_feedback']="is-invalid";
  
  $_SESSION['password_feedback']="";
  header("Location:../connection.php");
   die();
 }

?>