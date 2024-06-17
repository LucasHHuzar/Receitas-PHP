<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
        }

        form {
            margin: 2em auto;
            width: 300px;
            padding: 2em;
            background-color: rgb(252, 43, 43);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 1em;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background-color: rgb(252, 43, 43);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: rgb(200, 0, 0);
        }
    </style>
</head>
<body>
    
    <h1>Login</h1>

    <?php 
        require_once "head.php";

        if(!is_null($usuario)){
            header("Location: index.php");
        }else{

            require_once "banco.php";

            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if(is_null($usuario) || is_null($senha)){

                require_once "form-login.php";

            }else{
                require_once "form-login.php"; 

                $busca = buscarUsuario($usuario);

                if($busca->num_rows == 0){
                    echo "<br> Usuário não existe";
                }else{
                 
                    header("Location: index.php");

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