<?php
    function dohvati_meni(){
        $upit="SELECT * FROM navigacija";
        return executeQuery($upit);
    }
?>