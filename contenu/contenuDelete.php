<?php
   //verifie si la variable existe
    if (isset($_SESSION["username"]) == 0) { 
      // authentification de l'utilisateur 
        require('config/authentification.php');   
      //redirection si pas authentifié
        if ($count==1) {         
            $_SESSION["username"] = $username;        
        } else {
            header("Location: /W34_TP2_2210116/index.php?erreur=1");
        }  
    }  

$id=0;

  // Attempt delete query execution
    if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
            
                //query SQL preparé
                $sql = "DELETE FROM produits WHERE  PK_IdProduit = ?";

                //bind la variable du param avec ID
                if ($stmt = mysqli_prepare($connect, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "i", $param_id);
                    
                    // Set parameters
                    $param_id = trim($_POST["id"]);
                    
                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Records deleted successfully. Redirect to landing page
                      
                       header("Location:/inventaire.php");
                    
                    } else {
                        echo "Quelque chose à mal été , recommencer plus tard";
                        
                    }
                }     
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($connect);
    } else {
    // Check existence of id parameter
        if (empty(trim($_GET["id"]))) {
            // URL doesn't contain id parameter. Redirect to error page
            echo "Oops! Something went wrong. Please try again later.";
            
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
    <div class="wrapper_delete">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3" style="color:green">Effacer</h2>
                    <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="alert alert-danger">

                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]);?>"/>
                            <p style="color: black">Êtes-vous certain de vouloir effacer cette destination ?</p>
                            <p>
                                <input type="submit" value="Oui" class="btn btn-danger">
                                <a href="inventaire.php" class="btn btn-secondary ml-2">Non</a> 
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
