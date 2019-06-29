<!-- Banner Section Starts -->
<div class="banner row module">
        	
            <!-- Categories -->
            <div class="medium-3 small-12 columns no-pad-left hide-for-small-only">
            	<div class="widget categories">
                	<h2>kategorije</h2>
                    
                    <nav class="widget-content" >
                    	<ul class="menu dropdown vertical" id="kategorije" data-responsive-menu="accordion medium-dropdown">
                        <?php
                            include "models/kategorije/functions.php";
                            $kategorije=dohvati_kategorije();
                            foreach($kategorije as $kat):
                        ?>
                        <li><a href="#" class="kat" data-idKat='<?=$kat->idKategorija ?>'><i class="<?=$kat->ikonica ?>" aria-hidden="true"></i><?=$kat->naziv ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav><!-- widget-content /-->
                    
                </div><!-- widget /-->
            </div>
            <!-- Categories -->
            
            <!-- Main slider -->
    <div class="medium-9 small-12 columns main-slider no-pad-right">
            
            <!-- <div id="slajder">

            </div> -->
            <div class="whats-new row module">
        	<div class="big-section-title">
            	<h2><span>Najnoviji oglasi</span></h2>
            </div><!-- big Section title ends.-->
            
            <div class="new-content">
            	
                                
                <div class="tabs-content" data-tabs-content="new-items">
            	
                    <div class="tabs-panel is-active" id="panel1">
    		            <div class="small-12 columns">
                            <div class="featured-area">
                                <div class="section-title">
                                    
                                </div><!-- section title /-->
                                
                                <div class="content-section new-items-wrap" id="oglasiHome">
                                <!-- // <img src="assets/images/help/productm4-2.jpg" alt="" /> -->
                                <?php
                                    include "models/oglasi/functions.php";
                                    $oglasi=sve_home();
                                    foreach($oglasi as $og):
                                ?> 
                                <div class="medium-3 small-12 columns product">
                                    <div class="product-image">
                                        
                                        <a href="index.php?page=jedan_oglas&id=<?=$og->idOglas?>">
                                            <img src="<?=$og->putanja_oglas_slika?>" alt="" />
                                            
                                        </a>
                                        
                                        
                                            
                                    </div><!-- Product Image /-->
                                    <div class="product-title">
                                        <a href="index.php?page=jedan_oglas&id=<?=$og->idOglas?>"><?=$og->naziv?></a>
                                    </div><!-- product title /-->	
                                    <div class="product-meta">
                                        <div class="prices">
                                            <span class="price"><?=$og->cena?>RSD</span>
                                            
                                        </div>
                                        <div class="last-row">    
                                            <div class="pro-rating float-left">
                                                <i><?php echo date("d.m.Y.", strtotime($og->datum ))?></i>
                                            </div>
                                            <div class="store float-right">
                                                <?=$og->username?>
                                            </div>
                                        </div><!-- last row /-->
                                        <div class="clearfix"></div>
                                    </div><!-- product meta /-->
                                </div><!-- Product /-->
                                
                                
                            
        
        
                                <?php endforeach; ?>       
                            </div><!-- Featured Area /-->                
                        </div><!-- Featured Items /-->
	                </div><!-- tab panel ends /-->
                    
                   
                                            <div class="clearfix"></div>
                                        </div><!-- product meta /-->
                                    </div><!-- Product /-->
                                    
                                    <div class="clearfix"></div>
                                </div><!-- Content Section /-->
                                
                            </div><!-- Featured Area /-->                
                        </div><!-- Featured Items /-->
	                </div><!-- tab panel ends /-->
                    
                </div><!-- tabs content ends /-->
                
            </div><!-- New content /-->
            
        </div>
            
            
            
        </div>
            
        </div><!-- Main Slider /-->
        
    </div>
    <!-- Banner Section Ends /-->





    