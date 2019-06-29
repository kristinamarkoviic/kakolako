<?php
    session_start();
    header("Content-Type:application/json");
    $code=404;
    $data=null;
    if(isset($_POST['poslato'])){
        require_once "../../config/connection.php";
        $id=$_SESSION['user']->idKorisnik;
        $naziv = $_POST['naziv'];
        $opis = $_POST['opis'];
        $grad = $_POST['grad'];
        $kategorija = $_POST['kategorija'];
        $datum = $_POST['datum'];
        $cena = $_POST['cena'];

        $nizGreske=[];

        //provera

        if(empty($naziv)){
            $nizGreske[]="Naziv je obavezan";
        }
        if(empty($opis)){
            $nizGreske[]="Opis je obavezan";
        }
        if(empty($grad)){
            $nizGreske[]="Grad je obavezan";
        }
        if(empty($kategorija)){
            $nizGreske[]="Kategorija je obavezna";
        }
        if(empty($datum)){
            $nizGreske[]="Datum je obavezan";
        }
        if(empty($cena)){
            $nizGreske[]="Cena je obavezna";
        }

        if(count($nizGreske) > 0){
            $code=422;
            $data=$nizGreske;
        }
        else {
            try{
                include ABSOLUTE_PATH."models/oglasi/functions.php";
            
                $unos=insertOglas($naziv,$opis,$datum,$cena,$kategorija,$grad,$id);
                if($unos){
                    $code=201;
                    include ABSOLUTE_PATH."models/slike/functions.php";
                    $last=$conn->lastInsertId();
                    $slike=insertSlike($last);

                }
            }
            catch(PDOException $ex){
                $data=$ex->getMessage();
                $code=500;
                dohvatiGreske("insert.php".$ex->getMessage());
            }
            
        }
    }//kraj isset-a

http_response_code($code);
echo json_encode($data);
echo $data;
?>