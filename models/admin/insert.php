<?php
     header("Location: ../../index.php?page=Admin");
    header("Content-type:application/json");
    define("FILE_SIZE",2000000);
    $allowedTypes=['image/png','image/jpeg'];
    if(isset($_POST['btnDodajFilm'])){
       // echo "ssssssssss";
        require_once "../../config/connection.php";
        $fileName=$_FILES['slikaFilma']['name'];
        $fileSize=$_FILES['slikaFilma']['size'];
        $fileType=$_FILES['slikaFilma']['type'];
        $tmpName=$_FILES['slikaFilma']['tmp_name'];
        $errors=[];
            echo "Sss";
        if(!in_array($fileType,$allowedTypes)){
            array_push($errors,"Tip fajla nije odgovarajuci");
        }elseif($fileSize>FILE_SIZE){
            array_push($errors,"Preveliki fajl");
        }
        if(count($errors)==0){
            list($sirina,$visina)=getimagesize($tmpName);
            $postojecaSlika=null;

            $postojecaSlika = null;
            switch($fileType){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($tmpName);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($tmpName);
                break;
        }
        $novaSirina = 200;
        $novaVisina = 200;
            $novaSlika=imagecreatetruecolor($novaSirina,$novaVisina);
            imagecopyresampled($novaSlika,$postojecaSlika,0,0,0,0,$novaSirina,$novaVisina,$sirina,$visina);
            
            $fajl=time()."_".$fileName;
            $putanjaNovaSlika="assets/images/nova_".$fajl;
            
            
            switch($fileType){
                case 'image/jpeg':
                    imagejpeg($novaSlika, '../../'.$putanjaNovaSlika, 75);
                    break;
                case 'image/png':
                    imagepng($novaSlika, '../../'.$putanjaNovaSlika);
                    break;
            }
            $putanjaOriginalnaSlika = 'assets/images/'.$fajl;
            if(move_uploaded_file($tmpName, '../../'.$putanjaOriginalnaSlika)){
                echo "Slika je upload-ovana na server!";
    
                try {
                    $naziv=$_POST['nazivFilma'];
                    $kategorije=$_POST['kategorija'];
                    $cena=$_POST['cena'];
                    $alt=$_POST['altAttr'];
                    $opis=$_POST['opis'];
                    $upit="INSERT INTO filmovi(naziv_filma,cena_filma,putanja_slike,alt_slike,opis,idKategorije)
                    VALUES(:naziv,:cena,:slika,:alt,:opis,:kategorija);";
        
                    $stmt=$conn->prepare($upit);
                    $stmt->bindParam(":naziv",$naziv);
                    $stmt->bindParam(":cena",$cena);
                    $stmt->bindParam(":kategorija",$kategorije);
                    $stmt->bindParam(":slika",$putanjaNovaSlika);
                    $stmt->bindParam(":alt",$alt);
                    $stmt->bindParam(":opis",$kategorije);
                    $stmt->execute();
                    if($stmt->rowCount()){
                        $poruka="Uspesan upis.";
                        //header("Location:../../index.php?page=Admin");
                    }
    
                    
                    
                } catch(PDOException $ex){
                    echo $ex->getMessage();
                }
            }
    
            // brisanje iz memorije
            imagedestroy($postojecaSlika);
            imagedestroy($novaSlika);
    
        } else {
            var_dump($errors);
        }
            
        }
    

?>