<?php
function sviGradovi(){
    $upit="SELECT * FROM gradovi ORDER BY naziv DESC";
    return executeQuery($upit);
}

?>