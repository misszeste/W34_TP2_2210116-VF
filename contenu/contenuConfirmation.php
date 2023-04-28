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
               'PrixProduit'=>$prix ,
               'QteProduit'=> $qte,
               'FK_IdCategorie'=>$categorie                     
           )
       );//validation 
   }
?>
<!-- ======= Hero Section ======= -->
<section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Voyagez avec nous!</h2>
                            <p class="animate__animated animate__fadeInUp">Obtenez 800 $ de rabais par couple sur les circuits + protection de voyage gratuite en devenant membre.</p>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(img/slide/slide-2.jpg);">          
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Réservez tôt</h2>
                            <p class="animate__animated animate__fadeInUp">Réservez votre voyage de l’année prochaine dès maintenant et économisez sur les forfaits vers vos pays favoris.</p>               
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(img/slide/slide-3.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Consulter nos forfaits</h2>
                            <p class="animate__animated animate__fadeInUp">Profitez des avantages membres, économisez jusqu’à 300 $ par couple sur les forfaits Vols et Croisière . </p>
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

    <body>
      <div class="container mt-5 mb-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8">
               <div class="card">          
                  <div class="invoice p-5">
                     <h4>Agence les Trotteux !</h4>
                     <span class="font-weight-bold d-block mt-4">Bonjour , <?php echo $_SESSION["username"]?></span>
                     <span>Votre achat à été confirmé ! <br>
                        Vous recevrez bientôt un courriel avec vos documents officiels!</span>
                     <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                           <th>
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="py-2">
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
                     }                     
                  ?>
                  <?php foreach ($_SESSION["boutique_panier"] as $produits) ?>

                                          <span class="d-block text-muted">Date de commande</span>
                                          <!-- Non traité dans la BD table cmd MANQUE DE TEMPS -->
                                          <span> <?php echo date("F d, Y h:i:s ") . "<br>";?></span> 
                                       </div>
                                    </td>
                                    <td>
                                       <div class="py-2">
                                          <span class="d-block text-muted">No commande</span>
                                             <!-- Non traité dans la BD table cmd MANQUE DE TEMPS -->
                                          <span> 1 </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="py-2">
                                          <span class="d-block text-muted">Paiment</span>
                                          <!-- Inserer MASTERCARD image ici -->                                        
                                          <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" alt=""/></span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="py-2">
                                          <span class="d-block text-muted">Adresse de livraison</span>
                                             <!-- Non traité dans la BD table utilisateur MANQUE DE TEMPS/ courriel manquant aussi  -->
                                          <span> 32 rue de la lenteur Sorel J3R 1S4 QC CA </span>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </th>
                        </table>
                     </div>
                     <!-- boucle foreach ici , ajouté les produit avec les variables -->
                     <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                           <tbody>                      
                              <tr>
                                 <td width="20%">
                                 <!-- ajouter variable photo ici -->
                                    <img src="img/slide/<?php echo $produits['image']; ?>" width="70" alt="">
                                 </td>
                                 <td width="60%">
                                 <!-- Ajouter nom produit ici -->
                                    <span class="font-weight-bold"><?php echo $produits['NomProduit']; ?></span>
                                    <div class="product-qty"> 
                                       <p>Quantité: <?php echo $produits['QteProduit']; ?></p>                                   
                                                                          
                                    </div>
                                 </td>
                                 <td width="20%">
                                    <div class="text-right">
                                    <!-- ajouter prix du produit ici -->
                                       <span class="font-weight-bold"><?php echo  $produits['PrixProduit']."$"; ?></span>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                           <table class="table table-borderless">
                              <tbody class="totals">
                                 
                                 <tr class="border-top border-bottom">
                                    <td>
                                       <div class="text-left">
                                       
                                       </div>
                                    </td>
                                    <td>
                                       <div class="text-right">
                                             <!-- ajouter variable prix totale-->
                                          <span class="font-weight-bold">Total: <?php echo  ($produits['PrixProduit'] * $produits['QteProduit'])."$"; ?></span> 
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>               
                     <p class="font-weight-bold mb-0">Merci de magaziner chez nous!</p>
                     <span>L'Équipe Les Trotteux vous souhaite bon voyage </span>
                  </div>
                  <div class="d-flex justify-content-between footer p-3">               
                     <span> <?php echo date("Y-m-d")?></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   