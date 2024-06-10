<?php 
  function login(){
  
    /* intuito aqui sera verificar ssse o usuario esta logado se estiver
    ira apresentar a opcao the desslogar caso contrario tera a opcao de login 
    o mem oainda nao foi aplicado para cadastro no momento apresenta um erro 
    ao chamar  o header onde a secao foi iniciada ele da um erro*/
 
    require_once "../validation/header.php";

    if($usuario != null){
      echo "Deslogar";
    }else{
      echo "<a href=\"../../../../trabalho-php/Receitas-PHP/src/pages/login.php\">Login</a>";
    }

  }

  function cadastro(){
    echo "<a href=\"../../../../trabalho-php/Receitas-PHP/src/pages/cadastrar-usuario.php\">Cadastro</a>";
  }



?>