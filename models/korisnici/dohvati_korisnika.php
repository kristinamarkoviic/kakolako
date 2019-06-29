<?php
    header("Content-Type: applicaton/json");
    if(isset($_POST['id'])){
        try{
            include "../../config/connection.php";
            include "functions.php";
            $idKorisnika=$_POST['id'];
            $korisnici=dohvati_korisnika($idKorisnika);
            echo json_encode($korisnici);

            http_response_code(201);
            
            
            
        }
        catch(PDOException $ex){
            http_response_code(500);
            echo json_encode(["Pogresan upit" =>"Baza greska"]);
            dohvatiGreske("dohvati_korisnika.php".$ex->getMessage());

        }
    }
    else {
        http_response_code(400);
        echo json_encode(["Greska" => "Nije poslat id korisnika"]);
    }

?>