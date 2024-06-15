<?php
require_once "banco.php";
require_once "upload.php";

    // funcao responsavel por criar a receita, no momento apenas faz upload do arquivo
    function cadastroReceita($user, $nomePrato, $tipoPrato, $file, $conteudo) {
       $filePath = "";
        // checka se o arquivo o formato esta correto e se o tamanho e maior que zero
        if ($file['size'] > 0) {
            // chama a funcao de fazer upload do arquivo
           $filePath = uploadFile($file);

           if($filePath){
            //echo "File uploaded successfully. Path: " . $filePath;
           }

        } else {
          //  echo "No image uploaded.";
        }

        cadastrarNovaRaceita($user, $nomePrato, $tipoPrato, $filePath, $conteudo, true);

       // echo $nomePrato . $tipoPrato . $conteudo;

       return;
    
    }

    //funcao para validar o ususario para acesso a determinadas paginas apenas com login
   function validarUsuario(){
       require_once "header.php";

      if(!isset($_SESSION['usuario']) || is_null($_SESSION['usuario'])){
           header("Location: login.php");
         exit;
       }

       }

       function cadastrarNovaCategoria($user ,$categoria){

        cadastrarCategoria($user, $categoria, true);
            
            return;

       }

       // funcao que esta recebendo os valoress de categorias e retornando esse valor
        function GetAllCategoria($user){

           $categoria =  fetchUserCategoria($user);
             return $categoria;
        }

        function deletarCategoria($user, $categoria){

            $escolha = deletarCategoriaDb($user, $categoria);
            return $escolha;

        }
?>