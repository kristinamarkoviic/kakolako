<?php
@session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['loginBtn'])){
    header("Content-type: application/json");
    ob_start();
    require "../../config/connection.php";
    require "functions.php";
    // Ucitavanje mailera
    require ABSOLUTE_PATH.'/PHPMailer/src/PHPMailer.php';
    require ABSOLUTE_PATH.'/PHPMailer/src/SMTP.php';
    require ABSOLUTE_PATH.'/PHPMailer/src/Exception.php';
    



    $email = $_POST['emaillog'];
    $sifra = $_POST['passlog'];

    $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/";

    $greske = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $greske[] = "Mail is not in good format!";
    }
    if(!$sifra){
        $greske[]="Password is a required field";
    }
    else if(!preg_match($rePassword,$sifra)){
        $greske[]="Password must contain only lowercase letters and numbers, atleast 8 characters long.";
    }

    if(count($greske) > 0){
        http_response_code(422);
        echo json_encode($greske);
        header("Location:../../index.php");
    } else{
        $siframd5 = md5($sifra);

        try{
            $login = korisnikLogin($email, $siframd5);

            if($login->rowCount() == 1){
                $user = $login->fetch();
                http_response_code(200);
                echo json_encode($user);

                $_SESSION['user_id'] = $user->idKorisnik;
                $_SESSION['user'] = $user;
                header("Location:../../index.php");
            } else{


                $loginMailer = korisnikLoginMailer($email, $siframd5);

                if($loginMailer){
                    $mail = new PHPMailer(true);

                    
                    $mail->SMTPDebug = 3;

                    $mail->isSMTP();
                    $mail->Host ='smtp.gmail.com';
                    
                    
                    $mail->SMTPAuth =true;
                    $mail->Username = 'auditorne.php@gmail.com';
                    $mail->Password = 'Sifra123';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port =587;
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    $mail->smtpClose();

                    $mail->setFrom('kakolako@gmail.com', 'POKUSAJ LOGOVANJA NA VAS NALOG');
                    $mail->addAddress($email);

                    $mail->isHTML(true);

                    $mail->Subject= "Pažnja!Pažnja!";
                    

                    $mail->Body = "<h1>Neko je pokušao da se uloguje kod vas na nalog pre par sekundi. Pozdrav, copyright: kako?lako. tim</h1>";

                    $mail->send();
                    header("Location:../../index.php");
                }
                else{
                    echo json_encode(["Greska" => "Wrong Mail AND Password"]);
                    http_response_code(409);
                    header("Location:../../index.php");
                }

            }
        } catch (PDOException $ex){
            http_response_code(500);
            echo json_encode(['Greska' => "Greska". $ex->getMessage()]);
            dohvatiGreske("login.php".$ex->getMessage());
        }
    }
} else{
    http_response_code(403);
    echo json_encode("Sta da radim sad!");
}