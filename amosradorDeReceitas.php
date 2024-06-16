<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
        <h1 class="top">Receitas do dia</h1>
</div>
<div class="container">
    <?php 
        
        require_once "functions.php";
        $getReceita = getAllReceitas();
        
        if ($getReceita != false) {
            foreach ($getReceita as $receitas) {
                $nome = urlencode($receitas['nome']); // Encode recipe name for URL
                echo "<div class='receitaContainer'>";
                   echo "<a href='receita.php?nome={$nome}' class='receitaLink'>";
                        echo "<div class='receitaContainer'>";
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

.top{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 50px;
    text-align: center;
    margin-top: 3em;
    color: grey;
}
.container{
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    justify-content: center;
    padding: 5em 100em 10em 100em ;
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