<div id="oglas">
    <div class="forma1">
    <h2 class="text-center">Ostavite podatke o oglasu</h2>
              <p>
              Dragi korisniče, <?=$_SESSION['user']->username ?> oglas će odmah po unosu biti na početnoj strani.
              </p>
        <form id="dodavanjeOglasa" method="POST" action="models/oglasi/insert.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Naziv</label>
                <input type="text" class="form-control" id="naziv" placeholder="Naziv proizvoda">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Datum</label>
                <input type="date" id="datum" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cena</label>
                <input type="number" id="cena" class="form-control" id="exampleFormControlInput1" placeholder="1900">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Izaberi grad</label>
                <select class="form-control" id="ddlGradovi" name="ddlGradovi">
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
                <select class="form-control" id="ddlKategorije" name="ddlKategorije">
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
                <textarea class="form-control" id="opis" rows="3"></textarea>
            </div>
            <div class="form-group">
                
                <button type="button" class="registerBtn oglas" id="insertOglas">Dodaj Oglas</button>
            </div>
            
        </form>
    </div>
    <!-- <div class="pored">
        <h2>Oglas</h2>
    </div> -->
</div>