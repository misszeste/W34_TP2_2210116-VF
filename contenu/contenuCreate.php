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

   // Define variables and initialize with empty values
   $nomproduit= $infoproduit=$tempsproduit ="";
   $prixproduit=$qteproduit= 0;
   $name_err= $info_err=$prix_err= $temps_err= $qte_err ="";

   // Processing form data when form is submitted
   if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate NomProduit
        $input_name = trim($_POST["NomProduit"]);
        if(empty($input_name)){
            $name_err = "SVP entre un nom de categorie.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Svp entre un nom valide.";
        } else{
            $nomproduit = $input_name;
        }

         // Validate InfoProduit
        $input_info = trim($_POST["InfoProduit"]);
        if(empty($input_info)){
            $info_err = "Svp entre un info.";     
        } else{
            $infoproduit = $input_info;
        }

         // Validate PrixProduit
            $input_prix = trim($_POST["PrixProduit"]);
        if(empty($input_prix)){
            $prix_err = "Svp entre un prix.";     
        } else{
            $prixproduit = $input_prix;
        }

        // Validate TempsProduit
        $input_temps = trim($_POST["TempsProduit"]);
        if(empty($input_temps)){
            $temps_err = "Svp entre une durée en jours.";     
        } else{
            $tempsproduit = $input_temps;
        }
        
        // Validate QteProduit
        $input_qte = trim($_POST["QteProduit"]);
        if(empty($input_qte)){
            $qte_err = "Svp entre une qte.";     
        } else{
            $qteproduit = $input_qte;
        }

         // Check input errors before inserting in database
            if(empty($name_err) && empty($info_err) && empty($prix_err) && empty($temps_err) && empty($qte_err)){
            // Prepare an insert statement
                $sql = "INSERT INTO  produits (NomProduit,InfoProduit,PrixProduit,TempsProduit,QteProduit) VALUES (?,?,?,?,?)"; 

                if($stmt = mysqli_prepare($connect, $sql)){
                
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt,"ssiii",$parram_nomproduit, $parram_infoproduit, $parram_prixproduit,$parram_tempsproduit,$parram_qteproduit);

                    /* Set the parameters values */
                    $parram_nomproduit = $nomproduit;
                    $parram_infoproduit = $infoproduit;
                    $parram_prixproduit = $prixproduit;
                    $parram_tempsproduit = $tempsproduit;
                    $parram_qteproduit = $qteproduit;

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){                
                    
                        // Records created successfully. Redirect to landing page
                        header("Location: inventaire.php");
                    

                    } else{
                        echo "Quelque chose à mal été , recommencer plus tard";
                        
                    }

                    
            // Close statement
            mysqli_stmt_close($stmt);

            // Close connection
            mysqli_close($connect);
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
<style>
            table tr td:last-child{
                width: 120px;
            }       
</style>
<body>
    <div class="wrapper_create">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5" style="color:white">Ajouter une destination</h1>
                    <p></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group"  style="color:white">
                        <label  style="color:white"><b>Nom de la destination</b></label>                        
                            <input type="text" name="NomProduit" class="form-control" <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?> value="<?php echo $nomproduit; ?>"> 
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group"  style="color:white">
                            <label><b>Description</b></label>
                            <textarea name="InfoProduit" class="form-control" ><?php echo (!empty($info_err)) ? 'is-invalid' : ''; ?><?php echo $infoproduit;?></textarea>
                            <span class="invalid-feedback"><?php echo $info_err;?>
                        </div>

                        <div class="form-group"  style="color:white">
                            <label><b>Prix</b></label>
                                <input type="text" name="PrixProduit" class="form-control " <?php echo (!empty($prix_err)) ? 'is-invalid' : ''; ?> value="<?php echo $prixproduit; ?>">
                                <span class="invalid-feedback"><?php echo $prix_err;?></span> 
                        </div>
                        
                        <div class="form-group"  style="color:white">
                        <label><b>Durée</b></label>
                            <input type="text" name="TempsProduit" class="form-control " <?php echo (!empty($temps_err)) ? 'is-invalid' : ''; ?> value="<?php echo $tempsproduit; ?>">
                            <span class="invalid-feedback"><?php echo $temps_err;?></span> 
                        </div>

                        <div class="form-group"  style="color:white">
                        <label><b>Quantité</b></label>
                            <input type="text" name="QteProduit" class="form-control " <?php echo (!empty($qte_err)) ? 'is-invalid' : ''; ?> value="<?php echo $qteproduit; ?>">
                            <span class="invalid-feedback"><?php echo $qte_err;?></span> 
                        </div>

                        <input type="submit" class="btn btn-outline-success pull-right" value="Ajouter">
                        <a href="inventaire.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>        
</body>