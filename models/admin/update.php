<?php
    header("Location: ../../index.php?page=Admin");
    include "../../config/connection.php";
    session_start();
    if(isset($_POST['btnIzmena']) && $_SESSION['korisnik']->idUloge==1){
        echo "Nesto";
        $ime=$_POST['tbFirstName'];
        $prezime=$_POST['tbLastName'];
        $email=$_POST['tbEmail'];
        $lozinka=$_POST['tbPassword'];
        $uloga=$_POST['ddlUloga'];
        $id=$_POST['hiddenKorisnikID'];
        $poruka="";
        if($lozinka==""){
            $upit="UPDATE korisnik SET ime=:ime, prezime=:prezime, idUloge=:uloge, email=:email WHERE idKorisnik=:id";

            $izmena=$conn->prepare($upit);
            $izmena->bindParam(":ime",$ime);
            $izmena->bindParam(":prezime",$prezime);
            $izmena->bindParam(":email",$email);
            $izmena->bindParam(":uloge",$uloga);
            $izmena->bindParam(":id",$id);

            if($izmena->execute()){
            $poruka="<p>Succcessfully updated</p>";
        }else{
            $poruka="<p>Error</p>";
        }
    }else{
        $lozinka=md5($lozinka);
        $upit="UPDATE korisnik SET ime=:ime, prezime=:prezime,idUloge=:uloge, email=:email, lozinka=:lozinka WHERE idKorisnik=:id";

            $izmena=$konekcija->prepare($upit);
            $izmena->bindParam(":ime",$ime);
            $izmena->bindParam(":prezime",$prezime);
            $izmena->bindParam(":email",$email);
            $izmena->bindParam(":uloge",$uloga);
            $izmena->bindParam(":lozinka",$lozinka);
            $izmena->bindParam(":id",$id);
            if($izmena->execute()){
            $poruka="<p>Succcessfully updated</p>";
        }else{
            $poruka="<p>Error</p>";
        }
    }
}

    ?>