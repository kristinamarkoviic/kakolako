<?php

function korisnikLogin($email,$pass){
    $upit="SELECT * FROM korisnici WHERE email=? AND password=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$email,$pass]);
    return $priprema;

}
function korisnikLoginMailer($email,$pass){
    $upit="SELECT * FROM korisnici WHERE email=? AND password <> ?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$email,$pass]);
    return $priprema->fetch();
}
function svi_korisnici(){
    $upit="SELECT * FROM korisnici";
    return executeQuery($upit);
}
function dohvati_korisnika($idKorisnik){
    $upit="SELECT k.* FROM korisnici k INNER JOIN uloge u ON k.idUloga=u.idUloga WHERE k.idKorisnik=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idKorisnik]);
    return $priprema->fetch();
}
function delete($idKorisnik){
    $upit="DELETE FROM korisnici WHERE idKorisnik=?";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$idKorisnik]);
    return $priprema;
}
function update($idKorisnik,$username,$email,$password,$idUloga){
    $upit="UPDATE korisnici SET  username=?  , email= ?, password=? ,idUloga =? WHERE idKorisnik=? ";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$username,$email,$password,$idUloga,$idKorisnik]);
    return $priprema;
}
function insert($username,$email,$password,$idUloga){
    $upit="INSERT INTO korisnici VALUES (NULL, ? , ? , ? , ?)";
    global $conn;
    $priprema=$conn->prepare($upit);
    $priprema->execute([$username,$email,$password,$idUloga]);
    return $priprema;
}
function dohvati_autora(){
    $upit="SELECT * FROM autor";
    return executeQuery($upit);
}

?>