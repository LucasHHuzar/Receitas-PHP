<?php


    function cabecalho(){
        echo "<a href=\"cadastrar-usuario.php\">Cadastro</a>";
        echo "<a href=\"login.php\">Login</a>";
        echo "<a href=\"logout-usuario.php\">Logout</a>";
        echo "<a href=\"cadastro-receitas.php\">Cadastro de Receitas</a>";
        echo "<a href=\"index.php\">Home</a>";
        
        validarUsuario();
    }

    function categoriaReceita(){
        
    }

    function cadastroReceita(){

    }

    function validarUsuario(){
        require_once "./header.php";
                if(!is_null($usuario)){
                        echo "usuario " . $usuario;
                    return header("location: cadastro-receitas.php");
                }
        }
?>