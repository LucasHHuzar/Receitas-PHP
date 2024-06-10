<?php

    function categoriaReceita(){

    }

    function cadastroReceita(){
        
       validarUsuario();

    }

    function validarUsuario(){

        require_once "header.php" ;

        echo $usu;

    //    if($usu == null){

    //        header("Location: login.php");

    //    }else{

    //        header("Location: cadastro-receitas.php");
        
    //    }

    }

?>