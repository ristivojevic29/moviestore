<?php
    include "../../config/connection.php";
    include "functions.php";
    header("Content-Type: application/json");
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $upit=getAllProducts();
        $upit.=" WHERE idKategorije=$id";
        $rezultat=executeQuery($upit);
        echo json_encode($rezultat);
    }
?>