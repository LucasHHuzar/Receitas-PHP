<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<header>
    <?php require_once "header.php"; ?>
</header>

<div class="inputCategoria">
    <form action="" method="post">
        <div class="info">
            <div div class="p">
                <p>Deletar Receita</p>
            </div>
        </div>
    
        <div class="inputsElementsInDeletar">
            <input class="input" type="text" name="receitaAdeletar">
            <button class="button" type="submit">Deletar</button>
        </div>
    </form>
</div>

<?php 

require_once "head.php";
require_once "functions.php";

if (!isset($_SESSION['usuario'])) {
    echo 'Erro: Usuário não está logado.';
    exit;
}

    $usuario = $_SESSION['usuario'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['receitaAdeletar'])) {
        $nomeReceita = $_POST['receitaAdeletar'];
        deletarReceitaDoUsuario($usuario, $nomeReceita);
    } else {
       //echo 'Erro: Nome da receita a deletar não foi fornecido.';
    }

?>

<section>
    <div class="container">
        <?php 

        $getUsuarioReceita = fetchDeReceitasPorUsuario($usuario);

        if($getUsuarioReceita != false) {
            foreach ($getUsuarioReceita as $userReceita){
                echo "<div class='receitaContainer'>";

                    echo "<div class='receitaContainer'>";

                        echo "<img src='" . htmlspecialchars($userReceita['file_path']) . "' alt='" . htmlspecialchars($userReceita['nome']) . "' class='receitaImage'>";
                             
                        echo "<div class='contentondeltear'>";
                        echo "<p>" . htmlspecialchars($userReceita['categoria']) . "</p>";
                            
                        echo "</div>";
                        echo "<h2>" . htmlspecialchars($userReceita['nome']) . "</h2>";

                    echo "</div>";

                echo "</div>";
            }
        }
        
        ?>
    </div>
</section>

</body>
</html>

<style>
    .top{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
        text-align: center;
        margin-top: 3em;
        color: grey;
    }

    .container{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        justify-content: center;
        padding: 5em 50em 10em 50em ;
        font-family: Arial, Helvetica, sans-serif;
    }

    .receitaImage{
        width: 250px;
        height: 200px;
        border-radius: 1em;
        transition: 500ms ease-in-out;
    }

    .receitaContainer{
        padding: 1em;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .contentondeltear{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .receitaLink{
        text-decoration: none;
        font-family: Arial, Helvetica, sans-serif;
        color: grey;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        transition: 300ms ease-in-out;
    
    }

    .input{
        width: 500px;
        height: 50px;
        padding: 1em;
        border: none;
        background-color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 3em;
        outline: none;
        font-family: Arial, Helvetica, sans-serif;
    }

    .button{
        background-color: rgb(252, 43, 43);
        border: none;
        padding: 1em;
        color: white;
        font-size: 15px;
        border-radius: 1em;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        width: 200px;
    }

    .inputCategoria{
       display: flex;
       justify-content: center;
       padding: 10em 3em;
       align-items: center;
       gap: 2em;
       font-family: Arial, Helvetica, sans-serif;
    }
    
    .inputsElementsInDeletar{
        display: flex;
        align-items: center;
        gap: 2em;
    }

    
    .p{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        color:rgb(154, 154, 154);
        top: -95px;
        left: 60px;
        width: 300px;
        font-size: 20px;
       
    }
</style>