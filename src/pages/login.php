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
        require_once "../validation/header.php";

        if(!is_null($usuario)){
            header("Location: ../../index.php");
        }else{

            require_once "../database/banco.php";

            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if(is_null($usuario) || is_null($senha)){

                require_once "../forms/form-login.php";

            }else{
                require_once "../forms/form-login.php"; // para testes

                $busca = buscarUsuario($usuario);

                if($busca->num_rows == 0){
                    echo "<br> Usuário não existe";
                }else{
                 
                    header("Location: ../../index.php");

                     $obj = $busca->fetch_object();

                    if(password_verify($senha, $obj->senha)){
                        $_SESSION["usuario"] = $usuario;
                    }else{
                        echo "<br> Sem sucesso :/";

                    }

                }
                
            }
      }
    ?>

</body>
</html>