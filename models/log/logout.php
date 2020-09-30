<?php
 header("Location: ../../index.php");
 session_start();
 include "../../config/connection.php";
 include "functions.php";
 if(isset($_SESSION['korisnik'])){
    $id=$_SESSION['korisnik']->idKorisnik;
    
 }
// session_destroy();
 if(session_destroy()){
    global $id;
     $bit=0;
   //  $queryUpdate="UPDATE korisnik SET aktivan=:aktivan WHERE idKorisnik=:idKor";
   //  $stmt=$conn->prepare($queryUpdate);
   //  $stmt->bindParam(':aktivan',$bit,PDO::PARAM_BOOL);
   //  $stmt->bindParam(':idKor',$id);
   //  $stmt->execute();
   updateUser($bit,$id);
    }
 
 
 header("Location: ../../index.php");

?>