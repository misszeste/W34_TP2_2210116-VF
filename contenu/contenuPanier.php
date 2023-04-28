<?php

     //verifie si la variable existe
     if (isset($_SESSION["username"]) == 0) { 
         // authentification de l'utilisateur 
         require('config/authentification.php');   
         //redirection si pas authentifié
         if ($count==1) {         
             $_SESSION["username"] = $username;        
         } else {
            header("Location: /W34_TP2_2210116-VF/index.php?erreur=1");
         }  
     }              
    
   

    $status=""; // va nous permettre de gerer nos erreurs

    //action retirer sur un produits du panier
    if (isset($_POST ['action']) && $_POST['action'] == "retirer") {
        if (!empty($_SESSION['boutique_panier'])) {
            foreach ($_SESSION['boutique_panier'] as $key => $value) {
                if ($_POST["PK_IdProduit"] == $key) {
                    unset($_SESSION['boutique_panier'][$key]);// retire le produit de la sessions
                    $status = "<div class='box' style='color:red;'>Le produit à été retiré du panier!<div>";// msg pour $status
                 }
                if (empty($_SESSION['boutique_panier'])) {
                    unset($_SESSION['boutique_panier']);
                    $statut ="";
                }
            }            
        }
    }

    //action changer sur un produits du panier
    if (isset($_POST['action']) && $_POST['action']=="changer") {
        foreach ($_SESSION['boutique_panier'] as &$value) {
            if ($value['PK_IdProduit'] === $_POST['PK_IdProduit']) {
                $value['QteProduit'] = $_POST['QteProduit'];
                break; // arreter la boucle lorsqu'on trouve le produits
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
</section><!-- End Hero -->
<body class="Panier">

        <div style="width:1300px; padding-left:300px; padding-top:20px; color:white;">
            <h2>Votre panier</h2>

            <?php
                if (!empty($_SESSION['boutique_panier'])) {
                    $panier_compte = count(array_keys($_SESSION['boutique_panier']));
            ?>   
                    <div class="panier_div">
                        <a href=""></a>  
                    </div>
            <?php
                }
            ?>
            <div class="panier">
                <?php
                    if (isset($_SESSION['boutique_panier'])) {
                        $prix_total = 0;                        
                ?>

                    <table class="table" style="color:white;">
                        <th>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>Nom</td>                               
                                    <td>Quantité</td>
                                    <td>Prix unitaire</td>
                                    <td>Prix</td>   
                                    
                                </tr>
                                <?php foreach ($_SESSION["boutique_panier"] as $produits) {?>
                                    <tr>
                                        <td><img src= "img/slide/<?php echo $produits['image']; ?>" width="50" height="40" alt=""/></td>
                                        <td><?php echo $produits['NomProduit']; ?><br>
                                            <form method="post" action="">
                                                <input type="hidden" name="PK_IdProduit" value="<?php echo $produits['PK_IdProduit']; ?>">
                                                <input type="hidden" name="action" value="retirer">
                                                <button type="submit" class="retirer"> Retirer du panier </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method ="post" action="">
                                                <input type="hidden" name="PK_IdProduit" value="<?php echo $produits['PK_IdProduit']; ?>">
                                                <input type="hidden" name="action" value="changer">
                                                <select name="QteProduit" class="QteProduit" onchange="this.form.submit()">
                                                    <option <?php if ($produits['QteProduit']==1) echo "Selected";?> value="1">1</option>
                                                    <option <?php if ($produits['QteProduit']==2) echo "Selected";?> value="2">2</option> 
                                                    <option <?php if ($produits['QteProduit']==3) echo "Selected";?> value="3">3</option>
                                                    <option <?php if ($produits['QteProduit']==4) echo "Selected";?> value="4">4</option>
                                                    <option <?php if ($produits['QteProduit']==5) echo "Selected";?> value="5">5</option>
                                                </select>
                                            </form>
                                        </td>
                                        
                                        <td>
                                            <?php echo  $produits['PrixProduit']."$"; ?>
                                        </td>

                                        <td>
                                            <?php echo  ($produits['PrixProduit'] * $produits['QteProduit'])."$"; ?>
                                        </td>
                                    </tr>                        
                                <?php
                                        $prix_total += ($produits['PrixProduit'] * $produits['QteProduit']);
                                    }
                                ?>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <strong>
                                                Total: <?php echo $prix_total. "$";?>
                                            </strong>
                                        </td>
                                    </tr>
                            </tbody>
                        </th>                   
                    </table>

                    <?php
                        } else {
                            echo "<h3> Votre panier est vide !</h3>";
                        }
                    ?>
                </div>

            
                    <div style = "clear:both;"></div>   
                    <div class="message_box" style="margin: 10px 0px;">
                            <?php echo $status; ?>
                    </div>  
                    <div></div>
                    <div></div>
                    <div class="btnAchat" style="padding: 20px; padding: left 1000px;">
                        <a href="confirmation.php" class="btn btn-primary"  style="background: #5c9f24; border-color :#5c9f24"> Achetez-moi!</a>
                    </div>
            </div>        
    </body>







