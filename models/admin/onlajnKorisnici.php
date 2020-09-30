<?php
    header("Content-type:application/json");
    include "../../config/connection.php";
    
    $upit="SELECT * FROM korisnik WHERE aktivan=1";
    $result=executeQuery($upit);
    http_response_code(200);
    echo json_encode($result);
?>