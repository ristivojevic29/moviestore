<?php
    include "../../config/connection.php";
    include "functions.php";
    $query=getCategories();
    $result=executeQuery($query);
    echo json_encode($result);
?>