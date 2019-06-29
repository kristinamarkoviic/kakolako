<?php
    header("Content-Type: application/json");
    if(isset($_POST['id']))
    {
        try
        {
            $idOglas=$_POST['id'];
            include "../../config/connection.php";
            include "functions.php";
            $oglasi=oglasJedan($idOglas);
            echo json_encode($oglasi);
        }
        catch(PDOException $ex){
            echo $ex->getMEssage();
            dohvatiGreske("dohvati_jedan.php".$ex->getMessage());
        }
    
    
    }
    

?>