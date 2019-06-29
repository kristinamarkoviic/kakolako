<?php
    header("Content-Type: applicaton/json");
    if(isset($_POST['id'])){
        try
        {
            include "../../config/connection.php";
            include "functions.php";
            $idKorisnika=$_POST['id'];
            $obirsan = delete($idKorisnika);
            if($obirsan){
            $korisnici = svi_korisnici();
            echo json_encode($korisnici);
            }
            
            
            
        }
        catch(PDOException $ex){
            http_response_code(500);
            dohvatiGreske("obrisi_korisnika.php".$ex->getMessage());
            echo json_encode(["Pogresan upit" => $ex->getMessage()]);

        }
    }
    else {
        http_response_code(400);
        echo json_encode(["Greska" => "Nije poslat id korisnika"]);
    }

?>