
<body>
	<!-- MAIN Container Start here. -->
	<div class="container">
        
        <!-- Top Bar Starts Here -->
        <div class="top-info-bar">
        	<div class="row">
            
            	<div class="medium-6 small-12 columns">
                	<ul class="menu">
                        <?php
                            include "models/navigacija/functions.php";
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
                </div><!-- Left Ends /-->
                <div class="medium-6 small-12 columns hide-for-small-only">
                	<ul class="menu dropdown float-right">
                    <?php
                        if(isset($_SESSION['user'])){
                           if($_SESSION['user']->idUloga == 2){
                        ?>
                           
                           
                           <li id="logout"><a href='models/korisnici/logout.php'>
                           <span class="fas fa-sign-out-alt" aria-hidden="true">
                           </span>
                           </a></li>
                           <li id="moja_strana"><a href="index.php?page=korisnik">Moja strana</a></li>
                           
                        <?php } }
                        ?> 
                    <?php
                        if(isset($_SESSION['user'])){
                           if($_SESSION['user']->idUloga == 1){
                        ?>
                           
                           
                           <li id="logout"><a href='models/korisnici/logout.php'>
                           <span class="fas fa-sign-out-alt" aria-hidden="true">
                           </span>
                           </a></li>
                           <li id="moja_strana"><a href="index.php?page=adminKorisnik">Admin Panel</a></li>
                           
                        <?php } }
                        ?> 
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                    
                    <li><a class="reg" href="index.php?page=registrovanje" class="sign-in special-margin">Postani član</a></li>
                    <?php }
                    ?>
                    
                    
                    <?php 
                    if(!isset($_SESSION['user'])){
                    ?>
                    <li><a class="log" href="index.php?page=registrovanje" class="special-margin">Uloguj se</a></li>
                    <?php }
                    ?>
                    </ul>
                </div>
                <!-- <div class="medium-6 small-12 columns hide-for-small-only">
                    <a class="selling" href="start-selling.html">Start Selling</a>
                </div> -->
               
                
            </div><!-- row /-->
        </div>
        
        
        <!-- Header Starts -->
       