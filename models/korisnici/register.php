<?php
    

    
    header("Content-type:application/json");
    $code=404;
    $data=null;
    if(isset($_POST['send'])){
        require_once "../../config/connection.php";
        $username=$_POST['uname'];
        $email=$_POST['email'];
        $pass=md5($_POST['pwd']);
    
        $errors=[];
        
        $reusername="/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/";
        $reEmail="/^[Az]+\d*\@(gmail|hotmail|yahoo|(ict.edu))\.(com)$/";
        $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/";

    $nizData=[];
    $nizGreske=[];
    
    if(empty($username)){
        $nizGreske[]="Username is a required field";
    }
    else if(!preg_match($reusername,$username)){
        $nizGreske[]="The username must contain only lowercase letters and numbers, at least 8 characters long.";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $nizGreske[]="Email is a required field";
    }
    if(!$_POST['pwd']){
        $nizGreske[]="Password is a required field";
    }
    else if(!preg_match($rePassword,$pass)){
        $nizGreske[]="Password must contain only lowercase letters and numbers, atleast 8 characters long.";
    }

    if(count($nizGreske)>0){
        $code=422;
        $data=$nizGreske;

    }
    else {

        
        $upit_mail="SELECT * FROM korisnici WHERE email=:email OR username=:username";
        $rez_email=$conn->prepare($upit_mail);
        $rez_email->bindParam(":email",$email);
        $rez_email->bindParam(":username",$username);
        $rez_email->execute();
        $mailovi=$rez_email->fetch();
    
    
    if($mailovi != null){
        $code=409;
    }
    else {
        
       
        try {
            $upit="INSERT INTO korisnici (idKorisnik,username,email,password,idUloga)
            VALUES (NULL,:korisnicko_ime,:email,:lozinka,2)";
    
            $statement=$conn->prepare($upit);
            
            $statement->bindParam(":korisnicko_ime",$username);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":lozinka",$pass);
            
            $code=$statement->execute() ? 201 : 500;

            
            
        }
        catch(PDOException $e){
            dohvatiGreske("register.php".$ex->getMessage());
            $code=409;
        }
    }
    
    }
}
http_response_code($code);
echo json_encode($data);
echo $data;
?>


