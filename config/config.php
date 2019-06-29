<?php

    define("ABSOLUTE_PATH", $_SERVER['DOCUMENT_ROOT']."/sajtKPK/");

    define("ENV_FAJL",ABSOLUTE_PATH."/config/.env");
    define("LOG_FILE",ABSOLUTE_PATH."/config/log.txt");
    define("ERROR_FILE",ABSOLUTE_PATH."/config/error.txt");

    define("SERVER",env("SERVER"));
    define("DBNAME",env("DBNAME"));
    define("USERNAME",env("USERNAME"));
    define("PASSWORD",env("PASSWORD"));


    function env($parametar){
        $podaci=file(ENV_FAJL);
        $vrednosti="";
        foreach($podaci as $key=>$value){
            $konfig=explode("=",$value);
            if($konfig[0] == $parametar){
                $vrednosti=trim($konfig[1]);
            }
        }
        return $vrednosti;
    }

?>