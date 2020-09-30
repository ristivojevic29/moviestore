<?php
     header("Location: ../../index.php?=Home");
    if(isset($_POST['id'])){
     //  header("Content-type:application/json");
        require_once "../../config/connection.php";
        $code=404;
        $data=null;
    

        $upit="SELECT*,f.idFilma AS FilmID FROM filmovi f INNER JOIN kategorije k ON f.idKategorije=k.idKategorije WHERE f.idFilma=:id";
        $izmena=$conn->prepare($upit);
        $izmena->bindParam(":id",intval($_POST['id']));
        try{
            $izmena->execute();
            $film=$izmena->fetch();
            if($film){
                $data=$film;
                $code=201;
            }else{
                $code=500;
            }
        }catch(PDOException $e){
            $code=500;
            $data=$e->getMessage();
        }
    }
    http_response_code($code);
    echo json_encode($data);
?>