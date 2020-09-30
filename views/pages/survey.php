<?php
   
    if(!isset($_SESSION['korisnik'])){
        header("Location: ../index.php?page=Home");
    }
    
    $id=$_SESSION['korisnik']->idKorisnik;
    $upit="SELECT idKorisnik FROM korisnik_odgovor WHERE idKorisnik=$id";
    $rezultat=$conn->query($upit);
    $korisnik=$rezultat->fetchAll();
    foreach($korisnik as $k){
        $idKorisnik=$k->idKorisnik;
    }
?>  
<?php if(!isset($idKorisnik)):?>
<div id="okvir">
    <div id="anketa">
        <h1>Take Survey</h1>
        <?php
        $upit = "SELECT * FROM anketa WHERE aktivna = 1";
        $ankete = $conn->query($upit)->fetchAll();
        foreach($ankete as $anketa):
?>
    <div id="pitanje">
        <p class="que"><?= $anketa->pitanje?></p>
    </div>
        <?php endforeach;?>
    
    <div id="odgovori">
        <form method="POST" action="models/anketa.php">
            <?php
                $upit="SELECT* FROM odgovori";
                $rezultat=$conn->query($upit);
                $odgovori=$rezultat->fetchAll();
                foreach($odgovori as $odg):
            ?>
            <div class="polja">
            <input type="radio" value="<?=$odg->id?>" class="buttons" name="answer"><?=$odg->odgovor?>
            </div>
                <?php endforeach;?>
                <input type="hidden" id="idK" name="idK" value="<?= $id?>"/>
              <input type="submit" id="btnAnketa" name="btnAnketa" value="Submit"/>
        </form>
    </div>
                </div>
</div>
                <?php endif;?>
 <?php if(isset($idKorisnik)):?>              
                <div id="okvir">
    <div id="anketa">
        <h1>Results</h1>
    <div id="pitanje">
    <?php
        $upit="SELECT COUNT(idOdgovor) AS br from korisnik_odgovor WHERE idOdgovor=1";
        $rezultat=$conn->query($upit);
        $upit1="SELECT COUNT(idOdgovor) AS br from korisnik_odgovor WHERE idOdgovor=2";
        $rezultat1=$conn->query($upit1);
        $upit2="SELECT COUNT(idOdgovor) AS br from korisnik_odgovor WHERE idOdgovor=3";
        $rezultat2=$conn->query($upit2);
       foreach($rezultat as $odg):
        foreach($rezultat1 as $odg1):
            foreach($rezultat2 as $odg2):
    ?>   
       <p class="brojOdgovora">Every Day: <?= $odg->br?></p>
       <p class="brojOdgovora">Every Week: <?= $odg1->br?></p>
       <p class="brojOdgovora">Every Month: <?= $odg2->br?></p>
       <?php endforeach;?>
       <?php endforeach;?>
       <?php endforeach;?>
    </div>
         <div id="odgovori">
        
        
    </div>
                </div>
</div> 
        <?php endif;?>