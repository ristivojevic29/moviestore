<?php
    include "models/functions.php";
     $meniUpit =displayMenu(1,5);
     $meni=executeQuery($meniUpit);
     ?>
   <div class="nav_list">
    <ul>
      <li><a href="sitemap.xml">Sitemap</a></li>
    <?php foreach($meni as $meniLink): ?>
    <li><a href="index.php?page=<?= $meniLink->linkName?>"><?= $meniLink->linkName ?></a></li>
    <?php endforeach;?>
    <?php
    if(isset($_SESSION['korisnik'])):
    ?>
    <li><a href='models/log/logout.php'>Logout <?=  $_SESSION['korisnik']->ime ?></a></li>
    <?php endif; ?>
    <?php
    if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->idUloge=="1"):
    ?>
    <li><a href="index.php?page=Admin">Admin Panel</a></li>
    <?php endif; ?>
    </ul>
  <div class='cleaner'></div>
    </ul>
    </div>
   <?php if(isset($_SESSION['korisnik'])): ?>
<?php $meniUpit =displayMenu(6,9);
     $meni=executeQuery($meniUpit);
     ?>
					<div class="account_desc">
                    <ul>
    <?php foreach($meni as $meniLink): ?>
    <li><a href="index.php?page=<?= $meniLink->linkName?>"><?= $meniLink->linkName ?></a></li>
    <?php endforeach;?>
  <div class='cleaner'></div>
    </ul>
    </div>
    </div>
    <?php endif;?>
    <?php if(!isset($_SESSION['korisnik'])): ?>
    <?php $meniUpit =displayMenu(2,3,6);
     $meni=executeQuery($meniUpit);
     ?>
					<div class="account_desc">
                    <ul>
    <?php foreach($meni as $meniLink): ?>
    <li><a href="index.php?page=<?= $meniLink->linkName?>"><?= $meniLink->linkName ?></a></li>
    <?php endforeach;?>
  <div class='cleaner'></div>
    </ul>
    </div>
    </div>
    <?php endif;?>