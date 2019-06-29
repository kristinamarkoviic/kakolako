<?php
    

    
    if(isset($_POST['btnSacuvaj'])){


        require_once "../../config/connection.php";
        require_once "functions.php";
        $fajl=$_FILES['slika'];
        $idOglas=$_POST['skriveno'];
        $size=$fajl['size'];
        $tip=$fajl['type'];
        $size=$fajl['size'];
        $tmp=$fajl['tmp_name'];
        $name=$fajl['name'];

        $greske=[];

        $maxVelicina=3;

        if($size > $maxVelicina *1024*1024){
            $greske[]="Prekoracili ste maksimalnu velicinu fajla, ne preko 3MB";
        }

        $dozvoljeniTipovi=["image/jpeg","image/jpg","image/png"];
        if(!in_array($tip,$dozvoljeniTipovi)){
            $greske[]="Pogresan tip fajla";
        }

        if(count($greske) == 0){

            //prvo dimenzije za novu sliku da definisemo

            $dimenzije=getimagesize($tmp);
            $sirina=$dimenzije[0];
            $visina=$dimenzije[1];

            //proporcionalno sad

            $novaSirina=200;
            $novaVisina=200;

            //nova slika

            $novaSlika=imagecreatetruecolor($novaSirina,$novaVisina);

            // postojeca slika

            $postojecaSlika=null;
            switch($tip){
                case "image/jpeg":
                case "image/jpg":
                $postojecaSlika=imagecreatefromjpeg($tmp);
                break;
                case "image/png":
                $postojecaSlika=imagecreatefrompng($tmp);
                break;
            }

            //RESIZE 
            imagecopyresampled($novaSlika,$postojecaSlika,0,0,0,0,$novaSirina,$novaVisina,$sirina,$visina);

            

            //upload nove slike

            // pravimo nov naziv

            $naziv=time().$name;
            $putanjaNovaSlika='assets/images/oglasi/nova_'.$naziv;

            switch($tip){
                case "image/jpeg":
                case "image/jpg":
                imagejpeg($novaSlika,'../../'.$putanjaNovaSlika,75);
                break;
                case "image/png":
                imagepng($novaSlika,'../../'.$putanjaNovaSlika);
                break;
            }

            $putanjaOriginalnaSlika='assets/images/oglasi'.$naziv;

            //glavna funkcija move_uploaded_file ($tmp, 2arg je GDE '../../$putanjaOriginalnaSlika');

            //premestanje za tmp file na nas server  one originalne slike

            if(move_uploaded_file($tmp,'../../'.$putanjaOriginalnaSlika)){
                echo "Uspesno prebacena sa tmp na nas server";
                

                try {
                    $update=update($putanjaOriginalnaSlika,$putanjaNovaSlika,$idOglas);
                    //sad pravimo funkciju u functions
                    if($update){
                        echo "Putanja do slike upisana u bazu";
                        header("Location: ../../index.php?page=korisnik");
                    }

                }
                catch(PDOException $ex ){
                  echo  $ex->getMessage();
                }
            }

            imagedestroy($postojecaSlika);
            imagedestroy($novaSlika);







        }
        else {
            var_dump($greske);
        }
    }


?>