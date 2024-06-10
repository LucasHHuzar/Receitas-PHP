<?php
    function categoriaReceita(){
        
    }

    function cadastroReceita(){

    }

    function validarUsuario(){
        require_once "../validation/header.php";

        if(!isset($_SESSION['usuario']) || is_null($_SESSION['usuario'])){
            header("Location: login.php");
            exit;
        }

       }
?>