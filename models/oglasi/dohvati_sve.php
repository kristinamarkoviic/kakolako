<?php
    session_start();
    header("Content-Type: application/json");
    try{
        include "../../config/connection.php";
        include "functions.php";
        $idKorisnik=$_SESSION['user']->idKorisnik;
        $oglasi=oglasIspis($idKorisnik);
        echo json_encode($oglasi);
        
        
        
    }catch(PDOException $ex){
        http_response_code(500);
        dohvatiGreske("dohvati_sve.php".$ex->getMessage());
        echo json_encode(["Pogresan upit" => $ex->getMessage()]);

    }

    
    

?>