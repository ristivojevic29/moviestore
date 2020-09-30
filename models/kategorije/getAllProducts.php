<?php
    include "../../config/connection.php";
    include "functions.php";
    session_start();
    header("Content-Type: application/json");

    $record_per_page=10;
    $page='';
    $output='';

    if(isset($_POST['page'])){
        $page=$_POST['page'];
    }else{
        $page=1;
    }
    $start_from=($page-1)*$record_per_page;
    $upit=getAllProducts();
   // $rezultat=executeQuery($upit);
    if(isset($_POST['sort'])){
        // $upit=getAllProducts();
        $sort=$_POST['sort'];
        switch($sort){
            case 1:
            $upit.=" ORDER BY cena_filma ASC LIMIT ".$start_from.",".$record_per_page;
            break;
            case 2:
            $upit.=" ORDER BY cena_filma DESC LIMIT ".$start_from.",".$record_per_page;
            break;
        }
    }else if(isset($_POST['id'])){
        $id=$_POST['id'];
        $upit.=" WHERE idKategorije=".$id."  LIMIT ".$start_from.",".$record_per_page;
    }else{
        $upit.=" LIMIT ".$start_from.",".$record_per_page;
    }
    $rezultat=executeQuery($upit);
    
    $query=getAllProducts();
    $result=executeQuery($query);
    $movies=$rezultat;
    foreach($movies as $m){
        $output.='<div class="grid_1_of_5 images_1_of_5">
        <a href=""><img src="'.$m->putanja_slike.'" alt="'.$m->alt_slike.'" /></a>
        <h2 class="film"><a>'.$m->naziv_filma.'</a></h2>
            <div class="price-details">
                <div class="price-number">
                    <p><span class="rupees">$'.$m->cena_filma.'</span></p>
                </div>
                <div class="add-cart">								
                    <h4><a href="#" data-idf="'.$m->idFilma.'" class="view">View</a></h4>
                </div>';
            if(isset($_SESSION['korisnik'])){
                $output.='<div class="add-cart">								
                <h4><a href="#" data-id="${p.idFilma}"  class="add-to-cart">Add to Cart</a></h4>
            </div>';

            }else{
                $output.='<div class="no-add">								
                <h4><a href="index.php?page=Login" class="">Add to Cart</a></h4>
                 </div>';
            }                
                    
                $output.='<div class="clear"></div>
         </div>					 
    </div>';
    }
    $total_records=count($result);
    $total_pages=ceil($total_records/$record_per_page);
        $output.='<div id="blokPag" style="margin-left:50%;">';
     for($i=1;$i<=$total_pages;$i++){
          $output.="<span class='pagination_link' style='cursor:pointer; color:orange; padding:6px; border:1px solid #ccc' id='".$i."'>".$i."</span>";
      }
      $output.="</div>";
     
        echo json_encode($output);
        
        
?>