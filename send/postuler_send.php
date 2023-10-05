<?php
session_start();
include 'ado.php';

$nom_complet=trim($_POST['nom_complet']);
$date_naiss=trim($_POST['date_naiss']);
$cin=trim($_POST['cin']);
$ref=trim($_POST['ref']);

      $query="insert into candidats(nom_complet,cin,date_naiss,ref) values('$nom_complet','$cin','$date_naiss','$ref')";

      if($conn->query($query)){
         echo '<h2>Inscription complete !</h2>';
         header("refresh:5;url=../index.php");
      }else{
         die('<h2>L\'inscription a echoué</h2>');
       }
?>