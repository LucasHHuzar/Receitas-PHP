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
        <h1 class="titutlo">Todas ass categorias</h1>
        <div class="categories">
        <?php
           require_once "functions.php";
           $fetch = getAllCategorias();
           
           if ($fetch !== false) {
               foreach ($fetch as $featch) {
                   $categoria = urlencode($featch['categoria']);
                   $url = "receitasPorCategoria.php?categoria={$categoria}";
                   echo "<a href='{$url}' class='categoriaFeach'>" . htmlspecialchars($featch['categoria']) . "</a>";
               }
           }

        ?>
         </div>
    </section>
</body>
</html>


<style>

.categories{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1em;
    align-items: center;
    margin-left: 14em;
    margin-top: 5em;
}

.categoriaFeach{
    background-color: white;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
    padding: 3em;
    width: 300px;
    text-align: center;
    font-size: 20px;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    color: grey;
    border-radius: 1em;
}

.categoriaFeach:hover{
    cursor: pointer;
    background-color: rgb(56, 66, 210);
    color: white;
}

.titutlo{
    margin-top: 5em;

    font-family: Arial, Helvetica, sans-serif;
        margin-left: 12em;
        font-size: 20px;
        color:rgb(154, 154, 154);
}
</style>