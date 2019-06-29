<?php
    header("Content-Type: application/json");
    if(isset($_POST['grad'])){

        try{
            $grad=$_POST['grad'];
            include "../../config/connection.php";
            include "functions.php";
            $gradovi=oglas_grad($grad);
            echo json_encode($gradovi);
            http_response_code(200);
        }
        catch(PDOException $ex){
            echo json_encode(["Greska, filter grad" => "Pogresan upit"]);
            http_response_code(400);
            dohvatiGreske("filter_grad.php".$ex->getMessage());
        }
        
    }
    else {
        echo json_encode(["Greska" => "Nije prosledjen paramter"]);
        http_response_code(500);
    }

?>