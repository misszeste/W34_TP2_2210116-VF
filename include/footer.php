<?php 
    $validUser = "<a class='getstarted scrollto' href='login.php'>Se connecter";  
    if (isset($_SESSION["username"])== 1) {   
      
         if ($_SESSION["username"]!== "") {  
             $validUser = "<a class='getstarted scrollto' href='config/deconnection.php'>Se déconnecter";
             echo "     <script>             
                            document.getElementById('membre').style = 'block';
                            document.getElementById('gestion').style = 'block';
                            document.getElementById('panier').style = 'block';
                        </script>";
         }
    }
    echo "  <script>
                document.getElementById('liboutonconnecter').innerHTML = \"" . $validUser . "\";                
            </script>";
?>

<!-- ======= Footer ======= -->
    <footer id="footer">    
        <div class="footer-top">   
        </div>

        <div class="container">
            <div class="copyright">
                <div class="container">
                    &copy; Copyright  <?php echo date('Y'); ?><strong><span> TPW34</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
                    Designed by <a href="index.php">Jessika </a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="scripts.js"></script>

        <?php
        //affichage du username si username n'est pas vide
            if (isset($_SESSION["username"]) == 1) {            
                if ($_SESSION["username"]!== "") {
                    echo "<script> document.getElementById('usertag').innerHTML = 'Bienvenue ". $_SESSION["username"]." '; </script>";
                }          
            }        
        ?>       
        
      
    </body>
</html>
