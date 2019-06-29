<?php
    header("Content-Type: applicaton/json");
    
        try {
            include "../../config/connection.php";
            include "functions.php";
            
            $korisnici=svi_korisnici();
            echo json_encode($korisnici);
            
            
            
            
        }
        catch(PDOException $ex){
            http_response_code(500);
            echo json_encode(["Pogresan upit" =>"Baza greska"]);
            dohvatiGreske("svi_korisnici.php".$ex->getMessage());

        }
    
    

?>