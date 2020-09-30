<?php
 session_start();
 require_once('config/connection.php');
 include("views/fixed/head.php");
 include("views/fixed/header.php");
 $page="";
 if(isset($_GET['page'])){
 $page=$_GET['page'];
 }
 switch($page){
 case "Home":
 include "views/pages/filmovi.php";
 break;
 case "Login":
 include "views/pages/login.php";
 break;
 case "Register":
 include("views/pages/register.php");
 break;
 case "Contact":
 include("views/pages/contact.php");
 break;
 case "Admin":
 include("views/pages/admin.php");
 break;
 case "Survey":
 include("views/pages/survey.php");
 break;
 case "Author":
 include "views/pages/author.php";
 break;
 
 default:
 include("views/pages/filmovi.php");
 break;
 }
 include "views/fixed/footer.php";
 ?>
 