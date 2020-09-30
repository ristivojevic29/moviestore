<?php

    $code = 404;
    $data = null;
        if(isset($_POST['btnPotvrdi'])){
            $firstName = $_POST['firstName'];
            $email = $_POST['email'];
            $lozinka = $_POST['lozinka'];
            $potvrdiLozinku=$_POST['potvrdiLozinku'];
            $lastName = $_POST['lastName'];
            $vremeReg = date("Y-m-d H:i:s", time());
           
             $reFirstName="/^[A-Z][a-z]{1,20}$/";
             $reLastName="/^[A-Z][a-z]{1,20}$/";
             $reEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
             $reLozinka = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

            $errors=[];
            if(!preg_match($reFirstName, $firstName)){
                 $errors[]="Wrong format of first name";
        }if(!preg_match($reLastName, $lastName)){
                 $errors[] = "Wrong format of last name";
        }
        if(!preg_match($reLozinka, $lozinka)){
            $errors[] = "Wrong format of password";
 }
    if($lozinka!=$potvrdiLozinku){
        $errors[]="Those passwords didn't match. Try again.";
    }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Wrong format of email";
    }
    if(count($errors)>0){
            $data = $errors;
            $code = 422;
            $podaciOGreskama=fopen(GRESKE_FAJL,"a+");
            for($i=0;$i<count($errors);$i++){
            fwrite($podaciOGreskama,$errors[$i]);

            }
            fclose($podaciOGreskama);
         } else{
            $lozinka=md5($lozinka);
             require_once "../../config/connection.php";

 
            $upitKorisnik = "SELECT idUloge FROM uloge WHERE nazivUloge='Korisnik'";
            $izvrsiUpitKorisnik = $conn->query($upitKorisnik)->fetch();
            $ulogaKorisnik = $izvrsiUpitKorisnik->idUloge;
 
            $upitInsert = "INSERT INTO korisnik VALUES(NULL,:firstName, :lastName, :email, :lozinka, 0, :vremeReg, :uloga)";
 

    $izvrsi = $conn->prepare($upitInsert);
    $izvrsi->bindParam(':firstName', $firstName);
    $izvrsi->bindParam(':lastName', $lastName);
    $izvrsi->bindParam(':email', $email);
    $izvrsi->bindParam(':lozinka', $lozinka);
    $izvrsi->bindParam(':vremeReg', $vremeReg);
    $izvrsi->bindParam(':uloga', $ulogaKorisnik);


    try{
    $code=$izvrsi->execute()?201:409;
    }catch(PDOException $e){
    echo $e->getMessage();
    $greska=$e->getMessage();
    $podaciOGreskama=fopen(GRESKE_FAJL,"a+");
       fwrite($podaciOGreskama,$greska);
       fclose($podaciOGreskama);
    }
 }
        }
    http_response_code($code);
    echo json_encode($data);

?>