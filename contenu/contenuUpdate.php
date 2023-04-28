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
    $prixproduit=$qteproduit=$PK_IdProduit= 0;
    $name_err= $info_err=$prix_err= $temps_err= $qte_err ="";

    // Processing form data when form is submitted

    if(isset($_POST["PK_IdProduit"]) && !empty($_POST["PK_IdProduit"])){   
 
        $PK_IdProduit = $_POST["PK_IdProduit"];

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
                $sql = "UPDATE produits SET  NomProduit=?, InfoProduit=?, PrixProduit=?, TempsProduit=?, QteProduit=? where PK_IdProduit = ?"; 

                if($stmt = mysqli_prepare($connect, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt,"ssiiii",$parram_nomproduit, $parram_infoproduit, $parram_prixproduit, $parram_tempsproduit, $parram_qteproduit,$parram_id);

                        /* Set the parameters values */
                        $parram_nomproduit = $nomproduit;
                        $parram_infoproduit = $infoproduit;
                        $parram_prixproduit = $prixproduit;
                        $parram_tempsproduit = $tempsproduit;
                        $parram_qteproduit = $qteproduit;
                        $parram_id = $_POST["PK_IdProduit"];
                        

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){

                            // Records created successfully. Redirect to landing page
                            header("Location: inventaire.php");
                            
                        } else{
                            echo "Quelque chose à mal été , recommencer plus tard";
                        }
                    
                        
                }

                    // Close statement
                    mysqli_stmt_close($stmt);


            }
               // Close connection
                mysqli_close($connect);           
        }

    }else{
        
                // Check existence of id parameter before processing further
                if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

                // Get URL parameter
                $id =  trim($_GET["id"]);
            
            // Prepare a select statement
            $sql = "SELECT * FROM produits WHERE PK_IdProduit = ?";
            if($stmt = mysqli_prepare($connect, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                // Set parameters
                $param_id = $id;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
        
                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array. Since the result set
                        contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        // Retrieve individual field value
                    $nomproduit= $row["NomProduit"];
                    $infoproduit= $row["InfoProduit"];
                    $prixproduit= $row["PrixProduit"];
                    $tempsproduit = $row["TempsProduit"];
                    $qteproduit= $row["QteProduit"];

                        
                    } else{
                        // URL doesn't contain valid id. Redirect to error page
                        header("location: erreur.php");
                        exit();
                    }
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($connect);
        }  else{
            // URL doesn't contain id parameter. Redirect to error page
            header("location: erreur.php");
            exit();
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"  style="color:white">
                    <h1 class="mt-5" style="color:white">Mettre à jour une destination: </h1>
                    <p></p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label><b>Nom de la destination</b></label>
                            <input type="text" name="NomProduit" class="form-control" <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?> value="<?php echo $nomproduit; ?>">
                                <span class="invalid-feedback"><?php echo $name_err;?>
                        </div>

                        <div class="form-group">
                            <label><b>Description</b></label>
                            <input type="text" name="InfoProduit" class="form-control <?php echo (!empty($info_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $infoproduit; ?>">
                                <span class="invalid-feedback"><?php echo $info_err;?></span> 
                        </div>

                        <div class="form-group">
                            <label><b>Durée</b></label>
                            <textarea name="TempsProduit" class="form-control " <?php echo (!empty($temps_err)) ? 'is-invalid' : ''; ?> value="<?php echo $tempsproduit; ?>"><?php echo $tempsproduit; ?></textarea>
                            <span class="invalid-feedback"><?php echo $temps_err;?>
                        </div>

                        <div class="form-group">
                            <label><b>Prix</b></label>
                            <input type="text" name="PrixProduit" class="form-control " <?php echo (!empty($prix_err)) ? 'is-invalid' : ''; ?> value="<?php echo $prixproduit; ?>">
                            <span class="invalid-feedback"><?php echo $prix_err;?>
                        </div>

                        <div class="form-group">
                            <label><b>Quantité disponible</b></label>
                            <input type="text" name="QteProduit" class="form-control <?php echo (!empty($qte_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $qteproduit; ?>">
                            <span class="invalid-feedback"><?php echo $qte_err;?>
                        </div>
                            <input type="hidden" name="PK_IdProduit" value="<?php echo $id; ?>";/>
                        <input type="submit" class="btn btn-outline-success pull-right" value="Envoyer">
                        <a href="inventaire.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>