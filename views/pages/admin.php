<?php
 if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->idUloge != 1){
            header("Location: index.php");
        }
    }else{
        header("Location:index.php");
    }
   
?>  
  
<div class="container">
    <div class="row">
        <h2>Users</h2>
        <table id="tabela">
            <tr>
                <th>ID</td>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>More</th>
            </tr>
            <tbody id="kor">

            </tbody>
        </table>
    </div>
    <div class="cleaner"></div>

    <div class="formaZaIzmenu">
    <h2>Update</h2>
    <form action="models/admin/update.php" method="POST">
        <div class="podaci">
            <input type="text" placeholder="First name" name="tbFirstName" id="tbFirstName" class="form-control">
        </div>
        <div class="podaci">
            <input type="text" placeholder="Last name" name="tbLastName" id="tbLastName" class="form-control">
        </div>
        <div class="podaci">
            <input type="text" placeholder="Email" name="tbEmail" id="tbEmail" class="form-control">
        </div>
        <div class="podaci">
            <input type="text" placeholder="Password" name="tbPassword" id="tbPassword" class="form-control">
        </div>
        <div class="podaci">
            <select id="ddlUloga" name="ddlUloga" class="form-control">
                <option value="0">Choose role</option>
                <?php
                 $ulogeUpit="SELECT * FROM uloge";
                  $uloge=executeQuery($ulogeUpit);
                    foreach($uloge as $uloga):
                ?>
                <option value="<?= $uloga->idUloge?>"><?= $uloga->nazivUloge?></option>
                    <?php endforeach;?>
            </select>
        </div>
        <div class="podaci">
            <input type="hidden"  name="hiddenKorisnikID" id="hiddenKorisnikID" class="form-control"/>
        </div>
        <input type="submit" name="btnIzmena" id="btnIzmena" value="Update" class="form-control"/>
                    </form>
    </div>
</div>


    <div id="dugme">
            <button id="dodaj"><a href="#">Add Movie</a></button>
        </div>
        <div class="unosProizvoda">
            <h2>Add Movie</h2>
            <form role="form" method="POST" enctype="multipart/form-data" action="models/admin/insert.php">
            <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="nazivFilma" id="nazivFilma" placeholder="Enter title.."/>
                    </div>
                    <div class="form-group">
                        <label>Image(200x200 for HQ)</label>
                        <input type="file" id="slikaFilma" name="slikaFilma" />
                    </div>
                    <div class="form-group">
                        <label>Alt attr</label>
                        <input type="text" id="altAttr" name="altAttr" placeholder="Enter alt attr.." />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="cena" id="cenaFilma" placeholder="Enter price..." />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="opis" name="opis"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="kategorija" id="ddlKategorija" class="form-group">
                        <?php
                 $upit="SELECT * FROM kategorije";
                  $kat=executeQuery($upit);
                    foreach($kat as $k):
                ?>
                <option value="<?= $k->idKategorije?>"><?= $k->nazivKategorije?></option>
                    <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" name="btnDodajFilm" id="btnDodajFilm" class="btnDodaj">Add</button>
        </form>
        </div>
        <div id="greskeFilm">

        </div>
        </div>
        <div id="onlajnKorisnici">
            <div id="brojUlogovanih">


            </div>
        <table id="tabelaOnlajnKorisnika">
            <tr>
                <th>ID</td>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            
        </table>
        </div>
        <div class="cleaner">
       
<script src="assets/js/modifikacije.js"></script>
