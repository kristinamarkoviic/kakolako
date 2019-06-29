<div id="okvir-poruke">

<div id="svePoruke">
<h2>PORUKE</h2><a href="models/oglasi/export_excel.php" data-id='<?=$_SESSION['user_id'] ?>' class="excel">PREUZMI PORUKE U EXCEL FORMATU</a>
<?php

    include "models/oglasi/functions.php";
    $idKorisnik=$_SESSION['user_id'];
    $poruke=poruke($idKorisnik);
    
    foreach($poruke as $poruka): 
    
?>
<div class="container1">
  <img src="<?=$poruka->slika ?>" alt="Avatar" style="width:100%;">
  <p>NAZIV PROIZVODA:&nbsp; &nbsp;<?=$poruka->naziv ?></p>
  <p>OD: <?=$poruka->korisnik ?></p>
  <p>PORUKA: <?=$poruka->poruka ?></p>
  <span class="time-right"><?= date("d.m.Y H:i:s",strtotime($poruka->poslato));?></span>
</div>
    <?php endforeach;?>
</div>
    </div>
