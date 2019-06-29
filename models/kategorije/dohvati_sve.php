<?php

    header("Content-Type: application/json");
        try{
            include "../../config/connection.php";
            include "functions.php";
            $kategorije=dohvati_kategorije();
            echo json_encode($kategorije);
            
            
            
        }catch(PDOException $ex){
            http_response_code(500);
            dohvatiGreske("dohvati_sve.php".$ex->getMessage());
            echo json_encode(["Pogresan upit" => $ex->getMessage()]);

        }
    
    