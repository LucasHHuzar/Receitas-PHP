<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="element">
    <?php 
        
        require_once "functions.php";

        $getReceita = getAllReceitas();
        
        if ($getReceita != false) {
            foreach ($getReceita as $receitas) {
                $nome = urlencode($receitas['nome']); // Encode recipe name for URL
                echo "<div class='receitaContainer'>";
                echo "<a href='receita.php?nome={$nome}' class='receitaLink'>";
                echo "<div class='container'>";
                echo "<img src='" . htmlspecialchars($receitas['file_path']) . "' alt='" . htmlspecialchars($receitas['nome']) . "' class='receitaImage'>";
                echo "<p>" . htmlspecialchars($receitas['categoria']) . "</p>";
                echo "<h2>" . htmlspecialchars($receitas['nome']) . "</h2>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        }

        ?>

</div>
   
</body>
</html>

<style>


.element{
    padding: 10em;
    margin-left: 4.5em;
    display: flex;
    justify-content: center;
    font-family: Arial, Helvetica, sans-serif;

}
.receitaContainer{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1em;
    align-items: center;

}

.container{
    padding: 5em;
}

.receitaImage{
    width: 500px;
    height: 300px;
    padding: 1em;
    transition:  300ms ease-in-out;
}

.receitaImage:hover{
    width: 520px;
    height: 320px;
    cursor: pointer;
}

.contentInside{
    background-color: red;
}

</style>