<?php
 function displayMenu($a,$b,$opt_a=NULL){
     return "SELECT * FROM meni WHERE idMeni in('$a','$b','$opt_a')";
 }
?>
