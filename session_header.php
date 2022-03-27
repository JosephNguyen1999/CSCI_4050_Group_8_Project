<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_SESSION['loginst'])){
        $_SESSION['loginst'] = 0;
    }

    

?>