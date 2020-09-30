<?php
    //header("Location: ../../index.php");
    header("Content-type: application/json");
    if(isset($_POST['send'])){
    include "../../config/connection.php";
    $upit="SELECT u.nazivUloge,k.* FROM uloge u INNER JOIN korisnik k ON u.idUloge=k.idUloge";
    $korisnici=executeQuery($upit);
    echo json_encode($korisnici);
    }else{
        echo "Doslo je do greske";
    }

?>