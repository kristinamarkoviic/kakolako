


<div class="okvir">


<table class="table table-striped" id="tabela_korisnici" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Ime i Prezime</th>
        <th scope="col">Email</th>
        <th scope="col">Uloga</th>
        <th scope="col">Izmeni</th>
        <th scope="col">Obriši</th>
      </tr>
    </thead>
    <tbody id="tabelaKorisnici">
        <?php
            include "models/korisnici/functions.php";
            $korisnici_panel=svi_korisnici();
            foreach($korisnici_panel as $korisnik):
        ?>
      <tr>
        <td><?=$korisnik->idKorisnik?></td>
        <td><?=$korisnik->username?></td>
        <td><?=$korisnik->email?></td>
        <td><?=$korisnik->idUloga?></td>
        
        
        <td><a class="dugmicUpdate updateK" data-id='<?=$korisnik->idKorisnik?>'>Izmeni</a></td>
        
            
        <td><a class="dugmicDelete deleteK" data-id='<?=$korisnik->idKorisnik?>'>Obriši</a></td>
      </tr>
            <?php endforeach;?>
    </tbody>

            </table>

<div class="formica">
        <h4 class="card-title" id="forma-naslov">Dodaj korisnika</h4>
        <form id="dodavanjeKorisnika" method="POST" action="models/oglasi/insert.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Ime i prezime</label>
                <input type="text" class="form-control" id="imeAdmin" placeholder="Ime i prezime"/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="emailAdmin" placeholder="primer@gmail.com"/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Lozinka</label>
                <input type="password" class="form-control" id="passwordAdmin" placeholder="Lozinka"/>
            </div>

            <input type="hidden" class="form-control" id="hidnUpdateKorisnika"/>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Izaberi ulogu</label>
                <select class="form-control" id="ddlUloge" name="ddlUloge">
                <option value="0">Izaberi</option>
                <?php 
                include "models/uloge/functions.php";
                $uloge=sveUloge();
                
                
                foreach($uloge as $uloga):
                ?>
                <option value="<?=$uloga->idUloga ?>"><?=$uloga->naziv?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                
                <button type="button" class="dugmicUpdate" id="updateKorisnika">Sačuvaj</button>
            </div>
           
            
        </form>
    
</div>

  
</div>
<div class="dugmici">
<a href="index.php?page=adminOglasi" id="blogA">OGLASI</a>
</div>
            </div>
            