<form action="" method="post" enctype="multipart/form-data">
        <label for="">Nome do prato:</label>
        <input type="text" name="nomePrato" id="">

        <br><br>
        <select id="tipoPrato" name="tipoPrato">
            <option value="salgado">Salgado</option>
            <option value="doce">Doce</option>
        </select>

        <!-- pedindo img para a pessoa -->
        <br><br>
        <label for="file">Escolha uma imagem do seu prato:</label>
        <input type="file" name="file" id="file" accept="image/*">
        <input type="submit" value="Upload">

        <br><br>
        <input type="submit" value="Criar">

        <?php
        //valida as informacoes e chama a funcao cadastro de receita
        require_once "../functions/functions.php";
       
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            $nomePrato = $_POST['nomePrato'];
            $tipoPrato = $_POST['tipoPrato'];
            $file = $_FILES['file'];


            cadastroReceita($nomePrato, $tipoPrato, $file);
        }

    
        

        ?>
    
    </form>