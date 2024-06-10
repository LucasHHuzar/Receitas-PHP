<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h1>Login</h1>

    <?php 
        
        require_once "header.php";

        if(!is_null($usuario)){
            
            // estou logado
            header("Location: index.php");
 
        }else{

            require_once "banco.php";

            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if(is_null($usuario) || is_null($senha)){

                require_once "form-login.php";

            }else{
                require_once "form-login.php"; // para testes

                echo "~ [usu: $usuario - Senha: $senha] ~ <br>";

                $busca = buscarUsuario($usuario);

                if($busca->num_rows == 0){
                    echo "<br> Usuário não existe";
                }else{
                    echo "<br> boa";
                    
                    $obj = $busca->fetch_object();
                    echo "<br>" . $obj->usuario;
                    echo "<br>" . $obj->nome;
                    echo "<br>" . $obj->senha;

                    // if($senha === $obj->senhaha){
                    if(password_verify($senha, $obj->senha)){
                        echo "<br> sucesso!";

                        $_SESSION["usuario"] = $usuario;

                        //header("Location: index.php");

                    }else{

                        echo "<br> Sem sucesso :/";

                    }

                }
                
            }
      }
    ?>

</body>
</html>