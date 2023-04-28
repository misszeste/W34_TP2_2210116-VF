<?php
  
    //demarrer la session
    session_start();   
 

    //connexion a BD
    require('config/connection.php');

    //call le dossier getData pour la rendre la fonction dispo sur toute mes "pages"
    require_once('functions.php');   
   
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">          
            <title>TP W34</title>  
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
            <!-- ImportBootstrap Billtemplatate -->
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
             <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
             <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
          
            <!-- Vendor CSS Files -->
            <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
            <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
            <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Template Main CSS File -->
            <link href="styles.css" rel="stylesheet">
            <!-- Ajout personnel CSS File -->
            <link href="style.css" rel="stylesheet">
            
            <!-- =======================================================
            * Template Name: Groovin - v4.9.1
            * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
            * Author: BootstrapMade.com
            * License: https://bootstrapmade.com/license/
            ======================================================== -->           
        </head>
        

