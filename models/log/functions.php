<?php

    function getUser($email,$lozinka){
        global $conn;
        $upitUporedi = "SELECT * FROM korisnik WHERE email=? and lozinka=?";
        $result=$conn->prepare($upitUporedi);
        $result->execute([$email,$lozinka]);
        return $result->fetch();
    }
    function updateUser($bit,$id){
        global $conn;
        $upitUpdate="UPDATE korisnik SET aktivan=:aktivan WHERE idKorisnik=:idKor";
        $stmt=$conn->prepare($upitUpdate);
        $stmt->bindParam(':aktivan',$bit,PDO::PARAM_BOOL);
        $stmt->bindParam(':idKor',$id);
        $stmt->execute();
        
    }
  
?>