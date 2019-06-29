<?php
    function dohvati_kategorije(){
        $upit="SELECT * FROM kategorije";
        return executeQuery($upit);
    }

?>