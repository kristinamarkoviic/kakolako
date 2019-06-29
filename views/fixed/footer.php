<div class="footer">
   		

        <!-- Footer bottom -->
        <div class="footerbottom">
        	<div class="row">
            	<div class="medium-6 small-12 columns">
                	<ul class="menu">
                    <?php
                            
                            $navigacija=dohvati_meni();
                            foreach($navigacija as $nav):
                        ?>
                        <li><a href='<?=$nav->putanja ?>'><?=$nav->text ?></a></li>
                            <?php endforeach; ?>
                        
                        <?php
                           if(isset($_SESSION['user'])){
                        ?>
                           <li><a class="selling" href="index.php?page=oglas">Dodaj oglas</a></li>
                           
                        <?php }
                        ?>   
                	</ul>
                    <div class="clearfix"></div>
                    <div class="copyrightinfo">2019 © <a href="index.php?page=autor">Kristina Marković 185/17</a> All Rights Reserved.</div>
                </div><!--left side-->
                <!--Right Side-->
            </div>
        </div><!-- footer Bottom -->
   </div>
	   <!-- Footer Ends here -->

	</div>
    <!-- MAIN Container Ends here. -->
	<a href="#top" id="top" class="animated fadeInUp start-anim"><i class="fa fa-angle-up"></i></a>
	<!-- Page Preloader -->
    <div class="preloader">
        <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div>
	</div>

    <!-- Including Jquery so All js Can run -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

   	<!-- Including Foundation JS so Foundation function can work. -->
    <!-- <script type="text/javascript" src="assets/js/foundation.min.js"></script> -->
   	<!-- Crousel JS -->
   <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <!-- jQuery Timer plugin delete if not using -->
    <script src="assets/js/jquery.simple.timer.js"></script>

	<!-- Revolution Slider Files delete if not using slider -->
	<script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>


    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
        (Load Extensions only on Local File Systems !
        The following part can be removed on Server for On Demand Loading) -->
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.actions.min.js"></script> -->
    <script type="text/javascript" src="assets/js/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/revolution.extension.kenburn.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.layeranimation.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.migration.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.navigation.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.parallax.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="assets/js/revolution.extension.video.min.js"></script> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   <!-- Revolution Slider Files Ends Delete if not using slider. -->

   <!-- Webful JS -->
   <script src="assets/js/webful.js"></script>
   <script src="assets/js/main.js"></script>

</body>

</html>









