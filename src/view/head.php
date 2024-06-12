<?php 

  /* problema com essa funcao de acesso, so funcionam se estiver logado, nao corrigido ainda
  para testar so colocar o caminho do fomulario de fazer login  http://localhost/trabalho-php/Receitas-PHP/src/pages/login.php
  para logar */
  function login(){
    //invocando pagina de login
      echo "<a href=\"../../../../trabalho-php/Receitas-PHP/src/pages/login.php\">Login</a>";
  }

  function cadastro(){
    // invocando pagina de cadastro de usuario
    echo "<a href=\"../../../../trabalho-php/Receitas-PHP/src/pages/cadastrar-usuario.php\">Cadastro</a>";
  }

  function cadastroDeReceitas(){
  // invocando pagina para cadastrar receitas
    echo "<a href=\"../../../../trabalho-php//Receitas-PHP//src//pages//cadastro-receitas.php\">Cadastrar Receita</a>";
  }

  function cadastrarCtegoria(){
    // invocando pagina para cadastrar receitas
      echo "<a href=\"../../../../trabalho-php//Receitas-PHP//src//pages//cadastro-categoria.php\">Cadastrar Categoria</a>";
    }
?>