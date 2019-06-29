


<div class="okvir">


<table class="table table-striped" id="tabela_korisnici" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Naziv</th>
        <th scope="col">Opis</th>
        <th scope="col">Cena</th>
        <th scope="col">Slika</th>
        <th scope="col">Izmeni</th>
        <th scope="col">Obrisi</th>
      </tr>
    </thead>
    <tbody>
        <?php
            include "models/oglasi/functions.php";
            $oglasi=oglasi_svi();
            
            foreach($oglasi as $oglas):
        ?>
      <tr>
        <td><?=$oglas->idOglas?></td>
        <td><?=$oglas->naziv?></td>
        <td><?=$oglas->opis?></td>
        <td><?=$oglas->cena?> RSD</td>
        <td><img class='img-thumbnail'   src="<?=$oglas->putanja_oglas_slika?>" alt="<?=$oglas->naziv?>" /></td>
        
        
        <td><a class="dugmicUpdate updateO" data-id='<?=$oglas->idOglas?>'>Izmeni</a></td>
        
            
        <td><a class="dugmicDelete deleteO" data-id='<?=$oglas->idOglas?>'>Obriši</a></td>
      </tr>
            <?php endforeach;?>
    </tbody>

            </table>

<div class="formica" id="formica2">
        <h4 class="card-title" id="forma-naslov">Izmeni oglas</h4>
        <form id="dodavanjeKorisnika" method="POST" action="models/oglasi/update_oglas.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Naziv</label>
                <input type="text" class="form-control" id="nazivOglasa" name="nazivOglasa" name="nazivOglasa" placeholder="Naziv oglasa"/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Datum</label>
                <input type="date" id="datumO" name="datumO" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cena</label>
                <input type="number" id="cenaO" class="form-control" name="cenaO" placeholder="1900">
            </div>
            <input type="hidden" name="hidnIzmeniOglas" id="hidnIzmeniOglas"/>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Izaberi grad</label>
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
            <div class="form-group">
                <label for="exampleFormControlSelect1">Izaberi kategoriju/oblast</label>
                <select class="form-control" id="ddlKategorijeO" name="ddlKategorijeO">
                <option value="0">Izaberi</option>
                <?php
                 include_once "models/kategorije/functions.php";
                 $kategorije=dohvati_kategorije();
                 foreach($kategorije as $kategorija):
                ?>
                <option value="<?=$kategorija->idKategorija?>"><?=$kategorija->naziv?></option>
                <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Opis</label>
                <textarea class="form-control" id="opisO" name="opisO" rows="3"></textarea>
            </div>
            <div class="form-group" id="btnUpdateOglas">    
                <button type="submit" class="dugmicUpdate" id="updateOglasa" name="updateOglasa">Sačuvaj</button>
            </div>
           
            
        </form>
    
</div>

  
</div>

            </div>
            