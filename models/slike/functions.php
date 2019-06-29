<?php

function insertSlike($idOglas){
    global $conn;
    $upit="INSERT INTO slike VALUES(NULL,'assets/images/help/noimage.jpg','assets/images/help/noimage.jpg', ?)";
    $rezultat=$conn->prepare($upit);
    $uneto=$rezultat->execute([$idOglas]);
    return $uneto;
    
}
function update($putanja_originalna_slika,$putanja_oglas_slika,$idOglas){
    global $conn;
    $upit="UPDATE slike SET putanja_originalna_slika = ?, putanja_oglas_slika = ? WHERE idOglas = ?";
    $rezultat=$conn->prepare($upit);
    $update=$rezultat->execute([$putanja_originalna_slika,$putanja_oglas_slika,$idOglas]);
    return $update;
}


?>