<?php 
session_start();

if(!isset($_SESSION["role"]) || ($_SESSION["role"]!= "admin")){
    header("Location: loginForm.php");
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h1 class="text-xl  font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
    WELCOME TO ADMIN PENAL 
</h1><br>
<?php echo  $_SESSION["role"]." account: " ."<br>";
 echo "Name: ". $_SESSION["name"] ."<br>";
 echo "E-mail: ". $_SESSION["email"] ."<br>";
 echo "Id: ".$_SESSION["id"]
?><br><br>
<button type="button" class=" text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><a href="logout.php">Log Out</a></button>
