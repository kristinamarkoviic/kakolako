<?php
    session_start();
    ob_start();
    include "config/connection.php";
    include "views/fixed/head.php";
    include "views/fixed/nav.php";
    include "views/fixed/header.php";
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
            include "views/pages/home.php";
            break;
            case 'registrovanje':
            include "views/pages/registrovanje.php";
            break;
            case 'oglas':
            include "views/pages/oglas.php";
            break;
            case 'korisnik':
            include "views/pages/korisnik.php";
            break;
            case 'oglasi':
            include "views/pages/oglasi.php";
            break;
            case 'jedan_oglas':
            include "views/pages/jedan_oglas.php";
            break;
            case 'inbox':
            include "views/pages/inbox.php";
            break;
            case 'adminKorisnik':
            include "views/pages/adminKorisnik.php";
            break;
            case 'adminOglasi':
            include "views/pages/adminOglasi.php";
            break;
            case 'autor':
            include "views/pages/autor.php";
            break;
        }
    }
    else {
        include "views/pages/home.php";
    }
    include "views/fixed/footer.php";

?>