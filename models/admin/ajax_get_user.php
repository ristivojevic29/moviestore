<?php
  //  header("Location: ../../index.php?page=Admin");
    if(isset($_POST['id'])){
       header("Content-type:application/json");
        require_once "../../config/connection.php";
        $code=404;
        $data=null;
    

        $upit="SELECT*,k.idKorisnik AS korisnikID FROM korisnik k INNER JOIN uloge u ON k.idUloge=u.idUloge WHERE k.idKorisnik=:id";
        $izmena=$conn->prepare($upit);
        $izmena->bindParam(":id",intval($_POST['id']));
        try{
            $izmena->execute();
            $korisnik=$izmena->fetch();
            if($korisnik){
                $data=$korisnik;
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