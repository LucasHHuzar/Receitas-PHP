<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php 
        require_once "header.php";

        ?>
    </header>

    <section>
        <div>
        <h1 class="top">Receitas selecionadas para o seu gosto</h1>
        </div>
        <div  class="container" >
         <?php 
            require_once "functions.php";

           
            $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';


            $resultado = getReceitasPorCategoria($categoria);

        
            if ($resultado !== false) {
                foreach ($resultado as $receita) {

                    $nome = urlencode($receita['nome']);
                    $url = "receita.php?nome={$nome}"; 

                    echo "<div class='receitaContainer'>";
                       echo "<a href='{$url}' class='receitaLink'>";
                         echo "<div class='receitaContainer'>";
                             echo "<img src='" . htmlspecialchars($receita['file_path']) . "' alt='" . htmlspecialchars($receita['nome']) . "' class='receitaImage'>";
                             echo "<p>" . htmlspecialchars($receita['categoria']) . "</p>";
                             echo "<h2>" . htmlspecialchars($receita['nome']) . "</h2>";
                         echo "</div>";
                       echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No receitas found for categoria: " . htmlspecialchars($categoria);
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
    margin-top: 1em;
    color: grey;
}
.container{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    justify-content: start; /* Alinha os itens da grade à esquerda */
    padding: 5em 2em 10em 2em; /* Ajusta o padding para não empurrar o conteúdo para a direita */
    
}

.receitaImage{
    width: 600px;
    height: 400px;
    border-radius: 1em;
    transition: 500ms ease-in-out;
}

.receitaContainer{
    padding: 1em;
   
}
.receitaLink{
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    color: grey;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    transition: 300ms ease-in-out;
   
}
.receitaImage:hover{
    transform: scale(1.1);
    margin-bottom: 1em;
}
.receitaLink:hover{
    color: rgb(56, 66, 210);
    cursor: pointer;
  
}

</style>