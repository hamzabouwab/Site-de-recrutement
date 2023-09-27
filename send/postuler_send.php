<?php
session_start();
include 'sql.php';
$nom_complet=trim($_POST['nom_complet']);
$ref=trim($_POST['ref']);
$date_naiss=trim($_POST['date_naiss']);
$cin=trim($_POST['cin']);


      $query="insert into candidats(ref,nom_complet,date_naiss,cin) values('$ref','$nom_complet','$date_naiss','$cin')";

      if($conn->query($query)){
         echo '<h2>Inscription complete !</h2>';
         header("refresh:5;url=../index.php");
      }else{
         die('<h2>L\'nscription a echoué</h2>');
       }
   

?>