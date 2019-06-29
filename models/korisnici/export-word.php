<?php
    include "../../config/connection.php";
    include "functions.php";

    $autori = dohvati_autora();
    $autor = $autori[0];
    

    $word = new COM("word.application") or die("Unable to instantiate Word object");
    $word->Visible = true;
    $datum = date("d.m.Y.", strtotime($autor->datum));
    $word->Documents->Add();
    $word->Selection->TypeText("$autor->ime_prezime \n $autor->grad $datum \n $autor->opis");

    $word->ActiveDocument->SaveAs("OAutoru.doc");
    
    
    
    
    
    

    header("Location: ../../index.php?page=autor");





?>