<?php
    header("Location: ../../index.php?page=Admin");
    include "../../config/connection.php";
    include "functions.php";
    session_start();
    if(isset($_POST['btnIzmenaFilma']) && $_SESSION['korisnik']->idUloge==1){
        echo "Nesto";
        $title=$_POST['tbTitle'];
        $cena=$_POST['tbPrice'];
        $kategorija=$_POST['ddlKategorija'];
        $id=$_POST['hiddenFilm'];
        $poruka="";
            $izmena=updateMovie($title,$cena,$kategorija,$id);

            if($izmena->execute()){
            $poruka="<p>Succcessfully updated</p>";
        }else{
            $poruka="<p>Error</p>";
        }
   
    
}

    ?>