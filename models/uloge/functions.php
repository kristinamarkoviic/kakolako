<?php
function sveUloge(){
    $upit="SELECT * FROM uloge";
    return executeQuery($upit);
}

?>