<?php   
//valide la presence d'une  session en cours
   session_start();   
//destruction de la session
unset($_SESSION["username"]);
unset($_SESSION["userpass"]);
   session_destroy();    
   session_unset();  
//redirection
   header("Location: /W34_TP2_2210116-VF/index.php");   
   die();
?>

