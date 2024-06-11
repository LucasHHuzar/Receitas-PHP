<?php
    function categoriaReceita(){
        
    }

    require_once "../../src/validation/uploads/upload.php";

    // funcao responsavel por criar a receita, no momento apenas faz upload do arquivo
    function cadastroReceita($nomePrato, $tipoPrato, $file) {
       
        // checka se o arquivo o formato esta correto e se o tamanho e maior que zero
        if ($file['size'] > 0) {
            // chama a funcao de fazer upload do arquivo
            uploadFile($file);
        } else {
            echo "No image uploaded.";
        }
    
    }

    function validarUsuario(){
        require_once "../validation/header.php";

        if(!isset($_SESSION['usuario']) || is_null($_SESSION['usuario'])){
            header("Location: login.php");
            exit;
        }

       }
?>