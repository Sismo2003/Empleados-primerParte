<?php

    define("HOST",'localhost');
    define("BD",'empresa01');
    define("USER_BD",'root');
    define("PASS_BD",'Ao370781');
    
    function conecta(){
        $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
        return $con;
    }



?>