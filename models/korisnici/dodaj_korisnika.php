<?php
    header("Content-Type: applicaton/json");
    if(isset($_POST['poslato'])){
        
            
            $username=$_POST['username'];
            $email=$_POST['email'];
            $idUloga=$_POST['idUloga'];
            $password=$_POST['password'];
            $reUsername= "/^[A-Z][a-žćčžš]{2,13}(\s[A-Z][a-žćčžš]{2,13})*$/";
            $rePassword="/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/";
        
            
                $nizGreske=[];
                if(empty($username)){
                    $nizGreske[]="First name is a required field";
                }
                else if(!preg_match($reUsername,$username)){
                    $nizGreske[]="First name must contain only letters and must star with upperkey.";
                }
                
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $nizGreske[]="Email is a required field";
                }
                if(empty($idUloga)){
                    $nizGreske[]="Username is a required field";
                }
                if(empty($password)){
                    $nizGreske[]="Password is a required field";
                }
                else if(!preg_match($rePassword,$password)){
                    $nizGreske[]="Password must contains only numbers and letters.";
                }

                if(count($nizGreske)>0){
                    http_response_code(422);
                    
                }
                else {
                    $passwordmd5=md5($_POST['password']);
                    try{
                        include "../../config/connection.php";
                        include "functions.php";
                        
                        $korisnici=insert($username,$email,$passwordmd5,$idUloga);
                        http_response_code(201);
                        echo json_encode($korisnici);
                        
                        
                        
                        
                    }
                    catch(PDOException $ex){
                        dohvatiGreske("dodaj_korisnika.php".$ex->getMessage());
                        echo $ex->getMessage();
            
                    }
                }
        }
        
    
    else {
        http_response_code(400);
        echo json_encode(["Greska" => "Nisu poslati podaci"]);
    }

?>