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

        if(!is_null($usu)){

            // estou logado
            header("Location: index.php");

            echo session_id();

        }else{

            require_once "banco.php";

            $usu = $_POST['usu'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if(is_null($usu) || is_null($senha)){

                require_once "form-login.php";

            }else{
                
                require_once "form-login.php"; // para testes

                echo "~ [usu: $usu - Senha: $senha] ~ <br>";

                $busca = buscarUsuario($usu);

                if($busca->num_rows == 0){
                    echo "<br> Usuário não existe";
                }else{
                    echo "<br> boa";
                    
                    $obj = $busca->fetch_object();
                    echo "<br>" . $obj->usu;
                    echo "<br>" . $obj->nome;
                    echo "<br>" . $obj->senha;

                    // if($senha === $obj->senhaha){
                    if(password_verify($senha, $obj->senha)){

                        echo "<br> sucesso!";

                        $_SESSION["usu"] = $usu;

                        //header("Location: index.php");

                    }else{

                        echo "<br> Sem sucesso :/";

                    }

                }

                
            }
            // ["usu" => "zezinho", "senhaha" => "senhaha47"],
            // echo "<br>".  password_hash("senhaha47", PASSWORD_DEFAULT);
      }
    ?>

</body>
</html>