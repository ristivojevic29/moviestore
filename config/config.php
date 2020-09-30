<?php
    define("BASE_URL", "http://localhost/phpSajt");
    define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/phpSajt");

    define("ENV_FAJL",ABSOLUTE_PATH."/config/.env");
    define("LOG_FAJL",ABSOLUTE_PATH."/data/log.txt");
    define("GRESKE_FAJL",ABSOLUTE_PATH."/data/greske.txt");
    define("SERVER",env("SERVER"));
    define("DATABASE",env("DATABASE"));
    define("USERNAME",env("USERNAME"));
    define("PASSWORD",env("PASSWORD"));

   
    function env($naziv){
        $file=file(ENV_FAJL);
        $vrednost="";
        
        foreach($file as $key=>$value){
            $konfig=explode("=",$value);
            if($konfig[0]==$naziv){
                $vrednost=trim($konfig[1]);
            }
        }
        return $vrednost;
    }
?>