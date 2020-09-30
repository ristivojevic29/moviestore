<?php
    //header("Location: ../index.php?page=Author");
    if(isset($_POST['author-to-word'])){
        include '../config/connection.php';
        $ime="Branislav_Ristivojevic";
        header("Content-type:application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=".$ime.".doc");
        header("Pragma:no-cache");
        header("Expires: 0");
        echo '<html><div class="contact-form">
        <div id="autorSlika">
            <img src='.ABSOLUTE_PATH.'"/assets/images/profilna.jpg" alt="autor"/>
         </div>
         <div id="autorTekst">
             <p>My name is Branislav Ristivojevic and i\'m from Ljig. I\'m 20 years old and i\'m student of ICT college.I love sports especially football and basketball. </p>
         </div>
          
      </div></html>';
    }
?>