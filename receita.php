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
        <div class="receita">
        <?php
            require_once "functions.php";


            if (isset($_GET['nome'])) {
                $nome = $_GET['nome'];
                
                
                $receita = getReceitaPorNome($nome);


                if ($receita !== false) {

                    foreach ($receita as $recipe) {
                        echo "<div class='receitaDetalhada'>";
                                echo "<h2 class='top'>" . htmlspecialchars($recipe['nome']) . "</h2>";
                                echo "<p class='categoriaReceita'>". htmlspecialchars($recipe['categoria']) . "</p>";
                                echo "<img src='" . htmlspecialchars($recipe['file_path']) . "' alt='" . htmlspecialchars($recipe['nome']) . "' class='detalheImagem'>";
                                echo "<p class='conteudoReceita'>" . htmlspecialchars($recipe['conteudo']) . "</p>";
                            echo "</div>";
                    }
                } else {
                    echo "Receita não encontrada.";
                }
            } else {
                echo "Nome da receita não especificado.";
            }
        ?>
        </div>
          
    </section>
</body>
</html>

<style>
.receita{
    text-align: center;
    display: flex;
    justify-content: center;
}

.top{
    margin-top: 2em;
    font-size: 50px;
    color: grey;
}

.categoriaReceita{
    font-size: 25px;
    margin-right: 30em;
}

.detalheImagem{
    width: 800px;
    height: 500px;
}

.conteudoReceita {
    font-size: 40px;
    max-width: 60em;
    text-align: center;
margin: 1em 30em;
}
</style>