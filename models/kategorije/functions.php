<?php
    // function getProducts($start_from,$record_per_page){
    //     return "SELECT * FROM filmovi LIMIT ".$start_from.",".$record_per_page;
    // }
   function getCategories(){
       return "SELECT * FROM kategorije";
   }
   function getAllProducts(){
       return "SELECT * FROM filmovi";
   }
?>