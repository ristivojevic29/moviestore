<?php
   if(isset($_GET['page'])){
       $page=$_GET['page'];
   }else{
      $page="Home";
   }
?>
<!DOCTYPE HTML>
<head>
<title>Mstore | <?= $page?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keyword" content="Add to Cart,Home,Checkout,Register,Login"/>
<meta name="description" content="Shop the latest movies at M-Store. Buy the best movies"/>
<meta name="autor" content="mailto:branislav.ristivojevic.134.17@ict.edu.rs"/>

<link rel="shortcut icon" href="assets/images/logok.ico">
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="assets/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script type="text/javascript" src="assets/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>