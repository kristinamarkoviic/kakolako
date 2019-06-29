<div class="store-content">
                <div class="row">
                    
                    <!-- store sidebar -->
                    <div class="sidebar store-sidebar medium-3 small-12 columns">
                        
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
                    <!-- store sidebar Ends /-->
                    
                    <!-- Store Content -->
                    <div class="medium-9 small-12 columns store-content">
                        <div class="product-filter">
                            
        
                            <div class="medium-4 small-7 columns byview">
                                <div class="float-center">
                                <em>Gradovi:</em>
                                
                                <select class="form-control" id="ddlGradoviO" name="ddlGradoviO">
                                    <option value="0">Izaberi</option>
                                    <?php 
                                    include "models/gradovi/functions.php";
                                    $gradovi=sviGradovi();
                                    var_dump($gradovi);
                                    foreach($gradovi as $grad):
                                    ?>
                                    <option value="<?=$grad->idGrad ?>"><?=$grad->naziv?></option>
                                    <?php endforeach; ?>
                                </select>  
                                </div>
                            </div>
        
                            <div class="medium-4 small-12 columns sortby">
                                <div class="pull-right">
                                
                                <em>Sortiraj po:</em> 
                                <select name="orderby" class="orderby" id="sortiranje">
                                
                                <?php
                                $options=[
                                    [
                                        "value" => 0,
                                        "text" => "Izaberite"
                                    ],

                                    [
                                        "value" => 1,
                                        "text" => "Nazivu  A-Š"
                                    ],
                                    [
                                        "value" => 2,
                                        "text" => "Nazivu  Š-A"
                                    ],
                                    [
                                        "value" => 3,
                                        "text" => "Cena -> opadajuće"
                                    ],
                                    [
                                        "value" => 4,
                                        "text" => "Cena -> rastuća"
                                    ],
                                    [
                                        "value" => 5,
                                        "text" => "Najnoviji"
                                    ]
                                    
                                ];
                                foreach($options as $option):
                                ?>
                                <option value="<?=$option['value'] ?>"><?=$option['text'] ?></option>
                                <?php endforeach; ?>
                                
                                </select>
                                
                                </div>
                        </div>
                        <div class="clearfix"></div>
                        </div><!-- product filter /-->
                        
                        <div class="products-wrap" id="svi_oglasi">
                        
                                    
                               
							
                            
                            
                        </div><!-- products wrap /-->
                        
                        <!-- pagination starts -->
                        <div class="pagination-container" id="paginacija">
                            <ul class="pagination" role="menubar" aria-label="Pagination">
                                <?php
                                    include "models/oglasi/functions.php";
                                    $paginacije = broj_strana(); //sad je ovde 25
                                    $pag=$paginacije->brojStrana;
                                    $brojStrana=floor($pag / 3);
                                    for($i=1; $i<=$brojStrana;$i++){
                                        $id="$i";
                                ?>
                                <li><a href="#" data-pag="<?=$id ?>"class="linkPaginacija"><?=$i ?></a></li>
                                <?php }
                                 ?>
                                
                                
                                
                                
                                
                            </ul>
                        </div>
                        <!-- Pagination Ends -->
                        
                    </div>
                    <!-- store content /-->
                    
                </div><!-- Row /-->
            </div>