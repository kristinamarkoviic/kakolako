<?php

    include "config.php";

    zabeleziPristup();

    try
    {
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME.";charset=utf8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        

    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }

    function executeQuery($upit){
        global $conn;
        return $conn->query($upit)->fetchAll();
    }

    function zabeleziPristup(){
        $open = fopen(LOG_FILE,"a");
        if($open){
            $date = date('d-m-Y H:i:s');
            fwrite($open,"{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
            fclose($open);
        }
    }
    function dohvatiGreske($greske){
        @$open = fopen(ERROR_FILE, "a");
        $unos = $greske."\t".date('d-m-Y H:i:s'). "\n";
        @fwrite($open, $unos);
        @fclose($open);
    }

?>