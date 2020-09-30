<?php
    include "../../config/connection.php";
    include "functions.php";
    if(isset($_POST['sort'])){
        $upit=getAllProducts();
        $sort=$_POST['sort'];
        switch($sort){
            case 1:
            $upit.=" ORDER BY cena_filma ASC";
            break;
            case 2:
            $upit.=" ORDER BY cena_filma DESC";
            break;
        }
        $result=executeQuery($upit);
        echo json_encode($result);
    }else{
        http_response_code(400);
        echo json_encode(["greska"=> "Niste poslali sort"]);
    }
   
?>