<?php
    //Query pour produit ACCUEIL
    $query= 'SELECT*FROM produits';

    //appel de la fonction pour recevoir les données de la BD correspondant à la requète     
    $posts = getData($query, $connect);   
?>

<!-- Version 11/24 -->
<!-- ======= Hero Section ======= -->
<section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(img/slide/photo1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Voyagez avec nous!</h2>
                            <p class="animate__animated animate__fadeInUp">Obtenez 800 $ de rabais par couple sur les circuits + protection de voyage gratuite.</p>                            
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(img/slide/bois.jpg);">          
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Réservez tôt</h2>
                            <p class="animate__animated animate__fadeInUp">Réservez votre voyage de l’année prochaine dès maintenant et économisez sur les forfaits vers vos pays favoris.</p>                             
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(img/slide/medite.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Consulter nos forfaits</h2>
                            <p class="animate__animated animate__fadeInUp">Économisez jusqu’à 300 $ par couple sur les forfaits Vols et Croisière + profitez des avantages de la Promesse Croisière</p>                           
                        </div>
                    </div>
                </div>
            </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section><!-- End Hero -->
    <body class="">        
        <div class="container">
            <div class="recommandation" style="padding: 30px;">
                <h1 class="text-center" style="color:aliceblue"> Nos recommandations du jours </h1>
            </div>
             <?php foreach($posts as $post):?>
                <div class="card">                         
                    <h4 class="card-header" style="background: grey ; text-align :center";><?php echo $post['NomProduit'];?></h4>
                    <div class="card-body">
                        <p class="card-text"><?php echo $post['InfoProduit'];?></p>
                        <small> Durée du voyage : <?php echo $post['TempsProduit'];?> jours.<br>
                         Disponible: <?php echo $post['QteProduit'];?> billets au coût de <?php echo $post['PrixProduit'];?> $ chacun.</small>                                                                
                         
                         <?php
                         //verifie si la variable existe
                        if (isset($_SESSION["username"]) == 0) {
                         
                           echo "<div class='btnAchat' style='padding-top: 20px;'>
                                            <a href='login.php' class='btn btn-primary'  style='background: #5c9f24; border-color :#5c9f24'> Achetez-moi!</a>
                                 </div> ";

                        } else { 
                            echo "<div class='btnAchat' style='padding-top: 20px;'>
                                    <a href='membre.php' class='btn btn-primary'  style='background: #5c9f24; border-color :#5c9f24'> Achetez-moi!</a>
                                </div> ";
                                
                        }
                        ?>
                    </div>                                                          
                </div>
                <br>
             <?php endforeach;?>            
         </div>
    </body>

    


