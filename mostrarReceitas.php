<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
            foreach ($getReceita as $receitas)  {
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
    grid-template-columns: repeat(4, 1fr);
    justify-content: center; 

   
}


@media only screen and (max-width: 600px) {
    .container{
   
    grid-template-columns: repeat(1, 1fr);
   
}
}

/* Tablets */
@media only screen and (min-width: 601px) and (max-width: 768px) {
    .container{
   
    grid-template-columns: repeat(2, 1fr);
   
}
}

/* Laptops e desktops de tamanho médio */
@media only screen and (min-width: 769px) and (max-width: 1200px) {
    .container{
   
    grid-template-columns: repeat(2, 1fr);
   
}
}

/* Desktops grandes */
@media only screen and (min-width: 1201px) {

    .container{
  
    grid-template-columns: repeat(4, 1fr);
   
}
  
}

.receitaImage{
    width: 600px;
    height: 400px;
    border-radius: 1em;
    transition: 500ms ease-in-out;
}

.receitaContainer{
    padding: 1em;
text-align: center;
   
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