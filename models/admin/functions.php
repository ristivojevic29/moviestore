<?php
    function getAllMovies(){
        return "SELECT * FROM filmovi";
    }
    function deleteMovie($id){
        global $conn;
        $upitDelete="DELETE FROM filmovi WHERE idFilma=?";
        $result=$conn->prepare($upitDelete);
        $result->execute([$id]);
        return $result->fetch();
    }
    function getOneMovie($id){
        global $conn;
        $query="SELECT *,f.idFilma AS FilmID FROM filmovi f INNER JOIN kategorije k ON f.idKategorije=k.idKategorije WHERE f.idFilma=?";
        $result=$conn->prepare($query);
        $result->execute([$id]);
        return $result->fetch();
    }
    function updateMovie($title,$cena,$kategorija,$id){
        global $conn;
        $queryUpdateMovie="UPDATE filmovi SET naziv_filma=?, cena_filma=?, idKategorije=? WHERE idFilma=?";
        $result=$conn->prepare($queryUpdateMovie);
        $result->execute([$title,$cena,$kategorija,$id]);
        return $result->fetch();
    }
?>