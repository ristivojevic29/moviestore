<?php
    include "../../config/connection.php";
    include "functions.php";
    session_start();
    header("Content-Type: application/json");
    $record_per_page=3;
    $page='';
    $output='';

    if(isset($_POST['page'])){
        $page=$_POST['page'];
    }else{
        $page=1;
    }
    $start_from=($page-1)*$record_per_page;
    $upit=getAllMovies();
    $upit.=" LIMIT ".$start_from.",".$record_per_page;
    $rezultat=executeQuery($upit);
    $upit2="SELECT COUNT(*) as brojFilmova FROM filmovi";
    $brojFilmova=executeQuery($upit2);
        echo json_encode(["filmovi"=>$rezultat,"brojFilmova"=>$brojFilmova]);
?>