<?php
 //header("Location: ../../index.php?page=Admin");
    $statusCode=404;

    if($_SERVER['REQUEST_METHOD']!="POST"){
        echo "Error!";
}
if(isset($_POST['id'])){
    $id=$_POST['id'];
    include "../../config/connection.php";
    $upit=$conn->prepare("DELETE FROM korisnik WHERE idKorisnik=:id");
    $upit->bindParam(":id",$id);
    try{
        $rezultat=$upit->execute();

        if($rezultat){
            $statusCode=204;
        }else{
            $statusCode=500;
        }
    }catch(PDOException $e){
        $statusCode=500;
    }
}
?>