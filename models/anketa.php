<?php
header("Location: ../index.php?page=Survey");
    if(isset($_POST['btnAnketa'])){
        $answer=$_POST['answer'];
        $idKorisnika=$_POST['idK'];
        echo $answer;
        echo $idKorisnika;
        if($answer==""){
            header("Location:../index.php?page=Survey");
        }
        require_once "../config/connection.php";
    $upit="INSERT INTO korisnik_odgovor(idKorisnik,idOdgovor)
    VALUES(:idK,:idO);";
    
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":idK",$idKorisnika);
    $stmt->bindParam(":idO",$answer);
    $stmt->execute();
    if($stmt->rowCount()){
        echo "Uspesan unos";
    }
    }
?>