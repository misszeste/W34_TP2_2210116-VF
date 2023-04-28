<?php

    //section servant à authentifier l'utilisateur avec les données de la BD 
    require('config/connection.php');

    $username = $_POST['floatingInput'];
    $password = $_POST['floatingPassword'];


    //Nettoyage des inputs
    //Remove the backslash (\)
    $username = stripslashes($username);
    $password = stripslashes($password);

    //htmlentities — Convert all applicable characters to HTML entities
    $username = htmlentities($username);
    $password = htmlentities($password);

    //Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
    
   // $username = mysqli_real_escape_string($connect ,$username);
    $username = mysqli_real_escape_string($connect, $_POST["floatingInput"]); 

    //$password= mysqli_real_escape_string($connect,$password);    
    $password = mysqli_real_escape_string($connect, $_POST["floatingPassword"]);  


//  **************ne pas oublié d'aller modifier dans BD md5 au password*****************
   // $password = md5($password); 
    

    //requete à la BD 

    $query =" SELECT * from utilisateurs where username= '$username' AND userpass= '$password'";
    //$query =" SELECT * from utilisateurs where username= 'misszest' AND userpass= 'patate43'";

    //mise dans un variable des résultats de la requête
    $resultats = mysqli_query($connect, $query);
   

    $row = mysqli_fetch_array($resultats, MYSQLI_ASSOC);


    $count = mysqli_num_rows($resultats);   

?>