<?php
   
     header("Location: ../../index.php?page=Admin");
     header("Content-type:application/json");
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        require_once "../../config/connection.php";
        include "functions.php";
        $code=404;
        $data=null;
    
        try{
            $film=getOneMovie($id);
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