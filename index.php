<?php 
session_start();

if(!isset($_SESSION["email"])){
    header("Location: loginForm.php");
 }
 if($_SESSION["role"] == "user"){
   header("Location: user.php");
  }
  elseif($_SESSION["role"] =="admin"){
   header("Location: admin.php");
 }
  



?>





















