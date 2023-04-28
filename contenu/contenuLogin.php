<?php

// // // define variables and set to empty values
// $floatingInput = $floatingPassword = "";

// //Condition dans laquel la fonction test_imput va etre utilisé

//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $floatingInput = test_input($_POST["floatingInput"]);
//    $floatingPassword = test_input($_POST["floatingPassword"]);
//   }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
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

    
    
<div class="bodyLogin">
    <div id = "frmLogin"  style="text-align:center">
        <div class="tagName" style="padding-bottom: 50px;">
            <h1 style="color:#74c92d">Connexion</h1>
            <h5>Pour faire un achât en ligne ou avoir accès à la zone privilège veuillez-vous connecter !</h5>
        </div>      
        <form name = "f1" action = "membre.php" onsubmit = "return validation()" method = "POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="floatingInput" placeholder="Nom d'utilisateur">
                <label style="color:black" for="floatingInput">Nom d'utilisateur</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" placeholder="Password">
                <label style="color:black" for="floatingPassword">Mot de passe</label>   
            </div>
            <div class="btnConnect" style="margin-top: 100px">
                <input style="background: #5c9f24; border-color :#5c9f24" type="submit" class="btn btn-primary btn-lg">
            </div>         
        </form>
    </div>
    
    <script>        
        function validation()
        {
            var id = document.f1.floatingInput.value;
            var ps = document.f1.floatingPassword.value;

            if(id.length == "" &&  ps.length == "")
            {
                alert("Les champs Utilisateur et Mot de passe sont obligatoires");
                return false;
            }                    
            else
            {
                if(id.length == "")
                {
                    alert("Le champs Utilisateur est obligatoire");
                    return false;
                }
                if(ps.length == "")
                {
                    alert("Le champs Mot de passe est obligatoire");
                    return false;
                }
            }        
        }
    </script> 
</div>
        