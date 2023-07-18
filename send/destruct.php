<?php
   session_start();

if(isset($_POST["destruct"])){
   session_destroy();
   header("location:../index.php");
}
?>