
<div id="okvir">
    
    <div id="korisnikDesno">
        
        <div class="store-content">
                <div class="row">
                    
                    <!-- store sidebar -->
                    <div class="sidebar store-sidebar  small-12 columns">
                        
                        
                        
                        
                        <!-- widget /-->
                        
                        
                        
                        <div class="widget">
                            <h2>Moji oglasi</h2>
                            <div id="gore">
                            <p>Dodajte novi oglas  <a href="index.php?page=oglas" class="aDodaj">Dodaj oglas</a></p>
                            </div>
                              
                            <div class="widget-content" id="oglasi">
                            
                            




                                
                                
                                
                                
                                
                                
                                 
                                 
                                 
                                
                            </div><!-- widget content /-->
                        </div><!-- widget /-->
                        
                        
                    </div>
                </div>
                </div>
    </div>
    <div id="korisnikLevo">
    
    <div class="store-content">
                <div class="row">
                    
                    <!-- store sidebar -->
                    <div class="sidebar store-sidebar  small-12 columns">
                        
                        
                        
                        
                        <!-- widget /-->
                        
                        
                        
                        <div class="widget">
                            <h2>Moj profil</h2>
                            <div class="widget-content">
                                
                                <div class="popular-product">
                                    
                                    
                                        <p class="bold">Ime i prezime:</br>  <?=$_SESSION['user']->username ?></p>
                                        <p class="bold">Email adresa:</br> <?=$_SESSION['user']->email ?></p>
                                        </br><a class="aPoruka" href="index.php?page=inbox">PORUKE</a>
                                        

                                   
                                    <div class="clearfix"></div>
                                 </div><!-- popular product /-->
                                <?php
                                    
                                      
                                ?>
                                
                                <div class="card-body table-responsive">

                                <img id="slikaOglas" alt="" src="" class="float-left thumbnail" />
                                <form action="models/slike/insert.php" method="POST" enctype="multipart/form-data">

                                    <p style="color: #9e9e9e;font-size: 12px;font-weight:400;"></p>
                                    <input type="hidden" name="skriveno" id="skriveno" value="" />
                                    <div class="input-field">
                                    <button type="button" onclick="document.getElementById('profilePhoto').click()" class="btn btn-info">Dodaj novu sliku</button>
                                    <span id="profilePhotoValue"></span>

                                    <input type="file" name="slika" id="profilePhoto" style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                                    </div>

                                    <div>
                                        <input type="submit" value="Sačuvaj" name="btnSacuvaj" class="input-field2"/>
                                    </div>   
                                    
                                </form>

                                </div>
                                  
                            </div><!-- widget content /-->
                        </div><!-- widget /-->
                        
                        
                    </div>
                </div>
                </div>
    </div>
</div>