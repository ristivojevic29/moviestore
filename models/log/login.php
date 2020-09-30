<?php
    
    if(isset($_SESSION['korisnik'])){
    header("Location: ../../index.php");
    }
    session_start();
    require_once "../../config/connection.php";
    include "functions.php";
    if(isset($_POST['login']))
    {
    $email=$_POST['email'];
    $lozinka =$_POST['lozinka'];
    
    $reEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
    $reLozinka = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    $errors=[];

    if(!preg_match($reEmail, $email))
    {
    $errors[]= "Email nije u dobrom formatu.";
    }
    if(!preg_match($reLozinka, $lozinka))
    {
    $errors[] = "Lozinka nije u dobrom formatu.";
    }
    if(count($errors) > 0)
     {
        $podaciOGreskama=fopen(GRESKE_FAJL,"a+");
            for($i=0;$i<count($errors);$i++){
            fwrite($podaciOGreskama,$errors[$i]);

            }
            fclose($podaciOGreskama);
    }
 else
 {
    $lozinka=md5($lozinka);
    try{
       $user=getUser($email,$lozinka);
        if($user){ 
            
            $_SESSION['korisnik'] = $user;
            $bit=1;
            $id=$_SESSION['korisnik']->idKorisnik;
            updateUser($bit,$id);
            // $queryUpdate="UPDATE korisnik SET aktivan=:aktivan WHERE idKorisnik=".$_SESSION['korisnik']->idKorisnik;
            // $stmt=$conn->prepare($queryUpdate);
            // $stmt->bindParam(':aktivan',$bit,PDO::PARAM_BOOL);
            // $stmt->execute();
            header("Location: ../../index.php");
            if($_SESSION['korisnik']->idUloge == 1){
                header("Location: ../../index.php?page='Admin'");
} else {
    header("Location: ../../index.php?page='Login'");
    }
    exit;}
        else{
        
        http_response_code(409);}
 }
 catch(PDOException $e){
 echo "Greska! " . $e->getMessage();
    $greska=$e->getMessage();
 $podaciOGreskama=fopen(GRESKE_FAJL,"a+");
    fwrite($podaciOGreskama,$greska);
    fclose($podaciOGreskama);
}
 }

 }
?>