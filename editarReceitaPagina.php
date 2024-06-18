<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<header>
    <?php require_once "header.php"?>
</header>
    <section>
        <div class="info">

            <div class="p">
        
            <form action="" method="post" enctype="multipart/form-data" class="funcoesAdicionais">
                    <!-- onde passamos o nome da receita que deesejamos editar -->
                 <input class="inputsText" type="text" name="nomeAeditar" placeholder="nome da receita que deseja deletar">
             
                    <!-- onde passamos o nome da receita editada caso queira passar -->
               <input class="inputsText" type="inputsText" name="nomeReceita" placeholder="editar nome" >
                        <!-- onde passamos o imagen da receita editada caso queira passar -->
             
            
                <select class="selector" id="tipoPrato" name="tipoPrato">
                <?php
                        $categoria = getAllCategorias();

                        if($categoria != false) {
                            //loop para pegar as categorias e criar um elemento tipo option com os dados
                        foreach($categoria as $categorias){
                                echo "<option value=\"{$categorias['categoria']}\">{$categorias['categoria']}</option>";
                            }
                    }  
                ?>
                </select>

                <label for="imageUpload" class="inputs">Selecionar imagens</label>
                        <!-- onde passamos o imagen da reeceita editada caso queira passar -->
                <input  class="inputs" type="file" id="imageUpload"   name="file" accept="image/*" style="display: none">
                
                <!-- onde passamos o conteudo da reeceita editada caso queira passar -->
                <textarea class="inputsText" name="conteudo" id="" placeholder="editar Conteudo"></textarea>
                <button class="button" type="submit">Editar</button>
            </form>
        </div>

    </div>

    <?php 

    require_once "head.php";
    require_once "functions.php";

    if(!isset($_SESSION['usuario'])) {
        echo "Error: Usuario nao Esta logado";
        exit;
    }

    $usuario = $_SESSION['usuario'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeAeditar = $_POST['nomeAeditar'];
        $nomeReceita = $_POST['nomeReceita'];
        $categoriaReceita = $_POST['tipoPrato'];
        
        $file = $_FILES['file'];
        $conteudo = $_POST['conteudo'];

        echo $nomeReceita;
        editarReceitaOfUser($usuario, $nomeReceita, $categoriaReceita, $file, $conteudo, $nomeAeditar);
    }

    ?>
    </section>

    <div>
    <div class="container">
        <?php 

        $getUsuarioReceita = fetchDeReceitasPorUsuario($usuario);

        if($getUsuarioReceita != false) {
            foreach ($getUsuarioReceita as $userReceita){
                echo "<div class='receitaContainer'>";

                    echo "<div class='receitaContainer'>";

                        echo "<img src='" . htmlspecialchars($userReceita['file_path']) . "' alt='" . htmlspecialchars($userReceita['nome']) . "' class='receitaImage'>";
                             
                        echo "<div class='contentondeltear'>";
                        echo "<p>" . htmlspecialchars($userReceita['categoria']) . "</p>";
                            
                        echo "</div>";
                        echo "<h2>" . htmlspecialchars($userReceita['nome']) . "</h2>";

                    echo "</div>";

                echo "</div>";
            }
        }
        
        ?>
    </div>
    </div>


</body>
</html>

<style>
.funcoesAdicionais{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1em;
    flex-direction: column;
}
    .top{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
        text-align: center;
        margin-top: 3em;
        color: grey;
    }

    .inputsText{
    width: 500px;
        height: 50px;
        padding: 1em;
        border: none;
        background-color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 3em;
        outline: none;
        font-family: Arial, Helvetica, sans-serif;
}


    .container{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        justify-content: center;
        padding: 5em 50em 10em 50em ;
        font-family: Arial, Helvetica, sans-serif;
    }

    .receitaImage{
        width: 250px;
        height: 200px;
        border-radius: 1em;
        transition: 500ms ease-in-out;
    }

    .receitaContainer{
        padding: 1em;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .contentondeltear{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .receitaLink{
        text-decoration: none;
        font-family: Arial, Helvetica, sans-serif;
        color: grey;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        transition: 300ms ease-in-out;
    }

    .input{
        width: 500px;
        height: 50px;
        padding: 1em;
        border: none;
        background-color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
        border-radius: 3em;
        outline: none;
        font-family: Arial, Helvetica, sans-serif;

    }

    .button{
        background-color: rgb(252, 43, 43);
        border: none;
        padding: 1em;
        color: white;
        font-size: 15px;
        border-radius: 1em;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        width: 200px;
    }

    .inputCategoria{
       display: flex;
       justify-content: center;
       padding: 10em 3em;
       align-items: center;
       gap: 2em;
       font-family: Arial, Helvetica, sans-serif;
    }
    
    .inputsElementsInDeletar{
        display: flex;
        align-items: center;
        gap: 2em;
    }

    
    .p{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        color:rgb(154, 154, 154);
        top: -95px;
        left: 60px;
        width: 300px;
        font-size: 20px;
       
    }

    .inputs{
        background-color: rgb(252, 43, 43);
        border: none;
        padding: 1em;
        color: white;
        font-size: 15px;
        border-radius: 1em;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        width: 200px;
    }

    .inputs:hover{
        cursor: pointer;
        background-color: rgb(56, 66, 210);
    }

    .info{
        display: flex;
        justify-content: center;
        gap: 3em;
        padding: 3em;
    }

    .selector:hover{
        cursor: pointer;
    }

    .imageSelector{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2em;
    }

    .imagePicker{
        background-color: rgb(252, 43, 43);
        font-size: 20px;
        margin-left: 1.5em;
        padding: 2em;
        width: 950px;
        text-align: center;
        border-radius: 1em;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        transition: 300ms ease-in-out;
        outline: none;
        border: none;
    }

    .imagePicker:hover{
        cursor: pointer;
        background-color: rgb(56, 66, 210);
    }
    
</style>