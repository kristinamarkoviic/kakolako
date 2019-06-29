<?php
//za dodavaanje poruke kod
function insertPoruka($poruka,$idOglas,$idKorisnik,$datum){
    $upit="INSERT INTO poruke VALUES(NULL,?,?,?,?)";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$poruka,$idOglas,$idKorisnik,$datum]);
    return $priprema;
}
//dohvatanje poruka
function poruke($idKorisnik){
    $upit="SELECT p.poruka,p.poslato,p.idOglas,ka.username AS korisnik,k.idKorisnik,o.naziv,s.putanja_oglas_slika AS slika FROM poruke p INNER JOIN korisnici ka ON p.idKorisnik=ka.idKorisnik INNER JOIN oglas o ON p.idOglas=o.idOglas INNER JOIN korisnici k ON o.idKorisnik=k.idKorisnik INNER JOIN slike s ON o.idOglas=s.idOglas WHERE o.idKorisnik=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idKorisnik]);
    return $priprema;
}
function insertOglas($naziv,$opis,$datum,$cena,$kategorija,$grad,$idKorisnik){
    global $conn;
    $upit="INSERT INTO oglas VALUES(NULL,?,?,?,?,?,?,?)";
    $priprema=$conn->prepare($upit);
    $priprema->execute([$naziv,$opis,$datum,$cena,$kategorija,$grad,$idKorisnik]);
    return $priprema;
}
function oglasIspis($idKorisnik){
    $upit="SELECT o.*,s.* FROM oglas o INNER JOIN slike s ON o.idOglas=s.idOglas INNER JOIN korisnici k ON o.idKorisnik=k.idKorisnik WHERE o.idKorisnik=$idKorisnik";
    return executeQuery($upit);

}
function insertOglasiId($id){
    $upit="SELECT o.*,s.* FROM oglas o INNER JOIN slike s ON o.idOglas=s.idOglas WHERE s.idOglas=$id";
    //samo fetch ide
    global $conn;
    return $conn->query($upit)->fetchAll();
    

}
function oglas_grad($grad){
    $upit=sve();
    $upit.=" WHERE o.idGrad = ? LIMIT 0,5";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$grad]);
    return $priprema->fetchAll();
}
function sve(){
    return "SELECT ka.naziv AS kategorija, ka.ikonica, k.*,s.*,o.*,g.naziv AS grad FROM korisnici k INNER JOIN oglas o ON k.idKorisnik=o.idKorisnik INNER JOIN kategorije ka ON o.idKategorija=ka.idKategorija INNER JOIN slike s ON o.idOglas=s.idOglas INNER JOIN gradovi g ON o.idGrad=g.idGrad";
    
}
function oglasi_svi(){
    $upit=sve();
    return executeQuery($upit);
}
function sve_pretraga($naziv){
    $upit=sve();
    $upit.=" WHERE LOWER(o.naziv) OR LOWER(o.opis) LIKE ?  LIMIT 0,5";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$naziv]);
    return $priprema->fetchAll();
    
}
//paginacija
function paginacija($strana){
    $upit=sve();
    $upit.=" LIMIT $strana,5";
    return executeQuery($upit);
}
function broj_strana(){
    $upit="SELECT COUNT(*) -12 AS brojStrana FROM oglas";
    global $conn;
    return $conn->query($upit)->fetch();
}
//zavrsetak paginacije
function sortiranje($sort){
    $svi= sve();
    switch($sort){
        case 0:
            $svi.=" ORDER BY o.naziv ASC LIMIT 0,5";
            break;
        case 1:
            $svi .= " ORDER BY o.naziv ASC LIMIT 0,5";
            break;
        case 2:
            $svi .= " ORDER BY o.naziv DESC LIMIT 0,5";
            break;
        case 3:
            $svi .= " ORDER BY o.cena DESC LIMIT 0,5";
            break;
        case 4:
            $svi .= " ORDER BY o.cena ASC LIMIT 0,5";
            break;
        case 5:
            $svi .= " ORDER BY o.datum DESC LIMIT 0,5";
            break;
    }
    return executeQuery($svi);

}
//ovo sve home promeni uzmi ono sto dohvata sve i  dodaj ovaj ORDER BY
function sve_home(){
    $upit="SELECT k.*,s.*,o.* FROM korisnici k INNER JOIN oglas o ON k.idKorisnik=o.idKorisnik INNER JOIN slike s ON o.idOglas=s.idOglas ORDER BY o.datum DESC LIMIT 0,4";
    
    return executeQuery($upit);
}
function oglasJedan($idOglas){
    $upit="SELECT o.*,s.* FROM oglas o INNER JOIN slike s ON o.idOglas=s.idOglas WHERE s.idOglas= :id";
    
    
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->bindParam(":id",$idOglas);
    $priprema->execute();
    $oglasi=$priprema->fetch();
    return $oglasi;
}
function single_oglas($idOglas){
    $upit=sve();
    $upit.=" WHERE o.idOglas=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idOglas]);
    $rezultat=$priprema->fetch();
    return $rezultat;

}
function oglas_kategorija($idKat){
    $upit="SELECT k.ikonica, k.naziv AS kategorija,o.*,s.*,c.*,g.naziv AS grad FROM gradovi g INNER JOIN oglas o ON g.idGrad=o.idGrad INNER JOIN slike s ON o.idOglas=s.idOglas INNER JOIN korisnici c ON o.idKorisnik=c.idKorisnik  INNER JOIN kategorije k ON o.idKategorija=k.idKategorija WHERE o.idKategorija=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idKat]);
    $rez=$priprema->fetchAll();
    return $rez;
}
function delete_oglas($idOglas){
    $upit="DELETE FROM oglas WHERE idOglas = ?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idOglas]);
    return $priprema;
    
}
function update_oglas($idOglasa,$naziv,$opis,$datum,$cena,$idKategorija,$idGrad){
    $upit="UPDATE oglas SET naziv = ? , opis = ? , datum = ? , cena = ? , idKategorija = ? , idGrad = ? WHERE idOglas = ?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$naziv,$opis,$datum,$cena,$idKategorija,$idGrad,$idOglasa]);
    return $priprema;
}
?>