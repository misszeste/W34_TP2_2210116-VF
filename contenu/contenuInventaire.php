<?php

   //verifie si la variable existe
   if(isset($_SESSION["username"]) == 0 ){ 
      // authentification de l'utilisateur 
      require('config/authentification.php');   
      //redirection si pas authentifié
      if($count==1){         
         $_SESSION["username"] = $username;        
      }else{
         header("Location: /W34_TP2_2210116/index.php?erreur=1");
      }  
   }  
   
   try {
    //code.
     $resultat = mysqli_query($connect, "SELECT * FROM `produits`");
   } catch (\Throwable $th) {
    //throw $th;

   }
    
?>
 <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
</script>
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

           
<body class="inventaire" style="color:green ; text-align:center">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Destinations</h2>
                            <a href="create.php" class="btn btn-outline-success pull-right"  style="color:white ;"><i class="fa fa-user-plus" aria-hidden="true" ></i> Ajouter</a>
                        </div>
                        <?php
                        
                            $resultat = mysqli_query($connect,"SELECT * FROM `produits`");

                            while($row = mysqli_fetch_assoc($resultat)){                           
                              
                                    echo '<table class="table table-bordered table-striped"  style="color:green ;">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th><b>Id</b></th>";
                                                echo "<th><b>Destination</b></th>";
                                                echo "<th><b>Description</b></th>";
                                                echo "<th>Image</th>";
                                                echo "<th>Durée</th>";
                                                echo "<th>Prix</th>";
                                                echo "<th>Quantité</th>";
                                                echo "<th>Action</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody class='donné' style='color:white;'>";                                      
                                                echo "<tr style='color:white; height: 20px ;'>";                                            
                                                    echo "<td style='color:white;' width: 10px ;'>" . $row['PK_IdProduit'] . "</td>";
                                                    echo "<td style='color:white; width: 10px ;'>" . $row['NomProduit'] . "</td>";
                                                    echo "<td style='color:white;width: 900px ; '>" . substr($row['InfoProduit'],0,150) . "...</td>";
                                                    echo "<td style='color:white; width: 100px ;'>" . $row['image'] . "</td>";
                                                    echo "<td style='color:white; width: 100px;'>" . $row['TempsProduit'] . " Jours </td>";
                                                    echo "<td style='color:white; width:100px;'>" . $row['PrixProduit'] . " $ </td>";
                                                    echo "<td style='color:white; width: 15px ;'>" .$row['QteProduit'] . "</th>";
                                                    //non ajouté dans la BD MANQUE DE TEMPS
                                                    //  echo "<th style='color:white;'>" .$row['Fk_IdCategorie'] . "</th>";

                                                    echo "<td width: 50px;>";                                                        
                                                        echo '<a href="update.php?id='. $row['PK_IdProduit'] .'" class="mr-3" title="Éditer" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; //editer (update)
                                                        echo '<a href="delete.php?id='. $row['PK_IdProduit'] .'" title="Effacer" data-toggle="tooltip"><span class="fa fa-trash"></span></a>'; //effacer (delete)
                                                    echo "</td>";
                                                echo "</tr>";    
                                             }
                                        echo "</tbody>";
                                    echo "</table>";
                                    // //libère le dataset dans resultat
                                     unset($resultat);
                            //  } else {
                            //     echo "<div class='alert alert-danger'><em>Aucun employé trouvé!</em></div>";
                            //  }else{
                            //      echo "Oops! Un problème est survenu! Svp réessayer plus tard!";
                            //  }
                            // //fermer la connexion
                            mysqli_close($connect);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>   
</body>
