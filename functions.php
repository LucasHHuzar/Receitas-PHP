<?php
require_once "banco.php";
require_once "upload.php";
    

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
       require_once "header.php";

      if(!isset($_SESSION['usuario']) || is_null($_SESSION['usuario'])){
           header("Location: login.php");
         exit;
       }

       }

       // funcao que esta recebendo os valoress de categorias e retornando esse valor
        function GetAllCategoria(){

           $categoria =  featchCategoria();
             return $categoria;
        }

        function deletarCategoria($categoria){

            $escolha = deletarCategoriaDb($categoria);
            return $escolha;

        }
?>