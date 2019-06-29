
<div class="single-product-detail module">
            	<div class="row">
                    <?php 
                        
                        include "models/oglasi/functions.php";
                        $oglasi=single_oglas($_GET['id']);
                        if($oglasi==null){
                            header("Location: index.php?page=oglasi");
                        }
                    
                    ?>
                	
                    <div class="medium-5 small-12 columns item-image">
                    	<div class="main-image">
                        	<img src="<?=$oglasi->putanja_originalna_slika ?>" alt="<?=$oglasi->naziv ?>" />
                        </div>
                        
                    </div><!-- Item Image /-->
                    
                    <div class="medium-7 small-12 columns item-detail">
                    	<div class="item-header">
	                        <h1><?=$oglasi->naziv ?></h1>
                            <div class="item-meta">
                            	<div class="pro-rating">
                            		
                        			Datum:<span>&nbsp;&nbsp;&nbsp;&nbsp;<?= date("d.m.Y",strtotime($oglasi->datum));?></span>
                                    <div class="socialicons float-right">
                                        <a href="#" title="Share on Facebook"><i class="fab fa-facebook"></i></a>
                                        <a href="#" title="Share on Twitter"><i class="fab fa-instagram"></i></a>
                                        <a href="#" title="Share on Google plus"><i class="fab fa-google"></i></a>
                        			</div><!-- social icons /-->
                        		</div>
                            </div><!-- item meta /-->
                        </div><!-- item header /-->
                        
                        <div class="item-pricing">
                        	<p><span class="row-title">Prodavac:</span><span><?=$oglasi->username ?></span></p>
                            <p><span class="row-title">Kategorija:</span><span>&nbsp;&nbsp; <i class="<?=$oglasi->ikonica ?>"></i>&nbsp;&nbsp;<?=$oglasi->kategorija ?>&nbsp;&nbsp; </span></p>
                            
                            <div><span class="row-title">Cena:</span><span><span class="regular-price"><?=$oglasi->cena ?> RSD</span>
                            	
                            
                            	
                            </div>
                            
                        </div><!-- item head /-->
                        
                        
                        
                        <div class="item-quantity">
                        	
                            <div><span class="row-title">Opis:</span> <span><?=$oglasi->opis ?></span></div>
                        </div>
                        
                        <!-- Item Quantity /-->
                        <div id="dodavanjeKomentara">

                        <h5 id="porukaProdavac">Pošalji poruku prodavcu</h5>
                            <form action="models/oglasi/poruke.php" method="post">
                            <input type="hidden" id="hidn1" name="hidn1" value="<?=$oglasi->idOglas ?>" />
                            <input type="hidden" id="hidn2" name="hidn2" value="<?=$_SESSION['user_id'] ?>" />
                           
                            <div class="form-group">
                            <label class="lbKontakt" for="komentar">Poruka</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="5" cols="40" placeholder='Ostavi poruku'></textarea>
                        
                            </div>
                            
                           
                            <div class="form-group">
                            <button type="button" name="btnKomentar" id="btnKomentar">Pošalji</button>
                            </div>
                            

                            </form>
                        </div>
                        
                        
                    </div><!-- item detail /-->
                    
                </div><!-- row /-->
</div> <!--JEDAN PROIZVOD -->


