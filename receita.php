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

            // Check if nome parameter exists in the URL
            if (isset($_GET['nome'])) {
                $nome = $_GET['nome'];
                
                // Call function to fetch recipe details based on nome
                $receita = getReceitaPorNome($nome);

                // Check if recipe was found
                if ($receita !== false) {
                    // Display recipe details
                    foreach ($receita as $recipe) {
                        echo "<div class='receitaDetalhada'>";
                        echo "<h2>" . htmlspecialchars($recipe['nome']) . "</h2>";
                        echo "<p>Categoria: " . htmlspecialchars($recipe['categoria']) . "</p>";
                        echo "<img src='" . htmlspecialchars($recipe['file_path']) . "' alt='" . htmlspecialchars($recipe['nome']) . "' class='detalheImagem'>";
                        echo "<p>Conteúdo: " . htmlspecialchars($recipe['conteudo']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "Receita não encontrada.";
                }
            } else {
                echo "Nome da receita não especificado.";
            }
        ?>
    </section>
</body>
</html>