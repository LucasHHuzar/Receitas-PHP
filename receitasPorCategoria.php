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
    <?php 
require_once "functions.php";

// Retrieve categoria from URL query string
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Call function to fetch receitas based on categoria
$resultado = getReceitasPorCategoria($categoria);

// Now you can iterate through $resultado and display the receitas
if ($resultado !== false) {
    foreach ($resultado as $receita) {
        // Display each receita with a clickable link
        $nome = urlencode($receita['nome']);
        $url = "receita.php?nome={$nome}"; // Replace with your receita page URL

        echo "<div class='receitaContainer'>";
        echo "<a href='{$url}' class='receitaLink'>";
        echo "<div class='container'>";
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
    </section>

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
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
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