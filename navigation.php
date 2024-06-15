<?php 
 

    function cadastrarCtegoria(){

        echo "<a href=\"cadastro-receitas.php\" class=\"user-menu\">Administrar receitas</a>";
    
    }

    function cadastroDeCategoria(){
        echo "<a href=\" cadastro-categoria.php\"  class=\"user-menu\">Administrar categorias</a>";
    }


    function login(){
     
        echo "<a href=\"login.php\"  class=\"user-menu\">Login</a>";
        
    }

    function cadastro(){
        
       
        echo "<a href=\"cadastrar-usuario.php\"  class=\"user-menu\">Cadastro</a>";
       
       
    }

    function logout(){
        echo "<a href=\"logout-usuario.php\"  class=\"user-menu\">Deslogar</a>";
    }

?>

<style>
.user-menu{
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    color: grey;
    padding: 0.5em 1em;
}

.user-menu:hover{
    cursor: pointer;
    background-color: rgb(56, 66, 210);
    color: white;
    border-radius: 1em;

}

</style>