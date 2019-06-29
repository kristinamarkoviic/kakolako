<?php
    header("Content-Type: application/json");
    if(isset($_POST['idOglas'])){
        try{
            include "../../config/connection.php";
            include "functions.php";
            $idOglas=$_POST['idOglas'];
            $oglasi=delete_oglas($idOglas);
            http_response_code(204);
            echo json_encode(["uspeh" => "Obrisan oglas"]);
            
        }
        catch(PDOException $ex){
            http_response_code(500);
            echo json_encode(["Greska, brisanje oglasa" => $ex->getMessage()]);
            dohvatiGreske("delete_oglas.php".$ex->getMessage());
        }
        
    }
    else {
        http_response_code(400);
        echo json_encode(["Greska" => "Los zahtev, nije prosledjen parametar"]);
    }


?>