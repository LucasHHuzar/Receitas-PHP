
<?php 

   require_once "functions.php";
 //  require_once "head.php";
   validarUsuario();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
// incluindo os arquivos nescessario
require_once "form-cadastrarCategoria.php";
require_once "banco.php";
require_once "functions.php";
require_once "head.php";

//checkaa secao domeu usuario para passar o valor de usuario comoparametropara funcoes
if (!isset($_SESSION['usuario'])) {
    echo 'Erro: Usuário não está logado.';
    exit;
}

$usuario = $_SESSION['usuario'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //checka a acao passada
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            
            //checka a acao escolhidda para determinar a operacao
            if ($action === 'cadastrar') {
                //cadastrar nova categoria no banco
                if (isset($_POST['categoria'])) {
                    $categoria = $_POST['categoria'];


        /* chama funcao de cadastrar categoria passando o parametro
         $usuario e $categoria isso garante que o id do usuario sera passado junto */
                   cadastrarNovaCategoria($usuario, $categoria);
                } else {
                    echo 'Erro: Categoria não especificada.';
                }
            } elseif ($action === 'deletar') {
    
         
                $categoria = $_POST['categoria'];
                deletarCategoria($usuario, $categoria);
    
            } else {
                echo 'Ação não reconhecida.';
            }
        } else {
            echo 'Ação não especificada.';
        }
}


?>

<h1 class="categoriasTitule">Categorias Cadastradas</h1>
<div class="categorias-cadastradas">
    <?php 
        
       
    /* featch das categorias na pagina, passado o id do usuaruio para que o featch
    contenha apenas as categorias desse ususario*/
        $categoria = GetAllCategoria($usuario);

        if ($categoria != false) {
            foreach ($categoria as $categorias) {
                echo '<div class="categories" value="' . htmlspecialchars($categorias['categoria']) . '">';
                echo '<div class="category-content">' . htmlspecialchars($categorias['categoria']) . '</div>'; // Assuming this is the content of your div

                echo '</div>';
            }
        }
        
        ?>


</div>
   
<style>
    .categorias-cadastradas{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        justify-content: center;
        gap: 1em;
        padding: 1em 10em;
    }

    .categories{
        padding: 3em;
        background-color: white;
        justify-content: center;
        text-align: center;
        color:rgb(154, 154, 154);
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 1em;
        transition: 300ms ease-in-out;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
    }

    .categories:hover{
        cursor: pointer;
        background-color: rgb(56, 66, 210);
        color: white;
    }

    .categoriasTitule{
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 8em;
        font-size: 20px;
        color:rgb(154, 154, 154);
    }

  
    
</style>

</body>
</html>