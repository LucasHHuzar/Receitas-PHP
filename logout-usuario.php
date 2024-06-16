<?php

    require_once "header.php";

    unset($_SESSION["usuario"]);
    unset($_SESSION["cod_usuario"]);


    
        session_destroy();

        header("Location: index.php");

        exit; 

?>