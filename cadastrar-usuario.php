<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1 class="titulos">Cadastrar Novo usuário</h1>

    <?php 

        require_once "banco.php";


        $usuario = $_POST['usuario'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if(is_null($usuario) || is_null($senha)){

            require_once "form-cadastro.php";

        }else{

            echo "~ [usuario: $usuario - nome: $nome - senha: $senha] ~ <br>";

            criarusuario($usuario, $nome, $senha, false);
            
            echo "<h2>Usuário Criado</h2>";            
        }

    ?>

</body>
</html>