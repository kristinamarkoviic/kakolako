<?php
    header("Content-Type: applicaton/json");
    if(isset($_POST['id'])){
        try{
            include "../../config/connection.php";
            include "functions.php";
            $idOglas=$_POST['id'];
            $oglasi=single_oglas($idOglas);
            echo json_encode($oglasi);

            http_response_code(201);
            
            
            
        }
        catch(PDOException $ex){
            http_response_code(500);
            echo json_encode(["Greska, update oglasa" => $ex->getMessage()]);
            dohvatiGreske("dohvati_oglas.php".$ex->getMessage());

        }
    }
    else {
        http_response_code(400);
        echo json_encode(["Greska" => "Nije poslat id oglasa"]);
    }

?>