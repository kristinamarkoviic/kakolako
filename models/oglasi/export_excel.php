<?php
    @session_start();
    if(isset($_POST['id'])){

    
    include "../../config/connection.php";
    include "functions.php";
    $idKorisnik = $_POST['id'];
    $poruke = poruke($idKorisnik);
    
    

    $excel = new COM("Excel.Application");
    
    $excel->Visible = 1;
   
    $excel->DisplayAlerts = 1;

    $workbook = $excel->Workbooks->Add();
    
    $sheet = $workbook->Worksheets('Sheet1');
    $sheet->activate;

    $br=1;
    foreach($poruke as $poruka){
        $polje = $sheet->Range("A{$br}");
        $polje->activate;
        $polje->value = $poruka->idPoruka;

        $polje = $sheet->Range("B{$br}");
        $polje->activate;
        $polje->value = $poruka->korisnik;


        $polje = $sheet->Range("C{$br}");
        $polje->activate;
        $polje->value = $poruka->naziv;

        $polje = $sheet->Range("D{$br}");
        $polje->activate;
        $polje->value = $poruka->poruka;

        $polje = $sheet->Range("E{$br}");
        $polje->activate;
        $polje->value = $poruka->poslato;

        $br++;

    }
    


    //cuvanje

    
    $workbook->Save();

    $workbook->Saved=true;
    $workbook->Close;

    $excel->Workbooks->Close();
    $excel->Quit();

    unset($sheet);
    unset($workbook);
    unset($excel);


}
else {
    echo json_encode(["Greska" => "Niste poslali parametre"]);
    http_response_code(400);
}

?>