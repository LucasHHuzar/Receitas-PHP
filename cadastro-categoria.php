
<?php 

   require_once "functions.php";

   validarUsuario();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Include necessary files
require_once "form-cadastrarCategoria.php";
require_once "banco.php";
require_once "functions.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'action' is set in $_POST
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
        // Check the value of 'action' to determine the operation
        if ($action === 'cadastrar') {
            // Cadastrar operation (add category)
            if (isset($_POST['categoria'])) {
                $categoria = $_POST['categoria'];
                cadastrarCategoria($categoria, true); // Function to add category
            } else {
                echo 'Erro: Categoria não especificada.';
            }
        } elseif ($action === 'deletar') {

            $categoria = $_POST['categoria'];
            deletarCategoria($categoria);

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
        
       

        $categoria = GetAllCategoria();

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
        grid-template-columns: repeat(5, 1fr); /* Default setting for larger screens */
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
        margin-left: 1.5em;
        font-size: 20px;
        color:rgb(154, 154, 154);
    }

  
    
</style>

</body>
</html>