<?php
//verifie si la variable existe
if (isset($_SESSION["username"]) == 0) { 
    // authentification de l'utilisateur 
    require('config/authentification.php');   
    //redirection si pas authentifié
    if ($count==1) {         
        $_SESSION["username"] = $username;        
    } else {
        header("Location: W34_TP2_2210116-VF/index.php?erreur=1");
    }  
}              

    //Query   
    
    //$query= 'SELECT*FROM produits';  
    //$posts = getData($query,$connect);

    $status=""; // va nous permettre de gerer nos erreurs
    if (isset($_POST['PK_IdProduit']) && $_POST['PK_IdProduit']!="") {     
        $id= $_POST['PK_IdProduit'];        
        $resultat = mysqli_query($connect, "SELECT * FROM `produits` WHERE `PK_IdProduit`='$id'");
        $row = mysqli_fetch_assoc($resultat);
        $id = $row['PK_IdProduit'];
        $nom = $row['NomProduit'];
        $info = $row['InfoProduit'];
        $image = $row['image'];
        $temps = $row['TempsProduit'];
        $prix = $row['PrixProduit'];
        $qte = $row['QteProduit'];
        $categorie = $row['FK_IdCategorie'];            
        $panier_array = array(
            $id=> array(
                'PK_IdProduit'=> $id,
                'NomProduit'=> $nom,
                'InfoProduit' => $info,
                'image'=>$image,
                'TempsProduit' => $temps,
                'PrixProduit'=>$prix,
                'QteProduit'=> $qte,
                'FK_IdCategorie'=>$categorie                     
            )
        );//validation 

        if (empty($_SESSION['boutique_panier'])) {
            $_SESSION['boutique_panier'] = $panier_array;
            $status= "<div class='box'> Le produits à été ajouté au panier </div>";
        } else {
            $array_key= array_keys($_SESSION["boutique_panier"]);
            if (in_array($id, $array_key)) {
                $status= "<div class='box' style='color:red;'> Le produits est déjà dans votre panier </div>";

            } else {
                $_SESSION["boutique_panier"] = array_merge($_SESSION["boutique_panier"], $panier_array);
                $status= "<div class='box'> Le produits à été ajouté au panier </div>";

            }            
        }
    }
?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(img/slide/plage.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown">Forfait Découverte</h2>
                        <p class="animate__animated animate__fadeInUp">Découvrez nos destinations dans le confort de votre salon et au moment qui vous convient!</p>                            
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(img/slide/bois.jpg);">          
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown">Forfait Reservez-tôt</h2>
                        <p class="animate__animated animate__fadeInUp">Réservez votre voyage de l’année prochaine dès maintenant et économisez sur les forfaits vers vos pays favoris.</p>                            
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(img/slide/medite.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown"> Forfait Grand Luxe</h2>
                        <p class="animate__animated animate__fadeInUp">Lorsqu’il est évoqué, le voyage de luxe génère immédiatement l’image d’un hôtel d’exception maîtrisant à la perfection élégance, confort et raffinement. </p>                           
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
</section>

<body>
    <div class="card" style='background: black; border-color :#5c9f24'> 
        <div class="container">
            <div class="recommandation" style="padding: 30px;">
                    <h1 class="text-center" style="color: white ;"> Disponible pour vous dans la boutique en ligne : </h1>
            </div>
                <div class="card" >                   
                    <?php
                        if (!empty($_SESSION["boutique_panier"])) {
                            $panier_compte = count(array_keys($_SESSION["boutique_panier"]));                             
                        } else {
                                $panier_compte = 0;
                        }
                    ?>    
                    <!--Logo Panier-->
                  
                    <div class="panier_div" style="padding: 30px ; ">
                        <div class="panier" style="padding-left: 1060px;">
                            <a href="panier.php"><img src="img/slide/cart-icon.png" alt=""> Panier<span><?php echo $panier_compte; ?></span></a>                                                
                        </div> 
                    </div>                                
                         
                    <?php                            
                        $resultat = mysqli_query($connect, "SELECT * FROM `produits`");

                        while ($row = mysqli_fetch_assoc($resultat)) {                            
                                echo "<div class='card' style='padding-top: 30px; '>
                                            <form action ='' method='post'>
                                                <input type='hidden' name ='PK_IdProduit' value =".$row['PK_IdProduit']."> 
                                                <div class='card-header' style='background: grey  ;'='NomProduit'>".$row['NomProduit']."</div>   
                                                <div class='card-header' style='padding: 20px ;'='image'><img src='img/slide/".$row['image']."' width='300px' height='300px' ></div>                                                   
                                                <div class='card-text' style='padding: 20px;'='InfoProduit'> ".$row['InfoProduit']."</div>
                                                <div class='card-header'style='padding-left: 20px;' ='PrixProduit'>Prix : ".$row['PrixProduit']." $ </div>
                                                
                                                <div style='padding-top: 20px; padding-left: 20px ;'>
                                                    <button type ='submit' style='background: #5c9f24; border-color :#5c9f24'>Ajouter au panier</button>
                                                </div>
                                            </form>     
                                        </div>";
                        } //input type 'hidden' permet de caché l'imput.. donc présent mais non vue pas l'utilisateur
                            mysqli_close($connect);
                    ?>              
                        
                <div style = "clear:both;"></div>   
                <div class="message_box" styles="margin = 10px">
                    <?php echo $status; ?>
                </div>  
            </div>
            </div>
        </div>
    </div>
</body>
